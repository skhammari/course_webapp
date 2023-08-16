<?php

	namespace App\Repositories;

	class CourseRepository extends BaseRepository
	{
		public function getAll(): bool|array|\stdClass
		{
			return $this->db->get(
				table   : $this->table,
				fetchAll: true
			);
		}

		public function create(string $name, string $instructor, string $description): bool|string
		{
			$this->db->insert(
				table: $this->table,
				data : [
					'name'        => $name,
					'instructor'  => $instructor,
					'description' => $description,
					'createdAt'   => date('Y-m-d H:i:s')
				]
			);

			return $this->db->lastInsertId();
		}
	}