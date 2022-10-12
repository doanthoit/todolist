<?php

namespace app\core;

class Application
{
    protected static $registry = [];

    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $application;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$application = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public static function bind(string $key, $val)
    {
        static::$registry[$key] = $val;
    }

    public static function get(string $key)
    {
        return static::$registry[$key];
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}