<?php

/**
 * qk_settings_metabox
 *
 * @return void
 */
function qk_settings_metabox()
{

    $cmb_options = new_cmb2_box(array(
        'id'           => 'qk_settings_page',
        'title'        => esc_html__('Quatro K', 'qk'),
        'object_types' => array('options-page'),
        'option_key'      => 'qk_settings', // The option key and admin menu page slug.
        'icon_url'        => 'dashicons-youtube', // Menu icon. Only applicable if 'parent_slug' is left empty.
        'capability'        => 'edit_others_pages'
    ));

    $cmb_options->add_field(array(
        'name'    => esc_html__('Configurações do Youtube', 'qk'),
        'id'      => 'title_1',
        'type'    => 'title',
    ));

    $cmb_options->add_field(array(
        'name'    => esc_html__('API Key do Youtube', 'qk'),
        'id'      => 'youtube_api_key',
        'type'    => 'text',
    ));

    $cmb_options->add_field(array(
        'name'    => esc_html__('ID do canal do Youtube', 'qk'),
        'id'      => 'channel_id',
        'type'    => 'text',
    ));

    $cmb_options->add_field(array(
        'name'    => esc_html__('Shorcodes', 'qk'),
        'id'      => 'title_2',
        'type'    => 'title',
        'after_field'  => 'qk_shortcodes_after_field',
    ));
}

add_action('cmb2_admin_init', 'qk_settings_metabox');

/**
 * qk_get_option
 *
 * @param  mixed $key
 * @param  mixed $default
 * @return void
 */
function qk_get_option($key = '', $default = false)
{
    if (function_exists('cmb2_get_option')) {
        return cmb2_get_option('qk_settings', $key, $default);
    }

    $opts = get_option('qk_settings', $default);

    $val = $default;

    if ('all' == $key) {
        $val = $opts;
    } elseif (is_array($opts) && array_key_exists($key, $opts) && false !== $opts[$key]) {
        $val = $opts[$key];
    }

    return $val;
}

function qk_shortcodes_after_field()
{
?>
    <p>Shortcodes para usar nas páginas do site. Clique nos códigos para copiá-los.</p>
    <ul class="qk-shortcodes">
        <li>Exibir o último vídeo publicado: <code title="Clique para copiar">[qk-last-youtube-video]</code></li>
    </ul>
    <style>
        .qk-shortcodes code {
            cursor: pointer;
        }
    </style>
    <script>
        const qkShortcodes = document.querySelectorAll('.qk-shortcodes')
        for (qkShortcode of qkShortcodes) {
            const codes = qkShortcode.querySelectorAll('code')
            for (code of codes) {
                code.addEventListener('click', (e) => {
                    if (navigator.clipboard && window.isSecureContext) {
                        navigator.clipboard.writeText(e.target.innerText)
                        alert(`Shortcode "${e.target.innerText}" copiado!`)
                    }
                })
            }
        }
    </script>
<?php
}
