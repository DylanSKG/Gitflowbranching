<?php
include('components/css_selection.php');
// DEFINE PATH
global $wpdb, $edit_icon, $del_icon, $ent_id, $add_icon, $i, $sel_emp_id, $current_url, $EmployeeID, $emp_name, $emp_adr1, $emp_adr2, $emp_city, $emp_state, $emp_zip, $emp_ssn_tin, $emp_ptel, $emp_email, $emp_bdate, $emp_gender,
    $emp_ec_name, $emp_ec_phone, $emp_ec_email, $emp_hdep_nbr, $emp_hdep_desc, $emp_efed_ms, $emp_state_ms, $emp_county_ms, $get_result, $emp_access,
    $emp_status, $emp_hire_date, $emp_end_date, $emp_tel, $emp_end_reason, $emp_last_d_worked, $emp_abs_start_date, $emp_abs_ret_date, $emp_p_amnt, $emp_ein, $emp_ent_id, $emp_eid,
    $emp_ent_id, $emp_work_email, $emp_access, $emp_ssn, $emp_contractor, $emp_pay_type, $emp_pay_freq, $emp_pay_rate_amt, $emp_pay_rate_status, $emp_fed_all, $emp_state_all, $emp_work_state, $emp_ee_classif,
    $emp_doc_status, $emp_contact_name, $current_user, $sc_user_name, $sc_user_id, $sc_user_position, $emp_gender, $gender, $i, $EmployeeID, $emp_name, $emp_adr1, $emp_adr2, $emp_city, $emp_state, $emp_zip, $emp_ssn_tin, $emp_ptel, $emp_email, $emp_bdate, $emp_gender, $emp_ec_name, $emp_ec_phone, $emp_ec_email, $emp_hdep_nbr, $emp_hdep_desc, $emp_efed_ms, $emp_state_ms, $emp_county_ms;

// $host = $wpdb->dbhost;
// $username = $wpdb->dbuser;
// $password = $acc;
// $database = $wpdb->dbname;
$connection =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
/**
 * @return string_seeker_Fucntion
 * This function get a string and crop a specific result base on an interval between a start point (specific character/string) 
 * and an end point (the limit) and sends back the result. it has 2 advance parameters called pivot1 and pivot2 for mouving to 
 * and fro the start point and same for end point respectively
 *
 * @param [string] $the_string Represent the global word/string which has to be treated
 * @param [string] $start the character or set of characters which determine the start point
 * @param [string] $end $start the character or set of characters which determine the start point
 * @param [function] $bond used for additionnal text or string
 * @param [integer] $result
 * 
 * @return Developper : Adrian Deltoro | DeltoroCorp
 * @return version : 1.5.0
 * @return URI : https://facebook.com/deltoro237
 * 
 */

if (!function_exists('string_seeker')) {
    function string_seeker($the_string, $begin, $pivot1, $end, $pivot2, $bond)
    {
        // global $the_string,$start,$end,$result;

        //search for a basic unit string common to all (http) as a start point
        $start = strpos("$the_string", "$begin");

        //cut the initial strings from its begining and stop infront of the basic unit (http)
        $cut = substr("$the_string", $start + $pivot1);

        //search for a basic unit string common to all (\";) as a stop point
        $stop = strpos($cut, "$end");

        //get the total string extract after the preceeding string cuts interval from start point (0) till the checked point $stop
        $result = substr($cut, 0, $stop + $pivot2) . $bond;
        // echo $the_string;
        return $result;
    }
}

// Get the current user's profile information
$current_user = wp_get_current_user();
$sc_user_name = $current_user->user_nicename;
$sc_user_id = $current_user->ID;

// $sc_user_mail = $current_user->user_email;
if (current_user_can('administrator')) {
    $sc_user_position = "Admin";
}

if (current_user_can('editor')) {
    $sc_user_position = "GroupAdmin";
}

if (current_user_can('subscriber')) {
    $sc_user_position = "Editor";
}

if (current_user_can('subscriber')) {
    $sc_user_position = "Visitor";
}

if (!function_exists('define_props')) {
    function define_props($row, $propertyName)
    {
        if (property_exists($row, $propertyName)) {
            $var_props = $row->$propertyName;
            // Perform actions with $employeeID variable
            // ...
            return $var_props;
        }
        return null;
    }
}

if (!function_exists('def_var')) {

    function def_var($var)
    {
        if (isset($_POST[$var])) {
            $var_name = $_POST[$var];
            return $var_name;
        }
        return null;
    }
}

if (!function_exists('wp_load_alloptions')) {
    require_once 'wp-load.php';
}

//do not delet or change or modify the below code
if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
    $sel_emp_id = $_REQUEST['id'];
    $sel_emp_id = $_REQUEST['id'];

    if ($sel_emp_id == '') {
        $sel_emp_id = 1;
    }
}
// echo "Employee_ids".$sel_emp_id;
// LOAD ALL VALIDATED EMPLOYEES IN THE LIST
$current_url = $_SERVER['REQUEST_URI'];

