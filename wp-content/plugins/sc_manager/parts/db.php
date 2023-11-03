<?php

// // //create tables used for storing  plugin information
// // $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// // if ($db === false) {
// //     die("ERROR: Could not connect. " . mysqli_connect_error());
// // }
// // $table = "CREATE TABLE mbs_parent_post ( Parent_id INT NOT NULL ) ENGINE = InnoDB;";
// // $db->query($table);

// // foreach ($wpdb->get_results("SELECT Parent_id FROM mbs_parent_post") as $key => $row) {
// //     // retrieve the ID
// //     $parent_id = $row->Parent_id;
// // }

        
//             // foreach ($wpdb->get_results("SELECT * FROM sc_employee") as $key => $row) {
//             //     $i++;
//             //     $EmployeeID = $row->EmployeeID;
//             //     $Employee_Name = $row->Employee_Name;
//             //     $Employee_Address_Line_1 = $row->Employee_Address_Line_1;
//             //     $Employee_Address_Line_2 = $row->Employee_Address_Line_2;
//             //     $Employee_City = $row->Employee_City;
//             //     $Employee_State = $row->Employee_State;
//             //     $Employee_ZIP = $row->Employee_ZIP;
//             //     $SSN_TIN = $row->SSN_TIN;
//             //     $Employee_Telephone_Number = $row->Employee_Telephone_Number;
//             //     $Personal_Email = $row->Personal_Email;
//             //     $Birth_Date = $row->Birth_Date;
//             //     $Gender = $row->Gender;
//             //     $Home_Department_Number = $row->Home_Department_Number;
//             //     $Home_Department_Description = $row->Home_Department_Description;
//             //     $Fed_MS = $row->Fed_MS;
//             //     $State_MS = $row->State_MS;
//             //     $County_MS = $row->County_MS;
//             //     $EC_Name = $row->EC_Name;
//             //     $EC_Phone = $row->EC_Phone;
//             //     $EC_Email = $row->EC_Email;

//                 class sc_employee
//                 {
//                     // private $name;
//                     private $EmployeeID;
//                     private $Employee_Name;
//                     private $Employee_Address_Line_1;
//                     private $Employee_Address_Line_2;
//                     private $Employee_City;
//                     private $Employee_State;
//                     private $Employee_ZIP;
//                     private $SSN_TIN;
//                     private $Employee_Telephone_Number;
//                     private $Personal_Email;
//                     private $Birth_Date;
//                     private $Gender;
//                     private $Home_Department_Number;
//                     private $Home_Department_Description;
//                     private $Fed_MS;
//                     private $State_MS;
//                     private $County_MS;
//                     private $EC_Name;
//                     private $EC_Phone;
//                     private $EC_Email;

//                     // public function __construct($EmployeeID,$Employee_Name,$Employee_Address_Line_1,$Employee_Address_Line_2,$Employee_City,$Employee_State,$Employee_ZIP,$SSN_TIN,$Employee_Telephone_Number,$Personal_Email,$Birth_Date,$Gender,$Home_Department_Number,$Home_Department_Description,$Fed_MS,$State_MS,$County_MS,$EC_Name,$EC_Phone,$EC_Email)
//                     // {
//                     //     // $this->name = $name;
//                     //     $this->EmployeeID = $EmployeeID;
//                     //     $this->Employee_Name = $Employee_Name;
//                     //     $this->Employee_Address_Line_1 = $Employee_Address_Line_1;
//                     //     $this->Employee_Address_Line_2 = $Employee_Address_Line_2;
//                     //     $this->Employee_City = $Employee_City;
//                     //     $this->Employee_State = $Employee_State;
//                     //     $this->Employee_ZIP = $Employee_ZIP;
//                     //     $this->SSN_TIN = $SSN_TIN;
//                     //     $this->Employee_Telephone_Number = $Employee_Telephone_Number;
//                     //     $this->Personal_Email = $Personal_Email;
//                     //     $this->Birth_Date = $Birth_Date;
//                     //     $this->Gender = $Gender;
//                     //     $this->Home_Department_Number = $Home_Department_Number;
//                     //     $this->Home_Department_Description = $Home_Department_Description;
//                     //     $this->Fed_MS = $Fed_MS;
//                     //     $this->State_MS = $State_MS;
//                     //     $this->County_MS = $County_MS;
//                     //     $this->EC_Name = $EC_Name;
//                     //     $this->EC_Phone = $EC_Phone;
//                     //     $this->EC_Email = $EC_Email;
//                     // }

//                     // public function emp_repport(){ } 
//                     public function get_employee($field, $value)
//                     {  //fetching the users infos
//                         global $wpdb;
//                         $sql = "SELECT * FROM sc_employee where $field = $value";    //Separate the sql query from the rest of proccess for security and concisement
//                         $stmt = $wpdb->query($sql);    //$this->connects refers to the public method of the  dcdb class
//                         //looping throught the db to get of respond
//                         $users_array = array();
//                         foreach ($wpdb->get_results("SELECT * FROM sc_employee") as $key => $row) {
//                             $i++;
//                             $EmployeeID = $row->EmployeeID;
//                             $Employee_Name = $row->Employee_Name;
//                             $Employee_Address_Line_1 = $row->Employee_Address_Line_1;
//                             $Employee_Address_Line_2 = $row->Employee_Address_Line_2;
//                             $Employee_City = $row->Employee_City;
//                             $Employee_State = $row->Employee_State;
//                             $Employee_ZIP = $row->Employee_ZIP;
//                             $SSN_TIN = $row->SSN_TIN;
//                             $Employee_Telephone_Number = $row->Employee_Telephone_Number;
//                             $Personal_Email = $row->Personal_Email;
//                             $Birth_Date = $row->Birth_Date;
//                             $Gender = $row->Gender;
//                             $Home_Department_Number = $row->Home_Department_Number;
//                             $Home_Department_Description = $row->Home_Department_Description;
//                             $Fed_MS = $row->Fed_MS;
//                             $State_MS = $row->State_MS;
//                             $County_MS = $row->County_MS;
//                             $EC_Name = $row->EC_Name;
//                             $EC_Phone = $row->EC_Phone;
//                             $EC_Email = $row->EC_Email;

//                         }
//                         return $users_array;
//                     }
// array_push($users_array, "$row[$field]");
//                 }
//                 // echo $EmployeeID;
//                 // echo $Employee_Name." | ";
//                 // echo $Employee_Address_Line_1." | ";
//                 // echo $Employee_Address_Line_2." | ";
//                 // echo $Employee_City." | ";
//                 // echo $Employee_State." | ";
//                 // echo $Employee_ZIP." | ";
//                 // echo $SSN_TIN." | ";
//                 // echo $Employee_Telephone_Number." | ";
//                 // echo $Personal_Email." | ";
//                 // echo $Birth_Date." | ";
//                 // echo $Gender." | ";
//                 // echo $Home_Department_Number." | ";
//                 // echo $Home_Department_Description." | ";
//                 // echo $Fed_MS." | ";
//                 // echo $State_MS." | ";
//                 // echo $County_MS." | ";
//                 // echo $EC_Name." | ";
//                 // echo $EC_Phone." | ";
//                 // echo $EC_Email." | ";

//             // }
            

// $emp = new sc_employee();
?>

