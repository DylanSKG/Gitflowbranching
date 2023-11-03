<?php
global $lang, $from, $get, $target, $sql, $sql1, $sql2, $query, $ent_id, $i, $business_name;

define('WP_USE_THEMES', false);
require_once('../../../../../wp-load.php');
// mysqli db connection 
$connection =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['from'])) {
    $from = $_POST['from'];
}

if (isset($_POST['get'])) {
    $get = $_POST['get'];
}
if (isset($_POST['target'])) {
    $target = $_POST['target'];
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

if (isset($_POST['emp_id'])) {
    $emp_id = $_POST['emp_id'];
}

if (isset($_POST['ent_id'])) {
    $ent_id = $_POST['ent_id'];
}

if (!empty($from) && !empty($get)) {
    if ($from == "work_for") {
        $query = "SELECT sc_emp.emp_name, sc_wf.emp_id FROM sc_work_for sc_wf, sc_employee sc_emp WHERE sc_wf.emp_id=sc_emp.emp_id ORDER BY emp_id ASC;";
    } 
    // $connection = mysqli_connect('localhost', 'root', '', 'scman');
    $result = mysqli_query($connection, $query);

    // Iterate over the results using a foreach loop
    $row = mysqli_fetch_assoc($result);
    foreach ($result as $key => $row) {
        $emp_id = $row['emp_id'];
        $emp_name = $row['emp_name'];
        
        if ($from == "work_for") {
            $the_id = $emp_id;
            $the_name = $emp_name;
        } ?>
        <option id="opt_<?php echo $the_id ?>"value="<?php echo $the_id; ?>"><?php echo $the_name; ?></option> <?php 
    }
}

// ===============================================Restoration process============================================= 
if (!empty($action) && !empty($emp_id)) {

    if ($action == "restore") {
        $query = "UPDATE `scman`.`sc_work_for` SET `emp_archive`='0' WHERE  `emp_id`=$emp_id AND ent_id='$ent_id'";

        // $connection = mysqli_connect('localhost', 'root', '', 'scman');
        $result = mysqli_query($connection, $query);

        // Iterate over the results using a foreach loop
        // $result = mysqli_fetch_assoc($result);
        if(!empty($result)) {
            echo '<span class="action_status">Employee Deleted successfully</span><div class="message"><button id="close_this" class="sc_btns">Close<i class="fa fa-cancel"></i></button></div>';
        }
    } 
}
//SELECT sc_emp.emp_name,sc_emp.emp_adr1, sc_emp.emp_state AS nbr FROM sc_employee sc_emp WHERE sc_emp.emp_id IN (22,23);

// Close the database connection
$connection->close();
?>