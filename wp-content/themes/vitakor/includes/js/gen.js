jQuery(document).ready(function ($) {
  var arMedc2Options = ({
    'SITE_DIR': '/',
    'SITE_ID': 's1',
    'THEME': ({
      'THEME_SWITCHER': 'N',
      'BASE_COLOR': 'CUSTOM',
      'BASE_COLOR_CUSTOM': '5AD2C8',
      'TOP_MENU': '',
      'TOP_MENU_FIXED': 'Y',
      'COLORED_LOGO': 'N',
      'SIDE_MENU': 'LEFT',
      'SCROLLTOTOP_TYPE': 'ROUND_COLOR',
      'SCROLLTOTOP_POSITION': 'PADDING',
      'CAPTCHA_FORM_TYPE': 'HIDE',
      'PHONE_MASK': '+7 (999) 999-99-99',
      'VALIDATE_PHONE_MASK': '^[+][0-9] [(][0-9]{3}[)] [0-9]{3}[-][0-9]{2}[-][0-9]{2}$',
      'DATE_MASK': 'd.m.y',
      'DATE_PLACEHOLDER': 'дд.мм.гггг чч:мм',
      'VALIDATE_DATE_MASK': '^[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{4}$',
      'DATETIME_MASK': 'd.m.y h:s',
      'DATETIME_PLACEHOLDER': 'дд.мм.гггг чч:мм чч:мм',
      'VALIDATE_DATETIME_MASK': '^[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{4} [0-9]{1,2}\:[0-9]{1,2}$',
      'VALIDATE_FILE_EXT': 'png|jpg|jpeg|gif|doc|docx|xls|xlsx|txt|pdf|odt|rtf',
      'SOCIAL_VK': 'http://vk.com/vitacorclinic',
      'SOCIAL_FACEBOOK': 'http://www.facebook.com/Клиника-Витакор-Подольск-107292814746347/',
      'SOCIAL_TWITTER': '',
      'SOCIAL_YOUTUBE': '',
      'SOCIAL_ODNOKLASSNIKI': '',
      'SOCIAL_GOOGLEPLUS': '',
      'BANNER_WIDTH': 'AUTO',
      'SERVICES_INDEX': 'Y',
      'CATALOG_INDEX': '',
      'PORTFOLIO_INDEX': '',
      'INSTAGRAMM_INDEX': 'Y',
      'BIGBANNER_ANIMATIONTYPE': 'SLIDE_HORIZONTAL',
      'BIGBANNER_SLIDESSHOWSPEED': '5000',
      'BIGBANNER_ANIMATIONSPEED': '600',
      'PARTNERSBANNER_SLIDESSHOWSPEED': '5000',
      'PARTNERSBANNER_ANIMATIONSPEED': '600',
      'SHOW_WARNING_BANNER': 'Y',
      'ORDER_VIEW': '',
      'ORDER_BASKET_VIEW': '',
      'URL_BASKET_SECTION': '',
      'URL_ORDER_SECTION': '',
      'PAGE_WIDTH': '3',
      'PAGE_CONTACTS': '1',
      'HEADER_TYPE': '1',
      'HEADER_TOP_LINE': '',
      'HEADER_FIXED': '2',
      'HEADER_MOBILE': '1',
      'HEADER_MOBILE_MENU': '1',
      'HEADER_MOBILE_MENU_SHOW_TYPE': '',
      'INSTAGRAMM_INDEX': 'Y',
      'TYPE_SEARCH': 'fixed',
      'PAGE_TITLE': '1',
      'INDEX_TYPE': 'index3',
      'FOOTER_TYPE': '1',
      'FOOTER_TYPE': '1',
      'PRINT_BUTTON': 'Y',
      'SHOW_SMARTFILTER': 'Y',
      'LICENCE_CHECKED': 'N',
      'FILTER_VIEW': 'VERTICAL',
      'YA_GOLAS': 'Y',
      'LOGIN_EQUAL_EMAIL': 'N',
      'YA_COUNTER_ID': '54392230',
      'USE_FORMS_GOALS': 'SINGLE',
      'USE_SALE_GOALS': 'Y',
      'USE_DEBUG_GOALS': 'Y',
      'IS_BASKET_PAGE': '',
      'IS_ORDER_PAGE': '',
    })
  });

  getRandomInt = function (min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }

  ShowOverlay = function () {
    jQuery('<div class="jqmOverlay waiting"></div>').appendTo('body');
  }

  HideOverlay = function () {
    jQuery('.jqmOverlay').detach();
  }

  CheckBodyPadding = function () {
    if (jQuery('body').hasClass('with_banner')) {
      var bannerHeight = jQuery('.banner_warning').outerHeight(true, true);
      jQuery('body.with_banner').css('padding-bottom', bannerHeight);
    }
  }

  jQuery(document).on('change', '.uploader input[type=file]', function () {
    if (!jQuery(this).next().length || !jQuery(this).next().hasClass('resetfile')) {
      jQuery('<span class="resetfile"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11"><path d="M1345.19,376.484l4.66,4.659a0.492,0.492,0,0,1,0,.707,0.5,0.5,0,0,1-.71,0l-4.66-4.659-4.65,4.659a0.5,0.5,0,0,1-.71,0,0.492,0.492,0,0,1,0-.707l4.66-4.659-4.66-4.659a0.492,0.492,0,0,1,0-.707,0.5,0.5,0,0,1,.71,0l4.65,4.659,4.66-4.659a0.5,0.5,0,0,1,.71,0,0.492,0.492,0,0,1,0,.707Z" transform="translate(-1339 -371)"/></svg></span>').insertAfter(jQuery(this));
    }
  });

  jQuery(document).on('click', '.uploader input[type=file] + .resetfile', function () {
    var $input = jQuery(this).prev();
    $input.val('');
    jQuery.uniform.update($input);
    jQuery(this).remove();
  });

  CheckTopMenuDotted = function () {
    if (window.matchMedia('(max-width:991px)').matches)
      return;

    var menu = jQuery('nav.mega-menu.sliced');

    if (menu.length) {
      menu.each(function () {
        var menuMoreItem = jQuery(this).find('td.js-dropdown');
        if (jQuery(this).parents('.collapse').css('display') == 'none') {
          return false;
        }

        var block_w = jQuery(this).closest('div').actual('width');
        var menu_w = jQuery(this).find('table').actual('outerWidth');
        var afterHide = false;

        while (menu_w > block_w) {
          menuItemOldSave = jQuery(this).find('td').not('.nosave').last();
          if (menuItemOldSave.length) {
            menuMoreItem.show();
            menuItemNewSave = '<li class="' + (menuItemOldSave.hasClass('dropdown') ? 'dropdown-submenu ' : '') + (menuItemOldSave.hasClass('active') ? 'active ' : '') + '" data-hidewidth="' + menu_w + '">' + menuItemOldSave.find('.wrap').html() + '</li>';
            menuItemOldSave.remove();
            menuMoreItem.find('> .wrap > .dropdown-menu').prepend(menuItemNewSave);
            menu_w = jQuery(this).find('table').actual('width');
            afterHide = true;
          } else {
            break;
          }
        }

        if (!afterHide) {
          do {
            var menuItemOldSaveCnt = menuMoreItem.find('.dropdown-menu').find('li').length;
            menuItemOldSave = menuMoreItem.find('.dropdown-menu').find('li').first();
            if (!menuItemOldSave.length) {
              menuMoreItem.hide();
              break;
            } else {
              var hideWidth = menuItemOldSave.attr('data-hidewidth');
              if (hideWidth > block_w) {
                break
              } else {
                menuItemNewSave = '<td class="' + (menuItemOldSave.hasClass('dropdown-submenu') ? 'dropdown ' : '') + (menuItemOldSave.hasClass('active') ? 'active ' : '') + '" data-hidewidth="' + block_w + '"><div class="wrap">' + menuItemOldSave.html() + '</div></td>';
                menuItemOldSave.remove();
                jQuery(menuItemNewSave).insertBefore(jQuery(this).find('td.js-dropdown'));
                if (!menuItemOldSaveCnt) {
                  menuMoreItem.hide();
                  break;
                }
              }
            }
            menu_w = jQuery(this).find('table').actual('width');
          }
          while (menu_w <= block_w);
        }
        jQuery(this).find('td').css('visibility', 'visible');
        jQuery(this).find('td').removeClass('unvisible');
        jQuery(this).css('overflow', 'visible');

      }).promise().done(function () {
        jQuery('.menu-row.bgcolored .mega-menu .table-menu').css('overflow', 'visible');
      });
    }
    return false;
  }

  CheckTopVisibleMenu = function (that) {
    var dropdownMenu = jQuery('.dropdown-menu:visible').last();

    if (dropdownMenu.length) {
      dropdownMenu.find('a').css('white-space', '');
      dropdownMenu.css('left', '');
      dropdownMenu.css('right', '');
      dropdownMenu.removeClass('toright');

      var dropdownMenu_left = dropdownMenu.offset().left;
      if (typeof (dropdownMenu_left) != 'undefined') {
        var menu = dropdownMenu.parents('.mega-menu');
        if (!menu.length)
          menu = dropdownMenu.closest('.logo-row');
        var menu_width = menu.outerWidth();
        var menu_left = menu.offset().left;
        var menu_right = menu_left + menu_width;
        var isToRight = dropdownMenu.parents('.toright').length > 0;
        var parentsDropdownMenus = dropdownMenu.parents('.dropdown-menu');
        var isHasParentDropdownMenu = parentsDropdownMenus.length > 0;
        if (isHasParentDropdownMenu) {
          var parentDropdownMenu_width = parentsDropdownMenus.first().outerWidth();
          var parentDropdownMenu_left = parentsDropdownMenus.first().offset().left;
          var parentDropdownMenu_right = parentDropdownMenu_width + parentDropdownMenu_left;
        }

        if (parentDropdownMenu_right + dropdownMenu.outerWidth() > menu_right) {
          dropdownMenu.find('a').css('white-space', 'normal');
        }

        var dropdownMenu_width = dropdownMenu.outerWidth();
        var dropdownMenu_right = dropdownMenu_left + dropdownMenu_width;

        if (dropdownMenu_right > menu_right || isToRight) {
          var addleft = 0;
          addleft = menu_right - dropdownMenu_right;
          if (isHasParentDropdownMenu || isToRight) {
            dropdownMenu.css('left', 'auto');
            dropdownMenu.css('right', '100%');
            dropdownMenu.addClass('toright');
          } else {
            var dropdownMenu_curLeft = parseInt(dropdownMenu.css('left'));
            dropdownMenu.css('left', (dropdownMenu_curLeft + addleft) + 'px');
          }
        }
      }
    }
  }

  InitTopestMenuGummi = function () {
    //if(!isOnceInited){
    function _init() {
      var arItems = $menuTopest.find('>div:not(.more)');
      var cntItems = arItems.length;
      if (cntItems) {
        var itemsWidth = 0;
        for (var i = 0; i < cntItems; ++i) {
          var item = arItems.eq(i);
          var itemWidth = item.actual('outerWidth', {includeMargin: true});
          arItemsHideWidth[i] = (itemsWidth += itemWidth) + (i !== (cntItems - 1) ? moreWidth : 0);
        }
      }
    }

    function _gummi() {
      var rowWidth = $menuTopest.actual('innerWidth');
      var arItems = $menuTopest.find('>div:not(.more),.more>.dropdown>.wrap>div');
      var cntItems = arItems.length;
      if (cntItems) {
        var bMore = false;
        for (var i = cntItems - 1; i >= 0; --i) {
          var item = arItems.eq(i);
          var bInMore = item.parents('.more').length > 0;
          if (!bInMore) {
            if (arItemsHideWidth[i] > rowWidth) {
              if (!bMore) {
                bMore = true;
                more.removeClass('hidden');
              }
              var clone = item.clone();
              clone.prependTo(moreDropdown);
              item.addClass('cloned');
            }
          }
        }
        for (var i = 0; i < cntItems; ++i) {
          var item = arItems.eq(i);
          var bInMore = item.parents('.more').length > 0;
          if (bInMore) {
            if (arItemsHideWidth[i] <= rowWidth) {
              if (i === (cntItems - 1)) {
                bMore = false;
                more.addClass('hidden');
              }
              var clone = item.clone();
              clone.find('>a').removeClass('dark_font');
              clone.insertBefore(more);
              item.addClass('cloned');
            }
          }
        }
        $menuTopest.find('div.cloned').remove();
      }
    }

    var $menuTopest = jQuery('.menu.topest');
    var more = $menuTopest.find('>.more');
    var moreDropdown = more.find('>.dropdown>.wrap');
    var moreWidth = more.actual('outerWidth', {includeMargin: true});
    var arItemsHideWidth = [];

    ignoreResize.push(true);
    _init();
    _gummi();
    ignoreResize.pop();

    jQuery(window).resize(function () {
      ignoreResize.push(true);
      _gummi();
      ignoreResize.pop();
    });
    //}
  }

  MegaMenuFixed = function () {
    var animationTime = 150;

    jQuery('.burger').on('click', function () {
      jQuery('.mega_fixed_menu').fadeIn(animationTime);
    });

    jQuery('.mega_fixed_menu .svg.svg-close').on('click', function () {
      jQuery(this).closest('.mega_fixed_menu').fadeOut(animationTime);
    });

    jQuery('.mega_fixed_menu .dropdown-menu .arrow').on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      jQuery(this).closest('.dropdown-submenu').find('.dropdown-menu').slideToggle(animationTime);
      jQuery(this).closest('.dropdown-submenu').toggleClass('opened');
    });
  }

  CheckPopupTop = function () {
    var popup = jQuery('.jqmWindow.show');
    if (popup.length) {
      var documentScollTop = jQuery(document).scrollTop();
      var windowHeight = jQuery(document).height();
      var popupTop = parseInt(popup.css('top'));
      var popupHeight = popup.height();

      if (windowHeight >= popupHeight) {
        // center
        popupTop = (windowHeight - popupHeight) / 2;
      } else {
        if (documentScollTop > documentScrollTopLast) {
          // up
          popupTop -= documentScollTop - documentScrollTopLast;
        } else if (documentScollTop < documentScrollTopLast) {
          // down
          popupTop += documentScrollTopLast - documentScollTop;
        }

        if (popupTop + popupHeight < windowHeight) {
          // bottom
          popupTop = windowHeight - popupHeight;
        } else if (popupTop > 0) {
          // top
          popupTop = 0;
        }
      }
      popup.css('top', popupTop + 'px');
    }
  }

  CheckMainBannerSliderVText = function (slider) {
    if (slider.parents('.banners-big').length) {
      var sh = slider.height();
      slider.parents('.banners-big').find('.item').each(function () {
        var curSlideTextInner = jQuery(this).find('.text .inner');
        if (curSlideTextInner.length) {
          var ith = curSlideTextInner.actual('height');
          var p = (ith >= sh ? 0 : Math.floor((sh - ith) / 2));
          curSlideTextInner.css('padding-top', p + 'px');
        }
      });
    }
  }

  CheckStickyFooter = function () {
    jQuery(window).on('onWindowResize', function (eventdata) {
      if (!isMobile) {
        try {
          /*var footerHeight = jQuery('footer').outerHeight();
				ignoreResize.push(true);
				jQuery('footer').css('margin-top', '-' + footerHeight + 'px');
				jQuery('.body').css('margin-bottom', '-' + footerHeight + 'px');
				jQuery('.main').css('padding-bottom', footerHeight + 0 + 'px');*/
          var bodyHeight = jQuery('.body').outerHeight(true, true),
            footeHeight = jQuery('footer').outerHeight(true, true),
            headerHeight = jQuery('header').outerHeight(true, true),
            topHeaderHeight = (jQuery('.top-block').length ? jQuery('.top-block').outerHeight(true, true) : 0),
            panelHeight = (jQuery('#panel').length ? jQuery('#panel').outerHeight(true, true) : 0),
            windowHeight = jQuery(window).height(),
            minBodyHeight = windowHeight - footeHeight - panelHeight - headerHeight - topHeaderHeight;

          jQuery('.body').css('min-height', minBodyHeight);
          ignoreResize.pop();
        } catch (e) {
        }
      }
    });
  }

  verticalAlign = function (class_name) {
    if (typeof class_name == "undefined")
      class_name = 'auto_align';
    if (jQuery('.' + class_name).length) {
      maxHeight = 0;
      jQuery('.' + class_name).each(function () {
        if (jQuery(this).height() > maxHeight) {
          maxHeight = jQuery(this).height();
        }
        ;
      });
      jQuery('.' + class_name).each(function () {

        delta = Math.round((maxHeight - jQuery(this).height()) / 2);
        jQuery(this).css({'padding-top': delta + 'px', 'padding-bottom': delta + 'px'});
      });
    }
  }

  getGridSize = function (counts, custom_counts) {
    var z = parseInt(jQuery('.body_media').css('top'));
    if (typeof (custom_counts) != 'undefined') {
      if (window.matchMedia('(max-width: 700px)').matches)
        return (counts[3] ? counts[3] : counts[2]);
      else if (window.matchMedia('(max-width: 767px)').matches)
        return counts[2];
      else if (window.matchMedia('(max-width: 1100px)').matches)
        return counts[1];
      else
        return counts[0];
    } else {
      if (window.matchMedia('(max-width: 600px)').matches) {
        return (counts[3] ? counts[3] : counts[2]);
      } else
        return (z == 2 ? counts[0] : z == 1 ? counts[1] : counts[2]);
    }
  }

  CheckFlexSlider = function () {
    jQuery('.flexslider:not(.thmb):visible').each(function () {
      var slider = jQuery(this);
      slider.resize();
      var counts = slider.data('flexslider').vars.counts,
        slide_counts = slider.data('flexslider').vars.slide_counts;
      if (typeof (counts) != 'undefined') {
        var cnt = getGridSize(counts, slider.data('flexslider').vars.customGrid);
        var to0 = (cnt != slider.data('flexslider').vars.minItems || cnt != slider.data('flexslider').vars.maxItems || cnt != slider.data('flexslider').vars.move);
        if (to0) {
          slider.data('flexslider').vars.minItems = cnt;
          slider.data('flexslider').vars.maxItems = cnt;
          if (typeof (slide_counts) != 'undefined')
            slider.data('flexslider').vars.move = slide_counts;
          else
            slider.data('flexslider').vars.move = cnt;

          slider.flexslider(0);
          slider.resize();
          slider.resize(); // twise!
        }
      }
    });
  }

  CheckHeaderFixed = function () {
    var header_fixed = jQuery('#headerfixed');
    header = jQuery('header').first();

    if (header_fixed.length) {
      if (header.length) {
        var isHeaderFixed = false,
          headerCanFix = true,
          headerFixedHeight = header_fixed.actual('outerHeight'),
          headerNormalHeight = header.actual('outerHeight'),
          headerDiffHeight = headerNormalHeight - headerFixedHeight,
          mobileBtnMenu = jQuery('.btn.btn-responsive-nav'),
          headerTop = jQuery('#panel:visible').actual('outerHeight'),
        topBlock = jQuery('.TOP_HEADER').first();

        if (headerDiffHeight <= 0)
          headerDiffHeight = 0;
        if (topBlock.length)
          headerTop += topBlock.actual('outerHeight');

        jQuery(document).on('scroll', function () {
          if (!isMobile) {
            var scrollTop = jQuery(document).scrollTop();
            headerCanFix = !mobileBtnMenu.is(':visible')/* && !jQuery('.dropdown-menu:visible').length*/;

            var current_is = jQuery('.search-wrapper .search-input:visible'),
              title_search_result = jQuery('.title-search-result.' + current_is.attr('id')),
              pos, pos_input;

            if (!isHeaderFixed) {
              if ((scrollTop > headerNormalHeight + headerTop) && headerCanFix) {
                isHeaderFixed = true;
                header_fixed.css('top', '-' + headerNormalHeight + 'px');
                header_fixed.addClass('fixed');
                // header_fixed.stop(0).animate({top: '0'}, 300);

                header_fixed.animate({top: '0'}, {
                  duration: 300, complete:
                    function () {
                    }
                });
                CheckTopMenuDotted();
              }
            } else if (isHeaderFixed || !headerCanFix) {
              if ((scrollTop <= headerDiffHeight + headerTop) || !headerCanFix) {
                isHeaderFixed = false;
                header_fixed.removeClass('fixed');
              }
            }
          }
        });
      }
    }
    //mobile fixed
    var mfixed = jQuery('body.mfixed_Y #mobileheader, body.mfixed_Y #mobileheadersimple');
    if (mfixed.length && isMobile) {
      var isMHeaderFixed = false,
        mheaderCanFix = true,
        //mheaderFixedHeight = mfixed.actual('outerHeight'),
        mheaderFixedHeight = 0,
        mheaderTop = jQuery('#panel:visible').actual('outerHeight');
      jQuery(window).scroll(function () {
        var scrollTop = jQuery(window).scrollTop();
        if (window.matchMedia('(max-width:991px)').matches) {
          if (jQuery('body.mfixed_Y.mfixed_view_scroll_top #mobileheader').length || jQuery('body.mfixed_Y.mfixed_view_scroll_top #mobileheadersimple').length) {

            if (scrollTop > startScroll) {
              jQuery('body.mfixed_Y.mfixed_view_scroll_top #mobileheader').removeClass('fixed');
              jQuery('body.mfixed_Y.mfixed_view_scroll_top #mobileheadersimple').removeClass('fixed');
            } else if (scrollTop > mheaderFixedHeight + mheaderTop) {
              jQuery('body.mfixed_Y.mfixed_view_scroll_top #mobileheader').addClass('fixed');
              jQuery('body.mfixed_Y.mfixed_view_scroll_top #mobileheadersimple').addClass('fixed');
            } else if (scrollTop <= mheaderFixedHeight + mheaderTop) {
              jQuery('body.mfixed_Y.mfixed_view_scroll_top #mobileheader').removeClass('fixed');
              jQuery('body.mfixed_Y.mfixed_view_scroll_top #mobileheadersimple').removeClass('fixed');
            }
            startScroll = scrollTop;

          } else {
            if (!isMHeaderFixed) {
              if ((scrollTop > mheaderFixedHeight + mheaderTop)) {
                isMHeaderFixed = true;
                mfixed.addClass('fixed');
              }
            } else if (isMHeaderFixed) {
              if ((scrollTop <= mheaderFixedHeight + mheaderTop)) {
                isMHeaderFixed = false;
                mfixed.removeClass('fixed');
              }
            }
          }
        } else
          mfixed.removeClass('fixed');
      })
    }
  }

  CheckObjectsSizes = function () {
    jQuery('.container iframe,.container object,.container video').each(function () {
      var height_attr = jQuery(this).attr('height');
      var width_attr = jQuery(this).attr('width');
      if (height_attr && width_attr) {
        jQuery(this).css('height', jQuery(this).outerWidth() * height_attr / width_attr);
      }
    });
  }

  scrollToTop = function () {
    if (arMedc2Options['THEME']['SCROLLTOTOP_TYPE'] !== 'NONE') {
      var _isScrolling = false;
      // Append Button
      jQuery('body').append(jQuery('<a />').addClass('scroll-to-top ' + arMedc2Options['THEME']['SCROLLTOTOP_TYPE'] + ' ' + arMedc2Options['THEME']['SCROLLTOTOP_POSITION']).attr({
        'href': '#',
        'id': 'scrollToTop'
      }));
      jQuery('#scrollToTop').click(function (e) {
        e.preventDefault();
        jQuery('body, html').animate({scrollTop: 0}, 500);
        return false;
      });
      // Show/Hide Button on Window Scroll event.
      jQuery(window).scroll(function () {
        if (!_isScrolling) {
          _isScrolling = true;
          var bottom = 23,
            scrollVal = jQuery(window).scrollTop(),
            windowHeight = jQuery(window).height();

          var footerOffset = 0;
          if (jQuery('footer').get(0)) {
            footerOffset = jQuery('footer').offset().top;
          }
          if (scrollVal > 150) {
            jQuery('#scrollToTop').stop(true, true).addClass('visible');
            _isScrolling = false;
          } else {
            jQuery('#scrollToTop').stop(true, true).removeClass('visible');
            _isScrolling = false;
          }
          CheckScrollToTop();
        }
      });
    }
  }

  CheckScrollToTop = function () {
    var bottom = 23,
      scrollVal = jQuery(window).scrollTop(),
      windowHeight = jQuery(window).height();
    if (jQuery('footer').length)
      var footerOffset = jQuery('footer').offset().top;

    if (scrollVal + windowHeight > footerOffset) {
      jQuery('#scrollToTop').css('bottom', bottom + scrollVal + windowHeight - footerOffset);
    } else if (parseInt(jQuery('#scrollToTop').css('bottom')) > bottom) {
      jQuery('#scrollToTop').css('bottom', bottom);
    }
  }

  var isMobile = jQuery.browser.mobile;
  var players = {};

  if (isMobile) {
    document.documentElement.className += ' mobile';
  }

  function startMainBannerSlideVideo($slide) {
    if (jQuery('.banners-big').length) {
      if (typeof (CoverPlayer) === 'undefined') {
        CoverPlayer = function () {
          var $videoCover = jQuery('.video.cover');
          if ($videoCover.length) {
            var bannersHeight = jQuery('.banners-big').height()
            var bannersWidth = jQuery('.banners-big').width()
            var windowWidth = jQuery(window).width()
            var height = windowWidth * 9 / 16

            $videoCover.each(function (i, node) {
              node.style.height = height + 'px'
              node.style.marginTop = ((bannersHeight - height) / 2) + 'px'
            })
          }
        }
        jQuery(window).resize(function () {
          if (jQuery('.video.cover').length) {
            CoverPlayer();
          }
        });
      }

      var slideActiveIndex = $slide.attr('data-slide_index')
      var $slides = $slide.closest('.items').find('.item[data-slide_index="' + slideActiveIndex + '"]')
      var videoSource = $slide.attr('data-video_source')

      if (videoSource) {
        var videoPlayerSrc = $slide.attr('data-video_src')
        var videoSoundDisabled = $slide.attr('data-video_disable_sound')
        var bVideoSoundDisabled = videoSoundDisabled == 1
        var videoLoop = $slide.attr('data-video_loop')
        var bVideoLoop = videoLoop == 1
        var videoCover = $slide.attr('data-video_cover')
        var bVideoCover = videoCover == 1 && !isMobile
        var videoUnderText = $slide.attr('data-video_under_text')
        var bVideoUnderText = videoUnderText == 1
        if (videoSource === 'LINK') {
          var videoPlayer = $slide.attr('data-video_player')
          var bVideoPlayerYoutube = videoPlayer === 'YOUTUBE'
          var bVideoPlayerVimeo = videoPlayer === 'VIMEO'

          if (videoPlayerSrc && !$slide.find('iframe.video').length) {
            $slides.each(function (i, node) {
              var $_slide = jQuery(node);
              var videoID = getRandomInt(100, 1000);
              if (bVideoPlayerVimeo) {
                videoPlayerSrc += '&player_id=vimeoplayer';
              }
              pauseMainBanner();
              $_slide.prepend('<iframe id="player_' + videoID + '" class="video' + (bVideoCover == true ? ' cover' : '') + '" src="' + videoPlayerSrc + '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
              if (typeof (players) !== 'undefined' && players) {
                players[videoID] = {
                  id: 'player_' + videoID,
                  mute: (bVideoSoundDisabled ? '1' : '0'),
                  loop: (bVideoLoop ? '1' : '0'),
                  cover: (bVideoCover ? '1' : '0')
                };
                if (bVideoPlayerYoutube) {
                  waitYTPlayer(150, function () {
                    //setTimeout(function(){
                    window[players[videoID].id] = new YT.Player(
                      players[videoID].id, {
                        events: {
                          'onReady': onYoutubePlayerReady
                        }
                      }
                    );
                    if (bVideoSoundDisabled) {
                      window[players[videoID].id].addEventListener('onReady', muteYoutubePlayer);
                    }
                    if (bVideoLoop) {
                      window[players[videoID].id].addEventListener('onStateChange', loopYoutubePlayer);
                    }
                    //},150);
                  });
                } else if (bVideoPlayerVimeo) {
                  var iframe = jQuery('#' + players[videoID].id)
                  if (iframe.length) {
                    setTimeout(function () {
                      iframe.closest('.item').addClass('started')
                      pauseMainBanner()
                    }, 150)
                    var player = iframe[0].childNodes
                    // console.log(iframe, player)
                    /*player.addEvent('play', function() {
										console.log('play')
									});*/
                  }
                }
              }
            });
          }
        }
        if (videoPlayerSrc && !$slide.find('.video').length) {
          $slides.each(function (i, node) {
            var $_slide = jQuery(node);
            var videoID = getRandomInt(100, 1000);
            $_slide.prepend('<video id="player_' + videoID + '" class="video' + (bVideoCover == true ? ' cover' : '') + '"' + (bVideoLoop == true ? ' loop ' : '') + (bVideoSoundDisabled == true ? ' muted ' : '') + ' autoplay><source src="' + videoPlayerSrc + '" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' /><p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that supports HTML5 video</p></iframe>');
            if (typeof (players) !== 'undefined' && players) {
              players[videoID] = {
                id: 'player_' + videoID,
                mute: (bVideoSoundDisabled ? '1' : '0'),
                loop: (bVideoLoop ? '1' : '0'),
                cover: (bVideoCover ? '1' : '0')
              };
              // if(bVideoCover){
              document.getElementById(players[videoID].id).addEventListener('play', onHtml5PlayerPlay);
              // }
            }
          });
        }
      }
    }
  }

  function muteYoutubePlayer(e) {
    e.target.mute()
  }

  function loopYoutubePlayer(e) {
    if (e.data === YT.PlayerState.ENDED) {
      e.target.playVideo()
    }
  }

  function onYoutubePlayerReady(e) {
    e.target.playVideo()
    var videoID = e.target.a.id.replace('player_', '')
    if (videoID) {
      var $slide = jQuery('#player_' + videoID).closest('.item')
      $slide.addClass('started')
      pauseMainBanner()
      //setMainBannerSlideVerticalCenter($slide)
      var cover = players[videoID].cover
      if (cover) {
        CoverPlayer()
      }
    }
  }

  function onHtml5PlayerPlay(e) {
    var videoID = e.target.id.replace('player_', '')
    if (videoID) {
      var $slide = jQuery('#player_' + videoID).closest('.item')
      $slide.addClass('started')
      pauseMainBanner()
      // setMainBannerSlideVerticalCenter($slide)
      var cover = players[videoID].cover
      if (cover) {
        CoverPlayer()
      }
    }
  }

  function pauseMainBanner() {
    jQuery('.banners-big .flexslider').flexslider('pause');
  }

  jQuery.fn.equalizeHeights = function (outer, classNull, minHeight) {
    var maxHeight = this.map(function (i, e) {

      var minus_height = 0,
        calc_height = 0;
      if (classNull !== false) {
        minus_height = parseInt(jQuery(e).find(classNull).actual('outerHeight'));
      }
      if (minus_height)
        minus_height += 12;

      jQuery(e).css('height', '');
      if (outer === true) {
        calc_height = jQuery(e).actual('outerHeight') - minus_height;
      } else {
        calc_height = jQuery(e).actual('height') - minus_height;

      }
      if (minHeight !== false) {
        if (calc_height < minHeight) {
          calc_height += (minHeight - calc_height);
        }
        if (window.matchMedia('(max-width: 520px)').matches) {
          calc_height = 300;
        }
        if (window.matchMedia('(max-width: 400px)').matches) {
          calc_height = 200;
        }
      }
      return calc_height;
    }).get();

    for (var i = 0, c = maxHeight.length; i < c; ++i) {
      if (maxHeight[i] % 2) {
        --maxHeight[i];
      }
    }

    return this.height(Math.max.apply(this, maxHeight));
  }

  jQuery.fn.getFloatWidth = function () {
    var width = 0

    if (jQuery(this).length) {
      var rect = jQuery(this)[0].getBoundingClientRect()
      if (!(width = rect.width)) {
        width = rect.right - rect.left
      }
    }

    return width
  }

  jQuery.fn.sliceHeight = function (options) {
    function _slice(el) {
      el.each(function () {
        jQuery(this).css('line-height', '');
        jQuery(this).css('height', '');
      });
      if (typeof (options.autoslicecount) === 'undefined' || options.autoslicecount !== false) {

        var elsw = (typeof (options.row) !== 'undefined' && options.row.length) ?
            el.first().parents(options.row).getFloatWidth() : el.first().parents('.items').getFloatWidth();

        var elw = (typeof (options.item) !== 'undefined' && options.item.length) ?
          jQuery(options.item).first().getFloatWidth() : (el.first().hasClass('item') ? el.first().getFloatWidth() : el.first().parents('.item').getFloatWidth());

        if (!elsw) {
          elsw = el.first().parents('.row').getFloatWidth();
        }
        if (elw && options.fixWidth)
          elw -= options.fixWidth;

        if (elsw && elw) {
          options.slice = Math.floor(elsw / elw);
        }
      }
      if (typeof (options.typeResize) === 'undefined' || options.typeResize === false) {
        if (options.slice) {
          for (var i = 0; i < el.length; i += options.slice) {
            jQuery(el.slice(i, i + options.slice)).equalizeHeights(options.outer, options.classNull, options.minHeight, options.typeResize, options.typeValue);
          }
        }
        if (options.lineheight) {
          var lineheightAdd = parseInt(options.lineheight);
          if (isNaN(lineheightAdd)) {
            lineheightAdd = 0;
          }
          el.each(function () {
            jQuery(this).css('line-height', (jQuery(this).actual('height') + lineheightAdd) + 'px');
          });
        }
      }
    }

    var options = jQuery.extend({
      slice: null,
      outer: false,
      lineheight: false,
      autoslicecount: true,
      classNull: false,
      minHeight: false,
      row: false,
      item: false,
      typeResize: false,
      typeValue: false,
      fixWidth: 0,
    }, options);

    var el = jQuery(this);
    ignoreResize.push(true);
    _slice(el);
    ignoreResize.pop();

    jQuery(document).on('onWindowResize', function (eventdata) {
      ignoreResize.push(true);
      _slice(el);
      ignoreResize.pop();
    });
  }

  waitingExists = function (selector, delay, callback) {
    if (typeof (callback) !== 'undefined' && selector.length && delay > 0) {
      delay = parseInt(delay);
      delay = (delay < 0 ? 0 : delay);

      if (!jQuery(selector).length) {
        setTimeout(function () {
          waitingExists(selector, delay, callback);
        }, delay);
      } else {
        callback();
      }
    }
  }

  waitingNotExists = function (selectorExists, selectorNotExists, delay, callback) {
    if (typeof (callback) !== 'undefined' && selectorExists.length && selectorNotExists.length && delay > 0) {
      delay = parseInt(delay);
      delay = (delay < 0 ? 0 : delay);

      setTimeout(function () {
        if (selectorExists.length && !jQuery(selectorNotExists).length) {
          callback();
        }
      }, delay);
    }
  }

  function onLoadjqm(hash) {
    var name = jQuery(hash.t).data('name'),
      top = ((jQuery(window).height() > hash.w.height()) ? Math.floor((jQuery(window).height() - hash.w.height()) / 2) : 0) + 'px';

    if (jQuery('.popup textarea').length) {
      jQuery('textarea').each(function () {
        jQuery(this).autoResize();
      });
    }

    jQuery.each(jQuery(hash.t).get(0).attributes, function (index, attr) {
      if (/^data\-autoload\-(.+)jQuery/.test(attr.nodeName)) {
        var key = attr.nodeName.match(/^data\-autoload\-(.+)$/)[1];
        var el = (jQuery('[name="' + key.toUpperCase() + '"]').length ? jQuery('[name="' + key.toUpperCase() + '"]') : jQuery('.form-group [data-sid="' + key.toUpperCase() + '"]'));//jQuery('[name="'+key.toUpperCase()+'"]');
        //console.log(el);
        var ID = jQuery(hash.t).data('autoload-' + key);
        el.val(jQuery(hash.t).data('autoload-' + key));
        el.closest('.form-group').addClass('input-filed');

        if (typeof (el[0]) !== 'undefined' && typeof (el[0].tagName) !== 'undefined' && el[0].tagName === 'SELECT') {
          el.find('option[data-id=' + ID + ']').attr('selected', true);
          if (ID) {
            jQuery(el).closest('form').find('select option').each(function () {
              var dataID = jQuery(this).data('id').toString(),
                arDataID = (dataID.indexOf(',') !== -1 ? dataID.split(',') : [dataID]);

              if (arDataID.indexOf(ID.toString()) !== -1) {
                jQuery(this).show();
              } else {
                jQuery(this).hide();
              }

            });
          }
          el.closest('.row[data-sid]').show();
        } else {
          el.attr('title', el.val());
          el.attr('readonly', 'readonly')
        }

      }
    });

    var eventdata = {action: 'loadForm'};
    jQuery(window).on('onCompleteAction', [eventdata, jQuery(hash.t)[0]]);

    if (jQuery(hash.t).data('autohide')) {
      jQuery(hash.w).data('autohide', jQuery(hash.t).data('autohide'));
    }
    if (name === 'order_product') {
      if (jQuery(hash.t).data('product')) {
        jQuery('input[name="PRODUCT"]').closest('.form-group').addClass('input-filed');
        jQuery('input[name="PRODUCT"]').val(jQuery(hash.t).data('product')).attr('readonly', 'readonly').attr('title', jQuery('input[name="PRODUCT"]').val());
      }
    }
    if (name === 'question') {
      if (jQuery(hash.t).data('product')) {
        jQuery('input[name="NEED_PRODUCT"]').closest('.form-group').addClass('input-filed');
        jQuery('input[name="NEED_PRODUCT"]').val(jQuery(hash.t).data('product')).attr('readonly', 'readonly').attr('title', jQuery('input[name="NEED_PRODUCT"]').val());
      }
    }
    hash.w.addClass('show').css({'margin-left': '-' + Math.floor(hash.w.width() / 2) + 'px', 'top': top, 'opacity': 1});
  }

  function onHide(hash) {
    if (jQuery(hash.w).data('autohide')) {
      eval(jQuery(hash.w).data('autohide'));
    }
    // hash.w.css('opacity', 0).hide();
    hash.w.animate({'opacity': 0}, 200, function () {
      hash.w.hide();
      hash.w.empty();
      hash.o.remove();
      hash.w.removeClass('show');
    });
  }

  function parseUrlQuery() {
    var data = {};
    if (location.search) {
      var pair = (location.search.substr(1)).split('&');
      for (var i = 0; i < pair.length; i++) {
        var param = pair[i].split('=');
        data[param[0]] = param[1];
      }
    }
    return data;
  }

  jQuery.fn.jqmEx = function () {
    jQuery(this).each(function () {
      var _this = jQuery(this);
      var name = _this.data('name');

      if (name.length) {
        var script = arMedc2Options['SITE_DIR'] + 'ajax/form.php';
        var paramsStr = '';
        var trigger = '';
        var arTriggerAttrs = {};
        jQuery.each(_this.get(0).attributes, function (index, attr) {
          var attrName = attr.nodeName;
          var attrValue = _this.attr(attrName);
          trigger += '[' + attrName + '=\"' + attrValue + '\"]';
          arTriggerAttrs[attrName] = attrValue;
          if (/^data\-param\-(.+)$/.test(attrName)) {
            var key = attrName.match(/^data\-param\-(.+)$/)[1];
            paramsStr += key + '=' + attrValue + '&';
          }
        });
        var triggerAttrs = JSON.stringify(arTriggerAttrs);
        var encTriggerAttrs = encodeURIComponent(triggerAttrs);
        if (name == 'auth')
          script += '?' + paramsStr + 'auth=Y';
        else
          script += '?' + paramsStr + 'data-trigger=' + encTriggerAttrs;

        if (!jQuery('.' + name + '_frame[data-trigger="' + encTriggerAttrs + '"]').length) {
          if (_this.attr('disabled') != 'disabled') {
            jQuery('body').find('.' + name + '_frame[data-trigger="' + encTriggerAttrs + '"]').remove();
            jQuery('body').append('<div class="' + name + '_frame jqmWindow" style="width:560px" data-trigger="' + encTriggerAttrs + '"></div>');
            jQuery('.' + name + '_frame[data-trigger="' + encTriggerAttrs + '"]').jqm({
              trigger: trigger,
              onLoad: function (hash) {
                onLoadjqm(hash);
              },
              onHide: function (hash) {
                onHide(hash);
              },
              ajax: script
            });
          }
        }
      }
    });
  }

  InitFlexSlider = function () {
    jQuery('.flexslider:not(.thmb):visible').each(function () {
      var slider = jQuery(this);
      var options;
      var defaults = {
        animationLoop: false,
        controlNav: false,
        directionNav: true,
        animation: "slide"
      }
      var config = jQuery.extend({}, defaults, options, slider.data('plugin-options'));
      if (typeof (config.counts) !== 'undefined' && config.direction !== 'vertical') {
        var slide_counts = '';
        if (typeof (slider.data('plugin-options')) !== 'undefined') {
          if ('slide_counts' in slider.data('plugin-options'))
            slide_counts = slider.data('plugin-options').slide_counts;
        }
        config.maxItems = getGridSize(config.counts);
        config.minItems = getGridSize(config.counts);

        if (slide_counts)
          config.move = slide_counts;
        else
          config.move = getGridSize(config.counts);

        config.itemWidth = 200;
      }

      // custom direction nav
      if (typeof (config.customDirection) !== 'undefined')
        config.customDirectionNav = jQuery(config.customDirection);

      config.prevText = "FANCY_PREV",           //String: Set the text for the "previous" directionNav item
        config.nextText = "FANCY_NEXT",

        config.start = function (slider) {
          var eventdata = {slider: slider};
          jQuery(window).on('onSliderStart', [eventdata]);
          jQuery(window).on('onSlide', [eventdata]);
        }

      config.after = function (slider) {
        var eventdata = {slider: slider};
        jQuery(window).on('onSlide', [eventdata]);
      }

      config.end = function (slider) {
        var eventdata = {slider: slider};
        jQuery(window).on('onSlideEnd', [eventdata]);
      }

      config.before = function (slider) {
        var eventdata = {slider: slider};
        jQuery(window).on('onSlideBefore', [eventdata]);
      }

      slider.addClass('dark-nav');
      slider.flexslider(config).addClass('flexslider-init');
      if (config.controlNav)
        slider.addClass('flexslider-control-nav');
      if (config.directionNav)
        slider.addClass('flexslider-direction-nav');

      if (config.customPagination) {

      }
    });
  }

  InitFlexSliderClass = function (class_name) {
    //jQuery('.flexslider:not(.thmb):not(.flexslider-init)').each(function(){

    var slider = jQuery(class_name);
    var options;
    var defaults = {
      animationLoop: false,
      controlNav: false,
      directionNav: true,
      animation: "slide"
    }
    var config = jQuery.extend({}, defaults, options, slider.data('plugin-options'));

    var slide_counts = '';
    if (typeof (slider.data('plugin-options')) !== 'undefined') {
      if ('slide_counts' in slider.data('plugin-options'))
        slide_counts = slider.data('plugin-options').slide_counts;
    }

    if (typeof (config.counts) !== 'undefined' && config.direction !== 'vertical') {
      config.maxItems = getGridSize(config.counts);
      config.minItems = getGridSize(config.counts);
      config.move = getGridSize(config.counts);

      config.itemWidth = 200;
    }
    if (slide_counts)
      config.move = slide_counts;

    // custom direction nav
    if (typeof (config.customDirection) !== 'undefined')
      config.customDirectionNav = jQuery(config.customDirection);

    config.prevText = "FANCY_PREV",           //String: Set the text for the "previous" directionNav item
      config.nextText = "FANCY_NEXT",

      config.after = config.start = function (slider) {
        var eventdata = {slider: slider};
        jQuery(window).on('onSlide', [eventdata]);
      }

    config.end = function (slider) {
      var eventdata = {slider: slider};
      jQuery(window).on('onSlideEnd', [eventdata]);
    }

    slider.flexslider(config).addClass('flexslider-init');
    if (config.controlNav)
      slider.addClass('flexslider-control-nav');
    if (config.directionNav)
      slider.addClass('flexslider-direction-nav');
    //});
  }

  SliceHeightBlocks = function () {
    jQuery('*[data-slice="Y"]').each(function () {
      var slice_els = jQuery(this).find('*[data-slice-block="Y"]');
      if (slice_els.length) {
        var slice_params = {};
        if (slice_els.data('slice-params'))
          slice_params = slice_els.data('slice-params');
        slice_els.sliceHeight(slice_params);
      }
    })
  }

  createTableCompare = function (originalTable, appendDiv, cloneTable) {
    try {
      if (jQuery('.tarifs .head-block:visible').length) {
        var clone = originalTable.clone().addClass('clone');
        if (cloneTable.length) {
          cloneTable.remove();
          appendDiv.html('');
          appendDiv.html(clone);
        } else {
          appendDiv.append(clone);
        }
      }
    } catch (e) {
    } finally {
    }
  }

  CheckHeaderFixedMenu = function () {
    if (arMedc2Options['THEME']['HEADER_FIXED'] === 2 && jQuery('#headerfixed .js-nav').length && window.matchMedia('(min-width: 992px)').matches) {
      jQuery('#headerfixed .js-nav').css('width', '0');
      var all_width = 0,
        cont_width = jQuery('#headerfixed .maxwidth-theme').actual('width'),
        padding_menu = jQuery('#headerfixed .logo-row.v2 .menu-block').actual('outerWidth') - jQuery('#headerfixed .logo-row.v2 .menu-block').actual('width');
      jQuery('#headerfixed .logo-row.v2 > .inner-table-block').each(function () {
        if (!jQuery(this).hasClass('menu-block'))
          all_width += jQuery(this).actual('outerWidth');
      });
      console.log(cont_width)
      jQuery('#headerfixed .js-nav').width(cont_width - all_width - padding_menu);
    }
  }

  CheckTopMenuPadding = function () {
    if (jQuery('.logo_and_menu-row .right-icons .wrap_icon').length && jQuery('.logo_and_menu-row .menu-row').length) {
      var menuPosition = jQuery('.menu-row .menu-only').position().left,
        maxWidth = jQuery('.logo_and_menu-row .maxwidth-theme').width() - 32,
        leftPadding = 0,
        rightPadding = 0;

      jQuery('.logo_and_menu-row .menu-row>div').each(function (indx) {
        if (!jQuery(this).hasClass('menu-only')) {
          var elementPosition = jQuery(this).position().left,
            elementWidth = jQuery(this).outerWidth();

          if (elementPosition > menuPosition) {
            rightPadding += elementWidth + 1;
          } else {
            leftPadding += elementWidth + 1;
          }
        }
      }).promise().done(function () {
        jQuery('.logo_and_menu-row .menu-only').css({'padding-left': leftPadding, 'padding-right': rightPadding});
      });
    }
  }

  CheckTopMenuOncePadding = function () {
    if (jQuery('.menu-row.sliced .right-icons .wrap_icon').length) {
      var menuPosition = jQuery('.menu-row .menu-only').position().left,
        maxWidth = jQuery('.logo_and_menu-row .maxwidth-theme').width() - 32,
        leftPadding = 0,
        rightPadding = 0;

      jQuery('.menu-row.sliced .maxwidth-theme>div>div').each(function (indx) {
        if (!jQuery(this).hasClass('menu-only')) {
          var elementPosition = jQuery(this).position().left,
            elementWidth = jQuery(this).outerWidth();

          if (elementPosition > menuPosition) {
            rightPadding += elementWidth + 1;
          } else {
            leftPadding += elementWidth + 1;
          }
        }
      }).promise().done(function () {
        jQuery('.menu-row.sliced .menu-only').css({'padding-left': leftPadding, 'padding-right': rightPadding});
      });
    }
  }

  CheckSearchWidth = function () {
    if (jQuery('.logo_and_menu-row .search_wrap').length) {
      var searchPosition = jQuery('.logo_and_menu-row .search_wrap').position().left,
        maxWidth = jQuery('.logo_and_menu-row .maxwidth-theme').width() - 32;
      width = 0;

      jQuery('.logo_and_menu-row .maxwidth-theme>div').each(function () {
        if (!jQuery(this).hasClass('search_wrap')) {
          var elementWidth = jQuery(this).outerWidth();

          width = (width ? width - elementWidth : maxWidth - elementWidth);
        }
      }).promise().done(function () {
        jQuery('.logo_and_menu-row .search_wrap').outerWidth(width).css({'opacity': 1, 'visibility': 'visible'});
      });
    }
  }

  waitCounter = function (idCounter, delay, callback) {
    var obCounter = window['yaCounter' + idCounter];
    if (typeof obCounter == 'object') {
      if (typeof callback == 'function')
        callback();

    } else {
      setTimeout(function () {
        waitCounter(idCounter, delay, callback);
      }, delay);
    }
  }

  waitYTPlayer = function (delay, callback) {
    if ((typeof YT !== "undefined") && YT && YT.Player) {
      if (typeof callback == 'function')
        callback();
    } else {
      setTimeout(function () {
        waitYTPlayer(delay, callback);
      }, delay);
    }
  }

  openerFunc = function (el, selectorHideBlock) {
    var $this = el,
      $item = $this.closest('.item'),
      $hiddenBlock = (selectorHideBlock ? $item.find(selectorHideBlock) : $item.find('.hidden-block')),
      openText = (typeof ($this.data('open_text')) !== 'undefined' ? $this.data('open_text') : ''),
      closeText = (typeof ($this.data('close_text')) !== 'undefined' ? $this.data('close_text') : ''),
      btn = ($this.find('.btn').length ? $this.find('.btn') : $this);


    $hiddenBlock.slideToggle(200);
    $item.toggleClass('opened');

    if (!btn.hasClass('opened')) {
      btn.addClass('opened').removeClass('closed');

      if (openText.length) {
        $this.find('.text').text(openText);
      }
    } else if (btn.hasClass('opened')) {
      btn.addClass('closed').removeClass('opened');

      if (closeText.length) {
        $this.find('.text').text(closeText);
      }
    }
  }

  HoverStaffSliderItem = function(el){
    el.find('.item').hover(function(){
      var $this = jQuery(this),
        $parent = $this.closest('.flex-viewport'),
        thisHeight = $this.find('>.wrap').height(),
        parentHeight = $parent.data('height'),
        deltaHeight = $this.data('delta_height');

      $parent.height(parentHeight + deltaHeight);
      //$this.find('>.wrap').height(thisHeight + deltaHeight);
    }, function(){
      var $this = jQuery(this),
        $parent = $this.closest('.flex-viewport'),
        thisHeight = $this.find('>.wrap').height(),
        parentHeight = $parent.data('height'),
        deltaHeight = $this.data('delta_height');

      //$this.find('>.wrap').height(thisHeight - deltaHeight);
      $parent.height(parentHeight);
    });
  }

  jQuery(document).ready(function () {
    scrollToTop();

    if (!jQuery.browser.safari) {
      CheckTopMenuPadding();
      CheckTopMenuOncePadding();
      CheckTopMenuDotted();
      CheckHeaderFixed();
      setTimeout(function () {
        jQuery(window).resize();
      }, 150); // need to check resize flexslider & menu
      setTimeout(function () {
        jQuery(window).scroll();
      }, 250); // need to check position fixed ask block
    } else {
      setTimeout(function () {
        jQuery(window).resize(); // need to check resize flexslider & menu
        setTimeout(function () {
          CheckTopMenuPadding();
          CheckTopMenuOncePadding();
          CheckTopMenuDotted();
          CheckHeaderFixed();

          setTimeout(function () {
            jQuery(window).scroll();
          }, 50);
        }, 50);
      }, 350);
    }
    CheckStickyFooter();
    MegaMenuFixed();
    CheckSearchWidth();
    InitTopestMenuGummi();

    // jQuery(window).scroll();

    jQuery('.accordion .item .accordion-head').on('click', function () {
      jQuery(this).find('.arrow-open').toggleClass('open');
    });

    if (arMedc2Options['THEME']['USE_DEBUG_GOALS'] === 'Y') {
      jQuery.cookie('_ym_debug', '1');
    } else {
      jQuery.cookie('_ym_debug', null);
    }

    if (jQuery('textarea').length) {
      jQuery('textarea').each(function () {
        jQuery(this).autoResize();
      });
    }

    jQuery(document).on("click", '*[data-trigger=opener]', function (e) {
      e.preventDefault();
      if (!jQuery(e.target).hasClass('record')) {
        openerFunc(jQuery(this));
      }
    });

    if (jQuery('.banners-content').length) {
      jQuery('.logo_and_menu-row .logo-row, .eye_version_black_color .menu-row:not(.bgcolored) .menu-only, .eye_version_black_color .menu-row.bgcolored .menu-only').css('border', 'none');
    }

    /*  --- Bind mobile menu  --- */
    var $mobileMenu = jQuery("#mobilemenu")
    if ($mobileMenu.length) {
      $mobileMenu.isLeftSide = $mobileMenu.hasClass('leftside')
      $mobileMenu.isOpen = $mobileMenu.hasClass('show')
      $mobileMenu.isDowndrop = $mobileMenu.find('>.scroller').hasClass('downdrop')

      jQuery('#mobileheader .burger').click(function () {
        SwipeMobileMenu()
      })

      if ($mobileMenu.isLeftSide) {
        $mobileMenu.parent().append('<div id="mobilemenu-overlay"></div>')
        var $mobileMenuOverlay = jQuery('#mobilemenu-overlay')

        $mobileMenuOverlay.click(function () {
          if ($mobileMenu.isOpen) {
            CloseMobileMenu()
          }
        });

        jQuery(document).on('swiperight', function (e) {
          if (!jQuery(e.target).closest('.flexslider').length && !jQuery(e.target).closest('.swipeignore').length) {
            OpenMobileMenu()
          }
        })

        // jQuery(document).swiperight(function(e) {
        //   if(!jQuery(e.target).closest('.flexslider').length && !jQuery(e.target).closest('.swipeignore').length){
        //     OpenMobileMenu()
        //   }
        // });

        jQuery(document).on('swipeleft', function (e) {
          if (!jQuery(e.target).closest('.flexslider').length && !jQuery(e.target).closest('.swipeignore').length) {
            CloseMobileMenu()
          }
        })
      } else {
        jQuery('#mobileheader').click(function (e) {
          if (!jQuery(e.target).closest('#mobilemenu').length && !jQuery(e.target).closest('.burger').length && $mobileMenu.isOpen) {
            CloseMobileMenu()
          }
        });
      }

      jQuery('#mobilemenu .menu a,#mobilemenu .social-icons a').click(function (e) {
        var $this = jQuery(this)
        if ($this.hasClass('parent')) {
          e.preventDefault()

          if (!$mobileMenu.isDowndrop) {
            $this.closest('li').addClass('expanded')
            MoveMobileMenuWrapNext()
          } else {
            if (!$this.closest('li').hasClass('expanded')) {
              $this.closest('li').addClass('expanded')
            } else {
              $this.closest('li').removeClass('expanded')
            }
          }
        } else {
          if ($this.closest('li').hasClass('counters')) {
            var href = $this.attr('href')
            if (typeof href !== 'undefined') {
              window.location.href = href
              window.location.reload()
            }
          }

          if (!$this.closest('.menu_back').length) {
            CloseMobileMenu()
          }
        }
      })

      jQuery('#mobilemenu .dropdown .menu_back').click(function (e) {
        e.preventDefault()
        var $this = jQuery(this)
        MoveMobileMenuWrapPrev()
        setTimeout(function () {
          $this.closest('.expanded').removeClass('expanded')
        }, 400)
      })

      OpenMobileMenu = function () {
        if (!$mobileMenu.isOpen) {
          // hide styleswitcher
          if (jQuery('.style-switcher').hasClass('active')) {
            jQuery('.style-switcher .switch').trigger('click')
          }
          jQuery('.style-switcher .switch').hide()

          if ($mobileMenu.isLeftSide) {
            // show overlay
            setTimeout(function () {
              $mobileMenuOverlay.fadeIn('fast')
            }, 100)
          } else {
            // scroll body to top & set fixed
            jQuery('body').scrollTop(0).css({position: 'fixed'})

            // set menu top = bottom of header
            $mobileMenu.css({top: +(jQuery('#mobileheader').height() + jQuery('#mobileheader').offset().top) + 'px'})

            // change burger icon
            jQuery('#mobileheader .burger').addClass('c')
          }

          // show menu
          $mobileMenu.addClass('show')
          $mobileMenu.isOpen = true

          if (!$mobileMenu.isDowndrop) {
            var $wrap = $mobileMenu.find('.wrap').first()
            var params = $wrap.data('params')
            if (typeof params === 'undefined') {
              params = {
                depth: 0,
                scroll: {},
                height: {}
              }
            }
            $wrap.data('params', params)
          }
        }
      }

      CloseMobileMenu = function () {
        if ($mobileMenu.isOpen) {
          // hide menu
          $mobileMenu.removeClass('show');
          $mobileMenu.isOpen = false;
          jQuery('.mega_fixed_menu').hide();

          // show styleswitcher
          jQuery('.style-switcher .switch').show()

          if ($mobileMenu.isLeftSide) {
            // hide overlay
            setTimeout(function () {
              $mobileMenuOverlay.fadeOut('fast')
            }, 100)
          } else {
            // change burger icon
            jQuery('#mobileheader .burger').removeClass('c')

            // body unset fixed
            jQuery('body').css({position: ''})
          }

          if (!$mobileMenu.isDowndrop) {
            setTimeout(function () {
              var $scroller = $mobileMenu.find('.scroller').first()
              var $wrap = $mobileMenu.find('.wrap').first()
              var params = $wrap.data('params')
              params.depth = 0
              $wrap.data('params', params).attr('style', '')
              $mobileMenu.scrollTop(0)
              $scroller.css('height', '')
            }, 400)
          }
        }
      }

      SwipeMobileMenu = function () {
        if ($mobileMenu.isOpen) {
          CloseMobileMenu()
        } else {
          OpenMobileMenu()
        }
      }

      function MoveMobileMenuWrapNext() {
        if (!$mobileMenu.isDowndrop) {
          var $scroller = $mobileMenu.find('.scroller').first()
          var $wrap = $mobileMenu.find('.wrap').first()
          if ($wrap.length) {
            var params = $wrap.data('params')
            var $dropdownNext = $mobileMenu.find('.expanded>.dropdown').eq(params.depth)
            if ($dropdownNext.length) {
              // save scroll position
              params.scroll[params.depth] = parseInt($mobileMenu.scrollTop())

              // height while move animating
              params.height[params.depth + 1] = Math.max($dropdownNext.height(), (!params.depth ? $wrap.height() : $mobileMenu.find('.expanded>.dropdown').eq(params.depth - 1).height()))
              $scroller.css('height', params.height[params.depth + 1] + 'px')

              // inc depth
              ++params.depth

              // translateX for move
              $wrap.css('transform', 'translateX(' + -100 * params.depth + '%)')

              // scroll to top
              setTimeout(function () {
                $mobileMenu.animate({scrollTop: 0}, 200);
              }, 100)

              // height on enimating end
              var h = $dropdownNext.height()
              setTimeout(function () {
                if (h) {
                  $scroller.css('height', h + 'px')
                } else {
                  $scroller.css('height', '')
                }
              }, 200)
            }

            $wrap.data('params', params)
          }
        }
      }

      function MoveMobileMenuWrapPrev() {
        if (!$mobileMenu.isDowndrop) {
          var $scroller = $mobileMenu.find('.scroller').first()
          var $wrap = $mobileMenu.find('.wrap').first()
          if ($wrap.length) {
            var params = $wrap.data('params')
            if (params.depth > 0) {
              var $dropdown = $mobileMenu.find('.expanded>.dropdown').eq(params.depth - 1)
              if ($dropdown.length) {
                // height while move animating
                $scroller.css('height', params.height[params.depth] + 'px')

                // dec depth
                --params.depth

                // translateX for move
                $wrap.css('transform', 'translateX(' + -100 * params.depth + '%)')

                // restore scroll position
                setTimeout(function () {
                  $mobileMenu.animate({scrollTop: params.scroll[params.depth]}, 200);
                }, 100)

                // height on enimating end
                var h = (!params.depth ? false : $mobileMenu.find('.expanded>.dropdown').eq(params.depth - 1).height())
                setTimeout(function () {
                  if (h) {
                    $scroller.css('height', h + 'px')
                  } else {
                    $scroller.css('height', '')
                  }
                }, 200)
              }
            }

            $wrap.data('params', params)
          }
        }
      }
    }
    /*  --- END Bind mobile menu  --- */


    /* change type2 menu for fixed */
    if (jQuery('#headerfixed .js-nav').length) {
      if (arMedc2Options['THEME']['HEADER_FIXED'] === 2)
        CheckHeaderFixedMenu();

      setTimeout(function () {
        jQuery('#headerfixed .js-nav').addClass('opacity1');
      }, 350);
    }

    /* close search block */
    jQuery("html, body").on('mousedown', function (e) {
      e.stopPropagation();
      var search_target = jQuery(e.target).closest('.bx_searche');
      if (!jQuery(e.target).hasClass('inline-search-block') && !jQuery(e.target).hasClass('svg') && !search_target.length) {
        jQuery('.inline-search-block').removeClass('show');
        jQuery('.title-search-result').hide();
        if (arMedc2Options['THEME']['TYPE_SEARCH'] == 'fixed')
          jQuery('.jqmOverlay.search').detach();
      }

      if (isMobile) {
        if (search_target.length)
          location.href = search_target.attr('href');
      }
      var class_name = jQuery(e.target).attr('class');
      if (typeof (class_name) == 'undefined' || class_name.indexOf('tooltip') < 0) //tooltip link
        jQuery('.tooltip-link').tooltip('hide');
    });
    jQuery('.inline-search-block').find('*').on('mousedown', function (e) {
      e.stopPropagation();
    });


    jQuery('.filter-action').on('click', function () {
      jQuery(this).toggleClass('active');
      jQuery(this).find('.svg').toggleClass('white');
      if (jQuery('.text_before_items').length) {
        var top_pos = jQuery('.filters-wrap').position();
        jQuery('.bx_filter').css({'top': top_pos.top + 40});
      }
      jQuery('.bx_filter').slideToggle();
    })

    waitingNotExists('#bx-composite-banner .bx-composite-btn', '#footer .col-sm-3.hidden-md.hidden-lg #bx-composite-banner .bx-composite-btn', 500, function () {
      jQuery('#footer .col-sm-3.hidden-md.hidden-lg #bx-composite-banner').html(jQuery('#bx-composite-banner .bx-composite-btn').parent().html());
    });

    jQuery.extend(jQuery.validator.messages, {
      required: 'JS_REQUIRED',
      email: 'JS_FORMAT',
      equalTo: 'JS_PASSWORD_COPY',
      minlength: 'JS_PASSWORD_LENGTH',
      remote: 'JS_ERROR'
    });

    jQuery.validator.addMethod(
      'regexp', function (value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
      },
      'JS_FORMAT'
    );

    jQuery.validator.addMethod(
      'filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
      },
      'JS_FILE_SIZE'
    );

    jQuery.validator.addMethod(
      'date', function (value, element, param) {
        var status = false;
        if ((!value || value.length <= 0) && jQuery(element).hasClass('required')) {
          status = false;
        } else {
          var re = new RegExp('^([0-9]{2})(.)([0-9]{2})(.)([0-9]{4})$');
          var matches = re.exec(value);
          if (matches) {
            var composedDate = new Date(matches[5], (matches[3] - 1), matches[1]);
            status = ((composedDate.getMonth() == (matches[3] - 1)) && (composedDate.getDate() == matches[1]) && (composedDate.getFullYear() == matches[5]));
          }

          if (!jQuery(element).hasClass('required') && !value) {
            status = true;
          }
        }
        return status;
      }, 'JS_DATE'
    );

    jQuery.validator.addMethod(
      'datetime', function (value, element, param) {
        var status = false;
        if (!value || value.length <= 0) {
          status = false;
        } else {
          var re = new RegExp('^([0-9]{2})(.)([0-9]{2})(.)([0-9]{4}) ([0-9]{1,2}):([0-9]{1,2})$');
          var matches = re.exec(value);
          if (matches) {
            var composedDate = new Date(matches[5], (matches[3] - 1), matches[1], matches[6], matches[7]);
            status = ((composedDate.getMonth() == (matches[3] - 1)) && (composedDate.getDate() == matches[1]) && (composedDate.getFullYear() == matches[5]) && (composedDate.getHours() == matches[6]) && (composedDate.getMinutes() == matches[7]));
          }
        }
        return status;
      }, 'JS_DATETIME'
    );

    jQuery.validator.addMethod(
      'extension', function (value, element, param) {
        param = typeof param === 'string' ? param.replace(/,/g, '|') : 'png|jpe?g|gif';
        return this.optional(element) || value.match(new RegExp('.(' + param + ')$', 'i'));
      }, 'JS_FILE_EXT'
    );

    jQuery.validator.addMethod(
      'captcha', function (value, element, params) {
        return jQuery.validator.methods.remote.call(this, value, element, {
          url: arMedc2Options['SITE_DIR'] + 'ajax/check-captcha.php',
          type: 'post',
          data: {
            captcha_word: value,
            captcha_sid: function () {
              return jQuery(element).closest('form').find('input[name="captcha_sid"]').val();
            }
          }
        });
      },
      'JS_ERROR'
    );

    /*reload captcha*/
    jQuery('body').on('click', '.refresh', function (e) {
      e.preventDefault();
      jQuery.ajax({
        url: arMedc2Options['SITE_DIR'] + 'ajax/captcha.php'
      }).done(function (text) {
        if (jQuery('.captcha_sid').length) {
          jQuery('.captcha_sid').val(text);
          jQuery('.captcha_img').attr('src', '/bitrix/tools/captcha.php?captcha_sid=' + text);
        }
      });
    });

    jQuery.validator.addClassRules({
      'phone': {
        regexp: arMedc2Options['THEME']['VALIDATE_PHONE_MASK']
      },
      'confirm_password': {
        equalTo: 'input.password',
        minlength: 6
      },
      'password': {
        minlength: 6
      },
      'inputfile': {
        extension: arMedc2Options['THEME']['VALIDATE_FILE_EXT'],
        filesize: 5000000
      },
      'datetime': {
        datetime: ''
      },
      'date': {
        date: ''
      },
      'captcha': {
        captcha: ''
      }
    });

    jQuery.validator.setDefaults({
      highlight: function (element) {
        jQuery(element).parent().addClass('error');
      },
      unhighlight: function (element) {
        jQuery(element).parent().removeClass('error');
      }
    });

    InitFlexSlider();

    // for check flexslider bug in composite mode
    waitingNotExists('.detail .galery #slider', '.detail .galery #slider .flex-viewport', 1000, function () {
      InitFlexSlider();
      setTimeout(function () {
        jQuery(window).resize();
      }, 350);
    });

    /*check mobile device*/
    if (jQuery.browser.mobile) {
      jQuery('.hint span').remove();

      jQuery(document).on('click', '*[data-event="jqm"]', function (e) {
        e.preventDefault();
        var _this = jQuery(this);
        var name = _this.data('name');

        if (name.length) {
          var script = arMedc2Options['SITE_DIR'] + 'form/';
          var paramsStr = '';
          var arTriggerAttrs = {};
          jQuery.each(_this.get(0).attributes, function (index, attr) {
            var attrName = attr.nodeName;
            var attrValue = _this.attr(attrName);
            arTriggerAttrs[attrName] = attrValue;
            if (/^data\-param\-(.+)$/.test(attrName)) {
              var key = attrName.match(/^data\-param\-(.+)$/)[1];
              paramsStr += key + '=' + attrValue + '&';
            }
          });

          var triggerAttrs = JSON.stringify(arTriggerAttrs);
          var encTriggerAttrs = encodeURIComponent(triggerAttrs);
          script += '?name=' + name + '&' + paramsStr + 'data-trigger=' + encTriggerAttrs;
          location.href = script;
        }
      });

      jQuery('.fancybox').removeClass('fancybox');
    } else {
      jQuery(document).on('click', '*[data-event="jqm"]', function (e) {
        e.preventDefault();
        e.stopPropagation();
        jQuery(this).jqmEx();
        jQuery(this).trigger('click');

      });
    }

    jQuery('.animate-load').on('click', function () {
      jQuery(this).parent().addClass('loadings');
    });

    jQuery(window).on('onCompleteAction', function (eventdata, _this) {
      try {
        if (eventdata.action === 'loadForm') {
          jQuery(_this).parent().removeClass('loadings');
        } else if (eventdata.action === 'loadBasket') {
          var basket_link = jQuery('.basket-link');
          if (basket_link.length) {
            basket_link.attr('title', jQuery(_this).find('a').attr('title'));
            if (jQuery(_this).find('a .count').length) {
              var count = basket_link.find('.count').length ? jQuery(_this).find('.count').text() : jQuery(_this).find('.count').text();
              basket_link.find('.prices').text(jQuery(_this).find('.icon').data('summ'));
              if (basket_link.find('.count').length) {
                basket_link.find('.count').text(count);
                if (count)
                  basket_link.addClass('basket-count');
                else
                  basket_link.removeClass('basket-count');
              } else {
                basket_link.find('.js-basket-block').append(jQuery(_this).find('.count'));
                basket_link.addClass('basket-count');
                CheckHeaderFixedMenu();
              }

              jQuery('#mobilemenu .menu .ready .count').text(count);
              if (count) {
                jQuery('#mobilemenu .menu .ready .count').removeClass('empted');
              } else {
                jQuery('#mobilemenu .menu .ready .count').addClass('empted');
              }
            } else {
              basket_link.find('.count').remove();
              basket_link.removeClass('basket-count');
              CheckHeaderFixedMenu();
            }
          }
        } else if (eventdata.action === 'loadRSS') {
        }
      } catch (e) {
        console.error(e)
      }
    })

    jQuery(window).on('onCounterGoals', function (eventdata) {
      if (arMedc2Options['THEME']['YA_GOLAS'] == 'Y' && arMedc2Options['THEME']['YA_COUNTER_ID']) {
        var idCounter = arMedc2Options['THEME']['YA_COUNTER_ID'];
        idCounter = parseInt(idCounter);

        if (typeof eventdata != 'object')
          eventdata = {goal: 'undefined'};

        if (typeof eventdata.goal != 'string')
          eventdata.goal = 'undefined';

        if (idCounter) {
          try {
            waitCounter(idCounter, 50, function () {
              var obCounter = window['yaCounter' + idCounter];
              if (typeof obCounter == 'object') {
                obCounter.reachGoal(eventdata.goal);
              }
            });
          } catch (e) {
            console.error(e)
          }
        } else {
          console.info('Bad counter id!', idCounter);
        }
      }
    })

    /* show print */
    if (arMedc2Options['THEME']['PRINT_BUTTON'] == 'Y') {
      setTimeout(function () {
        if (jQuery('.page-top .rss-block.top').length) {
          jQuery('<div class="print-link"><i class="svg svg-print"></i></div>').insertAfter(jQuery('.page-top .rss'));
        } else if (jQuery('.page-top .rss').length) {
          jQuery('<div class="print-link"><i class="svg svg-print"></i></div>').insertAfter(jQuery('.page-top .rss'));
        } else if (jQuery('.page-top h1').length)
          jQuery('<div class="print-link"><i class="svg svg-print"></i></div>').insertBefore(jQuery('.page-top h1'));
        // else
        // jQuery('footer .print-block').html('<div class="print-link"><i class="svg svg-print"><svg id="Print.svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path class="cls-1" d="M1553,287h-2v3h-8v-3h-2a2,2,0,0,1-2-2v-5a2,2,0,0,1,2-2h2v-4h8v4h2a2,2,0,0,1,2,2v5A2,2,0,0,1,1553,287Zm-8,1h4v-4h-4v4Zm4-12h-4v2h4v-2Zm4,4h-12v5h2v-3h8v3h2v-5Z" transform="translate(-1539 -274)"/></svg></i></div>');
      }, 150);
    }

    jQuery(document).on('click', '.print-link', function () {
      window.print();
    });

    jQuery(document).on('click', '.eye-link', function () {
      if (jQuery(this).hasClass('show_eye_version')) {
        jQuery.cookie('MEDC2_EYE_VERSION_VALUE', '', {path: arMedc2Options['SITE_DIR'], expires: 365});
      } else {
        jQuery.cookie('MEDC2_EYE_VERSION_VALUE', 'Y', {path: arMedc2Options['SITE_DIR'], expires: 365});
      }

      window.location.href = window.location.href;
    });

    jQuery('.head-block .item-link').on('click', function () {
      var _this = jQuery(this);
      _this.siblings().removeClass('active');
      _this.addClass('active');
    });

    jQuery('table.table').each(function () {
      var _this = jQuery(this),
        first_td = _this.find('thead tr th');
      if (!first_td.length)
        first_td = _this.find('thead tr td');
      if (first_td.length) {
        var j = 0;
        _this.find('tbody tr td').each(function (i) {
          if (j > first_td.length - 1)
            j = 0;

          jQuery('<div class="th-mobile">' + first_td[j].textContent + '</div>').appendTo(jQuery(this));
          j++;
        })
      }
    });

    // menu marker
    jQuery(document).on('mouseenter', 'table td .wrap > a', function () {
      /*jQuery(this).stop(true, true);
		var itemParentPos = jQuery(this).closest('td').position().left,
			itemPos = jQuery(this).position().left,
			mainPos = itemParentPos + itemPos + parseInt(jQuery(this).css('padding-left'));
		jQuery(this).closest('.mega-menu').find('.marker-nav').css('left', mainPos);
		jQuery(this).closest('.mega-menu').find('.marker-nav').css('width', jQuery(this).find('.line-wrapper').actual('outerWidth'));*/
    });

    jQuery('a.fancybox').fancybox();

    /* flex pagination */
    jQuery('.flex-viewport .item').on('mouseenter', function () {
      jQuery(this).closest('.flexslider').find('.flex-control-nav').toggleClass('noz');
      jQuery(this).closest('.flexslider').find('.flex-control-nav').css('z-index', '0');
    })
    jQuery('.flex-viewport .item').on('mouseleave', function () {
      jQuery(this).closest('.flexslider').find('.flex-control-nav').toggleClass('noz');
      jQuery(this).closest('.flexslider').find('.flex-control-nav').css('z-index', '2');
    })

    /* ajax more items */
    jQuery(document).on('click', '.ajax_load_btn', function () {
      var url = jQuery(this).closest('.bottom_nav').find('.module-pagination .flex-direction-nav .flex-next').attr('href'),
        th = jQuery(this).find('.more_text_ajax');
      if (!th.hasClass('loading')) {
        th.addClass('loading');

        jQuery.ajax({
          url: url,
          data: {"AJAX_REQUEST": "Y"},
          success: function (html) {

            if (jQuery('.banners-small.front').length) {
              jQuery('.banners-small .items.row').append(html);
              jQuery('.bottom_nav').html(jQuery('.banners-small .items.row .bottom_nav').html());
              jQuery('.banners-small .items.row .bottom_nav').remove();
            } else {
              jQuery(html).insertBefore(jQuery('.blog .bottom_nav'));
              jQuery('.bottom_nav').html(jQuery('.blog .bottom_nav:hidden').html());
              jQuery('.blog .bottom_nav:hidden').remove();
            }

            var eventdata = {action: 'ajaxContentLoaded'};
            jQuery(window).on('onCompleteAction', [eventdata, th[0]]);

            setTimeout(function () {
              jQuery('.banners-small .item.normal-block').sliceHeight();
              th.removeClass('loading');
            }, 100);
          }
        })
      }
    });

    jQuery(document).on('click', '.ajax_load_btn_pagination', function () {
      var $this = jQuery(this),
        url = $this.closest('.pagination_nav').find('.pagination .next a').attr('href');
      if (jQuery('[detail-pagination]').length) {
        var wrapperId = $this.closest('.tab-pane').attr('id');
      }

      if (!$this.hasClass('loadings')) {
        $this.addClass('loadings');
        jQuery.ajax({
          url: url,
          data: {"AJAX_REQUEST": "Y"},
          success: function (html) {

            //jQuery(html).insertBefore(jQuery('.item-views .bottom_nav'));
            var htmlPagination = jQuery(html).find('.pagination_nav').html(),
              htmlContent = jQuery(html).find('.items').html();

            if (jQuery(html).find('[detail-pagination]').length) {
              var htmlPagination = jQuery(html).find(jQuery(html).find('#' + wrapperId + '[detail-pagination]').data('page-module')).html();
              var container = jQuery(html).find('#' + wrapperId + '[detail-pagination]').attr('detail-pagination');
              var htmlContent = jQuery(html).find(container).html();
              $this.closest('.tabs').find(container).append(htmlContent);
              $this.closest('.item-views').find('.pagination_nav').html(htmlPagination);

            } else if (jQuery(html).find('[data-list-parent]').length) {
              //var htmlPagination = jQuery(html).find(jQuery(html).find('[data-list-parent]').data('page-module')).html();
              var htmlPagination = jQuery(html).find('.pagination_nav').html();
              var contParent = jQuery(html).find('[data-list-parent]').attr('data-list-parent');
              var contCihld = jQuery(html).find('[data-list-child]').attr('data-list-child');
              var $htmlContent = jQuery(jQuery('<div>').append(jQuery(html).find(contCihld + ' > div')).html());

              $this.closest('.item-views').find('.items').append(htmlContent);
              $this.closest('.item-views').find('.pagination_nav').html(htmlPagination);
            } else {
              $this.closest('.item-views').find('.items').append(htmlContent);
              $this.closest('.item-views').find('.pagination_nav').html(htmlPagination);
            }

            var eventdata = {action: 'ajaxContentLoaded'};
            jQuery(window).on('onCompleteAction', [eventdata, jQuery(this).find('.more_text_ajax')[0]]);
            jQuery(window).on('onCompleteActionComponent', [eventdata, jQuery(this).find('.more_text_ajax')[0]]);
            $this.removeClass('loadings');
          }
        });
      }
    });

    jQuery(document).on('click', '.front.sections .ajax_btn .btn', function () {
      var $this = jQuery(this),
        parent = jQuery(this).parent(),
        params = $this.data('params'),
        template = $this.data('template');
      console.log(template);
      if (!parent.hasClass('loadings')) {
        parent.addClass('loadings');

        jQuery.ajax({
          data: {AJAX_POST: 'Y', AJAX_PARAMS: params, TEMPLATE: template},
          type: 'POST',
          url: arMedc2Options['SITE_DIR'] + 'include/mainpage/comp_sections.php',
          success: function (html) {
            jQuery('#ajax_reload_sections').html(html);
            jQuery('.sections.item-views.front .item').sliceHeight();
          }
        });
      }
    });

    /* bug fix in ff*/
    jQuery('img').removeAttr('draggable');

    jQuery('.detail .nav-tabs>li a').on('click', function () {
      var $this = jQuery(this),
        $parent = $this.parent(),
        thisIndex = $parent.index();

      if (!$parent.hasClass('active')) {
        $this.closest('.tabs').find('.tab-pane .title-tab-heading .btn').removeClass('opened open').addClass('closed');
        $this.closest('.tabs').find('.tab-pane').eq(thisIndex).find('.toggle-block').show();
        $this.closest('.tabs').find('.tab-content>.tab-pane').eq(thisIndex).find('.title-tab-heading .btn').removeClass('closed').addClass('opened');
      }
    });

    jQuery('.title-tab-heading').on('click', function () {
      var $this = jQuery(this),
        $parent = $this.parent(),
        $toggleBlock = $parent.find('.toggle-block'),
        animationTime = 200;

      if (!$parent.hasClass('active')) {
        var thisIndex = $parent.index();

        $this.closest('.tabs').find('.nav-tabs>li').removeClass('active');
        $this.closest('.tabs').find('.nav-tabs>li').eq(thisIndex).addClass('active');
        $this.closest('.tab-content').find('.toggle-block').slideUp(animationTime);
        $this.closest('.tab-content').find('.tab-pane').removeClass('active');
        $this.closest('.tab-content').find('.title-tab-heading .btn').each(function () {
          if (jQuery(this).hasClass('opened') || jQuery(this).hasClass('open')) {
            jQuery(this).removeClass('opened open').addClass('closed');
          }
        });
        $this.closest('.tab-content').find('.title-tab-heading .btn').removeClass('opened open').addClass('closed');
        $this.find('.btn').removeClass('closed').addClass('opened');
        $toggleBlock.slideDown(animationTime, function () {
          $parent.addClass('active');
          var offsetTop = $this.offset().top;

          jQuery('html, body').animate({scrollTop: offsetTop}, 200);
        });
      } else {
        $this.find('.btn').removeClass('opened open').addClass('closed');
        $toggleBlock.slideUp(animationTime, function () {
          $parent.removeClass('active');
        });
      }
    });

    // Responsive Menu Events
    var addActiveClass = false;
    jQuery('#mainMenu li.dropdown > a > i, #mainMenu li.dropdown-submenu > a > i').on('click', function (e) {
      e.preventDefault();
      if (jQuery(window).width() > 979) return;
      addActiveClass = jQuery(this).closest('li').hasClass('resp-active');
      // jQuery('#mainMenu').find('.resp-active').removeClass('resp-active');
      if (!addActiveClass) {
        jQuery(this).closest("li").addClass("resp-active");
      } else {
        jQuery(this).closest("li").removeClass("resp-active");
      }
    });

    /*animate increment*/
    jQuery('.spincrement').counterUp({
      delay: 160,
      time: 750,
    });

    jQuery('.bx_filter_input_container input[type=text]').numeric({allow: "."});

    /* search sync */
    jQuery(document).on('keyup', '.search-input-div input', function (e) {
      var inputValue = jQuery(this).val();
      jQuery('.search-input-div input').val(inputValue);

      if (jQuery(this).closest('#headerfixed').length) {
        if (e.keyCode === 13)
          jQuery('.search form').submit();
      }
    });
    jQuery(document).on('click', '.search-button-div button', function (e) {
      if (jQuery(this).closest('#headerfixed').length)
        jQuery('.search form').submit();
    });

    jQuery('.inline-search-show, .inline-search-hide').on('click', function (e) {
      if (window.matchMedia('(min-width: 600px)').matches) {
        if (typeof (jQuery(this).data('type_search')) != 'undefined' && jQuery(this).data('type_search') == 'fixed')
          jQuery('.inline-search-block').addClass('fixed');

        jQuery('.inline-search-block').toggleClass('show');

        if (arMedc2Options['THEME']['TYPE_SEARCH'] != 'fixed') {
          var height_block = 0;
          if (!jQuery('header > .top-block').length) {
            height_block = jQuery('.inline-search-block.fixed.show .search-wrapper').actual('outerHeight');//jQuery(this).closest('.maxwidth-theme').actual('outerHeight');
            console.log(height_block);
            if (jQuery(this).closest('.top-block').length)
              height_block = jQuery(this).closest('.top-block').actual('outerHeight');
            else if (jQuery(this).closest('header.header-v8').length)
              height_block = jQuery(this).closest('header.header-v8').actual('outerHeight');
            /*jQuery('.inline-search-block').css({
						'height': height_block,
						'line-height': height_block-4+'px',
						'top': -height_block
					})*/
          }
        }


        if (jQuery('.inline-search-block').hasClass('show')) {
          jQuery('.inline-search-block').find('.search-input').focus();
        }

        if (jQuery('.top-block').length) {
          if (jQuery('.inline-search-block').hasClass('show'))
            jQuery('.inline-search-block').css('background', jQuery('.top-block').css('background-color'));
          else
            jQuery('.inline-search-block').css('background', '#fff');
        }
        if (arMedc2Options['THEME']['TYPE_SEARCH'] == 'fixed') {
          if (jQuery('.inline-search-block').hasClass('show'))
            jQuery('<div class="jqmOverlay search"></div>').appendTo('body');
          else
            jQuery('.jqmOverlay').detach();
        }
      } else
        location.href = arMedc2Options['SITE_DIR'] + 'search/';
    })

    if (jQuery('.styled-block .row > div.col-md-3').length) {
      jQuery(window).on('onWindowResize', function (eventdata) {
        try {
          ignoreResize.push(true);
          jQuery('.styled-block .row > div.col-md-3').each(function () {
            jQuery(this).css({'height': '', 'line-height': ''});
            var z = parseInt(jQuery('.body_media').css('top'));
            if (z > 0) {
              var rowHeight = jQuery(this).parents('.row').first().actual('outerHeight');
              jQuery(this).css({'height': rowHeight + 'px', 'line-height': rowHeight + 'px'});
            }
          });
        } catch (e) {
        } finally {
          ignoreResize.pop();
        }
      });
    }

    if (jQuery('.order-block').length) {
      jQuery(window).on('onWindowResize', function (eventdata) {
        try {
          ignoreResize.push(true);
          jQuery('.order-block').each(function () {
            var cols = jQuery(this).find('.row > div');
            if (cols.length) {
              var colFirst = cols.first();
              var colLast = cols.last();
              var colText = colFirst.find('.text');
              var bText = colText.length;
              var bOnlyText = cols.length === 1 && bText;
              var bPrice = colFirst.find('.price').length;
              var z = parseInt(jQuery('.body_media').css('top'));

              cols.css({'height': '', 'padding-top': '', 'padding-bottom': ''});
              colText.css({'height': '', 'padding-top': '', 'padding-bottom': ''});
              if ((!bPrice && z > 0) || (bPrice && z > 1)) {
                var minHeight = 83;

                if (!bOnlyText) {
                  var colLast_height = colLast.outerHeight();
                  colLast_height = colLast_height >= minHeight ? colLast_height : minHeight;
                }

                if (bText) {
                  var colFirst_height = colFirst.outerHeight();
                  colFirst_height = colFirst_height >= minHeight ? colFirst_height : minHeight;
                }

                var colMax_height = (bText ? (!bOnlyText ? (colLast_height >= colFirst_height ? colLast_height : colFirst_height) : colLast_height) : colFirst_height);

                if (!bOnlyText) {
                  var textPadding = 41 + (colMax_height - colFirst.outerHeight()) / 2;
                  colLast.find('.btns').css({
                    'padding-top': textPadding + 'px',
                    'padding-bottom': textPadding + 'px',
                    'height': colMax_height + 'px'
                  });
                }
                if (bText) {
                  colLast.css({'height': colMax_height + 'px'});
                  var textPadding = 41 + (colMax_height - colText.outerHeight()) / 2;
                  colText.css({
                    'padding-top': textPadding + 'px',
                    'padding-bottom': textPadding + 'px',
                    'height': colMax_height + 'px'
                  });
                }
              }
            }
          });
        } catch (e) {
        } finally {
          ignoreResize.pop();
        }
      });
    }

    if (jQuery('.equal-padding').length) {
      jQuery(window).on('onWindowResize', function (eventdata) {
        try {
          ignoreResize.push(true);
          jQuery('.equal-padding').each(function () {
            jQuery(this).find('.text').css({'padding-top': '0px', 'padding-bottom': '0px'});
            var equal_block = jQuery(this).siblings('.equals'),
              height = jQuery(this).actual('outerHeight');

            delta = Math.round((equal_block.actual('outerHeight') - height) / 2);
            if (delta)
              jQuery(this).find('.text').css({'padding-top': delta + 'px', 'padding-bottom': delta + 'px'});
          })
        } catch (e) {
        } finally {
          ignoreResize.pop();
        }
      });
    }

    jQuery(document).on('click', '.mega-menu .dropdown-menu', function (e) {
      e.stopPropagation()
    });

    jQuery(document).on('click', '.mega-menu .dropdown-toggle.more-items', function (e) {
      e.preventDefault();
    });

    jQuery('.table-menu .dropdown,.table-menu .dropdown-submenu,.table-menu .dropdown-toggle').on('mouseenter', function () {
      CheckTopVisibleMenu();
    });

    jQuery('.mega-menu .search-item .search-icon, .menu-row #title-search .fa-close').on('click', function (e) {
      e.preventDefault();
      jQuery('.menu-row #title-search').toggleClass('hide');
    });

    jQuery('.mega-menu ul.nav .search input').on('keyup', function (e) {
      var inputValue = jQuery(this).val();
      jQuery('.menu-row > .search input').val(inputValue);
      if (e.keyCode == 13) {
        jQuery('.menu-row > .search form').submit();
      }
    });

    jQuery('.menu-row > .search input').on('keyup', function (e) {
      var inputValue = jQuery(this).val();
      jQuery('.mega-menu ul.nav .search input').val(inputValue);
      if (e.keyCode == 13) {
        jQuery('.menu-row > .search form').submit();
      }
    });

    jQuery('.mega-menu ul.nav .search button').on('click', function (e) {
      e.preventDefault();
      var inputValue = jQuery(this).parents('.search').find('input').val();
      jQuery('.menu-and-search .search input').val(inputValue);
      jQuery('.menu-row > .search form').submit();
    });

    jQuery('.filter .calendar').on('click', function () {
      var button = jQuery(this).next();
      if (button.hasClass('calendar-icon')) {
        button.trigger('click');
      }
    });

    /*sliceheights*/
    if (jQuery('.banners-small .item.normal-block').length)
      jQuery('.banners-small .item.normal-block').sliceHeight();
    if (jQuery('.sections .item').length)
      jQuery('.sections .item').sliceHeight();
    if (jQuery('.teasers .item').length)
      jQuery('.teasers .item').sliceHeight();
    if (jQuery('.wrap-portfolio-front .row.items > div').length)
      jQuery('.wrap-portfolio-front .row.items > div').sliceHeight({'row': '.row.items', 'item': '.item1'});

    SliceHeightBlocks();

    /* toggle */
    var $this = this,
      previewParClosedHeight = 25;

    jQuery('section.toggle > label').prepend(jQuery('<i />').addClass('fa fa-plus'));
    jQuery('section.toggle > label').prepend(jQuery('<i />').addClass('fa fa-minus'));
    jQuery('section.toggle.active > p').addClass('preview-active');
    jQuery('section.toggle.active > div.toggle-content').slideDown(350, function () {
    });

    jQuery('section.toggle > label').click(function (e) {
      var parentSection = jQuery(this).parent(),
        parentWrapper = jQuery(this).parents('div.toogle'),
        previewPar = false,
        isAccordion = parentWrapper.hasClass('toogle-accordion');

      if (isAccordion && typeof (e.originalEvent) != 'undefined') {
        parentWrapper.find('section.toggle.active > label').trigger('click');
      }

      parentSection.toggleClass('active');

      // Preview Paragraph
      if (parentSection.find('> p').get(0)) {
        previewPar = parentSection.find('> p');
        var previewParCurrentHeight = previewPar.css('height');
        previewPar.css('height', 'auto');
        var previewParAnimateHeight = previewPar.css('height');
        previewPar.css('height', previewParCurrentHeight);
      }

      // Content
      var toggleContent = parentSection.find('> div.toggle-content');

      if (parentSection.hasClass('active')) {
        jQuery(previewPar).animate({
          height: previewParAnimateHeight
        }, 350, function () {
          jQuery(this).addClass('preview-active');
        });
        toggleContent.slideDown(350, function () {
        });
      } else {
        jQuery(previewPar).animate({
          height: previewParClosedHeight
        }, 350, function () {
          jQuery(this).removeClass('preview-active');
        });
        toggleContent.slideUp(350, function () {
        });
      }
    });

    /* accordion */
    jQuery('.accordion-head').on('click', function (e) {
      e.preventDefault();
      if (!jQuery(this).next().hasClass('collapsing')) {
        jQuery(this).toggleClass('accordion-open');
        jQuery(this).toggleClass('accordion-close');
      }
    });

    /* progress bar */
    jQuery('[data-appear-progress-animation]').each(function () {
      var $this = jQuery(this);
      $this.appear(function () {
        var delay = ($this.attr('data-appear-animation-delay') ? $this.attr('data-appear-animation-delay') : 1);
        if (delay > 1)
          $this.css('animation-delay', delay + 'ms');
        $this.addClass($this.attr('data-appear-animation'));

        setTimeout(function () {
          $this.animate({
            width: $this.attr('data-appear-progress-animation')
          }, 1500, 'easeOutQuad', function () {
            $this.find('.progress-bar-tooltip').animate({
              opacity: 1
            }, 500, 'easeOutQuad');
          });
        }, delay);
      }, {accX: 0, accY: -50});
    });

    /* portfolio item */
    jQuery('.item.animated-block').appear(function () {
      var $this = jQuery(this);

      $this.addClass($this.data('animation')).addClass('visible');

    }, {accX: 0, accY: 150})

    jQuery('a[rel=tooltip]').tooltip();
    jQuery('span[data-toggle=tooltip]').tooltip();

    jQuery('select.sort').on('change', function () {
      location.href = jQuery(this).val();
    });

    setTimeout(function (th) {
      jQuery('.catalog.group.list .item').each(function () {
        var th = jQuery(this);
        if ((tmp = th.find('.image').outerHeight() - th.find('.text_info').outerHeight()) > 0) {
          th.find('.text_info .titles').height(th.find('.text_info .titles').outerHeight() + tmp);
        }
      })
    }, 50);

    /* ajax tabs*/
    jQuery('.tabs_ajax .head-block .item-link').on('click', function () {
      var index = jQuery(this).index(),
        body_block = jQuery(this).closest('.tabs_ajax').find('.body-block'),
        obQuery = parseUrlQuery(),
        url_post = arMedc2Options['SITE_DIR'] + 'include/mainpage/comp_catalog_ajax.php';
      jQuery(this).siblings().removeClass('active');
      jQuery(this).addClass('active');

      if ('clear_cache' in obQuery)
        url_post += '?clear_cache=' + obQuery.clear_cache;

      if (!jQuery(this).hasClass('clicked')) {
        jQuery.ajax({
          url: url_post,
          type: 'POST',
          data: {
            AJAX_POST: 'Y',
            AJAX_PARAMS: jQuery(this).closest('.item-views.catalog').find('.request-data').data('value'),
            GLOBAL_FILTER: body_block.find('.item-block:eq(' + index + ')').data('filter')
          },
        }).success(function (html) {
          body_block.find('.item-block:eq(' + index + ')').html(html);

          InitFlexSliderClass(body_block.find('.item-block:eq(' + index + ')').find('.flexslider')); //reinit flexslider

          body_block.css('height', body_block.find('.item-block.active').actual('outerHeight'));

          body_block.find('.item-block').removeClass('active').removeClass('opacity1').addClass('opacity0');
          body_block.find('.item-block:eq(' + index + ')').addClass('active');

          setTimeout(function () {
            body_block.css('height', 'auto');

            //recalculate height
            body_block.find('.item-block:eq(' + index + ') .catalog.item-views.table .item .title').sliceHeight();
            body_block.find('.item-block:eq(' + index + ') .catalog.item-views.table .item .cont').sliceHeight();
            body_block.find('.item-block:eq(' + index + ') .catalog.item-views.table .item .slice_price').sliceHeight();
            body_block.find('.item-block:eq(' + index + ') .catalog.item-views.table .item').sliceHeight({classNull: '.footer-button'});

            body_block.find('.item-block:eq(' + index + ')').removeClass('opacity0').addClass('opacity1');
          }, 100)
        });
      } else {
        body_block.find('.item-block').removeClass('active').removeClass('opacity1').addClass('opacity0');
        body_block.find('.item-block:eq(' + index + ')').addClass('active').removeClass('opacity0').addClass('opacity1');
      }
      jQuery(this).addClass('clicked');
    })

    /*item galery*/
    jQuery('.thumbs .item a').on('click', function (e) {
      e.preventDefault();
      jQuery('.thumbs .item').removeClass('current');
      jQuery(this).closest('.item').toggleClass('current');
      jQuery('.slides li' + jQuery(this).attr('href')).addClass('current').siblings().removeClass('current');
    });

    jQuery('header.fixed .btn-responsive-nav').on('click', function () {
      jQuery('html, body').animate({scrollTop: 0}, 400);
    });

    jQuery('body').on('click', '.form .refresh-page', function () {
      location.href = location.href;
    });


    jQuery(document).on('click', '.basket.fly .opener', function () {
      if (window.matchMedia('(max-width: 767px)').matches)
        location.href = arMedc2Options['THEME']['URL_BASKET_SECTION'];
      else
        jQuery(this).closest('.ajax_basket').toggleClass('opened');
    })

    jQuery(document).on('click', '.basket.fly .close_block', function () {
      jQuery('.basket.fly .opener').trigger('click');
    })


    if (jQuery('.form-control').length) {
      jQuery('.form-control').each(function () {
        var value = jQuery(this).val();

        if (value) {
          jQuery(this).closest('.animated-labels').addClass('input-filed');
        }
      });
    }
    /* animated labels */
    jQuery(document).on("focus", ".animated-labels input,.animated-labels textarea", function () {
      jQuery(this).closest(".animated-labels").addClass("input-filed");
    }).on("focusout", ".animated-labels input,.animated-labels textarea", function () {
      if ("" != jQuery(this).val())
        jQuery(this).closest(".animated-labels").addClass("input-filed");
      else
        jQuery(this).closest(".animated-labels").removeClass("input-filed");
    });

    jQuery(document).on('click', '.animated-labels select', function () {
      var $input = jQuery(this).closest('.animated-labels');

      if (!$input.hasClass('input-filed') && !$input.hasClass('changed')) {
        jQuery(this).closest('.animated-labels').addClass('input-filed');
      }

      jQuery(this).closest('.animated-labels').removeClass('changed');
    });

    jQuery(document).on('change', '.animated-labels select', function () {
      var value = jQuery(this).val();
      if (!value) {
        jQuery(this).closest('.animated-labels').removeClass('input-filed').addClass('changed');
      }
    });

    jQuery(document).on('blur', '.animated-labels select', function () {
      var value = jQuery(this).val();

      if (!value) {
        jQuery(this).closest('.animated-labels').removeClass('input-filed').addClass('changed');
      }
    });

    /* accordion action*/
    jQuery('.panel-collapse').on('hidden.bs.collapse', function () {
      jQuery(this).parent().toggleClass('opened');
    })
    jQuery('.panel-collapse').on('show.bs.collapse', function () {
      jQuery(this).parent().toggleClass('opened');
    })

    // MEDC2 BASKET
    // - basket fly close
    jQuery(document).on('click', function () {
      if (jQuery('.basket.fly').length && jQuery('.ajax_basket').hasClass('opened')) {
        jQuery('.ajax_basket').removeClass('opened');
      }
    });

    jQuery(document).on('click', '.basket.fly', function (e) {
      e.stopPropagation();
    });

    // - COUNTER
    var timerBasketCounter = false;

    // -- keyup input
    jQuery(document).on('keydown', '.count', function (e) {
      // Allow: backspace, delete, tab, escape, enter and .
      if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl+A, Command+A
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
        return;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
      }
    });
    jQuery(document).on('keyup', '.count', function (e) {
      var $this = jQuery(this),
        counterInputValueNew = $this.val(),
        price = $this.closest('.item').find('input[name=PRICE]').val();

      Summ($this, counterInputValueNew, price);
    });

    // -- scroll after apply option
    if (jQuery('.instagram_ajax').length) {
      jQuery(window).on('onCompleteAction', function (eventdata) {
        if (eventdata.action === 'instagrammLoaded')
          scrollPreviewBlock();
      });
    } else
      scrollPreviewBlock();

    jQuery('select.region').on('change', function () {
      var val = parseInt(jQuery(this).val());
      if (jQuery('select.city').length) {
        if (val) {
          jQuery('select.city').removeAttr('disabled');
          jQuery('select.city option').hide();
          jQuery('select.city option[data-parent_section=' + val + ']').show();
        } else
          jQuery('select.city').attr('disabled', 'disabled');
      }
    })

    jQuery('select.city, select.region').on('change', function () {
      var _this = jQuery(this),
        val = parseInt(_this.val());
      if (_this.hasClass('region')) {
        jQuery('select.city option:eq(0)').show();
        jQuery('select.city').val(0);
      }

      if ((_this.hasClass('region') && !val) || _this.hasClass('city')) {
        jQuery.ajax({
          type: 'POST',
          data: {ID: val},
        }).success(function (html) {
          var ob = jQuery.processHTML(html);
          jQuery('.ajax_items')[0].innerHTML = ob.HTML;
          jQuery.ajax.processScripts(ob.SCRIPT);
        })
      }
    })

    // -- blur input
    jQuery(document).on('blur', '.count', function () {
      BasketCounter(jQuery(this));
    });

    // -- click minus, plus button
    jQuery(document).on('click', '.minus, .plus', function (e) {
      e.stopPropagation();
      BasketCounter(jQuery(this));
    });

    // - Add2Basket
    jQuery(document).on('click', '.to_cart', function (e) {
      e.stopPropagation();
      var item = jQuery(this).closest('[data-item]'),
        _this = jQuery(this),
        itemData = item.data('item'),
        buyBlock = item.find('.buy_block'),
        counter = buyBlock.find('.counter'),
        buttonToCart = buyBlock.find('.to_cart'),
        itemQuantity = parseFloat(buttonToCart.data('quantity')),
        countItem = (jQuery('.basket').length ? parseInt(jQuery('.basket .count').text()) : parseInt(jQuery('.basket_top:visible .count').text()));

      jQuery('.basket_top .count').text(countItem + 1).removeClass('empted');
      jQuery('.basket .count').text(countItem + 1).removeClass('empted');

      if (typeof (arMedc2Options['THEME']['ORDER_BASKET_VIEW']) !== 'undefined') {
        if (jQuery.trim(arMedc2Options['THEME']['ORDER_BASKET_VIEW']) === 'HEADER' && jQuery('.basket_top').length)
          var bBasketTop = true;
        else if (jQuery('.basket.fly').length)
          var bBasketFly = true;
      }

      if (isNaN(itemQuantity) || itemQuantity <= 0) {
        itemQuantity = 1;
      }

      if (!isNaN(itemData.ID) && parseInt(itemData.ID) > 0) {
        buyBlock.addClass('in');

        jQuery.ajax({
          url: arMedc2Options['SITE_DIR'] + 'include/footer/site-basket.php',
          type: 'POST',
          data: {itemData: itemData, quantity: itemQuantity},
        }).success(function (html) {
          var eventdata = {action: 'loadForm'};
          jQuery(window).on('onCompleteAction', [eventdata, _this[0]]);

          if (bBasketTop) {
            jQuery('.ajax_basket').html(html);
            var eventdata = {action: 'loadBasket'};
            jQuery(window).on('onCompleteAction', [eventdata, jQuery('.ajax_basket')[0]]);
          }

          if (bBasketFly) {
            if (jQuery('.basket.fly').length) {
              jQuery('.ajax_basket').html(html);
              setTimeout(function () {
                if (!jQuery('.ajax_basket').hasClass('opened')) {
                  jQuery('.ajax_basket').addClass('opened');
                }
              }, 50);
            }
          }

          if (arMedc2Options['THEME']['USE_SALE_GOALS'] != 'N') {
            var eventdata = {goal: 'goal_basket_add', params: {itemData: itemData, quantity: itemQuantity}};
            jQuery(window).on('onCounterGoals', [eventdata]);
          }
        });
      } else {
        return;
      }
    });

    // - Remove9Basket
    jQuery(document).on('click', '.remove', function () {
      var item = jQuery(this).closest('[data-item]'),
        itemData = item.data('item'),
        bRemove = 'Y',
        bRemoveAll = (jQuery.trim(jQuery(this).closest('[data-remove_all]').data('remove_all')) === 'Y' ? 'Y' : false);
      getCurUri = jQuery.trim(jQuery('input[name=getPageUri]').val()),
        countItem = (jQuery('.basket').length ? parseInt(jQuery('.basket .item').length) : parseInt(jQuery('.basket_top:visible .item').length)),
        bOneItem = (countItem - 1 <= 0),
        scrollTop = (jQuery('.basket.fly').length ? jQuery('.basket.fly .items_wrap').scrollTop() : (jQuery('.basket_top:visible').length ? jQuery('.basket_top .items:visible').scrollTop() : ''));

      var _ajax = function () {
        jQuery.ajax({
          url: arMedc2Options['SITE_DIR'] + 'include/footer/site-basket.php',
          data: {itemData: itemData, remove: bRemove, removeAll: bRemoveAll},
        }).success(function (html) {

          if (bBasketTop) {
            jQuery('.ajax_basket').html(html);
            jQuery('.basket_top .items').scrollTop(scrollTop);
          }

          if (getCurUri) {
            jQuery.ajax({
              url: getCurUri,
              type: 'POST',
            }).success(function (html) {
              if (jQuery('.basket.default').length) {
                jQuery('.basket.default').html(html);
              }
            });
          }

          if (bBasketFly) {
            jQuery('.ajax_basket').html(html);
            jQuery('.ajax_basket').addClass('opened');
            jQuery('.basket.fly .items_wrap').scrollTop(scrollTop);
          }

          if (arMedc2Options['THEME']['USE_SALE_GOALS'] != 'N') {
            var eventdata = {
              goal: 'goal_basket_remove',
              params: {itemData: itemData, remove: bRemove, removeAll: bRemoveAll}
            };
            jQuery(window).on('onCounterGoals', [eventdata]);
          }
        });
      }

      if (typeof (arMedc2Options['THEME']['ORDER_BASKET_VIEW']) !== 'undefined') {
        if (jQuery.trim(arMedc2Options['THEME']['ORDER_BASKET_VIEW']) === 'HEADER' && jQuery('.basket_top').length)
          var bBasketTop = true;
        else if (jQuery('.basket.fly').length)
          var bBasketFly = true;
      }

      if (typeof (itemData) !== 'undefined' && (!isNaN(itemData.ID) && itemData.ID > 0) || bRemoveAll) {
        if (bRemoveAll) {
          jQuery('.buy_block').removeClass('in');
          jQuery('.basket .count').text(0).addClass('empted');
          jQuery('.basket_top .count').text(0).addClass('empted');
          jQuery('#mobilemenu .menu .ready .count').text(0).addClass('empted');
        } else {
          jQuery('[data-item]').each(function () {
            if (jQuery(this).data('item').ID == itemData.ID) {
              jQuery(this).find('.buy_block').removeClass('in');
            }
          });
          if (jQuery('.basket').length) {
            if (jQuery('.basket_top .count').length)
              jQuery('.basket_top .count').text(parseFloat(jQuery('.basket_top:visible .count').text()) - 1);
            else {
              jQuery('.basket .count').text(parseFloat(jQuery('.basket .count').text()) - 1);
              jQuery('.basket_top .count').text(parseFloat(jQuery('.basket .count').text()) - 1);
            }
          } else {
            jQuery('.basket_top .count').text(parseFloat(jQuery('.basket_top:visible .count').text()) - 1);
          }

          jQuery('#mobilemenu .menu .ready .count').text(parseFloat(jQuery('#mobilemenu .menu .ready .count').text()) - 1);
        }

        if (bOneItem && !bRemoveAll) {
          if (item.closest('.basket_top').length) {
            item.closest('.dropdown').animate({opacity: 0}, 200, function () {
              _ajax();
            });
          } else {
            item.closest('.basket').find('.count').addClass('empted');
            item.closest('.basket_wrap').fadeOut(200, function () {
              item.closest('.basket').find('.basket_empty').fadeIn(200, function () {
                _ajax();
              });
            });
          }
        } else if (bRemoveAll) {
          jQuery('.basket_wrap').fadeOut(200, function () {
            jQuery('.remove.all').remove();
            jQuery('.basket').find('.basket_empty').fadeIn(200, function () {
              _ajax();
            });
          });
        } else if (!bOneItem) {
          item.animate({opacity: 0}, 200).slideUp(200, function () {
            _ajax();
          });
        }
      } else {
        return;
      }
    });
    jQuery(document).on('click', '.print', function () {
      window.print();
    });

    jQuery('.choise').on('click', function () {
      var _this = jQuery(this);
      if (typeof (_this.data('block')) != 'undefined') {
        scrollToBlock(_this.data('block'));
      }
    });

    if (jQuery('#bx-composite-banner .bx-composite-btn').length) {
      jQuery('footer .confidentiality').css('padding-right', '236px');
      jQuery('footer.footer-v2 .menu-bottom-wrap').css('padding-left', '226px');
      jQuery('footer.footer-v3 .menu-bottom-wrap').css('padding-left', '226px');
    }
  });

  scrollPreviewBlock = function () {
    if (typeof (jQuery.cookie('scoll_block')) !== 'undefined' && jQuery.cookie('scoll_block')) {
      var scoll_block = jQuery(jQuery.cookie('scoll_block'));
      if (scoll_block.length) {
        jQuery('body, html').animate({scrollTop: scoll_block.offset().top}, 500);
        jQuery.cookie('scoll_block', null);
      }
    }
  }

  scrollToBlock = function (block) {
    if (jQuery(block).length) {
      var offset = jQuery(block).offset().top;
      if (typeof (jQuery(block).data('toggle')) != 'undefined')
        jQuery(block).click();

      if (typeof (jQuery(block).data('offset')) != 'undefined')
        offset += jQuery(block).data('offset');
      jQuery('body, html').animate({scrollTop: offset}, 500);
    }
  }

