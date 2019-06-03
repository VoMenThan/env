<div class="wrap">
    <h1 class="wp-heading-inline">Promotion Mode Knowledge Center</h1>

    <br> <br>

    <h2>MAIN ARTICLE</h2>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
            <tr>
                <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                    <a href="#">
                        <span>Title</span>
                    </a>
                </th>
                <th scope="col" id="author" class="manage-column column-author">Author</th>
                <th scope="col" id="categories" class="manage-column column-categories">Categories</th>
                <th scope="col" id="tags" class="manage-column column-tags">Tags</th>

            </tr>
        </thead>
        <tbody id="the-list">
        <?php
        $isset_video = array();
        $args = array(
            'posts_per_page' => 1,
            'offset' => 0,
            'post_type' => 'knowledge_center',
            'orderby' => 'post_modified',
            'order' => 'desc',
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'video_show',
                    'value' => 'knowledge-center',
                    'compare' => 'LIKE',
                )
            )
        );
        $video_main = get_posts($args);

        array_push($isset_video, $video_main[0]->ID);
        foreach ($video_main as $item):
            ?>
            <tr class="iedit author-other level-0 post-261 type-post status-private format-standard has-post-thumbnail hentry category-ecommerce-and-retail">
                <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                    <strong>
                        <a class="row-title" href="<?php echo home_url();?>/wp-admin/post.php?post=<?php echo $item->ID;?>&amp;action=edit">
                            <?php echo $item->post_title;?>
                        </a>
                    </strong>
                </td>

                <td class="title column-title has-row-actions column-primary page-title">
                    <?php echo get_the_author_meta('display_name', $item->post_author);?>
                </td>

                <td class="title column-title has-row-actions column-primary page-title">
                    <?php echo get_the_category($item->ID)[0]->cat_name;?>
                </td>

                <td class="title column-title has-row-actions column-primary page-title">
                    <?php
                    if (get_the_tags($item->ID) != ''):
                        foreach (get_the_tags($item->ID) as $tag):?>
                            <?php echo $tag->name;?>
                        <?php endforeach; else: echo ''; endif;?>
                </td>


            </tr>
        <?php endforeach;?>

        </tbody>
    </table>




    <br> <br>

    <h2>FEATURED VIDEOS</h2>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
        <tr>
            <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                <a href="#">
                    <span>Title</span>
                </a>
            </th>
            <th scope="col" id="author" class="manage-column column-author">Author</th>
            <th scope="col" id="categories" class="manage-column column-categories">Categories</th>
            <th scope="col" id="tags" class="manage-column column-tags">Tags</th>

        </tr>
        </thead>
        <tbody id="the-list">


            <?php
             $args = array(
                 'posts_per_page' => 10,
                 'offset'=> 0,
                 'post_type' => 'knowledge_center',
                 'post__not_in' => $isset_video,
                 'orderby' => 'post_modified',
                 'order' =>'desc',
                 'meta_query' => array(
                     'relation' => 'OR',
                     array(
                         'key' => 'video_show',
                         'value' => 'featured-videos',
                         'compare' => 'LIKE',
                     )
                 )
             );
             $video_list = get_posts( $args );
             foreach ($video_list as $k => $item):
            ?>
            <tr class="iedit author-other level-0 post-261 type-post status-private format-standard has-post-thumbnail hentry category-ecommerce-and-retail">
                <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                    <strong>
                        <a class="row-title" href="<?php echo home_url();?>/wp-admin/post.php?post=<?php echo $item->ID;?>&amp;action=edit">
                            <?php echo $item->post_title;?>
                        </a>
                    </strong>
                </td>

                <td class="title column-title has-row-actions column-primary page-title">
                    <?php echo get_the_author_meta('display_name', $item->post_author);?>
                </td>

                <td class="title column-title has-row-actions column-primary page-title">
                    <?php echo get_the_category($item->ID)[0]->cat_name;?>
                </td>

                <td class="title column-title has-row-actions column-primary page-title">
                    <?php
                    if (get_the_tags($item->ID) != ''):
                        foreach (get_the_tags($item->ID) as $tag):?>
                            <?php echo $tag->name. ', ';?>
                        <?php endforeach; else: echo ''; endif;?>
                </td>


            </tr>

        <?php endforeach;
            $post_isset = '';
        ?>

        </tbody>
    </table>


    <br> <br>
    <h2>WATCH MORE FROM C-LEVEL ADVICE</h2>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
        <tr>
            <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                <a href="#">
                    <span>Title</span>
                </a>
            </th>
            <th scope="col" id="author" class="manage-column column-author">Author</th>
            <th scope="col" id="categories" class="manage-column column-categories">Categories</th>
            <th scope="col" id="tags" class="manage-column column-tags">Tags</th>

        </tr>
        </thead>
        <tbody id="the-list">

        <?php

        $args = array(
            'posts_per_page' => 7,
            'offset'=> 0,
            'post_type' => 'knowledge_center',
            'orderby' => 'post_modified',
            'order' =>'desc',
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'video_show',
                    'value' => 'clevel-advice',
                    'compare' => 'LIKE',
                )
            )
        );
        $news_expert = get_posts( $args );
        foreach ($news_expert as $item):
        ?>
        <tr class="iedit author-other level-0 post-261 type-post status-private format-standard has-post-thumbnail hentry category-ecommerce-and-retail">
            <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                <strong>
                    <a class="row-title" href="<?php echo home_url();?>/wp-admin/post.php?post=<?php echo $item->ID;?>&amp;action=edit">
                        <?php echo $item->post_title;?>
                    </a>
                </strong>
            </td>

            <td class="title column-title has-row-actions column-primary page-title">
                <?php echo get_the_author_meta('display_name', $item->post_author);?>
            </td>

            <td class="title column-title has-row-actions column-primary page-title">
                <?php echo get_the_category($item->ID)[0]->cat_name;?>
            </td>

            <td class="title column-title has-row-actions column-primary page-title">
                <?php
                if (get_the_tags($item->ID) != ''):
                    foreach (get_the_tags($item->ID) as $tag):?>
                        <?php echo $tag->name. ', ';?>
                    <?php endforeach; else: echo ''; endif;?>
            </td>


        </tr>
        <?php endforeach;?>

        </tbody>
    </table>
</div>

