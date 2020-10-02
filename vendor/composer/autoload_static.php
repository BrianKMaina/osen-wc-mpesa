<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitee2336e6c74de9cd049c80ed0615e1fc
{
    public static $files = array (
        'dfceb480b9ce78a93ab4222e950a3686' => __DIR__ . '/../..' . '/gateway.php',
    );

    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Osen\\Woocommerce\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Osen\\Woocommerce\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Osen\\Woocommerce\\Admin\\Menu' => __DIR__ . '/../..' . '/src/Admin/Menu.php',
        'Osen\\Woocommerce\\Admin\\Settings\\B2C' => __DIR__ . '/../..' . '/src/Admin/Settings/B2C.php',
        'Osen\\Woocommerce\\Admin\\Withdraw' => __DIR__ . '/../..' . '/src/Admin/Withdraw.php',
        'Osen\\Woocommerce\\Initialize' => __DIR__ . '/../..' . '/src/Initialize.php',
        'Osen\\Woocommerce\\Mpesa\\B2C' => __DIR__ . '/../..' . '/src/Mpesa/B2C.php',
        'Osen\\Woocommerce\\Mpesa\\C2B' => __DIR__ . '/../..' . '/src/Mpesa/C2B.php',
        'Osen\\Woocommerce\\Mpesa\\STK' => __DIR__ . '/../..' . '/src/Mpesa/STK.php',
        'Osen\\Woocommerce\\Post\\Metaboxes\\C2B' => __DIR__ . '/../..' . '/src/Post/Metaboxes/C2B.php',
        'Osen\\Woocommerce\\Post\\Types\\B2C' => __DIR__ . '/../..' . '/src/Post/Types/B2C.php',
        'Osen\\Woocommerce\\Post\\Types\\C2B' => __DIR__ . '/../..' . '/src/Post/Types/C2B.php',
        'Osen\\Woocommerce\\Utilities' => __DIR__ . '/../..' . '/src/Utilities.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitee2336e6c74de9cd049c80ed0615e1fc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitee2336e6c74de9cd049c80ed0615e1fc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitee2336e6c74de9cd049c80ed0615e1fc::$classMap;

        }, null, ClassLoader::class);
    }
}