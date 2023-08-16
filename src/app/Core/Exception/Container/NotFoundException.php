<?php

	namespace App\Core\Exception\Container;

	use Psr\Container\NotFoundExceptionInterface;

	class NotFoundException extends \Exception implements NotFoundExceptionInterface
	{

	}