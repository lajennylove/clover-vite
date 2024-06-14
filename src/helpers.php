<?php
namespace PluginNamespace;

/**
 * Get hot module replacement status.
 *
 * @return bool
 */
function hmr_enabled(): bool
{
    return file_exists(SD_SUITE_PLUGIN_DIR . "public/manifest.dev.json");
}

/**
 * Get hmr assets for development.
 *
 * @param string $asset
 * @return string
 */
function hmr_dev_assets(string $asset): string
{
    $manifest = json_decode(
        file_get_contents(SD_SUITE_PLUGIN_DIR . "public/manifest.dev.json"),
        true
    );

    $asset = $manifest["inputs"][$asset];
    $hmr = $manifest["url"];

    return "{$hmr}{$asset}";
}

/**
 * Get the plugin assets for production.
 *
 * @param string $asset
 * @return string
 */
function hmr_assets(string $asset): string
{
    $manifest = json_decode(
        file_get_contents(SD_SUITE_PLUGIN_DIR . "public/manifest.json"),
        true
    );

    return SD_SUITE_PLUGIN_URL . "public/" . $manifest[$asset];
}
