
<script src="<?=asset_url('js/wysiwyg.min.js')?>"></script>
<script src="<?=asset_url('js/wysiwyg-editor.min.js')?>"></script>
<script src="<?=asset_url('js/jquery.wysiwyg.js')?>"></script>
<script src="<?=asset_url('js/wl-info.js')?>"></script>
<script src="<?=asset_url('js/livestamp.min.js')?>"></script>
<script>
    var informationPage = {};

    informationPage.retrieveInformation = function(infoID, typeID){
        var container = {
            sort    : {
                datetime    : "desc"
            },
            condition   : {
                "type_ID"  : informationPage.findInformationType()
            }
        }
        if(infoID != 0) container.ID = infoID;
        else{
            if(user_type() == 2)
            container.condition = {
                "not__information__detail" : null
            }
        }
        $.post(api_url("C_information/retrieveInformation"), container, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                $(".wl-info-description").hide();
                $(".wl-info-content").hide();
                if(infoID == 0){
                    $(".information-count").text(response["data"].length);
                    for(var x in response["data"]){
                        var dummy = $("ul#informationList li.wl-list-dummy").clone().removeClass("wl-list-dummy").addClass("wl-list-infos");

                        dummy.attr("informationid", response["data"][x]["ID"]);
                        dummy.find('img').attr('data-name', response["data"][x]["description"]);
                        dummy.find('.wl-list-title').text(response["data"][x]["description"]);
                        dummy.find('.wl-list-sub span').attr('data-livestamp', response["data"][x]["datetime"]);
                        $('.wl-info-mainlist ul').append(dummy);
                        dummy.find('img.wl-info-box').initial();
                    }
                }else{
                    $(".wl-info-box img").attr("src", $("ul#informationList li.active").find("img").attr("src"));
                    $(".wl-info-title h2").text(response["data"]["description"]);
                    $(".wl-info-title h4 .wl-info-author").text(response["data"]["source"]);
                    $(".wl-info-title h4 .wl-info-stamp").attr("data-livestamp", response["data"]["datetime"]);
                    wysiwygEditor.setHTML(response["data"]["detail"]);

                    if(user_type() == 2){
                        wysiwygEditor.readOnly(true);
                        $(".wysiwyg-toolbar-top").css("display", "none");
                        $(".deleteHolder").hide();
                    }

                    $(".wl-info-description").show();
                    $(".wl-info-content").show();
                    $(".confimation-holder").hide();
                    $(".deleteButton").show();
                }
            }
        });
    }

    informationPage.updateInformation = function(container, holderNumber){ // 1 - HTML 2 - title, source
        $.post(api_url("C_information/updateInformation"), container, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                console.log(response["data"]);
                if(holderNumber == 2) $("ul#informationList li.active").find(".wl-list-title").text(container.updated_data.description);
            }
        }).done(function(){

        });
    }

    informationPage.deleteInformation = function(id){
        $.post(api_url("C_information/deleteInformation"), {ID: id}, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                $(".wl-info-description").hide();
                $(".wl-info-content").hide();
                $("ul#informationList li.active").remove();
                $(".information-count").text((($(".information-count").text())*1)-1);
            }
        });
    }

    informationPage.findInformationType = function(){
        return ($("#wl-header-menu").find("a.wl-active").attr("typeid"))*1;
    }

    $(document).ready(function(){
        informationPage.retrieveInformation(0, informationPage.findInformationType());
        if(user_type() == 2) $(".informationTick").hide();

        $(".submitButton-list").click(function(){
            wysiwygEditor.readOnly(true);
        });

        $("#informationList").on("click", ".wl-list-infos", function(){
            informationPage.retrieveInformation($(this).attr("informationid"));
        });

        /*$("textarea").change(function(){

        });*/

        $(".wl-info-title").on("blur", "h2, .wl-info-author", function(data){
            var container = {
                ID              : ($("ul#informationList li.active").attr("informationid"))*1,
                updated_data    : {}
            }
            container.updated_data[$(this).attr("holder")] = $(this).text();
            informationPage.updateInformation(container, 2);
        });

        $("textarea#wl-info-editor").blur(function(){
        //var myForm = $("#wl-content-form").serialize();

            var container = {
                ID              : ($("ul#informationList li.active").attr("informationid"))*1,
                updated_data    : {
                    detail      : $(this).val()
                }
            }
            informationPage.updateInformation(container, 1);
        });
        $('.wl-info-list').on('click','#wl-info-addbtn, .wl-info-li',function(){
            var w = $(window).width();
            if(w <= 720){
                $('.wl-info-list').fadeOut('fast');
                $('#wl-return-floating-btn').fadeIn();
            }
        });
        $('#wl-return-floating-btn').click(function(){
            $('#wl-return-floating-btn').fadeOut('fast');
            $('.wl-info-list').fadeIn();
        });
        $('#wl-info-modal').on('hidden.bs.modal', function (e) {
            var w = $(window).width();
            if(w <= 720){
                $('.wl-info-list').fadeIn();
                $('#wl-return-floating-btn').fadeOut('fast');
            }
        });

        $("#wl-header-menu").click(function(){
            $("#informationList .wl-list-infos").remove();
            informationPage.retrieveInformation(0, informationPage.findInformationType());
        });

        $(".deleteButton").click(function(){
            $(this).hide();
            $(".confimation-holder").show();
        });

        $(".buttonCancel").click(function(){
            $(".confimation-holder").hide();
            $(".deleteButton").show();
        });

        $(".buttonConfirm").click(function(){
            informationPage.deleteInformation(($("ul#informationList li.active").attr("informationid"))*1);
        });
    });
</script>
