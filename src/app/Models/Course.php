<?php

	namespace App\Models;

	class Course extends Model
	{
		public function find(int $id): array|bool
		{
			return $this->db->find($this->table, $id);
		}

		public function create(string $name, string $description): bool
		{
			return $this->db->insert($this->table, [
				'name'        => $name,
				'description' => $description
			]);
		}

		public function all(): array|bool
		{
			return $this->db->get($this->table);
		}
	}