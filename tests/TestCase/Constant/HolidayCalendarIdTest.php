<?php

/*
 * Copyright (c) 2024 nojimage
 */
declare(strict_types=1);

namespace Nojimage\HolidayJp\Test\TestCase\Constant;

use Nojimage\HolidayJp\Constant\HolidayCalendarId;
use PHPUnit\Framework\TestCase;

/**
 * Class HolidayCalendarIdTest
 */
class HolidayCalendarIdTest extends TestCase
{
    /**
     * @return void
     */
    public function testGetGoogleCalendarUri(): void
    {
        $this->assertSame(
            // phpcs:ignore Generic.Files.LineLength.TooLong
            'https://calendar.google.com/calendar/ical/2bk907eqjut8imoorgq1qa4olc%40group.calendar.google.com/public/basic.ics',
            HolidayCalendarId::getGoogleCalendarUri()
        );
    }
}
