<script>
	var wastePostContainer = {};

	$(document).ready(function(){
		$("#wl-btn-side-submit").click(function(){
			wastePostContainer.createWastePost();
		});
		$("#wl-btn-side-repost").click(function(){
			alert("nope!");
		});

		$("#post-container-list").on("focus", ".wl-list-desciption", function(){
			var temp = "Click to add Description";
			if($(this).text() == temp) $(this).text("");
		});
		$("#post-container-list").on("blur", ".wl-list-desciption", function(){
			var temp = "Click to add Description";
			if($(this).text() == "") $(this).text(temp);
		});

		$("#post-container-list").on("focus", ".wl-list-quantity", function(){
			var temp = "Quantity";
			if($(this).text() == temp) $(this).text("");
		});
		$("#post-container-list").on("blur", ".wl-list-quantity", function(){
			var temp = "Quantity";
			if($(this).text() == "") $(this).text(temp);
		});

		$("#post-container-list").on("focus", ".wl-list-price", function(){
			var temp = "Price";
			if($(this).text() == temp) $(this).text("");
		});
		$("#post-container-list").on("blur", ".wl-list-price", function(){
			var temp = "Price";
			if($(this).text() == "") $(this).text(temp);
		});
	});

	wastePostContainer.createWastePost = function(){
		var waste_post_input = [];
		$(".wl-rectangle-list").each(function(){
			var container = {
				description	: $(this).find(".wl-list-desciption").text(),
				quantity	: $(this).find(".wl-list-quantity").text(),
				price		: $(this).find(".wl-list-price").text(),
				category	: $(this).find(".wl-list-category").text(),
			}
			waste_post_input.push(container);
		});

		waste_post_input.splice(0, 1);
	}
</script>