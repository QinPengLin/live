<?php

namespace App\Http\Controllers\Live;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    //
    public function Index(){
        $index=Redis::get('live');
        $index=json_decode($index,true);
//        $index=array(
//         array('href'=>'qin','img'=>'ini.jpg','heat'=>'1万','title'=>'1','author'=>'user1','types'=>'王者荣耀')
//        ,array('href'=>'ui','img'=>'ini.jpg','heat'=>'2万','title'=>'2','author'=>'user2','types'=>'王者荣耀')
//        ,array('href'=>'qin2','img'=>'ini.jpg','heat'=>'3万','title'=>'3','author'=>'user3','types'=>'王者荣耀')
//        ,array('href'=>'qin3','img'=>'ini.jpg','heat'=>'4万','title'=>'4','author'=>'user4','types'=>'王者荣耀')
//        ,array('href'=>'qin5','img'=>'ini.jpg','heat'=>'5万','title'=>'5','author'=>'user5','types'=>'王者荣耀')
//        );
        return view('Live.index.index',['index'=>$index]);
    }
    public function AsianLines(Request $request){
        $dat=$request->all();
        if (!isset($dat['key']) || empty($dat['key'])){
            return json_encode(['code'=>'500', 'msg'=>'error']);
        }
        $redata=Redis::hget('hash', $dat['key']);
        $redata_main=Redis::hget('hash', $dat['key'].'_main');
        if ($redata || $redata_main){
            $rearr['success']=1;
            $rearr['results']=array(array('FI'=>$dat['key']),json_decode($redata,true),json_decode($redata_main,true));
            return json_encode($rearr);
        }else{
            return json_encode(['code'=>'500', 'msg'=>'无数据']);
        }
    }
}
