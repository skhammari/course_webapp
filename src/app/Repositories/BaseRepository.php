<?php

	declare(strict_types=1);

	namespace App\Repositories;

	use App\App;
	use App\DB;

	abstract class BaseRepository
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
			$className = str_replace('Repository', '', $className);
			$className = end($className);
			$className = strtolower($className);

			$this->table = $className . 's';
			return $this->table;
		}
	}