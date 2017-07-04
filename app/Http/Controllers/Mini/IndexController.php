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
        $run_iv = $request->input('runiv');
        $encryptedrun = $request->input('encryptedrun');
        $encrypteduser = $request->input('encrypteduser');
        $res = $this->mini->sns->getSessionKey($code);
        $session_key = $res->session_key;
        $run_data = $this->mini->encryptor->decryptData($session_key, $run_iv, $encryptedrun);
        return last($run_data['stepInfoList']);
//        $user_data = $this->mini->encryptor->decryptData($session_key, $iv, $encrypteduser);
//        return $user_data;

//        $decrypted = openssl_decrypt(
//            base64_decode($encryptedrun, true), 'aes-128-cbc', base64_decode($session_key, true),
//            OPENSSL_RAW_DATA | OPENSSL_NO_PADDING, base64_decode($iv, true)
//        );
//        $result = json_decode($decrypted, true);
//        return $result;
    }
}
