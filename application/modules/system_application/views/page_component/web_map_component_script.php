
<script src="<?=asset_url('js/leaflet.js')?>"></script>
<script src="<?=asset_url("js/leaflet-gps.js")?>"></script>
<script src="<?=asset_url("js/leaflet.label.js")?>"></script>
<script src="<?=asset_url("js/easy-button.js")?>"></script>
<script src="<?=asset_url("js/leaflet-heat.js")?>"></script>
<script src="<?=asset_url("js/leaflet.markercluster.js")?>"></script>
<script src="<?=asset_url("js/leaflet-search.src.js")?>"></script>



<script>
    /*global webMapComponent, L */
    var waste_post = [
                        [ 10.342615, 123.916554],
                        [ 10.343206, 123.914559],
                        [ 10.342995, 123.915331],
                        [ 10.342721, 123.916898],
                        [ 10.342003, 123.917842],
                        [ 10.342489, 123.920331],
                        [ 10.340061, 123.919258],
                        [ 10.337359, 123.920631]
    ];
    var boundaries = [  [10.351753, 123.916018],
                        [10.350694, 123.915531],
                        [10.340333, 123.912693],
                        [10.339323, 123.913082],
                        [10.338482, 123.914606],
                        [10.336712, 123.915270],
                        [10.336474, 123.917177],
                        [10.334833, 123.917631],
                        [10.332925, 123.919518],
                        [10.333841, 123.919955],
                        [10.332431, 123.922617],
                        [10.343744, 123.925821],
                        [10.351753, 123.916018]
    ];
    var WebMapComponent = function(containerSelector){
        var webMapComponent = this;
        /*Set up Webmap container*/
        webMapComponent.webMapContainer = $(containerSelector);
        var mapNumber = 'map-'+(new Date()).getTime();
        webMapComponent.webMap =$("#pageComponentContainer .web_map_component").clone().find(".mapHolder").attr("id", mapNumber);
        webMapComponent.webMapContainer.append(webMapComponent.webMap);
        
        /*Initialize Webmap*/
        var osmUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
        osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> Banilad Waste Map',
        osm = L.tileLayer(osmUrl, {
            maxZoom: 20,
            attribution: osmAttrib
        });
        webMapComponent.map = L.map(mapNumber).setView([10.343, 123.919], 16).addLayer(osm);
        webMapComponent.map.addControl( new L.Control.Gps({autoActive:false}) );
        /*Icons*/
        // Icon Properties
        var pointers = L.Icon.extend({
            options:{
                shadowUrl:'/wasteline/assets/images/marker-shadow.png',
                iconSize:     [25, 42], // size of the icon
                shadowSize:   [25, 30], // size of the shadow
                iconAnchor:   [13, 44], // point of the icon which will correspond to marker's location
                shadowAnchor: [8, 32],  // the same for the shadow
                popupAnchor:  [-12, -45] // point from which the popup should open relative to the iconAnchor
            }
        });
        /*Icon image*/
        webMapComponent.icon = {
            LGU : new pointers({iconUrl:'/wasteline/assets/images/lgu.png'}),
            garbage : new pointers({iconUrl:'/wasteline/assets/images/garbage.png'}),
            dumping_area : new pointers({iconUrl:'/wasteline/assets/images/dumpingarea.png'}),
            report : new pointers({iconUrl:'/wasteline/assets/images/report.png'}),
            service : new pointers({iconUrl:'/wasteline/assets/images/services.png'})
        };
        

        /*Events*/
        // attaching function on map click
        webMapComponent.map.on('click', function(e){
            webMapComponent.onMapClick(e);
        });
        /*GPS*/
        
        /*Variable*/
        webMapComponent.markerList = {}; //list of markers in the map
        
        webMapComponent.onMapClick = function(e) {
//            var geojsonFeature = {
//                type: "Feature",
//                properties: {},
//                geometry: {
//                    type: "Point",
//                    coordinates: [e.latlng.lat, e.latlng.lng]
//                }
//            };

//            var marker;
//            L.geoJson(geojsonFeature, {
//                pointToLayer: function(feature, latlng){  
//                    marker = L.marker(e.latlng, {
//                        title: "Dumping Site",
//                        alt: "Dumping Site",
//                        riseOnHover: true,
//                        draggable: true,
//                        icon: webMapComponent.icon.dumping_area
//                    }).bindPopup("<input type='button' value='Delete Marker' class='marker-delete-button'/>");
//                    marker.on("popupopen", webMapComponent.onPopupOpen);
//                    return marker;
//                }
//            }).addTo(webMapComponent.map);    
        };
        webMapComponent.onPopupOpen = function(){
        };
        webMapComponent.selectedLocation = false;
        webMapComponent.selectLocation = function(callBack){
            webMapComponent.onMapClick = function(e){
                if(webMapComponent.selectedLocation !== false){
                    webMapComponent.markerCluster.removeLayer(webMapComponent.selectedLocation);
                }
                console.log("hey");
                webMapComponent.selectedLocation = webMapComponent.addMarker(0, 5, 0, "Your Location", e.latlng.lng, e.latlng.lat, true);
                callBack({
                    lat : e.latlng.lat,
                    lng : e.latlng.lng
                });
                webMapComponent.selectedLocation.on('dragend', function(event) {
                    var marker = event.target;
                    var result = marker.getLatLng();
                    callBack({
                        lat : result.lat,
                        lng : result.lng
                    });
                });
            };
        };
        /**
        * Get the current location of the user, then pass the result to the callback 
        * @param {type} callBack
        * @returns {undefined}         *
        */
        webMapComponent.getCurrentLocation = function(callBack){
            webMapComponent.map.locate({watch: true}).on('locationfound', function(e){
                webMapComponent.map.stopLocate();
                var latlng = {
                    lat     : e.latlng.lat,
                    lng     : e.latlng.lng
                };
                callBack(latlng);
            }).on('locationerror', function(e){
                webMapComponent.map.stopLocate();
                callBack(false);
            });
        };
        /**
        * Indicate the current location of the user in the map
        * @param {function} callback called after getting the location
        * @returns {undefined}         
        */
        webMapComponent.indicateCurrentLocation = function(callback){
            webMapComponent.map.locate({watch: true}).on('locationfound', function(e){
                webMapComponent.addMarker(0, 5, 0, "Your Location in GPS", e.latlng.lng, e.latlng.lat);
                webMapComponent.map.stopLocate();
                webMapComponent.map.panTo(new L.LatLng(e.latlng.lat, e.latlng.lng));
                if(typeof callback !== "undefined"){
                    callback(e.latlng);
                }
            }).on('locationerror', function(e){
                webMapComponent.map.stopLocate();
            });
        };
        webMapComponent.setView = function(lat, lng){
            webMapComponent.map.panTo(new L.LatLng(lat, lng))
        };
        webMapComponent.markerCluster = L.markerClusterGroup({
            maxClusterRadius : 40
        });
        webMapComponent.map.addLayer(webMapComponent.markerCluster );
        webMapComponent.markersLayer = new L.LayerGroup();  //layer contain searched elements
        webMapComponent.map.addLayer(webMapComponent.markersLayer);
        /**
         * Add marker to map
         * 
         * @param {int} ID Map Marker ID from database
         * @param {int} mapMarkerType Type of the marker, 1 - user address, 2 - dumping location, 3 - report
         * @param {int} associatedID Foreign key
         * @param {string} description description of the marker
         * @param {double} longitude
         * @param {double} latitude
         * @param {boolean} draggable makes the markers draggable
         * @returns {undefined}         
         */
        webMapComponent.addMarker = function(ID, mapMarkerType, associatedID, description, longitude, latitude, draggable){
            
            if(typeof webMapComponent.markerList[ID] !== "undefined"){
                webMapComponent.markerCluster.removeLayer(webMapComponent.markerList[ID]);
            }
            if(webMapComponent.selectedLocation !== false && mapMarkerType*1 ===5){
                webMapComponent.markerCluster.removeLayer(webMapComponent.selectedLocation);
            }
            var markerOption = {
                title:description,
                map_marker_type_ID : mapMarkerType,
                associated_ID : associatedID,
                riseOnHover: true,
                draggable : (typeof draggable === "undefined") ? false : draggable
            };
            var labelOption = {
                noHide : false,
                opacity:1, 
                offset: [10, -35], 
                direction : "right"
            };
            switch(mapMarkerType){
                case 1: //user address
                    markerOption.icon = webMapComponent.icon.garbage;
                    labelOption.className = "markerLabel";
                    break;
                case 2: //Dumping Location
                    markerOption.icon = webMapComponent.icon.dumping_area;
                    break;
                case 3: //Report
                    markerOption.icon = webMapComponent.icon.report;
                    break;
                case 4: //User with Waste Service
                    markerOption.icon = webMapComponent.icon.service;
                    break;
                case 5: //Select Location
                    markerOption.icon = webMapComponent.icon.garbage;
                    break;
                case 6: //LGU
                    markerOption.icon = webMapComponent.icon.LGU;
                    labelOption.className = "markerStaticLabel";
                    labelOption.noHide = true;
                    break;
            }
            webMapComponent.markerList[ID] = new L.Marker([latitude, longitude], markerOption);
            webMapComponent.markerList[ID].bindLabel(description, labelOption);
            webMapComponent.markersLayer.addLayer(webMapComponent.markerList[ID]);
            webMapComponent.markerCluster.addLayer(webMapComponent.markerList[ID]);
            if(mapMarkerType*1 === 5){
                webMapComponent.selectedLocation = webMapComponent.markerList[ID];
            }
            webMapComponent.markerCluster.refreshClusters();

            return webMapComponent.markerList[ID];
        };
        webMapComponent.removeMarkerList = function(ID){
          if(typeof webMapComponent.markerList[ID] !== "undefined"){
              webMapComponent.map.removeLayer(webMapComponent.markerList[ID]);
              return true;
              
          }else{
              return false;
          }
        };
        /*Banilad*/
        webMapComponent.addMarker(0, 6, 0, "Brgy. Banilad Hall", 123.922587, 10.339634, false);
        /*Initialize plug in*/
        L.polyline(boundaries, {smoothFactor: 1, opacity: 1, weight: 2, fill: true, fillOpacity: 0, clickable: false, color: "#50c14e"}).addTo(webMapComponent.map);
        /**
         * A function to be called after clicking the marker button
         * @type Arguments
         */
        webMapComponent.getCurrentLocationCallBack = function(latlng){
            
        };
        L.easyButton('<span class="fa fa-map-marker" style="font-size:20px;color:green"></span>', function(){
            webMapComponent.indicateCurrentLocation(webMapComponent.getCurrentLocationCallBack);
        }).addTo( webMapComponent.map );
        L.heatLayer(waste_post).addTo(webMapComponent.map);
        //search
        
        webMapComponent.controlSearch = new L.Control.Search({layer: webMapComponent.markersLayer, initial: false, position:'topright'});
        webMapComponent.map.addControl( webMapComponent.controlSearch );
    };

       
</script>