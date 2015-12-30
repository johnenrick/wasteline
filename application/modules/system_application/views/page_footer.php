
                    </div>
                    <!-- end main content -->

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    
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