foreach ($wpdb->get_results("SELECT * FROM sc_employee sc_emp, sc_work_for sc_for where sc_emp.emp_id=$sel_emp_id and sc_for.emp_archive=0") as $key => $row) {
    $i++;
    // -----------------employee personal information
    $EmployeeID = $row->emp_id;
    $emp_name = $row->emp_name;     // render as first name and last name
    $emp_adr1 = $row->emp_adr1;
    $emp_adr2 = $row->emp_adr2;
    $emp_city = $row->emp_city;
    $emp_state = $row->emp_state;
    $emp_zip = $row->emp_zip;
    $emp_ssn_tin = $row->emp_ssn_tin;
    $emp_ptel = $row->emp_ptel;
    $emp_email = $row->emp_email;
    $emp_bdate = $row->emp_bdate;
    $emp_gender = $row->emp_gender;

    // -----------------employee emergency information
    $emp_ec_name = $row->emp_ec_name;
    $emp_ec_phone = $row->emp_ec_phone;
    $emp_ec_email = $row->emp_ec_email;

    // -----------------employee proffessional information
    $emp_hdep_nbr = $row->emp_hdep_nbr;
    $emp_hdep_desc = $row->emp_hdep_desc;
    $emp_efed_ms = $row->emp_efed_ms;
    $emp_state_ms = $row->emp_state_ms;
    $emp_county_ms = $row->emp_county_ms;
}

