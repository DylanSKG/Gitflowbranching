<div class="sc_left_tabs">

    <?php
    function setting_option($set_i, $set_t, $set_id = null, $set_class = null)
    {

    ?>
        <a href="#option_<?php echo $set_id; ?>" class="ref">
            <div id="<?php echo $set_id; ?>" class="options_tabs">
                <div class="icons_option <?php echo $set_class; ?>"><?php echo $set_i; ?></div>
                <div class="text_option <?php echo $set_class; ?>"><?php echo $set_t; ?></div>
            </div>
        </a>
    <?php
    }
    setting_option($user_icon, 'Personal Information', 'pin');
    setting_option($stat_icon, 'Password & Security', 'pasec');
    setting_option($msg_icon, 'Teams', 'tms');
    setting_option($report_icon, 'Reports', 'reps');

    ?>

</div>
<script>
    $(document).ready(function() {

        option_list = ['pin', 'pasec', 'tms', 'reps'];
        $('#pin').addClass('is_active');
        for (let i = 0; i < option_list.length; i++) {
            $('#' + option_list[i]).click(function() {
                $('.options_tabs').removeClass('is_active');
                $('#' + option_list[i]).addClass('is_active');
                $('.sub_main').hide();
                $('#main_' + option_list[i] + '.sub_main').slideDown();
            });

        }

    });
</script>