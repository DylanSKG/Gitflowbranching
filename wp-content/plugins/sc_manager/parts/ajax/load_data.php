<?php
// declare main variables as global
global $status, $get_state, $new_emp_id, $emp_efed_ms, $emp_state_ms, $emp_state, $emp_county_ms, $emp_fed_all, $emp_pay_rate_amt, $emp_pay_rate_status, $emp_ee_classif,
    $emp_doc_status, $emp_access, $emp_status, $emp_hire_date, $emp_end_date, $emp_end_reason, $emp_last_d_worked, $emp_abs_start_date,
    $emp_abs_ret_date, $emp_fed_all, $emp_state_all, $emp_work_state, $emp_status, $emp_hire_date, $emp_end_date, $emp_end_reason, $emp_last_d_worked, $emp_abs_start_date,
    $emp_abs_ret_date, $emp_work_email, $emp_contract, $emp_pay_type, $emp_pay_freq, $emp_hdep_nbr, $emp_hdep_desc, $emp_ec_name, $emp_ec_phone, $emp_ec_email, $emp_ent_id,
    $ent_name, $legal_b_adr, $ent_type, $ent_branch_code, $ent_com_code, $ent_city, $ent_state, $ent_email, $ent_zip, $ent_industry, $ent_deli_adr, $ent_naics, $ent_start_d,
    $ent_ein, $ent_contact_name, $ent_tel, $ent_email, $ent_ssn, $ent_dob, $ent_title, $pers_home_adr, $ent_status, $ent_d_applied, $ent_sit_confirm, $ent_sit1, $ent_sit1_status,
    $ent_sui1, $ent_sui1_poa, $ent_sit2, $ent_sit2_status, $ent_sui2, $ent_sui2_poa, $ent_sit3, $ent_sit3_status, $ent_username, $ent_password, $ent_sit_number, $reason_for,
    $ent_call_md_sit, $ent_md_sui_poa_status, $edit_emp_id;


// mysqli db connection
// Include WordPress configuration file
// require_once 'path/to/wp-config.php';

// Database credentials from wp-config.php
define('WP_USE_THEMES', false);
require_once('../../../../../wp-load.php');
$host = $wpdb->dbhost;
$username = $wpdb->dbuser;
$password = $acc;
$database = $wpdb->dbname;
// echo __FILE__;

// echo $host, $username, $password, $database;

$connection =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

function conn_db($query)
{
    $connection =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$connection) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query failed: ' . mysqli_error($connection));
    }

    $connection->query($query);
    $row = mysqli_fetch_assoc($result);
}

// Initialize $wpdb
global $wpdb, $i;

if (isset($_POST['query'])) {
    $search_string = $_POST['query'];
}

if (isset($_POST['from'])) {
    $search_option = $_POST['from'];
}


function shuffleWordsMatrix($strings)
{
    $words = [];

    // Split strings into words and find the maximum number of words
    // foreach ($strings as $string) {
    $stringWords = str_word_count($strings);
    for ($i = 0; $i < $stringWords; $i++) {
        array_push($words, explode(" ", $strings));
    }
    // $maxWords = max($maxWords, count($stringWords));
    // }

    // Shuffle words' positions in matrix form
    $shuffledWords = [];
    for ($i = 0; $i < count($words); $i++) {
        $shuffledWords[$i] = [];
        foreach ($words as $stringWords) {
            if (isset($stringWords[$i])) {
                $shuffledWords[$i][0] = $stringWords[$i];
            }
        }
        shuffle($shuffledWords[$i]);
    }

    // Return shuffled words as an array
    return $shuffledWords;
}

