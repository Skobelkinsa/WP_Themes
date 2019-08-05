<?php get_header();
$all_options = get_option('true_options');
$posts = get_posts( array(
    'category'  => (int)$all_options["top_slider_category"],
) );
?>
<div class="slider-container rev_slider_wrapper" style="height: 100vh;" id="home">
    <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'sliderLayout': 'fullscreen', 'delay': 9000, 'gridwidth': 1140, 'gridheight': 800, 'responsiveLevels': [4096,1200,992,500], 'parallax': { 'type': 'scroll', 'origo': 'slidercenter', 'speed': 500, 'levels': [2,3,4,5,6,7,8,9,15,50], 'disable_onmobile': 'on' }, 'navigation' : {'arrows': { 'enable': true, 'style': 'arrows-style-1' }}}">
        <ul>
            <?foreach( $posts as $post ):
                setup_postdata($post);
                ?>
                <li class="slide-overlay slide-overlay-level-8" data-transition="fade">
                <?if(get_field('bg_image')):?>
                <img src="<?=get_field('bg_image')?>"
                     alt=""
                     data-bgposition="center center"
                     data-bgfit="cover"
                     data-bgrepeat="no-repeat"
                     class="rev-slidebg"
                     data-bgparallax="8">
                <?endif;?>
                <?if(get_field('logo')):?>
                <div class="tp-caption text-color-primary logo-golden"
                     data-frames='[{"from":"opacity:1;y:[100%];","speed":2000,"to":"opacity:1;","delay":1000,"ease":"Power3.easeInOut","mask":"x:0px;y:0;s:inherit;e:inherit;"},{"delay":"wait","speed":1000,"to":"o:0;","ease":"Power2.easeInOut"}]'
                     data-x="center"
                     data-y="center" data-voffset="['-250','-200','-250','-400']"
                     data-fontsize="['20','20','20','50']"
                     data-width="['383','800','800','800']"
                     data-height="['256','600','600','600']"
                     data-splitin="none"
                     data-splitout="none"
                     data-lineheight="['25','25','25','25']">
                    <img alt="Golden Taurus" width="80" height="54" src="<?=get_field('logo')?>">
                </div>
                <?endif;?>
                <h1 class="tp-caption font-weight-bold text-color-light"
                    data-frames='[{"from":"opacity:1;y:[100%];","speed":2000,"to":"opacity:1;","delay":1500,"ease":"Power3.easeInOut","mask":"x:0px;y:0;s:inherit;e:inherit;"},{"delay":"wait","speed":1000,"to":"o:0;","ease":"Power2.easeInOut"}]'
                    data-x="center"
                    data-y="center"
                    data-fontsize="['62','62','62','70']"
                    data-lineheight="['65','65','65','105']"><?the_title_attribute()?></h1>

                <?if(get_field('sub_title')):?>
                <div class="tp-caption text-color-light font-weight-light"
                     data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2300,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                     data-x="center"
                     data-y="center" data-voffset="['53','53','53','100']"
                     data-fontsize="['17','17','17','50']"
                     data-lineheight="['22','22','22','60']"><?=get_field('sub_title')?></div>
                <?endif;?>
                <div class="tp-caption text-color-light font-weight-light text-center" style="white-space: normal; text-align: center;"
                     data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2300,"splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                     data-x="center"
                     data-y="center"
                     data-width="['800']"
                     data-height="['auto']"
                     data-voffset="['60','0','0','100']"
                     data-fontsize="['14']"
                     data-splitin="none"
                     data-splitout="none"
                     data-lineheight="['22','22','22','60']"><hr style="border-top: 1px solid #fff"></div>

                <div class="tp-caption text-color-light font-weight-light text-center" style="white-space: normal; text-align: center;"
                     data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2300,"splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                     data-x="center"
                     data-y="center"
                     data-width="['800']"
                     data-height="['auto']"
                     data-voffset="['130','0','0','500']"
                     data-fontsize="['18','0','0','40']"
                     data-lineheight="['22','44']"><?the_content();?></div>

                <?if(get_field('sub_desc')):?>
                <div class="tp-caption text-color-light font-weight-light text-center" style="white-space: normal; text-align: center;"
                     data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2300,"splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                     data-x="center"
                     data-y="center"
                     data-width="['800']"
                     data-height="['auto']"
                     data-voffset="['230','0','0','900']"
                     data-fontsize="['16','0','20','40']"
                     data-splitin="none"
                     data-splitout="none"
                     data-lineheight="['22','22','22','60']"><?=get_field('sub_desc')?></div>
                <?endif;?>
            </li>
            <?endforeach;
            wp_reset_postdata(); ?>
        </ul>
    </div>
