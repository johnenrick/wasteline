<link href="<?=asset_url('css/leaflet.css')?>" rel="stylesheet">
<script src="<?=asset_url('js/leaflet.js')?>"></script>
<script src="<?=asset_url("js/leaflet-gps.js")?>"></script>
<script>
    /*global webMapComponent, L */
    var waste_post = [
                        {lat : 10.342615, lng : 123.916554},
                        {lat : 10.343206, lng : 123.914559},
                        {lat : 10.342995, lng : 123.915331},
                        {lat : 10.342721, lng : 123.916898},
                        {lat : 10.342003, lng : 123.917842},
                        {lat : 10.342489, lng : 123.920331},
                        {lat : 10.340061, lng : 123.919258},
                        {lat : 10.340082, lng : 123.923399},
                        {lat : 10.338668, lng : 123.920073},
                        {lat : 10.337359, lng : 123.920631}
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
        webMapComponent.map.addControl( new L.Control.Gps({autoActive:true}) );
        /*Icons*/
        // Icon Properties
        var pointers = L.Icon.extend({
            options:{
                shadowUrl:'/wasteline/assets/images/marker-shadow.png',
                iconSize:     [25, 42], // size of the icon
                shadowSize:   [25, 30], // size of the shadow
                iconAnchor:   [25, 44], // point of the icon which will correspond to marker's location
                shadowAnchor: [18, 32],  // the same for the shadow
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
        }
        /*Banilad*/
        L.marker([10.339634, 123.922587], {icon: webMapComponent.icon.LGU, title:"Brgy. Banilad Hall", alt: "Brgy. Banilad Hall", riseOnHover: true}).addTo(webMapComponent.map);
        L.polyline(boundaries, {smoothFactor: 1, opacity: 1, weight: 2, fill: true, fillOpacity: 0.1, clickable: false}).addTo(webMapComponent.map);

        /*Events*/
        // attaching function on map click
        webMapComponent.map.on('click', function(e){
            webMapComponent.onMapClick(e);
        });
        /*GPS*/
        
        /*Variable*/
        webMapComponent.markerList = {}; //list of markers in the map
        
        webMapComponent.onMapClick = function(e) {console.log("Test");
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
            var tempMarker = this;
            var tempMarkerGeoJSON = webMapComponent.toGeoJSON();
            //var lID = tempMarker._leaflet_id; // Getting Leaflet ID of this marker
            // To remove marker on click of delete
            $(".marker-delete-button:visible").click(function (){
                webMapComponent.map.removeLayer(tempMarker);
            });
        };
        webMapComponent.selectedLocation = false;
        webMapComponent.selectLocation = function(callBack){
            webMapComponent.onMapClick = function(e){
                if(webMapComponent.selectedLocation !== false){
                    webMapComponent.map.removeLayer(webMapComponent.selectedLocation);
                }
                webMapComponent.selectedLocation = webMapComponent.addMarker(0, 5, 0, "Your Location", e.latlng.lng, e.latlng.lat, true);
                webMapComponent.map.addLayer(webMapComponent.selectedLocation);
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
        * @returns {undefined}         
        */
        webMapComponent.indicateCurrentLocation = function(){
            webMapComponent.map.locate({watch: true}).on('locationfound', function(e){
                L.marker([e.latlng.lat, e.latlng.lng], {icon: webMapComponent.icon.report, title:"yes!", alt: "yes!", riseOnHover: true}).addTo(webMapComponent.map);
                webMapComponent.map.stopLocate();
            }).on('locationerror', function(e){
                webMapComponent.map.stopLocate();
            });
        };
        
        /**
         * Add marker to map
         * 
         * @param {type} ID Map Marker ID from database
         * @param {type} mapMarkerType Type of the marker, 1 - user address, 2 - dumping location, 3 - report
         * @param {type} associatedID Foreign key
         * @param {type} description description of the marker
         * @param {type} longitude
         * @param {type} latitude
         * @returns {undefined}         
         */
        webMapComponent.addMarker = function(ID, mapMarkerType, associatedID, description, longitude, latitude, draggable){
            
            var markerOption = {
                title: description,
                alt: description, 
                map_marker_type_ID : mapMarkerType,
                associated_ID : associatedID,
                riseOnHover: true,
                draggable : (typeof draggable === "undefined") ? false : draggable
            };
//            LGU : new pointers({iconUrl:'/wasteline/assets/images/lgu.png'}),
//            garbage : new pointers({iconUrl:'/wasteline/assets/images/garbage.png'}),
//            dumping_area : new pointers({iconUrl:'/wasteline/assets/images/dumpingarea.png'}),
//            report : new pointers({iconUrl:'/wasteline/assets/images/report.png'}),
//            service : new pointers({iconUrl:'/wasteline/assets/images/services.png'})
            switch(mapMarkerType){
                case 1: //user address
                    markerOption.icon = webMapComponent.icon.garbage;
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
            }
            webMapComponent.markerList[ID] = new L.Marker([latitude, longitude], markerOption);
            webMapComponent.map.addLayer(webMapComponent.markerList[ID]);
            return webMapComponent.markerList[ID];
        }
    };
</script>