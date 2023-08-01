<?php

use Carbon\Carbon;

function calculateLastActivity(string $lastActiveDate): string
{
    $currentDate = Carbon::now();

    $dateDiff = Carbon::parse($lastActiveDate)->diff($currentDate);
    $dateDiff = $dateDiff->format('%y-%m-%d-%h-%i-%s');
    $dateDiff = Str::of($dateDiff)->split('/[\s-]+/');

    if ($dateDiff[0] > 0){
        //$lastActive = Str::of($lastActive)->append("{$dateDiff[0]} years ");
        return "{$dateDiff[0]} years ago";
    }

    if ($dateDiff[1] > 0){
        return "{$dateDiff[1]} months ago";
    }

    if ($dateDiff[2] > 0){
        return "{$dateDiff[2]} days ago";
    }

    if ($dateDiff[3] > 0){
        return "{$dateDiff[3]} hours ago";
    }

    if ($dateDiff[4] > 0){
        return "{$dateDiff[4]} minutes ago";
    }

    if ($dateDiff[5] > 0){
        return "{$dateDiff[5]} seconds ago";
    }
}