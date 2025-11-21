<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$CI = &get_instance();

// Insert account types
$types = [
    ['id'=>1,'name'=>'Assets'],
    ['id'=>2,'name'=>'Liabilities'],
    ['id'=>3,'name'=>'Equity'],
    ['id'=>4,'name'=>'Income'],
    ['id'=>5,'name'=>'Expenses'],
];
$CI->db->insert_batch(db_prefix() . 'acc_account_types', $types);

// Insert basic SA chart
$accounts = [
    ['account_type_id'=>1,'code'=>'1000','name'=>'Bank'],
    ['account_type_id'=>1,'code'=>'1200','name'=>'Accounts Receivable'],
    ['account_type_id'=>2,'code'=>'2000','name'=>'Accounts Payable'],
    ['account_type_id'=>4,'code'=>'4000','name'=>'Sales'],
    ['account_type_id'=>5,'code'=>'5000','name'=>'Cost of Sales'],
    ['account_type_id'=>5,'code'=>'6000','name'=>'Operating Expenses'],
];
$CI->db->insert_batch(db_prefix() . 'acc_accounts', $accounts);
