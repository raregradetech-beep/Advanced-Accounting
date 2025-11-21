<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$CI = &get_instance();

// Run migrations
require_once __DIR__ . '/migrations/001_create_accounting_tables.php';
require_once __DIR__ . '/migrations/002_seed_default_accounts.php';

// Register permissions
$permissions = [
    [
        'name'         => _l('aa_permission_view'),
        'shortname'    => 'aa_view',
        'description'  => 'Can view Advanced Accounting',
    ],
    [
        'name'         => _l('aa_permission_manage'),
        'shortname'    => 'aa_manage',
        'description'  => 'Can manage Advanced Accounting',
    ],
];

foreach ($permissions as $permission) {
    $CI->db->insert(db_prefix() . 'permissions', $permission);
}
