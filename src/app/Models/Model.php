<?php

	declare(strict_types=1);

	namespace App\Models;

	use App\App;
	use App\DB;

	abstract class Model
	{
		protected DB $db;
		protected string $table;

		public function __construct()
		{
			$this->db = App::db();
			$this->table = $this->getTableName();
		}

		public function getTableName(): string
		{
			$className = explode('\\', static::class);
			$className = end($className);
			$className = strtolower($className);

			return $className . 's';
		}
	}