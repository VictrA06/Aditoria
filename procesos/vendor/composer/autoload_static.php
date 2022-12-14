<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb960070f44afe3b6f5bf5b2190ffc202
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb960070f44afe3b6f5bf5b2190ffc202::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb960070f44afe3b6f5bf5b2190ffc202::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb960070f44afe3b6f5bf5b2190ffc202::$classMap;

        }, null, ClassLoader::class);
    }
}
