<script>
	var wastePostContainer = {};
	var pCounter = 0;
	var decimalCounter = 0;
	$(document).ready(function(){
		wastePostContainer.retrieveWastePostCategory();
		wastePostContainer.retrieveUnitList();
		
		$(".wl-btn-post, ul.wastePostTypeList li").click(function(){
			if ($("#wl-side-content").is(':visible') && $("ul#post-container-list li.wl-show").length == 0){
				$("#wl-btn-side-repost").button("loading");
				wastePostContainer.retrieveWastePost(wastePostContainer.findWastePostType());
		        //else $("ul#post-container-list li.wl-show").remove();
			}
			if(wastePostContainer.findWastePostType() != 1) $("#wl-btn-side-repost").hide();
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
					quantity			: (last_li.find(".wl-list-quantity").text())*1,
					price				: (last_li.find(".wl-list-price").text())*1,
					quantity_unit_ID	: (last_li.find("#wastePostQuantityUnitList").val())*1
				}
				//if(container.waste_post_type_ID != 0 && container.waste_category_ID != 0 && container.description != "Click to add Description" && container.quantity != "Quantity" && container.price != "Price" ) 
				$("#wl-btn-side-submit").button("loading");
				wastePostContainer.createWastePost(container, last_li);
			}
		});
		$("#wl-btn-side-repost").click(function(){
			$("#wl-btn-side-repost").button("loading");
			//var waste_post_input = [];
			$("ul#post-container-list li.wl-collected").each(function(){
				var container = {
					ID 				: $(this).attr("wastepostid"),
					condition		: {
						waste_post__account_ID 	: user_id()
					},
					updated_data 	: {
						status 		: 1
					}
				}
				//waste_post_input.push(container);
				wastePostContainer.updateWastePost(container);

			}).promise().done(function(){
				$(this).removeClass("wl-collected");
				$("#wl-btn-side-repost").button("reset");
			});
		});

		$("ul#post-container-list").on("blur", ".wl-list-desciption, .wl-list-quantity, .wl-list-price", function(){
			if($(this).parent().parent().attr("wastepostid") || $(this).parent().parent().parent().attr("wastepostid")){
				var id = $(this).parent().parent().attr("wastepostid") | $(this).parent().parent().parent().attr("wastepostid");
				var table_column = $(this).attr("holder");
				var container = {
					ID 				: id,
					condition		: {
						waste_post__account_ID 	: user_id()
					},
					updated_data 	: {}
				}
				container.updated_data[table_column] = $(this).text();
				wastePostContainer.updateWastePost(container);
			}
		});

		$("ul#post-container-list").on("click", "li.wl-collected div.circle", function(){
			var dummy = $(this).parent().parent();
			var container = {
				ID 				: dummy.attr("wastepostid"),
				condition		: {
					waste_post__account_ID 	: user_id()
				},
				updated_data 	: {
					status 		: 3
				}
			}
			wastePostContainer.updateWastePost(container);
			wastePostContainer.triggerComplete(dummy);
			setTimeout(function () {
	            dummy.remove();
	        }, 1000);
		});

		$("ul#post-container-list").on("click", ".deleteWastePost", function(){
			$("#wl-btn-side-repost").button("loading");
			$("#wl-btn-side-submit").button("loading");
			var dummy = $(this).parent().parent();
			if(dummy.attr("wastepostid")){
				wastePostContainer.deleteWastePost((dummy.attr("wastepostid"))*1, dummy);
			}else{
				dummy.remove();
				$("#wl-btn-side-repost").button("reset");
				$("#wl-btn-side-submit").button("reset");
			}
		});

		$("ul#post-container-list").on("keypress", ".wl-list-desciption, .wl-list-price", function(event){
			if(event.charCode === 13) return false;
		});
		$("ul#post-container-list").on("keypress", ".wl-list-price", function(event){
			/*if(event.charCode === 46 && pCounter > 0) return false;
			else pCounter++;*/
			console.log(event.charCode);
		});
	});

	wastePostContainer.createWastePost = function(container, row){
		//var apiUrl = "";
		//var temp = {};
		
		//apiUrl = (container.length > 1)? api_url("c_waste_post/batchCreateWastePost") : api_url("c_waste_post/createWastePost");
		//temp = {"waste_post" : container};
		
		$.post(api_url("c_waste_post/createWastePost"), container, function(data){
			var response = JSON.parse(data);
			if(!response["error"].length){
				//$("ul#post-container-list li.wl-show").remove();
				if(row) row.attr("wastepostid", response["data"]);
			}
		}).done(function(){
			$("#wl-btn-side-submit").button("reset");
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
	/*wastePostContainer.retrieveWastePostUnit = function(){
		var container = {
			condition 	: {
				unit__
			}
		}
		$.post(api_url("C_waste_category/retrieveWasteCategory"), {}, function(data){
			var response = JSON.parse(data);
			if(response["error"].length == 0){
				for(var x in response["data"]){
					$("#wastePostCategoryList").append("<option value='"+response["data"][x]["ID"]+"' >"+response["data"][x]["description"]+"</option>");
				}
			}
		});
	}*/

	wastePostContainer.findWastePostType = function(){
		return ($(".wastePostTypeList").find(".wl-active").attr("typeID"))*1;
	}

	wastePostContainer.retrieveWastePost = function(wastePostTypeID){
		var d = new Date();
		var container = {
			waste_post__account_ID				: user_id(),
			waste_post__waste_post_type_ID		: wastePostTypeID,
			not__waste_post__status				: 3
		}
		/*if(wastePostTypeID != 3){
			container.greater_equal__waste_post__datetime 	= ((new Date((d.getMonth() + 1) +" "+ d.getDate() + ", " + d.getFullYear() + " 00:00:00")).getTime())/1000,
			container.lesser_equal__waste_post__datetime 	= ((new Date((d.getMonth() + 1) +" "+ d.getDate() + ", " + d.getFullYear() + " 23:59:59")).getTime())/1000
		}*/

		$.post(api_url("C_waste_post/retrieveWastePost"), {condition: container}, function(data){
			var response = JSON.parse(data);
			if(!response["error"].length){
				for(var x in response["data"]){
					var dummy = $("#wl-rectangle-dummy").clone();

					dummy.attr("wastepostid", response["data"][x]["ID"]);
					if(response["data"][x]["status"] == 2) dummy.addClass("wl-collected");
					dummy.find("#wastePostCategoryList").val(response["data"][x]["waste_category_ID"]);
					dummy.find(".wl-list-desciption").text(response["data"][x]["description"]);
					dummy.find(".wl-list-quantity").text(response["data"][x]["quantity"]);
					dummy.find(".wl-list-price").text(response["data"][x]["price"]);
					dummy.find("#wastePostQuantityUnitList").val(response["data"][x]["unit_ID"]);
					dummy.removeAttr('id').show();
					//if(response["data"][x]["status"] == 3) wastePostContainer.triggerComplete(dummy); 
			        $(dummy).insertBefore($("ul#post-container-list li").last()).addClass('wl-show');
				}
			}
		}).done(function(){
			$("#wl-btn-side-repost").button("reset");
		});
	}

	wastePostContainer.isNumberInput = function(num){
		var charCode = (num.which) ? num.which : num.keyCode;
          if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) return false;

          return true;
	}

	wastePostContainer.updateWastePost = function(container){
		$.post(api_url("C_waste_post/updateWastePost"), container, function(data){
			var response = JSON.parse(data);
			if(!response["error"].length){
				
			}
		});
	}

	wastePostContainer.triggerComplete = function(row){
		row.removeClass("wl-collected").addClass("wl-confirmed");
		row.find(".wl-list-desciption, .wl-list-quantity, .wl-list-price").attr("contenteditable", false);
		row.find("#wastePostQuantityUnitList, #wastePostCategoryList").attr("disabled", "disabled");
	}

	wastePostContainer.deleteWastePost = function(id, row){
		$.post(api_url("C_waste_post/deleteWastePost"), {ID: id}, function(data){
			var response = JSON.parse(data);
			if(!response["error"].length){
				row.remove();
				$("#wl-btn-side-repost").button("reset");
				$("#wl-btn-side-submit").button("reset");
			}
		});
	}

	wastePostContainer.retrieveUnitList = function(){
		$.post(api_url("C_waste_category/retrieveUnit"), {}, function(data){
			var response = JSON.parse(data);
			if(response["error"].length == 0){
				for(var x in response["data"]){
					$("#wastePostQuantityUnitList").append("<option value='"+response["data"][x]["ID"]+"' >"+response["data"][x]["notation"]+"</option>");
				}
			}
		});
	}
</script>