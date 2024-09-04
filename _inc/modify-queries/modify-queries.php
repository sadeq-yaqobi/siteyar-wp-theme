<?php
 add_action('pre_get_posts', 'sy_modify_author_query'); function sy_modify_author_query($query) { if (is_main_query() && is_author()) { set_query_var('post_type', ['post', 'tech']); } } 