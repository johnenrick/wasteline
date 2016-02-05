<script>
	var wastePostContainer = {};

	$(document).ready(function(){
		$("#wl-btn-side-submit").click(function(){
			wastePostContainer.createWastePost();
		});
		$("#wl-btn-side-repost").click(function(){
			alert("nope!");
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

		console.log(waste_post_input);
	}
</script>