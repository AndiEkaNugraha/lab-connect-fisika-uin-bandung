<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc33639c7f9f37d35c0956bbf063fe322
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc33639c7f9f37d35c0956bbf063fe322::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc33639c7f9f37d35c0956bbf063fe322::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc33639c7f9f37d35c0956bbf063fe322::$classMap;

        }, null, ClassLoader::class);
    }
}
