                    <div id="add_emp" class="new_employee">
                        <div class="sc_column_large">
                            <div class="sc_top_tabs">
                                <?php
                                sc_option_tabs('pa', '', 'Personal Information', '');
                                sc_option_tabs('es', '', 'Employee Status', '');
                                sc_option_tabs('ti', '', 'Tax Information', '');
                                sc_option_tabs('pai', '', 'Payroll Information', '');
                                sc_option_tabs('nec', '', 'Emergency Contact', '');
                                $infos_emp = array();
                                ?>
                            </div>
                            <div class="sc_tab_render" id='emp_pa'> <?php
                                                                    $pa_array = [
                                                                        "First Name", "Last Name", "Address 1",  "Address 2", "Phone Number",
                                                                        "City", "Personal Email", "State", "SSN", "Zip Code", "Gender", "Birth Date"
                                                                    ];

                                                                    $pa_type = [
                                                                        "", "", "",  "", "", "",
                                                                        "", "", "", "", "", "date"
                                                                    ];
                                                                    $pa_lenght = [
                                                                        "28", "28", "60",  "60", "20", "60",
                                                                        "60", "60", "11", "5", "8", "10"
                                                                    ];

                                                                    $pa_values = [
                                                                        $sc_emp_fname, $sc_emp_lname, $emp_adr1, $emp_adr2, $emp_tel, $emp_city,
                                                                        $emp_email, $emp_state, $emp_ssn, $emp_zip, $gender, $emp_bdate
                                                                    ];

                                                                    $pa_var_init = ['$emp_fname', '$emp_lname', '$emp_adr1', '$emp_adr2', '$emp_tel', '$emp_city', '$emp_email', '$emp_state', '$emp_ssn', '$emp_zip', '$emp_gender', '$emp_bdate'];
                                                                    for ($i = 0; $i < count($pa_array); $i++) {
                                                                        new_ent_detail($i, 'pa', $pa_array[$i], $pa_values[$i], $pa_lenght[$i], $pa_type[$i]);

                                                                        // initialise all these variables
                                                                        if (isset($_POST['pa_' . $i])) {
                                                                            $pa_var_init[$i] = $_POST['pa_' . $i];
                                                                        }
                                                                    }

                                                                    ?>
                                <div id="render_pa"></div>
                            </div>

                            <div class="sc_tab_render" id='emp_es'> <?php
                                                                    $es_array = [
                                                                        "Employee Access", "Employee Status", "Hire Date", "Termination Date", "Termination Reason",
                                                                        "Last Day Worked", "Leave of Absence Start Date", "Leave of Absence Return Date"
                                                                    ];
                                                                    $es_values = [
                                                                        $emp_access, $emp_status, $emp_hire_date, $emp_end_date, $emp_end_reason,
                                                                        $emp_last_d_worked, $emp_abs_start_date, $emp_abs_ret_date
                                                                    ];

                                                                    $es_type = [
                                                                        "", "", "date",  "date", "", "date", "date", "date"
                                                                    ];
                                                                    $es_lenght = [
                                                                        "3", "10", "10",  "10", "10", "10", "10", "10"
                                                                    ];

                                                                    $es_var_init = [
                                                                        '$emp_access', '$emp_status', '$emp_hire_date', '$emp_end_date',
                                                                        '$emp_end_reason', '$emp_last_d_worked', '$emp_abs_start_date', '$emp_abs_ret_date'
                                                                    ];

                                                                    for ($i = 0; $i < count($es_array); $i++) {
                                                                        new_ent_detail($i, 'es', $es_array[$i], $es_values[$i], $es_lenght[$i], $es_type[$i]);
                                                                        // initialise all these variables
                                                                        if (isset($_POST['es_' . $i])) {
                                                                            $es_var_init[$i] = $_POST['es_' . $i];
                                                                        }
                                                                    }

                                                                    ?>
                                <div id="render_es"></div>
                            </div>

                            <div class="sc_tab_render" id='emp_ti'> <?php
                                                                    $ti_array = [
                                                                        "Fed MS", "Fed All ($)", "State MS", "State All", "Work State", "County MS"
                                                                    ];
                                                                    $ti_values = [
                                                                        $emp_efed_ms, $emp_fed_all, $emp_state_ms, $emp_state, $emp_work_state, $emp_county_ms
                                                                    ];

                                                                    $ti_type = ["", "", "",  "", "", ""];
                                                                    $ti_lenght = ["50", "50", "60",  "50", "50", "60"];

                                                                    $ti_var_init = ['$emp_efed_ms', '$emp_fed_all', '$emp_state_ms', '$emp_state', '$emp_work_state', '$emp_county_ms'];

                                                                    for ($i = 0; $i < count($ti_array); $i++) {
                                                                        new_ent_detail($i, 'ti', $ti_array[$i], $ti_values[$i], $ti_lenght[$i], $ti_type[$i]);
                                                                        // initialise all these variables
                                                                        if (isset($_POST['ti_' . $i])) {
                                                                            $ti_var_init[$i] = $_POST['ti_' . $i];
                                                                        }
                                                                    }

                                                                    ?>
                                <div id="render_ti"></div>
                            </div>

                            <div class="sc_tab_render" id='emp_pai'>
                                <?php
                                $pai_array = [
                                    "Work Email", "Contractor (Y/N)", "Pay Type", "Employee Pay Frequency", "Home Department Number",
                                    "Home Department Description", "Pay Rate Amount", "Pay Rate Status", "EE Classification", "Doc Status"
                                ];

                                $pai_values = [
                                    $emp_work_email, $emp_contractor, $emp_pay_type, $emp_pay_freq, $emp_hdep_nbr, $emp_hdep_desc, $emp_pay_rate_amt,
                                    $emp_pay_rate_status, $emp_ee_classif, $emp_doc_status
                                ];

                                $pai_type = [
                                    "email", "", "",  "", "", "", "number",
                                    "", "", "",
                                ];

                                $pai_lenght = [
                                    "60", "3", "8",  "10", "50", "50", "50",
                                    "10", "50", "50",
                                ];

                                $pai_var_init = [
                                    '$emp_work_email', '$emp_contractor', '$emp_pay_type', '$emp_pay_freq', '$emp_hdep_nbr', '$emp_hdep_desc',
                                    '$emp_pay_rate_amt', '$emp_pay_rate_status', '$emp_ee_classif', '$emp_doc_status'
                                ];

                                for ($i = 0; $i < count($pai_array); $i++) {
                                    new_ent_detail($i, 'pai', $pai_array[$i], $pai_values[$i], $pai_lenght[$i], $pai_type[$i]);
                                    // initialise all these variables
                                    if (isset($_POST['pai_' . $i])) {
                                        $pai_var_init[$i] = $_POST['pai_' . $i];
                                    }
                                }


                                ?>
                                <div id="render_pai"></div>
                            </div>

                            <div class="sc_tab_render" id='emp_nec'> <?php
                                                                        $nec_array = ["EC Name", "EC Phone", "EC Email"];
                                                                        $nec_values = [
                                                                            $emp_ec_name, $emp_ec_phone, $emp_ec_email
                                                                        ];

                                                                        $nec_type = [
                                                                            "", "", ""
                                                                        ];
                                                                        $nec_lenght = [
                                                                            "60", "20", "50"
                                                                        ];

                                                                        $nec_var_init = ['$emp_ec_name', '$emp_ec_phone', '$emp_ec_email'];

                                                                        for ($i = 0; $i < count($nec_array); $i++) {
                                                                            new_ent_detail($i, 'nec', $nec_array[$i], $nec_values[$i], $nec_lenght[$i], $nec_type[$i]);
                                                                            // initialise all these variables
                                                                            if (isset($_POST['nec_' . $i])) {
                                                                                $nec_var_init[$i] = $_POST['nec_' . $i];
                                                                            }
                                                                        }
                                                                        ?>
                                <div id="render_nec"></div>
                            </div>


                        </div>
                        <div class="sc_tab_render" id="emp_added"></div>
                        <!-- <div class="submition_form">  -->
                        <div class="decition_btn">
                            <div id="save_emp" class="sc_btns">Save <i class="fa fa-save"></i></div>
                            <div id="cancel_emp" class="close_form sc_btns">Cancel <i class="fa fa-cancel"></i></div>
                        </div>
                    </div>