<?php

	use App\App;
	use App\Core\Router;

	// Loading composer autoload
	require_once __DIR__ . '/../vendor/autoload.php';

	// loading env
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
	$dotenv->load();

	const VIEW_PATH = __DIR__ . '/../views';

	$router = new Router();
	$router
		->get('/', [\App\Core\Controllers\CourseController::class, 'list'])
		->get('/create', [\App\Core\Controllers\CourseController::class, 'create'])
		->post('/course', [\App\Core\Controllers\CourseController::class, 'store']);

	(new App(
		router : $router,
		request: ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
	))->run();
