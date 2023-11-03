<div class="sc_column_large">
    <div class="sc_top_tabs"><?php
                                sc_option_tabs('cd', '', 'Company Details', $edit_icon);
                                sc_option_tabs('od', '', 'Owner Details', $edit_icon);
                                sc_option_tabs('sidfu', '', 'State ID App and Follow Up', $edit_icon);
                                sc_option_tabs('sidpoa', '', 'State ID and POA Details', $edit_icon);
                                sc_option_tabs('emp', '', 'Employees','');
                                ?>
    </div>
    <div class="sc_tab_render" id='ent_cd'> <?php
                                            $lables_array = [
                                                "Company Name", "Legal Business Address", "Business Type", "Branch code", "Company code", "City", "State", "Zip", "Industry", "Delivery Address", "NAICS", "Start Date", "EIN"
                                            ];
                                            $labels_values = [
                                                $ent_name, $legal_b_adr, $ent_type, $ent_branch_code, $ent_com_code, $ent_city, $ent_state, $ent_zip, $ent_industry, $ent_deli_adr, $ent_naics, $ent_start_d, $ent_ein
                                            ];

                                            $id_array = [
                                                'name', 'legal_adr', 'type', 'branch_code', 'com_code', 'city', 'state',
                                                'zip', 'industry', 'deli_adr', 'naics', 'start_d', 'ein'
                                            ];

                                            for ($i = 0; $i < count($lables_array); $i++) {
                                                ent_detail($id_array[$i], $lables_array[$i], $labels_values[$i]);
                                            } ?>
    </div>
    <div class="sc_tab_render" id='ent_od'> <?php
                                            $lables_array = ["Contact Name", "TELEPHONE", "Owner Email", "SSN", "D.O.B", "Title", "Personal/Home Address "];
                                            $labels_values = [$ent_contact_name, $ent_tel, $ent_email, $ent_ssn, $ent_dob, $ent_title, $pers_home_adr];

                                            $id_array = [
                                                'contact_name', 'o_tel', 'o_email', 'ssn', 'dob', 'title', 'pers_home_adr'
                                            ];

                                            for ($i = 0; $i < count($lables_array); $i++) {
                                                ent_detail($id_array[$i], $lables_array[$i], $labels_values[$i]);
                                            } ?>
    </div>
    <div class="sc_tab_render" id='ent_sidfu'> <?php
                                                $lables_array = [
                                                    "Status", "Date Applied"
                                                ];
                                                $labels_values = [$ent_status, $ent_d_applied];

                                            $id_array = [
                                                'status', 'd_applied'
                                            ];

                                                for ($i = 0; $i < count($lables_array); $i++) {
                                                    ent_detail($id_array[$i], $lables_array[$i], $labels_values[$i]);
                                                } ?>
    </div>
    <div class="sc_tab_render" id='ent_sidpoa'> <?php
                                                $lables_array = [
                                                    "SIT Confirmation", "SIT1", "SIT1 Status", "SUI1", "SUI1 POA", "SIT2",
                                                    "SIT2 Status", "SUI2", "SUI2 POA", "SIT3", "SIT3 Status", "SUI3", "SUI3 POA", "Username", "Password",
                                                    "SIT Number","Reason for","Call MD SIT","MD SUI POA STATUS"
                                                ];

                                                $labels_values = [
                                                    $ent_sit_confirm, $ent_sit1, $ent_sit1_status, $ent_sui1, $ent_sui1_poa,$ent_sit2,
                                                    $ent_sit2_status, $ent_sui2, $ent_sui2_poa, $ent_sit3, $ent_sit3_status,$ent_sui3,
                                                    $ent_sui3_poa,$ent_username, $ent_password, $ent_sit_number, $reason_for,
                                                    $ent_call_md_sit, $ent_md_sui_poa_status
                                                ];

                                            $id_array = [
                                                    'sit_confirmation', 'sit1', 'sit1_status', 'sui1', 'sui1_poa', 'sit2', 'sit2_status',
                                                'sui2', 'sui2_poa', 'sit3', 'sit3_status', 'sui3', 'sui3_poa','username', 'password',
                                                'sit_number', 'reason_for', 'call_md_sit', 'md_sui_poa_status'
                                            ];

                                                for ($i = 0; $i < count($lables_array); $i++) {
                                                    ent_detail($id_array[$i], $lables_array[$i], $labels_values[$i]);
                                                } ?>
    </div>
    <div class="sc_tab_render" id='ent_emp'> <?php
                                                get_ent_employees($ent_id, 0);
                                                ?>
    </div>
</div>