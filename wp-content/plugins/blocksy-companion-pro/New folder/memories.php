<?php


// section_boxes
function section_boxes()
{
    echo '<div class="vc_row wpb_row vc_inner vc_row-fluid">
        <div class="wpb_column vc_column_container vc_col-sm-3" id="display_photo" alt="test">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="wpb_single_image wpb_content_element vc_align_left   svg_img">
                        <h2 class="wpb_heading wpb_singleimage_heading">Photo</h2>
                        <figure class="wpb_wrapper vc_figure">
                            <div class="vc_single_image-wrapper   vc_box_border_grey"><img width="33" height="25" src="http://localhost/remember/wp-content/uploads/2023/03/photo.svg" class="vc_single_image-img attachment-thumbnail" alt="" decoding="async" loading="lazy" title="photo"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-3" id="display_story">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="wpb_single_image wpb_content_element vc_align_left   svg_img">
                        <h2 class="wpb_heading wpb_singleimage_heading">Story</h2>
                        <figure class="wpb_wrapper vc_figure">
                            <div class="vc_single_image-wrapper   vc_box_border_grey"><img width="31" height="30" src="http://localhost/remember/wp-content/uploads/2023/03/story.svg" class="vc_single_image-img attachment-thumbnail" alt="" decoding="async" loading="lazy" title="story"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-3" id="display_condoleance">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="wpb_single_image wpb_content_element vc_align_left   svg_img">
                        <h2 class="wpb_heading wpb_singleimage_heading">Condoleance</h2>
                        <figure class="wpb_wrapper vc_figure">
                            <div class="vc_single_image-wrapper   vc_box_border_grey"><img width="30" height="25" src="http://localhost/remember/wp-content/uploads/2023/03/condoleance.svg" class="vc_single_image-img attachment-thumbnail" alt="" decoding="async" loading="lazy" title="condoleance"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-3" id="display_video">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="wpb_single_image wpb_content_element vc_align_left   svg_img">
                        <h2 class="wpb_heading wpb_singleimage_heading">Videos</h2>
                        <figure class="wpb_wrapper vc_figure">
                            <div class="vc_single_image-wrapper   vc_box_border_grey"><img width="90" height="90" src="http://localhost/remember/wp-content/uploads/2023/03/camera.svg" class="vc_single_image-img attachment-thumbnail" alt="" decoding="async" loading="lazy" title="camera"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>';
}
add_shortcode('section_boxes', 'section_boxes', 11);

// post_image
function post_image($name, $content, $type)
{
 
?>
<h2>Upload a File</h2>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" required />
    <input type="submit" name="upload_file" value="Upload" />
</form>
<?php
}
add_shortcode('new_media_img', 'post_image', 11);


function post_story($name, $content, $type)
{

    echo '<div class="memory-text-container">
    <div class="dark-gray-label text-input-label">Year : <input type="text" value="" id="story_year" placeholder="Exemple: 2020"></div>
    <div class="dark-gray-label text-input-label">Location : <input id="story_location" type="text" value="" placeholder="Exemple: Washinton DC"></div>
    <div class="dark-gray-label text-input-label">Your Story</div>
    <textarea name="memory-text" cols="40" rows="10" class="editable medium-editor-textarea medium-editor-hidden" placeholder="" id="story_content" medium-editor-textarea-id="medium-editor-1678739401529" style="height: 88px;"></textarea>
    
    <div class="dark-gray-label text-input-label">Your Name : <input id="writer_name" type="text" value="" placeholder="Insert your known name here"></div>
    <div class="dark-gray-label text-input-label">  What was your relationship with Lise ? : <select name="passwordless-signup-relationship-relationship_type" id="writer_relationship">
    <option value="" selected="">-- Select a relationship type --</option><option value="husband">Husband</option><option value="wife">Wife</option><option value="spouse">Spouse</option> <option value="partner">Partner</option><option value="friend">Friend</option><option value="daughter">Daughter</option><option value="son">Son</option><option value="mother">Mother</option><option value="father">Father</option><option value="brother">Brother</option><option value="sister">Sister</option><option value="grandson">Grandson</option><option value="granddaughter">Granddaughter</option><option value="grandmother">Grandmother</option><option value="grandfather">Grandfather</option><option value="cousin">Cousin</option><option value="aunt">Aunt</option><option value="uncle">Uncle</option><option value="niece">Niece</option><option value="nephew">Nephew</option><option value="family">Family</option><option value="family_friend">Family friend</option><option value="boyfriend">Boyfriend</option><option value="girlfriend">Girlfriend</option><option value="coworker">Coworker</option><option value="grandparent">Grandparent</option><option value="grandchild">Grandchild</option><option value="sibling">Sibling</option><option value="child">Child</option><option value="parent">Parent</option><option value="daughter-in-law">Daughter-in-law</option><option value="son-in-law">Son-in-law</option><option value="child-in-law">Child-in-law</option><option value="mother-in-law">Mother-in-law</option><option value="father-in-law">Father-in-law</option><option value="parent-in-law">Parent-in-law</option><option value="sister-in-law">Sister-in-law</option><option value="brother-in-law">Brother-in-law</option><option value="sibling-in-law">Sibling-in-law</option><option value="ex-husband">Ex-husband</option><option value="ex-wife">Ex-wife</option><option value="ex-partner">Ex-partner</option><option value="step-daughter">Step-daughter</option><option value="step-son">Step-son</option><option value="step-child">Step-child</option><option value="step-mother">Step-mother</option><option value="step-father">Step-father</option><option value="step-parent">Step-parent</option><option value="funeral-director">Funeral director</option><option value="nurse">Nurse</option><option value="doctor">Doctor</option><option value="medical-social-worker">Medical social worker</option><option value="death-doula">Death doula</option><option value="other">Other</option>
</select></div>
</div>
<button class="post_memory" id="post_story">Post the story</button>
';
}
add_shortcode('new_story', 'post_story', 11);

