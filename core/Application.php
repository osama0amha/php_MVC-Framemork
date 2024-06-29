<?php

namespace app\core;

class Application
{
    public Route $route;
    public Request $request;
    public Response  $response;
    public Database $dp;
    public static string $DirRoute;
    public static Application $app;

    public function __construct($DIR,$EnvData =[])
    {

        self::$DirRoute = $DIR;
        self::$app = $this;
        $this->response = new Response();
        $this->request = new Request();
        $this->route= new Route($this->request,$this->response);
        $this->dp = new Database($EnvData['dp']);
    }

    public function run():void
    {
        echo $this->route->resolve();
    }
}