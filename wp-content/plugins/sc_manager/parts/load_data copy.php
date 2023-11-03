<?php
function conn_db($query)
{
    $connection = mysqli_connect('localhost', 'root', '', 'scman');

    if (!$connection) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query failed: ' . mysqli_error($connection));
    }
    $connection->query($query);
}


function get_enterprise_details($id, $value)
{
    global $wpdb;
    // $get_id = "no";
    $query = "SELECT $value FROM sc_enterprise where ent_id=$id";
    return conn_db($query);
}
// Load the plugin dependencies
// require_once(plugin_dir_path(__FILE__) . 'your-plugin-dependencies.php');

// Initialize $wpdb
global $wpdb, $i;

if (isset($_POST['query'])) {
    $search_string = $_POST['query'];
}

if (isset($_POST['from'])) {
    $search_option = $_POST['from'];
}
// else{
//     $from = "sc_employee sc_em, sc_enterprise sc_ent";
// }
// echo $search_option . " ";


if (isset($_POST['home'])) {
    $sql1 = "";
    if ($search_option == "ent") {
        $from = "enterprise";
        $sql1 = "SELECT * FROM sc_$from where business_name LIKE '%$search_string%'";
        $query = $sql1;

        // echo $sql1;
    } else if ($search_option == "emp") {
        $from = "employee";
        $sql2 = "SELECT * FROM sc_$from where emp_name LIKE '%$search_string%'";
        $query = $sql2;
        // echo $sql2;
    }

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query failed: ' . mysqli_error($connection));
    }


    // Retrieve data from the database
    // $query = "SELECT * FROM table_name";

    // Iterate over the results using a foreach loop
    foreach (conn_db($query) as $key => $row) {
        // Access column name and corresponding value
        // echo $column . ': ' . $value . '<br>';
        if (isset($row['ent_id']) && isset($row['business_name'])) {
            // Access the value associated with the 'enterprise_id' key
            $enterpriseId = $row['ent_id'];
            $business_name = $row['business_name'];
        } else {
            // Handle the case where the key does not exist
            // or perform alternative actions
        }

        if (isset($row['emp_id']) && isset($row['emp_name'])) {
            // Access the value associated with the 'enterprise_id' key
            $emp_id = $row['emp_id'];
            $emp_name = $row['emp_name'];
        } else {
            // Handle the case where the key does not exist
            // or perform alternative actions
        }

        if ($search_option == "ent") {
            $the_id = $enterpriseId;
            $the_name = $business_name;
        } else if ($search_option == "emp") {
            $the_id = $emp_id;
            $the_name = $emp_name;
        }

        $i++; ?>
        <li class="sc_emp result">
            <i class="fa-solid fa-chevron-right"></i>
            <a class="ref no_underline" href="http://localhost/scman/<?php echo $from . "?id=" . $the_id ?>"><?php echo $the_name . " ___#" . $the_id; ?></a>
        </li>
    <?php

        // }
    }
}



    //create tables used for storing  plugin information
    $db = mysqli_connect('localhost', 'root', '', 'scman');
    if ($db === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }else{

        $reg_date = date('d-m-Y H:i:s');
        $reid = $emp_ssn_tin.'_'.$reg_date;
        $emp_fullname = $emp_fname . ", " . $emp_lname;
        $table_field1 = "emp_name,emp_adr1,emp_adr2,emp_city,emp_state,emp_zip,emp_ssn_tin,emp_ptel,emp_email,emp_bdate,emp_gender,emp_efed_ms,emp_state_ms,emp_county_ms,emp_hdep_nbr,emp_hdep_desc,emp_ec_name,emp_ec_phone,emp_ec_email,emp_reg_date";
        $table_value1 = "'$emp_fullname','$emp_adr1','$emp_adr2','$emp_city','$emp_state','$emp_zip','$emp_ssn_tin','$emp_ptel','$emp_email','$emp_bdate','$emp_gender','$emp_efed_ms','$emp_state_ms','$emp_county_ms','$emp_hdep_nbr','$emp_hdep_desc','$emp_ec_name','$emp_ec_phone','$emp_ec_email','$reg_date'";
        $table1 = "INSERT INTO `scman`.`sc_employee` (emp_reg_date) VALUES ( $table_value1)";
        $db->query($table1);
        echo $reid;
        // New Employee status
        // $get_this_emp_id = "SELECT emp_id from `scman`.`sc_employee` where reid='$reid'";
        $new_emp_id = $db->query($table1);

        // $table_field2 = "`emp_id`, `ent_id`, `work_email`, `emp_access`, `emp_status`, `emp_contract`, `emp_pay_rate_amt`, `emp_hire_date`, `emp_end_date`, `emp_end_reason`, `emp_last_d_worked`, `emp_abs_start_date`, `emp_abs_ret_date`, `emp_pay_type`, `emp_pay_freq`, `emp_pay_rate_status`, `emp_fed_all`, `emp_state_all`, `emp_work_state`, `emp_ee_classif`, `emp_doc_status`";

        // // '88', '25', 'gfdgfd', 'yes', 'dsdsd', 'no', 'dsd', 'dsds', 'dsds', 'dsds', 'ds', 'dsds', 'dsds', 'dsd', 'dsds', 'fdfd', 'fgf', 'gfg', 'fgf', '1', '1'
        // $table_value2 = "'$new_emp_id','$sel_ent_id','$emp_work_email','$emp_access','$emp_status','$emp_contractor','$emp_pay_rate_amt','$emp_hire_date','$emp_end_date','$emp_end_reason','$emp_last_d_worked','$emp_abs_start_date','$emp_abs_ret_date','$emp_pay_type','$emp_pay_freq','$emp_pay_rate_status','$emp_fed_all','$emp_state_all','','',''";

        // $table2 = "INSERT INTO `scman`.`sc_work_for` ($table_field2) VALUES ($table_value2);";
        // $db->query($table2);
        echo '<span class="action_status">New employee added successfully</span><div class="message"> <button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
    //   <button id="view_emp" class="sc_btns">view employee<i class="fa fa-eye"></i></button><button id="add_again" class="sc_btns">Add New employee<i class="fa fa-add"></i></button>
    }

        

