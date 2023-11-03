<?php
$reports_param_label = ['company'];
?>
<div id="sc_add" title="add method" value="Selection" class="sc_get_emp_access"><button id="from_new" class="add_choice">Create New</button>
<?php
load_enterprise($reports_param_label);
?>
</div>
<input type="hidden" name="" class="" id="the_ent_id" value="">
<input type="hidden" name="" class="" id="the_ent_name" value="">
<script>
    $(document).ready(function() {
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

    });
</script>