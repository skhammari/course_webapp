<?php

	namespace App;

	/**
	 * @property-read array $db
	 */
	class Config
	{
		protected array $config;

		public function __construct(array $env)
		{
			$this->config = [
				'db' => [
					'driver'   => $env['DB_DRIVER'],
					'host'     => $env['DB_HOST'],
					'database' => $env['DB_DATABASE'],
					'user'     => $env['DB_USER'],
					'pass'     => $env['DB_PASS'],
					'options'  => [
						\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
						\PDO::ATTR_EMULATE_PREPARES   => false,
					]
				]
			];
		}

		public function __get(string $name)
		{
			return $this->config[$name] ?? null;
		}
	}