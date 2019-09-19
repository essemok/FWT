<?php

function get_lang(array $get, array $cookie, array $session, array $server, $default)
{
    return
        !empty($get['lang']) ? $get['lang'] :
            !empty($cookie['lang']) ? $cookie['lang'] :
                !empty($session['lang']) ? $session['lang'] :
                    !empty($server['HTTP_ACCEPT_LANGUAGE']) ? substr($server['HTTP_ACCEPT_LANGUAGE'], 0, 2)
                        : $default;

}

session_start();

$name = !empty($_GET['name']) ? $_GET['name'] : 'Guest';
$lang = get_lang($_GET, $_COOKIE, $_SESSION, $_SERVER, 'spain');
header('X-Developer: Sporysh Semyon');

echo 'Hello, ' . $name . '! Your language is: ' . $lang . PHP_EOL;
