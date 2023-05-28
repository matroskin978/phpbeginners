<?php


namespace myfrm;


class App
{

    protected static $container;

    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function getContainer()
    {
        return static::$container;
    }

    public static function get($service)
    {
        return static::getContainer()->getService($service);
    }

}