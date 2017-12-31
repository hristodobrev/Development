<?php

namespace Core\Session;


interface SessionInterface
{
    public function get($key);

    public function exists($key);

    public function set($key, $value);

    public function remove($key);
}