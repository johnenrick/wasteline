
<script src="<?=asset_url('js/wysiwyg.min.js')?>"></script>
<script src="<?=asset_url('js/wysiwyg-editor.min.js')?>"></script>
<script src="<?=asset_url('js/jquery.wysiwyg.js')?>"></script>
<script src="<?=asset_url('js/wl-info.js')?>"></script>
<script>
    var informationPage = {};
    
    informationPage.retrieveInformation = function(infoID){
    	var container = {};
    	if(infoID != 0) container.ID = infoID;
    	$.post(api_url("C_information/retrieveInformation"), container, function(data){
    		var response = JSON.parse(data);
    		if(!response["error"].length){
    			$(".wl-info-description").hide();
    			$(".wl-info-content").hide()
    			if(infoID == 0){
    				$(".information-count").text(response["data"].length);
    				for(var x in response["data"]){
    					var dummy = $("ul#informationList li.wl-list-dummy").clone().removeClass("wl-list-dummy");

		    			dummy.attr("informationid", response["data"][x]["ID"]);
		    			dummy.find('img').attr('data-name', response["data"][x]["description"]);
		                dummy.find('.wl-list-title').text(response["data"][x]["description"]);
		                dummy.find('.wl-list-sub span').attr('data-livestamp', response["data"][x]["datetime"]);
		                $('.wl-info-mainlist ul').append(dummy);
		                dummy.find('img.wl-info-box').initial();
	    			}
    			}else{
    				$(".wl-info-box img").attr("data-name", response["data"]["description"]);
    				$(".wl-info-title h2").text(response["data"]["description"]);
    				$(".wl-info-title h4 .wl-info-author").text(response["data"]["source"]);
    				$(".wl-info-title h4 .wl-info-stamp").attr("data-livestamp", response["data"]["datetime"]);

    				$("#wl-info-editor").html(response["data"]["detail"]);
    				$("#sampleid").initial();

    				if(user_type() == 2){
    					wysiwygEditor.readOnly(true);
    					$(".wysiwyg-toolbar-top").css("display", "none");
    				}

    				$(".wl-info-description").show();
    				$(".wl-info-content").show()
    			}
    		}
    	});
    }

    informationPage.updateInformation = function(container){

    }

    informationPage.deleteInformation = function(container){

    }

    //informationPage.find
    $(document).ready(function(){
    	informationPage.retrieveInformation(0);

    	$("#informationList").on("click", ".wl-list-infos", function(){
    		informationPage.retrieveInformation($(this).attr("informationid"));
    	});
    });
</script>