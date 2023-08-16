<?php

	declare(strict_types=1);

	namespace App;

	use App\Core\Exception\Container\ContainerException;
	use Psr\Container\ContainerExceptionInterface;
	use Psr\Container\ContainerInterface;
	use Psr\Container\NotFoundExceptionInterface;
	use ReflectionException;

	class Container implements ContainerInterface
	{
		private array $services = [];

		public function get(string $id)
		{
			if ($this->has($id)) {
				$service = $this->services[$id];

				return $service($this);
			}

			return $this->resolve($id);
		}

		public function has(string $id): bool
		{
			return isset($this->services[$id]);
		}

		public function set(string $id, callable $concrete): void
		{
			$this->services[$id] = $concrete;
		}

		/**
		 * @throws NotFoundExceptionInterface
		 * @throws ContainerExceptionInterface
		 * @throws ReflectionException
		 * @throws ContainerException
		 */
		public function resolve(string $id)
		{
			$reflectionClass = new \ReflectionClass($id);

			if (!$reflectionClass->isInstantiable()) {
				throw new ContainerException("{$id} is not instantiable");
			}

			$constructor = $reflectionClass->getConstructor();

			if (!$constructor) {
				return new $id;
			}

			$parameters = $constructor->getParameters();

			if (empty($parameters)) {
				return new $id;
			}

			$dependencies = array_map(function (\ReflectionParameter $parameter) use ($id) {
				$name = $parameter->getName();
				$type = $parameter->getType();

				if (!$type) {
					throw new ContainerException(
						"failed to resolve class dependency {$name} because of type hint missing"
					);
				}

				if ($type instanceof \ReflectionUnionType) {
					throw new ContainerException(
						"failed to resolve class dependency {$name} because of union type hint"
					);
				}

				if ($type instanceof \ReflectionNamedType && !$type->isBuiltin()) {
					return $this->get($type->getName());
				}

				throw new ContainerException(
					"failed to resolve class dependency {$name} because of invalid param"
				);
			}, $parameters);

			return $reflectionClass->newInstanceArgs($dependencies);
		}
	}