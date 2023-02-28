<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit2f0abcd50e2ea58b3f4560d21aa9c6db
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit2f0abcd50e2ea58b3f4560d21aa9c6db', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit2f0abcd50e2ea58b3f4560d21aa9c6db', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit2f0abcd50e2ea58b3f4560d21aa9c6db::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}