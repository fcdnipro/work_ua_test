<?php

$shortCode = $_GET['code'];

$pdo = new PDO('mysql:host=mysql;dbname=test', 'root', 'root');

$stmt = $pdo->prepare("SELECT original_url, clicks, expiration_time, short_url FROM url_stats WHERE short_url = ?");
$stmt->execute([$shortCode]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $originalUrl = $result['original_url'];
    $shortenedUrl = $result['short_url'];
    $clicks = $result['clicks'] + 1;
    $expirationTime = strtotime($result['expiration_time']);

    if ($expirationTime > time() || $expirationTime == 0) {
        $stmt = $pdo->prepare("UPDATE url_stats SET clicks = ? WHERE short_url = ?");
        $stmt->execute([$clicks, $shortCode]);
        echo "<html><head><title>Redirecting...</title></head><body>";
        echo "<p>Shortened URL: <a href='redirect.php?code={$shortCode}'>{$shortenedUrl}</a></p>";
        echo "<p><a href='http://www.{$originalUrl}'>Open original Url</a></p>";
        echo "<p>Clicks: {$clicks}</p>";
        echo "</body></html>";
        exit();
    } else {
        echo "URL has expired.";
    }
} else {
    echo "URL not found.";
}
