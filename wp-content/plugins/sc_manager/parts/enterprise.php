<?php
global $wpdb, $ent_id, $ent_type, $ent_status, $ent_d_applied, $ent_branch_code, $ent_com_code, $ent_name, $ent_state, $ent_industry,
    $ent_naics, $ent_contact_name, $ent_tel, $ent_email, $ent_ein, $ent_ssn, $ent_dob, $ent_ee_number, $ent_title, $ent_start_d, $legal_b_adr,
    $ent_city, $ent_state_adr, $ent_zip, $ent_deli_adr, $pers_home_adr, $ent_sit_confirm, $ent_sit1, $ent_sit1_status, $ent_sui1, $ent_sui1_poa,
    $ent_sit2, $ent_sit2_status, $ent_sui2, $ent_sui2_poa, $ent_sit3, $ent_sit3_status, $ent_sui3, $ent_sui3_poa, $ent_username, $ent_password,
    $ent_sit_number, $reason_for, $ent_call_md_sit, $ent_md_sui_poa_status, $i, $EmployeeID, $Employee_Name, $Employee_Address_Line_1, $sel_ent_id,
    $Employee_Address_Line_2, $Employee_City, $Employee_State, $Employee_ZIP, $SSN_sidpN, $Employee_Telephone_Number, $Personal_Email,
    $Birth_Date, $Gender, $Home_Department_Number, $Home_Department_Description, $Fed_MS, $State_MS, $County_MS, $EC_Name, $EC_Phone, $EC_Email;

// include('components/css_selection.php');
include('global_function.php');


foreach ($wpdb->get_results("SELECT * FROM sc_employee") as $key => $row) {
    $i++;
    $employeeID = define_props($row, 'EmployeeID');
    $Employee_Name = define_props($row, 'Employee_Name');
    $Employee_Address_Line_1 = define_props($row, 'Employee_Address_Line_1');
    $Employee_Address_Line_2 = define_props($row, 'Employee_Address_Line_2');
    $Employee_City = define_props($row, 'Employee_City');
    $Employee_State = define_props($row, 'Employee_State');
    $Employee_ZIP = define_props($row, 'Employee_ZIP');
    $SSN_sidpN = define_props($row, 'SSN_sidpN');
    $Employee_Telephone_Number = define_props($row, 'Employee_Telephone_Number');
    $Personal_Email = define_props($row, 'Personal_Email');
    $Birth_Date = define_props($row, 'Birth_Date');
    $Gender = define_props($row, 'Gender');
    $Home_Department_Number = define_props($row, 'Home_Department_Number');
    $Home_Department_Description = define_props($row, 'Home_Department_Description');
    $Fed_MS = define_props($row, 'Fed_MS');
    $State_MS = define_props($row, 'State_MS');
    $County_MS = define_props($row, 'County_MS');
    $EC_Name = define_props($row, 'EC_Name');
    $EC_Phone = define_props($row, 'EC_Phone');
    $EC_Email = define_props($row, 'EC_Email');
}


//do not delet or change or modify the below code
if (isset($_REQUEST['id'])) {
    @$sel_ent_id = $_REQUEST['id'];
}
if (strpos($current_url, 'enterprise') > 0) {
    foreach ($wpdb->get_results("SELECT ent_id, ent_archive FROM sc_enterprise WHERE ent_id=$sel_ent_id") as $key => $row) {
        $i = 1;
        $i++;
        $ent_id = define_props($row, 'ent_id');
        $status = define_props($row, 'ent_archive');
    }

    // if (strpos($current_url, $ent_id) == 0 || empty($ent_id) || $ent_id='undefined') { /* redirect to home */
    //     home();
    // }
}

// set enterprise details variable
$ent_id = get_enterprise_details("$sel_ent_id", 'ent_id');
$ent_type = get_enterprise_details("$sel_ent_id", 'business_type');
$ent_status = get_enterprise_details("$sel_ent_id", 'status');
$ent_d_applied = get_enterprise_details("$sel_ent_id", 'date_applied');
$ent_branch_code = get_enterprise_details("$sel_ent_id", 'branch_code');
$ent_com_code = get_enterprise_details("$sel_ent_id", 'co_code');
$ent_name = get_enterprise_details("$sel_ent_id", 'business_name');
$ent_state = get_enterprise_details("$sel_ent_id", 'state');
$ent_industry = get_enterprise_details("$sel_ent_id", 'industry');
$ent_naics = get_enterprise_details("$sel_ent_id", 'naics');
$ent_contact_name = get_enterprise_details("$sel_ent_id", 'contact_name');
$ent_tel = get_enterprise_details("$sel_ent_id", 'telephone');
$ent_email = get_enterprise_details("$sel_ent_id", 'email');

$ent_ein = get_enterprise_details("$sel_ent_id", 'ein');
$ent_ssn = get_enterprise_details("$sel_ent_id", 'ssn');
$ent_dob = get_enterprise_details("$sel_ent_id", 'dob');
$ent_ee_number = get_enterprise_details("$sel_ent_id", 'ee_nbr');
$ent_title = get_enterprise_details("$sel_ent_id", 'title');
$ent_start_d = get_enterprise_details("$sel_ent_id", 'start_date');
$legal_b_adr = get_enterprise_details("$sel_ent_id", 'legal_b_adr');
$ent_city = get_enterprise_details("$sel_ent_id", 'city');
$ent_state_adr = get_enterprise_details("$sel_ent_id", 'state_adr');
$ent_zip = get_enterprise_details("$sel_ent_id", 'zip');
$ent_deli_adr = get_enterprise_details("$sel_ent_id", 'deli_adr');
$pers_home_adr = get_enterprise_details("$sel_ent_id", 'pers_home_adr');
$ent_sit_confirm = get_enterprise_details("$sel_ent_id", 'sit_confirmation');
$ent_sit1 = get_enterprise_details("$sel_ent_id", 'sit1');
$ent_sit1_status = get_enterprise_details("$sel_ent_id", 'sit1_status');
$ent_sui1 = get_enterprise_details("$sel_ent_id", 'sui1');

