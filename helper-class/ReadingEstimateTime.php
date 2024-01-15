<?php

class ReadingEstimateTime
{
    public static function sy_reading_estimate_time(string $content, int $wpm=300): int
    {
        $clean_content = strip_tags(strip_shortcodes($content));
        $word_count = str_word_count($clean_content, 0, 'ابپتثجچ‌حخدذرز‌ژس‌شصضطظعغفقکگلمنوهیءآاًهٔه');
        return ceil($word_count / $wpm);
    }
}