// post_condoleance
function post_condoleance($name, $content, $type)
{

    echo '<div class="memory-text-container">
    <div class="dark-gray-label text-input-label">Your Name : <input type="text" id="c_writer_name" value="" placeholder="Insert your known name here"></div>
    <div class="dark-gray-label text-input-label">From : <input id="c_story_location" type="text" value="" placeholder="Country name ; Exemple: Cameroon "></div><div class="dark-gray-label text-input-label">Your condolence</div>
    <textarea name="memory-text" cols="40" rows="10" class="editable medium-editor-textarea medium-editor-hidden" placeholder="" id="c_story_content" medium-editor-textarea-id="medium-editor-1678739401529" style="height: 88px;"></textarea>
    
    <div class="dark-gray-label text-input-label">  What was your relationship with Lise ? : <select name="passwordless-signup-relationship-relationship_type"  id="c_writer_relationship"">
    <option value="" selected="">-- Select a relationship type --</option><option value="husband">Husband</option><option value="wife">Wife</option><option value="spouse">Spouse</option> <option value="partner">Partner</option><option value="friend">Friend</option><option value="daughter">Daughter</option><option value="son">Son</option><option value="mother">Mother</option><option value="father">Father</option><option value="brother">Brother</option><option value="sister">Sister</option><option value="grandson">Grandson</option><option value="granddaughter">Granddaughter</option><option value="grandmother">Grandmother</option><option value="grandfather">Grandfather</option><option value="cousin">Cousin</option><option value="aunt">Aunt</option><option value="uncle">Uncle</option><option value="niece">Niece</option><option value="nephew">Nephew</option><option value="family">Family</option><option value="family_friend">Family friend</option><option value="boyfriend">Boyfriend</option><option value="girlfriend">Girlfriend</option><option value="coworker">Coworker</option><option value="grandparent">Grandparent</option><option value="grandchild">Grandchild</option><option value="sibling">Sibling</option><option value="child">Child</option><option value="parent">Parent</option><option value="daughter-in-law">Daughter-in-law</option><option value="son-in-law">Son-in-law</option><option value="child-in-law">Child-in-law</option><option value="mother-in-law">Mother-in-law</option><option value="father-in-law">Father-in-law</option><option value="parent-in-law">Parent-in-law</option><option value="sister-in-law">Sister-in-law</option><option value="brother-in-law">Brother-in-law</option><option value="sibling-in-law">Sibling-in-law</option><option value="ex-husband">Ex-husband</option><option value="ex-wife">Ex-wife</option><option value="ex-partner">Ex-partner</option><option value="step-daughter">Step-daughter</option><option value="step-son">Step-son</option><option value="step-child">Step-child</option><option value="step-mother">Step-mother</option><option value="step-father">Step-father</option><option value="step-parent">Step-parent</option><option value="funeral-director">Funeral director</option><option value="nurse">Nurse</option><option value="doctor">Doctor</option><option value="medical-social-worker">Medical social worker</option><option value="death-doula">Death doula</option><option value="other">Other</option>
</select></div>
</div>
<button class="post_memory" id="post_condoleance">Post the condoleance</button>
';
    //Création de page automatiquement à l'activation du plugin

}
add_shortcode('new_condoleance', 'post_condoleance', 11);


