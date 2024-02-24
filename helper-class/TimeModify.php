<?php

// This PHP class, TimeModify, provides a method to calculate the time ago from a given timestamp.

class TimeModify
{
    // Function to calculate and return the time ago
    public static function time_ago(string $time)
    {
        // Convert the given time to a Unix timestamp
        $time_stamp = strtotime($time);

        // Calculate the time difference in seconds
        $diff = time() - $time_stamp;

        // If the time difference is less than a minute, return 'چند لحظه پیش'
        if ($diff < 60) {
            return 'چند لحظه پیش';
        }

        // Define time rules for different intervals
        $time_rules = [
            60 * 60 * 24 * 30 * 12 => 'سال',
            60 * 60 * 24 * 30 => 'ماه',
            60 * 60 * 24 => 'روز',
            60 * 60 => 'ساعت',
            60 => 'دقیقه'
        ];

        // Iterate through the time rules to find the appropriate interval
        foreach ($time_rules as $key => $value) {
            $final_time = round($diff / $key);
            // If the calculated time is more than or equal to 1, return the formatted time ago
            if ($final_time >= 1) {
                return $final_time . ' ' . $value . ' پیش';
            }
        }
    }
}
