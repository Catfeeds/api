<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Mockery\Exception;

class TestController extends Controller
{
    public function test()
    {
        system('gphoto2 –capture-image-and-download');
        return 'true';
    }
}
