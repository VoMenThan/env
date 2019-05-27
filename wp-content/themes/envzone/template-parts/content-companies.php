<?php
$star = get_field('rating_star');
$total_vote_star = $star['1_star'] + $star['2_stars'] + $star['3_stars'] + $star['4_stars'] + $star['5_stars'];
if ($total_vote_star == 0){
    $average_rating = 0;
}else{
    $average_rating = round(($star['1_star']*1 + $star['2_stars']*2 + $star['3_stars']*3 + $star['4_stars']*4 + $star['5_stars']*5)/$total_vote_star, 1);
}
?>

<div class="box-item-company clearfix">
    <div class="box-logo">
        <a href="<?php echo get_permalink();?>">
            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url();?>" alt="">
        </a>
    </div>
    <div class="box-info">
        <a href="<?php echo get_permalink();?>">
            <h2><?php echo the_title();?></h2>
        </a>
        <ul class="list-industries list-inline">

            <?php
                $category_industries = get_the_terms( get_the_ID(), 'industries' );
                if ($category_industries != ''):
                foreach ($category_industries as $item):
            ?>
            <li class="item list-inline-item">
                <?php echo $item->name;?>
            </li>
            <?php endforeach; endif;?>

        </ul>

        <div class="box-rating resize clearfix">
            <div class="rate">
                <input class="nohover" type="radio" id="star5<?php echo the_ID();?>" name="rate<?php echo the_ID();?>" value="5" disabled <?php echo (round($average_rating)==5) ? 'checked' : '';?>/>
                <label class="nohover" for="star5<?php echo the_ID();?>" title="5 stars">5 stars</label>
                <input class="nohover" type="radio" id="star4<?php echo the_ID();?>" name="rate<?php echo the_ID();?>" value="4" disabled <?php echo (round($average_rating)==4) ? 'checked' : '';?>/>
                <label class="nohover" for="star4<?php echo the_ID();?>" title="4 star">4 stars</label>
                <input class="nohover" type="radio" id="star3<?php echo the_ID();?>" name="rate<?php echo the_ID();?>" value="3" disabled <?php echo (round($average_rating)==3) ? 'checked' : '';?>/>
                <label class="nohover" for="star3<?php echo the_ID();?>" title="3 stars">3 stars</label>
                <input class="nohover" type="radio" id="star2<?php echo the_ID();?>" name="rate<?php echo the_ID();?>" value="2" disabled <?php echo (round($average_rating)==2) ? 'checked' : '';?>/>
                <label class="nohover" for="star2<?php echo the_ID();?>" title="2 stars">2 stars</label>
                <input class="nohover" type="radio" id="star1<?php echo the_ID();?>" name="rate<?php echo the_ID();?>" value="1" disabled <?php echo (round($average_rating)==1) ? 'checked' : '';?>/>
                <label class="nohover" for="star1<?php echo the_ID();?>" title="1 star">1 star</label>
            </div>
        </div>


        <div class="description-rating">
            <p>(Average rating <?php echo $average_rating;?>. Vote count: <?php echo $total_vote_star;?>)</p>
        </div>

    </div>
</div>