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
    public function Info(Request $request){
        $all=$request->all();
        return view('Usechain.info',['num'=>$all['num']]);
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
        $ups=$key_sta->update(['state'=>1]);
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
