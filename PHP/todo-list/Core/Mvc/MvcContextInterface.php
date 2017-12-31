<?php

namespace Core\Mvc;


interface MvcContextInterface
{
    function getControllerName();

    function getActionName();

    function getParams();
}