<?php
    session_start();

    if(isset($_SESSION['login']) && $_SESSION['login']==true){
        redirect('./dashboard.php', false);
    }

    function redirect($url, $permanent = false){
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/svg/logo_icon.svg" type="image/svg">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="min-h-[100vh] flex items-center justify-center">
    <form action="" method="post" class="flex rounded-md flex-col item-center justify-center gap-4 p-8 bg-gray-200">
        <div class="flex flex-col items-start gap-2 justify-center">
            Username
            <input class="text-lg p-4 rounded-md" type="text" name="username" id="username" placeholder="Username">
        </div>
        <div class="flex flex-col items-start gap-2 justify-center">
            Password
            <input class="text-lg p-4 rounded-md" type="password" name="password" id="password" placeholder="Password">
        </div>
        <button class="w-full py-3 text-lg bg-green-400 text-white rounded-md" type="submit">Login</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['username']=='admin' && $_POST['password']=='admin123'){
            // session_start();    
            $_SESSION['login'] = true;

            redirect('./dashboard.php');
        }        
    ?>
</body>
</html>