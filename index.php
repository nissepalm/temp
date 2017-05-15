<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require_once dirname(dirname(dirname(__FILE__))).'/vendor/autoload.php';
require_once 'vendor/autoload.php';

use Klarna\XMLRPC\Klarna;
use Klarna\XMLRPC\Country;
use Klarna\XMLRPC\Language;
use Klarna\XMLRPC\Currency;

$k = new Klarna();

$k->config(
    200,            // Merchant ID
    'test',         // Shared secret
    Country::SE,    // Purchase country
    Language::SV,   // Purchase language
    Currency::SEK,  // Purchase currency
    Klarna::BETA    // Server
);

$k->setCountry('se'); // Sweden only

try {
    $addrs = $k->getAddresses('410321-9202');

    // $addrs is a list of Address instances.

    echo "OK\n";
} catch (\Exception $e) {
    print_r($e);
    echo "{$e->getMessage()} (#{$e->getCode()})\n";
}







/*
require_once dirname(dirname(dirname(__FILE__))).'/vendor/autoload.php';

use Klarna\XMLRPC\Klarna;
use Klarna\XMLRPC\Country;
use Klarna\XMLRPC\Language;
use Klarna\XMLRPC\Currency;

$k = new Klarna();
echo "mmmm";
$k->config(
    200,              // Merchant ID
    'test', // Shared secret
    Country::SE,    // Purchase country
    Language::SV,   // Purchase language
    Currency::SEK,  // Purchase currency
    Klarna::BETA   // Server
);

$addrs = $k->getAddresses('410321-9202');
print_r($addrs);
var_dump( $addrs );




/*
use src\Klarna\XMLRPC\Klarna;
use src\Klarna\XMLRPC\Country;
use src\Klarna\XMLRPC\Language;
use src\Klarna\XMLRPC\Currency;
*/
/*
$k = new Klarna();




$k->config(
    200,              // Merchant ID
    'test', // Shared secret
    Country::SE,    // Purchase country
    Language::SV,   // Purchase language
    Currency::SEK,  // Purchase currency
    Klarna::BETA,  // Server
);

print_r($k,true);
*/
/*
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
curl_exec($ch);
var_dump($ch);
print_r($ch,true);
// close cURL resource, and free up system resources
//curl_close($ch);
*/






/*

$req = new Klarna_Checkout_HTTP_Request('payment.testdrive.klarna.com/get_addresses');
$req->setMethod('GET');
$data = [
	'eid' => '200',
	'pno' => '410321-9202',
	'pno_encoding' => 2,
	'type' => 5,
	'client_ip' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
];
var_dump($data);
$req->setData($data);

$transport = Klarna_Checkout_HTTP_Transport::create();

$res = $transport->send($transport)
var_dump($res);
*/



/*
$url = 'http://payment.testdrive.klarna.com';
//$digest = base64_encode(hex(sha512("[200]:[SEK]:[test]")));
$digest = "test";
echo $digest;
  $ch = curl_init();
  curl_setopt( $ch, CURLOPT_URL, $url );
  curl_setopt( $ch, CURLOPT_POST, false );
  curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  curl_setopt( $ch, CURLOPT_POSTFIELDS, "<methodCall>
    <methodName>get_addresses</methodName>
    <params>
        <param>
            <value>
                <!-- proto_vsn -->
                <string>4.1</string>
            </value>
        </param>
        <param>
            <value>
                <!-- client_vsn -->
                "."<string>xmlrpc:http://192.168.24.124/klarna-invoice-test</string>"."
            </value>
        </param>
        <param>
            <value>
                <!-- pno -->
                <int>4103219202</int>
            </value>
        </param>
        <param>
            <value>
                <!-- merchant id (eid) -->
                <string>200</string>
            </value>
        </param>
        <param>
            <value>
                <!-- shared_secret -->
                <string>$digest</string>
            </value>
        </param>
        <param>
            <value>
                <!-- pno_encoding -->
                <int>2</int>
            </value>
        </param>
        <param>
            <value>
                <!-- type -->
                <int>5</int>
            </value>
        </param>
        <param>
            <value>
                <!-- client_ip -->
                <string>http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]</string>
            </value>
        </param>
    </params>
</methodCall>");

var_dump($ch);
$result = curl_exec($ch);
curl_close($ch);
var_dump($result);
*/