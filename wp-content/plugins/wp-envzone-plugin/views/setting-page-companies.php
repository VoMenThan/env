<div class="wrap">
    <h1 class="wp-heading-inline">Promotion Mode Companies</h1>

    <br> <br>

    <h2>HOMEPAGE</h2>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
            <tr>
                <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                    <a href="#">
                        <span>Title</span>
                    </a>
                </th>
                <th scope="col" id="categories" class="manage-column column-categories">Industries</th>

            </tr>
        </thead>
        <tbody id="the-list">
        <?php
        $args_companies = array(
            'posts_per_page' => 2,
            'offset'=> 0,
            'post_type' => 'companies',
            'orderby' => 'post_modified',
            'order' =>'desc',
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'homepage_location',
                    'value' => 'show-homepage',
                    'compare' => 'LIKE'
                )
            )
        );

        $companies_main = get_posts( $args_companies );

        foreach ($companies_main as $item):
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
                    <?php
                        $category_industries = get_the_terms( $item->ID, 'industries' );
                        if ($category_industries != ''):
                            foreach ($category_industries as $industry):
                                 echo $industry->name.', ';
                            endforeach;
                        endif;
                    ?>
                </td>


            </tr>
        <?php endforeach;?>

        </tbody>
    </table>



</div>

