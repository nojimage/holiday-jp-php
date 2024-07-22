<?php

/*
 * Copyright (c) 2024 nojimage
 */
declare(strict_types=1);

namespace Nojimage\HolidayJp\Constant;

/**
 * Holiday Calendar ID
 */
final class HolidayCalendarId
{
    public const HOLIDAY_JP = '2bk907eqjut8imoorgq1qa4olc@group.calendar.google.com';

    /**
     * Get Google Calendar URI
     *
     * @return string
     */
    public static function getGoogleCalenderUri(): string
    {
        return sprintf(
            'https://calendar.google.com/calendar/ical/%s/public/basic.ics',
            urlencode(self::HOLIDAY_JP),
        );
    }
}
