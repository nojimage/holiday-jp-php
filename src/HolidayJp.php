<?php

/*
 * Copyright (c) 2024 nojimage
 */
declare(strict_types=1);

namespace Nojimage\HolidayJp;

use Cake\Chronos\ChronosDate;
use ICal\ICal;
use Nojimage\HolidayJp\Constant\HolidayCalendarId;
use Nojimage\HolidayJp\Entity\Holiday;

/**
 * Class to get Japanese holidays
 */
class HolidayJp
{
    private ICal $ical;

    private const ICAL_DATE_FORMAT = 'Ymd';

    /**
     * Constructor
     *
     * @param \ICal\ICal|null $ical the ICal instance
     */
    public function __construct(?ICal $ical = null)
    {
        $this->ical = $ical ?? new ICal(HolidayCalendarId::getGoogleCalendarUri());
    }

    /**
     * @return ICal
     */
    public function getIcal(): ICal
    {
        return $this->ical;
    }

    /**
     * Get holidays for a specified period.
     *
     * @param \Cake\Chronos\ChronosDate|\DateTimeInterface|string|int $start the start date
     * @param \Cake\Chronos\ChronosDate|\DateTimeInterface|string|null $end the end date
     * @return array<Holiday>
     */
    public function getHolidays($start, $end = null): array
    {
        if (is_numeric($start)) {
            $start .= '-01-01';
        }
        $start = $this->toChronosDate($start);
        $end = $end ? $this->toChronosDate($end) : $start->lastOfYear();

        $holidays = [];
        $events = $this->ical->eventsFromRange($start->toDateString(), $end->toDateString());
        foreach ($events as $event) {
            $holidays[] = new Holiday(
                ChronosDate::createFromFormat(self::ICAL_DATE_FORMAT, $event->dtstart),
                $this->normalizeHolidayName($event->summary)
            );
        }

        return $holidays;
    }

    /**
     * check if the specified date is a holiday.
     *
     * @param \Cake\Chronos\ChronosDate|\DateTimeInterface|string $date the date
     * @return bool
     */
    public function isHoliday($date): bool
    {
        return !empty($this->getHolidays($date, $date));
    }

    /**
     * @param \Cake\Chronos\ChronosDate|\DateTimeInterface|string $date the date
     * @return ChronosDate
     */
    private function toChronosDate($date): ChronosDate
    {
        if ($date instanceof ChronosDate) {
            return $date;
        }

        return ChronosDate::parse($date);
    }

    /**
     * @param string $name the holiday name
     * @return string
     */
    private function normalizeHolidayName(string $name): string
    {
        $name = trim(mb_convert_kana($name, 'KVas'));

        if ($name === '休日') {
            $name = '振替休日';
        }

        return $name;
    }
}
