<?php

namespace App\Http\Controllers\Usechain;

use App\Models\Usechain\UsechainKey;
use App\Models\Usechain\UsechainUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsechainController extends Controller
{
    //
    public function Index(){
        return view('Usechain.index');
    }
    public function IndexCd(){
        $count=UsechainUser::where('prj','cd')->count();
        $count=120-$count;
        return view('Usechain.index_cd',['count'=>$count]);
    }
    public function InfoCd(Request $request){
        if($request->isMethod('get')) {
            $erre='';
            return view('Usechain.info_cd', ['err'=>$erre]);
        }
        if($request->isMethod('post')){
            $all=$request->all();
            if (empty($all['realname']) || !isset($all['realname'])){
                $erre='姓名不能为空';
                return view('Usechain.info_cd', ['err'=>$erre]);
                exit;
            }
            if (empty($all['tel']) || !isset($all['tel']) || !(preg_match("/^1[3456789]{1}\d{9}$/",$all['tel']))){
                $erre='电话号码不合法';
                return view('Usechain.info_cd', ['err'=>$erre]);
                exit;
            }
            if (empty($all['company']) || !isset($all['company'])){
                $erre='公司不能为空';
                return view('Usechain.info_cd', ['err'=>$erre]);
                exit;
            }
            $count=UsechainUser::where('prj','sh')->count();
            if ($count>119){
                $erre='报名数量用完';
                return view('Usechain.info_cd', ['err'=>$erre]);
                exit;
            }
            $sf=UsechainUser::where('tel',$all['tel'])->first();
            if ($sf){
                $erre='电话号码已使用过';
                return view('Usechain.info_cd', ['err'=>$erre]);
                exit;
            }
            $re_user=UsechainUser::insert([
                'name'=>$all['realname'],
                'tel'=>$all['tel'],
                'company'=>$all['company'],
                'rec_name'=>$all['tj_name'],
                'creation_time'=>Carbon::now(),
                'prj'=>'sh'
            ]);
            if ($re_user){
                $erre='报名成功！';
                return view('Usechain.info_cd', ['err'=>$erre]);
                exit;
            }
        }
    }
    public function Info(Request $request){
        if($request->isMethod('get')) {
            $all = $request->all();
            if (!isset($all['num']) || empty($all['num'])){
                $all['num']=1;
            }
            $erre='';
            return view('Usechain.info', ['num' => $all['num'],'err'=>$erre]);
        }
        if($request->isMethod('post')){
            $all=$request->all();
            if (count($all['tj_code'])!=$all['num']){
                $erre='参数错误';
                return view('Usechain.info', ['num' => $all['num'],'err'=>$erre]);
                exit;
            }
            if (count($all['tj_code']) != count(array_unique($all['tj_code']))){
                $erre='推荐码有重复';
                return view('Usechain.info', ['num' => $all['num'],'err'=>$erre]);
                exit;
            }
            $key_data=UsechainKey::where('state',0)->get();
            $key_data_arr=array();
            foreach ($key_data as $v){
                $key_data_arr[]=$v->key;
            }
            $pd=false;
            $str_key='';
            foreach ($all['tj_code'] as $v){
                if (!(in_array($v,$key_data_arr))){
                    $str_key=$str_key.','.$v;
                    $pd=true;
                }
            }
            $str_key=$str_key.'不存在或者已经使用';
            if ($pd){
                $erre=$str_key;
                return view('Usechain.info', ['num' => $all['num'],'err'=>$erre]);
                exit;
            }
            $key_sta=UsechainKey::whereIn('key',$all['tj_code'])->get();
            $ups=UsechainKey::whereIn('key',$all['tj_code'])->update(['state'=>1]);

            $rec_coed_str='';
            $usechain_key_id_str='';
            foreach ($key_sta as $v){
                $rec_coed_str=$rec_coed_str.','.$v->key;
                $usechain_key_id_str=$usechain_key_id_str.','.$v->id;
            }
            if ($ups){
                $re_user=UsechainUser::insert([
                    'name'=>$all['realname'],
                    'tel'=>$all['tel'],
                    'company'=>$all['company'],
                    'rec_coed'=>$rec_coed_str,
                    'usechain_key_id'=>$usechain_key_id_str,
                    'rec_name'=>$all['tj_name'],
                    'creation_time'=>Carbon::now()
                ]);
                if ($re_user){
                    $erre='预约成功！';
                    return view('Usechain.info', ['num' => $all['num'],'err'=>$erre]);
                    exit;
                }
            }
        }
    }
    public function PostInfo(Request $request){
        $all=$request->all();
        if (count($all['tj_code'])!=$all['num']){
               echo '参数错误';
               exit;
        }
        if (count($all['tj_code']) != count(array_unique($all['tj_code']))){
            echo '推荐码有重复';
            exit;
        }
        $key_data=UsechainKey::where('state',0)->get();
        $key_data_arr=array();
        foreach ($key_data as $v){
            $key_data_arr[]=$v->key;
        }
        $pd=false;
        $str_key='';
        foreach ($all['tj_code'] as $v){
            if (!(in_array($v,$key_data_arr))){
               $str_key=$str_key.','.$v;
               $pd=true;
            }
        }
        $str_key=$str_key.'不存在或者已经使用';
        if ($pd){
            echo $str_key;
            exit;
        }
        $key_sta=UsechainKey::whereIn('key',$all['tj_code'])->get();
        $ups=UsechainKey::whereIn('key',$all['tj_code'])->update(['state'=>1]);

        $rec_coed_str='';
        $usechain_key_id_str='';
        foreach ($key_sta as $v){
            $rec_coed_str=$rec_coed_str.','.$v->key;
            $usechain_key_id_str=$usechain_key_id_str.','.$v->id;
        }
        if ($ups){
            $re_user=UsechainUser::insert([
                'name'=>$all['realname'],
                'tel'=>$all['tel'],
                'company'=>$all['company'],
                'rec_coed'=>$rec_coed_str,
                'usechain_key_id'=>$usechain_key_id_str,
                'rec_name'=>$all['tj_name'],
                'creation_time'=>Carbon::now()
            ]);
            if ($re_user){
                echo '预约成功！';
                exit;
            }
        }
    }
}
