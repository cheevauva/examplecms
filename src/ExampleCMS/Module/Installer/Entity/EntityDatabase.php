<?php

namespace ExampleCMS\Module\Installer\Entity;

class EntityDatabase extends \ExampleCMS\Application\Entity\Entity
{

    protected $validationResult;

    public function isValid(): bool
    {
        switch ($this->attributes['engine']) {
            case 'mysql':
                foreach (['username', 'password', 'host', 'database'] as $attribute) {
                    if (empty($this->attributes[$attribute])) {
                        $this->validationResult[$attribute] = [
                            'message' => $attribute . '-is-required',
                        ];
                    }
                }
                break;
            case 'sqlite':
                foreach (['filename'] as $attribute) {
                    if (empty($this->attributes[$attribute])) {
                        $this->validationResult[$attribute] = [
                            'message' => $attribute . '-is-required',
                        ];
                    }
                }
                break;
        }

        return empty($this->validationResult);
    }

    public function getValidationResult()
    {
        return $this->validationResult;
    }

}
