<link href="<?=asset_url('css/leaflet.css')?>" rel="stylesheet">
<script src="<?=asset_url('js/leaflet.js')?>"></script>
<script src="<?=asset_url("js/leaflet-gps.js")?>"></script>
<script>
    /*global wastemapComponent, L */
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
    var WastemapComponent = function(containerSelector){
        var wastemapComponent = this;
        /*Set up Webmap container*/
        wastemapComponent.wastemapContainer = $(containerSelector);
        var mapNumber = 'map-'+(new Date()).getTime();
        wastemapComponent.webMap =$("#pageComponentContainer .wastemap_component").clone().find(".mapHolder").attr("id", mapNumber);
        wastemapComponent.wastemapContainer.append(wastemapComponent.webMap);
        
        /*Initialize Webmap*/
        var osmUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
        osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> Banilad Waste Map',
        osm = L.tileLayer(osmUrl, {
            maxZoom: 20,
            attribution: osmAttrib
        });
        wastemapComponent.map = L.map(mapNumber).setView([10.343, 123.919], 16).addLayer(osm);// initialize the map on the "map" div with a given center and zoom
        wastemapComponent.map.addControl( new L.Control.Gps({autoActive:true}) );//inizialize control
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
        wastemapComponent.icon = {
            LGU : new pointers({iconUrl:'/wasteline/assets/images/lgu.png'}),
            garbage : new pointers({iconUrl:'/wasteline/assets/images/garbage.png'}),
            dumping_area : new pointers({iconUrl:'/wasteline/assets/images/dumpingarea.png'}),
            report : new pointers({iconUrl:'/wasteline/assets/images/report.png'}),
            service : new pointers({iconUrl:'/wasteline/assets/images/services.png'})
        }
        /*Banilad*/
        L.marker([10.339634, 123.922587], {icon: wastemapComponent.icon.LGU, title:"Brgy. Banilad Hall", alt: "Brgy. Banilad Hall", riseOnHover: true}).addTo(wastemapComponent.map);
        L.polyline(boundaries, {smoothFactor: 1, opacity: 1, weight: 2, fill: true, fillOpacity: 0.1, clickable: false}).addTo(wastemapComponent.map);

        /*Events*/
        // attaching function on map click
        wastemapComponent.map.on('click', function(e){
            wastemapComponent.onMapClick(e);
        });
        /*GPS*/
        
        
        wastemapComponent.onMapClick = function(e) {
            var geojsonFeature = {
                type: "Feature",
                properties: {},
                geometry: {
                    type: "Point",
                    coordinates: [e.latlng.lat, e.latlng.lng]
                }
            };

            var marker;
            L.geoJson(geojsonFeature, {
                pointToLayer: function(feature, latlng){  
                    marker = L.marker(e.latlng, {
                        title: "Dumping Site",
                        alt: "Dumping Site",
                        riseOnHover: true,
                        draggable: true,
                        icon: wastemapComponent.icon.dumping_area
                    }).bindPopup("<input type='button' value='Delete Marker' class='marker-delete-button'/>");
                    marker.on("popupopen", wastemapComponent.onPopupOpen);
                    return marker;
                }
            }).addTo(wastemapComponent.map);    
        };
        // Function to handle delete as well as other events on marker popup open
        wastemapComponent.onPopupOpen = function(){
            var tempMarker = this;
            //var tempMarkerGeoJSON = this.toGeoJSON();
            //var lID = tempMarker._leaflet_id; // Getting Leaflet ID of this marker
//            // To remove marker on click of delete
            $(".marker-delete-button:visible").click(function (){
                wastemapComponent.map.removeLayer(tempMarker);
            });
        };

        wastemapComponent.getUserLocation = function(){
            wastemapComponent.map.locate({watch: true}).on('locationfound', function(e){
                L.marker([e.latlng.lat, e.latlng.lng], {icon: wastemapComponent.icon.report, title:"yes!", alt: "yes!", riseOnHover: true}).addTo(wastemapComponent.map);
                var latlong = {
                        lat     : e.latlng.lat,
                        lng     : e.latlng.lng
                };
            }).on('locationerror', function(e){
               
            });
            wastemapComponent.map.stopLocate();
        };

        // function for displaying multiple markers on map
        wastemapComponent.addMarker = function(ID, mapMarkerType, associatedID, description, longitude, latitude){
            L.marker(
                [latitude, longitude], 
                {
                    title: description,
                    alt: description, 
                    riseOnHover: true, 
                    icon: wastemapComponent.icon.garbage
                }).addTo(wastemapComponent.map);
        }
        wastemapComponent.getUserLocation();
    };
</script>