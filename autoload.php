<?php
spl_autoload_register(function ($class) {
    $folders = ['Config', 'Controller', 'DAO', 'model', 'Helpers'];
    foreach ($folders as $folder) {
        $path = __DIR__ . "/$folder/$class.php";
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});
