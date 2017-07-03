<?php

namespace App\Http\Controllers\Mini;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class IndexController extends Controller
{
    public $mini;

    public function __construct(Application $app)
    {
        $this->mini = $app->mini_program;
    }

    public function index(Request $request)
    {
        $iv = $request->input('iv');
        $code = $request->input('code');
        $encryptedrun = $request->input('encryptedrun');
        $encrypteduser = $request->input('encrypteduser');
        $res = $this->mini->sns->getSessionKey($code);
        $session_key = $res->session_key;
//        $run_data = $this->mini->encryptor->decryptData($session_key, $iv, $encryptedrun);
//        return $run_data;
        $user_data = $this->mini->encryptor->decryptData($session_key, $iv, $encrypteduser);
        return $user_data;
    }
}
