export default function hamburderMenu(){
	// Sub menu positioning based on viewport width
	$(window).on("load resize", function(e){
		$("nav.navigation > ul > li ul").each(function(e){
			var $this = $(this);
			var $panjara = $(window).width();
			var $sigane = $this.outerWidth();
			var $mdebareoba = $this.offset();
			var $mdebareoba_left = $mdebareoba.left;
			var $jamshi = $sigane + $mdebareoba_left;
			if($jamshi > $panjara){
				$this.addClass("rtl");
			}else{
				$this.removeClass("rtl");
			}
		});
	});
	// Automatic select of horizontal menu of active items
	$("nav.navigation > ul > li ul li.active").parents("li").addClass("active");
	// Sub menu arrow
	$("nav.navigation > ul > li").each(function(){
		var $this = $(this);
		if($this.has("ul").length){
			$this.addClass("hasul");
		}
	});
	// Clone to responsive menu
	var clone = $("nav.navigation > ul").clone();
	$("div.resp_menu div.resp_menu_ul").html(clone);
	// Responsive menu
	$("div.resp_menu > div.resp_menu_toggle").on('click', function(){
		var resp_menu = $(this).next("div.resp_menu_ul");
		if(!resp_menu.hasClass("is-active")){
			$(this).addClass("resp_menu_toggled");
			//resp_menu.fadeIn(500);
			resp_menu.addClass('is-active');
		}else{
			$(this).removeClass("resp_menu_toggled");
			//resp_menu.fadeOut(500);
			resp_menu.removeClass('is-active');
		}
	});
	$("div.resp_menu ul li").has("ul").append('<div class="plus_minus"><em class="ri-arrow-down-s-line"></em></div>');
	$("div.resp_menu ul li div.plus_minus").on('click', function(){
		var resp_sub_menu = $(this).prev("ul");
		if(resp_sub_menu.is(":hidden")){
			$(this).addClass("plus_minus_toggled");
			resp_sub_menu.slideDown(400);
		}else{
			$(this).removeClass("plus_minus_toggled");
			resp_sub_menu.slideUp(400);
		}
	});
}