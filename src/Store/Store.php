<?php

namespace RZQ\TawkTo\Store;

use Exception;

class Store
{
    public static function store($storeId = null)
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => rzq_api_site_url($storeId) . '.rzq',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'Authorization:RZQ ' . env('RZQ_CLIENT_ID') . ':' . env('RZQ_CLIENT_SECRET')
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            return $response;
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}