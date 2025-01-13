<?php

namespace Modules\DoctorAvailability\Domain\Entities;

class DoctorEntity
{
    private string $id;
    private string $name;


    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function validate(): void
    {
        if (empty($this->name)) {
            throw new \InvalidArgumentException("Doctor name cannot be empty.");
        }
    }
}
