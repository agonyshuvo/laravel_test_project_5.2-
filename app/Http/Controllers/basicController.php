<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class basicController extends Controller
{
    public function index(){
    	return " Home for Basic Controller";
    }

    public function about(){
    	$name='Javed';
    	$id='345';
    	$phone='017384464';
    	$address='345, Dhaka';
    	//return view('all_user')->with('name',$name);
    	//return view('all_user',compact('name','id','phone'));
    	return view('all_user',compact('name','id','phone'))->with('address',$address);
    }
}
