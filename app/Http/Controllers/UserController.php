<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public static function index()
    {

        return "ja sam  /app/http/Usercontroller::index() :)";
    }
    public static function indexJson()
    {

        return response()->json(array('comment' => "ja sam  /app/http/Usercontroller::index() :)"));
    }   
    /*
     http://localhost:8000/user-redirect2action
     */
     public static function action1()
    {
        // http://localhost:8000/user-action2?jedan=dva
        return response()->redirectToAction([UserController::class, 'action2'], parameters:["jedan"=>"dva"]);

       //MOŽE I OVAKO:
       // return redirect()->action([UserController::class, 'action2']);
    }
         public static function action2(Request $request)
    {
        // http://localhost:8000/user-action2?jedan=dva
        //dd($request->all());  // display and die()
        //dd($request->jedan); // dohvaćam varijablu iz querystringa
        return "ja sam  content iz /app/http/Usercontroller::action2() :)";
    }
}
