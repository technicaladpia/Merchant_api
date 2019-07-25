<?php 
	$token = base64_encode('merchant_id:password'); 
	//Let add infor your account
	$dataPost = array("conversion_id" => "1000232132421");
	
	$curl = curl_init('http://event.adpia.vn/apiv2/updateConversions');
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	// method api
	curl_setopt($curl, CURLOPT_POSTFIELDS, $dataPost);
	// post api with data cause from input form
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'authorization: Basic '.$token)
	);
	$result = curl_exec($curl);
	curl_close($curl);
	//respon data 
	var_dump($result);
