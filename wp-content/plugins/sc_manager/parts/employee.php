<?php
global $wpdb, $ent, $emp_id, $emp_name, $sel_emp_id, $status;
include('global_function.php');

@$ent = 'enterprise';
@$emp = 'employee';

if (strpos($current_url, 'employee') > 0) {
    foreach ($wpdb->get_results("SELECT emp_id, emp_archive FROM sc_work_for WHERE emp_id=$sel_emp_id") as $key => $row) {
        $i = 1;
        $i++;
        $emp_id = define_props($row, 'emp_id');
        $status = define_props($row, 'emp_archive');
    }

    if (strpos($current_url, $emp_id) == 0 || empty($emp_id)) { /* redirect to home */
        home();
    }
}
?>

<!-- ---------------------------------------------------------------------------------------------------------App main bloc -->
<div class="welcome_page">
    <input type="hidden" name="emp_id" id="orig_emp_id" value="<?php echo $sel_emp_id; ?>">

    <!-- -----------------------------------------------------------------------------------------------------App top bar -->
    <?php include('layouts/top_bar.php'); ////include the header main top bar section 
    ?>
    <!-- -----------------------------------------------------------------------------------------------------App main content -->
    <div style="display:non" class="sc_content">
        <!-- -------------------------------------------------------------------------------------------------App side bar (left) -->
        <?php include('layouts/main_left_bar.php'); ////include the header main left bar section 
        ?>
        <!-- -------------------------------------------------------------------------------------------------App main section (right) -->
        <div class="main_box">
            <div class="sc_column_box">
                <div class="sc_column_small">
                    <div class="sc_action">
                        <!-- -----------------------------------------------employee Payrate Account -->
                        <div class="sc_bloc action"><?php
                                                    if ($status == 0) {
                                                        sc_action_buttons(@$add_icon, 'Add new enterprise', '#?action=add&id=' . @$sel_emp_id, 'add no_border', ' ', '', 'add');
                                                        sc_action_buttons(@$del_icon, 'Delete this employee', '#?action=delete&id=' . @$sel_emp_id, 'del no_border', ' ', '', 'del');
                                                    } else {
                                                        sc_action_buttons('', 'Restore this employee', '#restore', 'del no_border', ' ', 'fa fa-recycle', 'restore');
                                                    }
                                                    ?>
                        </div>
                    </div>
                    <div class="sc_column_profile">
                        <img class="profil_medium" id="profil_medium" src="<?php echo IMG . "profil.png"; ?>'" alt="" srcset="">
                    </div>

                    <div class="sc_column_brief_infos">

                        <!-- -----------------------------------------------employee First & last Name -->
                        <span id="sc_names" class="sc_get_emp_name"><?php echo @$emp_name ?></span>

                        <!-- ENTERPRISE LIST -->

                        <!-- -----------------------------------------------EMPLOYEE WORK STATIONS -->
                        <div class="sc_blocs employers">
                            <<?php if ($status == 1) {
                                    echo "span";
                                } else {
                                    echo 'a';
                                } ?> id="go_to_ent" class="spacer" href="../<?php home_url('' . @$ent . '/?id='); ?>">
                                <label for="" class="employers" id="default_ent'"> <?php if ($status == 1) {
                                                                                        echo "Archived";
                                                                                    } ?></label>
                            </<?php if ($status == 1) {
                                    echo "span";
                                } else {
                                    echo 'a';
                                } ?>>

                            <?php
                            if ($status == 1) { ?>
                                <select id="sc_employers" title="view enteprise" value="" class="sc_get_emp_access none">
                                    <option id="ent_0" value="0" class="0">Select to restore</option>
                                    <?php deleted_emp_enterprise_list(@$emp_ent_id, @$sel_emp_id); ?>
                                </select>
                            <?php
                            } else { ?>
                                <select id="sc_employers" title="view enteprise" value="" class="sc_get_emp_access">
                                    <?php emp_enterprise_list(@$emp_ent_id, @$sel_emp_id); ?>
                                </select>
                            <?php }

                            ?>

                        </div>
                        <!-- -----------------------------------------------employee Phone number -->
                        <div class="sc_blocs">
                            <label for="phone">Phone Number</label>
                            <span id="sc_phone" class="sc_get_emp_phone"><?php echo @$emp_ptel ?></span>
                        </div>
                        <!-- -----------------------------------------------employee Email -->
                        <div class="sc_blocs">
                            <label for="email">Email</label>
                            <span id="sc_email" class="sc_get_emp_mail"><?php echo @$emp_email ?></span>
                        </div>
                        <!-- -----------------------------------------------employee SSN -->
                        <div class="sc_blocs">
                            <label id="ssn" for="ssn">Social Security Number</label>
                            <span id="sc_ssn" class="sc_get_emp_ssn"><?php echo @$emp_ssn_tin ?></span>
                        </div>
                        <!-- -----------------------------------------------employee Access -->
                        <div class="sc_blocs">
                            <label for="access">Employee Access</label>
                            <span id="sc_access" class="sc_get_emp_access"><?php echo @$emp_access ?></span>
                        </div>
                        <!-- -----------------------------------------------employee Payrate Account -->
                        <div class="sc_blocs">
                            <label for="payrate">Payrate Amount</label>
                            <span id="sc_get_prate_amt" class="sc_get_emp_access"><?php echo @$emp_pay_rate_amt ?></span>
                        </div>
                    </div>

                    <!-- ---------------------------------------------------Employee report -->
                    <div class="sc_bloc action bottom report">
                        <?php
                        sc_action_buttons(@$report_icon, 'Generate report', '?action=report&id=' . @$sel_emp_id, 'report', ' ', '', 'report');
                        ?>
                    </div>
                </div>

                <!-- ----------------------include the employee information form -->
                <?php include('get_employee.php'); ?>

                <!-- ----------------------include the employee edit  form -->
                <?php include('edit_employee.php'); ?>
                <!-- ----------------------include the employee edit  form -->
                <div id="del_response"></div>
            </div>
        </div>
    </div>
