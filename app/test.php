<?php
/**
 * Created by PhpStorm.
 * User: albert-shala
 * Date: 2014-06-14
 * Time: 10:49 PM
 */

ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "71496187-DKfsbvxz4LV5t40pa1qnrL6lU7uJBqsExDybtzv7U",
    'oauth_access_token_secret' => "WcNxsyqv2pPncZRlrnCt5solInxkcqpBThNM7JtpjHgNm",
    'consumer_key' => "HITQuRCHEVl3zrN9VRnnSY4Ut",
    'consumer_secret' => "fmo4cDX1lXFBBbzcNQD8CU7jAdLLbToHDFyxoBtk6p9txd4tUH"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/blocks/create.json';
$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'usernameToBlock',
    'skip_status' => '1'
);

/** Perform a POST request and echo the response **/
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
    ->setPostfields($postfields)
    ->performRequest();

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/followers/ids.json';
$getfield = '?screen_name=J7mbo';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();