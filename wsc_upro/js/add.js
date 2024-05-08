jQuery(document).ready(function($) { 
	
	$('img.img-svg').each(function(){
		var $img = $(this);
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');
		$.get(imgURL, function(data) {
			var $svg = $(data).find('svg');
			if(typeof imgClass !== 'undefined') {
				$svg = $svg.attr('class', imgClass+' replaced-svg');
			}
			$svg = $svg.removeAttr('xmlns:a');
			if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
				$svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
			}
			$img.replaceWith($svg);
		}, 'xml');
	});


	$('.acc').on('click', window.interdeal.a11y.openMenu);


	$(document).on('change', '#filter_posts input', function(e){
		e.preventDefault();
		let _this = $(this);

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: $("#filter_posts").serialize(),
			type: 'POST',
			success: function (data) {
				if (data) {
					if($('.more_posts').length > 0) $('.more_posts').remove();
					$("#response_posts").html(data);
					window.history.pushState({}, "", _this.attr('data-url'));
					var animatedEls = document.querySelectorAll(".fade-up, .fade-in , .fade-up-wrapper > *, .block-text p, .block-text  li");
					animatedEls.forEach((el) => {
						gsap.to(el, {
							scrollTrigger: {
								trigger: el,
								start: "top 95%",
							},
							duration: 1,
							ease: "none",
							y: "0",
							opacity: 1,
						});
					});
				} else {
					console.log('Error!');
				}
			},
		});
		return false;
	});


	$(document).on('click', '.more_posts a', function(e){
		e.preventDefault();
		let _this = $(this); 

		let data = {
			'action': 'more_posts',
			'query': _this.attr('data-param-posts'),
			'page': this_page,
		}

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: data,
			type: 'POST',
			beforeSend: function() {
				$('.lds-dual-ring').css('display', 'block');
			},
			success:function(data){
				if (data) {
					$('.lds-dual-ring').css('display', 'inline-block');
					$('#response_posts .posts').append(data);
					var animatedEls = document.querySelectorAll(".fade-up, .fade-in , .fade-up-wrapper > *, .block-text p, .block-text  li");
					animatedEls.forEach((el) => {
						gsap.to(el, {
							scrollTrigger: {
								trigger: el,
								start: "top 95%",
							},
							duration: 1,
							ease: "none",
							y: "0",
							opacity: 1,
						});
					});

					this_page++;                      
					if (this_page == _this.attr('data-max-pages')) {
						_this.remove();              
					}
				} else {                              
					_this.remove();                    
				}
			},
			complete: function() {
				$('.lds-dual-ring').css('display', 'none');
			}
		});
	});


	$(document).on('change', 'select.locations, select.departments', function(e){
		e.preventDefault();

		let data = {
			'action': 'filter_jobs',
			'location': $('select.locations').val(),
			'department': $('select.departments').val(),
		}

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: data,
			type: 'POST',
			success: function (data) {
				if (data) {
					$("#response_jobs").html(data);
					var animatedEls = document.querySelectorAll(".fade-up, .fade-in , .fade-up-wrapper > *, .block-text p, .block-text  li");
					animatedEls.forEach((el) => {
						gsap.to(el, {
							scrollTrigger: {
								trigger: el,
								start: "top 95%",
							},
							duration: 1,
							ease: "none",
							y: "0",
							opacity: 1,
						});
					});
					document.querySelectorAll(".block-careers-list ul li").forEach((li) => {
						gsap.to(li.querySelector(".line"), {
							scrollTrigger: {
								trigger: li,
								start: "bottom 90%",
							},
							duration: 1,
							ease: "none",
							scaleX: 1,
						});
					});
				} else {
					console.log('Error!');
				}
			},
		});
		return false;
	});
	
});

if (data_add.home_url == window.location.href) {
	document.cookie = "is_first_time=true; path=/";
}