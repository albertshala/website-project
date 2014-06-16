<?php
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "71496187-DKfsbvxz4LV5t40pa1qnrL6lU7uJBqsExDybtzv7U",
    'oauth_access_token_secret' => "WcNxsyqv2pPncZRlrnCt5solInxkcqpBThNM7JtpjHgNm",
    'consumer_key' => "KElZJH9UAa6dqnm2Kvi5T0mQB",
    'consumer_secret' => "Q2Mvdpb9wYHy3EKy6BN7zt1u8WDF0OCtq39B0DKKxyVUUqojsW"
);

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

$requestMethod = "GET";
if (isset($_GET['user'])) {$user = $_GET['user'];} else {$user = "iagdotme";}
if (isset($_GET['count'])) {$user = $_GET['count'];} else {$count = 20;}
$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
foreach($string as $items)
{
    echo "Time and Date of Tweet: ".$items['created_at']."<br />";
    echo "Tweet: ". $items['text']."<br />";
    echo "Tweeted by: ". $items['user']['name']."<br />";
    echo "Screen name: ". $items['user']['screen_name']."<br />";
    echo "Followers: ". $items['user']['followers_count']."<br />";
    echo "Friends: ". $items['user']['friends_count']."<br />";
    echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
}