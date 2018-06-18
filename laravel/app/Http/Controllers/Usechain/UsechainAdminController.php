<?php

namespace App\Http\Controllers\Usechain;

use App\Models\Usechain\UsechainAdmin;
use App\Models\Usechain\UsechainKey;
use App\Models\Usechain\UsechainUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Session\Middleware\StartSession;

class UsechainAdminController extends Controller
{
    public function __construct(Request $request){
        $url=parse_url($request->url());
//        $user_id = session('user_id_uzg');
//        echo 'no';
//        print_r($user_id );
//        exit;

//        if($url['path']!='/usechain/admin/login') {
////            $this->middleware(function ($request, $next){
////
////                if (!\Session::get('user_id_uzg')) {
////                    $s=$request->server('HTTP_HOST');
////                    $s='http://'.$s.'/usechain/admin/login';
////                    header("location:$s");
////                    exit;
////                }
////                return $next($request);
////            });
//
//            $this->middleware(function ($request, $next) {
//                print_r($request->session()->all());
//                return;
//            });
//        }
    }
    //
    public function Adminlogin(Request $request){
        if($request->isMethod('get')){//如果是get请求就显示登录界面
            $user_id = session('user_id_uzg');
            print_r($user_id );
            exit;
            if (isset($user_id) && !empty($user_id)) {
                return redirect('usechain/admin/index');
                exit;
            }
            return view('Usechain.admin.login');
        }
        if($request->isMethod('post')){
            $user_id = session('user_id_uzg');
            if (isset($user_id) && !empty($user_id)) {
                return redirect('usechain/admin/index');
                exit;
            }
            $name=$request->get('name');
            $pwd=$request->get('pwd');
            //$user=UsechainAdmin::where('name',$name)->where('pwd',$pwd)->first();
            $user=1;
            if(!$user){
                return view('Usechain.admin.login');
            }
            session(['user_id_uzg'=>$user]);
            $user_id = session('user_id_uzg');
            print_r($user_id );
            exit;
            return redirect('usechain/admin/index');
        }
        exit('Error');
    }
    public function AdminIndex(){
        $key=UsechainKey::paginate(15);
        return view('Usechain.admin.index',['keyData'=>$key]);
    }
    public function AdminUserList(){
        $userData=UsechainUser::paginate(15);
        return view('Usechain.admin.userList',['userData'=>$userData]);
    }
    public function AdminUserListCd(){
        $userData=UsechainUser::where('prj','cd')->paginate(15);
        return view('Usechain.admin.userListCd',['userData'=>$userData]);
    }
    public function len($length=12,$type="all"){
        $int_arr = array("0","1","2","3","4","5","6","7","8","9","0");
        $letter_arr = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l");
        $len_data = array();
        for($i=0;$i<$length;$i++){
            switch($type){
                case "int":
                    $rand =  $int_arr;
                    break;
                case "letter":
                    $rand =  $letter_arr;
                    break;
                default:
                    $rand =  array_merge($int_arr,$letter_arr);
                    break;
            }
            $len_data[] = $rand[rand(0,count($rand)-1)];
        }
        return implode("",$len_data);
    }
    public function rand(){
        $arr_a=array();
        for ($i=0;$i<120;$i++){
            $arr_a[]=$this->len(6);
        }
        if (count($arr_a) != count(array_unique($arr_a))){
            $this->rand();
        }
        $in_dat=array();
        foreach ($arr_a as $v){
            $in_dat[]=array('key'=>$v,'creation_time'=>Carbon::now());
        }
        UsechainKey::insert($in_dat);
    }
    public function times(){
        echo Carbon::now();
    }

}
