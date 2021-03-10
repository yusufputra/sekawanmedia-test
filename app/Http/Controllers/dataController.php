<?php

namespace App\Http\Controllers;

use App\Models\DataKaryawan;
use Illuminate\Http\Request;

class dataController extends Controller
{
    public function index()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://static.sekawanmedia.co.id/data.json");
        $result = curl_exec($ch);
        curl_close($ch);
        return response()->json(["data" => $result]);
    }

    public function save(Request $request)
    {
        $body = array();
        for ($i = 0; $i < $request->count; $i++) {
            array_push($body, ["idKaryawan" => $request->req[$i]['id'], "employee_name" => $request->req[$i]['employee_name'], "employee_salary" => $request->req[$i]['employee_salary'], "employee_age" => $request->req[$i]['employee_age'], "profile_image" => $request->req[$i]['profile_image'] == null ? "" : $request->req[$i]['profile_image']]);
        }

        $result = DataKaryawan::insert($body);
        return response()->json(["result" => $result]);
    }
}
