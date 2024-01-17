<?php

// Class: ReadingEstimateTime
// Description: Calculates the estimated reading time for a given content.
class ReadingEstimateTime
{
    // Function: sy_reading_estimate_time
    // Parameters:
    //   - string $content: The content for which reading time needs to be estimated.
    //   - int $wpm: Words per minute (default is 300).
    // Returns: Estimated reading time in minutes (rounded up).
    public static function sy_reading_estimate_time(string $content, int $wpm = 300): int
    {
        // Remove HTML tags and shortcodes to get clean content
        $clean_content = strip_tags(strip_shortcodes($content));

        // Count the words in the clean content, considering Persian/Arabic characters
        $word_count = str_word_count($clean_content, 0, 'ابپتثجچ‌حخدذرز‌ژس‌شصضطظعغفقکگلمنوهیءآاًهٔه');

        // Calculate and return the estimated reading time in minutes (rounded up)
        return ceil($word_count / $wpm);
    }
}
