<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit36cd7a04e16d3f7f773d754eec6faeab
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Wedevs\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Wedevs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit36cd7a04e16d3f7f773d754eec6faeab::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit36cd7a04e16d3f7f773d754eec6faeab::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit36cd7a04e16d3f7f773d754eec6faeab::$classMap;

        }, null, ClassLoader::class);
    }
}
