$(document).on('click','.add-to-cart',function(e){
	console.log("DA click");
	e.preventDefault();
	var parent = $(this).parents('.thumbnail');

	var cart=$(document).find('#cart-shop');

	var src=parent.find('img').attr('src');

	var parTop=parent.offset().top;
	var parLeft=parent.offset().left;
	$('<img />',{
		class: 'product-buy-now',
		src: src
	}).appendTo('body').css({
		'top': parTop,
		'left': parseInt(parLeft)+parseInt(parent.width())-50
	});
	//alert(src);

	setTimeout(function(){
		$(document).find('.product-buy-now').css({
			'top': cart.offset().top,
			'left':cart.offset().left
		});
		setTimeout(function(){
			$(document).find('.product-buy-now').remove();
		},1000);
	},500);
})