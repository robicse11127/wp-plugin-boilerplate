<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit156c960e106d38e50ad3b0ad278aef51
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'HR\\Helper\\' => 10,
            'HR\\Front\\' => 9,
            'HR\\Admin\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'HR\\Helper\\' => 
        array (
            0 => __DIR__ . '/../..' . '/helpers',
        ),
        'HR\\Front\\' => 
        array (
            0 => __DIR__ . '/../..' . '/public',
        ),
        'HR\\Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
        ),
    );

    public static $classMap = array (
        'HR\\Admin\\Admin' => __DIR__ . '/../..' . '/admin/Admin.php',
        'HR\\Front\\Front' => __DIR__ . '/../..' . '/public/Front.php',
        'HR\\Helper\\Helpers' => __DIR__ . '/../..' . '/helpers/Helpers.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit156c960e106d38e50ad3b0ad278aef51::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit156c960e106d38e50ad3b0ad278aef51::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit156c960e106d38e50ad3b0ad278aef51::$classMap;

        }, null, ClassLoader::class);
    }
}
