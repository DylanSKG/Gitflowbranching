<?php
global $hints;
    $hints = "Choose a strong, unique password that's at least 8 characters long";
    setting_security_states('Password', $edit_icon, $valid_icon, 'Password has been set', $hints);


    $hints = "Confirm your identity by inputting the secret code sent to your email";
    setting_security_states('Two Factor Authentication', '', $valid_icon, 'Email Verification has been set', $hints);
