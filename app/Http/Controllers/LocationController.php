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
        $districts = json_decode(json_encode($response['data']), FALSE);
        return $districts;
    }

    public function getListWard(Request $request){
        $response = Http::get('http://192.168.1.172/login_be/public/api/location/ward',
            [
                'city_id' => $request->city_id,
                'district_id' => $request->district_id,
            ]);
        $wards= json_decode(json_encode($response['data']), FALSE);
        return $wards;
    }
}
