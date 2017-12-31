<?php

namespace Core;

class Application
{
    private $mvcContext;

    /** @var string[] $dependencies */
    private $dependencies = [];

    /** @var object[] $resolvedDependencies */
    private $resolvedDependencies = [];

    public function __construct(\Core\Mvc\MvcContextInterface $mvcContext)
    {
        $this->mvcContext = $mvcContext;
        $this->registerDependency(\Core\Mvc\MvcContextInterface::class, get_class($mvcContext));
        $this->resolvedDependencies[get_class($mvcContext)] = $mvcContext;
    }

    public function start()
    {
        $controllerFullName = 'Controllers\\' . ucfirst($this->mvcContext->getControllerName()) . 'Controller';
        $controller = $this->resolve($controllerFullName);
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
                $this->bindData($_POST, $argument);
                $params[] = $bindingModel;
            }
        }

        call_user_func_array([$controller, $this->mvcContext->getActionName()], $params);
    }

    public function bindData(array $data, $object)
    {
        $reflectionClass = new \ReflectionClass($object);
        $properties = $reflectionClass->getProperties();
        foreach ($properties as $property) {
            if (array_key_exists($property->getName(), $data)) {
                $property->setAccessible(true);
                $property->setValue($object, $data[$property->getName()]);
            }
        }

        return $object;
    }

    public function registerDependency($abstraction, $implmentation)
    {
        $this->dependencies[$abstraction] = $implmentation;
    }

    public function resolve($className)
    {
        if (array_key_exists($className, $this->resolvedDependencies)) {
            return $this->resolvedDependencies[$className];
        }

        $reflectionClass = new \ReflectionClass($className);
        $constructor = $reflectionClass->getConstructor();
        if ($constructor === null) {
            $instance = new $className();
            $this->resolvedDependencies[$className] = $instance;

            return $instance;
        } else {
            $parameters = $constructor->getParameters();

            $arguments = [];
            foreach ($parameters as $parameter) {
                $dependecyInterface = $parameter->getClass();

                $dependencyClass = $this->dependencies[$dependecyInterface->getName()];

                $arguments[] = $this->resolve($dependencyClass);
            }

            $instance = $reflectionClass->newInstanceArgs($arguments);
            $this->resolvedDependencies[$className] = $instance;

            return $instance;
        }
    }
}