if (isset($_POST['home'])) {

    $result = shuffleWordsMatrix($search_string);

    $sql1 = "";
    if ($search_option == "ent") {
        $from = "enterprise";
        $field = "business_name";
        for ($i = 0; $i < count($result); $i++) {
            $likes = $likes;
            $likes = $likes . " or $field LIKE '%" . implode(', ', $result[$i]) . "%'";
        }
        $likies = substr($likes, 3);

        $sql1 = "SELECT ent_id, business_name, ent_archive FROM sc_$from where $likies ORDER BY ent_archive ASC ";
        $query = $sql1;
    } else if ($search_option == "emp") {
        $from = "employee";
        $field = "emp_name";
        for ($i = 0; $i < count($result); $i++) {
            $likes = $likes;
            $likes = $likes . " or $field LIKE '%" . implode(', ', $result[$i]) . "%'";
        }
        $likies = substr($likes, 3);

        $sql2 = "SELECT sc_emp.emp_id, sc_emp.emp_name, sc_wf.emp_archive FROM sc_employee sc_emp, sc_work_for sc_wf where sc_wf.emp_id=sc_emp.emp_id AND $likies ORDER BY sc_wf.emp_archive ASC limit 150";
        $query = $sql2;
        // echo $sql2;
    }
    // echo "SELECT sc_emp.emp_id, sc_emp.emp_name, sc_wf.emp_archive FROM sc_employee sc_emp, sc_work_for sc_wf where sc_wf.emp_id=sc_emp.emp_id AND $likies ORDER BY sc_wf.emp_archive ASC ";
    // $connection = mysqli_connect('localhost', 'root', '', 'scman'); SELECT sc_emp.emp_id, sc_emp.emp_name, sc_wf.emp_archive FROM sc_employee sc_emp, sc_work_for sc_wf where sc_wf.emp_id=sc_emp.emp_id
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query failed: ' . mysqli_error($connection));
    }

    // Retrieve data from the database
    // $query = "SELECT * FROM table_name";

    // Iterate over the results using a foreach loop
    $row = mysqli_fetch_assoc($result);

    foreach ($result as $key => $row) {
        // Access column name and corresponding value
        // echo $column . ': ' . $value . '<br>';
        if (isset($row['ent_id']) && isset($row['business_name'])) {
            // Access the value associated with the 'enterprise_id' key
            $enterpriseId = $row['ent_id'];
            $business_name = $row['business_name'];
            $get_state = $row['ent_archive'];
        } else {
            // Handle the case where the key does not exist
            // or perform alternative actions

        }

        if (isset($row['emp_id']) && isset($row['emp_name'])) {
            // Access the value associated with the 'enterprise_id' key
            $emp_id = $row['emp_id'];
            $emp_name = $row['emp_name'];
            $get_state = @$row['emp_archive'];
        } else {
            // Handle the case where the key does not exist
            // or perform alternative actions
        }

        if ($search_option == "ent") {
            $the_id = $enterpriseId;
            $the_name = $business_name;
            $status = $get_state;
        } else if ($search_option == "emp") {
            $the_id = $emp_id;
            $the_name = $emp_name;
            $status = $get_state;
        }
        if (!empty($the_name) && !empty($the_name)) {
            // echo '';
            $i++; ?>
            <li id='status_<?php echo $i . $status; ?>' class="sc_emp result status_<?php echo $status; ?>">
                <i class="fa-solid fa-chevron-right"></i>
                <a id="<?php echo $the_id; ?>" class="ref no_underline srch_trk" href="<?php echo home_url('/') . $from . "?id=" . $the_id ?>"><?php echo $the_name . " => " . $the_id;  ?></a>
            </li> <?php
                } else {
                    echo "Sorry! No match";
                }
            }
        }

        // ===========================================capture the recent newly searched id
        if (!function_exists('get_the_searched')) {

            function get_the_searched($connection, $sc_user_id, $clickedID)
            {
                // Step 1: Retrieve the clicked ID and store it in an array variable
                $clickedIDs = [];
                $clickedIDs[] = $clickedID;

                // Step 2: Save the array in the database
                $serializedIDs = serialize($clickedIDs);
                // Assuming you have a "results" table with a column named "clicked_ids"
                $query = "INSERT INTO sc_tracks (userid_track,tr_recent_search) VALUES ('$sc_user_id,$serializedIDs')";
                mysqli_query($connection, $query);

                // Step 3: Optionally, you can return the saved ID or perform any other actions
                return $clickedID;
            }
        }

        get_the_searched($connection, $sc_user_id, $clickedID);

        //getting from new employee form
        if (isset($_POST['the_id']) && isset($_POST['from']) && $_POST['from'] == 'edit_ent') {
            $ent_id = $_POST['the_id'];

            $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            // ================================================================================================ DB response verification 
            if ($db === false) {
                // error message if db connection fails
                die("ERROR: Could not connect. " . mysqli_connect_error());
            } else {
                // ============================================================================================ Initialization zone
                $ent_val_array = [];        /*echo $ent_id ;*/
                $colum_i = 1;   //init the ent column counter
                $ent_colm_array  = []; //initialize array

                // ============================================================================================ var Preparation zone
                // ++++++++++++++++++++Company Details 
                $cd_array = ['$ent_name', '$legal_b_adr', '$ent_type', '$ent_branch_code', '$ent_com_code', '$ent_city', '$ent_state', '$ent_zip', '$ent_industry', '$ent_deli_adr', '$ent_naics', '$ent_start_d', '$ent_ein'];
                for ($i = 0; $i < count($cd_array); $i++) {
                    (isset($_POST['cd_' . $i])) ? $cd_array[$i] = $_POST['cd_' . $i] /* echo "<br>".$cd_array[$i] */ : $i;
                    array_push($ent_val_array, $cd_array[$i]);
                }
                // echo "<br>cd = " . count($cd_array); //reveals the item counter


                // ++++++++++++++++++++ Owner Details 
                $od_array = ['$ent_contact_name', '$ent_tel', '$ent_email', '$ent_ssn', '$ent_dob', '$ent_title', '$pers_home_adr'];
                for ($i = 0; $i < count($od_array); $i++) {
                    (isset($_POST['od_' . $i])) ? $od_array[$i] = $_POST['od_' . $i] /* echo "<br>" . $od_array[$i] */ : $i;
                    array_push($ent_val_array, $od_array[$i]);
                }
                // echo "<br>od = " . count($od_array); //reveals the item counter


                // ++++++++++++++++++++ State ID App and Follow Up 
                $su_array = ['$ent_status', '$ent_d_applied'];
                for ($i = 0; $i < count($su_array); $i++) {
                    (isset($_POST['su_' . $i])) ? $su_array[$i] = $_POST['su_' . $i] /* echo "<br>" . $su_array[$i] */  : $i;
                    array_push($ent_val_array, $su_array[$i]);
                }
                // echo "<br>su = " . count($su_array); //reveals the item counter


                // ++++++++++++++++++++ State ID and POA Details 
                $sa_array = [
                    '$ent_sit_confirm', '$ent_sit1', '$ent_sit1_status', '$ent_sui1', '$ent_sui1_poa', '$ent_sit2', '$ent_sit2_status', '$ent_sui2', '$ent_sui2_poa',
                    '$ent_sit3', '$ent_sit3_status', '$sui3', '$sui3_poa', '$ent_username', '$ent_password', '$ent_sit_number', '$reason_for', '$ent_call_md_sit', '$ent_md_sui_poa_status'
                ];
                for ($i = 0; $i < count($sa_array); $i++) {
                    (isset($_POST['sa_' . $i])) ? $sa_array[$i] = $_POST['sa_' . $i] /* echo "<br>" . $sa_array[$i] */  : $i;
                    array_push($ent_val_array, $sa_array[$i]);
                }
                // echo "<br>sa = " . count($sa_array); //reveals the item counter

                // ============================================================================================ DB Bulk action zone 
                for ($i = 0; $i < count($ent_val_array); $i++) { /*echo "<br> => ".$ent_val_array[$i];*/
                }

                //get the enterprise columns in array
                $ent_colm_array = [
                    'business_name', 'legal_b_adr', 'business_type', 'branch_code', 'co_code', 'city', 'state', 'zip', 'industry', 'deli_adr',  'naics', 'start_date', 'ein', 'contact_name', 'telephone', 'email', 'ssn', 'dob', 'title', 'pers_home_adr', 'status',
                    'date_applied', 'sit_confirmation', 'sit1', 'sit1_status', 'sui1', 'sui1_poa', 'sit2', 'sit2_status', 'sui2', 'sui2_poa', 'sit3', 'sit3_status', 'sui3', 'sui3_poa',
                    'username', 'password', 'sit_number', 'reason_for', 'call_md_sit', 'md_sui_poa_status'
                ];

                function inject_column_n_array($ent_colm_array, $ent_val_array)
                {
                    global $req;
                    $ent_colmn_push = [];
                    for ($i = 0; $i < count($ent_colm_array); $i++) {
                        array_push($ent_colmn_push, "`" . $ent_colm_array[$i] . "` ='$ent_val_array[$i]'");
                    }

                    $req = implode(',', $ent_colmn_push);
                    return $req;
                }


                // $req = inject_column_n_array($ent_colm_array, $ent_val_array);

                $req_clns = inject_column_n_array($ent_colm_array, $ent_val_array);

                // $req = substr($req, 0, -1); 
                // echo $req_clns;
                $edit_sqls_ent = "UPDATE `scman`.`sc_enterprise` SET $req_clns WHERE  `ent_id`=$ent_id  AND `ent_archive`=0";

                $is_ent_edited = $db->query($edit_sqls_ent);

                if (!empty($is_ent_edited)) {
                    echo '<span class="action_status">Enterprise edited successfully</span><div class="message"><button id="view_emp" class="sc_btns">view employee<i class="fa fa-eye"></i></button><button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
                } else {
                    echo '<span class="action_status" style="color: white;box-shadow: inset 0px 0px 90px red;}">Error! failed to edit enterprise infos</span><div class="message"> <button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
                }
            }
        }

        //getting from new employee form
        if (isset($_POST['the_id']) && $_POST['from']) {

            //create tables used for storing  plugin information
            $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if ($db === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            } else {

                // main var
                $sel_ent_id = $_POST['the_id'];
                $the_emp_id = $_POST['the_emp_id'];
                $methods = $_POST['methods'];

                // verify its existance
                if (isset($_POST['methods'])){
                    $methods = $_POST['methods'];
                }

                if ($methods == "new") {

                    // Personnal Infos 
                    $emp_fname = $_POST['pa_0'];
                    $emp_lname = $_POST['pa_1'];
                    $emp_adr1 = $_POST['pa_2'];
                    $emp_adr2 = $_POST['pa_3'];
                    $emp_ptel = $_POST['pa_4'];
                    $emp_city = $_POST['pa_5'];
                    $emp_email = $_POST['pa_6'];
                    $emp_state = $_POST['pa_7'];
                    $emp_ssn_tin = $_POST['pa_8'];
                    $emp_zip = $_POST['pa_9'];
                    $emp_gender = $_POST['pa_10'];
                    $emp_bdate = $_POST['pa_11'];

                    //Employee Status
                    $emp_access = $_POST['es_0'];
                    $emp_status = $_POST['es_1'];
                    $emp_hire_date = $_POST['es_2'];
                    $emp_end_date = $_POST['es_3'];
                    $emp_end_reason = $_POST['es_4'];
                    $emp_last_d_worked = $_POST['es_5'];
                    $emp_abs_start_date = $_POST['es_6'];
                    $emp_abs_ret_date = $_POST['es_7'];

                    // Tax Infos
                    $emp_efed_ms = $_POST['ti_0'];
                    $emp_fed_all = $_POST['ti_1'];
                    $emp_state_ms = $_POST['ti_2'];
                    $emp_state_all = $_POST['ti_3'];
                    $emp_work_state = $_POST['ti_4'];
                    $emp_county_ms = $_POST['ti_5'];

                    //Payroll Infos
                    $emp_work_email = $_POST['pai_0'];
                    $emp_contractor = $_POST['pai_1'];
                    $emp_pay_type = $_POST['pai_2'];
                    $emp_pay_freq = $_POST['pai_3'];
                    $emp_hdep_nbr = $_POST['pai_4'];
                    $emp_hdep_desc = $_POST['pai_5'];
                    $emp_pay_rate_amt = $_POST['pai_6'];
                    $emp_pay_rate_status = $_POST['pai_7'];
                    $emp_ee_classif = $_POST['pai_8'];
                    $emp_doc_status = $_POST['pai_9'];

                    //Emergency contact
                    $emp_ec_name = $_POST['nec_0'];
                    $emp_ec_phone = $_POST['nec_1'];
                    $emp_ec_email = $_POST['nec_2'];

                    $reg_date = date('d-m-Y H:i:s');
                    $reid = $emp_ssn_tin . '_' . $reg_date;

                    if (!empty($emp_lname)) {
                        $emp_fullname = $emp_fname . " " . $emp_lname;
                    } else {
                        $emp_fullname = $emp_fname;
                    }

                    $table_field1 = "emp_name,emp_adr1,emp_adr2,emp_city,emp_state,emp_zip,emp_ssn_tin,emp_ptel,emp_email,emp_bdate,emp_gender,emp_hdep_nbr,emp_hdep_desc,emp_county_ms,emp_efed_ms,emp_state_ms,emp_ec_name,emp_ec_phone,emp_ec_email,emp_reg_date,emprid";
                    $table_value1 = "'$emp_fullname','$emp_adr1','$emp_adr2','$emp_city','$emp_state','$emp_zip','$emp_ssn_tin','$emp_ptel','$emp_email','$emp_bdate','$emp_gender','$emp_hdep_nbr','$emp_hdep_desc','$emp_county_ms','$emp_efed_ms','$emp_state_ms','$emp_ec_name','$emp_ec_phone','$emp_ec_email','$reg_date','$reid'";
                    $table1 = "INSERT INTO `scman`.`sc_employee` ($table_field1) VALUES ( $table_value1)";
                    $db->query($table1);
                    // echo $reid;

                    // New Employee status
                    $get_this_emp_id = "SELECT emp_id from `scman`.`sc_employee` where emprid='$reid'";

                    $resultss = mysqli_query($connection, $get_this_emp_id);

                    if (!$resultss) {
                        die('Query failed: ' . mysqli_error($connection));
                    }

                    // Retrieve data from the database
                    // $query = "SELECT * FROM table_name";

                    // Iterate over the resultsss using a foreach loop
                    $row = mysqli_fetch_assoc($resultss);
                    foreach ($resultss as $key => $row) {
                        $new_emp_id = $row['emp_id'];
                    }

                    // $new_emp_id = $db->query($table1);

                    $table_field2 = '`emp_id`, `ent_id`, `work_email`, `emp_access`, `emp_status`, `emp_contract`, `emp_pay_rate_amt`, `emp_hire_date`, `emp_end_date`, `emp_end_reason`, `emp_last_d_worked`, `emp_abs_start_date`, `emp_abs_ret_date`, `emp_pay_type`, `emp_pay_freq`, `emp_pay_rate_status`, `emp_fed_all`, `emp_state_all`, `emp_work_state`, `emp_ee_classif`, `emp_doc_status`';

                    // $sqls = "INSERT INTO `scman`.`sc_work_for` ($table_field2)
                    // VALUES ('lj', 'fg', 'gf','fd','fd','fgd','34', '22/12/2024', 'Quit', 'na', 'na2', 'na3', 'Salaried', 'Biweekly', 'Active', 'Fed All ($)', '1', 'MD','sa','fd')";
                    if(isset($_POST['methods']) && !empty($_POST['methods'])){

                        $table_value2 = "'$new_emp_id','$sel_ent_id','$emp_work_email','$emp_access','$emp_status','$emp_contractor','$emp_pay_rate_amt','$emp_hire_date','$emp_end_date','$emp_end_reason','$emp_last_d_worked','$emp_abs_start_date','$emp_abs_ret_date','$emp_pay_type','$emp_pay_freq','$emp_pay_rate_status','$emp_fed_all','$emp_state_all','$emp_work_state','$emp_ee_classif','$emp_doc_status'";

                    }
                    $table_value2 = "'$new_emp_id','$sel_ent_id','$emp_work_email','$emp_access','$emp_status','$emp_contractor','$emp_pay_rate_amt','$emp_hire_date','$emp_end_date','$emp_end_reason','$emp_last_d_worked','$emp_abs_start_date','$emp_abs_ret_date','$emp_pay_type','$emp_pay_freq','$emp_pay_rate_status','$emp_fed_all','$emp_state_all','$emp_work_state','$emp_ee_classif','$emp_doc_status'";

                    $table2 = "INSERT INTO `scman`.`sc_work_for` ($table_field2) VALUES ($table_value2)";
                    $db->query($table2);

                    if (!empty($new_emp_id)) {
                        echo '<span class="action_status">New employee added successfully</span><div class="message"><button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
                    } else {
                        echo '<span class="action_status" style="color: white;box-shadow: inset 0px 0px 90px red;}">Error! registration failed</span><div class="message"> <button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
                    }
                }else{

                    //Employee Status
                    $emp_access = $_POST['es_0'];
                    $emp_status = $_POST['es_1'];
                    $emp_hire_date = $_POST['es_2'];
                    $emp_end_date = $_POST['es_3'];
                    $emp_end_reason = $_POST['es_4'];
                    $emp_last_d_worked = $_POST['es_5'];
                    $emp_abs_start_date = $_POST['es_6'];
                    $emp_abs_ret_date = $_POST['es_7'];

                    // Tax Infos
                    $emp_efed_ms = $_POST['ti_0'];
                    $emp_fed_all = $_POST['ti_1'];
                    $emp_state_ms = $_POST['ti_2'];
                    $emp_state_all = $_POST['ti_3'];
                    $emp_work_state = $_POST['ti_4'];
                    $emp_county_ms = $_POST['ti_5'];

                    //Payroll Infos
                    $emp_work_email = $_POST['pai_0'];
                    $emp_contractor = $_POST['pai_1'];
                    $emp_pay_type = $_POST['pai_2'];
                    $emp_pay_freq = $_POST['pai_3'];
                    $emp_hdep_nbr = $_POST['pai_4'];
                    $emp_hdep_desc = $_POST['pai_5'];
                    $emp_pay_rate_amt = $_POST['pai_6'];
                    $emp_pay_rate_status = $_POST['pai_7'];
                    $emp_ee_classif = $_POST['pai_8'];
                    $emp_doc_status = $_POST['pai_9'];

                    $table_field2 = '`emp_id`, `ent_id`, `work_email`, `emp_access`, `emp_status`, `emp_contract`, `emp_pay_rate_amt`, `emp_hire_date`, `emp_end_date`, `emp_end_reason`, `emp_last_d_worked`, `emp_abs_start_date`, `emp_abs_ret_date`, `emp_pay_type`, `emp_pay_freq`, `emp_pay_rate_status`, `emp_fed_all`, `emp_state_all`, `emp_work_state`, `emp_ee_classif`, `emp_doc_status`';

                    $table_value2 = "'$the_emp_id','$sel_ent_id','$emp_work_email','$emp_access','$emp_status','$emp_contractor','$emp_pay_rate_amt','$emp_hire_date','$emp_end_date','$emp_end_reason','$emp_last_d_worked','$emp_abs_start_date','$emp_abs_ret_date','$emp_pay_type','$emp_pay_freq','$emp_pay_rate_status','$emp_fed_all','$emp_state_all','$emp_work_state','$emp_ee_classif','$emp_doc_status'";

                    $table2 = "INSERT INTO `scman`.`sc_work_for` ($table_field2) VALUES ($table_value2)";
                    $db->query($table2);

                    if (!empty($the_emp_id)) {
                        echo $the_emp_id."| ". $methods." | ".$sel_ent_id.'<span class="action_status">Employee added successfully</span><div class="message"><button id="view_emp" class="sc_btns">view employee<i class="fa fa-eye"></i></button><button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
                    } else {
                        echo $the_emp_id . "| " . $methods . " | " .$sel_ent_id. '<span class="action_status" style="color: white;box-shadow: inset 0px 0px 90px red;}">Error! registration failed</span><div class="message"> <button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
                    }  
                }


                if ($_POST['from'] == "edit_emp") {
                    $sel_ent_id = $_POST['the_id'];
                    // echo $sel_ent_id;
                    // Personnal Infos 
                    $edit_emp_id = $_POST['edit_emp_id'];
                    $emp_fname = $_POST['pa_0'];
                    $emp_adr1 = $_POST['pa_1'];
                    $emp_lname = $_POST['pa_2'];
                    $emp_adr2 = $_POST['pa_3'];
                    $emp_ptel = $_POST['pa_4'];
                    $emp_city = $_POST['pa_5'];
                    $emp_email = $_POST['pa_6'];
                    $emp_state = $_POST['pa_7'];
                    $emp_ssn_tin = $_POST['pa_8'];
                    $emp_zip = $_POST['pa_9'];
                    $emp_gender = $_POST['pa_10'];
                    $emp_bdate = $_POST['pa_11'];

                    //Employee Status
                    $emp_access = $_POST['es_0'];
                    $emp_status = $_POST['es_1'];
                    $emp_hire_date = $_POST['es_2'];
                    $emp_end_date = $_POST['es_3'];
                    $emp_end_reason = $_POST['es_4'];
                    $emp_last_d_worked = $_POST['es_5'];
                    $emp_abs_start_date = $_POST['es_6'];
                    $emp_abs_ret_date = $_POST['es_7'];

                    // Tax Infos
                    $emp_efed_ms = $_POST['ti_0'];
                    $emp_fed_all = $_POST['ti_1'];
                    $emp_state_ms = $_POST['ti_2'];
                    $emp_state_all = $_POST['ti_3'];
                    $emp_work_state = $_POST['ti_4'];
                    $emp_county_ms = $_POST['ti_5'];

                    //Payroll Infos
                    $emp_work_email = $_POST['pai_0'];
                    $emp_contractor = $_POST['pai_1'];
                    $emp_pay_type = $_POST['pai_2'];
                    $emp_pay_freq = $_POST['pai_3'];
                    $emp_hdep_nbr = $_POST['pai_4'];
                    $emp_hdep_desc = $_POST['pai_5'];
                    $emp_pay_rate_amt = $_POST['pai_6'];
                    $emp_pay_rate_status = $_POST['pai_7'];
                    $emp_ee_classif = $_POST['pai_8'];
                    $emp_doc_status = $_POST['pai_9'];

                    //Emergency contact
                    $emp_ec_name = $_POST['nec_0'];
                    $emp_ec_phone = $_POST['nec_1'];
                    $emp_ec_email = $_POST['nec_2'];

                    // echo $edit_emp_id;
                    $reg_date = date('d-m-Y H:i:s');
                    $reid = $emp_ssn_tin . '_' . $reg_date;
                    if (!empty($emp_lname)) {
                        $emp_fullname = $emp_fname . " " . $emp_lname;
                    } else {
                        $emp_fullname = $emp_fname;
                    }

                    $sqls1 = "UPDATE `scman`.`sc_employee` SET `emp_name`='$emp_fullname', `emp_adr1`='$emp_adr1', `emp_adr2`='$emp_adr2', `emp_city`='$emp_city', `emp_state`='$emp_state', `emp_zip`='$emp_zip', `emp_ssn_tin`='$emp_ssn_tin', `emp_ptel`='$emp_ptel', `emp_email`='$emp_email', `emp_bdate`='$emp_bdate', `emp_gender`='$emp_gender', `emp_hdep_nbr`='$emp_hdep_nbr', `emp_hdep_desc`='$emp_hdep_desc', `emp_efed_ms`='$emp_efed_ms', `emp_state_ms`='$emp_state_ms', `emp_county_ms`='$emp_county_ms', `emp_ec_name`='$emp_ec_name', `emp_ec_phone`='$emp_ec_phone', `emp_ec_email`='$emp_ec_email' WHERE  `emp_id`=$edit_emp_id";

                    $response1 = $db->query($sqls1);

                    // retrieve id field to edit
                    $get_this_emp_id = "SELECT emp_ent_id FROM scman.sc_work_for WHERE ent_id=$sel_ent_id AND emp_id=$edit_emp_id";

                    $resultss = mysqli_query($connection, $get_this_emp_id);

                    if (!$resultss) {
                        die('Query failed: ' . mysqli_error($connection));
                    }

                    // Retrieve data from the database
                    // $query = "SELECT * FROM table_name";

                    // Iterate over the resultsss using a foreach loop
                    $row = mysqli_fetch_assoc($resultss);
                    foreach ($resultss as $key => $row) {
                        $emp_ent_id = $row['emp_ent_id'];
                    }

                    $sqls2 = "UPDATE `scman`.`sc_work_for` SET `work_email`='$emp_work_email', `emp_access`='$emp_access', `emp_status`='$emp_status', `emp_contract`='$emp_contractor', `emp_pay_rate_amt`='$emp_pay_rate_amt', `emp_hire_date`='$emp_hire_date',
            `emp_end_date`='$emp_end_date', `emp_end_reason`='$emp_end_reason', `emp_last_d_worked`='$emp_last_d_worked', `emp_abs_start_date`='$emp_abs_start_date',`emp_abs_ret_date`='$emp_abs_ret_date', `emp_pay_type`='$emp_pay_type',
            `emp_pay_freq`='$emp_pay_freq', `emp_pay_rate_status`='$emp_pay_rate_status', `emp_fed_all`='$emp_fed_all', `emp_state_all`='$emp_state_all', `emp_work_state`='$emp_work_state', `emp_ee_classif`='$emp_ee_classif',
            `emp_doc_status`='$emp_doc_status' WHERE  `emp_ent_id`=$emp_ent_id ";

                    $response2 = $db->query($sqls2);
                    // echo "<span style='color:white'>Employee Id = ".$edit_emp_id." | Enterprise Id = ". $sel_ent_id."</span>";
                    if (!empty($response1) && !empty($response2)) {
                        echo '<span class="action_status">Employee infos edited successfully</span><div class="message"><button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
                    } else {
                        echo '<span class="action_status" style="color: white;box-shadow: inset 0px 0px 90px red;}">Error! failed to edit employee data</span><div class="message"> <button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
                        //   dsds     
                    }
                }
            }

                    ?>
    <input type="hidden" class="" id="new_emp_id" name="" value="<?php echo $new_emp_id; ?>">

<?php

            // <div class="message">' . $emp_fullname . ' is now an employee of ' . get_ent_data($sel_emp_id, 'business_name') . '</div>';
        }


        if (isset($_POST['do_action']) && $_POST['do_action'] == "delete") {
            $do_action = $_POST['do_action'];
            // echo $do_action;
            (isset($_POST['do_to'])) ? $do_to = $_POST['do_to'] : $do_to = '';
            (isset($_POST['empid'])) ? $empid = $_POST['empid'] : $empid = '';
            (isset($_POST['entid'])) ? $entid = $_POST['entid'] : $entid = '';

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            if ($do_action == "delete" && !empty($empid) && !empty($entid)) {

                // Define the query to retrieve the field
                $del = "UPDATE `scman`.`sc_work_for` SET `emp_archive`='1' where emp_id='$empid' and ent_id='$entid'";
                $deleted = $connection->query($del);

                if (!empty($deleted)) {
                    echo '<span class="action_status">Employee Deleted successfully</span><div class="message"><button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
                } else {
                    echo '<span class="action_status" style="color: white;box-shadow: inset 0px 0px 90px red;}">Error! failed to delete employee data</span><div class="message"> <button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
                    //   dsds     
                }
            }

            if ($do_action == "delete" && !empty($entid) && $do_to = "enterprise") {

                // Define the query to delete the enterprise
                $archivate_ent = "UPDATE `scman`.`sc_enterprise` SET `ent_archive`='1' where ent_id='$entid'";
                $ent_archivated = $connection->query($archivate_ent);

                // Define the query to unlink all the belongin employee from this enterprise
                $archivate_emp = "UPDATE `scman`.`sc_work_for` SET `emp_archive`='1' where ent_id='$entid'";
                $emp_archivated = $connection->query($archivate_emp);


                if (!empty($ent_archivated) && !empty($emp_archivated)) {
                    echo '<span class="action_status">Enterprise Deleted successfully | Belonging employees has been unlinked from</span><div class="message"><button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
                } else {
                    echo '<span class="action_status" style="color: white;box-shadow: inset 0px 0px 90px red;}">Error! failed to delete Enterprise</span><div class="message"> <button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
                    //   dsds     
                }
            }
        }

        if (isset($_POST['do_action']) && $_POST['do_action'] == "emp_ent") {

            $ent_id = $_POST['get_value'];
            $emp_id = $_POST['emp_id'];

            // echo $emp_id;
            // echo $ent_id;
            // Create a mysqli connection
            // $connection = mysqli_connect('localhost', 'root', '', 'scman');

            // Check the connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Define the query to retrieve the field
            $query1 = "SELECT * FROM sc_work_for sc_wf, sc_employee sc_emp where sc_wf.emp_id=sc_emp.emp_id and sc_wf.ent_id=$ent_id AND sc_wf.emp_id=$emp_id";
            // $query2 = "SELECT * FROM sc_employee sc_emp, sc_work_for sc_wf where sc_emp.emp_id=$emp_id";

            // Execute the query
            $result1 = $connection->query($query1);

            // Check if any row is returned
            if ($result1->num_rows > 0) {

                // Fetch the field value
                $row1 = $result1->fetch_assoc();

                // get employee status data from DB
                $emp_access = $row1['emp_access'];
                $emp_status = $row1['emp_status'];
                $emp_hire_date = $row1['emp_hire_date'];
                $emp_end_date = $row1['emp_end_date'];
                $emp_end_reason = $row1['emp_end_reason'];
                $emp_last_d_worked = $row1['emp_last_d_worked'];
                $emp_abs_start_date = $row1['emp_abs_start_date'];
                $emp_abs_ret_date = $row1['emp_abs_ret_date'];

                // get employee Tax information data from DB
                $emp_efed_ms = $row1['emp_efed_ms'];
                $emp_state_ms = $row1['emp_state_ms'];
                $emp_state = $row1['emp_state'];
                $emp_county_ms = $row1['emp_county_ms'];
                $emp_fed_all = $row1['emp_fed_all'];
                $emp_state_all = $row1['emp_state_all'];
                $emp_work_state = $row1['emp_work_state'];
                $emp_status = $row1['emp_status'];
                $emp_hire_date = $row1['emp_hire_date'];
                $emp_end_date = $row1['emp_end_date'];
                $emp_end_reason = $row1['emp_end_reason'];
                $emp_last_d_worked = $row1['emp_last_d_worked'];
                $emp_abs_start_date = $row1['emp_abs_start_date'];
                $emp_abs_ret_date = $row1['emp_abs_ret_date'];
                // $emp_efed_ms = get_employee_details("$sel_emp_id", 'emp_efed_ms');

                // get employee Payroll information data from DB
                $emp_pay_rate_status = $row1['emp_pay_rate_status'];
                $emp_ee_classif = $row1['emp_ee_classif'];
                $emp_doc_status = $row1['emp_doc_status'];
                $emp_work_email = $row1['work_email'];
                $emp_pay_rate_amt = $row1['emp_pay_rate_amt'];
                $emp_contract = $row1['emp_contract'];
                $emp_pay_type = $row1['emp_pay_type'];
                $emp_pay_freq = $row1['emp_pay_freq'];
                $emp_hdep_nbr = $row1['emp_hdep_nbr'];
                $emp_hdep_desc = $row1['emp_hdep_desc'];


                // get employee emergency contact data from DB
                $emp_ec_name = $row1['emp_ec_name'];
                $emp_ec_phone = $row1['emp_ec_phone'];
                $emp_ec_email = $row1['emp_ec_email'];

                // $_POST['names'] = "Enterprise id is $ent_id and user is $field_value";
                // echo $_POST['names'];

                // ------------------------------------------------------employee status
                $es_id_array = [
                    "access", "status", "start", "end", "reason",
                    "lastday", "abs_start", "abs_back"
                ];

                $es_values_array =
                    [$emp_access, $emp_status, $emp_hire_date, $emp_end_date, $emp_end_reason, $emp_last_d_worked, $emp_abs_start_date, $emp_abs_ret_date];

                function get_ent_data($es_id_array, $es_values_array)
                {
                    echo '<span id="emp_' . $es_id_array . '">' . $es_values_array . '</span>';
                }

                for ($i = 0; $i < count($es_id_array); $i++) {
                    @get_ent_data($es_id_array[$i], $es_values_array[$i]);
                }

                $ti_id_array = [
                    "fed_ms", "fed_all", "state_ms", "state_all", "work_state", "county_ms"
                ];

                $ti_values_array = [
                    $emp_efed_ms, $emp_fed_all, $emp_state_ms, $emp_state_all,
                    $emp_work_state, $emp_county_ms
                ];

                for ($i = 0; $i < count($ti_id_array); $i++) {
                    @get_ent_data($ti_id_array[$i], $ti_values_array[$i]);
                }


                // ------------------------------------------------------employee Payroll information
                $pai_id_array = [
                    "w_email", "contract", "pay_type", "pay_freq", "home_dep_number",
                    "home_dep_desc", "pay_r_amt", "pay_r_status", "ee_clas", "doc_status"
                ];

                $pai_labels_values = [
                    $emp_work_email, $emp_contract, $emp_pay_type, $emp_pay_freq, $emp_hdep_nbr, $emp_hdep_desc, $emp_pay_rate_amt,
                    $emp_pay_rate_status, $emp_ee_classif, $emp_doc_status
                ];

                for ($i = 0; $i < count($pai_id_array); $i++) {
                    @get_ent_data($pai_id_array[$i], $pai_labels_values[$i]);
                }

                // // ------------------------------------------------------employee emergency contact
                $ec_id_array = ["ec_name", "ec_tel", "ec_email"];
                $ec_labels_values = [
                    $emp_ec_name, $emp_ec_phone, $emp_ec_email
                ];



                for ($i = 0; $i < count($ec_id_array); $i++) {
                    @get_ent_data($ec_id_array[$i], $ec_values_array[$i]);
                }
            } else {
                echo "No data found.";
            }

            // Close the database connection
            $connection->close();
        }
?>

<script>
    $(document).ready(function() {
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