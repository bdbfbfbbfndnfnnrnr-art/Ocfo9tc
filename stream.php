<?php
// منع مشاكل الحماية بين المواقع
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/vnd.apple.mpegurl");

// رابط الـ m3u8 المباشر المستخرج
$m3u8_url = "https://dlive.sx/path/to/stream.m3u8";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $m3u8_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// إيهام سيرفر البث بأن الطلب قادم من موقعهم الأصلي
curl_setopt($ch, CURLOPT_REFERER, "https://dlive.sx/");
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36");

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
