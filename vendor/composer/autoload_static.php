<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit656e838b182e644a255bed3aa0df52e5
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Component\\Yaml\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit656e838b182e644a255bed3aa0df52e5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit656e838b182e644a255bed3aa0df52e5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit656e838b182e644a255bed3aa0df52e5::$classMap;

        }, null, ClassLoader::class);
    }
}
