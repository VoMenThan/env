<?php
/* Template Name: COM -  Author All*/

get_header();

global $wp_query;
$param = array(
    'role__in'         => array('administrator', 'editor', 'former_staff_env')
);
$users = get_users($param);

?>

<main class="main-content">
    <div class="container-fluid filter-companies-page filter-team-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 box-filter">
                    SORT BY:
                    <select class="custom-select">
                        <option selected>Everyone</option>
                        <option value="everyone">Everyone</option>
                        <option value="leadership">Leadership</option>
                        <option value="client">Client service</option>
                        <option value="development">Development</option>
                        <option value="strategist">Strategist</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <section class="artical-page blog-page team-page">
        <div class="container">
            <div class="row">
                <?php
                    foreach ($users as $user):
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="information-author">
                        <img src="<?php echo get_field('avatar', 'user_'. $user->ID )['sizes']['thumbnail'];?>" alt="" class="img-fluid avatar-author">
                        <div class="box-info">
                            <h2 class="author-name"><?php echo $user->display_name;?></h2>
                            <div class="position-company"><?php echo get_field('position', 'user_'. $user->ID );?></div>
                            <a href="<?php echo home_url('author/').$user->nickname;?>" class="more-info">About</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
</main>
<?php get_footer()?>
