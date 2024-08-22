<?php
function sy_tech_html_output(): string
{
    return ' 
        <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="articles_grid_style">
                    <div class="articles_grid_thumb">
                        <a href="' . get_the_permalink() . '">
    ' . sy_post_thumbnail() . '
                        </a>
                    </div>
                    <div class="articles_grid_caption">
                        <h4>' . get_the_title() . '</h4>
                        <div class="articles_grid_author">
                            <div class="articles_grid_author_img">
' . sy_author_avatar(get_the_author_meta('user_email'), 40, get_the_author()) . '
</div>
                            <h4>' . get_the_author() . '</h4>
                        </div>
                    </div>
                </div>
            </div>
            ';
}