// LOAD ALL VALIDATED EMPLOYEES IN THE LIST
if (!function_exists('get_recent_searcheemployee')) {

    function get_recent_searcheemployee()
    {
        global $wpdb, $emp_id, $emp_name, $i;
        foreach ($wpdb->get_results("SELECT emp_id FROM sc_work_for WHERE emp_archive=0") as $key => $row) {
            $i = 1;
            $i++;
            $emp_id = $row->emp_id;
            foreach ($wpdb->get_results("SELECT emp_name FROM sc_employee sc_emp where emp_id=$emp_id") as $key => $row) {
                $emp_name = $row->emp_name; ?>
                <li class="sc_emp">
                    <i class="fa-solid fa-chevron-right"></i>
                    <a class="ref no_underline" href="<?php echo home_url('/employee') . '?id=' . $emp_id; ?> "><?php echo $emp_name; ?></a>
                </li> <?php
                    }
                }
            }
        }

        if (!function_exists('get_employee')) {

            function get_employee()
            {
                global $wpdb;
                foreach ($wpdb->get_results("SELECT emp_id FROM sc_work_for WHERE emp_archive=0") as $key => $row) {
                    $i = 1;
                    $i++;
                    $emp_id = $row->emp_id;
                    foreach ($wpdb->get_results("SELECT emp_name FROM sc_employee sc_emp where emp_id=$emp_id") as $key => $row) {
                        $emp_name = $row->emp_name;
                        ?>
                <li class="sc_emp">
                    <i class="fa-solid fa-chevron-right"></i>
                    <a class="ref no_underline" href="<?php echo home_url('/employee') . '?id=' . $emp_id; ?> "><?php echo $emp_name; ?></a>
                </li> <?php
                    }
                }
            }
        }


        if (!function_exists('get_enterprise_names')) {

            function get_enterprise_names($value, $order)
            {
                global $wpdb, $i;
                foreach ($wpdb->get_results("SELECT * FROM sc_enterprise  WHERE ent_archive=0 ORDER BY $order ") as $key => $row) {

                    $ent_id = $row->ent_id;
                    $get_result = $row->$value; ?>
            <li class="sc_emp">
                <i class="fa-solid fa-chevron-right"></i>
                <a class="ref no_underline" href="<?php echo home_url('/enterprise') . '?id=' . $ent_id; ?> "><?php echo $get_result; ?></a>
            </li> <?php
                    $_SERVER['ref'] = home_url('/enterprise') . '?id=' . $ent_id;
                }
            }
        }

        if (!function_exists('home')) {

            function home()
            {
                echo '<script>var url = window.location.href;var home_url = url.substring(0, url.indexOf("scman") + "scman".length);location.href = home_url;</script>';
            }
            function get_employee_details($id, $value)
            {
                global $wpdb;
                // $get_id = "no";
                foreach ($wpdb->get_results("SELECT * FROM sc_employee sc_emp, sc_work_for sc_wf where sc_wf.emp_id=$id and emp_archive=0") as $key => $row) {
                    $get_result = @$row->$value;
                    return $get_result;
                }
            }
        }

        // first column most
        // $emp_id = get_employee_details("$sel_emp_id", 'sc_emp.emp_id');
        // $emp_name = get_employee_details("$sel_emp_id", 'sc_emp.emp_name');
        // $emp_tel = get_employee_details("$sel_emp_id", 'sc_emp.emp_ptel');
        // $emp_email = get_employee_details("$sel_emp_id", 'sc_emp.emp_email');
        // $emp_ssn = get_employee_details("$sel_emp_id", 'sc_emp.emp_ssn_tin');

        // ------------------------------------------------------------------table worked for 
        // ---------------------------EMPLOYEE STATUS
        $emp_access = get_employee_details("$sel_emp_id", 'emp_access');
        $emp_status = get_employee_details("$sel_emp_id", 'emp_status');
        $emp_hire_date = get_employee_details("$sel_emp_id", 'emp_hire_date');
        $emp_end_date = get_employee_details("$sel_emp_id", 'emp_end_date');
        $emp_end_reason = get_employee_details("$sel_emp_id", 'emp_end_reason');
        $emp_last_d_worked = get_employee_details("$sel_emp_id", 'emp_last_d_worked');
        $emp_abs_start_date = get_employee_details("$sel_emp_id", 'emp_abs_start_date');
        $emp_abs_ret_date = get_employee_details("$sel_emp_id", 'emp_abs_ret_date');

        $emp_p_amnt = get_employee_details("$sel_emp_id", 'pay_rate_amount');
        $emp_ein = get_employee_details("$sel_emp_id", 'pay_rate_status');

        $emp_ent_id = get_employee_details("$sel_emp_id", 'emp_ent_id');
        $emp_eid = get_employee_details("$sel_emp_id", 'emp_eid');
        $emp_ent_id = get_employee_details("$sel_emp_id", 'ent_id');
        $emp_work_email = get_employee_details("$sel_emp_id", 'work_email');
        $emp_access = get_employee_details("$sel_emp_id", 'emp_access');
        $emp_contractor = get_employee_details("$sel_emp_id", 'emp_contract');
        $emp_pay_type = get_employee_details("$sel_emp_id", 'emp_pay_type');
        $emp_pay_freq = get_employee_details("$sel_emp_id", 'emp_pay_freq');
        $emp_pay_rate_amt = get_employee_details("$sel_emp_id", 'emp_pay_rate_amt');
        $emp_pay_rate_status = get_employee_details("$sel_emp_id", 'emp_pay_rate_status');
        $emp_fed_all = get_employee_details("$sel_emp_id", 'emp_fed_all');
        $emp_state_all = get_employee_details("$sel_emp_id", 'emp_state_all');
        $emp_work_state = get_employee_details("$sel_emp_id", 'emp_work_state');
        $emp_ee_classif = get_employee_details("$sel_emp_id", 'emp_ee_classif');
        $emp_doc_status = get_employee_details("$sel_emp_id", 'emp_doc_status');

        // second column most
        // $emp_adr1 = get_employee_details("$sel_emp_id", 'emp_adr1');
        // $emp_adr2 = get_employee_details("$sel_emp_id", 'emp_adr2');
        // $emp_city = get_employee_details("$sel_emp_id", 'emp_city');
        // $emp_state = get_employee_details("$sel_emp_id", 'emp_state');
        // $emp_zip = get_employee_details("$sel_emp_id", 'emp_zip');
        // $emp_co_code = get_employee_details("$sel_emp_id", 'emp_ssn_tin');
        // $emp_bdate = get_employee_details("$sel_emp_id", 'emp_bdate');
        // $emp_gender = get_employee_details("$sel_emp_id", 'emp_gender');
        $emp_contact_name = get_employee_details("$sel_emp_id", 'emp_hdep_nbr');

        // $emp_email = get_employee_details("$sel_emp_id", 'emp_hdep_desc');


        // Get the current user's profile information
        $current_user = wp_get_current_user();
        $sc_user_name = $current_user->user_nicename;
        $sc_user_id = $current_user->ID;
        // $sc_user_mail = $current_user->user_email;
        $sc_user_position = "Supervisor";

        // echo $emp_name;

        // employee name presentation
        if (strpos($emp_name, ',') > 0) {
            $sc_emp_fname = @string_seeker($emp_name, '', 0, ',', 0, '');
            $sc_emp_lname = @string_seeker($emp_name, ',', 1, '', 20, '');
            // $sc_emp_fname = substr($sc_emp_fname,0,-1);

        } else {
            $sc_emp_fname = @string_seeker($emp_name, '', 0, ' ', 0, '');
            $sc_emp_lname = @string_seeker($emp_name, ' ', 1, '', 20, '');
        }
        if (!empty($sc_emp_fname) && !empty($sc_emp_lname)) {
            $sc_emp_fullname =  $sc_emp_fname . ", " . $sc_emp_lname;
        } elseif (!empty($sc_emp_fname) && empty($sc_emp_lname)) {
            $sc_emp_fullname =  $sc_emp_fname;
        } elseif (empty($sc_emp_fname) && !empty($sc_emp_lname)) {
            $sc_emp_fullname =  $sc_emp_lname;
        }

        // gender presentation
        ($emp_gender == 'F' || $emp_gender == 'f') ? $gender = 'Female' : $gender = "Male";
        if ($emp_gender == '') {
            $gender = '';
        }

        // ------------------------------------------------------------------ common functions for both pages enterprise, and employee


        if (!function_exists('dash_item')) {
            function dash_item($sc_dash_url, $img_name, $name)
            {
                if (empty($sc_dash_url)) {
                    $sc_dash_url = '0';
                }
                if (strpos($_SERVER['REQUEST_URI'], $sc_dash_url) > 0) {
                    $active = 'sc_active';
                } else {
                    $active = '';
                } ?>
        <div class="sidebar_item <?php echo $active; ?>">
            <a class="no_underline" href="<?php echo home_url("$sc_dash_url"); ?>"><span class="sc_item"><img class="img_name" src='<?php echo IMG . "$img_name"; ?>'> <span class="dash_name"><?php echo $name; ?></span></span></a>
        </div> <?php
            }
        }

        if (!function_exists('ent_detail')) {
            function ent_detail($id_ref, $label, $label_value)
            { ?>
        <!-- <a href="" class="links"></a> -->
        <div class="sc_tab_view_box">
            <label for="sc_tab_item" class="sc_tab"><?php echo $label ?></label>
            <span class="sc_tab_item" id="inp_<?php echo $id_ref; ?>"><?php echo $label_value ?></span>
        </div> <?php
            }
        }

        if (!function_exists('new_ent_detail')) {
            function new_ent_detail($cnt, $id_ref, $label, $label_value, $lenght, $type)
            {  ?>
        <!-- <a href="" class="links"></a> -->
        <div class="sc_tab_view_box">
            <label for="sc_tab_item" class="sc_tab"><?php echo $label ?></label>
            <input class="sc_tab_item" type="<?php echo $type; ?>" id="inp_<?php echo $id_ref . "_" . $cnt; ?>" maxlength="<?php echo $lenght; ?>" name="<?php echo $id_ref . "_" . $cnt ?>" value="<?php $label_value  ?>">
        </div> <?php
            }
        }

        if (!function_exists('sc_option_tabs')) {
            function sc_option_tabs($tab_ref, $tab_state, $tabs_item, $fafa)
            {
                $currentURL = $_SERVER['REQUEST_URI'];
                // echo $currentURL;
                echo ' <div class="sc_tab_bloc" id="tabs_' . $tab_ref . '"><a href="' . $currentURL . '#tab_' . $tab_ref . '" id="' . $tab_ref . '" class="' . $tab_state . ' no_underline"><span class="sc_tab">' . $tabs_item . '</a><a href="' . $currentURL . '#edit_' . $tab_ref . '" id="a_' . $tab_ref . '" class="' . $tab_state . ' no_underline"><span class="sc_tab"><i title="edit this field" id="i_' . $tab_ref . '" class="fa icons_action option_tab">' . $fafa . '</i></a></div>';
            }
        }
        // gettint the Meta value by metakey and id function
        if (!function_exists('get_mid_by_key')) {
            function get_mid_by_key($post_id, $meta_key)
            {
                global $wpdb;
                $mid = $wpdb->get_var($wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = %d AND meta_key = %s", $post_id, $meta_key));
                if ($mid != '')
                    // return (int) $mid;
                    return $mid;

                return false;
            }
        }

        //random secure string generator
        if (!function_exists('secure_random_string')) {
            function secure_random_string($length)
            {
                $random_string = '';
                for ($i = 0; $i < $length; $i++) {
                    $number = random_int(0, 36);
                    $character = base_convert($number, 10, 36);
                    $random_string .= $character;
                }
                return $random_string;
            }
        }

        // ------------------------------------------------------------------------------------Enterprise functions 

        if (!function_exists('get_enterprise_details')) {
            function get_enterprise_details($id, $value)
            {
                global $wpdb;
                // $get_id = "no";
                foreach ($wpdb->get_results("SELECT * FROM sc_enterprise where ent_id=$id") as $key => $row) {
                    $get_result = $row->$value;
                    return $get_result;
                }
            }
        }

        if (!function_exists('ent_emp_detail')) {
            function ent_emp_detail($ref, $emp_name, $percent)

            {  ?>
        <div class="sc_tab_view_box emp">
            <a href="<?php echo home_url("employee/?id=$ref") ?>" title="employee N°<?php echo $ref; ?>" for="sc_tab_item" class="sc_tab emp_link">
                <span class="sc_tab_item"><?php echo $emp_name ?></span>
            </a>
            <a href="" class="">
                <span class="sc_tab_item emp_percent" id="emp_<?php echo $ref ?>" title=""><?php echo $percent ?></span>
            </a>
        </div> <?php
            }
        }



        //get the employees of this enterprise
        if (!function_exists('get_ent_employees')) {
            function get_ent_employees($ent_id)
            {
                global $wpdb;
                // loop to get the list of ids of employee related to an enterprise
                foreach ($wpdb->get_results("SELECT (sc_for.emp_id) AS ent_emp_id FROM sc_work_for sc_for, sc_enterprise sc_ent where sc_ent.ent_id=$ent_id and sc_for.ent_id=sc_ent.ent_id  and sc_for.emp_archive=0") as $key => $row) {
                    $emp_ids = $row->ent_emp_id; //id gotten

                    // loop again to get the list of employee names base on each obtained id
                    foreach ($wpdb->get_results("SELECT * FROM sc_employee sc_emp, sc_work_for sc_wf where sc_emp.emp_id=$emp_ids") as $key => $row) {
                        $emp_names = $row->emp_name; //names gotten
                    }
                    if ($emp_ids == 14 || $emp_ids == 42 || $emp_ids == 24 || $emp_ids == 21 || $emp_ids == 28) { ?><style>
                    span#emp_<?php echo $emp_ids; ?> {
                        background-color: red;
                    }
                </style><?php
                    }
                    if ($emp_ids == 24 || $emp_ids == 28 || $emp_ids == 43 || $emp_ids == 33 || $emp_ids == 10 || $emp_ids == 50) { ?><style>
                    span#emp_<?php echo $emp_ids; ?> {
                        background-color: orange;
                    }
                </style><?php
                    }
                    // insert both the employees id and name into the enterprise details information bloc format.
                    ent_emp_detail($emp_ids, $emp_names, "");
                }
            }
        }



        //get the employees of this enterprise
        if (!function_exists('count_employees')) {
            function count_employees($ent_id)
            {
                global $wpdb;
                // loop to get the list of ids of employee related to an enterprise
                foreach ($wpdb->get_results("SELECT COUNT(sc_for.emp_id) AS nbr FROM sc_work_for sc_for, sc_enterprise sc_ent where sc_ent.ent_id=$ent_id and sc_for.ent_id=sc_ent.ent_id and sc_for.emp_archive=0") as $key => $row) {
                    $counter = $row->nbr; //id gotten
                    echo "<span class='counts'>$counter</span>";
                }
            }
        }

        // ----------------------------------------------------------------------------------------Employee Functions


        if (!function_exists('emp_enterprise_list')) {
            function emp_enterprise_list($emp_ent_id, $sel_emp_id)

            {
                global $wpdb, $i;
                $i = 1;
                foreach ($wpdb->get_results("SELECT (sc_for.ent_id) AS ent_id FROM sc_work_for sc_for, sc_employee sc_emp where sc_emp.emp_id=$sel_emp_id and sc_for.emp_id=sc_emp.emp_id and sc_for.emp_archive=0") as $key => $row) {
                    $emp_ent_id = $row->ent_id;
                    foreach ($wpdb->get_results("SELECT * FROM sc_enterprise where ent_id=$emp_ent_id") as $key => $row) {
                        $enterprise = $row->business_name;
                        $i = 0;
                        echo '<a id="ref_' . $i . '" href="' . home_url("enterprise/?id=$emp_ent_id") . '"><option id="ent_' . $emp_ent_id . '" value="' . $emp_ent_id . '" class="_' . $emp_ent_id . ',' . $enterprise . '">' . $enterprise . '</option></a>';
                        $i++;
                    }
                    $i++;
                }
            }
        }



        if (!function_exists('deleted_emp_enterprise_list')) {
            function deleted_emp_enterprise_list($emp_ent_id, $sel_emp_id)

            {
                global $wpdb, $i;
                $i = 1;
                foreach ($wpdb->get_results("SELECT (sc_for.ent_id) AS ent_id FROM sc_work_for sc_for, sc_employee sc_emp where sc_emp.emp_id=$sel_emp_id and sc_for.emp_id=sc_emp.emp_id and sc_for.emp_archive=1") as $key => $row) {
                    $emp_ent_id = $row->ent_id;
                    foreach ($wpdb->get_results("SELECT * FROM sc_enterprise where ent_id=$emp_ent_id") as $key => $row) {
                        $enterprise = $row->business_name;
                        $i = 0;
                        echo '<a id="ref_' . $i . '" href="' . home_url("enterprise/?id=$emp_ent_id") . '"><option id="ent_' . $emp_ent_id . '" value="' . $emp_ent_id . '" class="_' . $emp_ent_id . ',' . $enterprise . '">' . $enterprise . '</option></a>';
                        $i++;
                    }
                    $i++;
                }
            }
        }


        if (!function_exists('sc_action_buttons')) {
            function sc_action_buttons($svg_icon, $sc_title, $tab_ref, $tab_state, $tabs_item, $fafa, $svg_id)
            {
                echo ' <a href="' . $tab_ref . '" id="do_' . $svg_id . '" alt="' . $tabs_item . '" title="' . $sc_title . '"  class="no_border action_btns ' . $tab_state . ' no_underline"><span class="icons">' . $tabs_item . '<i class="fa ' . $fafa . '"></i>' . $svg_icon . '</span></a>';
            }
        }


        // =================================================================================================================================
        // =========================================== Teams constructor functions ===========================================
        // =================================================================================================================================


        if (!function_exists('setting_team_states')) {
            function setting_team_states($sec_title, $label, $label_id, $label_conf, $selected)
            { ?> <!-- pin -->
        <div class="s_sub_main">
            <div class="option_main_bloc">
                <div class="option_section">
                    <div class="option_section_title">
                        <?php echo $sec_title; ?>
                    </div>
                    <div class="option_section_state">
                        <div class="team_section"> <?php
                                                    for ($i = 0; $i < 3; $i++) { ?>
                                <div class="selectar">
                                    <div class="labels">
                                        <label for="enterprise"><?php echo $label[$i]; ?></label>
                                    </div>
                                    <div class="selects">
                                        <select class="sel_ent" name="enterprise" id="get_<?php echo $label_id[$i]; ?>">
                                            <option value="" id="ent_option">Select</option>
                                        </select>
                                    </div>
                                    <div class="adders">
                                        <span id="lab_<?php echo $label_id[$i]; ?>" class="trns_btn sc_shadow"><?php echo $label_conf[$i]; ?></span>
                                    </div>
                                </div>
                                <div class="added_entity" id="add_ent">
                                    <span class="ent_added" id="selected_<?php echo $label_id[$i]; ?>"><?php echo $selected[$i]; ?></span>
                                </div> <?php
                                                    } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div> <?php
            }
        }


        // =================================================================================================================================
        // =========================================== Setting State constructor functions ===========================================
        // =================================================================================================================================

        if (!function_exists('setting_security_states')) {
            function setting_security_states($sec_title, $action_icon, $state_icon, $caption, $hints)
            { ?> <!-- pin -->
        <div class="s_sub_main">
            <div class="option_main_bloc">
                <div class="option_section">
                    <div class="option_section_title">
                        <?php echo $sec_title; ?>
                        <span class="icon"><?php echo $action_icon; ?></span>
                    </div>
                    <div class="option_section_state">
                        <span class="section_icon"><?php echo $state_icon; ?></span>
                        <div class="section_state_caption">
                            <span class="state_caption"><?php echo $caption; ?></span>
                            <span class="section_state_hints"><?php echo $hints; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div> <?php
            }
        }


        // =================================================================================================================================
        // =========================================== Setting State constructor functions ===========================================
        // =================================================================================================================================

        if (!function_exists('setting_custom_report_forms')) {
            function setting_custom_report_forms($sec_title, $action_icon, $state_icon, $boxes_choice_label, $boxes_choice_attr, $repor_hints, $reports_param_label, $reports_parameter)
            { ?> <!-- pin -->
        <div class="s_sub_main">
            <div class="option_main_bloc">
                <div class="option_section">
                    <div class="option_section_title">
                        <?php echo $sec_title; ?>
                        <span class="icon"><?php echo $action_icon; ?></span>
                    </div>
                    <div class="option_section_state">
                        <span class="section_icon"><?php echo $state_icon; ?></span>
                        <div class="section_state_caption">
                            <div class="form_block">
                                <div class="choice_box">
                                    <?php
                                    for ($i = 0; $i < count($boxes_choice_label); $i++) {
                                    ?>
                                        <span class="check_boxs">
                                            <input type="checkbox" name="<?php echo $boxes_choice_attr[$i]; ?>" id="<?php echo $boxes_choice_attr[$i]; ?>">
                                            <label for="<?php echo $boxes_choice_attr[$i]; ?>"><?php echo $boxes_choice_label[$i]; ?></label>
                                        </span>
                                    <?php
                                    } ?>
                                </div>
                                <div class="parameter_zone">
                                    <span><?php echo $repor_hints; ?></span>
                                    <div class="bulk_param">
                                        <?php
                                        for ($i = 0; $i < count($reports_param_label); $i++) { ?>
                                            <span class="check_boxs param_box">
                                                <label class="sel_ent" for="ent"><?php echo $reports_param_label[$i]; ?></label>
                                                <select class="get_ent" name="get_<?php echo substr($reports_param_label[$i], 0, 4); ?>" id="id_<?php echo substr($reports_param_label[$i], 0, 4); ?>">
                                                    <option value="" class="options" id="">Select <?php echo $reports_param_label[$i]; ?></option>
                                                </select>
                                            </span>
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="response"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <?php
            }
        }

        if (!function_exists('load_enterprise')) {
            function load_enterprise($reports_param_label)
            { ?>
        <div class="bulk_param"> <?php
                                    for ($i = 0; $i < count($reports_param_label); $i++) { ?>
                <select class="get_ent" name="get_<?php echo substr($reports_param_label[$i], 0, 4); ?>" id="id_<?php echo substr($reports_param_label[$i], 0, 4); ?>">
                    <option value="" class="options" id="">Select <?php echo $reports_param_label[$i]; ?></option>
                </select> <?php } ?>
            <div class="response"></div>
        </div> <?php
            }
        }
        if (!function_exists('load_del_enterprise')) {
            function load_del_enterprise($reports_param_label)
            { ?>
        <div class="bulk_param"> <?php
                                    for ($i = 0; $i < count($reports_param_label); $i++) { ?>
                <select class="get_ent deleted" name="get_<?php echo substr($reports_param_label[$i], 0, 4); ?>" id="id_<?php echo substr($reports_param_label[$i], 0, 4); ?>">
                    <option value="" class="options " id="">Select <?php echo $reports_param_label[$i]; ?></option>
                </select> <?php } ?>
            <div class="response"></div>
        </div> <?php
            }
        }


        if (!function_exists('load_employees')) {
            function load_employees($emp_attributs, $emp_labels)
            { ?>
        <div class="bulk_param"> <?php
                                    for ($i = 0; $i < count($emp_attributs); $i++) { ?>
                <select class="get_ent" name="get_<?php echo substr($emp_attributs[$i], 0, 4); ?>" id="id_<?php echo substr($emp_attributs[$i], 0, 4); ?>">
                    <option value="" class="options" id="">Select <?php echo $emp_labels[$i]; ?></option>
                </select> <?php } ?>
            <div class="confirm">
                <span>Do you confirm you choice</span>
                <div class="buttons" id="confirm_bloc">
                    <button id="confirm_y" class="sc_btns">Yes i do</button>
                    <button id="confirm_n" class="sc_btns">No, cancel</button>
                </div>
            </div>
            <input type="hidden" name="" class="" id="the_emp_id" value="">
            <input type="hidden" name="" class="" id="the_emp_name" value="">
            <input type="hidden" name="" class="" id="the_method" value="">
            <div class="response"></div>
        </div> <?php
            }
        }
        if (!function_exists('ent_team')) {
            function ent_team($sc_user_id, $ent_name, $tot_emp, $fa_icon, $none, $crown_icon)
            {
                global $wpdb;
                $get_ent_ids = "SELECT sc_m.ent_id, sc_ent.business_name AS ent_name, dcu.ID FROM sc_manage sc_m INNER JOIN sc_enterprise sc_ent ON sc_m.ent_id = sc_ent.ent_id INNER JOIN dc_users dcu ON dcu.ID=sc_m.userid AND sc_m.userid=$sc_user_id";
                foreach ($wpdb->get_results($get_ent_ids) as $key => $row) {
                    $ent_id = $row->ent_id;
                    $ent_name = $row->ent_name; ?>
            <a href="#<?php echo $ent_id; ?>" class="links">
                <div class="sc_tab_view_box">
                    <i class="fa <?php echo $fa_icon; ?>"></i>
                    <label for="sc_tab_item" class="sc_tab"><?php echo $ent_name; ?></label>
                    <span class="sc_tab_item" id="inp_"><?php echo $tot_emp; ?></span>
                    <span class="team_leader <?php echo $none; ?>"><?php echo $crown_icon; ?></span>
                </div>
            </a><?php
                }
            }
        }


        /// ====================== ICONS SVG GENERATOR =================
        @$del_icon = '<svg class="svg svg_' . @$svg_id . '" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21" height="21" viewBox="0 0 21 21">
 <image id="delete" width="21" height="21" xlink:href="data:image/png;base64,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"/></svg>';
        @$report_icon = '<svg id="report" class="svg svg_' . @$svg_id . '" xmlns="http://www.w3.org/2000/svg" width="24.889" height="24.889" viewBox="0 0 24.889 24.889">
 <path id="Path_437" data-name="Path 437" d="M0,0H24.889V24.889H0Z" fill="none"/><path id="Path_438" data-name="Path 438" d="M14,3V7.148a1.037,1.037,0,0,0,1.037,1.037h4.148" transform="translate(0.518 0.111)" fill="none" stroke="#7e84a3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_439" data-name="Path 439" d="M17.444,21.667H7.074A2.074,2.074,0,0,1,5,19.592V5.074A2.074,2.074,0,0,1,7.074,3h7.259l5.185,5.185V19.592A2.074,2.074,0,0,1,17.444,21.667Z" transform="translate(0.185 0.111)" fill="none" stroke="#7e84a3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><line id="Line_29" data-name="Line 29" y2="5.894" transform="translate(12.629 11.418)" fill="none" stroke="#7e84a3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_440" data-name="Path 440" d="M9,14l3.111,3.111L15.222,14" transform="translate(0.333 0.518)" fill="none" stroke="#7e84a3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>';
        @$edit_icon = '<svg class="svg svg_' . @$svg_id . '" xmlns="http://www.w3.org/2000/svg" width="24.022" height="21.356" viewBox="0 0 24.022 21.356">
 <path id="edit" d="M16.778,14.312l1.335-1.335a.335.335,0,0,1,.571.238V19.28a2,2,0,0,1-2,2H2a2,2,0,0,1-2-2V4.6a2,2,0,0,1,2-2H13.408a.336.336,0,0,1,.238.571L12.312,4.5a.331.331,0,0,1-.238.1H2V19.28h14.68V14.546A.328.328,0,0,1,16.778,14.312ZM23.309,5.9,12.357,16.848l-3.77.417a1.723,1.723,0,0,1-1.9-1.9l.417-3.77L18.054.641a2.434,2.434,0,0,1,3.449,0l1.8,1.8a2.443,2.443,0,0,1,0,3.453ZM19.189,7.185,16.766,4.762,9.017,12.515l-.3,2.723,2.723-.3Zm2.7-3.324-1.8-1.8a.435.435,0,0,0-.617,0L18.184,3.348l2.423,2.423L21.9,4.482A.444.444,0,0,0,21.891,3.861Z" transform="translate(0 0.075)" fill="rgba(0,0,0,0.6)"/></svg>';
        @$add_icon = '<svg  class="svg svg_' . @$svg_id . '" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17">
 <image id="add_1_" data-name="add (1)" width="17" height="17" xlink:href="data:image/png;base64,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"/></svg>';
        @$crown_icon = '<svg class="svg svg_' . @$svg_id . '" data-name="Group 401" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17.275" height="12.617" viewBox="0 0 17.275 12.617"><defs><clipPath id="clip-path"><rect id="Rectangle_669" data-name="Rectangle 669" width="17.275" height="12.617" fill="#21d59b"/></clipPath></defs><g id="Group_400" data-name="Group 400" clip-path="url(#clip-path)"><path id="Path_465" data-name="Path 465" d="M4.829,6.019c.059-.1.11-.191.16-.28Q6.5,3.072,8.007.405A.652.652,0,0,1,8.981.122a1.031,1.031,0,0,1,.274.328q1.523,2.683,3.036,5.371c.037.065.077.128.122.2L14.525,5c.571-.277,1.143-.551,1.712-.833a.679.679,0,0,1,1.006.809Q16.444,8.49,15.651,12a.682.682,0,0,1-.774.614H2.357a.683.683,0,0,1-.786-.625Q.795,8.465.023,4.936a.662.662,0,0,1,.237-.724A.663.663,0,0,1,1,4.165c1.266.615,2.532,1.228,3.827,1.855" transform="translate(0 0)" fill="#21d59b"/></g></svg>';
        @$user_icon = '<svg id="Icons_Navigation_icon_12_states_" data-name="Icons / Navigation icon (12 states)" xmlns="http://www.w3.org/2000/svg" width="26.404" height="26.404" viewBox="0 0 26.404 26.404">
 <g id="ic_users"><path id="Path_393" data-name="Path 393" d="M0,0H26.4V26.4H0Z" fill="none"/><ellipse id="Ellipse_3" data-name="Ellipse 3" cx="4.5" cy="4" rx="4.5" ry="4" transform="translate(5.197 3.698)" fill="none" stroke="#7e84a3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_394" data-name="Path 394" d="M3,21.6V19.4A4.4,4.4,0,0,1,7.4,15h4.4a4.4,4.4,0,0,1,4.4,4.4v2.2" transform="translate(0.3 1.502)" fill="none" stroke="#7e84a3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_395" data-name="Path 395" d="M16,3.13a4.4,4.4,0,0,1,0,8.526" transform="translate(1.602 0.313)" fill="none" stroke="#7e84a3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_396" data-name="Path 396" d="M21.3,21.586v-2.2A4.4,4.4,0,0,0,18,15.15" transform="translate(1.803 1.517)" fill="none" stroke="#7e84a3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></g></svg>';
        @$stat_icon = '<svg id="Icons_Navigation_icon_12_states_" data-name="Icons / Navigation icon (12 states)" xmlns="http://www.w3.org/2000/svg" width="26.404" height="26.404" viewBox="0 0 26.404 26.404">
 <g id="ic_dashboard"><g id="home"><path id="Path_372" data-name="Path 372" d="M0,0H26.4V26.4H0Z" fill="none"/></g><path id="Shape" d="M14.3,22H1.1A1.1,1.1,0,0,1,0,20.9V7.15a2.2,2.2,0,0,1,2.2-2.2H6.6V2.2A2.2,2.2,0,0,1,8.8,0h4.4a2.2,2.2,0,0,1,2.2,2.2V9.9h4.4A2.2,2.2,0,0,1,22,12.1v8.8A1.1,1.1,0,0,1,20.9,22Zm5.5-2.2V12.1H15.4v7.7Zm-11,0h4.4V12.1q0-.033,0-.065V2.2H8.8Zm-6.6,0H6.6V7.15H2.2Z" transform="translate(1.997 2.39)" fill="#7e84a3"/></g></svg>';
        @$msg_icon = '<svg id="Icons_Navigation_icon_12_states_" data-name="Icons / Navigation icon (12 states)" xmlns="http://www.w3.org/2000/svg" width="26.981" height="26.981" viewBox="0 0 26.981 26.981">
 <g id="ic_message"><path id="Path_381" data-name="Path 381" d="M0,0H26.981V26.981H0Z" fill="none"/><path id="Path_382" data-name="Path 382" d="M3,21.99l1.461-4.384A8.338,8.338,0,0,1,6.822,5.943a11.08,11.08,0,0,1,13.317.54,8.277,8.277,0,0,1,1.156,11.8A10.942,10.942,0,0,1,8.284,20.865L3,21.99" transform="translate(0.373 0.494)" fill="none" stroke="#7e84a3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><line id="Line_15" data-name="Line 15" y2="0.011" transform="translate(13.49 13.49)" fill="none" stroke="#7e84a3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><line id="Line_16" data-name="Line 16" y2="0.011" transform="translate(8.994 13.49)" fill="none" stroke="#7e84a3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><line id="Line_17" data-name="Line 17" y2="0.011" transform="translate(17.987 13.49)" fill="none" stroke="#7e84a3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></g></svg>';
        @$valid_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
 <g id="Group_398" data-name="Group 398" transform="translate(-764 -287)"><circle id="Ellipse_12" data-name="Ellipse 12" cx="14.5" cy="14.5" r="14.5" transform="translate(764 287)" fill="#0bac00"/><path id="Path_463" data-name="Path 463" d="M14601.5,472.087l7.408,7.408,13.3-13.3" transform="translate(-13833.355 -172.192)" fill="none" stroke="#fff" stroke-width="4"/></g></svg>';
        @$hint_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" color="rgb(255,50,0)" viewBox="0 0 65 65"><g id="Icon_ionic-md-information-circle-outline" data-name="Icon ionic-md-information-circle-outline" transform="translate(-7.5 -7.5)"><path id="Path_469" data-name="Path 469" d="M40,14.063a25.927,25.927,0,1,1-18.344,7.594A25.83,25.83,0,0,1,40,14.063M40,7.5A32.5,32.5,0,1,0,72.5,40,32.5,32.5,0,0,0,40,7.5Z"/><path id="Path_470" data-name="Path 470" d="M43.281,56.25H36.719V36.719h6.563Zm0-25.937H36.719V23.75h6.563Z"/></g></svg>';
        @$restore_icon = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="160" height="163" viewBox="0 0 160 163">
 <defs><pattern id="pattern" preserveAspectRatio="none" width="100%" height="100%" viewBox="0 0 139 141"><image width="139" height="141" xlink:href="data:image/png;base64,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"/></pattern></defs><rect id="Image_1" data-name="Image 1" width="160" height="163" fill="url(#pattern)"/></svg>';

                /*@$user_icon='';
                @$user_icon='';
                @$user_icon='';
                @$user_icon='';
                @$user_icon=''; */