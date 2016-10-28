<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7570d2519b17791fa480b4b8927af915
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pecee\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pecee\\' => 
        array (
            0 => __DIR__ . '/..' . '/pecee/http-service/src/Pecee',
            1 => __DIR__ . '/..' . '/pecee/tinder-sdk/src/Pecee',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7570d2519b17791fa480b4b8927af915::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7570d2519b17791fa480b4b8927af915::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}