// START VIDEO BUTTON
  jQuery(document).on('click', '.banners-big .item .btn-video', function () {
    jQuery(this).addClass('loading');
    jQuery(this).closest('.item').addClass('loading');
    startMainBannerSlideVideo(jQuery(this).closest('.item'));
  });

//MEDC2 BASKET
  function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function (n, prec) {
        var k = Math.pow(10, prec);
        return '' + (Math.round(n * k) / k).toFixed(prec);
      };

    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');

    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }

    if ((s[1] || '')
      .length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }

    return s.join(dec);
  }


  setBasketItemsClasses = function () {
    if (typeof (arBasketItems) !== 'undefined' && typeof (arBasketItems) !== 'string') {
      if (Object.keys(arBasketItems).length) {
        for (var key in arBasketItems) {
          jQuery('[data-item]').each(function () {
            if (jQuery(this).data('item').ID == key) {
              jQuery(this).find('.buy_block').addClass('in');
            }
          });
        }
      }
    }
  }

  function Summ(el, counterInputValueNew, price) {
    if (counterInputValueNew <= 0) {
      counterInputValueNew = 1;
    }

    var summ = number_format(counterInputValueNew * price, 0, '.', ' '),
      allSumm = 0;

    el.closest('.items').find('.item').each(function () {
      var $this = jQuery(this),
        price = parseFloat($this.find('input[name=PRICE]').val()),
        count = parseFloat($this.find('input.count').val());

      if (count <= 0) {
        count = 1;
      }

      if (!isNaN(price) && !isNaN(count)) {
        allSumm += count * price;
      }
    });

    allSumm = number_format(parseFloat(allSumm), 0, '.', ' ');

    el.closest('.item').find('.summ .price_val').text(summ);
    el.closest('.basket').find('.foot .total>span').text(allSumm);
  }

  var timerBasketUpdate = false;
