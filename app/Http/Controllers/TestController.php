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
        return view('test');
    }

    public function socketTest()
    {
        $host = '114.234.165.180';
        $port = '2000';
        $num = Redis::incr('numTest');
        $message ='A5 06 FF A0 FF FF FF EE 5A';
        $ret = $this->send_udp_message($host, $port, $message);
        dd($ret);
    }

    function send_tcp_message($host, $port, $message)
    {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        @socket_connect($socket, $host, $port);

        $num = 0;
        $length = strlen($message);
        do
        {
            $buffer = substr($message, $num);
            $ret = @socket_write($socket, $buffer);
            $num += $ret;
        } while ($num < $length);

        $ret = '';
        do
        {
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
        do
        {
            $buffer = substr($message, $num);
            $ret = @socket_write($socket, $buffer);
            $num += $ret;
        } while ($num < $length);

        socket_close($socket);

        // UDP 是一种无链接的传输层协议, 不需要也无法获取返回消息
        return true;
    }

}
