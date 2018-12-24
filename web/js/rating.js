jQuery(document).ready(function($) {
	var rating=1;
	$(".rating-wrap-post .fa").click(function(event) {
		/* Act on the event */
		var star = $(this);
		var value = star.attr("data-value");
		$(".highlight").removeClass('highlight');
		
		for(var i=1;i<=value;i++){
			$(".rating-wrap-post i:nth-child("+i+")").addClass('highlight');
		}
		rating = parseInt(value);

		$("#getsao").val(rating);
	});

	$(".rating-wrap-post .fa").hover(function() {
		/* Stuff to do when the mouse enters the element */
		var star = $(this);
		var value = star.attr("data-value");
		console.log(typeof(value));
		/*var position =int.Parse(value);*/
		$(".highlight").removeClass('highlight');
		
		for(var i=1;i<=value;i++){
			$(".rating-wrap-post i:nth-child("+i+")").addClass('highlight');
		}
		rating = parseInt(value);

		$("#getsao").val(rating);
	}, function() {
		/* Stuff to do when the mouse leaves the element */
	});
});