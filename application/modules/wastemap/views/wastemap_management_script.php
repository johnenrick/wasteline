<script>
    var wastemapManagement = {};
    
    wastemapManagement.initializeWastemapManagement = function(){
        wastemapManagement.webmap = new WebMapComponent("#wastemapContainer");
    };
    wastemapManagement.retrieveMapMarker = function(){
		var condition = {
				"associated_ID" 		: user_id(),
				"map_marker_type_ID" 	: 1
		};
		$.post(api_url("c_map_marker/retrieveMapMarker"), {"condition": condition}, function(data){
			var response = JSON.parse(data);

			for(var x in response["data"]){
				wastemapManagement.webmap.addMarker(response["data"][x]["ID"], 1, response["data"][x]["associated_ID"], "HOLAAAAA", response["data"][x]["longitude"], response["data"][x]["latitude"], 0);
			}
			
		});
	}
    $(document).ready(function(){

        load_page_component("web_map_component", wastemapManagement.initializeWastemapManagement);

        wastemapManagement.retrieveMapMarker();
    });

    
</script>
