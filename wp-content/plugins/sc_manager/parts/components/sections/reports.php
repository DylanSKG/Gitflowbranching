<?php
global $sec_title, $action_icon, $sec_title, $form_fnx;

// define vars
$boxes_choice_attr = array();
$boxes_choice_label = array();
$reports_param_label = array();
$reports_parameter = array();
// init vars
$sec_title = "Customize Report";
$boxes_choice_attr = [
    'get_emp_name', 'get_emp_addr1', 'get_emp_addr2', 'get_emp_city', 'get_emp_state', 'get_emp_zip', 'get_emp_ssntin',
    'get_emp_tel', 'get_emp_email', 'get_emp_wemail', 'get_emp_access', 'get_emp_status', 'get_emp_contract', 'get_emp_hDate',
    'get_emp_bdate', 'get_emp_gender', 'get_emp_endate', 'get_emp_endres', 'get_emp_lwork', 'get_emp_abs_start', 'get_emp_abs_end',
    'get_emp_paytype', 'get_emp_payfreq', 'get_emp_hdepnbr', 'get_emp_hdepdesc', 'get_emp_prate_amt', 'get_emp_prate_status',
    'get_emp_taxinfo', 'get_emp_fedall', 'get_emp_state_ms', 'get_emp_county_ms', 'get_emp_statall', 'get_emp_wstate', 'get_emp_ecname', 'get_emp_ecphone', 'get_emp_ecemail', 'get_emp_eeclass', 'get_emp_docstatus'
];

$boxes_choice_label = [
    'Employee Name', 'Employee Address Line 1', 'Employee Address Line 2', 'Employee City', 'Employee State', 'Employee ZIP', 'SSN/TIN',
    'Employee Telephone Number', 'Personal Email', 'Work Email', 'Employee Access', 'Employee Status', 'Contractor', 'Hire Date', 'Birth Date', 'Gender',
    'Termination Date', 'Termination Reason', 'Last Day Worked', 'Leave of Absence Start Date', 'Leave of Absence Return Date', 'Pay Type',
    'Employee Pay Frequency', 'Home Department Number', 'Home Department Description', 'Pay Rate Amount',
    'Pay Rate Status', 'Tax Info', 'Fed All ($)', 'State MS', 'County MS', 'State All(#)', 'Work State', 'EC Name ', 'EC Phone', 'EC Email', 'EE Classification', 'Doc Status'
];

$repor_hints = "Select the fields you would include in your custom report, and click Generate. Use the options below to fine-tune your results.";
$reports_param_label = ['company'];
$reports_parameter = [];

setting_custom_report_forms($sec_title, $action_icon, @$state_icon, $boxes_choice_label, $boxes_choice_attr, $repor_hints, $reports_param_label, $reports_parameter);

?>

<input type="hidden" name="" class="" id="the_ent_id" value="">
<input type="hidden" name="" class="" id="the_ent_name" value="">
<input type="hidden" name="" class="" id="cons_state" value="">
<!-- <input type="hidden" name="" class="" id="the_ent_state" value="">
<input type="hidden" name="" class="" id="the_ent_industry" value=""> -->

