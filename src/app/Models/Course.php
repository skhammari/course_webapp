<?php

	namespace App\Models;

	/**
	 * Class Course
	 * @package App\Models
	 * @property int $id
	 * @property string $name
	 * @property string $instructor
	 * @property string $description
	 * @property string $credits
	 * @property string $created_at
	 * @property string $updated_at
	 * @property string $status
	 */
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

		/*public function all(): array|bool
		{
			return $this->db->get($this->table);
		}*/
	}