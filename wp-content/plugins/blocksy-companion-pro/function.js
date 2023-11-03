$(document).ready(function() {
    // alert('Success');

    // alert('Success');

    var checkImage = function(url) {
        console.log("1");
        var s = document.createElement("IMG");
        s.src = url
        s.onerror = function() {
            console.log("file with " + url + " invalid");
            // alert("file with " + url + " invalid");
            $
        }
        s.onload = function() {
            console.log("file with " + url + " valid");
            // alert("file with " + url + " valid")
            return 1;

        }
    }

    checkImage("http://localhost/remember/wp-content/uploads/2023/03/heart-1.jpg");


    $('button#uspcontent-tmce, button#uspcontent-html').hide();
    $('#display_photo').click(function() {
        $('#story_post, #condoleance_post, #video_post').hide();
        $('#media_post').fadeIn();
        $('#photo').css("background-color", "#f8e6ce", "border", "2 px solid #d5d2d2");
        $('#video,#story,#condoleance').css("background-color", "#d9cce0", "border", "none");
        $('#photo h2').css("color", "#000000");
        $('#video h2,#story h2,#condoleance h2').css("color", "white");
    });

    $('#display_story').click(function() {
        $('#media_post, #condoleance_post, #video_post').hide();
        $('#story_post').fadeIn();
        $('#story').css("background-color", "#f8e6ce", "border", "2 px solid #d5d2d2");
        $('#photo,#condoleance,#video').css("background-color", "#d9cce0", "border", "none");
        $('#story h2').css("color", "#000000");
        $('#photo h2,#condoleance h2,#video h2').css("color", "white");

    });

    $('#display_condoleance').click(function() {
        $('#story_post, #media_post, #video_post').hide();
        $('#condoleance_post').fadeIn();
        $('#condoleance').css("background-color", "#f8e6ce", "border", "2 px solid #d5d2d2");
        $('#photo,#story,#video').css("background-color", "#d9cce0", "border", "none")
        $('#condoleance h2').css("color", "#000000");
        $('#photo h2,#story h2,#video h2').css("color", "white");

    });

    $('#display_video').click(function() {
        $('#story_post, #condoleance_post, #media_post').hide();
        $('#video_post').fadeIn();
        $('#video').css("background-color", "#f8e6ce", "border", "2 px solid #d5d2d2");
        $('#photo,#story,#condoleance').css("background-color", "#d9cce0", "border", "none");
        $('#video h2').css("color", "#000000");
        $('#photo h2,#story h2,#condoleance h2').css("color", "white");

    });

    $("#post_story").click(function() {
        var or = "story";
        var writer_name = $("#writer_name").val();
        var story_content = $("#story_content").val();
        var story_year = $("#story_year").val();
        var story_location = $("#story_location").val();
        var writer_relationship = $("#writer_relationship").val();

        $.post('', {
            or: or,
            writer_name: writer_name,
            story_content: story_content,
            story_year: story_year,
            story_location: story_location,
            writer_relationship: writer_relationship,

        }, function(data, status) {
            $(".reponse").hide();
            $("#post_response").html('Post Submited');
            $(".reponse").fadeIn();
            setTimeout(() => {
                $(".reponse").fadeOut(2000);
            }, 3000);

        });
    });


    $("#post_condoleance").click(function() {
        var or = "condoleance";
        var writer_name = $("#c_writer_name").val();
        var condoleance_content = $("#c_story_content").val();
        var writer_location = $("#c_story_location").val();
        var writer_relationship = $("#c_writer_relationship").val();

        $.post('', {
            or: or,
            writer_name: writer_name,
            condoleance_content: condoleance_content,
            writer_location: writer_location,
            writer_relationship: writer_relationship,

        }, function(data, status) {
            $(".reponse").hide();
            $("#post_response").html('Post Submited');
            $(".reponse").fadeIn();
            setTimeout(() => {
                $(".reponse").fadeOut(2000);
            }, 3000);

        });
    });



    $("#post_image").click(function() {

        var or = "photo";
        var image = $("#img_id").val();
        var p_description = $("#p_description").val();
        var p_location = $("#p_location").val();
        var p_writer_name = $("#p_writer_name").val();
        var p_writer_relationship = $("#p_writer_relationship").val();

        $.post('', {
            or: or,
            image: image,
            p_description: p_description,
            p_location: p_location,
            p_writer_name: p_writer_name,
            p_writer_relationship: p_writer_relationship,

        }, function(data, status) {
            $(".reponse").hide();
            $("#post_response").html('Post Submited');
            $(".reponse").fadeIn();
            setTimeout(() => {
                $(".reponse").fadeOut(2000);
            }, 3000);

        });
    });


    $("#post_video").click(function() {

        var or = "video";
        var v_file = $("#v_file").val();
        var v_description = $("#v_description").val();
        var v_location = $("#v_location").val();
        var v_writer_name = $("#v_writer_name").val();
        var v_writer_relationship = $("#v_writer_relationship").val();

        $.post('', {
            or: or,
            v_file: v_file,
            v_description: v_description,
            v_location: v_location,
            v_writer_name: v_writer_name,
            v_writer_relationship: v_writer_relationship,

        }, function(data, status) {
            $(".reponse").hide();
            $("#post_response").html('Post Submited');
            $(".reponse").fadeIn();
            setTimeout(() => {
                $(".reponse").fadeOut(2000);
            }, 3000);

        });
    });

});