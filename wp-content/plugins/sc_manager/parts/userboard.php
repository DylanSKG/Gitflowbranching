<?php
global $wpdb, $ent;
include(CSS . '/emp.css');
include(CSS . '/common.css');
include(CSS . '/userboard.css');
include('global_function.php');

$ent = 'enterprise';
$emp = 'employee';
?>

<!-- ---------------------------------------------------------------------------------------------------------App main bloc -->
<div class="welcome_page">
    <?php
    include('layouts/top_bar.php');
    ?>
    <!-- -----------------------------------------------------------------------------------------------------App main content -->
    <div style="display:non" class="sc_content">
        <?php include('layouts/main_left_bar.php'); ////include the header main left bar section 
        ?>

        <!-- -------------------------------------------------------------------------------------------------App main section (right) -->
        <div class="main_box">
            <div class="sc_column_box">
                <div class="sc_column_small">
                    <div class="sc_action">
                        <!-- -----------------------------------------------employee Payrate Account -->
                        <div class="sc_bloc action"><?php
//                                                     sc_action_buttons($del_icon, 'Delete this Enterprise', '?action=delete&id=' . $sel_emp_id, 'del no_border', ' ', '', 'del'); ?>
                        </div>
                    </div>
                    <div class="sc_column_profile">
                        <div class="sc_top_tabs view_em">
                            <label for="payrate" class="get_total" id="tot_ent">Total Enterprises <span class="counts_2">4</span> </label>
                        </div>
                    </div>

                    <div class="sc_column_brief_infos">
                        <div class="sc_top_tabs view_em">
                            <label for="payrate" class="get_total" id="tot_emp">Total Employees <span class="counts_2">100,000</span> </label>
                        </div>
                    </div>

                    <!-- ---------------------------------------------------Employee report -->
                    <div class="sc_bloc action bottom report">
                        <?php
//                         sc_action_buttons($report_icon, 'Generate report', '?action=report&id=' . $sel_emp_id, 'report', ' ', '', 'report');
                        ?>
                    </div>
                </div>

                <div class="sc_column_large">
                    <div class="sc_top_tabs">
                        <?php
                        sc_option_tabs('team', '', 'Teams', '');
                        ?>
                    </div>
                    <div class="sc_tab_render" id='emp_team'>

                        <div class="team_tabs">
                            <?php
                            ent_team($sc_user_id, 'NuVegan', '29', 'fa-archive', '', $crown_icon);
                            ?>

                        </div>
                        <div id="render_pa">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <a href="<?php // echo home_url('/Enterprise') . '?id=' . $i;  
                ?>">Njimo Afiro Johnson <img src="<?php //echo IMG . "/profil.png";  
                                                    ?>" alt=""></a> -->

