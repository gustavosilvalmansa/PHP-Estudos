<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3d392ff2b78f3d1f3abe3be07bc5eea0
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Gustavoalmansa\\Composer\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Gustavoalmansa\\Composer\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit3d392ff2b78f3d1f3abe3be07bc5eea0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3d392ff2b78f3d1f3abe3be07bc5eea0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3d392ff2b78f3d1f3abe3be07bc5eea0::$classMap;

        }, null, ClassLoader::class);
    }
}