// post_video
function post_video($name, $content, $type)
{
    echo '<div class="memory-text-container">
    <div class="dark-gray-label text-input-label">Upload your video memory : <input type="file" value="" id="v_file" multiple ></div>
    <div class="dark-gray-label text-input-label">video Legend : <input id="v_description" type="text" value="" placeholder="Short description of this/these video(s) "></div>
    <div class="dark-gray-label text-input-label">From <i class="fa fa-map-marker"></i> <input id="v_location" type="text" value="" placeholder="Your Country name ; Exemple: Cameroon"></div>
   
    <div class="dark-gray-label text-input-label">Your Name : <input type="text" id="v_writer_name" value="" placeholder="Insert your known name here"></div>
    <div class="dark-gray-label text-input-label">  What was your relationship with Lise ? : <select name="passwordless-signup-relationship-relationship_type"  id="v_writer_relationship"">
    <option value="" selected="">-- Select a relationship type --</option><option value="husband">Husband</option><option value="wife">Wife</option><option value="spouse">Spouse</option> <option value="partner">Partner</option><option value="friend">Friend</option><option value="daughter">Daughter</option><option value="son">Son</option><option value="mother">Mother</option><option value="father">Father</option><option value="brother">Brother</option><option value="sister">Sister</option><option value="grandson">Grandson</option><option value="granddaughter">Granddaughter</option><option value="grandmother">Grandmother</option><option value="grandfather">Grandfather</option><option value="cousin">Cousin</option><option value="aunt">Aunt</option><option value="uncle">Uncle</option><option value="niece">Niece</option><option value="nephew">Nephew</option><option value="family">Family</option><option value="family_friend">Family friend</option><option value="boyfriend">Boyfriend</option><option value="girlfriend">Girlfriend</option><option value="coworker">Coworker</option><option value="grandparent">Grandparent</option><option value="grandchild">Grandchild</option><option value="sibling">Sibling</option><option value="child">Child</option><option value="parent">Parent</option><option value="daughter-in-law">Daughter-in-law</option><option value="son-in-law">Son-in-law</option><option value="child-in-law">Child-in-law</option><option value="mother-in-law">Mother-in-law</option><option value="father-in-law">Father-in-law</option><option value="parent-in-law">Parent-in-law</option><option value="sister-in-law">Sister-in-law</option><option value="brother-in-law">Brother-in-law</option><option value="sibling-in-law">Sibling-in-law</option><option value="ex-husband">Ex-husband</option><option value="ex-wife">Ex-wife</option><option value="ex-partner">Ex-partner</option><option value="step-daughter">Step-daughter</option><option value="step-son">Step-son</option><option value="step-child">Step-child</option><option value="step-mother">Step-mother</option><option value="step-father">Step-father</option><option value="step-parent">Step-parent</option><option value="funeral-director">Funeral director</option><option value="nurse">Nurse</option><option value="doctor">Doctor</option><option value="medical-social-worker">Medical social worker</option><option value="death-doula">Death doula</option><option value="other">Other</option>
</select></div>
</div>
<button class="post_memory" id="post_video">Post video memory</button>
';
    //Création de page automatiquement à l'activation du plugin

}
add_shortcode('new_media_video', 'post_video', 11);



// load_memories
function load_memories($count)
{
    global $wpdb, $count, $del_linked;
    echo '<div class="reponse"><div id="post_response">dsds</div></div>';
    echo '<div class="load_memories" id="memories_container">';
    $i = 1;

    foreach ($wpdb->get_results("SELECT * FROM dc_posts WHERE post_type='memory'") as $key => $row) {
        $child_id = $row->ID;
        $count++;
        $i++;
        $post = get_post($child_id);
        // $total = $row->total;
        $c_id = $post->ID;
        $c_content = $post->post_content;
        $c_title = $post->post_title;
        $c_date_posted = $post->post_date;
        // $c_title = $post->post_title;
        $c_ref = $post->guid;
        $real_link = $c_ref;
        // $phone = get_post_meta($post,"");
        $writer_name = get_mid_by_key($c_id, "writer_name");
        $writer_relationship = get_mid_by_key($c_id, "writer_relationship");
        $story_year = get_mid_by_key($c_id, "story_year");
        $story_location = get_mid_by_key($c_id, "story_location");


        echo '
        <div class="single_memory">
            <div class="memory_header">
                <span id="memory_title">$c_title </span>' ?><span id="del" onclick='document.location="<?php echo $del_linked ?>"' alt="supprimer" title="Supprimer cette formation" class="link_session">Effacer</span>
        </div>
        <div class="memory_content">
            <div class="memory_comments"><?php

                if (strpos($c_title, 'video') > 0 || strpos($c_title, 'photo') > 0) {
                echo '<div class="memory_post">';
                    if (strpos($c_title, 'video') > 0) {
                    echo '<video width="400" controls>
                        <source src="https://www.youtube.com/watch?v=2N0Ci24NZPM" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>';
                    } else {
                    echo '<img id="media_' . $i . '" class="media_posts" src="http://localhost/remember/wp-content/uploads/2023/03/heart-1.jpg" alt="media memory' . $i . '" srcset="">';
                    }
                    echo '</div>';
                }

                echo $c_content . '
            </div>
            <span id="memory_author">' . $writer_name . '<span id="memory_relationship">' . $writer_relationship . '</span></span>

            <div class="footer_memory">
                <div class="date_post"><i class="fa fa-calendar"></i> : ' . $c_date_posted . '</div>

                <div class="memory_location"><i class="fa fa-map-marker"></i> : ' . $story_location . '</div>
            </div>
        </div>
        </div>';?>

<?php
    }
    echo '</div>';
}

