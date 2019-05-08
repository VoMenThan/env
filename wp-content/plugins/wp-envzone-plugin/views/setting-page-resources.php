<div class="wrap">
    <h1 class="wp-heading-inline">Promotion Mode</h1>

    <br> <br>

    <h2>Featured Lead Magnet</h2>
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
            'posts_per_page' => 1,
            'offset'=> 0,
            'post_type' => 'resources',
            'orderby' => 'post_modified',
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'lead_magnet_mode',
                    'value' => 'feature',
                    'compare' => 'LIKE',
                )
            )
        );
        $resources_main = get_posts( $args );
        foreach ($resources_main as $item):
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
                    <?php echo get_the_terms( $item->ID, 'resources_cat' )[0]->name;?>
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

    <h2>Highlight Lead Magnet</h2>
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
            'posts_per_page' => 3,
            'offset'=> 0,
            'post_type' => 'resources',
            'orderby' => 'post_modified',
            'post__not_in' => array($resources_main[0]->ID),
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'lead_magnet_mode',
                    'value' => 'highlight',
                    'compare' => 'LIKE',
                )
            )
        );
        $resources_highlight = get_posts( $args );
        foreach ($resources_highlight as $item):
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
                    <?php echo get_the_terms( $item->ID, 'resources_cat' )[0]->name;?>
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

</div>

