<?php

// Get the current user's profile information
$current_user = wp_get_current_user();
$sc_user_name = $current_user->user_nicename;
// $sc_user_mail = $current_user->user_email;
$sc_user_position = "Supervisor";
