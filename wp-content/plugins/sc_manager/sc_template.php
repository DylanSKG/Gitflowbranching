<?php
// gettint the Meta value by metakey and id function
// Usage:

// ----------------------------------------------------------------------Invocate Image post section
function sc_login()
{
    include("parts/logins.php");
}
add_shortcode('login', 'sc_login', 11);


// ----------------------------------------------------------------------Invocate app home page
function sc_welcome()
{
    if (is_user_logged_in()) {
        include("parts/sc_home.php");
    } else { ?><script>
            window.location.href = "signin.php";
        </script><noscript>
            <meta http-equiv="refresh" content="0;url=signin.php">
        </noscript><?php
    }
}
add_shortcode('welcome', 'sc_welcome', 11);

// ----------------------------------------------------------------------Invocate userboard section
function sc_user($sql_request)
{
    if (is_user_logged_in()) { 
        include("parts/userboard.php");
    } else { ?><script>
            window.location.href = "signin.php";
        </script><noscript>
            <meta http-equiv="refresh" content="0;url=signin.php">
        </noscript><?php
    } 
}
add_shortcode('userboard', 'sc_user', 11);


// ----------------------------------------------------------------------Invocate settings section
function sc_settings($sql_request)
{
    if (is_user_logged_in()) {    
        include("parts/settings.php");
    } else { ?><script>
            window.location.href = "signin.php";
        </script><noscript>
            <meta http-equiv="refresh" content="0;url=signin.php">
        </noscript><?php
    }    
}
add_shortcode('settings', 'sc_settings', 11);




// ----------------------------------------------------------------------Invocate enterprise section
function sc_ent($sql_request)
{
    if (is_user_logged_in()) {    
        include("parts/enterprise.php");
    } else { ?><script>
            window.location.href = "signin.php";
        </script><noscript>
            <meta http-equiv="refresh" content="0;url=signin.php">
        </noscript><?php
    }    
}
add_shortcode('enterprise', 'sc_ent', 11);


// ----------------------------------------------------------------------Invocate employee section
function sc_emp($sql_request)
{
    if (is_user_logged_in()) {    
        include("parts/employee.php");
    } else { ?><script>
            window.location.href = "signin.php";
        </script><noscript>
            <meta http-equiv="refresh" content="0;url=signin.php">
        </noscript><?php
    }    
}
add_shortcode('employee', 'sc_emp', 11);


