<?php
 class ExcerptPost { public static function sy_excerpt_post_limit() :string { $excerpt=get_the_excerpt(); return mb_substr($excerpt, 0, 120).' '.'...'; } }