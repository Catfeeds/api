<?php

namespace App\Http\Controllers\Absolut;

use App\Models\Absolut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function uploadImg(Request $request)
    {
        $lid = $request->location_id;
        $image = $request->input('img');
        $image = str_replace('data:image/jpeg;base64,', '' , $image);
        $image = str_replace('data:image/png;base64,', '' , $image);
        $image = str_replace('data:image/jpg;base64,', '' , $image);
        $path = Storage::disk('oss')->putFileAs('absolut', $image, uniqid().'.jpg');

        $item = new Absolut();
        $item->locationId = $lid;
        $item->imgUrl = config('filesystems.disks.oss.oss_url').$path;
        $item->save();

        return config('filesystems.disks.oss.oss_url').$path;
    }

    public function printImg(Request $request)
    {
        $absout = Absolut::where('locationId', $request->location_id)
            ->where('status', 0)
            ->orderBy('created_at', 'desc')
            ->first();
        if ($absout) {
            $absout->status = 1;
            $absout->save();

            return response()->json([
                'code' => 1,
                'image' => $absout->imgUrl
            ]);
        }
        return response()->json([
            'code' => 0,
            'image' => null
        ]);
    }

    public function printConfirm(Request $request)
    {
        $absolut = Absolut::where('imgUrl', $request->imgUrl)->first();
        $absolut->status = 0;
        $absolut->save();

        return 'true';
    }
}
