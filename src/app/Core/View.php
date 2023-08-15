<?php

    namespace App\Core;

    use App\Core\Exception\ViewNotFoundException;

    class View
    {
        public function __construct(
            protected string $view,
            protected array  $params = []
        )
        {
        }

        public static function make(string $string, array $params = []): static
        {
            return new static($string, $params);
        }

	    /**
	     * @throws ViewNotFoundException
	     */
	    public function render(): string
        {
            $viewPath = VIEW_PATH . '/' . $this->view . '.php';

            if (!file_exists($viewPath)) {
                throw new ViewNotFoundException();
            }

            foreach ($this->params as $key => $value) {
                $$key = $value;
            }

            ob_start();

            include $viewPath;

            return (string)ob_get_clean();
        }
    }