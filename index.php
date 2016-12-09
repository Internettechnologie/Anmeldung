<?php
session_name('bumpr');
session_start();
require 'server/config.php';

if (isset($_GET['logout']) && isset($_SESSION['login'])) {
    session_destroy();
    header('Location: ./');
}

if (isset($_SESSION['login']) && $_SESSION['login']) {

    require 'server/newBlogPost.php';
    require 'server/overviewBlogPosts.php';
    require 'pages/site_home.php';

} else if (isset($_POST['username']) && isset($_POST['password'])) {

    $user = $_POST['username'];
    $password = sha1($_POST['password']);

    require 'server/authentication.php';

    checkUserLoginAllowed($user, $password);

    header('Location: ./');

} else {

    require 'pages/site_login.php';

}

