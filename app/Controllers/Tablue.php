<?php

namespace App\Controllers;

class Tablue extends BaseController
{
    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        
        CURLOPT_URL => 'https://dvsa.dswd.gov.ph/trusted?username=svc_tableaussl&server=https://dvsa.dswd.gov.ph',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        
        ));
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($curl);
        if(curl_error($curl)){
            echo 'Request Error:'. curl_error($curl);
        }
        curl_close($curl);
        //###########################################################

        //return $response;
        //echo $response;
        // echo $response;
        
        return view('tablue');
        //echo 'asdasd';
        
    }

}
