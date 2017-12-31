<?php

namespace TemplateEngine;

class TemplateEngine implements TemplateEngineInterface
{
    const TEMPLATE_FOLDER = 'Templates';

    public function renderTemplate($templateName, $error, $info, $postBackup, $data = null)
    {
        include self::TEMPLATE_FOLDER .
            DIRECTORY_SEPARATOR .
            $templateName .
            '.php';
    }
}