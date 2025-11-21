<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Advanced Accounting – Perfex CRM Module
 * Author: Rare Grade Tech
 * Author URL: https://raregradetech.com
 * Company: Rare Grade Tech (Pty) Ltd
 * Support: support@raregradetech.com
 */

modules\advanced_accounting\core\Apiinit::parse_module_url('advanced_accounting');

hooks()->add_action('admin_init', 'advanced_accounting_module_init_menu');
hooks()->add_action('after_add_invoice_payment', 'advanced_accounting_hook_invoice_payment');

/**
 * Register menu & sub-menu
 */
function advanced_accounting_module_init_menu()
{
    $CI = &get_instance();
    $CI->app_menu->add_sidebar_menu_item('advanced_accounting', [
        'name'     => _l('aa_menu'),
        'href'     => admin_url('advanced_accounting'),
        'position' => 35,
        'icon'     => 'fa fa-calculator',
    ]);

    $CI->app_menu->add_sidebar_children_item('advanced_accounting', [
        'slug'     => 'aa_dashboard',
        'name'     => _l('aa_dashboard'),
        'href'     => admin_url('advanced_accounting'),
        'position' => 1,
    ]);

    $CI->app_menu->add_sidebar_children_item('advanced_accounting', [
        'slug'     => 'aa_accounts',
        'name'     => _l('aa_chart_of_accounts'),
        'href'     => admin_url('advanced_accounting/accounts'),
        'position' => 2,
    ]);

    $CI->app_menu->add_sidebar_children_item('advanced_accounting', [
        'slug'     => 'aa_reports',
        'name'     => _l('aa_reports'),
        'href'     => '#',
        'position' => 3,
    ]);

    $CI->app_menu->add_sidebar_children_item('advanced_accounting', [
        'slug'     => 'aa_profit_loss',
        'name'     => _l('aa_profit_loss'),
        'href'     => admin_url('advanced_accounting/profit_loss'),
        'position' => 4,
        'parent_slug' => 'aa_reports',
    ]);

    $CI->app_menu->add_sidebar_children_item('advanced_accounting', [
        'slug'     => 'aa_settings',
        'name'     => _l('aa_settings'),
        'href'     => admin_url('advanced_accounting/settings'),
        'position' => 5,
    ]);
}

/**
 * Auto-post invoice payment to journals
 */
function advanced_accounting_hook_invoice_payment($payment)
{
    $CI = &get_instance();
    $CI->load->library('advanced_accounting/doubleEntry', null, 'doubleentry');
    $CI->doubleentry->post_journal($payment);
}

register_activation_hook('advanced_accounting', 'advanced_accounting_module_activate');
register_deactivation_hook('advanced_accounting', 'advanced_accounting_module_deactivate');
register_uninstall_hook('advanced_accounting', 'advanced_accounting_module_uninstall');

/**
 * Activate
 */
function advanced_accounting_module_activate()
{
    require_once __DIR__ . '/install.php';
}

/**
 * Deactivate
 */
function advanced_accounting_module_deactivate()
{
    require_once __DIR__ . '/deactivate.php';
}

/**
 * Uninstall
 */
function advanced_accounting_module_uninstall()
{
    require_once __DIR__ . '/uninstall.php';
}
