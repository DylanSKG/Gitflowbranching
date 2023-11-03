    <div id="welcome_title">
        <!-- <span class="dashbord_title">Welcome to Sparing Consulting Dashboard</span> -->
        <!-- -------------------------------------------------------------------------------------------------App top left bar -->
        <div class="sc_toptbar_left">
			<a href="<?php echo home_url(); ?>">
            	<img class="sc_home_logo" src='<?php echo IMG . "Sparing logo all.png"; ?>'>
			</a>
        </div>

        <!-- -------------------------------------------------------------------------------------------------App top middle bar -->
        <div class="sc_toptbar_middle"></div>

        <!-- -------------------------------------------------------------------------------------------------App top right bar -->
        <div class="sc_toptbar_right">
            <div class="sc_notif"><button class="act_status"></button><i class="fa fa-bell"></i></div>

            <!-- ---------------------------------------------------------------------------------------------______profil section -->
            <img class="sc_prof_img" src='<?php echo IMG . "profil.png"; ?>' />
            <ul id="sc_profil_action">
                <a href="<?php echo wp_login_url(); ?>">
                    <li class="sc_profil_list" id="lgt">Logout</li>
                </a>
<!--                 <a href="<?php //echo admin_url('/profile.php'); ?>"> -->
                    <li class="sc_profil_list" id="v_profil">View profil</li>
<!--                 </a> -->
            </ul>
            <div class="sc_home_logo">
                <span class="sc_user_name"><?php echo $sc_user_name; ?></span>
                <span class="sc_user_position"><?php echo $sc_user_position; ?></span>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.sc_prof_img').click(function() {
                $('#sc_profil_action').slideToggle();
            });

            $('#opt_ent').click(function() {
                $('#sc_from').val($('#opt_ent').val());
                console.log($('#sc_from').val());
            });

            $('#opt_emp').click(function() {
                $('#sc_from').val($('#opt_emp').val());
                console.log($('#sc_from').val());
            });

            $('form#your-profile tr input, form#your-profile tr textarea, form#your-profile tr select ').attr('disabled', 'disabled');

        });
    </script>