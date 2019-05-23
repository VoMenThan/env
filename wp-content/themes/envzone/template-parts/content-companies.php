<div class="box-item-company clearfix">
    <div class="box-logo">
        <a href="">
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
                foreach ($category_industries as $item):
            ?>
            <li class="item list-inline-item">
                <?php echo $item->name;?>
            </li>
            <?php endforeach;?>

        </ul>

        <div class="box-rating clearfix">
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="5 stars">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="4 star">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="3 stars">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2 stars">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1 star">1 star</label>
            </div>
        </div>


        <div class="description-rating">
            <p>(Average rating 3/2. Vote count: 2)</p>
        </div>

    </div>
</div>