$ent_sui1_poa = get_enterprise_details("$sel_ent_id", 'sui1_poa');
$ent_sit2 = get_enterprise_details("$sel_ent_id", 'sit2');
$ent_sit2_status = get_enterprise_details("$sel_ent_id", 'sit2_status');
$ent_sui2 = get_enterprise_details("$sel_ent_id", 'sui2');
$ent_sui2_poa = get_enterprise_details("$sel_ent_id", 'sui2_poa');
$ent_sit3 = get_enterprise_details("$sel_ent_id", 'sit3');
$ent_sit3_status = get_enterprise_details("$sel_ent_id", 'sit3_status');
$ent_sui3 = get_enterprise_details("$sel_ent_id", 'sui3');
$ent_sui3_poa = get_enterprise_details("$sel_ent_id", 'sui3_poa');
$ent_username = get_enterprise_details("$sel_ent_id", 'username');
$ent_password = get_enterprise_details("$sel_ent_id", 'password');
$ent_sit_number = get_enterprise_details("$sel_ent_id", 'sit_number');
$reason_for = get_enterprise_details("$sel_ent_id", 'reason_for');
$ent_call_md_sit = get_enterprise_details("$sel_ent_id", 'call_md_sit');
$ent_md_sui_poa_status = get_enterprise_details("$sel_ent_id", 'md_sui_poa_status');
if (empty($ent_name) /*|| empty($ent_com_code)*/) {

?>
    <script>
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


        function backtohome(from, to, reverser, more) {
            def_ent_lnk = location.href;
            url = custom_spliter(def_ent_lnk, from, to, 0);
            location.href = url + more;
            // def_ent_lnk
        }
        // backtohome('http', 'scman', 1, "?w=ent_url");
    </script>
<?php
}


// echo $emp_id ;
?>

<input id="sc_ent_name" type="hidden" name="" value="<?php echo $ent_name; ?>" class="">
<input id="sc_ent_code" type="hidden" name="" value="<?php echo $ent_name; ?>" class="">

