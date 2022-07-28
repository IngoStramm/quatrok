<?php

/**
 * qk_calc_rendimento
 *
 * @return string
 */
function qk_calc_rendimento($atts)
{
    $a = shortcode_atts(array(
        'url' => '',
        'text' => __('Fale conosco', 'qk')
    ), $atts);
    $content = '
        <div class="qk-calc-rendimento">

            <p>
                <button href="#" class="qk-calc-rendimento-btn-toggle active" data-id="ramada" id="ramada">' . __('Malha Ramada', 'qk') . '</button>
                <button href="#" class="qk-calc-rendimento-btn-toggle" data-id="tubular" id="tubular">' . __('Malha Ramada', 'qk') . '</button>
            </p>

            <input type="hidden" name="qk-calc-type" id="qk-calc-type" value="ramada">

            <label for="largura">' . __('Largura (m)', 'qk') . '</label>
            <input type="number" class="qk-calc-rendimento-input" name="largura" id="largura" data-id="largura" placeholder="' . __('Digite a largura em metros', 'qk') . '">

            <label for="gramatura">' . __('Gramatura (g/m²)', 'qk') . '</label>
            <input type="number" class="qk-calc-rendimento-input" name="gramatura" id="gramatura" data-id="gramatura" placeholder="' . __('Digite a gramatura', 'qk') . '">

            <div class="qk-calc-rendimento-resultado" id="qk-calc-rendimento-resultado" style="display: none;">
                <h4 class="text">' . __('Resultado', 'qk') . '</h4>
                <p>
                    <strong><span id="res-calc">0</span></strong>
                    <span>' . __('Metros por kg', 'qk') . '</span>
                </p>';
    $content .= $a['url'] ? '<a class="qk-calc-rendimento-btn btn button" href="' . $a['url'] . '">' . $a['text'] . '</a>' : '';
    $content .= '</div>
        </div>
    ';
    return $content;
}
add_shortcode('qk-calc-rendimento', 'qk_calc_rendimento');

/**
 * qk_last_youtube_video
 *
 * @return string
 */
function qk_last_youtube_video()
{
    $channel_id = qk_get_option('channel_id');

    if (!$channel_id)
        return __('ID do canal não definido.', 'qk');

    $api_key = qk_get_option('youtube_api_key');

    if (!$api_key)
        return __('API KEY do youtube não definida.', 'qk');

    $url = 'https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=' . $channel_id . '&maxResults=1&key=' . $api_key;
    $json = json_decode(file_get_contents($url));
    $video_id = $json->items[0]->id->videoId;
    $video_embed = 'https://www.youtube.com/embed/' . $video_id;
    $video_embed_iframe_responsive = '<div class="video-container"><iframe src="' . $video_embed . '?controls=0" allowfullscreen></iframe></div>';

    return $video_embed_iframe_responsive;
}

add_shortcode('qk-last-youtube-video', 'qk_last_youtube_video');

function qk_random_phone()
{
    $telefones = qk_get_option('telefones');

    if (!$telefones)
        return __('Nenhum número de telefone cadastrado', 'qk');
        
    if (!is_array($telefones))
        return $telefones;

    $random_index = rand(0, count($telefones));
    return $telefones[$random_index];
}

add_shortcode('qk-telefone', 'qk_random_phone');
