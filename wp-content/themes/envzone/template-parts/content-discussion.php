<div class="ask-question">
    <div class="display-name"><?php echo get_field('display_name', get_the_ID());?>:</div>
    <a href="<?php echo get_permalink(get_the_ID())?>" class="view-answer">
        <h2 class="question"><?php echo get_the_title(get_the_ID());?></h2>
    </a>

    <div class="info d-lg-block d-flex">
        <a href="<?php echo get_permalink(get_the_ID())?>" class="view-answer">View Answer</a>
        <span class="post-date">Posted on <?php echo get_the_date( 'F d, Y', get_the_ID() );?></span>
    </div>
</div>