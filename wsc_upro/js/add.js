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


	$(document).on('change', '#filter_posts input', function(e){
		e.preventDefault();

		/*let data = {
			'action': 'filter_posts',
			'cat': $('input[name=category]:checked').val(),
			'order': $('input[name=sort]:checked').val(),
		}*/

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: $("#filter_posts").serialize(),
			type: 'POST',
			success: function (data) {
				if (data) {
					$("#response_posts").html(data);
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