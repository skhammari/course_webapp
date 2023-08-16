<?php

	namespace App\Core\Controllers;

	use App\Core\View;

	class CourseController
	{
		public function list(): View
		{
			return View::make('courses/list');
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
				'courseName' => $courseName,
				'courseDescription' => $courseDescription
			]);
		}
	}