<?php

namespace app\core;

class Controller
{

    public function render($path)
    {
        return Application::$app->route->MainView($path);
    }
}