<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$CI = &get_instance();

// Drop tables
$tables = [
    'acc_journal_lines',
    'acc_journals',
    'acc_accounts',
    'acc_account_types',
];

foreach ($tables as $table) {
    $CI->db->query("DROP TABLE IF EXISTS `" . db_prefix() . $table . "`");
}

// Remove permissions
$CI->db->where('shortname', 'aa_view')->or_where('shortname', 'aa_manage');
$CI->db->delete(db_prefix() . 'permissions');
