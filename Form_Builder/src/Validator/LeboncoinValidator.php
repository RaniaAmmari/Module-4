<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class LeboncoinValidator extends ConstraintValidator

{
    public function validate($value, Constraint $constraint)

    {

        /* @var App\Validator\Leboncoin $constraint */


if  ('https://www.leboncoin.fr/categorie/identifiant.htm/'!=$value){

       

        $this->context->buildViolation($constraint->message)

            ->addViolation();

    }}

}