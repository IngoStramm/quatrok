<?php

/**
 * Plugin Name: Quatro K
 * Plugin URI: https://agencialaf.com
 * Description: Plugin para o site do Quatro K.
 * Version: 0.0.15
 * Author: Ingo Stramm
 * Text Domain: qk
 * License: GPLv2
 */

defined('ABSPATH') or die('No script kiddies please!');

define('QK_DIR', plugin_dir_path(__FILE__));
define('QK_URL', plugin_dir_url(__FILE__));

function qk_debug($debug)
{
    echo '<pre>';
    var_dump($debug);
    echo '</pre>';
}

require_once 'tgm/tgm.php';
// require_once 'classes/classes.php';
require_once 'scripts.php';
require_once 'qk-settings.php';
require_once 'qk-shortcode.php';

require 'plugin-update-checker-4.10/plugin-update-checker.php';
$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://raw.githubusercontent.com/IngoStramm/quatrok/master/info.json',
    __FILE__,
    'qk'
);
