<?php 

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


// use Infobip\Api\SmsApi;
// use Infobip\Configuration;
// use Infobip\Model\SmsDestination;
// use Infobip\Model\SmsTextualMessage;
// use Infobip\Model\SmsAdvancedTextualRequest;

// $apiKey = $_ENV['INFOBIP_API_KEY'];
// $baseUrl = $_ENV['INFOBIP_BASE_URL'];

// $message = "This is a demo msg";

// $configuration = new configuration($baseUrl , $apiKey);
// $api = new SmsApi($configuration);

// $destination = new SmsDestination(+919265340766);

// $message = new SmsTextualMessage(
//     destinations:[$destination],
//     text:$message
// );

// $request = new SmsAdvancedTextualRequest(messages:[$message]);

// $response = $api->sendSmsMessage($request);

// echo"message sent";

// require_once 'HTTP/Request2';
require_once __DIR__ . '/vendor/autoload.php';
// $request = new HTTP_Request2();
$request = new \HTTP_Request2();
$request->setUrl('https://qd2d8r.api.infobip.com/sms/2/text/advanced');
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
    'follow_redirects' => TRUE
));
$request->setHeader(array(
    'Authorization' =>"App f62e97de7e3a313292bc406039d41397-53938c13-b843-4c52-93fb-8bb700be9220",
    'Content-Type' => 'application/json',
    'Accept' => 'application/json'
));
$request->setBody('{"messages":[{"destinations":[{"to":"919265340766"}],"from":"919265340766","text":"Congratulations sending your first message. Go ahead and check the delivery report in the next step."}]}');
try {
    $response = $request->send();
    if ($response->getStatus() == 200) {
        echo $response->getBody();
    }
    else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
    }
}
catch(HTTP_Request2_Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>