// - COUNTER
  BasketCounter = function (el) {
    var elClass = jQuery.trim(el.attr('class')),
      bClassMinus = (elClass.indexOf('minus') > -1),
      bClassPlus = (elClass.indexOf('plus') > -1),
      bClassCount = (elClass.indexOf('count') > -1),
      getCurUri = jQuery.trim(jQuery('input[name=getPageUri]').val()),
      buyBlock = el.closest('.buy_block'),
      buttonToCart = buyBlock.find('.to_cart'),
      counterInput = el.closest('.counter').find('input.count'),
      counterInputValue = parseFloat(jQuery.trim(counterInput.val())),
      price = parseFloat(buyBlock.find('input[name=PRICE]').val()),
      counterInputMaxCount = Math.pow(10, parseInt(counterInput.attr('maxlength'))) - 1;

    // class minus button
    if (bClassMinus) {
      var counterInputValueNew = counterInputValue - 1;

      if (counterInputValueNew <= 0) {
        counterInputValueNew = 1;
      }

      counterInput.val(counterInputValueNew);

      Summ(el, counterInputValueNew, price);

      if (timerBasketUpdate) {
        clearTimeout(timerBasketUpdate);
        timerBasketUpdate = false;
      }

      timerBasketUpdate = setTimeout(function () {
        BasketUpdate(el, counterInputValueNew);
        timerBasketUpdate = false;
      }, 700);
    }
    // class plus button
    else if (bClassPlus) {
      var counterInputValueNew = counterInputValue + 1;

      if (counterInputValueNew > counterInputMaxCount) {
        counterInputValueNew = counterInputMaxCount;
      }

      counterInput.val(counterInputValueNew);
      Summ(el, counterInputValueNew, price);

      if (timerBasketUpdate) {
        clearTimeout(timerBasketUpdate);
        timerBasketUpdate = false;
      }

      timerBasketUpdate = setTimeout(function () {
        BasketUpdate(el, counterInputValueNew);
        timerBasketUpdate = false;
      }, 700);
    }
    // class input
    else if (bClassCount) {
      var counterInputValueNew = counterInputValue;

      if (counterInputValueNew <= 0 || isNaN(counterInputValueNew)) {
        counterInputValueNew = 1;
      }
      el.val(counterInputValueNew);
      BasketUpdate(el, counterInputValueNew);
    }

    if (!getCurUri && !el.closest('.basket.fly').length) {
      buttonToCart.data('quantity', counterInputValueNew);
    }
  }

  BasketUpdate = function (el, counterInputValueNew) {
    var itemData = el.closest('[data-item]').data('item'),
      itemData = (typeof (arBasketItems) === 'object' && typeof (arBasketItems[itemData.ID]) === 'object' ? arBasketItems[itemData.ID] : itemData),
      buyBlock = el.closest('.buy_block'),
      buttonToCart = buyBlock.find('.to_cart'),
      getCurUri = jQuery.trim(jQuery('input[name=getPageUri]').val())
    scrollTop = (jQuery('.basket.fly').length ? jQuery('.basket.fly .items_wrap').scrollTop() : (jQuery('.basket_top:visible').length ? jQuery('.basket_top .items:visible').scrollTop() : ''));

    if (typeof (arMedc2Options['THEME']['ORDER_BASKET_VIEW']) !== 'undefined' && jQuery.trim(arMedc2Options['THEME']['ORDER_BASKET_VIEW']) === 'FLY' && jQuery('.basket.fly').length) {
      var bBasketFly = true;
    }

    if (typeof (arMedc2Options['THEME']['ORDER_BASKET_VIEW']) !== 'undefined' && jQuery.trim(arMedc2Options['THEME']['ORDER_BASKET_VIEW']) === 'HEADER' && jQuery('.basket_top').length) {
      var bBasketTop = true;
    } else {
      if (typeof (itemData) != 'undefined' && !isNaN(itemData.ID) && itemData.ID > 0) {
        jQuery.ajax({
          // url: arMedc2Options['SITE_DIR'] + 'ajax/basket_items.php',
          url: arMedc2Options['SITE_DIR'] + 'include/footer/site-basket.php',
          data: {itemData: itemData, quantity: counterInputValueNew},
        }).success(function (data) {
          if (typeof (data) === 'object') {
            arBasketItems = data;
          }
          if (bBasketTop) {
            jQuery.ajax({
              url: arMedc2Options['SITE_DIR'] + 'include/footer/site-basket.php',
              type: 'POST',
              data: {'ajaxPost': 'Y'},
            }).success(function (html) {
              buyBlock.removeClass('in');
              jQuery('.ajax_basket').html(html);

              /*if(!getCurUri){
							setTimeout(function(){
								jQuery('.basket_top .dropdown').addClass('expanded');
							}, 100);

							setTimeout(function(){
								jQuery('.basket_top .dropdown').removeClass('expanded');
							}, 1000);
						}*/
            });
          }

          if (bBasketFly) {
            jQuery.ajax({
              url: arMedc2Options['SITE_DIR'] + 'include/footer/site-basket.php',
              type: 'POST',
              data: {'ajaxPost': 'Y'},
            }).success(function (html) {
              if (jQuery('.basket.fly').length) {
                jQuery('.ajax_basket').html(html);
                jQuery('.basket.fly .items_wrap').scrollTop(scrollTop);
              }
            });
          }

          if (getCurUri) {
            jQuery.ajax({
              url: getCurUri,
              type: 'POST',
            }).success(function (html) {
              if (jQuery('.basket.default').length) {
                jQuery('.basket.default').html(html);
              }
            });
          }
        });
      } else {
        return;
      }
    }
  }

  CheckTabActive = function () {
    if (typeof (clicked_tab) && clicked_tab) {
      if (window.matchMedia('(min-width: 768px)').matches) {
        clicked_tab--;
        jQuery('.catalog.detail .nav.nav-tabs li:eq(' + clicked_tab + ')').addClass('active');
        jQuery('.catalog.detail .tab-content .tab-pane:eq(' + clicked_tab + ')').addClass('active');
        jQuery('.catalog.detail .tab-content .tab-pane .title-tab-heading').next().removeAttr('style');
        clicked_tab = 0;
      }
    }
  }

  /* parallax bg */
  ParallaxBg = function () {
    if (jQuery('*[data-type=parallax-bg]').length) {
      var x = jQuery(window).scrollTop() / jQuery(document).height();
      x = parseInt(-x * 280);
      jQuery('*[data-type=parallax-bg]').stop().animate({'background-position-y': x + 'px'}, 400, 'swing');
    }
  }
  SetFixedAskBlock = function () {
    // if (jQuery('.ask_a_question_wrapper').length) {
    //   var offset = jQuery('.ask_a_question_wrapper').offset(),
    //     block = jQuery('.ask_a_question_wrapper').find('.ask_a_question'),
    //     block_offset = block[0],
    //     block_height = block_offset.bottom - block_offset.top,
    //     diff_top_scroll = jQuery('#headerfixed').height() + 20;
    //
    //   if (/*offset.top+*/block_height + 130 > block.closest('.fixed_wrapper').height())
    //     block.addClass('nonfixed');
    //   else
    //     block.removeClass('nonfixed');
    //
    //   if (jQuery('footer').length && block_height + diff_top_scroll + documentScrollTopLast + 130 > jQuery('footer').offset().top) {
    //     block.removeClass('fixed').css({'top': 'auto', 'width': 'auto', 'bottom': 0});
    //     block.parent().css('position', 'static');
    //     block.parent().parent().css('position', 'static');
    //   } else {
    //     block.parent().removeAttr('style');
    //     block.parent().parent().removeAttr('style');
    //
    //     if (documentScrollTopLast + diff_top_scroll > offset.top)
    //       block.addClass('fixed').css({
    //         'top': diff_top_scroll,
    //         'bottom': 'auto',
    //         'width': jQuery('.fixed_block_fix').width()
    //       });
    //     else
    //       block.removeClass('fixed').css({'top': 0, 'width': jQuery('.fixed_block_fix').width()});
    //   }
    // }
  }


