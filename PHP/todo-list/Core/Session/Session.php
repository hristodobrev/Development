<?php

namespace Core\Session;

class Session implements SessionInterface
{
    public function get($key)
    {
        return $_SESSION[$key];
    }

    public function exists($key)
    {
        return isset($_SESSION[$key]);
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }
}