<!-- ---------------------------------------------------------------------------------------------------------App main bloc -->
<div class="welcome_page">
    <input type="hidden" name="ent_id" id="orig_ent_id" value="<?php echo $sel_ent_id; ?>">
    <!-- -----------------------------------------------------------------------------------------------------App top bar -->
    <?php include('layouts/top_bar.php'); ////include the header top bar section 
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
                        <!-- <a href="#choose" class="sel">
                            <select id="sc_add" title="add method" value="Selection" class="sc_get_emp_access">
                                <option value="" class="add_choice">+</option>
                                <option value="new" class="add_choice">New employee</option>
                                <option value="existing" class="add_choice">From existing</option>
                            </select>
                        </a> -->
                        <div class="sc_bloc action"><?php
                                                    $adds = include("components/sections/load_emp.php");
                                                    if ($status == 0) {

                                                        sc_action_buttons($add_icon, 'Add a new employee', '#', '', ' ', '', 'close');
                                                        sc_action_buttons($add_icon, 'Add a new employee', '#' . $sel_emp_id, 'add', ' ', '', 'add');
                                                        sc_action_buttons($del_icon, 'Delete this Enterprise', '#del_' . $sel_emp_id, 'del no_border', ' ', '', 'del');
                                                    } else {
                                                        sc_action_buttons('', 'Restore this enterprise', '#restore', 'del no_border', ' ', 'fa fa-recycle', 'restore');
                                                    }                         ?>
                        </div>

                    </div>
                    <div class="sc_column_profile">
                        <?php
                        // include('components/sections/load_ent.php');
                        ?>
                        <img class="profil_medium" id="profil_medium" src="<?php echo IMG . "Sparing logo all.png"; ?>'" alt="" srcset="">
                    </div>
                    <div class="sc_column_brief_infos">
                        <!-- -----------------------------------------------Enterprise Name -->
                        <span id="sc_names" class="sc_get_ent_name"><?php echo $ent_name ?></span>

                        <!-- -----------------------------------------------Enterprise Phone number -->
                        <div class="sc_blocs">
                            <label for="sc_type">Business Type</label>
                            <span id="sc_type" class="sc_get_ent_type"><?php echo $ent_type ?></span>
                        </div>

                        <!-- -----------------------------------------------Enterprise Address -->
                        <div class="sc_blocs">
                            <label for="email">Address</label>
                            <span id="sc_address" class="sc_get_ent_address"><?php echo $ent_deli_adr ?></span>
                        </div>

                        <!-- -----------------------------------------------Enterprise Email -->
                        <div class="sc_blocs">
                            <label for="sc_industry">industry</label>
                            <span id="sc_industry" class="sc_get_ent_industry"><?php echo $ent_industry ?></span>
                        </div>
                        <!-- -----------------------------------------------Enterprise SSN -->
                        <div class="sc_blocs">
                            <label id="sc_prc_nbr" for="ssn">Primary Contact Name</label>
                            <span id="sc_prc_nbr" class="sc_get_prc_nbr"><?php echo $ent_contact_name ?></span>
                        </div>
                        <!-- -----------------------------------------------Enterprise Access -->
                        <div class="sc_blocs">
                            <label id="sc_prc_mail" for="ssn">Primary Contact Email</label>
                            <span id="sc_prc_mail" class="sc_get_prc_mail"><?php echo $ent_email ?></span>
                        </div>
                        <!-- ENTERPRISE LIST -->

                        <!-- -----------------------------------------------EMPLOYEE WORK STATIONS -->
                        <!-- SELECT distinct(sc_for.ent_id), sc_ent.ent_id FROM sc_work_for sc_for, sc_enterprise sc_ent where sc_for.ent_id=sc_ent.ent_id; -->
                        <div class="sc_top_tabs view_em">
                            <label for="payrate" class="view_employers">Employees
                                <?php count_employees($sel_ent_id, 1); ?>
                        </div>
                    </div>
                </div>

                <?php include('get_enterprise.php'); ?>

                <div class="float_form" id="float_form_add">
                    <?php include('add_employee.php'); ?>
                </div>
                <?php include('edit_enterprise.php'); ?>
                <!-- ---------------------- Enterprise Deleted-->
                <div id="del_response"></div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {

        // backtohome('http', 'scman');
        // Set a variable in local storage
        localStorage.setItem('sel_ent_id', '<?php echo $sel_ent_id; ?>');
        var sel_ent_id = localStorage.getItem('sel_ent_id');
        // alert(sel_ent_id);
        var currentURL = window.location.href;
        console.log(currentURL);

        $('#sc_employers').change(function() {
            // $('#search_results').fadeIn();

            var query = $('#sc_employers').val(); // Get the search query
            var from = 'ent_ent'; // Get the location query
            console.log(from + " => " + query);
            // var query = $(this).val(); // Get the search query

            // Perform an AJAX request to fetch data from the database
            $.ajax({
                url: '<?php echo sc_URL . "parts/ajax/load_data.php"; ?>', // Replace with the URL of your server-side script
                method: 'POST',
                data: {
                    query: query,
                    from: from,
                },
                success: function(response) {
                    $('#search_results').html(response); // Display the loaded data in the specified div
                },
                error: function() {
                    $('#search_results').html('An error occurred'); // Display an error message
                }
            });
        });

        function custom_spliter(string, from, to, reverse = 0) {
            var lastIndex = string.lastIndexOf(from);

            if (reverse != 0) {
                var result = string.substring(lastIndex + 1, string.indexOf(to, lastIndex));
            } else {
                var result = string.split(from)[1].split(to)[0].trim();
            }
            return result;
        }

        function backtohome(from, to, reverser, more) {
            def_ent_lnk = location.href;
            url = custom_spliter(def_ent_lnk, from, to, 0);
            location.href = url + more;
            // def_ent_lnk
        }

        //======================================================================================================================
        // ========================================= Bellow Delete enterprise navigation script ===============================
        //======================================================================================================================

        $('#delete').click(function() {
            // alert('delete this ??');

            //     // ====================Ajax mirror getter================================================
            $.ajax({
                url: '<?php echo sc_URL . "parts/ajax/load_data.php"; ?>', // Replace with the URL of your server-side script
                method: 'POST',
                data: {
                    do_action: 'delete',
                    do_to: 'enterprise',
                    entid: $('#orig_ent_id').val()
                },
                success: function(response) {
                    $('#del_response').html(response);
                    setTimeout(() => {
                        $('#del_response').html('<span class="action_status">Enterprise Deleted successfully. <br><br><span class="sc_enterprise_off">NB: All belonging employees has been deleted from this enterprise.</span></span><div class="message"></div>').slideDown();
                        $('#del_response').css('display', 'grid');
                    }, 300);
                    //add another new employee
                    setTimeout(() => {
                        $('#del_response').slideToggle();
                        backtohome('http', 'scman/', 'ent_del');
                    }, 10000);

                    // setTimeout(() => {
                    //     location.href(inject_ent_link($('#ent_' + $('#sc_employers').val()).val())); // retrieve the enterprise Id
                    // }, 5000);
                },
                error: function() {
                    $('#render_ti').html('An error occurred'); // Display an error message
                }
            });
        });
        //======================================================================================================================
        // ========================================= trigger the edit enterprise functionnal process ===============================
        //======================================================================================================================
        $('#a_cd,#a_od,#a_sidfu,#a_sidpoa,#a_nec').click(function() {
            // $('#a_nec').click(function() {

            // });

            // $('#e_cd').css('border-bottom', '2px solid #252525').css('color', 'black').css('opacity', '');
            $('#e_cd .sc_tab').trigger('click');
            // $('#e_ent_cd,#i_e_cd').fadeIn();

            $('#inp_e_od_2,#inp_e_od_3,#inp_e_od_5,#inp_e_od_6,#inp_e_od_7,#inp_e_cd_11').attr('type', 'text'); //conderting date type to text

            // $('#save_emp').attr('id', 'save_ent');

            //company details (14 fielsd)
            $('#inp_e_cd_0').val($('#inp_name').text());
            $('#inp_e_cd_1').val($('#inp_legal_adr').text());
            $('#inp_e_cd_2').val($('#inp_type').text());
            $('#inp_e_cd_3').val($('#inp_branch_code').text());
            $('#inp_e_cd_4').val($('#inp_com_code').text());
            $('#inp_e_cd_5').val($('#inp_city').text());
            $('#inp_e_cd_6').val($('#inp_state').text());
            $('#inp_e_cd_7').val($('#inp_zip').text());
            $('#inp_e_cd_8').val($('#inp_industry').text());
            $('#inp_e_cd_9').val($('#inp_deli_adr').text());
            $('#inp_e_cd_10').val($('#inp_naics').text());
            $('#inp_e_cd_11').val($('#inp_start_d').text());
            $('#inp_e_cd_12').val($('#inp_ein').text());

            //Owner Details (7 fielsd)
            $('#inp_e_od_0').val($('#inp_contact_name').text());
            $('#inp_e_od_1').val($('#inp_o_tel').text());
            $('#inp_e_od_2').val($('#inp_o_email').text());
            $('#inp_e_od_3').val($('#inp_ssn').text());
            $('#inp_e_od_4').val($('#inp_dob').text());
            $('#inp_e_od_5').val($('#inp_title').text());
            $('#inp_e_od_6').val($('#inp_pers_home_adr').text());

            //State ID App and Follow Up (2 fields)
            $('#inp_e_sidfu_0').val($('#inp_status').text());
            $('#inp_e_sidfu_1').val($('#inp_d_applied').text());

            //State ID App and Follow Up (14 fields)
            $('#inp_e_sidpoa_0').val($('#inp_sit_confirmation').text());
            $('#inp_e_sidpoa_1').val($('#inp_sit1').text());
            $('#inp_e_sidpoa_2').val($('#inp_sit1_status').text());
            $('#inp_e_sidpoa_3').val($('#inp_sui1').text());
            $('#inp_e_sidpoa_4').val($('#inp_sui1_poa').text());
            $('#inp_e_sidpoa_5').val($('#inp_sit2').text());
            $('#inp_e_sidpoa_6').val($('#inp_sit2_status').text());
            $('#inp_e_sidpoa_7').val($('#inp_sui2').text());
            $('#inp_e_sidpoa_8').val($('#inp_sui2_poa').text());
            $('#inp_e_sidpoa_9').val($('#inp_sit3').text());
            $('#inp_e_sidpoa_10').val($('#inp_sit3_status').text());
            $('#inp_e_sidpoa_11').val($('#inp_sui3').text());
            $('#inp_e_sidpoa_12').val($('#inp_sui3_poa').text());
            $('#inp_e_sidpoa_13').val($('#inp_username').text());
            $('#inp_e_sidpoa_14').val($('#inp_password').text());
            $('#inp_e_sidpoa_15').val($('#inp_sit_number').text());
            $('#inp_e_sidpoa_16').val($('#inp_reason_for').text());
            $('#inp_e_sidpoa_17').val($('#inp_call_md_sit').text());
            $('#inp_e_sidpoa_18').val($('#inp_md_sui_poa_status').text());

            $('#float_form_edit').fadeIn();

            // ======================================================Save new employee information in DB=================================================
            $('#save_ent').click(function() {
                // $('#search_results').fadeIn();
                var ent_id = $('#orig_ent_id').val();
                var from = 'edit_ent'; // Get the location query
                // alert('data from "' + from + '" are, ent_id = ' + ent_id);

                //  ==================================== new employee data =======================================

                //  ================================== Company Details ======================================
                cd_0 = $('#inp_e_cd_0').val();
                cd_1 = $('#inp_e_cd_1').val();
                cd_2 = $('#inp_e_cd_2').val();
                cd_3 = $('#inp_e_cd_3').val();
                cd_4 = $('#inp_e_cd_4').val();
                cd_5 = $('#inp_e_cd_5').val();
                cd_6 = $('#inp_e_cd_6').val();
                cd_7 = $('#inp_e_cd_7').val();
                cd_8 = $('#inp_e_cd_8').val();
                cd_9 = $('#inp_e_cd_9').val();
                cd_10 = $('#inp_e_cd_10').val();
                cd_11 = $('#inp_e_cd_11').val();
                cd_12 = $('#inp_e_cd_12').val();

                // ====================================== Owner Details ======================================
                od_0 = $('#inp_e_od_0').val();
                od_1 = $('#inp_e_od_1').val();
                od_2 = $('#inp_e_od_2').val();
                od_3 = $('#inp_e_od_3').val();
                od_4 = $('#inp_e_od_4').val();
                od_5 = $('#inp_e_od_5').val();
                od_6 = $('#inp_e_od_6').val();

                //  ==================================== State ID App and Follow Up ======================================
                sidfu_0 = $('#inp_e_sidfu_0').val();
                sidfu_1 = $('#inp_e_sidfu_1').val();

                //  ================================== State ID and POA Details ======================================
                sidpoa_0 = $('#inp_e_sidpoa_0').val();
                sidpoa_1 = $('#inp_e_sidpoa_1').val();
                sidpoa_2 = $('#inp_e_sidpoa_2').val();
                sidpoa_3 = $('#inp_e_sidpoa_3').val();
                sidpoa_4 = $('#inp_e_sidpoa_4').val();
                sidpoa_5 = $('#inp_e_sidpoa_5').val();
                sidpoa_6 = $('#inp_e_sidpoa_6').val();
                sidpoa_7 = $('#inp_e_sidpoa_7').val();
                sidpoa_8 = $('#inp_e_sidpoa_8').val();
                sidpoa_9 = $('#inp_e_sidpoa_9').val();
                sidpoa_10 = $('#inp_e_sidpoa_10').val();
                sidpoa_11 = $('#inp_e_sidpoa_11').val();
                sidpoa_12 = $('#inp_e_sidpoa_12').val();
                sidpoa_13 = $('#inp_e_sidpoa_13').val();
                sidpoa_14 = $('#inp_e_sidpoa_14').val();
                sidpoa_15 = $('#inp_e_sidpoa_15').val();
                sidpoa_16 = $('#inp_e_sidpoa_16').val();
                sidpoa_17 = $('#inp_e_sidpoa_17').val();
                sidpoa_18 = $('#inp_e_sidpoa_18').val();

                // render test
                // var arryy = [cd_0, cd_1, cd_2, cd_3, cd_4, cd_5, cd_6, cd_7, cd_8, cd_9, cd_10, cd_11, cd_12, cd_13, od_0, od_1, od_2, od_3, od_4, od_5, od_6, sidfu_0, sidfu_1, sidpoa_0, sidpoa_1, sidpoa_2, sidpoa_3, sidpoa_4, sidpoa_5, sidpoa_6, sidpoa_7, sidpoa_8, sidpoa_9, sidpoa_10, sidpoa_11, sidpoa_12, sidpoa_13];

                // for (let i = 0; i < arryy.length; i++) {
                //     alert(arryy[i]);

                // }


                // Perform an AJAX request to fetch data from the database
                $.ajax({
                    url: '<?php echo sc_URL . "parts/ajax/load_data.php"; ?>', // Replace with the URL of your server-side script
                    method: 'POST',
                    data: {

                        the_id: ent_id,
                        from: from,

                        cd_0: cd_0,
                        cd_1: cd_1,
                        cd_2: cd_2,
                        cd_3: cd_3,
                        cd_4: cd_4,
                        cd_5: cd_5,
                        cd_6: cd_6,
                        cd_7: cd_7,
                        cd_8: cd_8,
                        cd_9: cd_9,
                        cd_10: cd_10,
                        cd_11: cd_11,
                        cd_12: cd_12,
                        od_0: od_0,
                        od_1: od_1,
                        od_2: od_2,
                        od_3: od_3,
                        od_4: od_4,
                        od_5: od_5,
                        od_6: od_6,
                        su_0: sidfu_0,
                        su_1: sidfu_1,
                        sa_0: sidpoa_0,
                        sa_1: sidpoa_1,
                        sa_2: sidpoa_2,
                        sa_3: sidpoa_3,
                        sa_4: sidpoa_4,
                        sa_5: sidpoa_5,
                        sa_6: sidpoa_6,
                        sa_7: sidpoa_7,
                        sa_8: sidpoa_8,
                        sa_9: sidpoa_9,
                        sa_10: sidpoa_10,
                        sa_11: sidpoa_11,
                        sa_12: sidpoa_12,
                        sa_13: sidpoa_13,
                        sa_14: sidpoa_14,
                        sa_15: sidpoa_15,
                        sa_16: sidpoa_16,
                        sa_17: sidpoa_17,
                        sa_18: sidpoa_18
                    },

                    success: function(response) {
                        $('#edit_emp .sc_column_large,.decition_btn,#view_emp').hide();
                        $('#ent_edited').html(response).fadeIn(); // Display the loaded data in the specified div

                        // alert('Recieving information');


                        // view the newly created employee
                        $('button#view_emp').hide();

                        // $('#view_emp').click(function() {
                        //     location.href = "employee/?id=" + $('#new_emp_id').val();
                        // });

                        //add another new employee
                        $('#close_this').click(function() {
                            $('.float_form,#emp_edited').fadeOut(200);
                            $('#emp_edited').html();
                            $('.sc_column_large,.decition_btn').show();
                            location.href = "";
                        });

                        //close this layer and go back          
                        $('#close_this').click(function() {
                            $('.float_form').hide();
                        });

                    },
                    error: function() {
                        $('#emp_edited').html('An error occurred'); // Display an error message
                    }
                });

            });
        });


    });

    //======================================================================================================================
    // =========================================trigger the add employee functionnal process ===============================
    //======================================================================================================================
    $('#do_add').click(function() {
        $('#sc_add').slideDown().css('display', 'flex');
        $('#do_add').hide();
        $('#do_close').fadeIn();
    });

    $('#do_close').click(function() {
        $('#sc_add').slideUp();
        $('#do_add').fadeIn();
        $('#do_close').hide();
        $('button#confirm_n').click();
    });

    var grant_this = add_new_employee();

    // =====================================================FROM EXISTING=====================================================

    // $('.get_ent').click();
    $('#id_comp').change(function() {
        grant_this = '0';
        $('button#from_new,button#disabled').css('opacity', '0.5');
        $('button#disabled').css('display', 'grid');
        $('button#from_new').css('display', 'none');

        $('.confirm').slideDown().css('display', 'grid');

        $('button#confirm_y').click(function() {
            // ('#emp_pa').hide();
            $('#from_new').trigger('click');
            $('#the_method').val('existing');
            $('#float_form_add').css('display', 'grid').css('border', 'none').css('background-color', 'unset').css('backdrop-filter', 'blur(0px)');
        });

        $('button#confirm_n').click(function() {
            $('.confirm').slideUp();
            $('button#from_new').css('display', 'grid');
            $('button#disabled').css('display', 'none');
            $('.get_ent').html('<option value="" class="options" id="">Select employee</option>');
            $('button#from_new').css('opacity', '1');
            ('#emp_pa,#emp_nec').show();
            $('#float_form_add').css('display', 'grid').css('border', 'initial').css('background-color', 'unset').css('backdrop-filter', 'blur(0px)');

            grant_this = add_new_employee();

        });
    });


    function add_new_employee() {

        // =====================================================FROM NEW=====================================================
        $('button#from_new').click(function() {
            $('#the_method').val('new');

            $('#float_form_edit').append($('#add_emp').slideDown(200));
            $('#float_form_edit').slideDown();
            $('#emp_added,#edit_emp').hide();
            $('#add_emp .sc_column_large,#save_emp,#cancel_emp').show();
            // setInterval(() => {$('#add_emp .sc_column_large,#save_emp,#cancel_emp').fadeIn();}, 2000);

            // ======================================================Save new employee information in DB=================================================
            $('#save_emp').click(function() {
                // $('#search_results').fadeIn();

                var the_id = $('#orig_ent_id').val(); // Get the enterprise id
                var from = 'new_emp'; // Get the location query
                var methods = $('#the_method').val();


                //  ==========================================  ================================== new employee data
                function arg_new_save() {
                    //  ================================== personal information ======================================
                    pa_0 = $('#inp_pa_0').val();
                    pa_1 = $('#inp_pa_1').val();
                    pa_2 = $('#inp_pa_2').val();
                    pa_3 = $('#inp_pa_3').val();
                    pa_4 = $('#inp_pa_4').val();
                    pa_5 = $('#inp_pa_5').val();
                    pa_6 = $('#inp_pa_6').val();
                    pa_7 = $('#inp_pa_7').val();
                    pa_8 = $('#inp_pa_8').val();
                    pa_9 = $('#inp_pa_9').val();
                    pa_10 = $('#inp_pa_10').val();
                    pa_11 = $('#inp_pa_11').val();

                    // =============================    ========== Emloyee Status ======================================
                    es_0 = $('#inp_es_0').val();
                    es_1 = $('#inp_es_1').val();
                    es_2 = $('#inp_es_2').val();
                    es_3 = $('#inp_es_3').val();
                    es_4 = $('#inp_es_4').val();
                    es_5 = $('#inp_es_5').val();
                    es_6 = $('#inp_es_6').val();
                    es_7 = $('#inp_es_7').val();

                    //  ============================    ========== Tax Information ======================================
                    ti_0 = $('#inp_ti_0').val();
                    ti_1 = $('#inp_ti_1').val();
                    ti_2 = $('#inp_ti_2').val();
                    ti_3 = $('#inp_ti_3').val();
                    ti_4 = $('#inp_ti_4').val();
                    ti_5 = $('#inp_ti_5').val();

                    //  ================================== Payroll Information ======================================
                    pai_0 = $('#inp_pai_0').val();
                    pai_1 = $('#inp_pai_1').val();
                    pai_2 = $('#inp_pai_2').val();
                    pai_3 = $('#inp_pai_3').val();
                    pai_4 = $('#inp_pai_4').val();
                    pai_5 = $('#inp_pai_5').val();
                    pai_6 = $('#inp_pai_6').val();
                    pai_7 = $('#inp_pai_7').val();
                    pai_8 = $('#inp_pai_8').val();
                    pai_9 = $('#inp_pai_9').val();
                    //  ====================================== Emergency Contact  ======================================
                    nec_0 = $('#inp_nec_0').val();
                    nec_1 = $('#inp_nec_1').val();
                    nec_2 = $('#inp_nec_2').val();
                }

                function arg_existing_save() {
                    //  ================================== personal information ======================================

                    // =============================    ========== Emloyee Status ======================================
                    es_0 = $('#inp_es_0').val();
                    es_1 = $('#inp_es_1').val();
                    es_2 = $('#inp_es_2').val();
                    es_3 = $('#inp_es_3').val();
                    es_4 = $('#inp_es_4').val();
                    es_5 = $('#inp_es_5').val();
                    es_6 = $('#inp_es_6').val();
                    es_7 = $('#inp_es_7').val();

                    //  ============================    ========== Tax Information ======================================
                    ti_0 = $('#inp_ti_0').val();
                    ti_1 = $('#inp_ti_1').val();
                    ti_2 = $('#inp_ti_2').val();
                    ti_3 = $('#inp_ti_3').val();
                    ti_4 = $('#inp_ti_4').val();
                    ti_5 = $('#inp_ti_5').val();

                    //  ================================== Payroll Information ======================================
                    pai_0 = $('#inp_pai_0').val();
                    pai_1 = $('#inp_pai_1').val();
                    pai_2 = $('#inp_pai_2').val();
                    pai_3 = $('#inp_pai_3').val();
                    pai_4 = $('#inp_pai_4').val();
                    pai_5 = $('#inp_pai_5').val();
                    pai_6 = $('#inp_pai_6').val();
                    pai_7 = $('#inp_pai_7').val();
                    pai_8 = $('#inp_pai_8').val();
                    pai_9 = $('#inp_pai_9').val();
                    //  ====================================== Emergency Contact  ======================================
                }

                if (methods == "new") {
                    arg_new_save();
                } else {
                    arg_existing_save();
                    the_emp_id = $('#the_emp_id').val(); // Get the search query
                    the_emp_name = $('#the_emp_name').val();

                    alert($('#the_emp_id').val());

                }
                // render test
                // var edit_emp_id =
                // var arryy = [pa_0, pa_1, pa_2, pa_3, pa_4, pa_5, pa_6, pa_7, pa_8, pa_9, pa_10, pa_11, es_0, es_1, es_2, es_3, es_4, es_5, es_6, es_7, ti_0, ti_1, ti_2, ti_3, ti_4, ti_5, pai_0, pai_1, pai_2, pai_3, pai_4, pai_5, pai_6, pai_7, pai_8, pai_9, nec_0, nec_1, nec_2, edit_emp_id];

                // for (let i = 0; i < arryy.length; i++) {
                //     console.log(arryy[i]);

                // }
                var arg = [];
                if (methods == "new") {
                    args = {

                        the_id: the_id,
                        from: from,
                        methods: methods,
                        pa_0: pa_0,
                        es_0: es_0,
                        ti_0: ti_0,
                        nec_0: nec_0,
                        pa_1: pa_1,
                        es_1: es_1,
                        pai_0: pai_0,
                        nec_1: nec_1,
                        pa_2: pa_2,
                        es_2: es_2,
                        pai_1: pai_1,
                        nec_2: nec_2,
                        pa_3: pa_3,
                        es_3: es_3,
                        pai_2: pai_2,
                        pa_4: pa_4,
                        es_4: es_4,
                        pai_3: pai_3,
                        pa_5: pa_5,
                        es_5: es_5,
                        pai_4: pai_4,
                        pa_6: pa_6,
                        es_6: es_6,
                        pai_5: pai_5,
                        pa_7: pa_7,
                        es_7: es_7,
                        pai_6: pai_6,
                        pa_8: pa_8,
                        ti_1: ti_1,
                        pai_7: pai_7,
                        pa_9: pa_9,
                        ti_2: ti_2,
                        pai_8: pai_8,
                        pa_10: pa_10,
                        ti_3: ti_3,
                        pai_9: pai_9,
                        pa_11: pa_11,
                        ti_4: ti_4,
                        ti_5: ti_5,
                    }
                } else {
                    args = {

                        the_id: the_id,
                        from: from,
                        the_emp_id: the_emp_id,
                        the_emp_name: the_emp_name,
                        methods: methods,

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
                    }

                }
                // Perform an AJAX request to fetch data from the database
                $.ajax({
                    url: '<?php echo sc_URL . "parts/ajax/load_data.php"; ?>', // Replace with the URL of your server-side script
                    method: 'POST',
                    data: args,
                    success: function(response) {
                        $('#add_emp .sc_column_large, #save_emp,#cancel_emp').hide();
                        $('#emp_added').html(response).fadeIn(); // Display the loaded data in the specified div

                        // clase and view the newly created employee
                        $('#close_this').click(function() {
                            location.href = "employee/?id=" + $('#new_emp_id').val();
                            $('.float_form').hide();
                        });

                    },
                    error: function() {
                        $('#emp_added').html('An error occurred'); // Display an error message
                    }
                });

            });
        });

    }

    $('.close_form').click(function() {
        $('.float_form').slideUp(200);
    });


    // ========================================== Bellow show/render enterprise navigation script =======================================

    // #pa,#sidfu,#sidpoa,#pai,#ec 
    $('#cd').addClass('active_tab');
    $('#cd .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
    $('#cd').click(function() {
        $('#ent_od,#ent_sidfu,#ent_sidpoa,#ent_emp,#ent_ec,#i_od,#i_sidfu,#i_sidpoa,#i_emp,#i_ec').hide();
        $('#od,#sidfu,#sidpoa,#emp,#ec').removeClass('active_tab');
        $('#cd').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#cd .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#ent_cd,#i_cd').fadeIn();
    });

    $('#od').click(function() {
        $('#ent_cd,#ent_sidfu,#ent_sidpoa,#ent_emp,#ent_ec,#i_cd,#i_sidfu,#i_sidpoa,#i_emp,#i_ec').hide();
        $('#cd,#sidfu,#sidpoa,#emp,#ec').removeClass('active_tab');
        $('#od').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#od .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#ent_od,#i_od').fadeIn();
    });

    $('#sidfu').click(function() {
        $('#ent_od,#ent_cd,#ent_sidpoa,#ent_emp,#ent_ec,#i_od,#i_cd,#i_sidpoa,#i_emp,#i_ec').hide();
        $('#od,#cd,#sidpoa,#emp,#ec').removeClass('active_tab');
        $('#sidfu').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#sidfu .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#ent_sidfu,#i_sidfu').fadeIn();
    });

    $('#sidpoa').click(function() {
        $('#ent_od,#ent_sidfu,#ent_cd,#ent_emp,#ent_ec,#i_od,#i_sidfu,#i_cd,#i_emp,#i_ec').hide();
        $('#od,#cd,#sidfu,#emp,#ec').removeClass('active_tab');
        $('#sidpoa').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#sidpoa .sc_tab').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#ent_sidpoa,#i_sidpoa').fadeIn();
    });

    $('#emp').click(function() {
        $('#ent_od,#ent_sidfu,#ent_sidpoa,#ent_cd,#ent_ec,#i_od,#i_sidfu,#i_sidpoa,#i_cd,#i_ec').hide();
        $('#od,#cd,#sidfu,#sidpoa,#ec').removeClass('active_tab');
        $('#emp').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#emp .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#ent_emp,#i_emp').fadeIn();
    });

    $('#ec').click(function() {
        $('#ent_od,#ent_sidfu,#ent_sidpoa,#ent_emp,#ent_cd,#i_od,#i_sidfu,#i_sidpoa,#i_emp,#i_cd').hide();
        $('#od,#cd,#sidfu,#sidpoa,#emp').removeClass('active_tab');
        $('#ec').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#ec .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#ent_ec,#i_ec').fadeIn();
    });


    // ========================================== Bellow Edit enterprise navigation script =======================================

    $('#a_cd,#a_od,#a_sidfu,#a_sidpoa,#a_nec').click(function() {
        $('.page2,.page3,.page4').hide();
        $('.page1').css('opacity', '0');
        setTimeout(() => {
            $('.page1').css('opacity', '1');

            $('.page1').fadeIn(500);
        }, 2500);
    });

    //i'm un page 1 going to page 2
    $('#nextto_2').click(function() {
        $('#e_od').trigger('click');
        $('.page1,.page2,.page3,.page4').hide();
        // setTimeout(() => {
        $('.page2').fadeIn(500);
        // }, 600);
    });

    //on page 2 going back to page 1
    $('#backto_1').click(function() {
        $('#e_cd').trigger('click');
        $('.page1,.page2,.page3,.page4').hide();
        // setTimeout(() => {
        $('.page1').fadeIn(500);
        // }, 600);

    });

    //on page 2 going to page 3
    $('#nextto_3').click(function() {
        $('#e_sidfu').trigger('click');
        $('.page1,.page2,.page4,.page3').hide();
        // setTimeout(() => {
        $('.page3').fadeIn(500);
        // }, 600);
    });

    //on page 3 going back to page 2
    $('#backto_2').click(function() {
        $('#e_od').trigger('click');
        $('.page1,.page3,.page4').hide();
        // setTimeout(() => {
        $('.page2').fadeIn(500);
        // }, 600);
    });

    //on page 3 going to page 4
    $('#nextto_4').click(function() {
        $('#e_sidpoa').trigger('click');
        $('.page1,.page3,.page2,.page4').hide();
        // setTimeout(() => {
        $('#backto_3,#save_ent').fadeIn(500);
        // }, 600);
    });


    //on page 4 going back to page 3
    $('#backto_3').click(function() {
        $('#e_sidfu').trigger('click');
        $('.page1,.page2,.page4,#save_ent').hide();
        // setTimeout(() => {
        $('.page3').fadeIn(2500);
        // }, 2500);
    });

    $('#e_cd').click(function() {
        $('#e_ent_od,#e_ent_sidfu,#e_ent_sidpoa,#e_ent_emp,#e_ent_nec,#i_e_od,#i_e_sidfu,#i_e_sidpoa,#i_e_emp,#i_e_nec').hide();
        $('#e_od,#e_sidfu,#e_sidpoa,#e_emp,#e_nec').removeClass('active_tab');
        $('#e_cd').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#e_cd .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#save_ent,#prev').hide(); // hide the
        $('#e_ent_cd,#i_e_cd').fadeIn();
    });

    $('#e_od').click(function() {
        $('#e_ent_cd,#e_ent_sidfu,#e_ent_sidpoa,#e_ent_emp,#e_ent_nec,#i_e_cd,#i_e_sidfu,#i_e_sidpoa,#i_e_emp,#i_e_nec').hide();
        $('#e_cd,#e_sidfu,#e_sidpoa,#e_emp,#e_nec').removeClass('active_tab');
        $('#e_od').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#e_od .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#prev').show(); // hide the
        $('#save_ent').hide(); // hide the
        $('#e_ent_od,#i_e_od').fadeIn();
    });

    $('#e_sidfu').click(function() {
        $('#e_ent_od,#e_ent_cd,#e_ent_sidpoa,#e_ent_emp,#e_ent_nec,#i_e_od,#i_e_cd,#i_e_sidpoa,#i_e_emp,#i_e_nec').hide();
        $('#e_od,#e_cd,#e_sidpoa,#e_emp,#e_nec').removeClass('active_tab');
        $('#e_sidfu').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#e_sidfu .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#prev,#next').show(); // hide the
        $('#save_ent').hide(); // hide the
        $('#e_ent_sidfu,#i_e_sidfu').fadeIn();
    });

    $('#e_sidpoa').click(function() {
        $('#e_ent_od,#e_ent_sidfu,#e_ent_cd,#e_ent_emp,#e_ent_nec,#i_e_od,#i_e_sidfu,#i_e_cd,#i_e_emp,#i_e_nec').hide();
        $('#e_od,#e_cd,#e_sidfu,#e_emp,#e_nec').removeClass('active_tab');
        $('#e_sidpoa').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#e_sidpoa .sc_tab').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#prev,#save_ent').show(); // hide the
        $('#next').hide(); // hide the
        $('#e_ent_sidpoa,#i_e_sidpoa').fadeIn();
    });

    // $('#e_nec').click(function() {
    //     $('#e_ent_od,#e_ent_sidfu,#e_ent_sidpoa,#e_ent_emp,#e_ent_cd,#i_e_od,#i_e_sidfu,#i_e_sidpoa,#i_e_emp,#i_e_cd').hide();
    //     $('#e_od,#e_cd,#e_sidfu,#e_sidpoa,#e_emp').removeClass('active_tab');
    //     $('#e_nec').addClass('active_tab');
    //     $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
    //     $('#e_nec .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
    //     $('#next').hide(); // hide the
    //     $('#e_ent_nec,#i_e_nec').fadeIn();
    // });

    // ========================================== add new employee navigation script =======================================

    // #pa,#es,#ti,#pai,#ec 
    $('#pa').addClass('active_tab');
    $('#pa .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
    $('#pa').click(function() {
        $('#emp_es,#emp_ti,#emp_pai,#emp_nec').hide();
        $('#es,#ti,#pai,#nec').removeClass('active_tab');
        $('#pa').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#pa .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#emp_pa').fadeIn();
    });

    $('#es').click(function() {

        $('#emp_pa,#emp_ti,#emp_pai,#emp_nec').hide();
        $('#pa,#ti,#pai,#nec').removeClass('active_tab');
        $('#es').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#es .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#emp_es').fadeIn();
    });

    $('#ti').click(function() {
        $('#emp_es,#emp_pa,#emp_pai,#emp_nec').hide();
        $('#pa,#es,#pai,#nec').removeClass('active_tab');
        $('#ti').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#ti .sc_tab').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#emp_ti').fadeIn();
    });

    $('#pai').click(function() {
        $('#emp_es,#emp_ti,#emp_pa,#emp_nec').hide();
        $('#pa,#es,#ti,#nec').removeClass('active_tab');
        $('#pai').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#pai .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#emp_pai').fadeIn();
    });

    $('#nec').click(function() {
        $('#emp_es,#emp_ti,#emp_pai,#emp_pa').hide();
        $('#pa,#es,#ti,#pai').removeClass('active_tab');
        $('#nec').addClass('active_tab');
        $('.sc_tab').css('opacity', '0.6').css('color', 'gray');
        $('#nec .sc_tab').css('opacity', '1').css('opacity', '1').css('color', 'black').css('font-weight', '600');
        $('#emp_nec').fadeIn();
    });
</script>