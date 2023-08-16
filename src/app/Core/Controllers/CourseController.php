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

			return $this->twig->render('courses/list.html', [
				'courses' => $courses
			]);
			/*return View::make('courses/list');*/
		}

		public function create(): View
		{
			return View::make('courses/create');
		}

		public function store(): View
		{
			$courseName = $_POST['course_name'];
			$courseDescription = $_POST['course_description'];

			return View::make('courses/store', [
				'courseName'        => $courseName,
				'courseDescription' => $courseDescription
			]);
		}
	}