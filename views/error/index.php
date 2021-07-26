<?php
// error_reporting(E_ALL);
// ini_set("display_errors", "On");
// echo "Dashboard View(Employees)";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>

    <!-- Script del CDN de Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= NODE_MODULES ?>bootstrap/dist/css/bootstrap.min.css" />

    <!-- Iconos traidos de Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?= CSS ?>/main.css">

</head>

<body class="d-flex min-vh-100 flex-column justify-content-between align-item-between d-inline-block m-0 p-0">

    <?php include VIEWS . "/header.php"; ?>
    <main class="min-vh-50 h-100 d-inline-block">
        <h1><?php echo $this->message; ?></h1>
    </main>
    <?php include "assets/html/footer.html"; ?>
    <script src="<?= NODE_MODULES ?>bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>