</div>
<header id="header" class="header-narrow header-below-slider" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAtElement': '#header', 'stickySetTop': '0', 'stickyChangeLogo': false}">
    <div class="header-body border-0 box-shadow-none bg-dark appear-animation" data-appear-animation="customHeaderAnimOne">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column justify-content-start d-lg-none">
                    <div class="header-row mt-2">
                        <div class="header-logo">
                            <a href="#">
                                <img class="scale-5 top-4 ml-4" alt="Porto" width="80" height="54" src="<?=get_template_directory_uri()?>/img/demos/coffee/logo.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-center align-items-end">
                    <div class="header-nav justify-content-lg-center p-0">
                        <div class="header-nav header-nav-links header-nav-light-text appear-animation" data-appear-animation="fadeInUpShorter">
                            <div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1 header-nav-main-mobile-dark mr-lg-4">
                                <nav class="collapse">
                                    <?
                                    $args = array('order' => 'ASC');
                                    $menu = wp_get_nav_menu_items( 3, $args );
                                    ?>
                                    <ul class="nav nav-pills flex-column flex-lg-row" id="mainNav">
                                        <?foreach ($menu as $k => $items):
                                            $k++;
                                            if($k==4)
                                                $k++;
                                        ?>
                                        <li class="dropdown order-<?=$k?>">
                                            <a class="dropdown-item" data-hash data-hash-offset="92" href="<?=$items->url?>"><?=$items->post_title?></a>
                                        </li>
                                        <?endforeach;?>
                                        <?if(strlen($all_options['menu_button'])):
                                            $k++?>
                                        <li class="dropdown order-<?=$k?>">
                                            <a class="dropdown-item" data-hash data-hash-offset="92" href="<?=$all_options['menu_button_link']?>"><button type="button" class="btn btn-gradient mb-2"><?=$all_options['menu_button']?></button></a>
                                        </li>
                                        <?endif;?>
                                        <li class="align-items-center d-none d-lg-flex order-4 px-5 mx-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250">
										<span class="header-logo">
											<a href="#" class="w-100 text-center">
                                                <?$image_attributes = wp_get_attachment_image_src( $all_options['menu_logo'], array(180, 122) );?>
												<img class="scale-4" alt="" width="180" height="122" data-sticky-width="82" data-sticky-height="40" data-sticky-top="72" src="<?=(strlen($image_attributes[0]))?$image_attributes[0]:get_template_directory_uri()."/img/logo_menu.png"?>">
											</a>
										</span>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end d-none d-lg-flex"></div>
            </div>
        </div>
    </div>
