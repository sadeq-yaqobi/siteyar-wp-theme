<?php

class Pagination
{
    public static function paginate(object $the_query):string
    {
        $big = 99999999999; // need an unlikely integer
        $args = [
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $the_query->max_num_pages,

        ];
        return paginate_links($args);
    }
}