# PHPvJS Middleware

![License](https://img.shields.io/github/license/nojimage/phpvjs)
![Packagist Version (custom server)](https://img.shields.io/packagist/v/nojimage/holiday-jp)
[![Build Status](https://github.com/nojimage/holiday-jp/actions/workflows/ci.yml/badge.svg)](https://github.com/nojimage/holiday-jp/actions/workflows/ci.yml)

## Overview

このパッケージでは、国立天文台のカレンダー情報に基づいて、2001年以降の日本の祝日情報を取得します。

Via: [National Astronomical Observatory of Japan](https://eco.mtk.nao.ac.jp/koyomi/cande/calendar.html)

## Requirements

- PHP 8.2 以上

## Installation

```shell
composer require nojimage/holiday-jp
```

## Usage

```php
use Nojimage\HolidayJp\HolidayJp;

$holiday = new HolidayJp();

// 2024年の祝日一覧を取得
$holidays = $holiday->getHolidays(2024);
```

## Contributing

バグを見つけた場合、または新機能についての提案がある場合は、問題を作成するか、プルリクエストを送信してください。

## License

このプロジェクトは MIT ライセンスに基づいてリリースされています。
