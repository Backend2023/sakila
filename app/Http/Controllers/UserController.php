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
}
