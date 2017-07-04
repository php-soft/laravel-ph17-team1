$(window).ready(function (){
  
  var init = function(){
	popup();
	readProductData();
  };
  
	var popup = function(){
		$('.btn-view').on('click', function(){
			$('#quick-view-pop-up').fadeToggle();
			$('#quick-view-pop-up').css({"top":"-205px", "left":"-550px"});
			$('.mask').fadeToggle();
		});
		$('.mask').on('click', function(){
			$('.mask').fadeOut();
			$('#quick-view-pop-up').fadeOut();
		});
		$('.quick-view-close').on('click', function(){
			$('.mask').fadeOut();
			$('#quick-view-pop-up').fadeOut();
		});
	};
	var readProductData = function(){
		$.getJSON("winners.json", function(result){
			$.each(result, function(val){
				console.log(val.key);
			});
		});
	};
	init();
});
