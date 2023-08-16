<?php

	declare(strict_types=1);

	namespace App;

	use App\Core\Exception\Container\NotFoundException;
	use Psr\Container\ContainerInterface;

	class Container implements ContainerInterface
	{
		private array $services = [];

		public function get(string $id)
		{
			if (!$this->has($id)) {
				throw new NotFoundException("Service $id not found");
			}

			$service = $this->services[$id];

			return $service($this);
		}

		public function has(string $id): bool
		{
			return isset($this->services[$id]);
		}

		public function set(string $id, callable $concrete): void
		{
			$this->services[$id] = $concrete;
		}
	}