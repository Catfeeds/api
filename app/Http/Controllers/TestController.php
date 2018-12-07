<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $num = Redis::incr('fudan');
        dd($num%10);
    }

    public function socketTest(Request $request)
    {
        $host = 'xz516.vicp.net';
//        $host = '192.168.1.140';
        $port = '2000';
        $message = '';
        if ($request->input('color') == 'red') {
            $message = 'A506FFA0FF0000EE5A';//红色
        } elseif ($request->input('color') == 'blue') {
            $message = 'A506FFA00000FFEE5A';//蓝色
        } elseif ($request->input('color') == 'green') {
            $message = 'A506FFA000FF00EE5A';//绿色
        }

        $mes = null;
        for ($i = 0; $i < strlen($message); $i += 2) {
            $mes .= hex2bin($message[$i] . $message[$i + 1]);
        }

        $ret = $this->send_udp_message($host, $port, $mes);
        return (string)$ret;
    }

    function send_tcp_message($host, $port, $message)
    {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        @socket_connect($socket, $host, $port);

        $num = 0;
        $length = strlen($message);
        do {
            $buffer = substr($message, $num);
            $ret = @socket_write($socket, $buffer);
            $num += $ret;
        } while ($num < $length);

        $ret = '';
        do {
            $buffer = @socket_read($socket, 1024, PHP_BINARY_READ);
            $ret .= $buffer;
        } while (strlen($buffer) == 1024);

        socket_close($socket);

        return $ret;
    }

    function send_udp_message($host, $port, $message)
    {
        $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        @socket_connect($socket, $host, $port);

        $num = 0;
        $length = strlen($message);
        do {
            $buffer = substr($message, $num);
            $ret = @socket_write($socket, $buffer);
            $num += $ret;
        } while ($num < $length);
//        $ret = @socket_write($socket, $message);
        socket_close($socket);

        // UDP 是一种无链接的传输层协议, 不需要也无法获取返回消息
        return true;
    }

}
