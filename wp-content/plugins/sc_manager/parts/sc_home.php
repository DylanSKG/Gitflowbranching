<?php
global $wpdb;
// include('components/css_selection.php');
include('global_function.php');

echo '<div id="uip">
    <img src="'. sc_URL . "assets/img/Sparing logo all.png".'" alt="">
    <p>This SC MANAGER version is not yet optimized for mobile. View on a laptop for the best experience.</p>
</div>';
?>

<!-- ---------------------------------------------------------------------------------------------------------App main bloc -->
<div class="welcome_page">
    <!-- -----------------------------------------------------------------------------------------------------App top bar -->
    <?php
    include('layouts/top_bar.php');
    ?>
    <!-- -----------------------------------------------------------------------------------------------------App main content -->
    <div style="display:non" class="sc_content">
        <?php include('layouts/main_left_bar.php'); ////include the header main left bar section 
        ?>

        <!-- -------------------------------------------------------------------------------------------------App main section (right) -->
        <div class="main_box">

            <!-- ---------------------------------------------------------------------------------------------___search bar section -->
            <div class="sc_search_form" action="">
                <h4>What are you looking for today?</h4>

                <div class="input-container">
                    <input type="text" name="sc_search_input" id="sc_search" placeholder="Search">
                    <i class="fas fa-search search-icon"></i>
                </div>
                <div id="search_results">
                </div>
                <!-- <input type="button" class="sc_search_btn" value="Search"> -->
                <div class="radio_bloc">
                    <div><input type="radio" checked="checked" value="ent" name="search_opt" id="opt_ent"><label for="opt_ent">Enterprises</label></div>
                    <div><input type="radio" value="emp" name="search_opt" id="opt_emp"><label for="opt_emp">Employees</label></div>
                    <input type="hidden" id="sc_from" name="sc_from" value="ent">
                </div>
                <!-- <span class="cancel_srch">x</i></span> -->
            </div>

            <!-- ---------------------------------------------------------------------------------------------___recent search section -->
            <div class="sc_result" id="sc_recent_search">
                <div id="sc_recent_ent" class="sc_recent_activ_srch">
                    <div class="load_sc_ent">

                        <!-- ---------------------------------------------------------------------------------________Recent enterprises section -->
                        <span class="sc_recent_activ_label">Recent enterprises searched</span>
                        <div class="sc_ent_bloc">
                            <ul id="sc_ent_list"><?php get_enterprise_names('business_name', 'ent_id'); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="sc_recent_emp" class="sc_recent_activ_srch">
                    <div class="load_sc_emp">

                        <!-- ---------------------------------------------------------------------------------________Recent employees sehomection -->
                        <span class="sc_recent_activ_label">Recent employees searched</span>
                        <div class="sc_emp_bloc">
                            <ul id="sc_emp_list"><?php get_employee(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <a href="<?php // echo home_url('/employee') . '?id=' . $i; 
                ?>">Njimo Afiro Johnson <img src="<?php //echo IMG . "/profil.png"; 
                                                    ?>" alt=""></a> -->
<script>
    $(document).ready(function() {
		
            if ($(window).width() > 768) {
                $("#uip").hide();
            }
        function render_search() {

            $('#search_results').fadeIn();
            if ($('#sc_search').val() == '') {
                
            } else {

                var query = $('#sc_search').val(); // Get the search query
                var from = $('#sc_from').val(); // Get the search query
                var home = 'home'; // Get the search query
                console.log(home);
                // var query = $(this).val(); // Get the search query

                // Perform an AJAX request to fetch data from the database
                $.ajax({
                    url: '<?php echo sc_URL . "parts/ajax/load_data.php"; ?>', // Replace with the URL of your server-side script
                    method: 'POST',
                    data: {
                        query: query,
                        from: from,
                        home: home
                    },
                    success: function(response) {
                        $('#search_results').html(response); // Display the loaded data in the specified div
                        // var children = $('#search_results').children();

                        var sortedChildren = $('#search_results').children().sort(function(a, b) {
                            var idA = $(a).attr('id');
                            var idB = $(b).attr('id');

                            if (idA.endsWith('1') && !idB.endsWith('1')) {
                                return 1; // Move element with "1" ID to the end
                                alert(idA);
                            } else if (!idA.endsWith('1') && idB.endsWith('1')) {
                                return -1; // Keep element with "1" ID before others
                            } else {
                                return 0; // Preserve original order for other elements
                            }
                        });

                        $('#search_results').append(sortedChildren);
                    },
                    error: function() {
                        $('#search_results').html('An error occurred'); // Display an error message
                    }
                });
            }
        }

        $('#sc_search_form').hide();
        $('#sc_search').keyup(function() {
            render_search();
        });
        $('#sc_search').click(function() {
            render_search();
        });
        $('#opt_ent').click(function() {
            render_search();
        });
        $('#opt_emp').click(function() {
            render_search();
        });

        var user_id = <?php echo $sc_user_id; ?>;


        $("a.srch_trk").click(function(event) {
            // event.preventDefault(); // Prevent default redirection
            console.log('client clicked');
            var idValue = $(this).attr("id");
            alert("Clicked ID: " + idValue);
        });


        $(document).on('click', function(event) {
            var $inside = $('.sc_search_form'); // Replace with the ID of your target div
            var $outside = $('#search_results'); // Replace with the ID of your target div
            var $target = $(event.target);

            // Check if the clicked element is outside of the target div
            if (!$target.closest($inside).length && !$target.is($inside)) {
                $('#search_results').fadeOut();
                console.log('Clicked outside of the div');
            } else {
                console.log('Clicked inside of the div');
            }
        });
    });
</script>