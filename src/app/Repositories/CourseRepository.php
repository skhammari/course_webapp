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
	}