# Holiday in Japan

![License](https://img.shields.io/github/license/nojimage/holiday-jp-php)
![Packagist Version (custom server)](https://img.shields.io/packagist/v/nojimage/holiday-jp)
[![Build Status](https://github.com/nojimage/holiday-jp-php/actions/workflows/ci.yml/badge.svg)](https://github.com/nojimage/holiday-jp-php/actions/workflows/ci.yml)

## Overview

This package obtains information on Japanese public holidays based on the calendar information from the National Astronomical Observatory of Japan.

NOTE: Public holiday information before 2001 is not available.

Source: [National Astronomical Observatory of Japan](https://eco.mtk.nao.ac.jp/koyomi/cande/calendar.html)

## Requirements

- PHP 8.2 or above

## Installation

```shell
composer require nojimage/holiday-jp
```

## Usage

```php
use Nojimage\HolidayJp\HolidayJp;

$holidayJp = new HolidayJp();

// Get a list of holidays in 2024
$holidays = $holidayJp->getHolidays(2024);

// Get a list of holidays for the specified period
$holidays = $holidayJp->getHolidays(new DateTime('2024-01-01'), new DateTime('2024-12-31'));

// Check if a date is a holiday
$holidayJp->isHoliday('2024-01-01'); // true
$holidayJp->isHoliday('2024-01-02'); // false
```

## Contributing

If you find any bugs or have suggestions for new features, please create an issue or submit a pull request.

## License

This project is released under the MIT License.
