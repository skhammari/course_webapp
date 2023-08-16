<?php

	use App\App;
	use App\Config;
	use App\Container;
	use App\Core\Controllers\CourseController;
	use App\Core\Router;

	// Loading composer autoload
	require_once __DIR__ . '/../vendor/autoload.php';

	// loading env
	$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
	$dotenv->load();

	const STORAGE_PATH = __DIR__ . '/../storage';
	const VIEW_PATH = __DIR__ . '/../views';

	$container = new Container();
	$router = new Router($container);
	$router
		->get('/', [CourseController::class, 'list'])
		->get('/create', [CourseController::class, 'create'])
		->post('/store', [CourseController::class, 'store']);

	(new App(
		container: $container,
		router   : $router,
		request  : ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
		config   : new Config($_ENV)
	))->run();
