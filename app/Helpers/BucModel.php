<?php
/**
 * Created by PhpStorm.
 * User: czy
 * Date: 2017/9/2
 * Time: 下午2:17
 */

namespace App\Helpers;


class BucBase {

    const API_SERVER = 'https://u-api.alibaba-inc.com';
    const API_SERVER_DEV = 'http://u-api.alibaba.net';
    const API_VERSION = '1.0';
    const API_TIMEOUT = 3; # unit: second

    private static $env = 'dev'; # prod by default
    private static $nic = 'eth0'; # for multiple NIC host
    //private static $nic = 'bond0'; # 阿里云实体机器的话要把这个静态变量初始化为 bond0 ，否则下面的getNicInfo 函数无法获取IP地址
    private static $apiKey = 'MOCK-Ad$Un328d(t_4CE&6&0@Zve123';
    private static $apiSecret = 'MOCKn0Ejx_Q$2MYU6f$_&Q406l$$Q2zC&d12345_';

    /**
     * init static members per config
     * this function should be customized per app
     */
    public static function init() {
        // normally configuration could be loaded hereby
    }

    /**
     * construct API signature
     * @param Refer to <a href="http://gitlab.alibaba-inc.com/buc/buc-security-api/blob/master/Guide.md">API开发指南</a> for details
     * @return signiture string
     */
    protected static function getSignature($method,$timestamp,$nonce,$uri,$params) {
        $bytes = sprintf("%s\n%s\n%s\n%s\n%s",$method,$timestamp,$nonce,$uri,$params);
        $hash = hash_hmac('sha256',$bytes,self::$apiSecret,true);
        return base64_encode($hash);
    }

    /**
     * retrieve NIC configuration for IP & MAC
     * Only linux system is supported so far
     * @return array | false on error
     */
    protected static function getNicInfo() {
        $cmd = sprintf('/sbin/ifconfig %s|/usr/bin/head -2',self::$nic);
        $output = `$cmd`;
        if ( !$output ) {
            return false;
        }
        $lines = explode("\n",$output);
        $ret = array();
        foreach( $lines as $line ) {
            $tmp = array();
            if ( preg_match('/HWaddr ((?:[0-9A-Fa-f]{2}:)+[0-9A-Fa-f]{2})/',$line,$tmp) ) {
                $ret['mac'] = $tmp[1];
                continue;
            }
            if ( preg_match('/inet addr:((?:[0-9]{1,3}\.)+[0-9]{1,3})/',$line,$tmp) ) {
                $ret['ip'] = $tmp[1];
                continue;
            }
        }
        return $ret;
    }

    /**
     * construct server per configuration
     * @return server string
     */
    protected static function getServer() {
        $server = self::API_SERVER;
        if ( 'dev' == self::$env ) {
            $server = self::API_SERVER_DEV;
        }
        return $server;
    }


    /**
     * construct headers for BUC API request
     * @param $api API path to be queried (w/o server part)
     * @param $method HTTP method. So far only GET & POST are supported
     * @param $params As it is. Key & value should be UTF-8 encoded w/o url encoding
     * @return header array | false on error
     */
    protected static function getHeaders($api,$method,$params) {
        if ( !$api || !$method || !$params ) {
            return false;
        }
        $addr = self::getNicInfo();
        if ( !$addr ) {
            return false;
        }
        $timestamp = strftime('%Y-%m-%dT%H:%M:%S.000+08:00');
        $nonce = sprintf('%d000%d',time(),rand(1000, 9999));

        ksort($params,SORT_STRING);
        $ret = array();
        foreach( $params as $k => $v ) {
            $ret[] = sprintf('%s=%s',$k,$v);
        }
        $sig = self::getSignature($method,$timestamp,$nonce,$api,implode('&',$ret));

        return array(
            'X-Hmac-Auth-Timestamp' => $timestamp,
            'X-Hmac-Auth-Version' => self::API_VERSION,
            'X-Hmac-Auth-Nonce' => $nonce,
            'apiKey' => self::$apiKey,
            'X-Hmac-Auth-Signature' => $sig,
            'X-Hmac-Auth-IP' => $addr['ip'],
            'X-Hmac-Auth-MAC' => $addr['mac']
        );
    }

    /**
     * encapsulation for BUC getUserByLoginName
     * @param $loginName The login name of the interesed user
     * @return array
     */
    protected static function getUserByLoginName($loginName) {
        $api = '/rpc/enhancedUserQuery/getUserByLoginName.json';
        $server = self::getServer();
        $url = sprintf('%s%s',$server,$api);
        $params = array('loginName' => $loginName);
        $headers = self::getHeaders($api,'POST',$params);
        return self::curlPost($url,$params,self::API_TIMEOUT,$headers);
    }

    /**
     * helper function for HTTP POST request
     */
    private static function curlPost($url, $params = array(), $timeout = 1, $headerAry = array()) {
        $ch = curl_init( );
        curl_setopt( $ch, CURLOPT_URL, $url);
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt( $ch, CURLOPT_SSL_CIPHER_LIST,  'TLSv1');
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        if ($headerAry) {
            $tmp = array();
            foreach( $headerAry as $k => $v ) {
                $tmp[] = sprintf('%s: %s',$k,$v);
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $tmp);
        }
        $data = curl_exec( $ch);
        $error =  curl_error( $ch );
        curl_close( $ch );
        return $data;
    }
}

/**
 * static member initializer
 */
BucBase::init();

/**
 * BUC business logic for OPENDATA
 */
class BucModel extends BucBase {
    /**
     * get user detail by email prefix
     * @param $prefix Email prefix for query
     * @return false | array()
     */
    public static function getUserDetail($prefix) {
        return parent::getUserByLoginName($prefix);
    }
}

BucModel::getUserDetail('piaoyu.ddh');