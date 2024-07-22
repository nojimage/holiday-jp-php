<?php

/*
 * Copyright (c) 2024 nojimage
 */
declare(strict_types=1);

namespace Nojimage\HolidayJp\Entity;

use ArrayAccess;
use Cake\Chronos\ChronosDate;
use JsonSerializable;

/**
 * the Holiday entity
 *
 * @implements ArrayAccess<string,mixed>
 */
class Holiday implements JsonSerializable, ArrayAccess
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

    /**
     * @return array<string,string>
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'date' => $this->date->toDateString(),
            'name' => $this->name,
        ];
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset): bool
    {
        return in_array($offset, ['date', 'name']);
    }

    /**
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->{$offset};
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value): void
    {
        throw new \BadMethodCallException('Holiday is read-only');
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset): void
    {
        throw new \BadMethodCallException('Holiday is read-only');
    }
}
