<?php
global $lang, $from, $get, $target, $sql, $sql1, $sql2, $query, $ente_id, $i, $business_name;



define('WP_USE_THEMES', false);
require_once('../../../../../../wp-load.php');
// mysqli db connection 
$connection =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}


// }


if (isset($_POST['from'])) {
    $from = $_POST['from'];
}

if (isset($_POST['get'])) {
    $get = $_POST['get'];
}
if (isset($_POST['target'])) {
    $target = $_POST['target'];
}

if (!empty($from) && !empty($get)) {
    $sql1 = "";
    if ($from == "enterprise") {
        $sql1 = "SELECT * FROM sc_enterprise where ent_archive=0 ORDER BY business_name ASC";
        $gen_report_1 = "SELECT * FROM sc_enterprise where ent_archive=0 ORDER BY business_name ASC";
        $gen_report_2 = "SELECT * FROM sc_enterprise where ent_archive=0 ORDER BY business_name ASC";
        $query = $sql1;

        // echo $sql1;
    } else if ($from == "employee") {
        $sql2 = "SELECT * FROM sc_$from where emp_name WHERE ent_archive = 0";
        $query = $sql2;
        // echo $sql2;
    } else if ($from == "employee") {
        $sql2 = "SELECT * FROM sc_$from where emp_name WHERE ent_archive = 0";
        $query = $sql2;
        // echo $sql2;
    }

    // $connection = mysqli_connect('localhost', 'root', '', 'scman');
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
        if (isset($row['ent_id']) && isset($row["$target"])) {
            // Access the value associated with the 'enterprise_id' key
            $ente_id = $row['ent_id'];
            $business_name = $row["$target"];
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

        if ($from == "enterprise") {
            $the_id = $ente_id;
            $the_name = $business_name;
        } else if ($from == "employee") {
            $the_id = $emp_id;
            $the_name = $emp_name;
        } $i++; ?>

        <option id="opt_<?php echo $the_id ?>"value="<?php echo $the_id; ?>"><?php echo $the_name; ?></option>

        <?php 
    }
}
//SELECT sc_emp.emp_name,sc_emp.emp_adr1, sc_emp.emp_state AS nbr FROM sc_employee sc_emp WHERE sc_emp.emp_id IN (22,23);

// Close the database connection
$connection->close();
?>