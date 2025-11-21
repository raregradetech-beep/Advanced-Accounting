<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting_model extends App_Model
{
    public function get_accounts()
    {
        return $this->db->order_by('code')->get(db_prefix() . 'acc_accounts')->result_array();
    }

    public function profit_loss_report()
    {
        // Simple P&L: income – expenses
        $income = $this->db->select_sum('amount')
            ->join(db_prefix() . 'acc_journal_lines jl', 'jl.account_id = a.id')
            ->where('a.account_type_id', 4) // income
            ->get(db_prefix() . 'acc_accounts a')->row()->amount ?? 0;

        $expenses = $this->db->select_sum('amount')
            ->join(db_prefix() . 'acc_journal_lines jl', 'jl.account_id = a.id')
            ->where('a.account_type_id', 5) // expenses
            ->get(db_prefix() . 'acc_accounts a')->row()->amount ?? 0;

        return [
            'income'   => $income,
            'expenses' => $expenses,
            'profit'   => $income - $expenses,
        ];
    }
}
