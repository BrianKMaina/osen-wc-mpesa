<?php

/**
 * @package MPesa For WooCommerce
 * @subpackage WooCommerce Mpesa Gateway
 * @author Osen Concepts < hi@osen.co.ke >
 * @since 0.18.01
 */

namespace Osen\Woocommerce;

class Initialize
{
    function __construct()
    {
        register_activation_hook('osen-wc-mpesa/osen-wc-mpesa.php', array($this, 'wc_mpesa_activation_check'));
        add_filter('plugin_row_meta', array($this, 'mpesa_row_meta'), 10, 2);
        add_action('init', array($this, 'wc_mpesa_flush_rewrite_rules_maybe'), 20);
        add_action('activated_plugin', array($this, 'wc_mpesa_detect_plugin_activation'), 10, 2);
        add_action('deactivated_plugin', array($this, 'wc_mpesa_detect_woocommerce_deactivation'), 10, 2);
        add_filter('plugin_action_links_' . 'osen-wc-mpesa/osen-wc-mpesa.php', array($this, 'mpesa_action_links'));
    }

    function wc_mpesa_activation_check()
    {
        if (!get_option('wc_mpesa_flush_rewrite_rules_flag')) {
            add_option('wc_mpesa_flush_rewrite_rules_flag', true);
        }

        if (!is_plugin_active('woocommerce/woocommerce.php')) {
            deactivate_plugins('osen-wc-mpesa/osen-wc-mpesa.php');

            add_action('admin_notices', function () {
                $class   = 'notice notice-error is-dismissible';
                $message = __('Please Install/Activate WooCommerce for this extension to work..', 'woocommerce');

                printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
            });
        }
    }

    function wc_mpesa_flush_rewrite_rules_maybe()
    {
        if (get_option('wc_mpesa_flush_rewrite_rules_flag')) {
            flush_rewrite_rules();
            delete_option('wc_mpesa_flush_rewrite_rules_flag');
        }
    }

    function wc_mpesa_detect_plugin_activation($plugin, $network_activation)
    {
        flush_rewrite_rules();
        if ($plugin == 'osen-wc-mpesa/osen-wc-mpesa.php') {
            exit(wp_redirect(admin_url('admin.php?page=wc-settings&tab=checkout&section=mpesa')));
        }
    }

    function wc_mpesa_detect_woocommerce_deactivation($plugin, $network_activation)
    {
        if ($plugin == 'woocommerce/woocommerce.php') {
            deactivate_plugins('osen-wc-mpesa/osen-wc-mpesa.php');
        }
    }

    function mpesa_action_links($links)
    {
        return array_merge(
            $links,
            array(
                '<a href="' . admin_url('admin.php?page=wc-settings&tab=checkout&section=mpesa') . '">&nbsp;STK & C2B Setup</a>',
                // '<a href="'.admin_url('edit.php?post_type=mpesaipn&page=wc_mpesa_b2c_preferences').'">&nbsp;B2C</a>'
            )
        );
    }

    function mpesa_row_meta($links, $file)
    {
        $plugin = 'osen-wc-mpesa/osen-wc-mpesa.php';

        if ($plugin == $file) {
            $row_meta = array(
                'github'  => '<a href="' . esc_url('https://github.com/osenco/osen-wc-mpesa/') . '" target="_blank" aria-label="' . esc_attr__('Contribute on Github', 'woocommerce') . '">' . esc_html__('Github', 'woocommerce') . '</a>',
                'apidocs' => '<a href="' . esc_url('https://developer.safaricom.co.ke/docs/') . '" target="_blank" aria-label="' . esc_attr__('MPesa API Docs (Daraja)', 'woocommerce') . '">' . esc_html__('API docs', 'woocommerce') . '</a>',
            );

            return array_merge($links, $row_meta);
        }

        return (array) $links;
    }
}
