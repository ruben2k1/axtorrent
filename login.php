<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AXTorrent</title>
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <meta name="robots" content="noindex, nofollow">
</head>
<body>
    <form action="app/controllers/processLogin.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="">
        <label for="password">Password</label>
        <input type="password" name="password" id="">
        <input type="submit" value="Log in">
    </form>
</body>
</html>