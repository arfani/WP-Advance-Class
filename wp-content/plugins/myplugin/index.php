<?php

/*
Plugin Name: My Portofolio
Plugin URI: https://arfani.github.io
Description: Just learning to build an awesome plugin
Author: Arfan
Version: 0.1
Author URI: https://arfani.github.io
*/


add_action('init', 'belajar_register_post_type');
function belajar_register_post_type()
{
    $args = array(
        'label'              => 'My Portofolio',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'portofolio'],
        'supports'           => ['title', 'editor', 'thumbnail']
    );
    register_post_type('myportofolio', $args);
}

function belajar_jalan_saat_metabox_dijalankan($post)
{
    $my_portofolio_posisi = get_post_meta($post->ID, 'my_portofolio_posisi', true);
    $my_portofolio_url = get_post_meta($post->ID, 'my_portofolio_url', true);
    $my_portofolio_tanggal_mulai = get_post_meta($post->ID, 'my_portofolio_tanggal_mulai', true);
    $my_portofolio_tanggal_akhir = get_post_meta($post->ID, 'my_portofolio_tanggal_akhir', true);

?>
    <div class="inline-edit-row">
        <div class="input-text-wrap" id="my_portofolio_url-wrap">
            <label for="my_portofolio_posisi" class="mb-1">Sebagai (Posisi)</label>
            <input class="mt-1 mb-1" type="text" value="<?= $my_portofolio_posisi; ?>" name="my_portofolio_posisi" id="my_portofolio_posisi" autocomplete="off" placeholder="Posisi">
        </div>
        <div class="input-text-wrap" id="my_portofolio_url-wrap">
            <label for="my_portofolio_url" class="mb-1">URL Demo</label>
            <input class="mt-1 mb-1" type="text" value="<?= $my_portofolio_url; ?>" name="my_portofolio_url" id="my_portofolio_url" autocomplete="off" placeholder="Url Demo">
        </div>
        <div class="input-text-wrap" id="my_portofolio_url-wrap">
            <label for="my_portofolio_tanggal_mulai" class="mb-1">Tanggal Mulai</label>
            <input class="mt-1 mb-1" type="date" value="<?= $my_portofolio_tanggal_mulai; ?>" name="my_portofolio_tanggal_mulai" id="my_portofolio_tanggal_mulai" autocomplete="off" placeholder="Tanggal Mulai">
        </div>
        <div class="input-text-wrap" id="my_portofolio_url-wrap">
            <label for="my_portofolio_tanggal_akhir" class="mb-1">Tanggal Berakhir</label>
            <input class="mt-1 mb-1" type="date" value="<?= $my_portofolio_tanggal_akhir; ?>" name="my_portofolio_tanggal_akhir" id="my_portofolio_tanggal_akhir" autocomplete="off" placeholder="Tanggal Berakhir">
        </div>
    </div>
<?php
}

add_action('add_meta_boxes', 'belajar_add_meta_box');
function belajar_add_meta_box()
{
    add_meta_box(
        'belajar_add_meta_box',
        'Informasi lainya',
        'belajar_jalan_saat_metabox_dijalankan',
        'myportofolio'
    );
}

add_action('save_post', 'belajar_save_metabox');
function belajar_save_metabox($postId)
{
    $fields = ['my_portofolio_posisi', 'my_portofolio_url', 'my_portofolio_tanggal_mulai', 'my_portofolio_tanggal_akhir'];
    foreach ($fields as $field) {
        if (array_key_exists($field, $_POST)) {
            update_post_meta(
                $postId,
                $field,
                $_POST[$field]
            );
        }
    }
}

add_action('init', 'belajar_tambah_taxonomy');
function belajar_tambah_taxonomy()
{
    $labels = array(
        'name'              => _x('Teknologi', 'taxonomy general name'),
        'singular_name'     => _x('Teknologi', 'taxonomy singular name'),
        'search_items'      => __('Search Teknologi'),
        'all_items'         => __('All Teknologi'),
        'parent_item'       => __('Parent Teknologi'),
        'parent_item_colon' => __('Parent Teknologi:'),
        'edit_item'         => __('Edit Teknologi'),
        'update_item'       => __('Update Teknologi'),
        'add_new_item'      => __('Add New Teknologi'),
        'new_item_name'     => __('New Teknologi Name'),
        'menu_name'         => __('Teknologi'),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'teknologi'],
    );
    register_taxonomy('Teknologi', ['myportofolio'], $args);
}

add_shortcode('my_portfolio', 'belajar_shortcode');
function belajar_shortcode()
{
    $args = [
        'post_type' => 'myportofolio',
        'per_page' => '20'
    ];
    $portofolio_list = new WP_Query($args);
    $html = '<div>';
    while ($portofolio_list->have_posts()) {
        $portofolio_list->the_post();
        $post_type = get_post_type(get_the_ID());
        $taxonomies = get_object_taxonomies($post_type);
        $taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names"));

        $teknologis = '';

        foreach ($taxonomy_names as $teknologi) {
            $teknologis .= '<button class="tag">' . $teknologi . '</button>';
        }

        $posisi = get_post_meta(get_the_ID(), 'my_portofolio_posisi', true);
        $url = get_post_meta(get_the_ID(), 'my_portofolio_url', true);
        $tanggal_awal = get_post_meta(get_the_ID(), 'my_portofolio_tanggal_akhir', true);
        $tanggal_akhir = get_post_meta(get_the_ID(), 'my_portofolio_tanggal_mulai', true);

        $html .= '<div class="card mb-2" >
        <img src=' . get_the_post_thumbnail_url($portofolio_list->ID) . ' alt="Avatar" style="width:100%">
        <div class="container">
          <p><b>' . get_the_title() . '</b> / <small>' . $posisi . '</small></p>
          <p><a href=' . $url . '>' . $url . '</a></p>
          <p>' . $teknologis . '</p>
          <p>' . $tanggal_awal . ' s/d ' . $tanggal_akhir . '</p>
          <p>' . $portofolio_list->post->post_content . '</p>
        </div>
      </div>';
    }
    $html .= '</div>';
    return $html;
}
