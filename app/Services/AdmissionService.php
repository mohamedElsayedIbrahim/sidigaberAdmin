<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AdmissionService{
    public static function get_all_data(array $branches,int $page = 1) : object | array |null {
        
        $response = Http::withToken(env('API_KEY_SECRET'))->withHeaders(['Content-Type'=>'application/json'])->post("https://app.sidigaber.org/api/admission/get?page=$page",['branch'=>$branches]);

        return $response->json();
    }

    public static function download_all_data(array $branches) : object | array |null {
        set_time_limit(1000);
        $response = Http::timeout(100)->withToken(env('API_KEY_SECRET'))->withHeaders(['Content-Type'=>'application/json'])->post("https://app.sidigaber.org/api/admission/file/download",['branch'=>$branches]);

        return $response->json();
    }

    public static function get_student_data(string $id) : object | array |null {
        $response = Http::withToken(env('API_KEY_SECRET'))->withHeaders(['Content-Type'=>'application/json'])->post('https://app.sidigaber.org/api/admission/student',['id'=>$id]);

        return $response->json();
    }
}