<?php
/**
 * Plugin Name:     Sports and Data Suite
 * Plugin URI:      https://github.com/lajennylove
 * Description:     Sports and data middleware and widgets suite for Sports and Data
 * Version:         0.0.1
 * Author:          Pacific Dev
 * Author URI:      https://pacificdev.com
 * License:         MIT License
 * Requires at least: 6.5
 * Requires PHP:    8.1
 *
 */
require_once __DIR__ . "/vendor/autoload.php";

// Defining plugin constants.
define("SD_SUITE_PLUGIN_NS", "PluginNamespace");
define("SD_SUITE_PLUGIN_DIR", plugin_dir_path(__FILE__));
define("SD_SUITE_PLUGIN_URL", plugin_dir_url(__FILE__));
define("SD_SUITE_PLUGIN_BASE", plugin_basename(__FILE__));

$clover = new PluginNamespace\Providers\PluginNameServiceProvider();
$clover->register();

add_action("init", [$clover, "boot"]);
