$(document).ready(function(){
	$(".input").on('input propertychange', function(){
		$.post(
			"/controller.php",
			{text: $(".input").val()},
			success,
			"html"
		);
		function success(data) {
			$(".result").html(data);
		}
	});
});