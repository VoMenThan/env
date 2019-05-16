<div class="box-item-event clearfix">
    <div class="box-date">
        <?php echo get_field('date', get_the_ID());?>
    </div>
    <div class="box-info">
        <a href="<?php echo get_permalink();?>"><h2><?php echo the_title();?></h2></a>
        <div class="location-1"><?php echo get_field('location', get_the_ID());?></div>
        <div class="location-2"><i class="icon-location"></i><?php echo get_field('address', get_the_ID());?></div>
    </div>
</div>