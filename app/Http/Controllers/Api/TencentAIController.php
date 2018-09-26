<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TencentAIController extends Controller
{
    /*
     * 获取签名
     */
    public function getReqSign($params)
    {

        // 1. 字典升序排序
        ksort($params);

        // 2. 拼按URL键值对
        $str = '';
        foreach ($params as $key => $value) {
            if ($value !== '') {
                $str .= $key . '=' . urlencode($value) . '&';
            }
        }

        // 3. 拼接app_key
        $str .= 'app_key=' . env('tencent-AI-AppKey');

        // 4. MD5运算+转换大写，得到请求签名
        $sign = strtoupper(md5($str));
        return $sign;
    }

    /**
     * @param Request $request
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * 人脸美妆
     */
    public function faceCosmetic(Request $request)
    {
        $image = $request->input('photo');
        $id = $request->input('id');
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpg;base64,', '', $image);

        $params = array(
            'app_id' => env('tencent-AI-AppId'),
            'image' => $image,
            'cosmetic' => $id,
            'time_stamp' => strval(time()),
            'nonce_str' => strval(rand()),
            'sign' => '',
        );
        $params['sign'] = $this->getReqSign($params);
        $client = new Client([
            'timeout' => 20.0,
        ]);
        $response = $client->request('POST', 'https://api.ai.qq.com/fcgi-bin/ptu/ptu_facecosmetic', [
            'form_params' => $params
        ]);
        $body = $response->getBody();

        return response()->json((string)$body);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * 腾讯AI 滤镜接口
     */
    public function imgFilter(Request $request)
    {
        $type = $request->input('type');//上传类型，天天p图/AIlab
        $image = $request->input('photo');
        $id = $request->input('id');
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpg;base64,', '', $image);

        if ($type == 'ptu') {
            $params = array(
                'app_id' => env('tencent-AI-AppId'),
                'image' => $image,
                'filter' => $id,
                'time_stamp' => strval(time()),
                'nonce_str' => strval(rand()),
                'sign' => '',
            );

            $url = 'https://api.ai.qq.com/fcgi-bin/ptu/ptu_imgfilter';
        } elseif ($type == 'AILab') {
            $params = array(
                'app_id' => env('tencent-AI-AppId'),
                'image' => $image,
                'filter' => $id,
                'session_id' => uniqid(),
                'time_stamp' => strval(time()),
                'nonce_str' => strval(rand()),
                'sign' => '',
            );

            $url = 'https://api.ai.qq.com/fcgi-bin/vision/vision_imgfilter';
        } else {
            return response()->json([
                'ret' => 110,
                'msg' => '类型错误',
                'data' => [
                    'image' => ''
                ]
            ]);
        }

        $params['sign'] = $this->getReqSign($params);
        $client = new Client([
            'timeout' => 20.0,
        ]);
        $response = $client->request('POST', $url, [
            'form_params' => $params
        ]);
        $body = $response->getBody();

        return response()->json((string)$body);
    }

    /*
     * 人脸搜索
     */
    public function faceIdentify(Request $request)
    {
        $image = $request->input('photo');
        $group_id = $request->input('group_id'); //个体组id, 测试group0
        $topn = $request->input('topn'); //返回识别图数量

        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpg;base64,', '', $image);

        $params = array(
            'app_id' => env('tencent-AI-AppId'),
            'image' => $image,
            'group_id' => $group_id,
            'time_stamp' => strval(time()),
            'nonce_str' => strval(rand()),
            'sign' => '',
            'topn' => $topn,
        );
        $params['sign'] = $this->getReqSign($params);

        $client = new Client([
            'timeout' => 20.0,
        ]);
        $response = $client->request('POST', 'https://api.ai.qq.com/fcgi-bin/face/face_faceidentify', [
            'form_params' => $params
        ]);
        $body = $response->getBody();

        return response()->json((string)$body);
    }

    /*
     * 个体创建
     */
    public function faceNewPerson(Request $request)
    {
        $image = $request->input('photo');
        $group_id = $request->input('group_id'); //个体组id
        $person_id = urlencode($request->input('person_id')); //id
        $person_name = urlencode($request->input('person_name')); //姓名
        $tag = urlencode($request->input('tag'));//备注

        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpg;base64,', '', $image);

        $params = array(
            'app_id' => env('tencent-AI-AppId'),
            'group_ids' => $group_id,
            'person_id' => $person_id,
            'time_stamp' => strval(time()),
            'nonce_str' => strval(rand()),
            'tag' => $tag ?: '',
            'person_name' => $person_name,
            'sign' => '',
            'image' => $image,
        );
        $params['sign'] = $this->getReqSign($params);

//        dd($params);
        $client = new Client([
            'timeout' => 20.0,
        ]);
        $response = $client->request('POST', 'https://api.ai.qq.com/fcgi-bin/face/face_newperson', [
            'form_params' => $params
        ]);
        $body = $response->getBody();

        return response()->json((string)$body);
    }
}
