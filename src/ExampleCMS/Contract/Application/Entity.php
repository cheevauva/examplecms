<?php

namespace ExampleCMS\Contract\Application;

interface Entity
{

    /**
     * @param mixed $data
     */
    public function decode($data);

    /**
     * @return mixed 
     */
    public function encode();

    public function pull(\ExampleCMS\Contract\Application\Entity $entity);

    /**
     * @return mixed 
     */
    public function mapping(string $mapper, array $data = []);

    public function entityName(): string;

    public function apply(): void;

    public function detach(string $relation, \ExampleCMS\Contract\Application\Entity $entity): \ExampleCMS\Contract\Application\Entity\EntityRelation;

    public function attach(string $relation, \ExampleCMS\Contract\Application\Entity $entity): \ExampleCMS\Contract\Application\Entity\EntityRelation;

    public function isValid(): bool;

    public function identify(\Closure $callback): void;
}
