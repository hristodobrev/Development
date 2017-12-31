<?php

namespace ViewEngine;

interface ViewInterface
{
    public function render($viewData = null, $viewName = null);
}