<?php
require_once 'anet_php_sdk/AuthorizeNet.php'; // The SDK
$url = "http://queencitytech.com/sustainbrand/transaction.php";
$api_login_id = '9bdY4HtEh2P';
$transaction_key = '4FX5Fzp4vv37X6CX';
$md5_setting = 'b33a46f5ee81f6f0790f3ea9f02468e1'; // Your MD5 Setting
$amount = $_POST['billing_amount'];
AuthorizeNetDPM::directPostDemo($url, $api_login_id, $transaction_key, $amount, $md5_setting);
?>