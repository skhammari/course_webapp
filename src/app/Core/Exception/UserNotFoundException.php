<?php

    namespace App\Core\Exception;

    class UserNotFoundException extends \Exception
    {
        protected $message = 'User Not Found';
    }