<?php


// metabox car
add_filter('rwmb_meta_boxes', 'cars');

function cars($meta_boxes)
{
    $prefix = 'dc_';

    $meta_boxes[] = [
        'title'    => esc_html__('cars Technical Details ', 'deltorocorp'),
        'id'       => 'cars',
        'context'  => 'normal',
        'autosave' => true,
        'fields'   => [
            [
                'type' => 'text',
                'name' => esc_html__('Adresse', 'deltorocorp'),
                'id'   => $prefix . 'address',
                'desc' => esc_html__('Area location of the vehicle', 'deltorocorp'),
                'min'  => 2,
                'max'  => 8,
            ],
            [
                'type'    => 'checkbox_list',
                'name'    => esc_html__('AIRBAG', 'deltorocorp'),
                'id'      => $prefix . 'airbag',
                'options' => [
                    '1' => esc_html__('Secure compressed Anti-shock', 'deltorocorp'),
                ],
            ],
            [
                'type'    => 'checkbox_list',
                'name'    => esc_html__('ABS', 'deltorocorp'),
                'id'      => $prefix . 'abs',
                'options' => [
                    '1' => esc_html__('Secure Antilock Braking System', 'deltorocorp'),
                ],
            ],
            [
                'type'    => 'checkbox_list',
                'name'    => esc_html__('AC', 'deltorocorp'),
                'id'      => $prefix . 'ac',
                'options' => [
                    '1' => esc_html__('Air conditioner', 'deltorocorp'),
                ],
            ],
            [
                'type'    => 'checkbox_list',
                'name'    => esc_html__('GPS', 'deltorocorp'),
                'id'      => $prefix . 'gps',
                'options' => [
                    '1' => esc_html__('Geolocalization System', 'deltorocorp'),
                ],
            ],
            [
                'type'    => 'checkbox_list',
                'name'    => esc_html__('Auto pilot', 'deltorocorp'),
                'id'      => $prefix . 'auto_pilot',
                'options' => [
                    '1' => esc_html__('Automatic driver assistance', 'deltorocorp'),
                ],
            ],
            [
                'type' => 'number',
                'name' => esc_html__('sits', 'deltorocorpr'),
                'id'   => $prefix . 'sits',
                'desc' => esc_html__('number of sits', 'deltorocorp'),
                'min'  => 2,
                'max'  => 8,
            ],
            [
                'type' => 'text',
                'name' => esc_html__('Car type', 'deltorocorp'),
                'id'   => $prefix . 'car_type',
                'desc' => esc_html__('Main vehicle type: Sport, campagne etc ', 'deltorocorp'),
                'min'  => 2,
                'max'  => 8,
            ],
            [
                'type'    => 'number',
                'name'    => esc_html__('doors', 'deltorocorp'),
                'id'      => $prefix . 'doors',
                'min'  => 2,
                'max'  => 6,
            ],
            [
                'type'    => 'text',
                'name'    => esc_html__('Car color', 'deltorocorp'),
                'id'      => $prefix . 'car_color',
                'options' => [
                    'Secure Antilock Braking System' => esc_html__('Secure Antilock Braking System', 'deltorocorp'),
                ],
            ],
            [
                'type'        => 'select',
                'name'        => esc_html__('Transmission', 'deltorocorp'),
                'id'          => $prefix . 'transmission',
                'options'     => [
                    'manual'         => esc_html__('manual', 'deltorocorp'),
                    'assisted' => esc_html__('assisted', 'deltorocorp'),
                    'automatic'      => esc_html__('automatic', 'deltorocorp'),
                ]
            ],
            [
                'type'    => 'text',
                'name'    => esc_html__('Engine', 'deltorocorp'),
                'id'      => $prefix . 'Engine',
                'options' => [
                    'Car Engine ' => esc_html__('Car Engine ', 'deltorocorp'),
                ],
            ],
            // [
            //     'type'    => 'text',
            //     'name'    => esc_html__('Power', 'deltorocorp'),
            //     'id'      => $prefix . 'power',
            //     'options' => [
            //         'Car Engine power' => esc_html__('Car Engine power', 'deltorocorp'),
            //     ],
            // ],
            [
                'type'    => 'text',
                'name'    => esc_html__('Fuel', 'deltorocorp'),
                'id'      => $prefix . 'fuel',
                'options' => [
                    'fuel' => esc_html__('Fuel type', 'deltorocorp'),
                ],
            ],
            // [
            //     'type' => 'textarea',
            //     'name' => esc_html__( 'more details', 'deltorocorp' ),
            //     'id'   => $prefix . 'more_details',
            // ],
            [
                'type' => 'file',
                'name' => esc_html__('Files', 'deltorocorp'),
                'id'   => $prefix . 'nth_file',
            ],
        ],
    ];

    return $meta_boxes;
}

