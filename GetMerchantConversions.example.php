<?php 
	header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');

        $curl = curl_init();

        $author = base64_encode('username:password');

        $data_post = array(
            "sdate" => "20210101",
            "edate" => "20210130",
            "limit" => 10,
            "page" => 3
        );

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.adpia.vn/v2/merchant/get_conversions",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_SSL_VERIFYPEER => FALSE,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($data_post),
          CURLOPT_HTTPHEADER => array(
            "authorization: Basic ".$author,
            "cache-control: no-cache",
            "content-type: application/json",
          )
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
