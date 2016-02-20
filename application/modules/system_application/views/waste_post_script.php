<script>
	var wastePostContainer = {};
	$(document).ready(function(){
		wastePostContainer.retrieveWastePostCategory();
		
		$(".wl-btn-post, ul.wastePostTypeList li").click(function(){
	        wastePostContainer.retrieveWastePost(wastePostContainer.findWastePostType());
	    });
		/*$("#wl-btn-side-submit").click(function(){
			var waste_post_input = [];
			$("ul#post-container-list li.wl-show").each(function(){
				var container = {
					waste_post_type_ID 	: wastePostContainer.findWastePostType(),
					waste_category_ID 	: ($(this).find("#wastePostCategoryList").val())*1,
					description			: $(this).find(".wl-list-desciption").text(),
					quantity			: $(this).find(".wl-list-quantity").text(),
					price				: $(this).find(".wl-list-price").text(),
					quantity_unit_ID	: ($(this).find("#wastePostQuantityUnitList").val())*1
				}
				waste_post_input.push(container);
			});

			wastePostContainer.createWastePost(waste_post_input);
		});*/
		$(".wl-rectangle-add, #wl-btn-side-submit").click(function(){
			var last_li = $("ul#post-container-list li.wl-show").last();
			if(last_li.hasClass("wl-show") && !(last_li.attr("wastepostid"))){
				var container = {
					waste_post_type_ID 	: wastePostContainer.findWastePostType(),
					waste_category_ID 	: (last_li.find("#wastePostCategoryList").val())*1,
					description			: last_li.find(".wl-list-desciption").text(),
					quantity			: last_li.find(".wl-list-quantity").text(),
					price				: last_li.find(".wl-list-price").text(),
					quantity_unit_ID	: (last_li.find("#wastePostQuantityUnitList").val())*1
				}
				wastePostContainer.createWastePost(container, last_li);
			}
		});
		$("#wl-btn-side-repost").click(function(){
			alert();
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

	wastePostContainer.createWastePost = function(container, row){
		var apiUrl = "";
		var temp = {};

		apiUrl = (container.length > 0)? api_url("c_waste_post/batchCreateWastePost") : api_url("c_waste_post/createWastePost");
		temp = {"waste_post" : container};
		
		$.post(apiUrl, (container.length > 0)? temp : container, function(data){
			var response = JSON.parse(data);
			if(!response["error"].length){
				//$("ul#post-container-list li.wl-show").remove();
				if(row) row.attr("wastepostid", response["data"]);
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

	wastePostContainer.retrieveWastePost = function(wastePostTypeID){
		var d = new Date();
		var container = {
							"waste_post__account_ID"				: user_id(),
							"waste_post__waste_post_type_ID"		: wastePostTypeID,
							"greater_equal__waste_post__datetime" 	: ((new Date((d.getMonth() + 1) +" "+ d.getDate() + ", " + d.getFullYear() + " 00:00:00")).getTime())/1000,
							"lesser_equal__waste_post__datetime" 	: ((new Date((d.getMonth() + 1) +" "+ d.getDate() + ", " + d.getFullYear() + " 23:59:59")).getTime())/1000
						}

		$.post(api_url("C_waste_post/retrieveWastePost"), {condition: container}, function(data){
			var response = JSON.parse(data);
			if(!response["error"].length){
				for(var x in response["data"]){
					console.log(response["data"][x]);
					var dummy = $("#wl-rectangle-dummy").clone();
					dummy.attr("wastepostid", response["data"][x]["ID"]);
					dummy.find("#wastePostCategoryList").val(response["data"][x]["waste_category_ID"]);
					dummy.find(".wl-list-desciption").text(response["data"][x]["description"]);
					dummy.find(".wl-list-quantity").text(response["data"][x]["quantity"]);
					dummy.find(".wl-list-price").text(response["data"][x]["price"]);
					dummy.find("#wastePostQuantityUnitList").val(response["data"][x]["unit_ID"]);
					dummy.removeAttr('id').show();
			        $(dummy).insertBefore($("ul#post-container-list li").last()).addClass('wl-show');
			        /*setTimeout(function () {
			            dummy
			        }, 10);*/
				}
			}
		});
	}
</script>