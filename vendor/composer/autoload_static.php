<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9008390e13fdc47cc3727ac042af79fb
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/App',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9008390e13fdc47cc3727ac042af79fb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9008390e13fdc47cc3727ac042af79fb::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit9008390e13fdc47cc3727ac042af79fb::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
