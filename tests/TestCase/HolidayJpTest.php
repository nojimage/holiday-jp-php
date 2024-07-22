<?php

/*
 * Copyright (c) 2024 nojimage
 */
declare(strict_types=1);

namespace Nojimage\HolidayJp\Test\TestCase;

use Cake\Collection\Collection;
use Nojimage\HolidayJp\Entity\Holiday;
use Nojimage\HolidayJp\HolidayJp;
use PHPUnit\Framework\TestCase;

/**
 * Test for HolidayJp
 */
class HolidayJpTest extends TestCase
{
    private HolidayJp $HolidayJp;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->HolidayJp = new HolidayJp();
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->HolidayJp);
        parent::tearDown();
    }

    /**
     * @return void
     */
    public function testGetIcal(): void
    {
        $this->assertInstanceOf(\ICal\ICal::class, $this->HolidayJp->getIcal());
    }

    /**
     * Can get holidays for a specified year.
     *
     * @return void
     */
    public function testGetHolidays(): void
    {
        $holidays = $this->HolidayJp->getHolidays(2024);

        $this->assertCount(21, $holidays);

        $collection = new Collection($holidays);
        $this->assertSame(
            [
            '2024-01-01' => '元日',
            '2024-01-08' => '成人の日',
            '2024-02-11' => '建国記念の日',
            '2024-02-12' => '振替休日',
            '2024-02-23' => '天皇誕生日',
            '2024-03-20' => '春分の日',
            '2024-04-29' => '昭和の日',
            '2024-05-03' => '憲法記念日',
            '2024-05-04' => 'みどりの日',
            '2024-05-05' => 'こどもの日',
            '2024-05-06' => '振替休日',
            '2024-07-15' => '海の日',
            '2024-08-11' => '山の日',
            '2024-08-12' => '振替休日',
            '2024-09-16' => '敬老の日',
            '2024-09-22' => '秋分の日',
            '2024-09-23' => '振替休日',
            '2024-10-14' => 'スポーツの日',
            '2024-11-03' => '文化の日',
            '2024-11-04' => '振替休日',
            '2024-11-23' => '勤労感謝の日',
            ],
            $collection->combine(function (Holiday $holiday) {
                return $holiday->getDate()->format('Y-m-d');
            }, function (Holiday $holiday) {
                return $holiday->getName();
            })->toArray()
        );
    }

    /**
     * Can get holidays for a specified period.
     *
     * @return void
     */
    public function testGetHolidaysByRange(): void
    {
        $holidays = $this->HolidayJp->getHolidays(
            '2024-01-01',
            '2024-12-31',
        );

        $this->assertCount(21, $holidays);

        $collection = new Collection($holidays);
        $this->assertSame(
            [
                '2024-01-01' => '元日',
                '2024-01-08' => '成人の日',
                '2024-02-11' => '建国記念の日',
                '2024-02-12' => '振替休日',
                '2024-02-23' => '天皇誕生日',
                '2024-03-20' => '春分の日',
                '2024-04-29' => '昭和の日',
                '2024-05-03' => '憲法記念日',
                '2024-05-04' => 'みどりの日',
                '2024-05-05' => 'こどもの日',
                '2024-05-06' => '振替休日',
                '2024-07-15' => '海の日',
                '2024-08-11' => '山の日',
                '2024-08-12' => '振替休日',
                '2024-09-16' => '敬老の日',
                '2024-09-22' => '秋分の日',
                '2024-09-23' => '振替休日',
                '2024-10-14' => 'スポーツの日',
                '2024-11-03' => '文化の日',
                '2024-11-04' => '振替休日',
                '2024-11-23' => '勤労感謝の日',
            ],
            $collection->combine(function (Holiday $holiday) {
                return $holiday->getDate()->format('Y-m-d');
            }, function (Holiday $holiday) {
                return $holiday->getName();
            })->toArray()
        );
    }

    /**
     * Can get 2001 -
     * @return void
     */
    public function testGetHolidays2001(): void
    {
        $holidays = $this->HolidayJp->getHolidays(2001);

        $this->assertCount(19, $holidays);

        $collection = new Collection($holidays);
        $this->assertSame(
            [
                '2001-01-01' => '元日',
                '2001-01-08' => '成人の日',
                '2001-02-11' => '建国記念の日',
                '2001-02-12' => '振替休日',
                '2001-03-20' => '春分の日',
                '2001-04-29' => 'みどりの日',
                '2001-04-30' => '振替休日',
                '2001-05-03' => '憲法記念日',
                '2001-05-04' => '振替休日',
                '2001-05-05' => 'こどもの日',
                '2001-07-20' => '海の日',
                '2001-09-15' => '敬老の日',
                '2001-09-23' => '秋分の日',
                '2001-09-24' => '振替休日',
                '2001-10-08' => '体育の日',
                '2001-11-03' => '文化の日',
                '2001-11-23' => '勤労感謝の日',
                '2001-12-23' => '天皇誕生日',
                '2001-12-24' => '振替休日',
            ],
            $collection->combine(function (Holiday $holiday) {
                return $holiday->getDate()->format('Y-m-d');
            }, function (Holiday $holiday) {
                return $holiday->getName();
            })->toArray()
        );
    }
}
