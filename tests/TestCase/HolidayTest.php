<?php

/*
 * Copyright (c) 2024 nojimage
 */
declare(strict_types=1);

namespace Nojimage\HolidayJp\Test\TestCase;

use Cake\Chronos\ChronosDate;
use Nojimage\HolidayJp\Entity\Holiday;
use PHPUnit\Framework\TestCase;

class HolidayTest extends TestCase
{
    /**
     * @return void
     */
    public function testJsonSerialize(): void
    {
        $holiday = new Holiday(new ChronosDate('2024-01-01'), '元日');

        $this->assertSame(
            [
                'date' => '2024-01-01',
                'name' => '元日',
            ],
            $holiday->jsonSerialize()
        );
    }

    /**
     * @return void
     */
    public function testArrayAccess(): void
    {
        $holiday = new Holiday(new ChronosDate('2024-01-01'), '元日');

        $this->assertSame('2024-01-01', $holiday['date']->toDateString());
        $this->assertSame('元日', $holiday['name']);
    }

    /**
     * @return void
     */
    public function testArrayAccessOffsetSet(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Holiday is read-only');

        $holiday = new Holiday(new ChronosDate('2024-01-01'), '元日');
        $holiday['date'] = new ChronosDate('2024-01-02');
    }

    /**
     * @return void
     */
    public function testArrayAccessOffsetUnset(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Holiday is read-only');

        $holiday = new Holiday(new ChronosDate('2024-01-01'), '元日');
        unset($holiday['name']);
    }
}
