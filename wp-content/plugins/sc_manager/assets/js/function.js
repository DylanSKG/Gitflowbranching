$(document).ready(function() {
    // alert('Success');
    var copyTextareaBtn2 = document.querySelector("#copyy");
    copyTextareaBtn2.addEventListener('click', function(event) {
        var copyTextarea = document.querySelector('.js-copytextarea');
        copyTextarea.focus();
        copyTextarea.select();

        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successfully' : 'unsuccessful';
            //alert('Link copied ' + msg + ' \n you can now paste anywhere to share');
            $(".message_box").css('display', 'grid');

            $(".message_box").fadeIn(500);
            setTimeout(() => {
                $(".message_box").fadeOut(2000);
            }, 3000);

        } catch (err) {
            console.log('Oops, unable to copy');
        }
    });

    $('.sc_register_form input#user_login').attr('placeholder', 'Email or phone number');
    $('.sc_register_form input#user_pass').attr('placeholder', 'Password');
    $('.sc_register_form input#wp-submit').val('Sign in');
    $('#rev').click(function() {
        if ($('input#user_pass').attr('type') == 'text') {
            $('#rev').html('show');
            $('input#user_pass').attr('type', 'password');
        } else {
            $('#rev').html('hide');
            $('input#user_pass').attr('type', 'text');
        }
    });

    $('#sgnp_link').click(function() {
        alert("Hide all and login form and show signup form instead");
    });
});