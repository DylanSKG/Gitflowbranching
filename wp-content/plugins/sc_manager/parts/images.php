<textarea disabled style="position:absolute; left:-50vw" class="js-copytextarea"><?php echo home_url().$_SERVER['REQUEST_URI']; ?> </textarea>
<div class="message_box" ><div class="msg_box" ><span class="respond" >Link Copied successfully! You can now paste it anywhere</span></div></div>
<div class="style"></div>
<?php

get_header();

global $wpdb, $count;

$i = 0;

foreach ($wpdb->get_results("SELECT distinct(object_id), term_taxonomy_id FROM dc_term_relationships WHERE term_taxonomy_id=13 or term_taxonomy_id=14") as $key => $row) {

    $child_id = $row->object_id;
    $taxo_id = $row->term_taxonomy_id;

    $count++;
    $i++;
    $post = get_post($child_id);
    // $total = $row->total;
    $c_id = $post->ID;
    $c_name = $post->post_name;
    $current_url = $_SERVER['REQUEST_URI'];
    $del_linked = home_url("/?deleted=$c_id");

    // echo $_SERVER['REQUEST_URI']."$i | $c_name -";
    if (strpos($current_url, $c_name) > 0) {
        $c_ref = $post->guid;
        $c_title = $post->post_title;
        $location = get_mid_by_key($c_id, "dc_address");
        $img_id = get_mid_by_key($c_id, "_thumbnail_id");

        // echo $taxo_id;
        if ($taxo_id == 13) {
            $cntent_title = "Car rentals";
            $pref = 'dc_';
        } else {
            $cntent_title = "Apartement Rates";
            $pref = 'aptm_';
        }

        if (!empty($img_id) && $img_id != "") {
            $img_url = wp_get_attachment_url($img_id);
        } else {
            $img_url = home_url("wp-content/uploads/2023/03/")."Beambuy-Rentals-Logo.jpg";
        }

        echo '<br>
                    <div class="vc_row wpb_row vc_row-fluid image_header wpb_animate_when_almost_visible wpb_fadeIn fadeIn vc_custom_1681308239549 wpb_start_animation animated " id="post_img_section">
                        <div class="wpb_column vc_column_container post_top_header">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column" id="author_post_name">
                                        <h3><strong>' . $c_title . '</strong></h3>
                                    </div>

                                <div class="post_details">
                                    <div class="post_sub_details">
                                        <span class="date"><b class="rates">' . $cntent_title."</b>";
        for ($cnter = 0; $cnter < 4; $cnter++) {
            echo '<img alt="" src="' . IMG . 'stars.png" class="avatar avatar-64 photo_attr stars ">';
        }

        echo ' |
                                        <span class="adr">3 <i class="fa-solid fa-comment"></i> | </span><b><i class="fa-solid fa-location-dot"></i> ' . $location . '</b></span>
                                    </div>

                                    <div class="socials">
                                        <div class="rentals-social-module d-flex flex-row justify-content-between justify-content-lg-start align-items-center align-items-md-end">
                                            <a class="email-share-btn d-none d-lg-flex track-click fw-semibold" target="_blank" href="mailto:?subject=content of the subject here" data-event-action="click-rentals-email" data-event-category="rentals sharing">
                                                <img src="https://everloved.com/static/svg/email-action.beecdaa959d7.svg" alt="Email icon" width="25" height="20">
                                            </a>

                                            <a href="javascript:;" id="copyy" class="btn-copy sharing-btn header-button d-none d-md-block fw-semibold" data-clipboard-text="'.home_url().'/" data-event-action="copy-link" data-event-category="rentals sharing" data-bs-title="Copy rentals Website URL">
                                                <img src="https://everloved.com/static/svg/link-black.ae11f6346575.svg" alt="Copy icon" width="20" height="20">
                                                <span class="d-none d-md-inline">Copy link</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container" id="img_bloc">
                        <div class="wpb_column vc_column_container" id="feature_img_bloc">
                            <img id="feature_img" src="' . $img_url . '" class="vc_single_image-img attachment-large" alt="" decoding="async" loading="lazy" sizes="(max-width: 1024px) 100vw, 1024px">
                        </div>
                        <div class="wpb_column vc_column_container" id="adi_imgs">';
        // echo $c_id;
        foreach ($wpdb->get_results('SELECT meta_value FROM dc_postmeta WHERE post_id="' . $c_id . '" AND meta_key="' . $pref . 'nth_file"') as $key => $row) {

            $nth_file = $row->meta_value;
            // echo $nth_file;
            echo '<img src="' . wp_get_attachment_url($nth_file) . '" class="vc_single_image-img attachment-thumbnail single_adi_imgs" alt="" decoding="async" loading="lazy" title="photo">';
        }

        echo '</div>

                    </div>';
    }
}
