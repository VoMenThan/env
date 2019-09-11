<?php
/* Template Name: COM -  Author All*/

get_header();

global $wp_query;

$sort = $_GET['sort'];
if($sort == 'leadership'){
    $meta_query = array(
        'relation' => 'OR',
        array(
            'key'     => 'position',
            'value'   => 'Founder',
            'compare' => 'LIKE'
        )
    );
}else if($sort == 'development'){
    $meta_query = array(
        'relation' => 'OR',
        array(
            'key'     => 'position',
            'value'   => 'Project',
            'compare' => 'LIKE'
        )
    );
}else if($sort == 'development'){
    $meta_query = array(
        'relation' => 'OR',
        array(
            'key'     => 'position',
            'value'   => 'Project',
            'compare' => 'LIKE'
        )
    );
}else{
    $meta_query = '';
}
$param = array(
    'role__in'         => array('administrator', 'editor', 'former-staff'),
    'meta_key' => 'position',
    'meta_query' => $meta_query
);
$users = get_users($param);

?>

<main class="main-content">
    <div class="container-fluid filter-companies-page filter-team-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 box-filter">
                    SORT BY:
                    <form action="" method="get">
                        <select name="sort" class="custom-select" onchange="this.form.submit()">
                            <option <?php echo $sort=='everyone'?'selected':'';?> value="everyone">Everyone</option>
                            <option <?php echo $sort=='leadership'?'selected':'';?> value="leadership">Leadership</option>
                            <option <?php echo $sort=='client'?'selected':'';?> value="client">Client service</option>
                            <option <?php echo $sort=='development'?'selected':'';?> value="development">Development</option>
                            <option <?php echo $sort=='strategist'?'selected':'';?> value="strategist">Strategist</option>
                        </select>
                    </form>
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
                        <img src="<?php echo get_field('avatar', 'user_'. $user->ID )['sizes']['medium'];?>" alt="" class="img-fluid avatar-author">
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
