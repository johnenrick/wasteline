<link href="<?=asset_url('css/leaflet.css')?>" rel="stylesheet">
<script src="<?=asset_url('js/leaflet.js')?>"></script>
<script>
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
        var wastemapComponentObject = this;
        this.wastemapContainer = $(containerSelector);
        var mapNumber = 'map-'+(new Date()).getTime();
        this.wastemapContainer.append($("#pageComponentContainer .wastemap_component").clone().find(".mapHolder").attr("id", mapNumber));


        window.onload = new function(){ // "new function" instead of "function" for the map to be loaded
            // We’ll add a OSM tile layer to our map
            var osmUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
            osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> Banilad Waste Map',
            osm = L.tileLayer(osmUrl, {
                maxZoom: 20,
                attribution: osmAttrib
            });

            // initialize the map on the "map" div with a given center and zoom
            var map = L.map(mapNumber).setView([10.343, 123.919], 16).addLayer(osm);

            // attaching function on map click
            map.on('click', this.onMapClick);

            // Script for adding marker on map click
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

            var violetIcon  = new pointers({iconUrl:'/wasteline/assets/images/lgu.png'}),
                greenIcon   = new pointers({iconUrl:'/wasteline/assets/images/garbage.png'}),
                yellowIcon  = new pointers({iconUrl:'/wasteline/assets/images/dumpingarea.png'}),
                pinkIcon    = new pointers({iconUrl:'/wasteline/assets/images/report.png'}),
                blueIcon    = new pointers({iconUrl:'/wasteline/assets/images/services.png'});

            L.marker([10.339634, 123.922587], {icon: violetIcon, title:"Brgy. Banilad Hall", alt: "Brgy. Banilad Hall", riseOnHover: true}).addTo(map);
            L.polyline(boundaries, {smoothFactor: 1, opacity: 1, weight: 2, fill: true, fillOpacity: 0.1, clickable: false}).addTo(map);
            getUserLocation();
            retrieveMarker(waste_post);

            this.onMapClick = function(e) {
                var geojsonFeature = {
                    "type": "Feature",
                    "properties": {},
                    "geometry": {
                        "type": "Point",
                        "coordinates": [e.latlng.lat, e.latlng.lng]
                    }
                }

                var marker;
                L.geoJson(geojsonFeature, {
                    pointToLayer: function(feature, latlng){  
                        marker = L.marker(e.latlng, {
                            title: "Dumping Site",
                            alt: "Dumping Site",
                            riseOnHover: true,
                            draggable: true,
                            icon: yellowIcon
                        }).bindPopup("<input type='button' value='Delete Marker' class='marker-delete-button'/>");
                        marker.on("popupopen", this.onPopupOpen);
                        return marker;
                    }
                }).addTo(map);    
            }
            // Function to handle delete as well as other events on marker popup open
            this.onPopupOpen = function(){
                var tempMarker = this;
                //var tempMarkerGeoJSON = this.toGeoJSON();
                //var lID = tempMarker._leaflet_id; // Getting Leaflet ID of this marker
                // To remove marker on click of delete
                $(".marker-delete-button:visible").click(function (){
                    map.removeLayer(tempMarker);
                });
            }

            // function for getting the user's latlong
            function getUserLocation(){
                map.locate({watch: true}) /* This will return map so you can do chaining */
                    .on('locationfound', function(e){
                    L.marker([e.latlng.lat, e.latlng.lng], {icon: pinkIcon, title:"yes!", alt: "yes!", riseOnHover: true}).addTo(map);
                    map.stopLocate();
                })
                    .on('locationerror', function(e){
                    console.log(e);
                    map.stopLocate();
                });
            }

            // function for displaying multiple markers on map
            function retrieveMarker(locations){
                // api code
                for(var x in locations){
                    L.marker([locations[x].lat, locations[x].lng], {title:"Garbage ni", alt: "Garbage ni", riseOnHover: true, icon: greenIcon}).addTo(map); 
                }
            }
        }
    };
    
</script>