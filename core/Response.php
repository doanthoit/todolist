<?php
namespace app\core;

class Response
{
    /**
     * Set statsu code
     * @param int $code
     * @return void
     */
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    /**
     * Action redirect page
     * @param $url
     * @return void
     */
    public function redirect($url)
    {
        header("Location: $url");
    }
}
