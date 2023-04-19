<?php


namespace app\Core;

use app\models\Product;

abstract class Model
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';
    public const RULE_STRING = 'string';
    public const RULE_INTEGER = 'integer';

    public const TYPE_STRING = 's';
    public const TYPE_INTEGER = 'i';



    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
    abstract public function rules(): array;
    abstract public function specialRules(): array;
    public function labels(): array
    {
        return [];
    }
    public function getLabel($attribute)
    {
        return $this->labels()[$attribute] ?? $attribute;
    }


    public array $errors = [];
    public function Validate()
    {


        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            // print_r($rules);
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($rule)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }

                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addError($attribute, self::RULE_MIN, ['field' => $this->getLabel($attribute)]);
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addError($attribute, self::RULE_MAX, ['field' => $this->getLabel($attribute)]);
                }
                if ($ruleName === self::RULE_UNIQUE) {
                    $class = $rule['field'];
                    $uniqueAttr = $rule['attribute'] ?? $attribute;
                    $table = $class::table();
                    $statement = App::$app->db->prepare("SELECT * FROM $table WHERE $uniqueAttr = ?");
                    $statement->bind_param("s", $value);
                    $statement->execute();
                    $record = $statement->fetch();
                    if ($record) {
                        $this->addError($attribute, self::RULE_UNIQUE, ['field' => $this->getLabel($attribute)]);
                    }
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }

                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $rule['match'] = $this->getLabel($rule['match']);
                    $this->addError($attribute, self::RULE_MATCH, $rule);
                }
            }
        }
        return empty($this->errors);
    }


    public function addError(string $attribute, string $rule, $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';

        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be a valid email address',
            self::RULE_STRING => 'This field must be a valid Item {field}',
            self::RULE_INTEGER => 'This field must be a valid {field} ',
            self::RULE_MIN => 'Please enter a valid {field}',
            self::RULE_MAX => 'Please enter a valid {field}',
            self::RULE_MATCH => 'This field must be the same as {match}',
            self::RULE_UNIQUE => 'This {field} is already exist',
        ];
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? '';
    }
}
