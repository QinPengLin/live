<?php

namespace App\Http\Controllers\Usechain;

use App\Models\Usechain\UsechainKey;
use App\Models\Usechain\UsechainUser;
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
}
