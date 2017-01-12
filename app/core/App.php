<?php

class App
{
    /**
     * @var string
     */
    protected $controller = 'home';

    /**
     * @var mixed|string
     */
    protected $method = 'index';

    /**
     * @var array
     */
    protected $params = [];

    /**
     * App constructor.
     */
    function __construct()
    {
        $url = $this->parseUrl();

        if (file_exists('../app/controller/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once('../app/controller/' . $this->controller . '.php');

        $this->controller = new $this->controller();

        if (method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    /**
     * @return array
     */
    public function parseUrl()
    {

        if (!empty($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }

        return ['home', 'index'];
    }
}
