<div class="wrap">
    <h1 class="wp-heading-inline">Promotion Mode</h1>

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

        $post_isset = array();
        $args = array(
            'posts_per_page' => 1,
            'offset'=> 0,
            'post_type' => 'post',
            'orderby' => 'post_modified',
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'post_show',
                    'value' => 'main-article',
                    'compare' => 'LIKE',
                )
            )
        );
        $news_main = get_posts( $args );
        foreach ($news_main as $item):
            array_push($post_isset, $item->ID);
            ?>
            <tr class="iedit author-other level-0 post-261 type-post status-private format-standard has-post-thumbnail hentry category-ecommerce-and-retail">
                <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                    <strong>
                        <a class="row-title" href="http://localhost/envzone/wp-admin/post.php?post=<?php echo $item->ID;?>&amp;action=edit">
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

    <h2>FEATURED INSIGHTS</h2>
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
                    'posts_per_page' => 6,
                    'offset'=> 0,
                    'post_type' => 'post',
                    'orderby' => 'post_modified',
                    'order' =>'desc',
                    'post__not_in' => $post_isset,
                    'meta_query' => array(
                        'relation' => 'OR',
                        array(
                            'key' => 'post_show',
                            'value' => 'featured-insights',
                            'compare' => 'LIKE',
                        )
                    )
                );
                $news_special = get_posts( $args );
                foreach ($news_special as $item):
                ?>
            <tr class="iedit author-other level-0 post-261 type-post status-private format-standard has-post-thumbnail hentry category-ecommerce-and-retail">
                <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                    <strong>
                        <a class="row-title" href="http://localhost/envzone/wp-admin/post.php?post=<?php echo $item->ID;?>&amp;action=edit">
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
    <h2>LATEST FROM EXPERTS</h2>
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

        $post_isset = array();

        $args = array(
            'posts_per_page' => 5,
            'offset'=> 0,
            'post_type' => 'post',
            'orderby' => 'id',
            'order' =>'desc',
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'post_show',
                    'value' => 'lastest-from-experts',
                    'compare' => 'LIKE',
                )
            )
        );
        $news_relate = get_posts( $args );
        foreach ($news_relate as $k => $item):
        array_push($post_isset, $item->ID);
        ?>
        <tr class="iedit author-other level-0 post-261 type-post status-private format-standard has-post-thumbnail hentry category-ecommerce-and-retail">
            <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                <strong>
                    <a class="row-title" href="http://localhost/envzone/wp-admin/post.php?post=<?php echo $item->ID;?>&amp;action=edit">
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


    <br> <br>
    <h2>READ MORE FROM EXPERTS</h2>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
        <tr>
            <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                <a href="#">
                    <span>Title</span><span class="sorting-indicator"></span>
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
            'post_type' => 'post',
            'post__not_in' => $post_isset,
            'orderby' => 'id',
            'order' =>'desc',
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'post_show',
                    'value' => 'read-more-from-experts',
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
                        <a class="row-title" href="http://localhost/envzone/wp-admin/post.php?post=<?php echo $item->ID;?>&amp;action=edit">
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
    <h2>READ MORE FEATURED INSIGHTS</h2>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
        <tr>
            <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                <a href="#">
                    <span>Title</span><span class="sorting-indicator"></span>
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
            'post_type' => 'post',
            'orderby' => 'post_modified',
            'order' =>'desc',
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'post_show',
                    'value' => 'read-more-featured-insights',
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
                        <a class="row-title" href="http://localhost/envzone/wp-admin/post.php?post=<?php echo $item->ID;?>&amp;action=edit">
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
        ?>

        </tbody>
    </table>
</div>

