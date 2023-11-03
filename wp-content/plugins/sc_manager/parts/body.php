<?php
global $count, $wpdb;
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
    $author = $post->post_author;

    $current_url = $_SERVER['REQUEST_URI'];
    // $c_title = $post->post_title;

    // 
    // echo $_SERVER['REQUEST_URI']."$i | $c_name -";
    if (strpos($current_url, $c_name) > 0) {

        // $c_title = $post->post_title;
        $c_ref = $post->guid;
        $real_link = $c_ref;
        // $phone = get_post_meta($post,"");
        $writer_name = get_mid_by_key($c_id, "writer_name");
        // if( $_SERVER['HTTP_HOST'])
        $c_title = $post->post_title;

        // echo $taxo_id;
        if ($taxo_id == 13) {
            //car attributs
            $airbag = get_mid_by_key($c_id, "dc_airbag");
            $abs = get_mid_by_key($c_id, "dc_abs");
            $ac = get_mid_by_key($c_id, "dc_ac");
            $gps = get_mid_by_key($c_id, "dc_gps");
            $auto_pilot = get_mid_by_key($c_id, "dc_auto_pilot");
            $attributes_cnter = intval($airbag) + intval($abs) + intval($ac) + intval($gps) + intval($auto_pilot);
            $get_cntent_title = "Car";

            // echo "$airbag | $abs | $ac | $gps | $auto_pilot | $attributes_cnter";

            //car characteristics
            $ctype = get_mid_by_key($c_id, "dc_car_type");
            $sits = get_mid_by_key($c_id, "dc_sits");
            $doors = get_mid_by_key($c_id, "dc_doors");
            $color = get_mid_by_key($c_id, "dc_car_color");
            $transmission = get_mid_by_key($c_id, "dc_transmission");
            $engine = get_mid_by_key($c_id, "dc_engine");
            $fuel = get_mid_by_key($c_id, "dc_fuel");

            $auto_pilot = get_mid_by_key($c_id, "dc_auto_pilot");

            // echo "$airbag | $abs | $ac | $gps | $auto_pilot | $attributes_cnter";
        } else {



            //Apartement main properties
            $mainroom = get_mid_by_key($c_id, "mainroom");
            $bedroom = get_mid_by_key($c_id, "bedroom");
            $beds = get_mid_by_key($c_id, "beds");
            $baby_beds = get_mid_by_key($c_id, "baby_beds");
            $bathroom = get_mid_by_key($c_id, "bathroom");
            $Kitchen = get_mid_by_key($c_id, "Kitchen");
            $parkings = get_mid_by_key($c_id, "parkings");





            //Apartement attributs
            $wifi  = get_mid_by_key($c_id, "wifi");
            $heater  = get_mid_by_key($c_id, "heater");
            $site_Parking  = get_mid_by_key($c_id, "on-site_parking");
            $workspacce = get_mid_by_key($c_id, "dedicated_workspacce");
            $balcony = get_mid_by_key($c_id, "balcony");
            $security_alarm = get_mid_by_key($c_id, "security_alarm");
            $smoke_detector = get_mid_by_key($c_id, "smoke_detector");
            $fire_extinguisher = get_mid_by_key($c_id, "fire_extinguisher");
            $Keys_delivered = get_mid_by_key($c_id, "keys_delivered_by_the_host");
            $TV = get_mid_by_key($c_id, "tv");
            $Microwave_oven = get_mid_by_key($c_id, "microwave_oven");
            $fridge = get_mid_by_key($c_id, "fridge");
            $water_suply = get_mid_by_key($c_id, "constant_water_suply");
            $Cooker = get_mid_by_key($c_id, "cooker");
            $kitchen_equipment = get_mid_by_key($c_id, "basic_kitchen_equipment");
            $coffee_pot = get_mid_by_key($c_id, "coffee_pot");
            $Barbecue = get_mid_by_key($c_id, "barbecue");
            $Outdoor_rest_areas = get_mid_by_key($c_id, "outdoor_rest_areas");
            $Swimming_pool = get_mid_by_key($c_id, "swimming_pool");
            $pets_accepted = get_mid_by_key($c_id, "pets_accepted");



            $get_cntent_title = "Apartement";



            $attributes_cnter = intval($wifi) + intval($heater) + intval($site_Parking) + intval($workspacce) + intval($balcony) + intval($security_alarm) + 
            intval($smoke_detector) + intval($fire_extinguisher) + intval($Keys_delivered) + intval($TV) + intval($Microwave_oven) + intval($fridge) + intval($water_suply) + 
            intval($Cooker) + intval($kitchen_equipment) + intval($coffee_pot) + intval($Barbecue) + intval($Outdoor_rest_areas) + intval($Swimming_pool) + intval($pets_accepted);
            //Apartement characteristics

        }

        $location = get_mid_by_key($c_id, "dc_address");

        $user_id = get_current_user_id();
        $userdata = get_userdata($user_id);
        $user_name = $userdata->user_login;
        $user_email = $userdata->user_email;
        $image_dir = home_url('/wp-content/uploads/');
        // echo $user_name.$user_email;

        $img_id = get_mid_by_key($c_id, "_thumbnail_id");

        if (!empty($img_id) && $img_id != "") {
            $img_url = wp_get_attachment_url($img_id);
        } else {
            $img_url = IMG . "/car_outer.png";
        }

        // car attributs
        $is_cars_img = ["airbag-2", "abs1", "air conditioner", "gps tracer", "autopilot"];
        $array_cars_attr = [
            $airbag, $abs, $ac, $gps, $auto_pilot
        ];
        // car Characteristics
        $xter_is_cars_img = ["car type", "sits", "car door", "car color", "transmission", "engine", "oil fuel"];
        $array_cars_xter = [$ctype, $sits, $doors, $color, $transmission, $engine, $fuel];


        // apart attributs
        $is_apart_img = [
            "wifi", "tv", "air conditioner", "kitchen", "bedroom", "babybed", "bathroom", "smoke detector", "heater", "office", "balcony",  "parking",
            "fridge", "extinctor", "water", "hot water", "fitness",
            "daily sanity", "stars", "basic equipment", "swimming pool", "keys",
            "microwave", "cooker", "upstairs", "coffee pot", "bed", "babybed",
            "first aid", "pets", "game", "cam", "dish", "cupboard","washer", "dining room", "bathroom", "bed", "bedroom", "boiler", "chimnee"];
        $array_apart_attr = [
            $wifi,$TV, $ac, $Kitchen,$bedroom, $babybed,$bathroom, $smoke_detector, $heater, $workspacce, $balcony, $parkings, $Keys_delivered,
             $Microwave_oven, $fridge, $water_suply, $Cooker, $kitchen_equipment, $coffee_pot, $Barbecue, $Outdoor_rest_areas,
            $Swimming_pool, $pets_accepted,$fire_extinguisher,  $security_alarm];

        // apart Characteristics
        $array_apart_xter = [$mainroom, $bedroom, $beds,$bathroom,$Kitchen, $parkings];
        for($ii = 0; $ii < count($array_apart_xter); $ii++){
            if($array_apart_xter[$ii] == '' || empty($array_apart_xter[$ii]) || $array_apart_xter[$ii] == null){
                $array_apart_xter[$ii] = 0;
            }
        }
        $xter_is_apart_img = ["mainroom", "bedroom", "beds", "bathroom", "kitchen", "parking"];

        echo '
                <div class="wpb_text_column" id="author_post_name">
                    <h3><strong>Details</strong></h3>
                    <div class="wpb_column vc_column_container vc_col-sm-4">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="rentals-social-module d-flex flex-row justify-content-between justify-content-lg-start align-items-center align-items-md-end">
                                    <i class="fa fa-user"></i>
                                    Posted by : ' . get_author_name($author) . '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_row wpb_row vc_inner vc_row-fluid">
                    <div class="wpb_column vc_column_container sub_title">
                        <span class="date"> </span>
                        <div class="socials">
                    </div>
                </div>
            </div>

            <div class="attr_details">
                <input type="hidden" name="" id="name" value="' . $user_name . '" disabled>
                <input type="hidden" name="" id="emailer" value="' . $user_email . '" disabled>
                <input type="hidden" name="" id="bookfor" value="' . $get_cntent_title .  ' : ' . $c_title . '" disabled>
                <span class="adr" id="charac">Main propertie<span>s</span></span>
                <div class="attr_list char">';
        if ($taxo_id == 13) {
            for ($i = 0; $i < count($array_cars_attr); $i++) {  // echo $i;
                (!empty($array_cars_attr[$i])) ? $is_cars[$i] = IMG . "tick.png" : $is_cars[$i] = IMG . "no.png";
                echo '<span class="attr"><img alt="" title="' . $is_cars_img[$i] . '" src="' . IMG . $is_cars_img[$i] . '.png" class="avatar avatar-64 photo_attr "><img alt="" src="' . $is_cars[$i] . '" class="tick "></span>';
            }
            echo '
                </div>

                <span class="adr" id="charac">Characteristics<span>s</span></span>
                <div class="attr_list">';
            for ($i = 0; $i < count($array_cars_xter); $i++) {  // echo $i;
                echo '<span class="attr"><img alt="" src="' . IMG . $xter_is_cars_img[$i] . '.png" class="avatar avatar-64 photo_attr ">' . $array_cars_xter[$i] . '</span>';
            }
            echo '
                    </div>';
        } else {
            for ($i = 0; $i < count($array_apart_xter); $i++) {  // echo $i;
                echo '<span class="attr"><img alt="" title="Number of ' . $xter_is_apart_img[$i] . '" src="' . IMG . $xter_is_apart_img[$i] . '.png" class="avatar avatar-64 photo_attr props">' . $array_apart_xter[$i] . '</span>';
            }
            echo '</div>
            <span class="adr" id="attr"> <b>' . $attributes_cnter . '</b> Available Attribute<span>s</span></span>
                <div class="attr_list the_show">';
            for ($i = 0; $i < count($is_apart_img); $i++) {  // echo $i;
                (!empty($array_apart_attr[$i])) ? $is_apart[$i] = IMG . "tick.png" : $is_apart[$i] = IMG . "no.png";
                echo '<span class="attr"><img alt="" title="' . $is_apart_img[$i] . '" src="' . IMG . $is_apart_img[$i] . '.png" class="avatar avatar-64 photo_attr "><img alt="" src="' . $is_apart[$i] . '" class="tick "></span>';
            }
            echo '<span class="more_bloc"><button id="show_more_attr">Show all atrributes</button></span></div>
            <div id="showout"><div class="attr_list the_hide">';
            for ($i = 0; $i < count($is_apart_img); $i++) {  // echo $i;
                (!empty($array_apart_attr[$i])) ? $is_apart[$i] = IMG . "tick.png" : $is_apart[$i] = IMG . "no.png";
                echo '<span class="attr"><img alt="" title="' . $is_apart_img[$i] . '" src="' . IMG . $is_apart_img[$i] . '.png" class="avatar avatar-64 photo_attr "><img alt="" src="' . $is_apart[$i] . '" class="tick "><span class="text">' . substr($is_apart_img[$i],0,10) . '</span></span>';
            }
            echo '</div><span id="close_me">X</span></div>';
        }
    }
}
?>
</div>