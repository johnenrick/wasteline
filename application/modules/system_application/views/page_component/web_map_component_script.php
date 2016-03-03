<script src="<?=asset_url('js/leaflet.js')?>"></script>
<script src="<?=asset_url("js/leaflet-gps.js")?>"></script>
<script src="<?=asset_url("js/leaflet.label.js")?>"></script>
<script src="<?=asset_url("js/easy-button.js")?>"></script>
<script src="<?=asset_url("js/leaflet-heat.js")?>"></script>
<script src="<?=asset_url("js/leaflet.markercluster.js")?>"></script>
<!--<script src="<?=asset_url("js/leaflet-search.src.js")?>"></script>-->
<script src="<?=asset_url("js/Control.OSMGeocoder.js")?>"></script>

<script>
    /*global webMapComponent, L */
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
                        [10.340486, 123.929999],
                        [10.351753, 123.916018]
    ];
    var WebMapComponent = function(containerSelector, config){
        var webMapComponent = this;
        /*Set up Webmap container*/
        webMapComponent.webMapContainer = $(containerSelector);
        var mapNumber = 'map-'+(new Date()).getTime();
        webMapComponent.webMap =$("#pageComponentContainer .web_map_component").clone().find(".mapHolder").attr("id", mapNumber);
        webMapComponent.webMapContainer.append(webMapComponent.webMap);
        
        /*Initialize Webmap*/
        var osmUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
        osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> Banilad Waste Map';
        webMapComponent.tileLayer = L.tileLayer(osmUrl, {
            maxZoom: 20,
            attribution: osmAttrib,
            
        });
        //Default Configuration
        config = (typeof config === "undefined") ? {} : config;
        config = {
            heat_layer : (typeof config.heat_layer === "undefined") ? false : config.heat_layer,
            gps_location : (typeof config.gps_location === "undefined") ? false : config.gps_location,
            search_location : (typeof config.search_location === "undefined") ? false : config.search_location,
        };
        
        webMapComponent.map = L.map(mapNumber, {doubleClickZoom : false}).setView([10.343, 123.919], 16).addLayer(webMapComponent.tileLayer);
        
        
        
        /*Icons*/
        /*Icon Properties*/
        var pointers = L.Icon.extend({
            options:{
                shadowUrl:asset_url('images/marker-shadow.png'),
                iconSize:     [25, 42], /* size of the icon*/
                shadowSize:   [25, 30], /* size of the shadow*/
                iconAnchor:   [25, 44], /* point of the icon which will correspond to marker's location*/
                shadowAnchor: [18, 32],  /* the same for the shadow*/
                popupAnchor:  [-12, -45] /* point from which the popup should open relative to the iconAnchor*/
            }
        });
        /*Icon image*/
        webMapComponent.icon = {
            LGU : new pointers({iconUrl:asset_url('images/lgu.png')}),
            garbage : new pointers({iconUrl:asset_url('images/garbage.png')}),
            dumping_area : new pointers({iconUrl:asset_url('images/dumpingarea.png')}),
            report : new pointers({iconUrl:asset_url('images/report.png')}),
            service : new pointers({iconUrl:asset_url('images/services.png')}),
            user_location : new pointers({iconUrl:asset_url('images/userlocation.png')})
        };
        
        /*Events*/
        /* attaching function on map click*/
        
        /*GPS*/
        webMapComponent.map.on("moveend", function(){
            //console.log(webMapComponent.map.getBounds());
        });
        /*Variable*/
        webMapComponent.markerList = {}; /*list of markers in the map*/
        
        
        webMapComponent.onPopupOpen = function(){
        };
        webMapComponent.selectedLocation = false;
        webMapComponent.selectLocation = function(callBack){
            if(typeof callBack !== "undefined"){
                webMapComponent.onMapClick = function(e){
                    console.log(e);
                    callBack({
                        lat : e.latlng.lat,
                        lng : e.latlng.lng
                    });
                };
            }
            webMapComponent.map.on('dblclick', function(e){
                webMapComponent.onMapClick(e);
            });
        };
        /*GPS Button*/
        if(config.search_location){
            webMapComponent.osmGeocoder = new L.Control.OSMGeocoder({collapsed : false, text:"Find"});
            webMapComponent.map.addControl(webMapComponent.osmGeocoder, {position: 'topright'});
        }
        if(config.gps_location){
            webMapComponent.map.addControl( new L.Control.Gps({autoActive:false}) );
            L.easyButton('<span class="fa fa-map-marker" style="font-size:20px;color:green"></span>', function(){
                webMapComponent.indicateCurrentLocation(webMapComponent.getCurrentLocationCallBack);
            }).addTo( webMapComponent.map );
        }
        webMapComponent.heatMapLayer = new L.FeatureGroup();
        webMapComponent.tileLayer.on("load", function(){
            if(config.heat_layer){
                webMapComponent.heatLayer = false;
                webMapComponent.heatLayer = L.heatLayer([], {maxZoom : 20, max : 0.5, gradient : {0.3: 'yellow', 0.65: 'orange', 1: 'red'} });
                webMapComponent.heatMapLayer.addLayer(webMapComponent.heatLayer);
            }
        });
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
        webMapComponent.isGettingGPS = false;
        webMapComponent.indicateCurrentLocation = function(callback){
            if(webMapComponent.isGettingGPS === false){
                webMapComponent.isGettingGPS = true;
                webMapComponent.map.locate({watch: true}).on('locationfound', function(e){
                    webMapComponent.isGettingGPS = false;
                    webMapComponent.map.stopLocate();
                    webMapComponent.map.panTo(new L.LatLng(e.latlng.lat, e.latlng.lng));
                    if(typeof callback !== "undefined"){
                        callback(e.latlng);
                    }
                }).on('locationerror', function(e){
                    webMapComponent.isGettingGPS = false;
                    webMapComponent.map.stopLocate();
                });
            }
        };
        webMapComponent.getViewBounds = function(){
            var bounds = webMapComponent.map.getBounds();
            return {
                north_east : bounds._northEast,
                south_west : bounds._southWest
            };
        }
        webMapComponent.setView = function(lat, lng){
            webMapComponent.map.setView([lat, lng],17);
        };
        webMapComponent.markerCluster = L.markerClusterGroup({
            maxClusterRadius : 40
        });
        webMapComponent.map.addLayer(webMapComponent.markerCluster );
        webMapComponent.markersLayer = new L.LayerGroup();  /*layer contain searched elements*/
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
        webMapComponent.addMarker = function(ID, mapMarkerType, associatedID, description, longitude, latitude, draggable, popUpContent){
            if(longitude === null || latitude === null || latitude === "" || longitude === ""){
                return false;
            }
            
            if(typeof webMapComponent.markerList[ID] !== "undefined" && mapMarkerType*1 !== 6){
                webMapComponent.removeMarkerList(ID);
            }
            var markerOption = {
                map_marker_ID : ID*1,
                map_marker_type_ID : mapMarkerType*1,
                associated_ID : associatedID*1,
                riseOnHover: true,
                draggable : (typeof draggable === "undefined") ? false : draggable,
                title : description
            };
            var labelOption = {
                noHide : false,
                opacity:1, 
                offset: [10, -35], 
                direction : "right"
            };
            switch(mapMarkerType*1){
                case 1: /*user address*/
                    markerOption.icon = webMapComponent.icon.garbage;
                    labelOption.className = "markerLabel";
                    break;
                case 2: /*Dumping Location*/
                    markerOption.icon = webMapComponent.icon.dumping_area;
                    break;
                case 3: /*Report*/
                    markerOption.icon = webMapComponent.icon.report;
                    break;
                case 4: /*User with Waste Service*/
                    markerOption.icon = webMapComponent.icon.service;
                    break;
                case 5: /*Select Location*/
                    markerOption.icon = webMapComponent.icon.user_location;
                    break;
                case 6: /*LGU*/
                    markerOption.icon = webMapComponent.icon.LGU;
                    labelOption.className = "markerStaticLabel";
                    labelOption.noHide = true;
                    break;
            }
            webMapComponent.markerList[ID] = new L.Marker([latitude*1, longitude*1], markerOption);
            webMapComponent.markerList[ID].bindLabel(description, labelOption);
            if(ID*1 === -1 || (markerOption.draggable) || mapMarkerType*1 === 5){
                webMapComponent.map.addLayer(webMapComponent.markerList[ID]);
            }else{
                webMapComponent.markerCluster.addLayer(webMapComponent.markerList[ID]);
                
            }
            if(mapMarkerType*1 === 5){
                webMapComponent.selectedLocation = webMapComponent.markerList[ID];
            }
            /*popup*/
            if(typeof popUpContent !== "undefined" && popUpContent){
                webMapComponent.markerList[ID].bindPopup(popUpContent);    
            }
            return webMapComponent.markerList[ID];
        };
        /**
         * Remove marker from the cluster layer or map layer
         * @param {type} ID
         * @returns {Boolean}
         */
        webMapComponent.removeMarkerList = function(ID, markerTypeID){
        
            if(typeof webMapComponent.markerList[ID] !== "undefined" && ID !== null){
                if(ID*1 === -1 || webMapComponent.markerList[ID].options.map_marker_type_ID === 5){
                    webMapComponent.mapRemoveMarkerList(ID);
                }else{
                    webMapComponent.markerCluster.removeLayer(webMapComponent.markerList[ID]);
                    delete webMapComponent.markerList[ID];
                }
              
              return true;
              
            }else if(typeof markerTypeID !== "undefined"){
              for(var x in webMapComponent.markerList){
                  if(webMapComponent.markerList[x].options.map_marker_type_ID*1 === markerTypeID*1){
                      webMapComponent.markerCluster.removeLayer(webMapComponent.markerList[x]);
                        delete webMapComponent.markerList[x];
                  }
              }
          }else{
              return false;
          }
        };
        /**
         * Remove Marker from the map layer
         * @param {type} ID
         * @returns {Boolean}
         */
        webMapComponent.mapRemoveMarkerList = function(ID){
          if(typeof webMapComponent.markerList[ID] !== "undefined"){
              webMapComponent.map.removeLayer(webMapComponent.markerList[ID]);
              delete webMapComponent.markerList[ID];
              
              return true;
              
          }else{
              return false;
          }
        };
        /**
         * Add a heat layer to the map
         * @param {type} latlng
         * @returns {undefined}
         */
        webMapComponent.addHeat = function(latlng){
            if(config.heat_layer){
                webMapComponent.heatLayer.addLatLng(latlng);
            }
            
        };
        /*Banilad*/
        
        webMapComponent.addMarker(-2, 6, 1, "Brgy. Banilad Hall", 123.922587, 10.339634, false);
        /*Initialize plug in*/
        L.polyline(boundaries, {smoothFactor: 1, opacity: 0.5, weight: 5, fill: true, fillOpacity: 0.0, clickable: false, color :"#50c14e"}).addTo(webMapComponent.map);
        /**
         * A function to be called after clicking the marker button
         * @type Arguments
         */
        webMapComponent.getCurrentLocationCallBack = function(latlng){
            
        };
        
        webMapComponent.map._onResize(); 
    };
</script>