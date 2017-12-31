<?php

namespace TemplateEngine;


interface TemplateEngineInterface
{
    public function renderTemplate($templateName, $error, $info, $postBackup, $data = null);
}