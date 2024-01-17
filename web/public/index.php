<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Minimizer</title>
</head>
<body>
<h1>URL Minimizer</h1>
<form action="minimize.php" method="post">
    <label for="url">Enter URL(without "https://www."):</label>
    <input type="text" name="url" required>
    <br>
    <label for="expiration">Expiration time (minutes):</label>
    <input type="number" name="expiration" value="60" min="1" required>
    <br>
    <button type="submit">Minimize URL</button>
</form>
</body>
</html>
