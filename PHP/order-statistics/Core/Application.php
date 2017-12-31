<?php

namespace Core;

use Core\Mvc\MvcContextInterface;
use ViewEngine\View;

class Application
{
    /**
     * @var string[] $dependencies
     */
    private $dependencies = [];

    /**
     * @var object[] $resolvedDependencies
     */
    private $resolvedDependencies = [];

    /**
     * @var MvcContextInterface $mvcContext
     */
    private $mvcContext;

    public function __construct(MvcContextInterface $mvcContext)
    {
        $this->mvcContext = $mvcContext;
        $this->registerDependency(MvcContextInterface::class, get_class($mvcContext));
        $this->resolvedDependencies[get_class($mvcContext)] = $mvcContext;
    }

    public function getControllerName(): string
    {
        return $this->mvcContext->getControllerName() . 'Controller';
    }

    public function start()
    {
        $controllerName = $this->getControllerName();
        $fullControllerName = 'Controllers\\' . ucfirst($controllerName);
        $controller = $this->resolve($fullControllerName);
        $actionName = $this->mvcContext->getActionName();
        $params = $this->mvcContext->getParams();

        $refMethod = new \ReflectionMethod($controller, $actionName);
        $refParams = $refMethod->getParameters();
        $count = count($params);
        for ($i = $count; $i < count($refParams); $i++) {
            $argument = $refParams[$i];
            $argumentInterface = $argument->getClass()->getName();
            if (array_key_exists($argumentInterface, $this->dependencies)) {
                $argumentClass = $this->dependencies[$argumentInterface];
                $params[] = $this->resolve($argumentClass);
            } else {
                $bindingModel = new $argumentInterface;
                $this->bindData($_POST, $bindingModel);
                $params[] = $bindingModel;
            }
        }

        call_user_func_array([$controller, $this->mvcContext->getActionName()], $params);
    }

    public function registerDependency(string $abstraction, string $implementation)
    {
        $this->dependencies[$abstraction] = $implementation;
    }

    public function resolve($className)
    {
        if (array_key_exists($className, $this->resolvedDependencies)) {
            return $this->resolvedDependencies[$className];
        }

        $refClass = new \ReflectionClass($className);
        $constructor = $refClass->getConstructor();

        if ($constructor == null) {
            $object = new $className;
            $this->resolvedDependencies[$className] = $object;

            return $object;
        } else {
            $params = $constructor->getParameters();

            $arguments = [];
            foreach ($params as $param) {
                $dependencyInterface = $param->getClass();
                $dependencyClass = $this->dependencies[$dependencyInterface->getName()];
                $arguments[] = $this->resolve($dependencyClass);
            }

            $object = $refClass->newInstanceArgs($arguments);
            $this->resolvedDependencies[$className] = $object;

            return $object;
        }
    }

    public function bindData(array $data, $object)
    {
        $refClass = new \ReflectionClass($object);
        $fields = $refClass->getProperties();

        foreach ($fields as $field) {
            $field->setAccessible(true);
            if (array_key_exists($field->getName(), $data)) {
                $field->setValue($data[$field->getName()]);
            }
        }
    }
}