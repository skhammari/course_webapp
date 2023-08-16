<?php

	namespace App\Core\Controllers;

	use Twig\Environment;
	use Twig\Loader\FilesystemLoader;

	abstract class BaseController
	{
		protected Environment $twig;

		public function loadTwig(): void
		{
			$loader = new FilesystemLoader(VIEW_PATH);
			$this->twig = new Environment($loader, [
				/*'cache'       => STORAGE_PATH . '/cache',*/
				'cache' => false,
				'auto_reload' => true,
			]);
		}
	}