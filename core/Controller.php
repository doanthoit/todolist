<?php

namespace app\core;

class Controller
{
    /**
     * Render view with data
     * @param $view
     * @param $params
     * @return array|false|string|string[]
     */
    public function render($view, $params = [])
    {
        return Application::$application->router->renderView($view, $params);
    }
}