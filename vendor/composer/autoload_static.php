<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfa2cef7408d8b1d0dd335666533865c1
{
    public static $classMap = array (
        'App\\DB' => __DIR__ . '/../..' . '/src/DB/DB.php',
        'App\\Request' => __DIR__ . '/../..' . '/src/Request/Request.php',
        'App\\Response' => __DIR__ . '/../..' . '/src/Response.php',
        'App\\Router' => __DIR__ . '/../..' . '/src/Router/Router.php',
        'appController' => __DIR__ . '/../..' . '/app/Controllers/appController.php',
        'app\\Controller' => __DIR__ . '/../..' . '/app/Controllers/Controller.php',
        'app\\View' => __DIR__ . '/../..' . '/src/View/View.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitfa2cef7408d8b1d0dd335666533865c1::$classMap;

        }, null, ClassLoader::class);
    }
}