</header>
<div role="main" class="main">
    <?if(strlen($all_options['1_screen_title'])):?>
    <section class="section section-default section-no-border mt-0">
        <div class="container pt-3 pb-4">
            <div class="row justify-content-around">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h2 class="mb-0"><?=$all_options['1_screen_title']?></h2>
                    <div class="divider divider-primary divider-small mb-4">
                        <hr class="mr-auto">
                    </div>
                    <p class="mt-4"><?=$all_options['1_screen_desc']?></p>
                </div>
            </div>
        </div>
    </section>
    <?endif;?>
    <?if(strlen($all_options['2_screen_title'])):?>
    <section class="section section-height-4 bg-light position-relative border-0 m-0" id="about">
        <div class="custom-section-halfbar-bg d-none d-md-block appear-animation" data-appear-animation="customFadeInRightShorter" data-appear-animation-delay="500"><img src="img/demos/coffee/slides/hero-slider2.jpg"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-5 mb-md-0">
                    <div class="pr-4">
                        <div class="overflow-hidden mb-2">
                            <h2 class="word-rotator letters type font-weight-bold line-height-4 text-9 mb-0 appear-animation" data-appear-animation="maskUp">
                                <span class="custom-primary-font"><?=$all_options['2_screen_title']?></span>

                            </h2>
                        </div>
                        <div class="divider divider-primary divider-small">
                            <hr class="w-25 text-left custom-h-1 appear-animation" data-appear-animation="dividerProgress25" data-appear-animation-delay="200">
                        </div>
                        <?=$all_options['2_screen_desc']?>

                    </div>
                </div>
                <?$image_attributes = wp_get_attachment_image_src( $all_options['2_screen_img'], array(535, 476) );?>
                <?if(strlen($image_attributes[0])):?>
                <div class="col-md-6">
                    <img src="<?=$image_attributes[0]?>" class="img-fluid rounded appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="700" alt="" />
                </div>
                <?endif;?>
            </div>
        </div>
    </section>
    <?endif;?>
    <?if(strlen($all_options['3_screen_title'])):?>
        <?$image_attributes = wp_get_attachment_image_src( $all_options['3_screen_bg'], array(1920, 700) );?>
        <section class="section section-parallax section-height-4 overlay overlay-show border-0 m-0 appear-animation" data-appear-animation="fadeIn" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%'}" data-image-src="<?=$image_attributes[0]?>" id="reservations">
            <div class="container container">
                <div class="row align-items-center">
                    <div class="col-md-6 custom-column-bg text-center py-5 mb-5 mb-md-3 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
                        <div class="overflow-hidden mb-3">
                            <h2 class="text-color-light font-weight-semibold text-9 negative-ls-1 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400"><?=$all_options['3_screen_title']?></h2>
                            <h3 class="text-color-light font-weight-semibold text-4 negative-ls-1 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400"><?=$all_options['3_screen_sub_title']?></h3>
                        </div>
                        <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600"><?=$all_options['3_screen_desc']?></div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="row justify-content-center">
                            <?$image_attributes = wp_get_attachment_image_src( $all_options['3_screen_img'], array(421, 400) );?>
                            <div class="col-md-6 col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="700"><img src="<?=$image_attributes[0]?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?endif;?>
    <?$posts = get_posts( array(
    'posts_per_page' => 0,
    'category'  => (int)$all_options["section_5_category"],
    ) );
    ?>
    <section class="section section-height-4 bg-light border-0 m-0" id="news">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-md-9 col-lg-6 text-center">
                    <div class="overflow-hidden mb-3">
                        <h2 class="text-color-dark font-weight-bold text-9 mb-0 appear-animation" data-appear-animation="maskUp"><?=$all_options["5_screen_title"]?></h2>
                    </div>
                    <div class="divider divider-primary divider-small">
                        <hr class="mx-auto w-25 custom-h-1 appear-animation" data-appear-animation="dividerProgress25" data-appear-animation-delay="200">
                    </div>
                    <p class="text-4 line-height-9 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400"><?=$all_options["5_screen_desc"]?></p>
                </div>
            </div>

            <div class="row mb-5 pb-3">
                <?foreach( $posts as $post ):
                    setup_postdata($post);?>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">

                    <div class="card flip-card flip-card-3d text-center rounded-0">
                        <div class="flip-front p-5">
                            <div class="flip-content my-4">
                                <strong class="font-weight-extra-bold text-color-dark line-height-1 text-13 mb-3 d-inline-block"><?=get_field('number')?></strong>
                                <h4 class="font-weight-bold text-color-primary text-4"><?the_title_attribute()?></h4>
                                <?=get_field('sub_title')?>
                            </div>
                        </div>
                        <div class="flip-back d-flex align-items-center p-5" style="background-image: url(<?=get_field('picture_bg')?>); background-size: cover; background-position: center;">
                            <div class="flip-content my-4">
                                <?the_content();?>
                            </div>
                        </div>
                    </div>
                </div>
                <?endforeach;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <div class="container-fluid px-0">
        <div class="row justify-content-center mb-4">
            <div class="col-md-9 col-lg-6 text-center">
                <div class="overflow-hidden mb-3">
                    <h2 class="text-color-dark font-weight-bold text-9 mb-0 appear-animation" data-appear-animation="maskUp"><?=$all_options["6_screen_title"]?></h2>
                </div>
                <div class="divider divider-primary divider-small">
                    <hr class="mx-auto w-25 custom-h-1 appear-animation" data-appear-animation="dividerProgress25" data-appear-animation-delay="200">
                </div>
            </div>
        </div>
        <div class="row">
            <?$posts = get_posts( array(
                'posts_per_page' => (int)$all_options["6_screen_count"],
                'category'  => (int)$all_options["section_6_category"],
            ) );
            foreach( $posts as $post ):
                    setup_postdata($post);
            $arPics = get_field('picture');
            ?>
            <div class="col-6 col-sm-4 col-lg-2 px-0">
                <a class="img-thumbnail img-thumbnail-no-borders d-block img-thumbnail-hover-icon lightbox" href="<?=$arPics["url"]?>" data-plugin-options="{'type':'image'}">
                    <img class="img-fluid rounded-0" src="<?=$arPics["sizes"]["thumbnail"]?>" alt="Project Image">
                </a>
            </div>
            <?endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <section class="section section-default section-no-border mt-0">
        <div class="container pt-3 pb-4">
            <div class="row justify-content-around">
                <div class="col-lg-12 mb-8 mb-lg-0">

                    <div class="row justify-content-center mb-4">
                        <div class="col-md-9 col-lg-6 text-center">
                            <div class="overflow-hidden mb-3">
                                <h2 class="text-color-dark font-weight-bold text-9 mb-0 appear-animation" data-appear-animation="maskUp"><?=$all_options["7_screen_title"]?></h2>
                            </div>
                            <div class="divider divider-primary divider-small">
                                <hr class="mx-auto w-25 custom-h-1 appear-animation" data-appear-animation="dividerProgress25" data-appear-animation-delay="200">
                            </div>
                            <p class="text-4 line-height-9 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400"><?=$all_options["7_screen_desc"]?></p>
                        </div>
                    </div>

                    <div class="featured-boxes featured-boxes-style-3 featured-boxes-flat">
                        <div class="row">
                            <?$posts = get_posts( array(
                                'posts_per_page' => (int)$all_options["7_screen_count"],
                                'category'  => (int)$all_options["section_7_category"],
                            ) );
                            foreach( $posts as $post ):
                                    setup_postdata($post);
                            ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="featured-box featured-box-primary featured-box-effect-3">
                                    <div class="box-content box-content-border-0">
                                        <img class="img-fluid rounded-0" src="<?=get_field('picture')?>" alt="<?the_title_attribute()?>">
                                        <h4 class="font-weight-normal text-5 mt-3"><?the_title_attribute()?></h4>
                                        <p class="mb-2 mt-2 text-2"><?the_content();?></p>
                                    </div>
                                </div>
                            </div>
                            <?endforeach;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <?$image_attributes = wp_get_attachment_image_src( $all_options['8_screen_img'], array(1920, 680) );?>
    <section class="section section-background section-footer" style="background-image: url(<?=$image_attributes[0]?>); background-position: 50% 100%; background-size: cover;">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <h2 class="mt-5 mb-0"><?=$all_options["8_screen_title"]?></h2>
                    <p style="color:#000"><?=$all_options["8_screen_desc"]?></p>
                    <div class="divider divider-primary divider-small mb-4">
                        <hr class="mr-auto">
                    </div>
                    <form id="contactForm" class="contact-form" action="/contact-form.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <input type="text" value="" placeholder="Ваше имя" data-msg-required="Представьтесь пожайлуста." maxlength="100" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" value="" placeholder="Ваш телефон" data-msg-required="Введите ваш телефонный номер." data-msg-email="Не корректно веден телефон." maxlength="100" class="form-control" name="phone" id="phone" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <textarea maxlength="5000" placeholder="Ваше сообщение" rows="3" class="form-control" name="message" id="message"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="submit" value="Заказать звонок" class="btn btn-primary mb-5" data-loading-text="Ожидайте...">

                                <div class="contact-form-success alert alert-success d-none" id="contactSuccess">
                                    Ваше сообщение успешно отправлено
                                </div>

                                <div class="contact-form-error alert alert-danger d-none" id="contactError">
                                    Ошибка отправки
                                    <span class="mail-error-message text-1 d-block" id="mailErrorMessage"></span>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <?$image_attributes = wp_get_attachment_image_src( $all_options['9_footer_logo'], array(195, 132) );?>
    <footer id="footer" class="bg-dark pt-5 mt-0">
        <div class="container container pt-5">
            <div class="row mb-5 pb-4">
                <div class="col text-center">
                    <a href="/" class="text-decoration-none">
                        <img src="<?=$image_attributes[0]?>" class="img-fluid" width="195" height="132" alt="" />
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-4 text-center mb-4 mb-md-0"><?=$all_options['9_screen_left']?></div>
                <div class="col-md-4 text-center mb-4 mb-md-0"><?=$all_options['9_screen_center']?></div>
                <div class="col-md-4 text-center"><?=$all_options['9_screen_right']?></div>
            </div>
        </div>
        <div class="footer-copyright bg-dark">
            <div class="container py-2">
                <div class="row py-4">
                    <div class="col text-center">
                        <p class="text-color-light font-weight-light opacity-4 mb-0">Разработка сайта <a target="_blank" href="\\mmentor.ru" style="color:#fff">Market Mentor</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?get_footer();?>