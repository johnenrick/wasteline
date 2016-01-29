<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WasteLine</title>

    <!-- Material Design fonts -->
    <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->

    <!-- Bootstrap CSS -->
    <link href="<?=asset_url('css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Material Design for Bootstrap -->
    <link href="<?=asset_url('css/roboto.min.css')?>" rel="stylesheet">
    <link href="<?=asset_url('/css/material-fullpalette.css')?>" rel="stylesheet">
    <link href="<?=asset_url('/css/ripples.min.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=asset_url('css/nav.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/simple-sidebar.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/linearicons.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/wl-custom.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/leaflet.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/style.css')?>" rel="stylesheet" type="text/css">
    <script src="<?=asset_url('js/leaflet.js')?>"></script>
    <script>
        window.onload = function(){
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
                                [10.343744, 123.925821],
                                [10.332431, 123.922617],
                                [10.333841, 123.919955],
                                [10.332925, 123.919518],
                                [10.334833, 123.917631],
                                [10.336474, 123.917177],
                                [10.336712, 123.915270],
                                [10.338482, 123.914606],
                                [10.339323, 123.913082],
                                [10.340333, 123.912693],
                                [10.350694, 123.915531],
                                [10.351753, 123.916018]
                            ];
            // We’ll add a OSM tile layer to our map
            var osmUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
                osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> Banilad Waste Map',
                osm = L.tileLayer(osmUrl, {
                maxZoom: 20,
                attribution: osmAttrib
                });
            // initialize the map on the "map" div with a given center and zoom
            var map = L.map('map').setView([10.343, 123.919], 16).addLayer(osm);
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
                L.polyline(boundaries, {smoothFactor: 1, opacity: 1, weight: 2, fill: true, fillOpacity: 0.1, clickable: false}).addTo(map);
                getUserLocation();
                retrieveMarker(waste_post);


        function getUserLocation(){
            map.locate({watch: true}) /* This will return map so you can do chaining */
                .on('locationfound', function(e){
                    L.marker([e.latlng.lat, e.latlng.lng], {icon: pinkIcon, title:"yes!", alt: "yes!", riseOnHover: true}).addTo(map);
                    map.stopLocate();
                })
                .on('locationerror', function(e){
                    console.log(e);
                });
        }
               
        function retrieveMarker(locations){
            // api code
            for(var x in locations){
                L.marker([locations[x].lat, locations[x].lng], {title:"Garbage ni", alt: "Garbage ni", riseOnHover: true, icon: greenIcon}).addTo(map); 
            }
        }
                
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
            this.onPopupOpen = function() {
            var tempMarker = this;
            //var tempMarkerGeoJSON = this.toGeoJSON();
            //var lID = tempMarker._leaflet_id; // Getting Leaflet ID of this marker
            // To remove marker on click of delete
                $(".marker-delete-button:visible").click(function (){
                map.removeLayer(tempMarker);
                    });
                }
        }
    </script>


</head>

<body>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#wasteline"><span class="lnr lnr-trash"></span></a>
                </li>
                <li>
                    <a href="#home"><span class="lnr lnr-home"></span></a>
                </li>
                <li>
                    <a href="/wasteline/template/map"><span class="lnr lnr-map"></span></a>
                </li>
                <li>
                    <a href="#articles-guidelines"><span class="lnr lnr-book"></span></a>
                </li>
                <li>
                    <a href="#user"><span class="lnr lnr-user"></span></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->



        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">

                    <!-- top -->
                    <div class="wl-top-nav col-xs-12 col-sm-12">

                        <div class="wl-top-grp col-sm-4">
                                <span class="wl-c-green-1">Wasteline</span>
                                <span class="wl-c-gray-1">&nbsp;|&nbsp;</span>
                                <span class="wl-c-black-1">Information</span>
                        </div>
                        <div class="wl-top-grp col-sm-4">
                            <span class="lnr lnr-calendar-full wl-c-green-1"></span>
                            <span class="wl-c-green-2 wl-date">--/--/--</span>
                            <span class="wl-c-green-3">&nbsp;|&nbsp;</span>
                            <span class="wl-c-green-1 wl-time">--:--</span>
                        </div>
                        <div class="wl-top-grp col-sm-4 no-padding">
                            <div class="col-sm-10 padding-top-15">
                                <div class="col-sm-12 no-padding">
                                    <span class="wl-c-green-4">Hi, <span class="wl-c-green-5">Yong Mercader</span></span>
                                </div>
                                <div class="col-sm-12 no-padding">

                                <div class="form-group">
                                    <div class="togglebutton">
                                      <label style="text-align:left;">
                                        <input type="checkbox" id="menu-toggle" checked="">
                                        <div class="btn-group">
                                          <a href="#" data-target="#" class="btn btn-default btn-raised dropdown-toggle" data-toggle="dropdown">
                                              <span class="lnr lnr-funnel"></span>
                                              <span>Filter&nbsp;</span>
                                              <span class="caret"></span>
                                          </a>
                                          <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0)">filter 1</a></li>
                                            <li><a href="javascript:void(0)">filter 2</a></li>
                                            <li><a href="javascript:void(0)">filter 3</a></li>
                                          </ul>
                                        </div>
                                      </label>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="col-sm-2 no-padding">
                                <div class="wl-btn-post unselectable">+</div>
                            </div>
                        </div>

                    </div>
                    <!-- end top -->

                    <!-- main content -->
                    <div id="map" data-mode="">
                        <input type="hidden" data-map-markers="" value="" name="map-geojson-data" />
                    </div>
                    <!-- end main content -->

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?=asset_url('js/jquery-2.1.4.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=asset_url('js/bootstrap.min.js')?>"></script>


    <!-- Material Design for Bootstrap -->
    <script src="<?=asset_url('js/material.js')?>"></script>
    <script src="<?=asset_url('js/ripples.min.js')?>"></script>
    <script>
      $.material.init();
    </script>

    <!-- Dropdown.js
    <script src="https://cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.js"></script>
    <script>
      $("#dropdown-menu select").dropdown();
    </script> -->

    <!-- Menu Toggle Script -->
    <script>
    $(document).ready(function(){
        $("#menu-toggle").change(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        function run_date_time(){
            var d = new Date();
            $('.wl-date').text((d.getMonth()+1)+'/'+d.getDate()+'/'+d.getFullYear().toString().substr(2,2));
            $('.wl-time').text(d.getHours()+':'+d.getMinutes());
            setTimeout(function(){run_date_time()}, 1000);
        }
        run_date_time();

    });
    </script>

</body>

</html>
