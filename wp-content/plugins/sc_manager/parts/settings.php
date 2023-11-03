<?php
global $wpdb, $ent, $emp;
include('global_function.php');

$ent = 'enterprise';
$emp = 'employee';
?>

<!-- ---------------------------------------------------------------------------------------------------------App main bloc -->
<div class="welcome_page">
    <?php include('layouts/top_bar.php'); ////include the header top bar section 
    ?>
    <!-- -----------------------------------------------------------------------------------------------------App main content -->
    <div style="display:non" class="sc_content">
        <?php include('layouts/main_left_bar.php'); ////include the header main left bar section 
        ?>

        <!-- -------------------------------------------------------------------------------------------------App main section (right) -->
        <div class="main_box">
            <div class="sc_column_box">
                <div class="sc_column_small">
                    <div class="sc_action">
                        <?php
                        include('components/settings_sidebar.php'); ////include the second left menu bar section 
                        ?>
                    </div>
                </div>
                <!-- ----------------------//include the employee information form -->
                <div class="sc_column_large">
                    <?php include('components/settings_main.php'); ?>

                    <!-- ----------------------//include the employee edit  form -->
                    <div id="del_response"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="data_select_ent"></script>
    <script>
        $(document).ready(function() {

            function custom_spliter(string, from, to, reverse = 0) {
                var lastIndex = string.lastIndexOf(from);

                if (reverse != 0) {
                    var result = string.substring(lastIndex + 1, string.indexOf(to, lastIndex));
                } else {
                    var result = string.split(from)[1].split(to)[0].trim();
                }
                return result;
            }

            var emp_id = custom_spliter(location.href, '=', '#');
            // alert(emp_id);

            function inject_ent_link(ent_id) {
                def_ent_lnk = location.href;
                def_ent_lnk = custom_spliter(def_ent_lnk, '.', 'employee', 1) + "enterprise/?id=" + ent_id;
                console.log(def_ent_lnk);
                $('#go_to_ent').attr('href', def_ent_lnk);
            }

            function inject_emp_link(emp_id) {
                def_ent_lnk = location.href;
                def_ent_lnk = custom_spliter(def_ent_lnk, '.', 'enterprise', 1) + "employee/?id=" + emp_id;
                console.log(def_ent_lnk);
                $('#go_to_emp').attr('href', def_ent_lnk);
            }

            function backtohome(from, to, reverser) {
                def_ent_lnk = location.href;
                url = custom_spliter(def_ent_lnk, from, to, 0);
                location.href = url;
                // def_ent_lnk
            }


        });
    </script>