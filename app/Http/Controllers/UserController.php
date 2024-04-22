<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    public static function index()
    {
        //         $rutica = ; // Illuminate\Routing\Route
        // $name = Route::currentRouteName(); // string
        // $action = Route::currentRouteAction(); // string

        return "ja sam  /app/http/Usercontroller::index() :)"
            // ." current route: ".Route::current()->
            . " current action " . Route::currentRouteName()
            . " current route name " . Route::currentRouteAction();;
    }
    //Route::get('/sviuseri') -> http://localhost:8000/sviuseri
    public static function sviuseri(Request $request): View
    {

        // DB::select() vraća array čiji su elementi objekti, čija su svojstva stupci tablice
        // $users = DB::select('select * from users where active = ?', [1]);
        $users = DB::select('SELECT * FROM users WHERE remember_token = ? OR remember_token IS NULL', [1]);
        $brojusera = DB::select('SELECT count(*) AS ukupno  FROM users');
        $brojusera2 = DB::scalar('SELECT count(*) AS ukupno  FROM users');
        //return view('korisnici.index', ['users' => $users]);
        return view('korisnici.index', compact('users', 'brojusera', 'brojusera2'));
    }
    public static function dodajKorisnika(Request $request)
    {
        //INSERT INTO `sakila`.`users` (`name`, `email`, `password`) VALUES ('alejandrin77@example.net', 'alejandrin77@example.net', 'alejandrin77@example.net');

        DB::insert(
            'INSERT INTO `sakila`.`users` (`name`, `email`, `password`) VALUES (?, ?, ?)',
            [
                'alejandrin' . random_int(0, 1000) . '@example.net', 'alejandrin' . random_int(0, 1000) . '@example.net', 'alejandrin' . random_int(0, 1000) . '@example.net'
            ]
        );
        return response()->redirectToAction([UserController::class, 'sviuseri']);
    }
    public static function updateKorisnika(Request $request)
    {
        //UPDATE `sakila`.`users` SET `updated_at`='2024-04-22 19:23:44' WHERE  `id`=29;
        DB::transaction(function () {
            $broj1 = DB::update(
                'UPDATE `sakila`.`users` SET `updated_at`=? WHERE  `id`=26',
                [date("Y-m-d H:i:s")]
            );
            $broj1 = DB::update(
                'UPDATE `sakila`.`users` SET `updated_at`=? WHERE  `id`=29',
                [date("Y-m-d H:i:s")]
            );
        }, 5);
        /**
         * @see https://laravel.com/docs/11.x/database#manually-using-transactions
         */
        DB::beginTransaction();
        $brojoperacija = 0;
        $brojoperacija += DB::update(
            'UPDATE `sakila`.`users` SET `updated_at`=? WHERE  `id`=31',
            [date("Y-m-d H:i:s")]
        );
        $brojoperacija +=  DB::update(
            'UPDATE `sakila`.`users` SET `updated_at`=? WHERE  `id`=30',
            [date("Y-m-d H:i:s")]

        );
        if ($brojoperacija == 2) {
            DB::commit();
        } else {
            DB::rollBack();
        }


        return response()->redirectToAction([UserController::class, 'sviuseri']);
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
        return response()->redirectToAction([UserController::class, 'action2'], parameters: ["jedan" => "dva"]);

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
