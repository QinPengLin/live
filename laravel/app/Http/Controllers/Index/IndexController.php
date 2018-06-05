<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function Index(){
        $test='LIVE ';
        $name=' QIN';
        return view('Index.test',['tests'=>$test,'anem'=>$name]);
    }
}
