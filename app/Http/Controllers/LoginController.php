<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request){
       return view('login');
    }
    public function loginApi(Request $request){
        $conn = new \GuzzleHttp\Client;
        $name = $request->name;
        $password = $request->password;
        $response = $conn->post('http://127.0.0.1:8888/api/login?',[
            'headers'=>[
                'Authorization'=>'Bearer'.session()->get('token.access')
            ],
            'query'=>[
                'name'=>$name,
                'password'=>$password
            ]
        ]);
        $result = json_decode((string)$response->getBody(),true);
        // dd($result['status']);
        if($result['status'] == 'error'){
            return view('login',['error'=>$result['message']]);
        }else{
            return view('home',['result'=>$result['message']]);
        }
       
        
    }
}
