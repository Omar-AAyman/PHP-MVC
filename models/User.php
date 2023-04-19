<?php

namespace app\models;

use app\core\DbModel;


class User extends DbModel
{


    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';


    public function table(): string
    {
        return '`users`';
    }

    public function store()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::store();

    }


    public  function rules(): array
    {
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL , [self::RULE_UNIQUE, 'field' =>self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }


    public function attributes(): array
    {
        return [

            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password

        ];
    }
    public function labels(): array
    {
        return [
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => 'Password Confirm',
        ];
    }
}
