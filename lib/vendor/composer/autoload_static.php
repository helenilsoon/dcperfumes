<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2230f073ed33cb0aeed2e09ddb2e23b8
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Traits\\' => 7,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'C' => 
        array (
            'Classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Traits\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../traits',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../models',
        ),
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../classes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2230f073ed33cb0aeed2e09ddb2e23b8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2230f073ed33cb0aeed2e09ddb2e23b8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
