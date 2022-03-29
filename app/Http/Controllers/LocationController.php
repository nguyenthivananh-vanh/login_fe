<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    public function index(){
        $response = Http::get('http://192.168.1.172/login_be/public/api/location/city');
        $data = json_decode(json_encode($response['data']), FALSE);
        return view('location', ['cities'=> $data]);
    }

    public function getListDistrict(Request $request){
        $response = Http::get('http://192.168.1.172/login_be/public/api/location/district',
        [
            'id' => $request->id,
        ]);
        $data = json_decode(json_encode($response['data']), FALSE);
        dd($request->id);
        return view('location', ['districts'=> $data]);
    }
}
