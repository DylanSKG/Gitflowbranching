<?php
$emp_attribut = ['company'];
$emp_label = ['employee'];
?>
<div id="sc_add" title="" value="Selection" class="sc_get_emp_access"><button id="from_new" class="add_choice">Create New</button><button id="disabled" class="add_choice">Create New</button>
    <?php
    load_employees($emp_attribut, $emp_label);
    ?>
</div>

<script>
    $(document).ready(function() {
        $('.get_ent').click(function() {
            // alert($(this).attr('id'));

            if ($(this).attr('id') == 'id_comp') {
                target = 'emp_name';
                var $render = "#id_comp"; // alert(target); //see the rendered result
                var ent_suf_id = "name";
            }
            // alert('get this ??');
            var from = "work_for";
            var get = "standart";
            // var option = "standart";
            // ====================Ajax mirror getter================================================
            $.ajax({
                url: '<?php echo sc_URL . "parts/ajax/emp_ajax.php"; ?>', // Replace with the URL of your server-side script
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
                        $('#the_emp_id').val($($render).val());

                        $('#the_emp_' + ent_suf_id).val($('#opt_' + $($render).val()).html());
                        $($render).change(function() {
                            setTimeout(() => {
                                $($render).html('<option selected value="' + $('#the_emp_' + ent_suf_id).val() + '" id="res_' + $($render).val() + '">' + $('#the_emp_' + ent_suf_id).val() + '</option>');
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