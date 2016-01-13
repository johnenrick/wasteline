
<script>
    var WastemapComponent = function(containerSelector){
        var wastemapComponentObject = this;
        this.wastemapContainer = $(containerSelector);
        var mapNumber = 'map'+(new Date()).getTime();
        this.wastemapContainer.append($("#pageComponentContainer .wastemap_component").clone().find(".mapHolder").attr("id", mapNumber));


       window.onload = function(){
            // We’ll add a OSM tile layer to our map
            
            var osmUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
                osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> Banilad Waste Map',
                osm = L.tileLayer(osmUrl, {
                maxZoom: 20,
                attribution: osmAttrib
                });
            // initialize the map on the "map" div with a given center and zoom
           
            var map = L.map(mapNumber).setView([10.343, 123.919], 16).addLayer(osm);
            console.log(mapNumber);

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

            var violetIcon = new pointers({iconUrl:'/wasteline/assets/images/lgu.png'}),
                greenIcon = new pointers({iconUrl:'/wasteline/assets/images/garbage.png'}),
                yellowIcon = new pointers({iconUrl:'/wasteline/assets/images/dumpingarea.png'}),
                pinkIcon = new pointers({iconUrl:'/wasteline/assets/images/report.png'}),
                blueIcon = new pointers({iconUrl:'/wasteline/assets/images/services.png'});
         
                L.marker([10.339634, 123.922587], {icon: violetIcon, title:"Brgy. Banilad Hall", alt: "Brgy. Banilad Hall", riseOnHover: true}).addTo(map);
                L.marker([10.330432, 123.921994], {icon: blueIcon, title:"Junk Shop", alt: "Junk Shop", riseOnHover: true}).addTo(map);
                L.marker([10.337708, 123.935018], {icon: blueIcon, title:"Bakilid Junk Shop", alt: "Bakilid Junk Shop", riseOnHover: true}).addTo(map);
        
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
        }

            };
    
</script>