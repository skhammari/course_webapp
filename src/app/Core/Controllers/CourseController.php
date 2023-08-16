<?php

	namespace App\Core\Controllers;

	use App\Core\View;
	use App\Repositories\CourseRepository;

	class CourseController extends BaseController
	{
		public function __construct(private CourseRepository $courseRepository)
		{
			$this->loadTwig();
		}

		public function list(): string
		{
			$courses = $this->courseRepository->getAll();

			return $this->twig->render('index.html.twig', [
				'courses' => $courses
			]);
		}

		public function create(): string
		{
			return $this->twig->render('create.html.twig');
		}

		public function store(): void
		{
			$name = $_POST['name'];
			$instructor = $_POST['instructor'];
			$description = $_POST['description'];

			$this->courseRepository->create($name, $instructor, $description);

			View::redirect('/');

			/*$courses = $this->courseRepository->getAll();

			return $this->twig->render('index.html.twig', [
				'courses' => $courses
			]);*/
		}
	}