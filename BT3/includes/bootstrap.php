<?php
define('DEV', true);
$this_folder   = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']));
$parent_folder = dirname($this_folder, 2);
define("DOC_ROOT", $parent_folder . '/views/');
define('APP_ROOT', dirname(__FILE__, 2));

if (DEV === false) {
    set_exception_handler('handle_exception');
    set_error_handler('handle_error');
    register_shutdown_function('handle_shutdown');
}

spl_autoload_register(function ($class) {
    $path = 'configs/' . $class . '.php';
    if (file_exists($path))
        require_once $path;
});

spl_autoload_register(function ($class) {
    $path = 'controllers/' . $class . '.php';
    if (file_exists($path))
        require_once $path;
});

spl_autoload_register(function ($class) {
    $path = 'models/' . $class . '.php';
    if (file_exists($path))
        require_once $path;
});

spl_autoload_register(function ($class) {
    $path = 'services/' . $class . '.php';
    if (file_exists($path))
        require_once $path;
});
