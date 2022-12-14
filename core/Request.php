<?php

namespace app\core;

class Request
{
    /**
     * Get path URL
     * @return mixed|string
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return substr($path, 0 , $position);
    }

    /**
     * Get method action
     * @return string
     */
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}