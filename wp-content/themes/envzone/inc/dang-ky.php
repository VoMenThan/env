<?php


global $post;

$result = new stdClass();

if(isset($_POST) and count($_POST) > 1){
    $data = $_POST;

    $post_type = 'dang_ky';
    $post_id = wp_insert_post(
    array(  'post_title'    => $data['email'],
        'post_status'   => 'publish',
        'post_type'     => $post_type));


    /*write if in database*/
    if ($post_id) {
        $fs = array(
            'full_name',
            'phone_number',
            'join_in',
            'you_know'
            );

        foreach ($fs as $k) {
            if (isset($_POST[$k])) {
                update_post_meta($post_id, $k, $_POST[$k]);
            }
        }
        $result->st = 1;

    } else {
        $result->st = 0;
    }
}
else{
    $result->form = 1;
}

?>

<section class="register-page">
    <div class="container">

        <?php
        $home_url = get_home_url();
        if ($result->st == 1):
            header("Location: ".$home_url."/thanh-cong/");
        else:?>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form action="#" method="post">

                    <h2 class="label-content">
                        Form Đăng Ký Tham Dự Lễ Mở Bán Dự Án Marina Hill - Biệt thự đồi tại Nha Trang
                    </h2>

                    <div class="form-group">
                        <label for="full_name">Họ và Tên (<span>*</span>)</label>
                        <input name="full_name" required="" type="text" class="form-control" id="full_name">
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Số điện thoại</label>
                        <input name="phone_number" type="number" class="form-control" id="phone_number">
                    </div>

                    <div class="form-group">
                        <label for="email">Email (<span>*</span>)</label>
                        <input name="email" required="" type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="">Bạn sẽ tham dự buổi nào? (<span>*</span>)</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" required class="form-check-input" name="join_in" value="dot1">Đợt 1: 3/11/2018, KS InterContinental - TP.HCM
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" required class="form-check-input" name="join_in" value="dot2">Đợt 2: 10/11/2018, KS Marriott - Hà Nội
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Bạn biết đến sự kiện Lễ Mở Bán Marina Hill từ đâu?</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="you_know" value="fb">Quảng cáo Facebook
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="you_know" value="gg">Google
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="you_know" value="nt">Từ người thân
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="you_know" value="bdt">Báo điện tử
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="you_know" value="yt">Youtube
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="you_know" value="k">Khác
                            </label>
                        </div>
                    </div>

                    <p>(*) Yêu cầu bắt buộc nhập.</p>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-5">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
        <?php endif;?>
    </div>
</section>

