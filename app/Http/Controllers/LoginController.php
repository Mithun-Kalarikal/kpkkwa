<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Image;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

     public function memberList()
    {

        $data['memberList2']=DB::table('members as m')->select('md.*')->join('memberDetails as md', 'm.id', '=', 'md.memberId')->get();
        $data['memberList']=DB::table('members as m')->select('m.*')->get();
        //echo '<pre>';print_r($data['memberList2']);exit;
        return view('memberList',$data);
    }

    



}
