<?php

namespace app\core;

class Application
{
    public Route $route;
    public Request $request;
    public Response  $response;
    public static string $DirRoute;
    public static Application $app;

    public function __construct($DIR)
    {
        self::$DirRoute = $DIR;
        self::$app = $this;
        $this->response = new Response();
        $this->request = new Request();
        $this->route= new Route($this->request,$this->response);
    }

    public function run()
    {
        echo $this->route->resolve();

    }
}