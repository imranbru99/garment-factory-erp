<?php

declare(strict_types=1);

namespace App\Support;

use Tarikh\Tarikh;

/**
 * Bangla numerals, Bangla month names and the revised Bangladesh Bengali calendar.
 * Registered as Tarikh macros because imrandevbd/tarikh does not ship them yet.
 */
class BanglaDate
{
    /** @var array<int, string> */
    public const GREGORIAN_MONTHS = [
        1 => 'জানুয়ারি', 2 => 'ফেব্রুয়ারি', 3 => 'মার্চ', 4 => 'এপ্রিল',
        5 => 'মে', 6 => 'জুন', 7 => 'জুলাই', 8 => 'আগস্ট',
        9 => 'সেপ্টেম্বর', 10 => 'অক্টোবর', 11 => 'নভেম্বর', 12 => 'ডিসেম্বর',
    ];

    /** @var list<string> */
    public const BENGALI_MONTHS = [
        'বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ', 'ভাদ্র', 'আশ্বিন',
        'কার্তিক', 'অগ্রহায়ণ', 'পৌষ', 'মাঘ', 'ফাল্গুন', 'চৈত্র',
    ];

    public static function digits(string $value): string
    {
        return strtr($value, ['0' => '০', '1' => '১', '2' => '২', '3' => '৩', '4' => '৪', '5' => '৫', '6' => '৬', '7' => '৭', '8' => '৮', '9' => '৯']);
    }

    public static function fiscalCode(Tarikh $date): string
    {
        $year = (int) $date->format('Y');
        $month = (int) $date->format('n');
        $start = $month >= 7 ? $year : $year - 1;

        return sprintf('%02d%02d', $start % 100, ($start + 1) % 100);
    }

    public static function gregorian(Tarikh $date): string
    {
        $month = self::GREGORIAN_MONTHS[(int) $date->format('n')];

        return self::digits($date->format('j')).' '.$month.' '.self::digits($date->format('Y'));
    }

    /**
     * Revised Bangladesh Bengali calendar (Pohela Boishakh = 14 April).
     *
     * @return array{year: int, month: int, day: int, month_name: string}
     */
    public static function bengali(Tarikh $date): array
    {
        $year = (int) $date->format('Y');
        $anchor = Tarikh::create($year, 4, 14, tz: $date->getTimezone()->getName());
        if ($date->isBefore($anchor)) {
            $banglaYear = $year - 594;
            $anchor = Tarikh::create($year - 1, 4, 14, tz: $date->getTimezone()->getName());
        } else {
            $banglaYear = $year - 593;
        }

        $dayIndex = (int) $anchor->diffInDays($date);
        $lengths = [31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, self::chaitraLength($year)];
        $month = 0;
        foreach ($lengths as $index => $length) {
            if ($dayIndex < $length) {
                $month = $index;
                break;
            }
            $dayIndex -= $length;
            $month = $index;
        }

        return [
            'year' => $banglaYear,
            'month' => $month + 1,
            'day' => $dayIndex + 1,
            'month_name' => self::BENGALI_MONTHS[$month],
        ];
    }

    public static function bengaliLabel(Tarikh $date): string
    {
        $parts = self::bengali($date);

        return self::digits((string) $parts['day']).' '.$parts['month_name'].' '.self::digits((string) $parts['year']);
    }

    private static function chaitraLength(int $gregorianYear): int
    {
        $leap = ($gregorianYear % 4 === 0 && $gregorianYear % 100 !== 0) || ($gregorianYear % 400 === 0);

        return $leap ? 31 : 30;
    }
}
