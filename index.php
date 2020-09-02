<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/views');
$twig = new Environment($loader);


$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$currentUrl = explode('/', $path);


session_start();

if(!isset($_SESSION['loggedin'])) {
    header('Location: login');
    exit;
}

switch ($currentUrl[2]) {
    case '' :
        echo $twig->render('index.php.twig');
        // require __DIR__ . '/views/dashboard.php';
        break;
    case '' :
        require __DIR__ . '/views/index.html.twig';
        break;
    case 'dashboard' :
        echo $twig->render('dashboard.html.twig');
        // require __DIR__ . '/views/dashboard.php';
        break;
    case 'issues' :
        echo $twig->render('issues.html.twig');
        break;
    case 'projects' :
        echo $twig->render('projects.html.twig');
        break;
    case 'users' :
        echo $twig->render('users.html.twig');
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}