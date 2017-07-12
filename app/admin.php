<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/**
 * Add Custom Post Type for Souba
 */
/*
class CustomPostStock
{
    public function __contruct()
    {
        add_action('init', array(__CLASS__, 'RegisterPostType'));
    }

    private function RegisterPostType()
    {
        $labels = array(
            'name'               => _x('相場', 'post type general name'),
            'singular_name'      => _x('相場', 'post type singular name'),
            'menu_name'          => _x('相場', 'admin menu'),
            'name_admin_bar'     => _x('相場を追加', 'add new on admin bar'),
            'add_new'            => _x('新規追加', 'book'),
            'add_new_item'       => __('新規追加'),
            'new_item'           => __('相場を追加'),
            'edit_item'          => __('相場を編集'),
            'view_item'          => __('相場を表示'),
            'all_items'          => __('全相場を表示'),
            'search_items'       => __('相場を検索'),
            'not_found'          => __('見つかりませんでした。'),
            'not_found_in_trash' => __('ゴミ箱にはありません。')
        );
    
        $args = array(
            'labels'             => $labels,
            'description'        => __('説明.'),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'stock'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'show_in_rest'       => true,
            'rest_base'          => 'stocks',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'supports'           => array('title', 'author')
        );
        register_post_type('stock', $args);
    }
}
 */
add_action('init', function () {
    $labels = array(
        'name'               => _x('相場', 'post type general name'),
        'singular_name'      => _x('相場', 'post type singular name'),
        'menu_name'          => _x('相場', 'admin menu'),
        'name_admin_bar'     => _x('相場を追加', 'add new on admin bar'),
        'add_new'            => _x('新規追加', 'book'),
        'add_new_item'       => __('新規追加'),
        'new_item'           => __('相場を追加'),
        'edit_item'          => __('相場を編集'),
        'view_item'          => __('相場を表示'),
        'all_items'          => __('全相場を表示'),
        'search_items'       => __('相場を検索'),
        'not_found'          => __('見つかりませんでした。'),
        'not_found_in_trash' => __('ゴミ箱にはありません。')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('説明.'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'stock'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'rest_base'          => 'stocks',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'supports'           => array('title', 'author')
    );
    register_post_type('stock', $args);
});

/*
 *
 */
function get_post_meta_cb(
    $object,
    $field_name,
    $request
) {
    return get_post_meta($object[ 'id' ], $field_name, true);
}

function update_post_meta_cb(
    $value,
    $object,
    $field_name
) {
    return update_post_meta($object[ 'id' ], $field_name, $value);
}

function register_field(
    $field_name
) {
    register_rest_field('stock', $field_name, array(
        'get_callback' => 'App\get_post_meta_cb',
        'update_callback' => 'App\update_post_meta_cb',
        'schema' => null,
    ));
}

add_action('rest_api_init', function () {
    register_field('date');
    register_field('gd_price');
    register_field('gd_diff');
    register_field('pt_price');
    register_field('pt_diff');
    register_field('sv_price');
    register_field('sv_diff');
});

/*
 * Add custom fields
 */
function create_form_input(
    $post,
    $field
) {
    $value = get_post_meta($post->ID, $field, true);
    echo "<input name='$field' style='width: 100%;' value='$value' />";
}

add_action('admin_menu', function () {
    add_meta_box(
        'date',
        '日付',
        function ($post) {
            create_form_input($post, 'date');
        },
        'stock',
        'normal'
    );
    add_meta_box(
        'gd_price',
        '金価格',
        function ($post) {
            create_form_input($post, 'gd_price');
        },
        'stock',
        'normal'
    );
    add_meta_box(
        'gd_diff',
        '金前日比',
        function ($post) {
            create_form_input($post, 'gd_diff');
        },
        'stock',
        'normal'
    );
    add_meta_box(
        'pt_price',
        'Pt価格',
        function ($post) {
            create_form_input($post, 'pt_price');
        },
        'stock',
        'normal'
    );
    add_meta_box(
        'pt_diff',
        'Pt前日比',
        function ($post) {
            create_form_input($post, 'pt_diff');
        },
        'stock',
        'normal'
    );
    add_meta_box(
        'sv_price',
        'Sv価格',
        function ($post) {
            create_form_input($post, 'sv_price');
        },
        'stock',
        'normal'
    ) ;
    add_meta_box(
        'sv_diff',
        'Sv前日比',
        function ($post) {
            create_form_input($post, 'sv_diff');
        },
        'stock',
        'normal'
    );
});

add_action('save_post', function ($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
  
    $my_fields = [
        'date',
        'gd_price',
        'gd_diff',
        'pt_price',
        'pt_diff',
        'sv_price',
        'sv-diff'
    ];
  
    foreach ($my_fields as $my_field) {
        if (isset($_POST[$my_field])) {
            $value = sanitize_text_field($_POST[$my_field]);
        } else {
            $value = '';
        }
        
        if (strcmp($value, get_post_meta($post_id, $my_field, true)) != 0) {
            update_post_meta($post_id, $my_field, $value);
        } elseif ($value == '') {
            delete_post_meta($post_id, $my_field, get_post_meta($post_id, $my_field, true));
        }
    }
});
