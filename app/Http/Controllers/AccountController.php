<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function index(Request $request){
        
        // dd($username, $password);
        $response = Http::get('http://192.168.1.172/login_be/public/api/list');

       
        
    }
}
