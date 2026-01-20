<?php

use SarojSardar\LaravelNepaliDate\NepaliDate;

if (!function_exists('toNepaliDate')) {
    /**
     * Convert English date to Nepali date
     *
     * @param string $date
     * @param string $format
     * @param bool $nepaliNumerals
     * @return string
     */
    function toNepaliDate(string $date, string $format = 'Y-m-d', bool $nepaliNumerals = true): string
    {
        return NepaliDate::format($date, $format, $nepaliNumerals);
    }
}

if (!function_exists('nepaliToday')) {
    /**
     * Get today's date in Nepali
     *
     * @param string $format
     * @return string
     */
    function nepaliToday(string $format = 'Y-m-d'): string
    {
        return NepaliDate::today($format);
    }
}

if (!function_exists('nepaliDateArray')) {
    /**
     * Get Nepali date as array
     *
     * @param string $date
     * @return array
     */
    function nepaliDateArray(string $date): array
    {
        return NepaliDate::convertToNepali($date);
    }
}