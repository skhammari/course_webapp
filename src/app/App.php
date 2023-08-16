<?php

	namespace App;

	use App\Core\Exception\RouteNotFoundException;
	use App\Core\Router;
	use App\Core\View;
	use Twig\Environment;
	use Twig\Loader\FilesystemLoader;

	class App
	{
		public function __construct(protected Router $router, protected array $request)
		{
		}

		public function run(): void
		{
			$loader = new FilesystemLoader(VIEW_PATH);
			$twig = new Environment($loader, [
				'cache' => STORAGE_PATH . '/cache',
			]);

			try {
				echo $this->router->resolve(
					$this->request['uri'],
					strtolower($this->request['method'])
				);
			} catch (RouteNotFoundException) {
				http_response_code(404);

				echo View::make('errors/404');
			}
		}
	}