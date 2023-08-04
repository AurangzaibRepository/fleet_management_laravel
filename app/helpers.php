<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

if (! function_exists('formatKeyLabel')) {
    function formatKeyLabel(string $label): string
    {
        $label = Str::replace('_', ' ', $label);

        return ucfirst($label);
    }
}

if (! function_exists('formatDate')) {
    function formatDate(string $dateString): string
    {
        $date = Carbon::create($dateString)
            ->format('D, M d, Y h:i A');

        return $date;
    }
}

if (! function_exists('formatNumber')) {
    function formatNumber(float $value, string $currency = null): string
    {
        $value = number_format($value, 2, '.', ',');

        return "{$currency} {$value}";
    }
}
