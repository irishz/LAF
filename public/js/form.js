$(document).ready (function(){
	$('#alert').hide();
	$('#btnClick').click(function(){
		$('#alert').slideToggle( "slow", function() {
		   // Animation complete.
		});
		window.scrollTo(0,0);
	})
});
