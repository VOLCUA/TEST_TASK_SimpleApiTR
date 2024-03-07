<?php
// Validate input data
$dateFrom = isset($_POST["from"]) ? $_POST["from"] : null;
$dateTo = isset($_POST["to"]) ? $_POST["to"] : null;

if ($dateFrom && $dateTo && strtotime($dateFrom) && strtotime($dateTo)) {
    // Input data is valid, proceed with the cURL request
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crm.belmar.pro/api/v1/getstatuses',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
           "date_from" : "'.$dateFrom.' 00:00:00", 
           "date_to" : "'.$dateTo.' 23:59:59",
           "page" : 0,
           "limit" : 100
         }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'token: '. CONFIG_TOKEN
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
} else {
    // Invalid input data
    echo "Invalid input date values";
}
?>