//  metabox apparts

add_filter('rwmb_meta_boxes', 'your_prefix_register_meta_boxes');

function your_prefix_register_meta_boxes($meta_boxes)
{
    $prefix = '';

    $meta_boxes[] = [
        'title'    => esc_html__('apparts', 'deltorocorp'),
        'id'       => 'apparts',
        'context'  => 'normal',
        'autosave' => true,
        'fields'   => [
            [
                'type' => 'checkbox',
                'name' => esc_html__('wifi', 'deltorocorp'),
                'id'   => $prefix . 'wifi',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('heater', 'deltorocorp'),
                'id'   => $prefix . 'heater',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('on-site Parking', 'deltorocorp'),
                'id'   => $prefix . 'on-site_parking',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('Dedicated workspacce', 'deltorocorp'),
                'id'   => $prefix . 'dedicated_workspacce',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('balcony', 'deltorocorp'),
                'id'   => $prefix . 'balcony',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('security alarm', 'deltorocorp'),
                'id'   => $prefix . 'security_alarm',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('smoke  detector', 'deltorocorp'),
                'id'   => $prefix . 'smoke_detector',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('fire extinguisher', 'deltorocorp'),
                'id'   => $prefix . 'fire_extinguisher',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('Keys delivered by the host', 'deltorocorp'),
                'id'   => $prefix . 'keys_delivered_by_the_host',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('TV', 'deltorocorp'),
                'id'   => $prefix . 'tv',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('Microwave oven', 'deltorocorp'),
                'id'   => $prefix . 'microwave_oven',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('fridge', 'deltorocorp'),
                'id'   => $prefix . 'fridge',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('Constant water suply', 'deltorocorp'),
                'id'   => $prefix . 'constant_water_suply',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('Cooker', 'deltorocorp'),
                'id'   => $prefix . 'cooker',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('Basic kitchen equipment', 'deltorocorp'),
                'id'   => $prefix . 'basic_kitchen_equipment',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('coffee pot', 'deltorocorp'),
                'id'   => $prefix . 'coffee_pot',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('Barbecue', 'deltorocorp'),
                'id'   => $prefix . 'barbecue',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('Outdoor rest areas', 'deltorocorp'),
                'id'   => $prefix . 'outdoor_rest_areas',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('bed', 'deltorocorp'),
                'id'   => $prefix . 'bed',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('baby bed', 'deltorocorp'),
                'id'   => $prefix . 'baby_bed',
            ],
            [
                'type'    => 'number',
                'name'    => esc_html__('mainroom', 'deltorocorp'),
                'id'      => $prefix . 'mainroom',
                'min'  => 0,
            ],
            [
                'type'    => 'number',
                'name'    => esc_html__('bedroom', 'deltorocorp'),
                'id'      => $prefix . 'bedroom',
                'min'  => 0,
            ],
            [
                'type'    => 'number',
                'name'    => esc_html__('beds', 'deltorocorp'),
                'id'      => $prefix . 'beds',
                'min'  => 0,
            ],
            [
                'type'    => 'number',
                'name'    => esc_html__('baby beds', 'deltorocorp'),
                'id'      => $prefix . 'baby_beds',
                'min'  => 0,
            ],
            [
                'type'    => 'number',
                'name'    => esc_html__('bathroom', 'deltorocorp'),
                'id'      => $prefix . 'bathroom',
                'min'  => 0,
            ],
            [
                'type'    => 'number',
                'name'    => esc_html__('Kitchen', 'deltorocorp'),
                'id'      => $prefix . 'Kitchen',
                'min'  => 0,
            ],
            [
                'type'    => 'number',
                'name'    => esc_html__('parkings', 'deltorocorp'),
                'id'      => $prefix . 'parkings',
                'min'  => 0,
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('Swimming pool', 'deltorocorp'),
                'id'   => $prefix . 'swimming_pool',
            ],
            [
                'type' => 'checkbox',
                'name' => esc_html__('pets accepted', 'deltorocorp'),
                'id'   => $prefix . 'pets_accepted',
            ],
            [
                'type' => 'file',
                'name' => esc_html__('Files', 'deltorocorp'),
                'id'   => $prefix . 'aptm_nth_file',
            ],
        ],
    ];

    return $meta_boxes;
}

?>