<script>
    $(document).ready(function() {

        //======================================================================================================================
        // ========================================= Bellow Delete enterprise navigation script ===============================
        //======================================================================================================================
        // $('#mySelect').change(function() {
        //     var selectedOptions = $(this).val();
        //     console.log(selectedOptions);
        // });

        var chkbx_opt = [
            'get_emp_name', 'get_emp_addr1', 'get_emp_addr2', 'get_emp_city', 'get_emp_state', 'get_emp_zip', 'get_emp_ssntin',
            'get_emp_tel', 'get_emp_email', 'get_emp_wemail', 'get_emp_access', 'get_emp_status', 'get_emp_contract', 'get_emp_hDate',
            'get_emp_bdate', 'get_emp_gender', 'get_emp_endate', 'get_emp_endres', 'get_emp_lwork', 'get_emp_abs_start', 'get_emp_abs_end',
            'get_emp_paytype', 'get_emp_payfreq', 'get_emp_hdepnbr', 'get_emp_hdepdesc', 'get_emp_prate_amt', 'get_emp_prate_status',
            'get_emp_taxinfo', 'get_emp_fedall', 'get_emp_state_ms', 'get_emp_county_ms', 'get_emp_statall', 'get_emp_wstate', 'get_emp_ecname', 'get_emp_ecphone', 'get_emp_ecemail', 'get_emp_eeclass', 'get_emp_docstatus'
        ];

        var chkbx_rep = [
            'emp_name', 'emp_adr1', 'emp_adr2', 'emp_city', 'emp_state', 'emp_zip', 'emp_ssn_tin',
            'emp_ptel', 'emp_email', 'emp_bdate', 'emp_gender', 'emp_hdep_nbr', 'emp_hdep_desc', 'emp_county_ms',
            'emp_efed_ms', 'emp_state_ms', 'emp_ec_name', 'emp_ec_phone', 'emp_ec_email', 'work_email', 'emp_access',
            'emp_status', 'emp_contract', 'emp_pay_rate_amt', 'emp_hire_date', 'emp_end_date', 'emp_end_reason',
            'emp_last_d_worked', 'emp_abs_start_date', 'emp_abs_ret_date', 'emp_pay_type', 'emp_pay_freq', 'emp_pay_rate_status', 'emp_fed_all', 'emp_state_all', 'emp_work_state', 'emp_ee_classif', 'emp_doc_status'
        ];

        $('.get_ent').click(function() {
            // alert($(this).attr('id'));

            if ($(this).attr('id') == 'id_comp') {
                target = 'business_name';
                var $render = "#id_comp"; // alert(target); //see the rendered result
                var ent_suf_id = "name";
            } else if ($(this).attr('id') == 'id_loca') {
                target = 'state';
                var $render = "#id_loca"; // alert(target);  //see the rendered result
                var ent_suf_id = "state";
            } else if ($(this).attr('id') == 'id_indu') {
                target = 'industry';
                var $render = "#id_indu"; // alert(target);  //see the rendered result
                var ent_suf_id = "industry";
            }
            // alert('get this ??');
            var from = "enterprise";
            var get = "standart";
            // var option = "standart";
            // ====================Ajax mirror getter================================================
            $.ajax({
                url: '<?php echo sc_URL . "parts/ajax/reports/reports.php"; ?>', // Replace with the URL of your server-side script
                method: 'POST',
                data: {
                    from: from,
                    target: target,
                    get: get,
                    // option: option
                },
                success: function(response) {
                    $($render).append(response);
                    if ($($render).val() != null || $($render).val() != '') {
                        $('#the_ent_id').val($($render).val());

                        $('#the_ent_' + ent_suf_id).val($('#opt_' + $($render).val()).html());
                        $($render).change(function() {
                            setTimeout(() => {
                                $($render).html('<option value="" id="res_' + $($render).val() + '">' + $('#the_ent_' + ent_suf_id).val() + '</option>');
                            }, 500);
                        });
                    } else {

                    }
                },
                error: function() {
                    $('#render_ti').html('An error occurred'); // Display an error message
                }
            });
        });

        // alert($(this).attr('id'));
        $('.ckbx_option').change(function() { //when clicking any class of this class

            for (let i = 0; i < chkbx_opt.length; i++) { //among the array values with this class
                if ($(this).attr('id') == chkbx_opt[i]) { //if one of them has an id that matches the value of this array 

                    var isChecked = $(this).prop('checked'); //define the checkbox default state
                    if (isChecked) { // if default state is checked
                        var rep_emp_id = $(this).attr('id'); // reasigning jquery var to rep_emp_id

                        //then generate and append to 'this' constructor block
                        $('.constructor').append('<input type="hidden" name="" class="" id="new_' + chkbx_rep[i] + '" value="' + chkbx_rep[i] + '">'); //get the chkbx_rep array corresponding val
                        $('#cons_state').val($('.constructor input').length); //retrieve the number of this child element and assign it to the #cons_state value.
                        var first_var = parseInt($('.constructor input').length);
                        console.log(first_var);

                    } else {
                        //then remove 'this' generated from the constructor block 
                        $('#new_' + chkbx_rep[i]).remove();
                        var first_var = parseInt($('.constructor input').length - 1 + 1);
                        console.log(first_var);
                        // $('#cons_state').val(parseInt($('.constructor input').length));
                    }
                }
            }
        });

        // $('#myCheckbox').change(function() {
        //     var isChecked = $(this).prop('checked');
        //     if (isChecked) {
        //         console.log('Checkbox is active');
        //     } else {
        //         console.log('Checkbox is not active');
        //     }
        // });

        $('#gen').click(function() {
            if ($('#cons_state').val() > 0) {
                var queryString = ""; // Variable to store the query string

                $(".constructor input").each(function() {
                    var inputValue = $(this).val();
                    queryString += '"' + inputValue + '",';
                });

                // Remove the trailing "," character from the query string
                queryString = queryString.slice(0, -1);

                console.log("Query string:", queryString);
                var from = "custom";
                var get = "standart";
                // ====================Ajax mirror getter================================================
                $.ajax({
                    url: '<?php echo sc_URL . "parts/ajax/reports/reports.php"; ?>', // Replace with the URL of your server-side script
                    method: 'POST',
                    data: {
                        from: from,
                        target: queryString,
                        get: get,
                        // option: option
                    },
                    success: function(response) {
                        $($render).append(response);
                        if ($($render).val() != null || $($render).val() != '') {
                            $('#the_ent_id').val($($render).val());

                            $('#the_ent_' + ent_suf_id).val($('#opt_' + $($render).val()).html());
                            $($render).change(function() {
                                setTimeout(() => {
                                    $($render).html('<option value="" id="res_' + $($render).val() + '">' + $('#the_ent_' + ent_suf_id).val() + '</option>');
                                }, 500);
                            });
                        } else {

                        }
                    },
                    error: function() {
                        $('#render_ti').html('An error occurred'); // Display an error message
                    }
                });
            }
        });
    });
</script>