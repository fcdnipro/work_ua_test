<?php

$originalUrl = $_POST['url'];
$expirationHours = $_POST['expiration'];

$shortCode = substr(md5(uniqid()), 0, 8);

$expirationTime = date('Y-m-d H:i:s', strtotime("+{$expirationHours}  minutes"));

$pdo = new PDO('mysql:host=mysql;dbname=test', 'root', 'root');
$stmt = $pdo->prepare("INSERT INTO url_stats (original_url, short_url, expiration_time) VALUES (?, ?, ?)");
$stmt->execute([$originalUrl, $shortCode, $expirationTime]);
$shortenedUrl = $shortCode;
echo "<html><head><title>Redirecting...</title></head><body>";
echo "<p>Shortened URL: <a href='redirect.php?code={$shortCode}'>{$shortenedUrl}</a></p>";
echo "</body></html>";
