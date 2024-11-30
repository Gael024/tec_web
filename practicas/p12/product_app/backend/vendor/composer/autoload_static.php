<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit24b3d9a8247309c818708acdce612db9
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TECWEB\\MYAPI\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TECWEB\\MYAPI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit24b3d9a8247309c818708acdce612db9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit24b3d9a8247309c818708acdce612db9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit24b3d9a8247309c818708acdce612db9::$classMap;

        }, null, ClassLoader::class);
    }
}