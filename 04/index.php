<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// var_dump($uri);

$routs= [
    '/' => 'controllers/index.controller.php',
    '/contact' => 'controllers/contact.controller.php',
    '/about-me' => 'controllers/about-me.controller.php'
];

if (array_key_exists($uri, $routs) && preg_match('`[/a-z_-]`', $uri)) {
    require $routs[$uri];
} else {
    http_response_code(404);
    abort();
}

function abort($code = 404) {
    http_response_code($code);

    require "views/{$code}.view.php";

    die();
}

require "views/index.view.php";