<?php

namespace ViewEngine;


class Template
{
    const TEMPLATES_FOLDER = 'Templates';

    public static function render($template, $data = null, $useLayout = true)
    {
        if ($useLayout) {
            require  self::TEMPLATES_FOLDER . '/Layout/header.php';
        }
        require self::TEMPLATES_FOLDER . '/' . $template . '.php';
    }
}