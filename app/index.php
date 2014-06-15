<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "71496187-DKfsbvxz4LV5t40pa1qnrL6lU7uJBqsExDybtzv7U",
    'oauth_access_token_secret' => "WcNxsyqv2pPncZRlrnCt5solInxkcqpBThNM7JtpjHgNm",
    'consumer_key' => "KElZJH9UAa6dqnm2Kvi5T0mQB",
    'consumer_secret' => "Q2Mvdpb9wYHy3EKy6BN7zt1u8WDF0OCtq39B0DKKxyVUUqojsW"
);


/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/followers/ids.json';
$getfield = '?screen_name=albert_shala';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
