<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae2c296367755c2c43fbee69ce518330
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae2c296367755c2c43fbee69ce518330::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae2c296367755c2c43fbee69ce518330::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
