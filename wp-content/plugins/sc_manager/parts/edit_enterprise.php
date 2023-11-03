<div class="float_form" id="float_form_edit">
    <div id="edit_emp" class="new_employee edited">
        <div class="sc_column_large" >
            <div class="sc_top_tabs">
                <?php
                sc_option_tabs('e_cd', '', 'Company Details', '');
                sc_option_tabs('e_od', '', 'Owner Details', '');
                sc_option_tabs('e_sidfu', '', 'State ID App and Follow Up', '');
                sc_option_tabs('e_sidpoa', '', 'State ID and POA Details', '');
                $infos_ent = array();
                ?>
            </div>

            <div class="sc_tab_render" id='e_ent_cd'> <?php
                                                        $cd_array = [
                                                            "Company Name", "Legal Business Address", "Business Type",
                                                            "Branch code", "Company code", "City", "State", "Zip", "Industry",
                                                            "Delivery Address", "NAICS", "Start Date", "EIN"
                                                        ];

                                                        $cd_type = [
                                                            "text", "text", "text", "text", "text",
                                                            "text", "text", "text", "text", "text", "text", "text", "text"
                                                        ];

                                                        $cd_lenght = [
                                                            "28", "60", "28",   "60", "60",
                                                            "60", "60", "11", "5", "8", "10", "10","10"
                                                        ];

                                                        $cd_values = [
                                                            $ent_name, $legal_b_adr, $ent_type, $ent_branch_code,
                                                            $ent_com_code,$ent_city, $ent_state, $ent_zip, $ent_industry,
                                                            $ent_deli_adr, $ent_naics, $ent_start_d, $ent_ein
                                                        ];

                                                        for ($i = 0; $i < count($cd_array); $i++) {
                                                            // $ent_name = def_var($cd_values[$i]);
                                                            new_ent_detail($i, 'e_cd', $cd_array[$i], $cd_array[$i], $cd_lenght[$i], $cd_type[$i]);
                                                        }

                                                        $ent_name = def_var('e_cd_0');
                                                        $legal_b_adr  = def_var('e_cd_1');
                                                        $ent_type = def_var('e_cd_2');
                                                        $ent_branch_code = def_var('e_cd_3');
                                                        $ent_com_code = def_var('e_cd_4');
                                                        $ent_city = def_var('e_cd_5');
                                                        $ent_state = def_var('e_cd_6');
                                                        $ent_zip = def_var('e_cd_7');
                                                        $ent_industry = def_var('e_cd_8');
                                                        $ent_deli_adr = def_var('e_cd_9');
                                                        $ent_naics = def_var('e_cd_10');
                                                        $ent_start_d = def_var('e_cd_11');
                                                        $ent_ein = def_var('e_cd_12');

                                                        // echo $ent_fname, $ent13 . " " . $sel_ent_id;
                                                        ?>
                <div id="e_render_cd"></div>
            </div>

            <div class="sc_tab_render" id='e_ent_od'> <?php
                                                        $od_array = ["Contact Name", "TELEPHONE", "Owner Email", "SSN", "D.O.B", "Title", "Personal/Home Address "];
                                                        $od_values = [$ent_contact_name, $ent_tel, $ent_ssn, $ent_dob, $ent_title, $pers_home_adr];

                                                        $od_type = [
                                                            "text", "text", "text",  "text", "text", "text", "text"
                                                        ];
                                                        $od_lenght = [
                                                            "", "",  "", "", "", "", ""
                                                        ];

                                                        for ($i = 0; $i < count($od_array); $i++) {
                                                            new_ent_detail($i, 'e_od', $od_array[$i], $od_array[$i], $od_lenght[$i], $od_type[$i]);
                                                        }

                                                        $ent_contact_name = def_var('e_od_0');
                                                        $ent_tel = def_var('e_od_1');
                                                        $ent_email = def_var('e_od_2');
                                                        $ent_ssn = def_var('e_od_3');
                                                        $ent_dob = def_var('e_od_4');
                                                        $ent_title = def_var('e_od_5');
                                                        $pers_home_adr = def_var('e_od_6');
                                                        ?>
                <div id="e_render_od"></div>
            </div>

            <div class="sc_tab_render" id='e_ent_sidfu'> <?php
                                                            $sidfu_array = ["Status", "Date Applied"];
                                                            $sidfu_values = [$ent_status, $ent_d_applied];

                                                            $sidfu_type = ["text", "text"];
                                                            $sidfu_lenght = ["50", "50"];

                                                            for ($i = 0; $i < count($sidfu_array); $i++) {
                                                                new_ent_detail($i, 'e_sidfu', $sidfu_array[$i], $sidfu_array[$i], $sidfu_lenght[$i], $sidfu_type[$i]);
                                                            }

                                                            $ent_status = def_var('e_sidfu_0');
                                                            $ent_d_applied = def_var('e_sidfu_1');
                                                            ?>
                <div id="e_render_sidfu"></div>
            </div>

            <div class="sc_tab_render" id='e_ent_sidpoa'>
                <?php
                $sidpoa_array = [
                    "SIT Confirmation", "SIT1", "SIT1 Status", "SUI1", "SUI1 POA", "SIT2",
                    "SIT2 Status", "SUI2", "SUI2 POA", "SIT3", "SIT3 Status", "SUI3", "SUI3 Status", "Username", "Password",
                    "SIT Number", "Reason for", "Call MD SIT", "MD SUI POA STATUS"
                ];

                $sidpoa_values = [
                    $ent_sit_confirm, $ent_sit1, $ent_sit1_status, $ent_sui1, $ent_sui1_poa, $ent_sit2,
                    $ent_sit2_status, $ent_sui2, $ent_sui2_poa, $ent_sit3, $ent_sit3_status, $ent_sui3, $ent_sui3_poa,
                    $ent_username, $ent_password, $ent_sit_number, $reason_for, $ent_call_md_sit, $ent_md_sui_poa_status
                ];

                $sidpoa_type = [
                    "text", "text",
                    "text", "text",
                    "text", "text",
                    "text", "text", "text", "text",
                    "text", "text",
                    "text", "text",
                    "text", "text",
                    "text", "text", "text",
                    "text", "text"
                ];

                $sidpoa_lenght = [
                    "", "", "",  "", "", "", "", "", "", "",
                    "", "", "", "", "", "", "", "", "",
                ];

                for ($i = 0; $i < count($sidpoa_array); $i++) {
                    new_ent_detail($i, 'e_sidpoa', $sidpoa_array[$i], $sidpoa_array[$i], $sidpoa_lenght[$i], $sidpoa_type[$i]);
                }

                $ent_sit_confirm = def_var('e_sidpoa_0');
                $ent_sit1 = def_var('e_sidpoa_1');
                $ent_sit1_status = def_var('e_sidpoa_2');
                $ent_sui1 = def_var('e_sidpoa_3');
                $ent_sui1_poa = def_var('e_sidpoa_4');
                $ent_sit2 = def_var('e_sidpoa_5');
                $ent_sit2_status = def_var('e_sidpoa_6');
                $ent_sui2 = def_var('e_sidpoa_7');
                $ent_sui2_poa = def_var('e_sidpoa_8');
                $ent_sit3 = def_var('e_sidpoa_9');
                $ent_sit3_status = def_var('e_sidpoa_10');
                $ent_sui3 = def_var('e_sidpoa_11');
                $ent_sui3_poa = def_var('e_sidpoa_12');
                $ent_username = def_var('e_sidpoa_13');
                $ent_password = def_var('e_sidpoa_14');
                $ent_sit_number = def_var('e_sidpoa_15');
                $reason_for = def_var('e_sidpoa_16');
                $ent_call_md_sit = def_var('e_sidpoa_17');
                $ent_md_sui_poa_status = def_var('e_sidpoa_18');
                ?>
                <div id="e_render_sidpoa"></div>
            </div>

        </div>
        <div class="sc_tab_render" id="ent_edited"></div>
        <!-- <div class="submition_form">  -->

        <div id="edit_decide" class="decition_btn">
            <div id="nextto_2" class="sc_btns page1">Next<i class='fa fa-arrow-circle-right'></i></div>
            <div id="backto_1" class="sc_btns page2 "><i class='fa-solid fa-arrow-circle-left'></i>Preview</div>
            <div id="nextto_3" class="sc_btns page2 ">Next<i class='fa fa-arrow-circle-right'></i></div>
            <div id="backto_2" class="sc_btns page3 "><i class='fa-solid fa-arrow-circle-left'></i>Preview</div>
            <div id="nextto_4" class="sc_btns page3 ">Next<i class='fa fa-arrow-circle-right'></i></div>
            <div id="backto_3" class="sc_btns page4 "><i class='fa-solid fa-arrow-circle-left'></i>Preview</div>

            <div id="save_ent" class="sc_btns">Save <i class="fa fa-save"></i></div>
            <div id="cancel_emp" class="close_form sc_btns">Cancel <i class="fa fa-cancel"></i></div>
        </div>
    </div>
</div>