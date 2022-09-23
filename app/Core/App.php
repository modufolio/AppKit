<?php

namespace App\Core;

use Exception;
use Modufolio\Http\Response;
use Modufolio\Http\Router as Router;
use Modufolio\Toolkit\Timer;
use Modufolio\Traits\Singleton;
use Throwable;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class App
{
    use Singleton;
    /**
     * Appkit
     *
     * @var string
     */
    const VERSION = '0.0.1';

    protected array $options;
    protected array $routes;
    protected string $uri;
    private string $method;

    public function __construct($config = [])
    {
        $this->setup($config);
    }

    private function setup(array $setup): App
    {
        foreach ($setup as $key => $value) {
            $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * Improved `var_dump` output
     *
     * @return array
     */
    public function __debugInfo(): array
    {
        return [
            'version'   => self::VERSION,
        ];
    }


    /**
     * @throws Throwable
     */
    public function Run(): string
    {

        if ($this->options['debug'] === true) {
            $this->registerErrorHandler();
        }
        try {
            $call = $this->Io((new Router($this->routes))->call($this->uri, $this->method));
        } catch (Exception $e) {
            if ($this->options['debug'] === true) {
                throw $e;
            }
            return Page::notFound();
        }
        return $call;
    }

    private function registerErrorHandler(): void
    {
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler);
        $whoops->register();
    }


    /**
     * @throws Throwable
     */
    public function Io($input): string
    {

        // Simple HTML response
        if (is_string($input) === true) {
            return (new Response($input,'text/html',200, $this->headers()))->send();
        }

        // array to json conversion
        if (is_array($input) === true) {
            return (new Response($input))->json($input, null,200, $this->headers())->send();
        }

        // Response Configuration
        if (is_a($input, '\Modufolio\Http\Response') === true) {
            return $input->send();
        }

        return '';
    }

    public function headers(): array
    {
        return [
            'App' => Timer::app() . ' ms',
        ];
    }
}