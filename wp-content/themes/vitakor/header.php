<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vitakor
 */

?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="медицинский центр, медицинкие услуги, медицинская клиника, частный медицинский центр, платные медицинские услуги, платная поликлиника">
    <!-- <meta name="description" content="Частный медицинский центр Витакор - Платные медицинские услуги - Цены"> -->
	<meta name="yandex-verification" content="1409ed26bbe96bfa" />
	<link rel="icon" href="https://vitacorclinic.ru/favicon.svg" type="image/x-icon">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption:400italic,700italic,400,700&subset=latin,cyrillic-ext"
          rel="stylesheet"/>
	<?php wp_head(); ?>
</head>

	
	
<body <?php body_class('mheader-v1 header-v1 title-v1 with_phones with_banner mfixed_N mfixed_view_always colored_theme_icon_Y '); ?>>
<?php wp_body_open(); ?>

	<!-- Pixel -->
<script type="text/javascript">
    (function (d, w) {
        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script");
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://qoopler.ru/index.php?ref="+d.referrer+"&page=" + encodeURIComponent(w.location.href);
            n.parentNode.insertBefore(s, n);
    })(document, window);
</script>
<!-- /Pixel -->


<div id="panel"></div>
<div class="visible-lg visible-md title-v1 index">
    <div class="top-block top-block-v1">
        <div class="maxwidth-theme">
            <div class="col-md-3 pull-left">
                <div class="social-icons">
                    <!-- noindex -->
                    <ul>
						<?php
						$vk_link   = get_field( 'vk_link', 2 );
						$meta_link = get_field( 'facebook_link', 2 );
						$inst_link = get_field( 'instagram_link', 2 );
						$nomer_telefona = get_field( 'nomer_telefona', 2 );
						?>
						<?php
						if ( $vk_link ):
							?>
                            <li class="vk fill_theme_hover">
                                <a href="<?php echo $vk_link; ?>" target="_blank" rel="nofollow" title="Вконтакте">
                                    Вконтакте
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #222;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path class="cls-1"
                                              d="M10.994,6.771v3.257a0.521,0.521,0,0,0,.426.351c0.3,0,.978-1.8,1.279-2.406a1.931,1.931,0,0,1,.738-0.826A0.61,0.61,0,0,1,13.8,6.992h2.878a0.464,0.464,0,0,1,.3.727,29.378,29.378,0,0,1-2.255,2.736,1.315,1.315,0,0,0-.238.55,1.2,1.2,0,0,0,.313.627c0.2,0.226,1.816,2,1.966,2.155a1.194,1.194,0,0,1,.276.576,0.765,0.765,0,0,1-.8.614c-0.627,0-2.167,0-2.342,0a2.788,2.788,0,0,1-.952-0.565c-0.226-.2-1.153-1.152-1.278-1.277a2.457,2.457,0,0,0,.024-0.363,0.826,0.826,0,0,0-.7.8,4.083,4.083,0,0,1-.238,1.139,1.024,1.024,0,0,1-.737.275A5,5,0,0,1,7.1,14.262,14.339,14.339,0,0,1,2.9,9.251C2.127,7.708,1.953,7.468,2,7.293s0.05-.3.226-0.3,2.39,0,2.606,0a0.851,0.851,0,0,1,.351.326c0.075,0.1.647,1.056,0.822,1.356S7.046,10.38,7.513,10.38a0.6,0.6,0,0,0,.474-0.7c0-.4,0-1.979,0-2.18a1.94,1.94,0,0,0-.978-1A1.261,1.261,0,0,1,7.937,6c0.6-.025,2.1-0.025,2.43.024A0.779,0.779,0,0,1,10.994,6.771Z"></path>
                                    </svg>
                                </a>
                            </li>
						<?php endif; ?>
						<?php
						if ( $meta_link ):
							?>
                            <li class="facebook fill_theme_hover">
                                <a href="<?php echo $meta_link; ?>" target="_blank"
                                   rel="nofollow" title="Facebook">
                                    Facebook
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #222;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path class="cls-1"
                                              d="M12.988,5.981L13.3,4a15.921,15.921,0,0,0-2.4.019,2.25,2.25,0,0,0-1.427.784A2.462,2.462,0,0,0,9,6.4C9,7.091,9,8.995,9,8.995L7,8.981v2.006l2,0.008v6l2.013,0v-6l2.374,0L13.7,8.979H11.012s0-2.285,0-2.509a0.561,0.561,0,0,1,.67-0.486C12.122,5.98,12.988,5.981,12.988,5.981Z"></path>
                                    </svg>
                                </a>
                            </li>
						<?php endif; ?>
						<?php
						if ( $inst_link ):
							?>
                            <li class="instagram fill_theme_hover">
                                <a href="<?php echo $inst_link; ?>" target="_blank" rel="nofollow"
                                   title="Instagram">
                                    Instagram
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #222;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path class="cls-1"
                                              d="M13,17H7a4,4,0,0,1-4-4V7A4,4,0,0,1,7,3h6a4,4,0,0,1,4,4v6A4,4,0,0,1,13,17ZM15,7a2,2,0,0,0-2-2H7A2,2,0,0,0,5,7v6a2,2,0,0,0,2,2h6a2,2,0,0,0,2-2V7Zm-5,6a3,3,0,1,1,3-3A3,3,0,0,1,10,13Zm1-4H9v2h2V9Z"></path>
                                    </svg>
                                </a>
                            </li>
						<?php endif; ?>
                    </ul>
                    <!-- /noindex -->
                </div>
            </div>
            <div class="top-block-item pull-right show-fixed fill_theme_hover nobg top-ctrl">
                <button class="top-btn inline-search-show twosmallfont">
                    <i class="svg inline  svg-inline- svg-search" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M16.74 15.739C16.5513 15.9266 16.2961 16.0319 16.03 16.0319C15.764 16.0319 15.5086 15.9266 15.3199 15.739L12.61 13.029C11.697 13.6632 10.6116 14.0021 9.5 14C8.2688 14.0016 7.07262 13.5906 6.10241 12.8326C5.13221 12.0746 4.44389 11.0134 4.14758 9.81837C3.85127 8.62336 3.96407 7.36351 4.46777 6.24006C4.97147 5.1166 5.83705 4.19434 6.92639 3.62058C8.01572 3.04681 9.26592 2.85464 10.4773 3.07475C11.6887 3.29486 12.7913 3.91456 13.6091 4.83487C14.427 5.75517 14.9129 6.92301 14.9891 8.15184C15.0654 9.38068 14.7278 10.5996 14.03 11.614L16.74 14.324C16.833 14.4169 16.9067 14.5272 16.957 14.6486C17.0074 14.77 17.0333 14.9001 17.0333 15.0315C17.0333 15.1629 17.0074 15.2931 16.957 15.4145C16.9067 15.5359 16.833 15.6462 16.74 15.739ZM7.55554 5.58988C8.13111 5.2053 8.80776 5.00003 9.5 5.00003C10.4283 5.00003 11.3185 5.36878 11.9749 6.02515C12.6312 6.68153 13 7.57177 13 8.50003C13 9.19226 12.7947 9.86895 12.4102 10.4445C12.0256 11.0201 11.4789 11.4687 10.8394 11.7336C10.1998 11.9985 9.49607 12.0678 8.81714 11.9328C8.1382 11.7977 7.51463 11.4644 7.02514 10.9749C6.53566 10.4854 6.20231 9.86178 6.06726 9.18284C5.93221 8.50391 6.00157 7.80017 6.26648 7.16063C6.53138 6.52109 6.97997 5.97447 7.55554 5.58988Z"
                                  fill="#333333"></path>
                        </svg>
                    </i> <span>Поиск</span>
                </button>
            </div>

			<?php
			$menuParameters = array(
				'menu'            => 'upper_menu',
				'container_class' => 'top-block-item col-md-5 menu_wrap',
				'menu_id'         => 'up-menu',
				'menu_class'      => 'menu topest twosmallfont clearfix',
				'items_wrap'      => '%3$s'
			);
			wp_nav_menu( $menuParameters );
			?>

            <div class="top-block-item pull-right">
                <div class="phone-block">
                    <div class="inline-block">
                        <div class="nobg phone">
                            <i class="svg inline  svg-inline- svg-phone" aria-hidden="true">
                                <svg id="Phone_small.svg" xmlns="http://www.w3.org/2000/svg" width="8" height="11"
                                     viewBox="0 0 8 11">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #666;
                                                fill-rule: evenodd;
                                            }
                                        </style>
                                    </defs>
                                    <path id="Shape_51_copy_11" data-name="Shape 51 copy 11" class="cls-1"
                                          d="M1239.82,68.651a19.725,19.725,0,0,0,1.87,1.081,0.557,0.557,0,0,1,.28.758l-0.11.382a0.859,0.859,0,0,1-.51.643,3.844,3.844,0,0,1-1.34.488c-1.29.028-2.44-1.081-3.24-2.007a11.824,11.824,0,0,1-2.3-4.042c-0.4-1.164-.77-2.718-0.11-3.837a3.912,3.912,0,0,1,1.1-.935,0.847,0.847,0,0,1,.8-0.124l0.38,0.1a0.559,0.559,0,0,1,.49.64c0,0.849-.02,1.459.01,2.158,0.01,0.29-.1.33-0.36,0.433-0.16.066-.28,0.114-0.41,0.164a0.507,0.507,0,0,0-.41.621,7.587,7.587,0,0,0,.8,2.135,7.693,7.693,0,0,0,1.43,1.77,0.5,0.5,0,0,0,.74-0.046c0.1-.087.21-0.169,0.34-0.281,0.22-.175.31-0.242,0.55-0.1h0Z"
                                          transform="translate(-1234 -61)"></path>
                                </svg>
                            </i> <a href="tel:<?php echo $nomer_telefona; ?>"><?php echo $nomer_telefona; ?></a>
                        </div>
                    </div>
                    <div class="inline-block">
                        <span class="pop2 callback-block twosmallfont colored">Заказать звонок</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header-v1 canfixed">
        <div class="mega_fixed_menu" style="display: none;">
            <div class="maxwidth-theme">
                <div class="col-md-12">
                    <div class="menu-only">
                        <nav class="mega-menu">
                            <i class="svg svg-close"></i>
                            <div class="table-menu">
                                <div class="marker-nav"></div>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="menu-item unvisible dropdown  ">
                                            <div class="wrap">
                                                <a class="dropdown-toggle" href="/services/">
                                                    Услуги </a>
                                                <span class="tail"></span>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-submenu ">
                                                        <a href="/services/vzrosloe-otdelenie/"
                                                           title="Взрослое отделение">Взрослое отделение<span
                                                                    class="arrow"><i></i></span></a>
                                                        <ul class="dropdown-menu">
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/lor-otolaringolog/"
                                                                   title="ЛОР (отоларинголог)">ЛОР (отоларинголог)</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/gastroskopiya/"
                                                                   title="Гастроскопия ">Гастроскопия </a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/kolonoskopiya/"
                                                                   title="Колоноскопия">Колоноскопия</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/proktologiya/"
                                                                   title="Проктология">Проктология</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/proktologicheskie-operaczii/"
                                                                   title="Проктологические операции">Проктологические операции</a>
                                                            </li>															
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/urolog/"
                                                                   title="Уролог">Уролог</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/ginekologiya/"
                                                                   title="Гинекология">Гинекология</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/ginekologicheskie-operatsii/"
                                                                   title="Гинекологические операции">Гинекологические
                                                                    операции</a>
                                                            </li>
	                                                       <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/girudoterapiya/"
                                                                   title="Гирудотерапия">Гирудотерапия</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/laparoskopiya/"
                                                                   title="Лапароскопия">Лапароскопия</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/gastroenterologiya/"
                                                                   title="Гастроэнтерология">Гастроэнтерология</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/terapevt/"
                                                                   title="Терапевт">Терапевт</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/kardiologiya/"
                                                                   title="Кардиология">Кардиология</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/flebologiya/"
                                                                   title="Флеболог">Флеболог</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/khirurgicheskoe-otdelenie/"
                                                                   title="Хирургическое отделение">Хирургическое
                                                                    отделение</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/travmatolog-ortoped/"
                                                                   title="Травматолог-ортопед">Травматолог-ортопед</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/neyrokhirurgiya/"
                                                                   title="Нейрохирургия">Нейрохирургия</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/nevrologiya/"
                                                                   title="Невролог">Невролог</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/mammolog-onkolog/"
                                                                   title="Маммолог-онколог">Маммолог-онколог</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/endokrinologiya/"
                                                                   title="Эндокринолог">Эндокринолог</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/funktsionalnaya-diagnostika/"
                                                                   title="Функциональная диагностика">Функциональная
                                                                    диагностика</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/diagnostika-valeoskan/"
                                                                   title="Диагностика Валеоскан">Диагностика
																Валеоскан</a>
                                                            </li>															
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/ultrazvukovoe-issledovanie-uzi/"
                                                                   title="Ультразвуковое исследование (УЗИ)">Ультразвуковое
                                                                    исследование (УЗИ)</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/protsedurnyy-kabinet/"
                                                                   title="Процедурный кабинет">Процедурный кабинет</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/endoskopiya/"
                                                                   title="Эндоскопия">Эндоскопия</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/massazh/"
                                                                   title="Массаж">Массаж</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/pulsovaya-diagnostika/"
                                                                   title="Пульсовая диагностика">Пульсовая
                                                                    диагностика</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/vnutrivennoe-lazernoe-obluchenie/"
                                                                   title="Внутривенное лазерное облучение">Внутривенное
                                                                    лазерное облучение</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown-submenu ">
                                                        <a href="/services/detskoe-otdelenie/"
                                                           title="Детское отделение">Детское отделение<span
                                                                    class="arrow"><i></i></span></a>
                                                        <ul class="dropdown-menu">
                                                            <li class=" ">
                                                                <a href="/services/detskoe-otdelenie/detskaya-stomatologiya-det/"
                                                                   title="Детская стоматология">Детская стоматология</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/detskoe-otdelenie/detskiy-massazh/"
                                                                   title="Детский массаж">Детский массаж</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/detskoe-otdelenie/detskaya-nevrologiya/"
                                                                   title="Детская неврология">Детская неврология</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/detskoe-otdelenie/detskaya-kardiologiya/"
                                                                   title="Детская кардиология">Детская кардиология</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown-submenu ">
                                                        <a href="/services/stomatologiya/" title="Стоматология">Стоматология<span
                                                                    class="arrow"><i></i></span></a>
                                                        <ul class="dropdown-menu">
                                                            <li class=" ">
                                                                <a href="/services/stomatologiya/detskaya-stomatologiya/"
                                                                   title="Детская стоматология">Детская стоматология</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/stomatologiya/parodontologiya/"
                                                                   title="Пародонтология">Пародонтология</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/stomatologiya/esteticheskaya-stomatologiya/"
                                                                   title="Эстетическая стоматология">Эстетическая
                                                                    стоматология</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/stomatologiya/diagnostika-i-lechenie-zubov/"
                                                                   title="Диагностика и лечение зубов">Диагностика и
                                                                    лечение зубов</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/stomatologiya/khirurgiya/"
                                                                   title="Хирургия">Хирургия</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/stomatologiya/implantacziya/"
                                                                   title="Имплантация">Имплантация</a>
                                                            </li>
                                                            <li class=" ">
                                                                <a href="/services/stomatologiya/protezirovanie/"
                                                                   title="Протезирование">Протезирование</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="menu-item unvisible dropdown  ">
                                            <div class="wrap">
                                                <a class="dropdown-toggle" href="/company/">
                                                    Клиника </a>
                                                <span class="tail"></span>
                                                <ul class="dropdown-menu">
                                                    <li class=" ">
                                                        <a href="/company/index.php" title="О клинике">О клинике</a>
                                                    </li>
                                                    <li class=" ">
                                                        <a href="/company/licenses/" title="Лицензии">Лицензии</a>
                                                    </li>
                                                    <li class=" ">
                                                        <a href="/company/reviews/" title="Отзывы">Отзывы</a>
                                                    </li>
                                                    <li class=" ">
                                                        <a href="/company/requisites/" title="Контактная информация">Контактная
                                                            информация</a>
                                                    </li>
                                                    <li class=" ">
                                                        <a href="/company/vacancy/" title="Вакансии">Вакансии</a>
                                                    </li>
                                                    <li class=" ">
                                                        <a href="/company/kontroliruyushchie-organizatsii/"
                                                           title="Контролирующие организации">Контролирующие
                                                            организации</a>
                                                    </li>
                                                    <li class=" ">
                                                        <a href="/company/obrabotka-personalnykh-dannykh/"
                                                           title="Обработка персональных данных">Обработка персональных
                                                            данных</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="menu-item unvisible dropdown  ">
                                            <div class="wrap">
                                                <a class="dropdown-toggle" href="/staff/">
                                                    Специалисты </a>
                                                <span class="tail"></span>
                                                <ul class="dropdown-menu">
                                                    <li class=" ">
                                                        <a href="/staff/rukovoditeli/"
                                                           title="Руководители">Руководители</a>
                                                    </li>
                                                    <li class=" ">
                                                        <a href="/staff/terapevty-i-uzkie-spetsialisty/"
                                                           title="Терапевты, узкие специалисты, детские врачи">Терапевты,
                                                            узкие специалисты, детские врачи</a>
                                                    </li>
                                                    <li class=" ">
                                                        <a href="/staff/proczedurnyj-kabinet-staff/"
                                                           title="Процедурный кабинет">Процедурный кабинет</a>
                                                    </li>
                                                    <li class=" ">
                                                        <a href="/staff/administrativnyy-otdel/"
                                                           title="Административный отдел">Административный отдел</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>										
                                        <td class="menu-item unvisible  ">
                                            <div class="wrap">
                                                <a class="dropdown-toggle" href="/czeny/">Цены</a>
                                            </div>
                                        </td>
                                        <td class="menu-item unvisible   ">
                                            <div class="wrap">
                                                <a class="" href="/news/">
                                                    Новости и акции </a>
                                            </div>
                                        </td>										
                                        <td class="menu-item unvisible   ">
                                            <div class="wrap">
                                                <a class="" href="/dms/">
                                                    ДМС </a>
                                            </div>
                                        </td>
                                        <td class="dropdown js-dropdown nosave unvisible">
                                            <div class="wrap">
                                                <a class="dropdown-toggle more-items" href="#">
                                                    <span>Ещё</span>
                                                </a>
                                                <span class="tail"></span>
                                                <ul class="dropdown-menu"></ul>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo_and_menu-row">
            <div class="maxwidth-theme">
                <div class="logo-row">
                    <div class="row">
                        <div class="logo-block col-md-3 col-sm-4">
                            <div class="burger pull-left fill_theme_hover">
                                <i class="svg inline  svg-inline-burger" aria-hidden="true">
                                    <svg id="Burger_white.svg" xmlns="http://www.w3.org/2000/svg" width="16" height="12"
                                         viewBox="0 0 16 12">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #fff;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path id="Rounded_Rectangle_81_copy_2" data-name="Rounded Rectangle 81 copy 2"
                                              class="cls-1"
                                              d="M279,149H265a1,1,0,0,1-1-1h0a1,1,0,0,1,1-1h14a1,1,0,0,1,1,1h0A1,1,0,0,1,279,149Zm0-5H265a1,1,0,1,1,0-2h14A1,1,0,1,1,279,144Zm0-5H265a1,1,0,1,1,0-2h14A1,1,0,1,1,279,139Z"
                                              transform="translate(-264 -137)"></path>
                                    </svg>
                                </i>
                            </div>
                            <div class="logo">
                                <a href="/">
                                    <img data-lazyload="" class=" ls-is-cached lazyloaded" src="<?php the_field( 'logotip', 2 ); ?>" data-src="<?php the_field( 'logotip', 2 ); ?>" alt="Logo" title="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-7 menu-row">
                            <div class="menu-only" style="padding-left: 0; padding-right: 166px;">
                                <nav class="mega-menu sliced" style="overflow: visible;">
                                    <div class="table-menu">
                                        <div class="marker-nav"></div>
										<?php
										wp_nav_menu( array( 'theme_location' => 'max_mega_menu_1' ) );
										?>
                                    </div>

                                </nav>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="right-icons pull-right">
                                <div class="pull-right">
                                    <div class="wrap_icon record">
                                        <span class="pop1 btn btn-default">Запись онлайн</span>
                                        <span class="clbck" style="display: none">TEST</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="line-row visible-xs"></div>
    </header>
