<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RobotExtraQa;
use DB;

class AdminQuestionOperateController extends Controller
{
    //搜索问题
    public function searchQuestion(Request $request){
        $content = $request->search_content;
        //三表联合查询
        $result = DB::table('chat_robot_extra_qa')
            ->join('chat_company','chat_robot_extra_qa.company_id','=','chat_company.id')
            ->join('chat_user','chat_company.chat_user_id','=','chat_user.id')
            ->select('chat_robot_extra_qa.id as question_id', 'chat_robot_extra_qa.title as question_title',
                'chat_user.cname as question_author','chat_robot_extra_qa.created_at as question_create_time',
                'chat_robot_extra_qa.access_at as question_access_time','chat_robot_extra_qa.state as question_state')
        ->where('title','like','%'.$content.'%')->paginate(8);
        if($result){
            return response()->success(200,'成功',$result);
        }
        else{
            return response()->fail(100,'搜索信息不存在，请重试！',null);
        }
        
    }

    //获取全部问题
    public function getAllQuestions(){
        $result = DB::table('chat_robot_extra_qa')
            ->join('chat_company','chat_robot_extra_qa.company_id','=','chat_company.id')
            ->join('chat_user','chat_company.chat_user_id','=','chat_user.id')
            ->select('chat_robot_extra_qa.id as question_id', 'chat_robot_extra_qa.title as question_title',
                'chat_user.cname as question_author','chat_robot_extra_qa.created_at as question_create_time',
                'chat_robot_extra_qa.access_at as question_access_time','chat_robot_extra_qa.state as question_state')
            ->paginate(8);
        if($result){
            return response()->success(200,'成功',$result);
        }
        else{
            return response()->fail(100,'获取失败，请重试！',null);
        }
    }

    //通过id获取信息
    public function getQuestionDetailByQuestionId(Request $request){
        $question_id = $request->question_id;
        $result = DB::table('chat_robot_extra_qa')
            ->select('title as intro','synopsis as intro',
                'step as methed', 'matter_need_atten as careful')
            ->where('id','=',$question_id)->get();
        if($result){
            return response()->success(200,'成功',$result);
        }
        else{
            return response()->fail(100,'信息不存在，请重试！',null);
        }

    }

    //通过审核
    public function accessQuestionByQuestionId(Request $request){
        $question_id = $request->question_id;
        $stat = RobotExtraQa::where('id','=',$question_id)->first();
        if($stat){
            $result = RobotExtraQa::where('id','=',$question_id)->update(['state'=>2]);
            if($result){
                return response()->success(200,'审核通过！',null);
            }
            else{
                return response()->fail(100,'对不起，审核未通过！',null);
            }
        }
        else{
            return response()->fail(100,'对不起，审核未通过！',null);
        }
    }

    //取消通过审核
    public function revokeQuestionByQuestionId(Request $request){
        $question_id = $request->question_id;
        $stat = RobotExtraQa::where('id','=',$question_id)->first();
        if($stat){
            $result = RobotExtraQa::where('id','=',$question_id)->update(['state'=>0]);
            if($result){
                return response()->success(200,'取消通过审核成功！',null);
            }
            else{
                return response()->fail(100,'取消通过审核失败！',null);
            }
        }
        else{
            return response()->fail(100,'取消通过审核失败！',null);
        }
    }

    //删除问题
    public function deleteQuestionByQuestionId(Request $request){
        $question_id = $request->question_id;
        $stat = RobotExtraQa::where('id','=',$question_id)->first();
        if($stat){
            $result = RobotExtraQa::destroy($question_id);
            if($result){
                return response()->success(200,'删除成功！',null);
            }
            else{
                return response()->fail(100,'删除失败，请尝试！',null);
            }
        }
        else{
            return response()->fail(100,'删除失败，请尝试！',null);
        }
    }

}
