<div class="float_form" id="float_form_edit">
    <div id="edit_emp" class="new_employee">
        <div class="sc_column_large">
            <div class="sc_top_tabs">
                <?php
                sc_option_tabs('e_pa', '', 'Personal Information', '');
                sc_option_tabs('e_es', '', 'Employee Status', '');
                sc_option_tabs('e_ti', '', 'Tax Information', '');
                sc_option_tabs('e_pai', '', 'Payroll Information', '');
                sc_option_tabs('e_nec', '', 'Emergency Contact', '');
                $infos_emp = array();
                ?>
            </div>
            <div class="sc_tab_render" id='e_emp_pa'> <?php
                $pa_array = [
                    "First Name", "Address 1", "Last Name",  "Address 2", "Phone Number",
                    "City", "Personal Email", "State", "SSN", "Zip Code", "Gender", "Birth Date"
                ];

                $pa_type = [
                    "", "", "",  "", "", "",
                    "", "", "", "", "", "date"
                ];
                $pa_lenght = [
                    "28", "60", "28",   "60", "20", "60",
                    "60", "60", "11", "5", "8", "10"
                ];

                $pa_values = [
                    $sc_emp_fname, $emp_adr1, $sc_emp_lname, $emp_adr2, $emp_tel, $emp_city,
                    $emp_email, $emp_state, $emp_ssn, $emp_zip, $gender, $emp_bdate
                ];

                for ($i = 0; $i < count($pa_array); $i++) {
                    new_ent_detail($i, 'e_pa', $pa_array[$i], $pa_values[$i], $pa_lenght[$i], $pa_type[$i]);
                }

                $emp_fname = def_var('pa_0');
                $emp_adr1  = def_var('pa_1');
                $emp_lname = def_var('pa_2');
                $emp_adr2 = def_var('pa_3');
                $emp_tel = def_var('pa_4');
                $emp_city = def_var('pa_5');
                $emp_email = def_var('pa_6');
                $emp_state = def_var('pa_7');
                $emp_ssn = def_var('pa_8');
                $emp_zip = def_var('pa_9');
                $emp_gender = def_var('pa_10');
                $emp_bdate = def_var('pa_11');

                // echo $emp_fname, $emp_lname . " " . $sel_ent_id;
                ?>
                <div id="e_render_pa"></div>
            </div>

            <div class="sc_tab_render" id='e_emp_es'> <?php
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

                for ($i = 0; $i < count($es_array); $i++) {
                    new_ent_detail($i, 'e_es', $es_array[$i], $es_values[$i], $es_lenght[$i], $es_type[$i]);
                }

                $emp_access = def_var('es_0');
                $emp_status = def_var('es_1');
                $emp_hire_date = def_var('es_2');
                $emp_end_date = def_var('es_3');
                $emp_end_reason = def_var('es_4');
                $emp_last_d_worked = def_var('es_5');
                $emp_abs_start_date = def_var('es_6');
                $emp_abs_ret_date = def_var('es_7');
                ?>
                <div id="e_render_es"></div>
            </div>

            <div class="sc_tab_render" id='e_emp_ti'> <?php
                                                        $ti_array = [
                                                            "Fed MS", "Fed All ($)", "State MS", "State All", "Work State", "County MS"
                                                        ];
                                                        $ti_values = [
                                                            $emp_efed_ms, $emp_fed_all, $emp_state_ms, $emp_state, $emp_work_state, $emp_county_ms
                                                        ];

                                                        $ti_type = ["", "", "",  "", "", ""];
                                                        $ti_lenght = ["50", "50", "60",  "50", "50", "60"];

                                                        for ($i = 0; $i < count($ti_array); $i++) {
                                                            new_ent_detail($i, 'e_ti', $ti_array[$i], $ti_values[$i], $ti_lenght[$i], $ti_type[$i]);
                                                        }

                                                        $emp_efed_ms = def_var('ti_0');
                                                        $emp_fed_all = def_var('ti_1');
                                                        $emp_state_ms = def_var('ti_2');
                                                        $emp_state = def_var('ti_3');
                                                        $emp_work_state = def_var('ti_4');
                                                        $emp_county_ms = def_var('ti_5');
                                                        ?>
                <div id="e_render_ti"></div>
            </div>

            <div class="sc_tab_render" id='e_emp_pai'>
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

                for ($i = 0; $i < count($pai_array); $i++) {
                    new_ent_detail($i, 'e_pai', $pai_array[$i], $pai_values[$i], $pai_lenght[$i], $pai_type[$i]);
                }

                $emp_work_email = def_var('pai_0');
                $emp_contractor = def_var('pai_1');
                $emp_pay_type = def_var('pai_2');
                $emp_pay_freq = def_var('pai_3');
                $emp_hdep_nbr = def_var('pai_4');
                $emp_hdep_desc = def_var('pai_5');
                $emp_pay_rate_amt = def_var('pai_6');
                $emp_pay_rate_status = def_var('pai_7');
                $emp_ee_classif = def_var('pai_8');
                $emp_doc_status = def_var('pai_9');
                ?>
                <div id="e_render_pai"></div>
            </div>

            <div class="sc_tab_render" id='e_emp_nec'> <?php
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

                                                        for ($i = 0; $i < count($nec_array); $i++) {
                                                            new_ent_detail($i, 'e_nec', $nec_array[$i], $nec_values[$i], $nec_lenght[$i], $nec_type[$i]);
                                                        }


                                                        $emp_ec_name = def_var('nec_0');
                                                        $emp_ec_phone = def_var('nec_1');
                                                        $emp_ec_email = def_var('nec_2');
                                                        ?>
                <div id="e_render_nec"></div>
            </div>

        </div>
        <div class="sc_tab_render" id="emp_edited"></div>
        <!-- <div class="submition_form">  -->
        <div class="decition_btn">
            <div id="nextto_2" class="sc_btns page1">Next<i class='fa fa-arrow-circle-right'></i></div>
            <div id="backto_1" class="sc_btns page2 "><i class='fa-solid fa-arrow-circle-left'></i>Preview</div>
            <div id="nextto_3" class="sc_btns page2 ">Next<i class='fa fa-arrow-circle-right'></i></div>
            <div id="backto_2" class="sc_btns page3 "><i class='fa-solid fa-arrow-circle-left'></i>Preview</div>
            <div id="nextto_4" class="sc_btns page3 ">Next<i class='fa fa-arrow-circle-right'></i></div>
            <div id="backto_3" class="sc_btns page4 "><i class='fa-solid fa-arrow-circle-left'></i>Preview</div>
            <div id="nextto_5" class="sc_btns page4 ">Next<i class='fa fa-arrow-circle-right'></i></div>
            <div id="backto_4" class="sc_btns page5 "><i class='fa-solid fa-arrow-circle-left'></i>Preview</div>

            <div id="save_emp" class="sc_btns">Save <i class="fa fa-save"></i></div>
            <div id="cancel_emp" class="close_form sc_btns">Cancel <i class="fa fa-cancel"></i></div>
        </div>
    </div>
</div>