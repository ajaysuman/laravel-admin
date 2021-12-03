<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;
class AdminController extends Controller
{

    //+++++++++++++++++ Login ++++++++++++++
    public function Login()
    {
        return view('backend.admin.dashboard.mainIndex');
    }
    //++++++++++++++++  tHEME ++++++++++++++
    public function adminShows(Request $request)
    {   
       return view('backend.admin.dashboard.mainIndex');
    }

    //++++++++++++++++++ Redirect Page +++++++++++++++++
    public function subAdmin( Request $request)
    {   
        $adminedit = "";
        $admindata = DB::table('users')->get();
        return view('backend.admin.subadmin.addAdmin')->with(['admindata' => $admindata , 'adminedit' => $adminedit ]);
    }  

    //++++++++++++++++++ Add Sub Admin +++++++++++++++++
    public function saveUserData()
    {   
        return view('backend.admin.subadmin.addAdmin');
    }
    
    // ++++++++++++++ Admin |Edit +++++++++++++++
    public function adminUpdate(Request $request)
    {   
        $admindata = DB::table('users')->get();
        $adminedit = DB::table('users')->get();
        return view('backend.admin.subadmin.addAdmin')->with(['admindata' => $admindata , 'adminedit' => $adminedit]);
    }

    // ++++++++++++++++ Update Admin ++++++++++++++++++++
    public function updateAdmin(Request $request)
    {    
        try {
            // ++++++++++++ Unlik Image +++++++++++++
            if($request->image != ""){
                $dataimg = DB::table('users')->get();
                foreach($dataimg as $dataimgs){
                } 
              // ++++++++++++ RemoveFolder Image +++++++++++++
                $image_path = public_path("admin/img/".$dataimgs->image);
                if(file_exists($image_path)){
                    File::delete( $image_path);
                }
              // ++++++++++++ upldad Image +++++++++++++
                if ($files = $request->file('image')) {
                    $time = date("d-m-Y")."-".time();
                    $imageName = $time.'.'.$request->image->extension();  
                    $request->image->move(public_path('admin/img'), $imageName);
                } 
                 // ++++++++++++ Update Data +++++++++++++ 
                $admindata =  DB::update('update users set name = ?,email=?,image=? where id = ?',[$request->username,$request->email,$imageName , $request->userid]);
                if($admindata == 1)
                {
                    $admindata = DB::table('users')->get();
                    return response()->json(['data' => $admindata]);
                }   
            }else{
                    // ++++++++++++ Update Data +++++++++++++ 
                    $admindata =  DB::update('update users set name = ?,email=? where id = ?',[$request->username,$request->email, $request->userid]);
                    if($admindata == 1)
                    {
                        $admindata = DB::table('users')->get();
                        return response()->json(['data' => $admindata]);
    
                    }  
                }  
        } catch (\Exception $e) {
            return Response()->json([
                "success" => false,
                "data   " => ''
            ]);
          }     
  
    }

    
}
