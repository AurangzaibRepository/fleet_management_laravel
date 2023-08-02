<?php

use Illuminate\Support\Str;

if (! function_exists('formatKeyLabel')) {
    function formatLabelKey(string $label): string
    {
        $label = Str::replace('_', ' ', $label);

        return ucfirst($label);
    }
}
