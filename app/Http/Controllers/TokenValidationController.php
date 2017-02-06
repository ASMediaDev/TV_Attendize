<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenValidationController extends Controller
{

    public function validateToken(){

        $returnValue["status"]="200";
        $returnValue["message"]="token valid";
        echo json_encode($returnValue);
        //return;


    }
}
