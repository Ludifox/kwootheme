<?php
    get_header();
    
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); 
            
            echo "<article class='default-".get_the_ID()."'>
                <h2><a href='".get_permalink()."'>".get_the_title()."</a></h2>
            </article>";


        } // end while
    } // end if

    get_footer();
?>