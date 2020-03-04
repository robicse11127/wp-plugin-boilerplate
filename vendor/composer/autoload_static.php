<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit843479b9054b7a1257ddc90a55d9f890
{
    public static $files = array (
        '90aa3d193da1b8bce842bab616d9ba95' => __DIR__ . '/../..' . '/installer.php',
        '9c880ceb7a164e81cf4f2d9e765c4a7f' => __DIR__ . '/../..' . '/helpers/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WPPB\\Front\\' => 11,
            'WPPB\\Blocks\\' => 12,
            'WPPB\\Admin\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WPPB\\Front\\' => 
        array (
            0 => __DIR__ . '/../..' . '/public',
        ),
        'WPPB\\Blocks\\' => 
        array (
            0 => __DIR__ . '/../..' . '/blocks',
        ),
        'WPPB\\Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
        ),
    );

    public static $classMap = array (
        'WPPB\\Admin\\Admin' => __DIR__ . '/../..' . '/admin/admin.php',
        'WPPB\\Admin\\Modules\\HelloWorld\\HelloWorld' => __DIR__ . '/../..' . '/admin/Modules/HelloWorld/HelloWorld.php',
        'WPPB\\Blocks\\Blocks' => __DIR__ . '/../..' . '/blocks/Blocks.php',
        'WPPB\\Blocks\\HelloBlock\\HelloBlock' => __DIR__ . '/../..' . '/blocks/HelloBlock/HelloBlock.php',
        'WPPB\\Front\\Front' => __DIR__ . '/../..' . '/public/Front.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit843479b9054b7a1257ddc90a55d9f890::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit843479b9054b7a1257ddc90a55d9f890::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit843479b9054b7a1257ddc90a55d9f890::$classMap;

        }, null, ClassLoader::class);
    }
}
