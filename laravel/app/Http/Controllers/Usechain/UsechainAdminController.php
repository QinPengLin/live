<?php

namespace App\Http\Controllers\Usechain;

use App\Models\Usechain\UsechainAdmin;
use App\Models\Usechain\UsechainKey;
use App\Models\Usechain\UsechainUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsechainAdminController extends Controller
{
    public function __construct(Request $request){

    }
    //
    public function Adminlogin(){
        $dat=UsechainAdmin::where('id',1)->first();
        print_r($dat);
        //return view('Usechain.index');
    }
}
