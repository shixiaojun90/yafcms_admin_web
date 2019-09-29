	$(document).ready(
		function(){
	 		$(".caidan").click(
	 			function(){
				$('.yinnav').toggle(400);
				}
	 		);
			$(".case .anli li").mouseover(
			function(){
				$(this).children().children('.name').css('display','block').parent().parent().siblings().children().children('.name').css('display','none');
				}
			);
			$(".case .anli li").mouseout(
				function(){
						$(this).children().children('.name').css('display','none')
					}
			);
			
			$(".con .news .tit span").mouseenter(
				function(){
						$(this).addClass('cur').siblings().removeClass('cur').parent().siblings().children().eq($(this).index()).css('display','block').siblings().css('display','none');
					}
			);
			
			var a=$('.jishutu').height();
			var b=$('.jishuwen').height();
			b=a;
			$(".jishuwen").height(b);
			
			
			$(".MD .viewport  dl").mouseenter(
				function(){
						$(this).addClass('cur');
					}
			);
			
			$(".MD .viewport  dl").mouseleave(
				function(){
						$(this).removeClass('cur');
					}
			);
			$(".anli .anlituwen  dl").mouseenter(
				function(){
						$(this).addClass('cur');
					}
			);
			
			$(".anli .anlituwen  dl").mouseleave(
				function(){
						$(this).removeClass('cur');
					}
			);
			$(".news .xuantit span").click(function(){
				$(this).addClass("cur").siblings().removeClass("cur").parent().siblings(".kanei").children().eq($(this).index()).show().siblings().hide();
						
				}
			);
/*			var win=$(window).width();
			var dl_kuan=win/6;
			var anlikuan=win*2;
			$("#scrollbar2 .overview").width(anlikuan);
			$("#scrollbar2 .overview dl").width(dl_kuan);
			*/
			var dl_win=$(".anli .anlituwen dl").width();
			$(".anli .anlituwen dd").width(dl_win);
			
			var dl_kuan=$("#scrollbar2 .overview dl").width()-20;
			$(".MD .viewport dd").width(dl_kuan);
			
			$(".jianjieka .tit span").click( function(){
					$(this).addClass('cur').siblings().removeClass("cur").parent().siblings().children().eq($(this).index()).show().siblings().hide();
				});		
			$(".newsnei .tit span").click(
					function(){
						$(this).addClass("cur").siblings().removeClass("cur").parent().siblings().children().eq($(this).index()).show().siblings().hide();
					}
			);
			
			
			$(window).scroll(
				function(){
					var topzhi = $(window).scrollTop();
					if(topzhi>0){
						$("header").addClass("xiao");
					}else{
						$("header").removeClass("xiao");
						}
				}
			)
		}
		
	);
