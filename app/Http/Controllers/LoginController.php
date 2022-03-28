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
        // $conn = new \GuzzleHttp\Client;
        $username = $request->username;
        $password = $request->password;
        // $response = $conn->post('http://192.168.1.172/login_be/public/api/login?',[
        //     'headers'=>[
        //         'Authorization'=>'Bearer'.session()->get('token.access')
        //     ],
        //     'query'=>[
        //         'username'=>$username,
        //         'password'=>$password
        //     ]
        // ]);
        // dd($username, $password);
        $response = Http::post('http://192.168.1.172/login_be/public/api/login', [
            'username'=> $username,
            'password'=> $password
        ]);
        $result = json_decode((string)$response->getBody(),true);
        // dd($result['status']);
        if($result['status'] == 'error'){
            return view('login',['error'=>$result['message']]);
        }else{
            $response = Http::get('http://192.168.1.172/login_be/public/api/account/list');       
             $data = json_decode(json_encode($response['data']), FALSE);
            return view('Account.list',['users'=> $data]);
        }
       
        
    }
}
