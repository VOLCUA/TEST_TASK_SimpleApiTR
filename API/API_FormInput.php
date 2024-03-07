<?php

if(
    isset($_POST['firstName']) &&
    isset($_POST['lastName']) &&
    isset($_POST['phone']) &&
    isset($_POST['email']) &&
    isset($_POST['countryCode']) &&
    isset($_POST['box_id']) &&
    isset($_POST['offer_id']) &&
    isset($_POST['landingUrl']) &&
    isset($_POST['ip'])
){

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $countryCode = $_POST['countryCode'];
    $box_id = $_POST['box_id'];
    $offer_id = $_POST['offer_id'];
    $landingUrl = $_POST['landingUrl'];
    $ip = $_POST['ip'];
    //$password = $_POST['password'];
    $language = $_POST['language'];


$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crm.belmar.pro/api/v1/addlead',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
       "firstName" : "'.$firstName.'",
       "lastName" : "'.$lastName.'",
       "phone" : "'.$phone.'",
       "email" : "'.$email.'",
       "countryCode" : "'.$countryCode.'",
       "box_id" : "'.$box_id.'",
       "offer_id" : "'.$offer_id.'",
       "landingUrl" : "'.$landingUrl.'",
       "ip" : "'.$ip.'",
       "password" : "qwerty12",
       "language" : "'.$language.'",
       "clickId" : "",
       "quizAnswers" : "",
       "custom1" : "",
       "custom2" : "",
       "custom3" : ""
     }'
,
     CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'token: ' . CONFIG_TOKEN),
   ));

   $response = curl_exec($curl);

   curl_close($curl);
   echo $response;
}
else
{
    echo 'Please fill all fields';
}