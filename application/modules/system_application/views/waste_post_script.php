<script>
	var wastePostContainer = {};

	$(document).ready(function(){
		wastePostContainer.retrieveWastePostCategory();
		wastePostContainer.retrieveMapMarker();
		
		$("#wl-btn-side-submit").click(function(){
			var waste_post_input = [];
			$(".wl-rectangle-list").each(function(){
				var container = {
					waste_post_type_ID 	: wastePostContainer.findWastePostType(),
					waste_category_ID 	: ($(this).find("#wastePostCategoryList").val())*1,
					description			: $(this).find(".wl-list-desciption").text(),
					quantity			: $(this).find(".wl-list-quantity").text(),
					price				: $(this).find(".wl-list-price").text(),
					quantity_unit_ID	: ($(this).find("#wastePostQuantityUnitList").val())*1
				}
				
			});
			waste_post_input.splice(0, 1);

			wastePostContainer.createWastePost(waste_post_input);
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

	wastePostContainer.createWastePost = function(container){
		var apiUrl = "";
		var temp = {};

		apiUrl = (container.length > 0)? api_url("c_waste_post/batchCreateWastePost") : api_url("c_waste_post/createWastePost");
		temp = {"waste_post" : container};
		$.post(apiUrl, (container.length > 0)? temp : container[0], function(data){
			var response = JSON.parse(data);
			if(!response["error"].length){
				$("ul#post-container-list li.wl-show").remove();
			}
		});
	}

	wastePostContainer.retrieveWastePostCategory = function(){
		$.post(api_url("C_waste_category/retrieveWasteCategory"), {}, function(data){
			var response = JSON.parse(data);
			if(response["error"].length == 0){
				for(var x in response["data"]){
					$("#wastePostCategoryList").append("<option value='"+response["data"][x]["ID"]+"' >"+response["data"][x]["description"]+"</option>");
				}
			}
		});
	}

	wastePostContainer.findWastePostType = function(){
		return ($(".wastePostTypeList").find(".wl-active").attr("typeID"))*1;
	}

	wastePostContainer.retrieveMapMarker = function(){
		$.post(api_url("c_map_marker/retrieveMapMarker"), {}, function(data){
			var response = JSON.parse(data);
			console.log(response);
		});
	}
</script>