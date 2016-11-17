<?php 

$service_url = 'curl   -T upload_to_oar.xml  http://oar.sci-gaia.eu/batchuploader/robotupload/insert -A invenio_webupload -H "Content-Type: application/marcxml+xml"';
$curl = curl_init($service_url);
$curl_post_data = array(
        'message' => 'This is a test message',
        'useridentifier' => 'olusola.olabanjo@lasu.edu.ng',
        'department' => 'futuregateway',
        'subject' => 'My first conversation',
        'recipient' => 'olusola.olabanjo@lasu.edu.ng',
        'apikey' => 'ab487d0b-7310-448d-95ca-4b9f1d636467'
);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additional info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo 'response ok!';
var_export($decoded->response);



?>





<?php

function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value

//$data = array('recipient' => '07063498437', 'username' => 'WNCC', 'password' => 'college', 'sender' => 'WNCC', 'message' => 'There u go!');
$service_url = 'curl   -T upload_to_oar.xml  http://oar.sci-gaia.eu/batchuploader/robotupload/insert -A invenio_webupload -H "Content-Type: application/marcxml+xml"';

echo CallAPI('POST', $service_url);
?>
