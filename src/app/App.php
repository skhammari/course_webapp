<?php

	namespace App;

	use App\Core\Exception\RouteNotFoundException;
	use App\Core\Router;
	use App\Core\View;
	use Twig\Environment;
	use Twig\Loader\FilesystemLoader;

	class App
	{
		private static DB $db;

		public function __construct(
			protected Container $container,
			protected Router $router,
			protected array $request,
			protected Config $config
		) {
			static::$db = new DB($config->db);
		}

		public static function db(): DB
		{
			return static::$db;
		}

		public function run(): void
		{
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