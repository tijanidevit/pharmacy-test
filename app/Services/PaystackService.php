<?php

namespace App\Services;
use App\Interfaces\IPayment;

class PaystackService implements IPayment {
    public function acceptPayment($amount) {
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => auth()->user()->email,
            'amount' => $amount * 100
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();
        $secretKey = config('services.paystack.secret_key');
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $secretKey",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        return $result;
    }
}