add_shortcode('load_memories', 'load_memories', 11);


function social_links()
{

    global $wpdb, $count;
    foreach ($wpdb->get_results("SELECT * FROM dc_posts WHERE post_type='memory'") as $key => $row) {
        $child_id = $row->ID;
        if (!empty($child_id)) {
            $count++;
        }
    }
    echo '<div class="memorial-social-module d-flex flex-row justify-content-between justify-content-lg-start align-items-center align-items-md-end">

        <a id="comments" class="comment-btn track-click-with-delay d-flex d-md-none fw-semibold" href="#display_photo" data-event-action="click-memorial-comment" data-event-category="memorial sharing">
            <span class="values">' . $count . '</span>
            <img src="http://remember.beambuy.store/wp-content/uploads/2023/03/Group-35.svg" alt="Speech bubble icon">
        </a>
       <!--  <a class="btn-facebook-share d-none d-lg-flex track-click fw-semibold" href="javascript:;" data-event-action="click-memorial-share" data-event-category="memorial sharing">
            Share <img src="http://localhost/remember/wp-content/uploads/2023/03/facebook.cdf5d023c9b8.svg" alt="Facebook icon" width="25" height="20">
        </a>
        
        <a id="social-native-share-pre-photo-header" class="memorial-public-share btn-native-share d-flex d-lg-none fw-semibold" href="javascript:;" data-event-action="click-memorial-share-mobile" data-event-category="memorial sharing" data-share-url="https://remember.beambuy.store" data-share-title="First_name Last_names Memorial Website on Ever Loved">
             <img src="http://localhost/remember/wp-content/uploads/2023/03/noun_Share_2028604_8e8e8e.svg" alt="Share icon">
        </a> -->

        <!-- 
        <a class="btn-facebook-share d-none d-lg-flex track-click fw-semibold" href="javascript:;" data-event-action="click-memorial-share" data-event-category="memorial sharing">
            <img src="http://localhost/remember/wp-content/uploads/2023/03/whatsapp.png" alt="Whatsapp icon"  width="30" height="auto">
        </a> -->

        <a class="email-share-btn d-none d-lg-flex track-click fw-semibold" target="_blank" href="mailto:?subject=I%20thought%20you%27d%20want%20to%20see%20First_name%20Last_name%27s%20memorial%20website&amp;body=There%27s%20a%20memorial%20website%20for%20First_name%20Last_name%20online%20called%20Remember.%20You%20can%20view%20it%20here:%20https://remember.beambuy.store/ " data-event-action="click-memorial-email" data-event-category="memorial sharing">
            mail <img src="https://everloved.com/static/svg/email-action.beecdaa959d7.svg" alt="Email icon" width="25" height="20">
        </a>

        <a href="javascript:;" id="copyy" class="btn-copy sharing-btn header-button d-none d-md-block fw-semibold" data-clipboard-text="https://remember.beambuy.store/" data-event-action="copy-link" data-event-category="memorial sharing" data-bs-title="Copy Memorial Website URL">
            <span class="d-none d-md-inline">Copy link</span>
            <img src="https://everloved.com/static/svg/link-black.ae11f6346575.svg" alt="Copy icon" width="20" height="20">
            
        </a>
    </div>';
}


add_shortcode('social_links', 'social_links');


//Adding scripts for................................................................
add_action('wp_enqueue_scripts', 'jquery_offlne');
function jquery_offlne()
{
    wp_enqueue_script('dc_jq', plugins_url('jquery-3.2.0.min.js', __FILE__));
}


//Adding scripts for................................................................
add_action('wp_enqueue_scripts', 'ava_test_init');
function ava_test_init()
{
    wp_enqueue_script('dc_js', plugins_url('function.js', __FILE__));
}