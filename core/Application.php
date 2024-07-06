<?php

namespace app\core;

use app\Model\User;

class Application
{
    public Route $route;
    public Request $request;
    public Response  $response;
    public Database $dp;
    public Session $session;
    public static string $DirRoute;
    public static Application $app;
    public ?DbModel $user;

    public function __construct($DIR,$EnvData =[])
    {

        self::$DirRoute = $DIR;
        self::$app = $this;
        $this->response = new Response();
        $this->request = new Request();
        $this->route= new Route($this->request,$this->response);
        $this->dp = new Database($EnvData['dp']);
        $this->session = new Session();

        $uniqueValue = $_SESSION['user'] ?? false;
        if($uniqueValue){
            $classUser = $EnvData['ClassUser'];
            /** @var  User $classUser */
            $UniqueKey = $classUser::Unique();
            $this->user = $classUser::findOn([$UniqueKey => $uniqueValue]);

        }

    }

    public function run():void
    {
        echo $this->route->resolve();
    }

    public function login($user)
    {
        $this->user = $user;
        $unique = User::Unique();
        $userUnique = $this->user->{$unique};
        self::$app->session->set($userUnique);
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }

    public function IsFound()
    {
        return $_SESSION['user']??false;
    }
}