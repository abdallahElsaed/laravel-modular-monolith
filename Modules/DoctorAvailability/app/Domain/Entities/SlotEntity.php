<?php

namespace Modules\DoctorAvailability\Domain\Entities;

use DateTime;
use DateTimeImmutable;

class SlotEntity
{
    private string $id;
    private string $doctorId;
    private DateTimeImmutable $time;
    private bool $isReserved;
    private float $cost;

    public function __construct(
        string $id,
        string $doctorId,
        DateTimeImmutable $time,
        bool $isReserved,
        float $cost
    ) {
        $this->id = $id;
        $this->doctorId = $doctorId;
        $this->time = $time;
        $this->isReserved = $isReserved;
        $this->cost = $cost;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDoctorId()
    {
        return $this->doctorId;
    }

    public function getTime()
    {
        return $this->time;
    }
    public function isReserved()
    {
        return $this->isReserved;
    }
    public function getCost()
    {
        return $this->cost;
    }


}
