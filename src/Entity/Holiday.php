<?php

/*
 * Copyright (c) 2024 nojimage
 */
declare(strict_types=1);

namespace Nojimage\HolidayJp\Entity;

use Cake\Chronos\ChronosDate;

/**
 * the Holiday entity
 */
class Holiday
{
    private ChronosDate $date;
    private string $name;

    /**
     * Constructor
     *
     * @param \Cake\Chronos\ChronosDate $date the date
     * @param string $name the name
     */
    public function __construct(ChronosDate $date, string $name)
    {
        $this->date = $date;
        $this->name = $name;
    }

    /**
     * Get the date
     *
     * @return \Cake\Chronos\ChronosDate
     */
    public function getDate(): ChronosDate
    {
        return $this->date;
    }

    /**
     * Get the name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
