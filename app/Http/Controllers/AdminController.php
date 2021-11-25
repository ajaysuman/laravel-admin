<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    //+++++++++++++++++ Login ++++++++++++++
    public function Login()
    {
        
        return view('backend.admin.dashboard.mainIndex');
    }
    // tHEME 
    public function adminShows(Request $request)
    {   
        return view('backend.admin.dashboard.mainIndex');
    }


    
}
