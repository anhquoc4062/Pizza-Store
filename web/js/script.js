jQuery(document).ready(function($) {
	console.log("san sang");
	$(".shopping-item").hover(function() {
			$(".table_cart").addClass('hien');
			$(".table_cart").hover(function() {
				/* Stuff to do when the mouse enters the element */
			}, function() {
				/* Stuff to do when the mouse leaves the element */
				$(".table_cart").removeClass('hien');

			});
	}, function() {
		/* Stuff to do when the mouse leaves the element */
	});

	$(".contact_btn").click(function(event) {
		/* Act on the event */
		console.log("clicked");
		$("html,body").animate({scrollTop:$(".footer-bottom-area").offset().top}, 1000);
		return false;
	});

	$(".login-btn").click(function(event) {
		/* Act on the event */
		console.log("clicked");
		$(".login").addClass('hien-login');
	});

	$("#exit-login").click(function(event) {
		/* Act on the event */
		console.log("clicked");
		$(".login").removeClass('hien-login');
	});

});