<script>
    $(document).ready(function() {
        // Set a variable in local storage
        localStorage.setItem('sel_emp_id', '<?php echo $sel_emp_id; ?>');
        var sel_emp_id = localStorage.getItem('sel_emp_id');
        // alert(sel_emp_id);

        $('#sc_employers').change(function() {
            // $('#search_results').fadeIn();

            var get_value = $('#sc_employers').val(); // Get the search query
            var do_action = 'emp_ent'; // Get the location query
            // var location = 'emp_status'; // Get the location query
            console.log("Show " + do_action + " => " + get_value + " and edit " + location);



            // // Perform an AJAX request to fetch data from the database
            $.ajax({
                url: '<?php echo sc_URL . "parts/ajax/load_data.php"; ?>', // Replace with the URL of your server-side script
                method: 'POST',
                data: {
                    do_action: do_action,
                    get_value: get_value,
                    emp_id: sel_emp_id
                },
                success: function(response) {
                    $('div#render_es').html(response); // Display the loaded data in the specified div
                    // Employee status response data  
                    $('span#inp_access').text($('span#emp_access').text());
                    $('span#inp_status').text($('span#emp_status').text());
                    $('span#inp_start').text($('span#emp_start').text());
                    $('span#inp_end').text($('span#emp_end').text());
                    $('span#inp_reason').text($('span#emp_reason').text());
                    $('span#inp_lastday').text($('span#emp_lastday').text());
                    $('span#inp_abs_start').text($('span#emp_abs_start').text());
                    $('span#inp_abs_back').text($('span#emp_abs_back').text());

                    // Employee Tax information data  
                    $('span#inp_fed_ms').text($('span#emp_fed_ms').text());
                    $('span#inp_fed_all').text($('span#emp_fed_all').text());
                    $('span#inp_state_ms').text($('span#emp_state_ms').text());
                    $('span#inp_state_all').text($('span#emp_state_all').text());
                    $('span#inp_county_ms').text($('span#emp_county_ms').text());

                    // Employee Payroll Information data  
                    $('span#inp_w_email').text($('span#emp_w_email').text());
                    $('span#inp_contract').text($('span#emp_contract').text());
                    $('span#inp_pay_type').text($('span#emp_pay_type').text());
                    $('span#inp_pay_freq').text($('span#emp_pay_freq').text());
                    $('span#inp_home_dep_number').text($('span#emp_home_dep_number').text());
                    $('span#inp_home_dep_desc').text($('span#emp_home_dep_desc').text());
                    $('span#inp_pay_r_amt').text($('span#emp_pay_r_amt').text());
                    $('span#inp_pay_r_status').text($('span#emp_pay_r_status').text());
                    $('span#inp_ee_clas').text($('span#emp_ee_clas').text());
                    $('span#inp_doc_status').text($('span#emp_doc_status').text());
                },
                error: function() {
                    $('#render_ti').html('An error occurred'); // Display an error message
                }
            });

            var selectElement = $("#sc_employers");

            // Get the selected child <option> element
            var selectedOption = selectElement.find("option:selected");

            // Retrieve the ID of the selected option
            // var optionId = selectedOption.val(); // Using val() method
            // or
            var optionId = selectedOption.attr("class"); // Using attr() method

            var string = optionId;
            // var from = "_";
            // var to = ",";

            function custom_spliter(string, from, to, reverse = 0) {
                var lastIndex = string.lastIndexOf(from);

                if (reverse != 0) {
                    var result = string.substring(lastIndex + 1, string.indexOf(to, lastIndex));
                } else {
                    var result = string.split(from)[1].split(to)[0].trim();
                }
                return result;
            }
            ent_name = $('#sc_employers').val();
            ent_name = ent_name.st
            // alert($('#h_url').val());
            $('#go_to_ent').attr('href', $('#h_url').val() + "/enterprise/?id=" + custom_spliter(string, '_', ',', 0));
            $('#default_ent').text(custom_spliter(string, ',', '.', 0));
            // $('#default_ent').text($('#sc_employers').val());

        });

        // #team,#es,#ti,#pai,#ec 
        $('#team').addClass('active_tab');
        $('#team .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#team').click(function() {
            $('#emp_es,#emp_ti,#emp_pai,#emp_ec,#i_es,#i_ti,#i_pai,#i_ec').hide();
            $('#es,#ti,#pai,#ec').removeClass('active_tab');
            $('#team').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#team .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#emp_team,#i_team').fadeIn();
        });

        $('#es').click(function() {

            $('#emp_team,#emp_ti,#emp_pai,#emp_ec,#i_pa,#i_ti,#i_pai,#i_ec').hide();
            $('#team,#ti,#pai,#ec').removeClass('active_tab');
            $('#es').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#es .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#emp_es,#i_es').fadeIn();
        });

        $('#ti').click(function() {
            $('#emp_es,#emp_team,#emp_pai,#emp_ec,#i_es,#i_pa,#i_pai,#i_ec').hide();
            $('#team,#es,#pai,#ec').removeClass('active_tab');
            $('#ti').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#ti .sc_tab').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#emp_ti,#i_ti').fadeIn();
        });

        $('#pai').click(function() {
            $('#emp_es,#emp_ti,#emp_team,#emp_ec,#i_es,#i_ti,#i_pai,#i_ec').hide();
            $('#team,#es,#ti,#ec').removeClass('active_tab');
            $('#pai').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#pai .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#emp_pai,#i_pai').fadeIn();
        });

        $('#ec').click(function() {
            $('#emp_es,#emp_ti,#emp_pai,#emp_team,#i_es,#i_ti,#i_pai,#i_pa').hide();
            $('#team,#es,#ti,#pai').removeClass('active_tab');
            $('#ec').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#ec .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#emp_ec,#i_ec').fadeIn();
        });
    });
</script>