</div>

<div id="headerfixed">
    <div class="maxwidth-theme">
        <div class="logo-row v2 row margin0">
            <div class="inner-table-block nopadding logo-block">
                <div class="burger pull-left fill_theme_hover">
                    <i class="svg inline  svg-inline-burger" aria-hidden="true">
                        <svg id="Burger_white.svg" xmlns="http://www.w3.org/2000/svg" width="16" height="12"
                             viewBox="0 0 16 12">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #fff;
                                        fill-rule: evenodd;
                                    }
                                </style>
                            </defs>
                            <path id="Rounded_Rectangle_81_copy_2" data-name="Rounded Rectangle 81 copy 2"
                                  class="cls-1"
                                  d="M279,149H265a1,1,0,0,1-1-1h0a1,1,0,0,1,1-1h14a1,1,0,0,1,1,1h0A1,1,0,0,1,279,149Zm0-5H265a1,1,0,1,1,0-2h14A1,1,0,1,1,279,144Zm0-5H265a1,1,0,1,1,0-2h14A1,1,0,1,1,279,139Z"
                                  transform="translate(-264 -137)"></path>
                        </svg>
                    </i>
                </div>
                <img data-lazyload="" class=" ls-is-cached lazyloaded"
                     src="<?php the_field( 'logotip', 2 ); ?>"
                     data-src="<?php the_field( 'logotip', 2 ); ?>"
                     alt="Logo" title="Logo">
            </div>
            <div class="inner-table-block menu-block">
                <div class="navs table-menu js-nav">
                    <nav class="mega-menu sliced">
						<?php
						wp_nav_menu( array( 'theme_location' => 'max_mega_menu_1' ) );
						?>
                    </nav>
                </div>
            </div>
            <div class="inner-table-block small-block nopadding inline-search-show" data-type_search="fixed">
                <div class="search-block nobg top-btn fill_theme_hover">
                    <i class="svg inline  svg-inline- svg-search" aria-hidden="true"><svg id="Search_white.svg" xmlns="http://www.w3.org/2000/svg" width="18.06" height="18.031" viewBox="0 0 18.06 18.031">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #fff;
                                        fill-rule: evenodd;
                                    }
                                </style>
                            </defs>
                            <path id="Rounded_Rectangle_115_copy_8" data-name="Rounded Rectangle 115 copy 8" class="cls-1" d="M1765.76,179.724a1.006,1.006,0,0,1-1.42,0l-3.42-3.423a8.019,8.019,0,1,1,1.41-1.419l3.43,3.428A1,1,0,0,1,1765.76,179.724ZM1756,164a6,6,0,1,0,6,6A6,6,0,0,0,1756,164Z" transform="translate(-1748 -162)"></path>
                        </svg>
                    </i>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mobileheader" class="visible-xs visible-sm">
    <div class="mobileheader-v1">
        <div class="burger pull-left">
            <i class="svg inline  svg-inline-burger" aria-hidden="true">
                <svg id="Burger_white.svg" xmlns="http://www.w3.org/2000/svg" width="16" height="12"
                     viewBox="0 0 16 12">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #fff;
                                fill-rule: evenodd;
                            }
                        </style>
                    </defs>
                    <path id="Rounded_Rectangle_81_copy_2" data-name="Rounded Rectangle 81 copy 2" class="cls-1"
                          d="M279,149H265a1,1,0,0,1-1-1h0a1,1,0,0,1,1-1h14a1,1,0,0,1,1,1h0A1,1,0,0,1,279,149Zm0-5H265a1,1,0,1,1,0-2h14A1,1,0,1,1,279,144Zm0-5H265a1,1,0,1,1,0-2h14A1,1,0,1,1,279,139Z"
                          transform="translate(-264 -137)"></path>
                </svg>
            </i> <i class="svg svg-close black lg"></i>
        </div>
        <div class="right-icons pull-right">
            <div class="pull-right">
                <div class="wrap_icon">
                    <button class="top-btn inline-search-show nobg twosmallfont">
                        <i class="svg inline  svg-inline- svg-search" aria-hidden="true">
                            <svg id="Search_white.svg" xmlns="http://www.w3.org/2000/svg" width="18.06" height="18.031"
                                 viewBox="0 0 18.06 18.031">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #fff;
                                            fill-rule: evenodd;
                                        }
                                    </style>
                                </defs>
                                <path id="Rounded_Rectangle_115_copy_8" data-name="Rounded Rectangle 115 copy 8"
                                      class="cls-1"
                                      d="M1765.76,179.724a1.006,1.006,0,0,1-1.42,0l-3.42-3.423a8.019,8.019,0,1,1,1.41-1.419l3.43,3.428A1,1,0,0,1,1765.76,179.724ZM1756,164a6,6,0,1,0,6,6A6,6,0,0,0,1756,164Z"
                                      transform="translate(-1748 -162)"></path>
                            </svg>
                        </i></button>
                </div>
            </div>
        </div>
        <div class="logo-block">
            <div class="logo">
                <a href="/"><img data-lazyload="" class=" lazyloaded" src="<?php the_field( 'logotip', 2 ); ?>" data-src="<?php the_field( 'logotip', 2 ); ?>" alt="Logo" title="Logo"></a></div>
        </div>
    </div>
    <div id="mobilemenu" class="leftside">
        <div class="mobilemenu-v1 scroller">
            <div class="wrap">
                <div id="bx_incl_area_7" class="bx-context-toolbar-empty-area"
                     title="Двойной щелчок - Редактировать пункты меню" style="min-height: 12px;">
                    <div class="menu top">
                        <ul class="top">
                            <li>
                                <a class="dark-color parent" href="/services/" title="Услуги">
                                    <span>Услуги</span>
                                    <span class="arrow"><i class="svg svg_triangle_right"></i></span>
                                </a>
                                <ul class="dropdown">
                                    <li class="menu_back"><a href="" class="dark-color" rel="nofollow"><i
                                                    class="svg svg-arrow-right"></i>Назад</a></li>
                                    <li class="menu_title"><a class="dark-color" href="/services/">Услуги</a></li>
                                    <li>
                                        <a class="dark-color parent" href="/services/vzrosloe-otdelenie/"
                                           title="Взрослое отделение">
                                            <span>Взрослое отделение</span>
                                            <span class="arrow"><i class="svg svg_triangle_right"></i></span>
                                        </a>
                                        <ul class="dropdown">
                                            <li class="menu_back"><a href="" class="dark-color" rel="nofollow"><i
                                                            class="svg svg-arrow-right"></i>Назад</a></li>
                                            <li class="menu_title"><a class="dark-color"
                                                                      href="/services/vzrosloe-otdelenie/">Взрослое
                                                    отделение</a></li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/lor-otolaringolog/"
                                                   title="ЛОР (отоларинголог)">
                                                    <span>ЛОР (отоларинголог)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/gastroskopiya/"
                                                   title="Гастроскопия ">
                                                    <span>Гастроскопия </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/kolonoskopiya/"
                                                   title="Колоноскопия">
                                                    <span>Колоноскопия</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/proktologiya/"
                                                   title="Проктология">
                                                    <span>Проктология</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/proktologicheskie-operaczii/"
                                                   title="Проктологические операции">
                                                    <span>Проктологические операции</span>
                                                </a>
                                            </li>											
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/urologiya/"
                                                   title="Уролог">
                                                    <span>Уролог</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/ginekologiya/"
                                                   title="Гинекология">
                                                    <span>Гинекология</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/ginekologicheskie-operatsii/"
                                                   title="Гинекологические операции">
                                                    <span>Гинекологические операции</span>
                                                </a>
                                            </li>
	                                        <li class=" ">
                                                                <a href="/services/vzrosloe-otdelenie/girudoterapiya/"
                                                                   title="Гирудотерапия">Гирудотерапия</a>
                                            </li>											
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/laparoskopiya/"
                                                   title="Лапароскопия">
                                                    <span>Лапароскопия</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/gastroenterologiya/"
                                                   title="Гастроэнтерология">
                                                    <span>Гастроэнтерология</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/terapevt/"
                                                   title="Терапевт">
                                                    <span>Терапевт</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/kardiologiya/"
                                                   title="Кардиология">
                                                    <span>Кардиология</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/flebologiya/"
                                                   title="Флеболог">
                                                    <span>Флеболог</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/khirurgicheskoe-otdelenie/"
                                                   title="Хирургическое отделение">
                                                    <span>Хирургическое отделение</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/travmatolog-ortoped/"
                                                   title="Травматолог-ортопед">
                                                    <span>Травматолог-ортопед</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/neyrokhirurgiya/"
                                                   title="Нейрохирургия">
                                                    <span>Нейрохирургия</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/nevrologiya/"
                                                   title="Невролог">
                                                    <span>Невролог</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/mammolog-onkolog/"
                                                   title="Маммолог-онколог">
                                                    <span>Маммолог-онколог</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/endokrinologiya/"
                                                   title="Эндокринолог">
                                                    <span>Эндокринолог</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/funktsionalnaya-diagnostika/"
                                                   title="Функциональная диагностика">
                                                    <span>Функциональная диагностика</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/diagnostika-valeoskan/"
                                                   title="Диагностика Валеоскан">
                                                    <span>Диагностика Валеоскан</span>
                                                </a>
                                            </li>											
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/ultrazvukovoe-issledovanie-uzi/"
                                                   title="Ультразвуковое исследование (УЗИ)">
                                                    <span>Ультразвуковое исследование (УЗИ)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/protsedurnyy-kabinet/"
                                                   title="Процедурный кабинет">
                                                    <span>Процедурный кабинет</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/endoskopiya/"
                                                   title="Эндоскопия">
                                                    <span>Эндоскопия</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/vzrosloe-otdelenie/massazh/"
                                                   title="Массаж">
                                                    <span>Массаж</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/pulsovaya-diagnostika/"
                                                   title="Пульсовая диагностика">
                                                    <span>Пульсовая диагностика</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/vzrosloe-otdelenie/vnutrivennoe-lazernoe-obluchenie/"
                                                   title="Внутривенное лазерное облучение">
                                                    <span>Внутривенное лазерное облучение</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="dark-color parent" href="/services/detskoe-otdelenie/"
                                           title="Детское отделение">
                                            <span>Детское отделение</span>
                                            <span class="arrow"><i class="svg svg_triangle_right"></i></span>
                                        </a>
                                        <ul class="dropdown">
                                            <li class="menu_back"><a href="" class="dark-color" rel="nofollow"><i
                                                            class="svg svg-arrow-right"></i>Назад</a></li>
                                            <li class="menu_title"><a class="dark-color"
                                                                      href="/services/detskoe-otdelenie/">Детское
                                                    отделение</a></li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/detskoe-otdelenie/detskaya-stomatologiya-det/"
                                                   title="Детская стоматология">
                                                    <span>Детская стоматология</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/detskoe-otdelenie/detskiy-massazh/"
                                                   title="Детский массаж">
                                                    <span>Детский массаж</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/detskoe-otdelenie/detskaya-nevrologiya/"
                                                   title="Детская неврология">
                                                    <span>Детская неврология</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/detskoe-otdelenie/detskaya-kardiologiya/"
                                                   title="Детская кардиология">
                                                    <span>Детская кардиология</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="dark-color parent" href="/services/stomatologiya/"
                                           title="Стоматология">
                                            <span>Стоматология</span>
                                            <span class="arrow"><i class="svg svg_triangle_right"></i></span>
                                        </a>
                                        <ul class="dropdown">
                                            <li class="menu_back"><a href="" class="dark-color" rel="nofollow"><i
                                                            class="svg svg-arrow-right"></i>Назад</a></li>
                                            <li class="menu_title"><a class="dark-color"
                                                                      href="/services/stomatologiya/">Стоматология</a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/stomatologiya/detskaya-stomatologiya/"
                                                   title="Детская стоматология">
                                                    <span>Детская стоматология</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/stomatologiya/parodontologiya/"
                                                   title="Пародонтология">
                                                    <span>Пародонтология</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/stomatologiya/esteticheskaya-stomatologiya/"
                                                   title="Эстетическая стоматология">
                                                    <span>Эстетическая стоматология</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color"
                                                   href="/services/stomatologiya/diagnostika-i-lechenie-zubov/"
                                                   title="Диагностика и лечение зубов">
                                                    <span>Диагностика и лечение зубов</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/stomatologiya/khirurgiya/"
                                                   title="Хирургия">
                                                    <span>Хирургия</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/stomatologiya/implantatsiya/"
                                                   title="Имплантация">
                                                    <span>Имплантация</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dark-color" href="/services/stomatologiya/protezirovanie/"
                                                   title="Протезирование">
                                                    <span>Протезирование</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="dark-color" href="/czeny/" title="Цены">
                                    <span>Цены</span>
                                </a>
                            </li>
                            <li>
                                <a class="dark-color parent" href="/company/" title="Клиника">
                                    <span>Клиника</span>
                                    <span class="arrow"><i class="svg svg_triangle_right"></i></span>
                                </a>
                                <ul class="dropdown">
                                    <li class="menu_back"><a href="" class="dark-color" rel="nofollow"><i
                                                    class="svg svg-arrow-right"></i>Назад</a></li>
                                    <li class="menu_title"><a class="dark-color" href="/company/">Клиника</a></li>
                                    <li>
                                        <a class="dark-color" href="/company/index.php" title="О клинике">
                                            <span>О клинике</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dark-color" href="/company/licenses/" title="Лицензии">
                                            <span>Лицензии</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dark-color" href="/company/reviews/" title="Отзывы">
                                            <span>Отзывы</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dark-color" href="/company/requisites/" title="Контактная информация">
                                            <span>Контактная информация</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dark-color" href="/company/vacancy/" title="Вакансии">
                                            <span>Вакансии</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dark-color" href="/company/kontroliruyushchie-organizatsii/"
                                           title="Контролирующие организации">
                                            <span>Контролирующие организации</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dark-color" href="/company/obrabotka-personalnykh-dannykh/"
                                           title="Обработка персональных данных">
                                            <span>Обработка персональных данных</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="dark-color parent" href="/staff/" title="Специалисты">
                                    <span>Специалисты</span>
                                    <span class="arrow"><i class="svg svg_triangle_right"></i></span>
                                </a>
                                <ul class="dropdown">
                                    <li class="menu_back"><a href="" class="dark-color" rel="nofollow"><i
                                                    class="svg svg-arrow-right"></i>Назад</a></li>
                                    <li class="menu_title"><a class="dark-color" href="/staff/">Специалисты</a></li>
                                    <li>
                                        <a class="dark-color" href="/staff/rukovoditeli/" title="Руководители">
                                            <span>Руководители</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dark-color" href="/staff/terapevty-i-uzkie-spetsialisty/"
                                           title="Терапевты, узкие специалисты, детские врачи">
                                            <span>Терапевты, узкие специалисты, детские врачи</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dark-color" href="/staff/proczedurnyj-kabinet-staff/"
                                           title="Процедурный кабинет">
                                            <span>Процедурный кабинет</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dark-color" href="/staff/administrativnyy-otdel/"
                                           title="Административный отдел">
                                            <span>Административный отдел</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="dark-color" href="/news/" title="Новости и акции">
                                    <span>Новости и акции</span>
                                </a>
                            </li>							
                            <li>
                                <a class="dark-color" href="/dms/" title="ДМС">
                                    <span>ДМС</span>
                                </a>
                            </li>
                            <li>
                                <a class="dark-color" href="/price/analizy/" title="Анализы">
                                    <span>Анализы</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mobile-btn gray">
			<span class="btn btn-default btn-lg pop1">
				Запись онлайн			</span>
                </div>
                <div class="menu middle">
                    <ul>
                        <li>
                            <a href="tel:+74952482180" class="dark-color">
                                <i class="svg inline  svg-inline- svg-phone" aria-hidden="true">
                                    <svg id="Phone_small.svg" xmlns="http://www.w3.org/2000/svg" width="8" height="11"
                                         viewBox="0 0 8 11">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #666;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path id="Shape_51_copy_11" data-name="Shape 51 copy 11" class="cls-1"
                                              d="M1239.82,68.651a19.725,19.725,0,0,0,1.87,1.081,0.557,0.557,0,0,1,.28.758l-0.11.382a0.859,0.859,0,0,1-.51.643,3.844,3.844,0,0,1-1.34.488c-1.29.028-2.44-1.081-3.24-2.007a11.824,11.824,0,0,1-2.3-4.042c-0.4-1.164-.77-2.718-0.11-3.837a3.912,3.912,0,0,1,1.1-.935,0.847,0.847,0,0,1,.8-0.124l0.38,0.1a0.559,0.559,0,0,1,.49.64c0,0.849-.02,1.459.01,2.158,0.01,0.29-.1.33-0.36,0.433-0.16.066-.28,0.114-0.41,0.164a0.507,0.507,0,0,0-.41.621,7.587,7.587,0,0,0,.8,2.135,7.693,7.693,0,0,0,1.43,1.77,0.5,0.5,0,0,0,.74-0.046c0.1-.087.21-0.169,0.34-0.281,0.22-.175.31-0.242,0.55-0.1h0Z"
                                              transform="translate(-1234 -61)"></path>
                                    </svg>
                                </i> <span>+7 (495) 248-21-80</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="contacts">
                    <div class="title">Будьте на связи</div>
                    <div class="address">
                        <i class="svg svg-address"></i>
                        <div id="bx_incl_area_8" class="bx-context-toolbar-empty-area"
                             title="Двойной щелчок - Редактировать Address как html" style="min-height: 12px;">г.
                            Подольск, ул. Большая Серпуховская, д. 33

                        </div>
                    </div>
                    <div class="email">
                        <i class="svg svg-email"></i>
                        <div id="bx_incl_area_9" class="bx-context-toolbar-empty-area"
                             title="Двойной щелчок - Редактировать E-mail как html" style="min-height: 12px;"><a
                                    href="mailto:info@vitacorclinic.ru">info@vitacorclinic.ru</a>

                        </div>
                    </div>
                </div>
                <div id="bx_incl_area_10" class="bx-context-toolbar-empty-area"
                     title="Двойной щелчок - Редактировать параметры компонента" style="min-height: 12px;">
                    <div class="social-icons">
                        <!-- noindex -->
                        <ul>
                            <li class="facebook">
                                <a href="http://www.facebook.com/Клиника-Витакор-Подольск-107292814746347/"
                                   class="dark-color" target="_blank" rel="nofollow" title="Facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #222;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path class="cls-1"
                                              d="M12.988,5.981L13.3,4a15.921,15.921,0,0,0-2.4.019,2.25,2.25,0,0,0-1.427.784A2.462,2.462,0,0,0,9,6.4C9,7.091,9,8.995,9,8.995L7,8.981v2.006l2,0.008v6l2.013,0v-6l2.374,0L13.7,8.979H11.012s0-2.285,0-2.509a0.561,0.561,0,0,1,.67-0.486C12.122,5.98,12.988,5.981,12.988,5.981Z"></path>
                                    </svg>
                                    Facebook </a>
                            </li>
                            <li class="vk">
                                <a href="http://vk.com/vitacorclinic" class="dark-color" target="_blank" rel="nofollow"
                                   title="Вконтакте">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #222;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path class="cls-1"
                                              d="M10.994,6.771v3.257a0.521,0.521,0,0,0,.426.351c0.3,0,.978-1.8,1.279-2.406a1.931,1.931,0,0,1,.738-0.826A0.61,0.61,0,0,1,13.8,6.992h2.878a0.464,0.464,0,0,1,.3.727,29.378,29.378,0,0,1-2.255,2.736,1.315,1.315,0,0,0-.238.55,1.2,1.2,0,0,0,.313.627c0.2,0.226,1.816,2,1.966,2.155a1.194,1.194,0,0,1,.276.576,0.765,0.765,0,0,1-.8.614c-0.627,0-2.167,0-2.342,0a2.788,2.788,0,0,1-.952-0.565c-0.226-.2-1.153-1.152-1.278-1.277a2.457,2.457,0,0,0,.024-0.363,0.826,0.826,0,0,0-.7.8,4.083,4.083,0,0,1-.238,1.139,1.024,1.024,0,0,1-.737.275A5,5,0,0,1,7.1,14.262,14.339,14.339,0,0,1,2.9,9.251C2.127,7.708,1.953,7.468,2,7.293s0.05-.3.226-0.3,2.39,0,2.606,0a0.851,0.851,0,0,1,.351.326c0.075,0.1.647,1.056,0.822,1.356S7.046,10.38,7.513,10.38a0.6,0.6,0,0,0,.474-0.7c0-.4,0-1.979,0-2.18a1.94,1.94,0,0,0-.978-1A1.261,1.261,0,0,1,7.937,6c0.6-.025,2.1-0.025,2.43.024A0.779,0.779,0,0,1,10.994,6.771Z"></path>
                                    </svg>
                                    Вконтакте </a>
                            </li>
                            <li class="instagram">
                                <a href="https://www.instagram.com/vitacorclinic/" class="dark-color" target="_blank"
                                   rel="nofollow" title="Instagram">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #222;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path class="cls-1"
                                              d="M13,17H7a4,4,0,0,1-4-4V7A4,4,0,0,1,7,3h6a4,4,0,0,1,4,4v6A4,4,0,0,1,13,17ZM15,7a2,2,0,0,0-2-2H7A2,2,0,0,0,5,7v6a2,2,0,0,0,2,2h6a2,2,0,0,0,2-2V7Zm-5,6a3,3,0,1,1,3-3A3,3,0,0,1,10,13Zm1-4H9v2h2V9Z"></path>
                                    </svg>
                                    Instagram </a>
                            </li>
                        </ul>
                        <!-- /noindex -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