</div>
<script src="data_select_ent"></script>
<script>
    $(document).ready(function() {

        function custom_spliter(string, from, to, reverse = 0) {
            var lastIndex = string.lastIndexOf(from);

            if (reverse != 0) {
                var result = string.substring(lastIndex + 1, string.indexOf(to, lastIndex));
            } else {
                var result = string.split(from)[1].split(to)[0].trim();
            }
            return result;
        }

        var emp_id = custom_spliter(location.href, '=', '#');
        // alert(emp_id);

        $('#orig_emp_id').val(emp_id); // Get the employee id

        // Set a variable in local storage
        localStorage.setItem('sel_emp_id', '<?php echo $sel_emp_id; ?>');
        var sel_emp_id = localStorage.getItem('sel_emp_id');
        // alert(sel_emp_id);

        $('#default_ent').text($('#sc_employers option:first-child').text());
        $('#go_to_ent label').text($('#sc_employers option:first-child').text());



        $('#a_pa,#a_es,#a_ti,#a_pai,#a_ec').click(function() {

            $('#inp_e_es_2,#inp_e_es_3,#inp_e_es_5,#inp_e_es_6,#inp_e_es_7,#inp_e_pa_11').attr('type', 'text'); //conderting date type to text
            $('#inp_e_pa_0').val($('#inp_emp_fname').text());
            $('#inp_e_pa_1').val($('#inp_emp_adr1').text());
            $('#inp_e_pa_2').val($('#inp_sc_emp_lname').text());
            $('#inp_e_pa_3').val($('#inp_emp_adr2').text());
            $('#inp_e_pa_4').val($('#inp_emp_ptel').text());
            $('#inp_e_pa_5').val($('#inp_emp_city').text());
            $('#inp_e_pa_6').val($('#inp_emp_email').text());
            $('#inp_e_pa_7').val($('#inp_emp_state').text());
            $('#inp_e_pa_8').val($('#inp_emp_ssn_tin').text());
            $('#inp_e_pa_9').val($('#inp_emp_zip').text());
            $('#inp_e_pa_10').val($('#inp_emp_gender').text());
            $('#inp_e_pa_11').val($('#inp_emp_bdate').text());
            $('#inp_e_es_0').val($('#inp_access').text());
            $('#inp_e_es_1').val($('#inp_status').text());
            $('#inp_e_es_2').val($('#inp_start').text());
            $('#inp_e_es_3').val($('#inp_end').text());
            $('#inp_e_es_4').val($('#inp_reason').text());
            $('#inp_e_es_5').val($('#inp_lastday').text());
            $('#inp_e_es_6').val($('#inp_abs_start').text());
            $('#inp_e_es_7').val($('#inp_abs_back').text());
            $('#inp_e_ti_0').val($('#inp_fed_ms').text());
            $('#inp_e_ti_1').val($('#inp_fed_all').text());
            $('#inp_e_ti_2').val($('#inp_state_ms').text());
            $('#inp_e_ti_3').val($('#inp_state_all').text());
            $('#inp_e_ti_4').val($('#inp_work_state').text());
            $('#inp_e_ti_5').val($('#inp_county_ms').text());
            $('#inp_e_pai_0').val($('#inp_w_email').text());
            $('#inp_e_pai_1').val($('#inp_contract').text());
            $('#inp_e_pai_2').val($('#inp_pay_type').text());
            $('#inp_e_pai_3').val($('#inp_pay_freq').text());
            $('#inp_e_pai_4').val($('#inp_home_dep_number').text());
            $('#inp_e_pai_5').val($('#inp_home_dep_desc').text());
            $('#inp_e_pai_6').val($('#inp_pay_r_amt').text());
            $('#inp_e_pai_7').val($('#inp_pay_r_status').text());
            $('#inp_e_pai_8').val($('#inp_ee_clas').text());
            $('#inp_e_pai_9').val($('#inp_doc_status').text());
            $('#inp_e_nec_0').val($('#inp_ec_name').text());
            $('#inp_e_nec_1').val($('#inp_ec_tel').text());
            $('#inp_e_nec_2').val($('#inp_ec_email').text())

            // $('#inp_e_es_2').attr('type', 'date');

            $('#float_form_edit').fadeIn();
        });


        function inject_ent_link(ent_id) {
            def_ent_lnk = location.href;
            def_ent_lnk = custom_spliter(def_ent_lnk, '.', 'employee', 1) + "enterprise/?id=" + ent_id;
            console.log(def_ent_lnk);
            $('#go_to_ent').attr('href', def_ent_lnk);
        }

        function inject_emp_link(emp_id) {
            def_ent_lnk = location.href;
            def_ent_lnk = custom_spliter(def_ent_lnk, '.', 'enterprise', 1) + "employee/?id=" + emp_id;
            console.log(def_ent_lnk);
            $('#go_to_emp').attr('href', def_ent_lnk);
        }

        function backtohome(from, to, reverser) {
            def_ent_lnk = location.href;
            url = custom_spliter(def_ent_lnk, from, to, 0);
            location.href = url;
            // def_ent_lnk
        }

        var isLocalhost = (window.location.hostname === 'localhost');

        if (isLocalhost) {
            //insert the enterprise link to a reference selector
            inject_ent_link($('#sc_employers option:first-child').val());
            console.log('Website is running on localhost');
            // Perform localhost-specific actions
        } else {
            console.log('Website is running online');
            // Perform online-specific actions        //insert the enterprise link to a reference selector
            inject_ent_link($('#sc_employers option:first-child').val());
            $('#go_to_ent').attr('href', "/enterprise/?id=" + $('#ent_' + $('#sc_employers').val()).val());
        }

        $('#delete').click(function() {
            // alert('delete this ??');
            $('#del_response').html('<span class="action_status">Warning! Realy delete this employee ?</span><div class="message"><button id="view_emp" class="sc_btns">Yes<i class="fa fa-tick"></i></button><button id="close_this" class="sc_btns">Close<i class="fa fa-close"></i></button></div>').css('display', 'grid');

            // Cancel the delete action 
            $('#close_this').click(function() {
                $('#del_response').fadeOut().html();
            });

            // confirm the delete action 
            $('#view_emp').click(function() {
                //     // ==================== Ajax mirror getter ================================================
                $.ajax({
                    url: '<?php echo sc_URL . "parts/ajax/load_data.php"; ?>', // Replace with the URL of your server-side script
                    method: 'POST',
                    data: {
                        do_action: 'delete',
                        do_to: 'employee',
                        empid: sel_emp_id,
                        entid: $('#sc_employers').val(),
                    },
                    success: function(response) {

                        var ent_left = $('#sc_employers option').length;
                        // alert(ent_left);
                        if (ent_left > 1) {

                            current_link = location.href;

                            setTimeout(() => {
                                $('#del_response').html('<span class="action_status">Employee deleted successfully <br>from <span class="sc_enterprise_off">' + $('#default_ent').text() + '.</span></span>').slideDown();
                                $('#del_response').css('display', 'grid');
                            }, 300);

                            setTimeout(() => {
                                $('#del_response').slideToggle();
                                location.href = ''; // retrieve the enterprise Id
                            }, 3000);
                        } else if (ent_left <= 1) {
                            current_link = location.href;
                            $('#del_response').html('<span class="action_status">Employee Deleted successfully.</span><div class="message"><button id="close_this" class="sc_btns"> Return to home<i class="fa fa-home"></i></button></div>').slideDown();
                            $('#del_response').css('display', 'grid');

                            //add another new employee
                            setTimeout(() => {
                                $('#del_response').slideToggle();
                                $('#close_this').click(function() {});
                            }, 2500);

                            setTimeout(() => {
                                backtohome('http', 'scman');
                            }, 3000);
                        }

                        // setTimeout(() => {
                        //     location.href(inject_ent_link($('#ent_' + $('#sc_employers').val()).val())); // retrieve the enterprise Id
                        // }, 5000);
                    },
                    error: function() {
                        $('#render_ti').html('An error occurred'); // Display an error message
                    }
                });
            });
        });

        $('#sc_employers').change(function() {
            var get_value = $('#sc_employers').val(); // Get the search query
            var do_action = 'emp_ent'; // Get the location query

            // =========debugger commented ================================================
            // var location = 'emp_status'; // Get the location query
            // console.log("Show " + do_action + " => " + get_value + " and edit " + location);

            // ====================Ajax mirror getter================================================
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
                    $('span#sc_access').text($('span#emp_access').text());
                    $('span#inp_access').text($('span#emp_access').text());
                    $('span#inp_status').text($('span#emp_status').text());
                    $('span#inp_start').text($('span#emp_start').text());
                    $('span#inp_end').text($('span#emp_end').text());
                    $('span#inp_reason').text($('span#emp_reason').text());
                    $('span#inp_lastday').text($('span#emp_lastday').text());
                    $('span#inp_abs_start').text($('span#emp_abs_start').text());
                    $('span#inp_abs_back').text($('span#emp_abs_back').text());

                    // Employee Tax information data  
                    // $('span#inp_fed_ms').text($('span#emp_fed_ms').text());
                    $('span#inp_fed_all').text($('span#emp_fed_all').text());
                    // $('span#inp_state_ms').text($('span#emp_state_ms').text());
                    $('span#inp_state_all').text($('span#emp_state_all').text());
                    $('span#inp_county_ms').text($('span#emp_county_ms').text());

                    // Employee Payroll Information data  
                    $('span#inp_w_email').text($('span#emp_w_email').text());
                    $('span#inp_contract').text($('span#emp_contract').text());
                    $('span#inp_pay_type').text($('span#emp_pay_type').text());
                    $('span#inp_pay_freq').text($('span#emp_pay_freq').text());
                    // $('span#inp_home_dep_number').text($('span#emp_home_dep_number').text());
                    // $('span#inp_home_dep_desc').text($('span#emp_home_dep_desc').text());
                    $('span#inp_pay_r_amt').text($('span#emp_pay_r_amt').text());
                    $('span#sc_get_prate_amt').text($('span#emp_pay_r_amt').text());
                    $('span#inp_pay_r_status').text($('span#emp_pay_r_status').text());
                    $('span#inp_ee_clas').text($('span#emp_ee_clas').text());
                    $('span#inp_doc_status').text($('span#emp_doc_status').text());
                },
                error: function() {
                    $('#render_ti').html('An error occurred'); // Display an error message
                }
            });

            var string = $('#sc_employers').val();
            // alert($('#ent_' + $('#sc_employers').val()).text());
            $('#default_ent').text($('#ent_' + $('#sc_employers').val()).text());

            // alert($('#h_url').val());
            $('#go_to_ent').attr('href', $('#h_url').val() + "/enterprise/?id=" + $('#ent_' + $('#sc_employers').val()).val());

        });

        // ====================================== Restoration process starts here ============================================
        // =========================================== smooth show infos =====================================================
        $('#do_restore').click(function() {
            $('#sc_employers').slideDown(300);

            $('#sc_employers').change(function() {
                // alert($('#ent_' + $('#sc_employers').val()).text());
                $('#go_to_ent label').text($('#ent_' + $('#sc_employers').val()).text());
            });

            $('#go_to_ent').click(function(event) {
                // event.preventDefault(); // Prevent the default click action
                var action = 'restore';
                var emp_id = $('#orig_emp_id').val();
                var ent_id = $('#ent_' + $('#sc_employers').val()).val();
                console.log('action' + action + 'emp_id' + emp_id + 'ent_id' + ent_id);
                // ====================Ajax mirror getter================================================
                // Perform an AJAX request to fetch data from the database
                $.ajax({
                    url: '<?php echo sc_URL . "parts/ajax/emp_ajax.php"; ?>', // Replace with the URL of your server-side script
                    method: 'POST',
                    data: {
                        action: 'restore',
                        emp_id: emp_id,
                        ent_id: ent_id,
                    },
                    success: function(response) {
                        // alert('success');
                        current_link = location.href;

                        setTimeout(() => {
                            $('#del_response').html('<span class="action_status">Employee Restored successfully <br>to <span class="sc_enterprise_off">' + $('#go_to_ent label').text() + '</span></span>').slideDown();
                            $('#del_response').css('display', 'grid');
                        }, 300);

                        setTimeout(() => {
                            $('#del_response').slideToggle();
                            location.href = ''; // retrieve the enterprise Id
                        }, 3000);
                    },
                    error: function() {
                        $('#search_results').html('An error occurred'); // Display an error message
                    }
                });

            });

            // $('#sc_employers').click();
            // $('#sc_employers').change(function() {
            //     alert($('#sc_employers').val());
            // });
        });
        // ====================================== End of Restoration process =================================================

        $('#save_emp').click(function() {
            // $('#search_results').fadeIn();

            var ent_id = $('#sc_employers').val();
            var emp_id = $('#orig_emp_id').val();

            var from = 'edit_emp'; // Get the location query
            // alert('data from "' + from + '" are, ent_id = ' + ent_id + ' | emp_id = ' + emp_id);

            //  ============================================================================ new employee data

            //  ================================== personal information ======================================
            pa_0 = $('#inp_e_pa_0').val();
            pa_1 = $('#inp_e_pa_1').val();
            pa_2 = $('#inp_e_pa_2').val();
            pa_3 = $('#inp_e_pa_3').val();
            pa_4 = $('#inp_e_pa_4').val();
            pa_5 = $('#inp_e_pa_5').val();
            pa_6 = $('#inp_e_pa_6').val();
            pa_7 = $('#inp_e_pa_7').val();
            pa_8 = $('#inp_e_pa_8').val();
            pa_9 = $('#inp_e_pa_9').val();
            pa_10 = $('#inp_e_pa_10').val();
            pa_11 = $('#inp_e_pa_11').val();

            // ======================================= Emloyee Status ======================================
            es_0 = $('#inp_e_es_0').val();
            es_1 = $('#inp_e_es_1').val();
            es_2 = $('#inp_e_es_2').val();
            es_3 = $('#inp_e_es_3').val();
            es_4 = $('#inp_e_es_4').val();
            es_5 = $('#inp_e_es_5').val();
            es_6 = $('#inp_e_es_6').val();
            es_7 = $('#inp_e_es_7').val();

            //  ============================    ========== Tax Information ======================================
            ti_0 = $('#inp_e_ti_0').val();
            ti_1 = $('#inp_e_ti_1').val();
            ti_2 = $('#inp_e_ti_2').val();
            ti_3 = $('#inp_e_ti_3').val();
            ti_4 = $('#inp_e_ti_4').val();
            ti_5 = $('#inp_e_ti_5').val();

            //  ================================== Payroll Information ======================================
            pai_0 = $('#inp_e_pai_0').val();
            pai_1 = $('#inp_e_pai_1').val();
            pai_2 = $('#inp_e_pai_2').val();
            pai_3 = $('#inp_e_pai_3').val();
            pai_4 = $('#inp_e_pai_4').val();
            pai_5 = $('#inp_e_pai_5').val();
            pai_6 = $('#inp_e_pai_6').val();
            pai_7 = $('#inp_e_pai_7').val();
            pai_8 = $('#inp_e_pai_8').val();
            pai_9 = $('#inp_e_pai_9').val();
            //  ====================================== Emergency Contact  ======================================
            nec_0 = $('#inp_e_nec_0').val();
            nec_1 = $('#inp_e_nec_1').val();
            nec_2 = $('#inp_e_nec_2').val();
            edit_emp_id = $('#orig_emp_id').val();
            // alert(edit_emp_id);
            // render test
            // // console.log(pai_0);
            // var_cnt = [pa_0, pa_1, pa_2, pa_3, pa_4, pa_5, pa_6, pa_7, pa_8, pa_9, pa_10, pa_11];
            // for (i = 0; i < var_cnt.lenght; i++) {
            // alert(edit_emp_id);
            // }

            // Perform an AJAX request to fetch data from the database
            $.ajax({
                url: '<?php echo sc_URL . "parts/ajax/load_data.php"; ?>', // Replace with the URL of your server-side script
                method: 'POST',
                data: {
                    the_id: ent_id,
                    emp_id: emp_id,
                    edit_emp_id: edit_emp_id,
                    from: from,
                    pa_0: pa_0,
                    pa_1: pa_1,
                    pa_2: pa_2,
                    pa_3: pa_3,
                    pa_4: pa_4,
                    pa_5: pa_5,
                    pa_6: pa_6,
                    pa_7: pa_7,
                    pa_8: pa_8,
                    pa_9: pa_9,
                    pa_10: pa_10,
                    pa_11: pa_11,

                    es_0: es_0,
                    es_1: es_1,
                    es_2: es_2,
                    es_3: es_3,
                    es_4: es_4,
                    es_5: es_5,
                    es_6: es_6,
                    es_7: es_7,

                    ti_0: ti_0,
                    ti_1: ti_1,
                    ti_2: ti_2,
                    ti_3: ti_3,
                    ti_4: ti_4,
                    ti_5: ti_5,

                    pai_0: pai_0,
                    pai_1: pai_1,
                    pai_2: pai_2,
                    pai_3: pai_3,
                    pai_4: pai_4,
                    pai_5: pai_5,
                    pai_6: pai_6,
                    pai_7: pai_7,
                    pai_8: pai_8,
                    pai_9: pai_9,

                    nec_0: nec_0,
                    nec_1: nec_1,
                    nec_2: nec_2,

                },

                success: function(response) {
                    $('#edit_emp .sc_column_large,.decition_btn').hide();
                    $('#emp_edited').html(response).fadeIn(); // Display the loaded data in the specified div

                    // alert('Recieving information');


                    // view the newly created employee
                    $('#view_emp').click(function() {
                        location.href = "employee/?id=" + $('#new_emp_id').val();
                    });

                    //add another new employee
                    $('#close_this').click(function() {
                        $('.float_form,#emp_edited').fadeOut(200);
                        $('#emp_edited').html();
                        $('.sc_column_large,.decition_btn').show();
                        location.href = "";
                        $('.float_form').hide();
                    });

                    //close this layer and go back          
                    $('#close_this').click(function() {});

                },
                error: function() {
                    $('#emp_edited').html('An error occurred'); // Display an error message
                }
            });
        });

        $('#cancel_emp').click(function() {
            $('.float_form').fadeOut(200);
        });

        // #pa,#es,#ti,#pai,#ec
        $('#pa').addClass('active_tab');
        $('#pa .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#pa').click(function() {
            $('#emp_es,#emp_ti,#emp_pai,#emp_ec,#i_es,#i_ti,#i_pai,#i_ec').hide();
            $('#es,#ti,#pai,#ec').removeClass('active_tab');
            $('#pa').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#pa .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#emp_pa,#i_pa').fadeIn();
        });

        $('#es').click(function() {
            $('#emp_pa,#emp_ti,#emp_pai,#emp_ec,#i_pa,#i_ti,#i_pai,#i_ec').hide();
            $('#pa,#ti,#pai,#ec').removeClass('active_tab');
            $('#es').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#es .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#emp_es,#i_es').fadeIn();
        });

        $('#ti').click(function() {
            $('#emp_es,#emp_pa,#emp_pai,#emp_ec,#i_es,#i_pa,#i_pai,#i_ec').hide();
            $('#pa,#es,#pai,#ec').removeClass('active_tab');
            $('#ti').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#ti .sc_tab').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#emp_ti,#i_ti').fadeIn();
        });

        $('#pai').click(function() {
            $('#emp_es,#emp_ti,#emp_pa,#emp_ec,#i_es,#i_ti,#i_pai,#i_ec').hide();
            $('#pa,#es,#ti,#ec').removeClass('active_tab');
            $('#pai').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#pai .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#emp_pai,#i_pai').fadeIn();
        });

        $('#ec').click(function() {
            $('#emp_es,#emp_ti,#emp_pai,#emp_pa,#i_es,#i_ti,#i_pai,#i_pa').hide();
            $('#pa,#es,#ti,#pai').removeClass('active_tab');
            $('#ec').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#ec .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#emp_ec,#i_ec').fadeIn();
        });
        //

        // ========================================== Bellow Edit employee navigation script =======================================

        $('#a_pa,#a_es,#a_ti,#a_pai,#a_nec').click(function() {
            $('#e_pa').trigger('click');
            $('.page2,.page3,.page4,.page5,#save_emp').hide();
            $('.page1').css('opacity', '1').css('display', '');
            setTimeout(() => {
                $('.page1').css('opacity', '1');
                $('.page1').fadeIn(500);
            }, 500);
        });

        //i'm un page 1 going to page 2
        $('#nextto_2').click(function() {
            $('#e_es').trigger('click');
            $('.page1,.page2,.page3,.page4,.page5').hide();
            // setTimeout(() => {
            $('.page2').fadeIn(500);
            // }, 600);
        });

        //on page 2 going back to page 1
        $('#backto_1').click(function() {
            $('#e_pa').trigger('click');
            $('.page1,.page2,.page3,.page4,.page5').hide();
            // setTimeout(() => {
            $('.page1').fadeIn(500);
            // }, 600);

        });

        //on page 2 going to page 3
        $('#nextto_3').click(function() {
            $('#e_ti').trigger('click');
            $('.page1,.page2,.page4,.page3,.page5').hide();
            // setTimeout(() => {
            $('.page3').fadeIn(500);
            // }, 600);
        });

        //on page 3 going back to page 2
        $('#backto_2').click(function() {
            $('#e_es').trigger('click');
            $('.page1,.page3,.page4,.page5').hide();
            // setTimeout(() => {
            $('.page2').fadeIn(500);
            // }, 600);
        });

        //on page 3 going to page 4
        $('#nextto_4').click(function() {
            $('#e_pai').trigger('click');
            $('.page1,.page3,.page2,.page5').hide();
            // setTimeout(() => {
            $('.page4').fadeIn(500);
            // }, 600);
        });

        //on page 4 going back to page 3
        $('#backto_3').click(function() {
            $('#e_ti').trigger('click');
            $('.page1,.page2,.page4,#save_emp').hide();
            // setTimeout(() => {
            $('.page3').fadeIn(2500);
            // }, 2500);
        });

        //on page 4 going to page 5
        $('#nextto_5').click(function() {
            $('#e_nec').trigger('click');
            $('.page1,.page3,.page2,.page4').hide();
            // setTimeout(() => {
            $('.page5,#save_emp').fadeIn(500);
            // }, 600);
        });

        //on page 5 going back to page 4
        $('#backto_4').click(function() {
            $('#e_pai').trigger('click');
            $('.page1,.page2,.page3,.page5,#save_emp').hide();
            // setTimeout(() => {
            $('.page4').fadeIn(2500);
            // }, 2500);
        });


        // #e_pa,#e_es,#e_ti,#e_pai,#e_ec
        $('#e_pa').click(function() {
            $('#e_emp_es,#e_emp_ti,#e_emp_pai,#e_emp_nec,e_i_es,#e_i_ti,#e_i_pai,#e_i_nec').hide();
            $('#e_es,#e_ti,#e_pai,#e_nec').removeClass('active_tab');
            $('#e_pa').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#e_pa .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#e_emp_pa,#e_i_pa').fadeIn().css('display', 'flex');
        });

        $('#e_es').click(function() {
            $('#e_emp_pa,#e_emp_ti,#e_emp_pai,#e_emp_ec,#e_i_pa,#e_i_ti,#e_i_pai,#e_i_nec').hide();
            $('#e_pa,#e_ti,#e_pai,#e_nec').removeClass('active_tab');
            $('#e_es').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#e_es .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#e_emp_es,#e_i_es').fadeIn().css('display', 'flex');
        });

        $('#e_ti').click(function() {
            $('#e_emp_es,#e_emp_pa,#e_emp_pai,#e_emp_ec,#e_i_es,#e_i_pa,#e_i_pai,#e_i_nec').hide();
            $('#e_pa,#e_es,#e_pai,#e_nec').removeClass('active_tab');
            $('#e_ti').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#e_ti .sc_tab').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#e_emp_ti,#e_i_ti').fadeIn().css('display', 'flex');
        });

        $('#e_pai').click(function() {
            $('#e_emp_es,#e_emp_ti,#e_emp_pa,#e_emp_ec,#e_i_es,#e_i_ti,#e_i_pai,#e_i_nec').hide();
            $('#e_pa,#e_es,#e_ti,#e_nec').removeClass('active_tab');
            $('#e_pai').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#e_pai .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#e_emp_pai,#e_i_pai').fadeIn().css('display', 'flex');
        });

        $('#e_nec').click(function() {
            $('#e_emp_es,#e_emp_ti,#e_emp_pai,#e_emp_pa,#e_i_es,#e_i_ti,#e_i_pai,#e_i_pa').hide();
            $('#e_pa,#e_es,#e_ti,#e_pai').removeClass('active_tab');
            $('#e_nec').addClass('active_tab');
            $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
            $('#e_nec .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
            $('#e_emp_nec,#e_i_nec').fadeIn().css('display', 'flex');
        });

    });
</script>