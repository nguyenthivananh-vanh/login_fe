<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function index(Request  $request){
        $limit = $request->limit;
        $current_page = $request->current_page;
        if(isset($limit) && $limit > 0){
            $limit = $request->limit;
        }else{
            $limit = 3;
        }

        if(isset($current_page) && $current_page > 0){
            $current_page = $request->current_page;
        }else{
            $current_page = 1;
        }
        $response = Http::get('http://192.168.1.172/login_be/public/api/account/list' ,[
            'current_page' => $current_page,
            'limit' => $limit,

        ]);
        $data = json_decode(json_encode($response['data']), FALSE);
//        $data = $response['data'];
        $total_page = $response['total_page'];
        $current_page = $response['current_page'];
        $limit = $response['limit'];
//        dd($data);
        return view('Account.list',['users'=>$data, 'current_page' => $current_page, 'total_page'=> $total_page, 'limit' => $limit]);
    }

    public function create(Request  $request){
        if(isset($request->id)){
            $response = Http::get('http://192.168.1.172/login_be/public/api/account/find',
            [
                'id' => $request->id,
            ]);
            $data = json_decode(json_encode($response['data']), FALSE);
           return view('Account.add',['data'=> $data]);
        }
        return view('Account.add');
    }
    public function postAccount(Request $request){
        try
        {
            $response = Http::post('http://192.168.1.172/login_be/public/api/account/add',[
                'username' => $request->username,
                'email'    => $request->email
            ]);
            // dd($response);
            $result = json_decode((string)$response->getBody(),true);
            // dd($result['status']);
            if($result['status'] == 'error'){
                return view('Account.add',['error'=>$result['message']]);
            }else{
                return view('Account.add',['success'=> $result['message']]);
            }

        }
        catch (\Exception $e)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi, vui lòng quay trở lại sau',
                'data' => []
            ], 500);
        }
    }

}
