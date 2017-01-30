<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(){

        $userName = htmlentities($_REQUEST["userName"]);
        $userPassword = htmlentities($_REQUEST["userPassword"]);

        //echo $userName;
        //echo $userPassword;



        //$user = DB::connection('mysql')->select('SELECT * FROM users WHERE email = ?', [$userName]);
        $user = DB::table('users')->where('email', $userName)->first();


        $hash_pwd = $user->password;
        $hash = password_verify($userPassword, $hash_pwd);

        if($hash == 0){
            $returnValue["status"]="403";
            $returnValue["message"]="false hash";
            echo json_encode($returnValue);
            return;


        }else {
            $returnValue["status"]="200";
            $returnValue["message"]="success";
            echo json_encode($returnValue);
            return;

        }






    }
}
