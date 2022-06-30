<?php
function qk_calc_rendimento()
{
    $content = '
        <div class="qk-calc-rendimento">

            <p>
                <button href="#" class="qk-calc-rendimento-btn-toggle active elementor-button elementor-size-sm" data-id="ramada" id="ramada">' . __('Malha Ramada', 'qk') . '</button>
                <button href="#" class="qk-calc-rendimento-btn-toggle elementor-button elementor-size-sm" data-id="tubular" id="tubular">' . __('Malha Ramada', 'qk') . '</button>
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
                </p>
            </div>

        </div>
    ';
    return $content;
}
add_shortcode('qk-calc-rendimento', 'qk_calc_rendimento');
