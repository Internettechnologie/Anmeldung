<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>bumpr</title>
    <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>


<?php
require 'site_header.php';
?>

<main>

    <?php

    $page = 'site_overview.php';
    $pages = [
        'new_blogpost' => 'site_newBlogPost.php'
    ];

    foreach ($pages as $key => $value) {
        if (isset($_GET[$key])) {
            $page = $value;
            break;
        }
    }

    require $page;

    ?>


</main>

<footer>

</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>