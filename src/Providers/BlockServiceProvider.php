<?php

namespace PluginNamespace\Providers;

class BlockServiceProvider implements Provider
{
    public function register()
    {
        $entrypoints_manifest = realpath(
            __DIR__ . "/../../public/entrypoints.json"
        );

        if (!$entrypoints_manifest) {
            return;
        }

        // Define the plugin namespace once
        $namespace = SD_SUITE_PLUGIN_NS;

        // Function to enqueue scripts based on HMR status
        $enqueue_scripts = function () use ($namespace) {
            // Check if hot module replacement is enabled
            if (\PluginNamespace\hmr_enabled()) {
                // Enqueue module script for front-end
                wp_enqueue_script_module(
                    $namespace,
                    \PluginNamespace\hmr_dev_assets("app"),
                    [],
                    null,
                    true
                );
            } else {
                // Enqueue regular script for front-end
                wp_enqueue_script(
                    $namespace,
                    \PluginNamespace\hmr_assets("app.js"),
                    [],
                    null,
                    true
                );

                // Enqueue styles for front-end
                wp_enqueue_style(
                    $namespace,
                    \PluginNamespace\hmr_assets("app.css"),
                    [],
                    null,
                    "all"
                );
            }
        };

        // Register front-end scripts
        add_action("wp_enqueue_scripts", $enqueue_scripts, 100);

        // Register block editor scripts
        add_action(
            "enqueue_block_editor_assets",
            function () use ($namespace) {
                if (\PluginNamespace\hmr_enabled()) {
                    // Enqueue script for block editor
                    wp_enqueue_script(
                        $namespace,
                        \PluginNamespace\hmr_dev_assets("editor"),
                        [],
                        null,
                        true
                    );
                }
            },
            100
        );
    }
}