// Events
  var timerScroll = false, ignoreScroll = [], documentScrollTopLast = jQuery(document).scrollTop(), startScroll = 0;
  var bMenuResize = false;
  jQuery(document).on('scroll', function () {
    CheckPopupTop();
    SetFixedAskBlock();
    if (!ignoreScroll.length) {
      if (timerScroll) {
        clearTimeout(timerScroll);
        timerScroll = false;
      }
      timerScroll = setTimeout(function () {
        jQuery(window).on('onWindowScroll', false);
      }, 100);
    }
    documentScrollTopLast = jQuery(document).scrollTop();

    if (jQuery('#headerfixed').hasClass('fixed') && !bMenuResize) {
      jQuery(window).resize();
      bMenuResize = true;
    } else if (!jQuery('#headerfixed').hasClass('fixed')) {
      bMenuResize = false;
    }
  });

  var timerResize = false, ignoreResize = [];

  jQuery(window).on('resize', function () {
    CheckBodyPadding();
    CheckPopupTop();
    CheckScrollToTop();
    if (!ignoreResize.length) {
      if (timerResize) {
        clearTimeout(timerResize);
        timerResize = false;
      }
      timerResize = setTimeout(function () {
        jQuery(window).on('onWindowResize', false);
      }, 100);
    }
    documentScrollTopLast = jQuery(document).scrollTop();
  });

  jQuery(document).on('onWindowScroll', function (eventdata) {
    try {
      ignoreScroll.push(true);
      ParallaxBg();

      if (arMedc2Options['THEME']['TYPE_SEARCH'] !== 'fixed') {
        if (!jQuery('header > .top-block').length && window.matchMedia('(min-width: 991px)').matches) {
          var height_block = 0,
            scrollVal = jQuery(window).scrollTop();
          height_block = jQuery('.logo_and_menu-row').actual('outerHeight');

          if (!scrollVal) {
            jQuery('.inline-search-block').css({
              'height': height_block,
              'line-height': height_block - 4 + 'px',
              'top': -height_block
            })
          }
        }
      }

    } catch (e) {
    } finally {
      ignoreScroll.pop();
    }
  });

  jQuery(document).on('onWindowResize', function (eventdata) {
    try {
      ignoreResize.push(true);

      CheckHeaderFixedMenu();
      CheckTopMenuDotted();
      CheckTopVisibleMenu();
      CheckFlexSlider();
      CheckMainBannerSliderVText(jQuery('.banners-big .flexslider'));
      CheckMainBannerSliderVText(jQuery('.banners-content .maxwidth-banner'));
      CheckObjectsSizes();
      verticalAlign();
      CheckTabActive();
      setTimeout(function () {
        createTableCompare(jQuery('.main-block .items .title-block:not(.clone) .item'), jQuery('.prop_title_table'), jQuery('.main-block .prop_title_table .item.clone'));
      }, 100);
      SliceHeightBlocks();
    } catch (e) {
    } finally {
      ignoreResize.pop();
    }
  });

  jQuery(window).on('onSliderStart', function (eventdata) {
    try {
      ignoreResize.push(true);
      if (eventdata) {
        var slider = eventdata.slider;
        if (slider) {
          if (slider.closest('.staff-type-2').length) {
            var sliderHeight = slider.outerHeight(true, true) - 3;

            //$parent.height(parentHeight);
            slider.height(sliderHeight);
            slider.find('.flex-viewport').height(sliderHeight);

            slider.find('.flex-viewport').data('height', sliderHeight + 1);
            slider.find('.item').each(function () {
              var deltaSliderHeight = jQuery(this).find('.bottom-block').outerHeight();
              jQuery(this).data('delta_height', deltaSliderHeight);
            });

            jQuery(slider).each(function () {
              if (jQuery(this).closest('.staff-type-2').length) {
                HoverStaffSliderItem(jQuery(this).closest('.staff-type-2'));
              }
            });
          }
        }
      }
    } catch (e) {
    } finally {
      ignoreResize.pop();
    }
  })

  jQuery(window).on('onSlide', function (eventdata) {
    try {
      ignoreResize.push(true);
      if (eventdata) {
        var slider = eventdata.slider;
        if (slider) {
          // add classes .curent & .shown to slide
          slider.find('.item').removeClass('current');
          var curSlide = slider.find('.item.flex-active-slide');
          var curSlideId = curSlide.attr('id');
          curSlide.addClass('current');

          //slider.find('.item').css('opacity', '1');

          if (curSlide.hasClass('shown')) {
            slider.find('.item.clone[id=' + curSlideId + '_clone]').addClass('shown');
          }

          curSlide.addClass('shown');
          //slider.resize();

          // set main banners text vertical center
          CheckMainBannerSliderVText(slider);

          //video
          var videoAutoPlay = curSlide.attr('data-video_autoplay')
          var bVideoAutoPlay = videoAutoPlay == 1

          if (typeof (window["players"]) == 'object' && curSlide.length) // pause video
          {
            for (var j in window["players"]) {
              var curVideoSlide = jQuery('iframe[id=' + window["players"][j].id + ']').closest('.item'),
                videoPlayer = curVideoSlide.attr('data-video_player'),
                bVideoPlayerYoutube = videoPlayer === 'YOUTUBE',
                bVideoPlayerVimeo = videoPlayer === 'VIMEO';

              if (!curVideoSlide.hasClass('current') && bVideoPlayerYoutube) {
                window[window["players"][j].id].pauseVideo();
              }
            }
          }

          if (bVideoAutoPlay) {
            startMainBannerSlideVideo(curSlide)
          }
          if (!slider.find('.flex-control-nav li').length && slider.hasClass('normal')) {
            slider.find('.flex-direction-nav li a').addClass('flex-disabled');
          }

          if (!slider.hasClass('flexslider-init-slice') && slider.hasClass('nav-title') && jQuery('.gallery-block').closest('.tab-pane').hasClass('active')) {
            slider.find('.item').sliceHeight({'lineheight': -3});
            slider.addClass('flexslider-init-slice');
          }
          if (slider.find('.flex-direction-nav').length) {
            if (slider.find('.flex-direction-nav').find('a.flex-disabled').length)
              slider.find('.flex-direction-nav').removeClass('opacity1').addClass('opacity0');
            else
              slider.find('.flex-direction-nav').removeClass('opacity0').addClass('opacity1');
          }

          if (slider.closest('.galerys-block').find('.title.big-gallery').length) {
            var indexActiveSlide = slider.data('flexslider').currentSlide + 1;
            slider.closest('.galerys-block').find('.title.big-gallery .slide-number').text(indexActiveSlide);
          }
        }
      }
    } catch (e) {
    } finally {
      ignoreResize.pop();
    }
  });

  jQuery(window).on('onSlideEnd', function (eventdata) {
    try {
      ignoreResize.push(true);
      if (eventdata) {
        var slider = eventdata.slider;
        if (slider) {

        }
      }
    } catch (e) {
    } finally {
      ignoreResize.pop();
    }
  });


  jQuery(window).resize(function () {
    SetFixedAskBlock();
    CheckTopMenuPadding();
    CheckTopMenuOncePadding();
    CheckSearchWidth();


    jQuery('.flexslider').each(function (indx) {
      var $this = jQuery(this);
      setTimeout(function () {

        if (!!$this.data('flexslider')) {
          var pluginOptions = $this.data('plugin-options'),
            indexActiveSlide = $this.data('flexslider').currentSlide,
            sliderHeight = $this.find('.item').eq(indexActiveSlide).outerHeight(true, true);

          if (pluginOptions.smoothHeight === true) {
            $this.find('.flex-viewport').height(sliderHeight);
          }
        }
      }, 300);
    });

    if (window.matchMedia('(min-width: 768px)').matches) {
      jQuery('.detail .tabs').each(function () {
        var $this = jQuery(this),
          indexTabActive = $this.find('.nav-tabs li.active').index();

        $this.find('.tab-pane').eq(indexTabActive).addClass('active');
        $this.find('.tab-pane').eq(indexTabActive).find('.toggle-block').show();
      });
    } else {
      jQuery('.detail .tabs').each(function () {
        var $this = jQuery(this),
          indexTabActive = $this.find('.nav-tabs li.active').index();

        $this.find('.tab-pane').each(function (indx) {
          if (jQuery(this).index() != indexTabActive) {
            jQuery(this).remove('active');
            jQuery(this).find('.toggle-block').hide();
          }
        });
      });
    }
  });

  jQuery(window).on('onSubmitForm', function (eventdata) {
    try {
      if (!window.renderRecaptchaById || !window.asproRecaptcha || !window.asproRecaptcha.key) {
        eventdata.form.submit();
        jQuery(eventdata.form).closest('.form').addClass('sending');
        return true;
      }
      if (window.asproRecaptcha.params.recaptchaSize == 'invisible' && typeof grecaptcha != 'undefined') {
        if (jQuery(eventdata.form).find('.g-recaptcha-response').val()) {
          eventdata.form.submit();
          jQuery(eventdata.form).closest('.form').addClass('sending');
        } else {
          grecaptcha.execute(jQuery(eventdata.form).find('.g-recaptcha').data('widgetid'));
          return false;
        }
      } else {
        console.log(jQuery(eventdata.form));
        eventdata.form.submit();
        jQuery(eventdata.form).closest('.form').addClass('sending');
      }

      return true;
    } catch (e) {
      console.error(e);
      return true;
    }
  });


  jQuery(document).on('click', function () {
    if (jQuery('.basket.fly').length && jQuery('.ajax_basket').hasClass('opened')) {
      jQuery('.ajax_basket').removeClass('opened');
    }
  });

  jQuery(document).on('click', '.basket.fly', function (e) {
    e.stopPropagation();
  });


  jQuery('.item-views.front.contacts .item .title').sliceHeight();
  jQuery('.item-views.front.contacts .item>.wrap').sliceHeight();

  jQuery('.item-views.staff-items.table-type-block .item .title').sliceHeight();
  jQuery('.item-views.staff-items.table-type-block .item .top-block-wrapper').sliceHeight();

  jQuery('.item-views.staff-items.table-type-block .item>.wrap>.wrap').sliceHeight();

  setTimeout(function () {
    jQuery('.table-type-block.item-views.staff-items.table-type-block .item').hover(function () {

        var block = jQuery(this).find('.bottom-block');
        block.show();
        var blockHeight = block.outerHeight(true, true);

        block.closest('.body-info').css('margin-top', -blockHeight);
      },
      function () {
        var block = jQuery(this).find('.bottom-block');
        block.closest('.body-info').css('margin-top', 0);
        //setTimeout(function(){
        block.hide();
        //}, 200);
      });
  }, 400);


  var headers = ["H2", "H3", "H4", "H5", "H6"];

  jQuery(".accordion").click(function (e) {
    var target = e.target,
      name = target.nodeName.toUpperCase();

    if (jQuery.inArray(name, headers) > -1) {
      var subItem = jQuery(target).next();

      //slideUp all elements (except target) at current depth or greater
      var depth = jQuery(subItem).parents().length;
      var allAtDepth = jQuery(".accordion p, .accordion-hide").filter(function () {
        if (jQuery(this).parents().length >= depth && this !== subItem.get(0)) {
          return true;
        }
      });
      jQuery(allAtDepth).slideUp("fast");

      //slideToggle target content and adjust bottom border if necessary
      subItem.slideToggle("fast");
      // jQuery(target).css({"border-bottom-right-radius":"0", "border-bottom-left-radius":"0"});
    }
  });

  const swiper = new Swiper('.swiper', {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
        centeredSlides: false,
      },
      1111: {
        slidesPerView: 3,
      },
    },
  });

  const swiperStuff = new Swiper('.stuff-slider', {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
        centeredSlides: false,
      },
      1111: {
        slidesPerView: 3,
      },
    },
  });

  function TemplateScript() {
    jQuery('.item-views.staff-items .items').each(function () {
      jQuery(this).find('.item .title').sliceHeight();
      jQuery(this).find('.item .top-block-wrapper').sliceHeight();
      jQuery(this).find('.item>.wrap>.wrap').sliceHeight('wrap');
    });

    jQuery('.item-views.staff-items .items .item').hover(function () {
        var block = jQuery(this).find('.bottom-block');
        block.show();
        var blockHeight = block.outerHeight(true, true);

        block.closest('.body-info').css('margin-top', -blockHeight);
      },
      function () {
        var block = jQuery(this).find('.bottom-block');
        block.closest('.body-info').css('margin-top', 0);
        block.hide();
      });
  }

  TemplateScript();
  jQuery(window).on('onCompleteActionComponent', function (eventdata, _this) {
    setTimeout(function () {
      console.log(1)
      TemplateScript();
    }, 50);
  });


});
