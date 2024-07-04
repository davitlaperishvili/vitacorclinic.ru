<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vitakor
 */

?>

<footer id="footer" class="grey_footer footer-v1">
    <div class="top_footer">
        <div class="maxwidth-theme">
<?php
						$nomer_telefona = get_field( 'nomer_telefona', 2 );
						?>

            <div class="col-md-3 contact-block">
                <div class="info">
                    <div class="row">
                        <div class="col-md-12 col-sm-4">
                            <div class="wrap_icon inner-table-block">
                                <div class="phone-block">
                                    <div class="nobg phone">
                                        <i class="svg inline  svg-inline- svg-phone" aria-hidden="true"><svg id="Phone_small.svg" xmlns="http://www.w3.org/2000/svg" width="8" height="11" viewBox="0 0 8 11">
                                                <defs>
                                                    <style>
                                                        .cls-1 {
                                                            fill: #666;
                                                            fill-rule: evenodd;
                                                        }
                                                    </style>
                                                </defs>
                                                <path id="Shape_51_copy_11" data-name="Shape 51 copy 11" class="cls-1" d="M1239.82,68.651a19.725,19.725,0,0,0,1.87,1.081,0.557,0.557,0,0,1,.28.758l-0.11.382a0.859,0.859,0,0,1-.51.643,3.844,3.844,0,0,1-1.34.488c-1.29.028-2.44-1.081-3.24-2.007a11.824,11.824,0,0,1-2.3-4.042c-0.4-1.164-.77-2.718-0.11-3.837a3.912,3.912,0,0,1,1.1-.935,0.847,0.847,0,0,1,.8-0.124l0.38,0.1a0.559,0.559,0,0,1,.49.64c0,0.849-.02,1.459.01,2.158,0.01,0.29-.1.33-0.36,0.433-0.16.066-.28,0.114-0.41,0.164a0.507,0.507,0,0,0-.41.621,7.587,7.587,0,0,0,.8,2.135,7.693,7.693,0,0,0,1.43,1.77,0.5,0.5,0,0,0,.74-0.046c0.1-.087.21-0.169,0.34-0.281,0.22-.175.31-0.242,0.55-0.1h0Z" transform="translate(-1234 -61)"></path>
                                            </svg>
                                        </i>				<a href="tel:<?php echo $nomer_telefona; ?>"><?php echo $nomer_telefona; ?></a>
                                    </div>
                                    <div class="button">
                                        <span class="pop2 callback-block twosmallfont colored">Заказать звонок</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-4">
                            <div class="email blocks">
                                <a href="mailto:info@vitacorclinic.ru">info@vitacorclinic.ru</a>							</div>
                        </div>
                        <div class="col-md-12 col-sm-4">
                            <div class="address blocks">
                                г. Подольск, ул. Большая Серпуховская, д. 33							</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1 social-block">
                <div class="social-icons">
                    <div class="small_title">Мы в соцсетях</div>
                    <!-- noindex -->
                    <ul>
                        <li class="vk fill_theme_hover">
                            <a href="http://vk.com/vitacorclinic" target="_blank" rel="nofollow" title="Вконтакте">
                                Вконтакте					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #222;
                                                fill-rule: evenodd;
                                            }
                                        </style>
                                    </defs>
                                    <path class="cls-1" d="M10.994,6.771v3.257a0.521,0.521,0,0,0,.426.351c0.3,0,.978-1.8,1.279-2.406a1.931,1.931,0,0,1,.738-0.826A0.61,0.61,0,0,1,13.8,6.992h2.878a0.464,0.464,0,0,1,.3.727,29.378,29.378,0,0,1-2.255,2.736,1.315,1.315,0,0,0-.238.55,1.2,1.2,0,0,0,.313.627c0.2,0.226,1.816,2,1.966,2.155a1.194,1.194,0,0,1,.276.576,0.765,0.765,0,0,1-.8.614c-0.627,0-2.167,0-2.342,0a2.788,2.788,0,0,1-.952-0.565c-0.226-.2-1.153-1.152-1.278-1.277a2.457,2.457,0,0,0,.024-0.363,0.826,0.826,0,0,0-.7.8,4.083,4.083,0,0,1-.238,1.139,1.024,1.024,0,0,1-.737.275A5,5,0,0,1,7.1,14.262,14.339,14.339,0,0,1,2.9,9.251C2.127,7.708,1.953,7.468,2,7.293s0.05-.3.226-0.3,2.39,0,2.606,0a0.851,0.851,0,0,1,.351.326c0.075,0.1.647,1.056,0.822,1.356S7.046,10.38,7.513,10.38a0.6,0.6,0,0,0,.474-0.7c0-.4,0-1.979,0-2.18a1.94,1.94,0,0,0-.978-1A1.261,1.261,0,0,1,7.937,6c0.6-.025,2.1-0.025,2.43.024A0.779,0.779,0,0,1,10.994,6.771Z"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="facebook fill_theme_hover">
                            <a href="http://www.facebook.com/Клиника-Витакор-Подольск-107292814746347/" target="_blank" rel="nofollow" title="Facebook">
                                Facebook					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #222;
                                                fill-rule: evenodd;
                                            }
                                        </style>
                                    </defs>
                                    <path class="cls-1" d="M12.988,5.981L13.3,4a15.921,15.921,0,0,0-2.4.019,2.25,2.25,0,0,0-1.427.784A2.462,2.462,0,0,0,9,6.4C9,7.091,9,8.995,9,8.995L7,8.981v2.006l2,0.008v6l2.013,0v-6l2.374,0L13.7,8.979H11.012s0-2.285,0-2.509a0.561,0.561,0,0,1,.67-0.486C12.122,5.98,12.988,5.981,12.988,5.981Z"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="instagram fill_theme_hover">
                            <a href="https://www.instagram.com/vitacorclinic/" target="_blank" rel="nofollow" title="Instagram">
                                Instagram					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #222;
                                                fill-rule: evenodd;
                                            }
                                        </style>
                                    </defs>
                                    <path class="cls-1" d="M13,17H7a4,4,0,0,1-4-4V7A4,4,0,0,1,7,3h6a4,4,0,0,1,4,4v6A4,4,0,0,1,13,17ZM15,7a2,2,0,0,0-2-2H7A2,2,0,0,0,5,7v6a2,2,0,0,0,2,2h6a2,2,0,0,0,2-2V7Zm-5,6a3,3,0,1,1,3-3A3,3,0,0,1,10,13Zm1-4H9v2h2V9Z"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <!-- /noindex -->
                </div>			</div>
            <div class="col-md-2 link-block">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="eye-block"><div class="eye-link"><span id="cr-link-color"><a href="#" id="cr_version_link" style="font-family:inherit !important;color:inherit !important;" >Версия для<br> слабовидящих</a></span></div></div>
                    </div>
                    <div class="col-md-12">
                        <div class="print-block"><div class="print-link"><span class="text twosmallfont">Версия для<br> печати</span></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="maxwidth-theme">
        <div class="bottom_footer">
            <div class="col-md-3 col-sm-3 copy twosmallfont">
                © 2023 Все права защищены.			</div>
            <div class="confidentiality_wrap pull-right text-right">
                <div class="confidentiality twosmallfont pull-left text-right">
                    <div class="bottom-menu2">
                        <div class="items">
                            <div class="item">
                                <a href="/company/licenses/">Лицензии</a>
                            </div>
                            <div class="item">
                                <a href="/sitemap/">Карта сайта</a>
                            </div>
                            <div class="item">
                                <a href="/company/reviews/">Отзывы</a>
                            </div>
                            <div class="item">
                                <a href="/company/requisites/">Реквизиты</a>
                            </div>
                            <div class="item">
                                <a href="/company/kontroliruyushchie-organizatsii.php">Контролирующие организации</a>
                            </div>
                            <div class="item">
                                <a href="/company/obrabotka-personalnykh-dannykh/">Обработка персональных данных</a>
                            </div>
                        </div>
                    </div>
                    <!--div class="wrap">
                        <a href="/include/licenses_detail.php">Политика конфиденциальности</a>
					</div-->
                </div>
            </div>
        </div>
        <div id="bx-composite-banner"></div>
    </div>
</footer>
</div><!-- #page -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(54392230, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/54392230" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<?php wp_footer(); ?>
<div class="banner_warning">
    <div class="maxwidth-theme">
        <div>
            Имеются противопоказания. Необходима консультация специалиста					</div>
    </div>
</div>
<div class="inline-search-block fixed with-close big type_search_fixed" style="background: rgb(255, 255, 255);">
    <div class="maxwidth-theme">
        <div class="col-md-12">
            <div class="search-wrapper">
                <div id="title-search">

                    <form class="search" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" >
                        <div class="search-input-div">
                            <input class="search-input" id="title-search-input" type="text" placeholder="Поиск по сайту" size="40" maxlength="50"  value="" name="s" id="s" >
                        </div>
                        <div class="search-button-div">
                            <input class="btn btn-search btn-default bold btn-lg" type="submit" id="searchsubmit" value="Поиск по сайту" />
                            <span class="close-block inline-search-hide"><span class="svg svg-close close-icons"></span></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>
