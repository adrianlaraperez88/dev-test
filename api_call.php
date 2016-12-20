<?php
/**
 * Created by PhpStorm.
 * User: lara
 * Date: 12/19/16
 * Time: 1:38 PM
 */
function api_call($page = Null)
{
    //next example will recieve all messages for specific conversation
    $service_url = 'http://swapi.co/api/starships/';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }
    curl_close($curl);
    $decoded = json_decode($curl_response);
    if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
        die('error occured: ' . $decoded->response->errormessage);
    }
    echo 'response ok!';
    echo "<pre>";
    print_r($decoded->count);
    echo "</pre>";
}

function num_page()
{
    $i = 1;
    $flag = true;
    do {

        $service_url = 'http://swapi.co/api/starships/?page=' . $i;
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        if ($curl_response === false) {
            $info = curl_getinfo($curl);
            curl_close($curl);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($curl);
        $decoded = json_decode($curl_response);
        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
            die('error occured: ' . $decoded->response->errormessage);
        }
        if ($decoded->next == null) {
            echo $i;
            $flag = false;
        }else{
            echo $decoded->next;
        }
    } while ($flag);
    return $i;
}


$service_url = 'http://swapi.co/api/starships/?page=3';
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}

if ($decoded->next == null) {
    echo "ok no hay mas";

}
echo 'response ok!';
echo "<pre>";
print_r($decoded->next);
echo "</pre>";


