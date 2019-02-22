<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item <?php if(uri_segment(0)== 'truyen-thong') echo 'active';?>" >
            <a href="<?php echo get_home_url();?>/truyen-thong">TẤT CẢ TIN</a>
        </li>
        <li class="breadcrumb-item <?php if(uri_segment(0)== 'blog') echo 'active';?>" >
            <a href="<?php echo get_home_url();?>/blog">Blog</a>
        </li>
        <li class="breadcrumb-item <?php if(uri_segment(0)== 'bao-chi') echo 'active';?>" >
            <a href="<?php echo get_home_url();?>/bao-chi">Báo Chí</a>
        </li>
        <li class="breadcrumb-item <?php if(uri_segment(0)== 'tin-tuc-bat-dong-san') echo 'active';?>" >
            <a href="<?php echo get_home_url();?>/tin-bat-dong-san">Tin bất động sản</a>
        </li>
    </ol>
</nav>