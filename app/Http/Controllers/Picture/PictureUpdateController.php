<?php

namespace App\Http\Controllers\Picture;

use App\Http\Requests\PictureRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PictureUpdateController extends Controller
{
    public function showPicture(Request $request){
        $path = storage_path('/uploads/'.$request->url);
        return response()->file($path);
    }


    public function updatePicture(PictureRequest $request){
            $picture = $request->file('picture');
            if($picture->isValid()){
                //获取扩展名
                $extend=$picture->getClientOriginalExtension();
                //获取文件路径
                $path = $picture->getRealPath();
                //取名
                $name = uniqid().time().'.'.$extend;
                $stat = Storage::disk('admin')->put($name,file_get_contents($path));
                if($stat){
                   return response()->success(100,'成功',$name);
                }
                else{
                    return response()->fail(200,'失败');
                }
            }
       }
}
