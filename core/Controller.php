<?php

namespace app\core;

class Controller
{

    public function render($path,$params=[])
    {
        return Application::$app->route->MainView($path,$params);
    }

    public function isGet():bool
    {
        return Application::$app->request->isGET();
    }

    public function isPost():bool
    {
        return Application::$app->request->isPOST();
    }
}