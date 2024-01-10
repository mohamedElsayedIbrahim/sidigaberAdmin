<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AdmissionService{
    public static function get_all_data(array $branches) : object | array |null {
        
        $response = Http::withToken(env('API_KEY_SECRET'))->withHeaders(['Content-Type'=>'application/json'])->post('https://app.sidigaber.org/api/admission/get',['branch'=>$branches]);

        return $response->json();
    }
}