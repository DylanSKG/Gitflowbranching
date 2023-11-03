<div class="sc_column_large">
    <div class="sc_top_tabs">
        <?php
        sc_option_tabs('pa', 'edit_', 'Personal Information', $edit_icon);
        sc_option_tabs('es', 'edit_', 'Employee Status', $edit_icon);
        sc_option_tabs('ti', 'edit_', 'Tax Information', $edit_icon);
        sc_option_tabs('pai', 'edit_', 'Payroll Information', $edit_icon);
        sc_option_tabs('ec', 'edit_', 'Emergency Contact', $edit_icon);
        ?>
    </div>
    <div class="check">
        
    </div>
    <div class="sc_tab_render" id='emp_pa'> <?php
                                            $lables_array = [
                                                "First Name", "Address 1", "Last Name", "Address 2", "Phone Number",
                                                "City", "Personal Email", "State", "SSN", "Zip Code", "Gender", "Birth Date"
                                            ];

                                            $labels_values = [
                                                $sc_emp_fname, $emp_adr1, $sc_emp_lname, $emp_adr2, $emp_ptel, $emp_city,
                                                $emp_email, $emp_state, $emp_ssn_tin, $emp_zip, $emp_gender, $emp_bdate
                                            ];

                                            $id_array = [
                                                'emp_fname','emp_adr1', 'sc_emp_lname',  'emp_adr2', 'emp_ptel', 'emp_city',
                                                'emp_email', 'emp_state', 'emp_ssn_tin', 'emp_zip', 'emp_gender', 'emp_bdate'
                                            ];

                                            for ($i = 0; $i < count($lables_array); $i++) {
                                                ent_detail($id_array[$i], $lables_array[$i], $labels_values[$i]);
                                            }
                                            ?>
        <div id="render_pa"></div>
    </div>

    <div class="sc_tab_render" id='emp_es'> <?php
                                            $lables_array = [
                                                "Employee Access", "Employee Status", "Hire Date", "Termination Date", "Termination Reason",
                                                "Last Day Worked", "Leave of Absence Start Date", "Leave of Absence Return Date"
                                            ];

                                            $id_array = [
                                                "access", "status", "start", "end", "reason",
                                                "lastday", "abs_start", "abs_back"
                                            ];

                                            $labels_values = [
                                                $emp_access, $emp_status, $emp_hire_date, $emp_end_date, $emp_end_reason, $emp_last_d_worked,
                                                $emp_abs_start_date, $emp_abs_ret_date
                                            ];

                                            for ($i = 0; $i < count($lables_array); $i++) {
                                                ent_detail($id_array[$i], $lables_array[$i], $labels_values[$i]);
                                            } ?>
        <div id="render_es"></div>
    </div>

    <div class="sc_tab_render" id='emp_ti'> <?php
                                            $id_array = [
                                                "fed_ms", "fed_all", "state_ms", "state_all", "work_state", "county_ms"
                                            ];
                                            $lables_array = [
                                                "Fed MS", "Fed All ($)", "State MS", "State All","Work State", "County MS"
                                            ];
                                            $labels_values = [
                                                $emp_efed_ms, $emp_fed_all, $emp_state_ms, $emp_state_all, $emp_work_state, $emp_county_ms
                                            ];
                                            for ($i = 0; $i < count($lables_array); $i++) {
                                                ent_detail($id_array[$i], $lables_array[$i], $labels_values[$i]);
                                            } ?>
        <div id="render_ti"></div>
    </div>

    <div class="sc_tab_render" id='emp_pai'> <?php
                                                $id_array = [
                                                    "w_email", "contract", "pay_type", "pay_freq", "home_dep_number",
                                                    "home_dep_desc", "pay_r_amt", "pay_r_status", "ee_clas", "doc_status"
                                                ];
                                                $lables_array = [
                                                    "Work Email", "Contractor (Y/N)", "Pay Type", "Employee Pay Frequency", "Home Department Number",
                                                    "Home Department Description", "Pay Rate Amount", "Pay Rate Status", "EE Classification", "Doc Status"
                                                ];
                                                $labels_values = [
                                                    $emp_work_email, $emp_contractor, $emp_pay_type, $emp_pay_freq, $emp_hdep_nbr, $emp_hdep_desc, $emp_pay_rate_amt,
                                                    $emp_pay_rate_status, $emp_ee_classif, $emp_doc_status
                                                ];
                                                for ($i = 0; $i < count($lables_array); $i++) {
                                                    ent_detail($id_array[$i], $lables_array[$i], $labels_values[$i]);
                                                } ?>
        <div id="render_pai"></div>
    </div>

    <div class="sc_tab_render" id='emp_ec'> <?php
                                            $id_array = ["ec_name", "ec_tel", "ec_email"];
                                            $lables_array = ["EC Name", "EC Phone", "EC Email"];
                                            $labels_values = [
                                                $emp_ec_name, $emp_ec_phone, $emp_ec_email
                                            ];
                                            for ($i = 0; $i < count($lables_array); $i++) {
                                                ent_detail($id_array[$i], $lables_array[$i], $labels_values[$i]);
                                            } ?>
        <div id="render_ec"></div>
    </div>

</div>