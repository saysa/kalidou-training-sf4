<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class FirstLetterUppercase extends Constraint
{
    public $message = 'The first letter must be uppercase : {{ string }}';
}