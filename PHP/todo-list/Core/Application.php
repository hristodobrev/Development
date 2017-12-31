<?php

namespace Core;


use Core\Mvc\MvcContextInterface;
use Core\Session\SessionInterface;

class Application
{
    const CONTROLLERS_FOLDER = 'Controllers';
    const CONTROLLERS_SUFIX = 'Controller';

    /**
     * @var MvcContextInterface
     */
    private $mvcContext;

    private $session;

    /**
     * @var string[] $dependencies
     */
    private $dependencies = [];

    /**
     * @var object[] $resolvedDependencies
     */
    private $resolvedDependencies = [];

    function __construct(MvcContextInterface $mvcContext, SessionInterface $session)
    {
        $this->mvcContext = $mvcContext;
        $this->registerDependency(MvcContextInterface::class, get_class($mvcContext));
        $this->resolvedDependencies[get_class($mvcContext)] = $mvcContext;

        $this->session = $session;
        $this->registerDependency(SessionInterface::class, get_class($session));
        $this->resolvedDependencies[get_class($session)] = $session;

        set_exception_handler(function ($exception) use ($session) {
            $db = new \mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASS, Config::DB_LOG_NAME);
            $stmt = $db->prepare('INSERT INTO exceptions(`message`, `file`, `line`) VALUES(?, ?, ?)');
            $stmt->bind_param('ssi', $exception->getMessage(), $exception->getFile(), $exception->getLine());
            $stmt->execute();

            $errors = [];
            if ($session->exists('errors')) {
                $errors = $session->get('errors');
            }

            $errors[] = 'An internal server error has occurred.';
            $session->set('errors', $errors);
            header('Location: /todo-list/home/index');
        });
    }

    function start()
    {
        $controllerName = self::CONTROLLERS_FOLDER . DIRECTORY_SEPARATOR . $this->mvcContext->getControllerName() . self::CONTROLLERS_SUFIX;
        $controller = $this->resolve($controllerName);
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
            }
        }

        call_user_func_array([$controller, $actionName], $params);
    }

    /**
     * @param string $abstraction
     * @param object $implementation
     */
    public function registerDependency($abstraction, $implementation)
    {
        $this->dependencies[$abstraction] = $implementation;
    }

    public function resolve($className)
    {
        if (array_key_exists($className, $this->resolvedDependencies)) {
            return $this->resolvedDependencies[$className];
        }

        $reflectionClass = new \ReflectionClass($className);
        $constructor = $reflectionClass->getConstructor();
        if (!$constructor) {
            $instance = new $className();
            $this->resolvedDependencies[$className] = $instance;

            return $instance;
        } else {
            $params = $constructor->getParameters();

            $arguments = [];
            foreach ($params as $param) {
                $dependencyInterface = $param->getClass();

                $dependencyClass = $this->dependencies[$dependencyInterface->getName()];

                $arguments[] = $this->resolve($dependencyClass);
            }

            $instance = $reflectionClass->newInstanceArgs($arguments);
            $this->resolvedDependencies[$className] = $instance;

            return $instance;
        }
    }
}