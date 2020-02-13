<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita7ce162dac6df3c03e8459d35662fc66
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Framework\\' => 10,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Framework\\' => 
        array (
            0 => __DIR__ . '/..' . '/framework',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\BookProduct4' => __DIR__ . '/../..' . '/app/BookProduct4.php',
        'App\\NotebookProduct4' => __DIR__ . '/../..' . '/app/NotebookProduct4.php',
        'Framework\\Interfaces\\I3D1' => __DIR__ . '/..' . '/framework/interfaces/I3D1.php',
        'Framework\\Interfaces\\IGadget' => __DIR__ . '/..' . '/framework/interfaces/IGadget.php',
        'Framework\\MainProduct4' => __DIR__ . '/..' . '/framework/MainProduct4.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita7ce162dac6df3c03e8459d35662fc66::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita7ce162dac6df3c03e8459d35662fc66::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita7ce162dac6df3c03e8459d35662fc66::$classMap;

        }, null, ClassLoader::class);
    }
}