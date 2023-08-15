<?php

    namespace App\Core\Exception;

    class ViewNotFoundException extends \Exception
    {
        protected $message = 'View not found';
    }