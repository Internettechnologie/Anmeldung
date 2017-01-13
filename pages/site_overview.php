<?php

//echo "<pre>";
//var_dump($blogposts);
//echo "</pre>";

foreach ($blogposts as $blogpost) {

    echo '<article>';

    echo '<span class="author">' . $blogpost['name'] . '</span>';
    echo '<span class="date">' . $blogpost['timestamp'] . '</span>';
    echo '<div class="blogcontent">' . $blogpost['content'] . '</div>';

    echo '</article>';
}


