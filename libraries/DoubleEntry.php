<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DoubleEntry
{
    public function post_journal($payment)
    {
        $CI = &get_instance();
        $CI->load->model('advanced_accounting/accounting_model');

        // Very simple example: DR Bank, CR Debtors Control
        $bank_account     = 1; // assume id=1 is Bank
        $debtors_account  = 2; // assume id=2 is Accounts Receivable

        $journal = [
            'date'       => $payment['date'],
            'reference'  => 'INV-PAY-' . $payment['invoiceid'],
            'description'=> 'Invoice payment',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $CI->db->insert(db_prefix() . 'acc_journals', $journal);
        $journal_id = $CI->db->insert_id();

        // DR Bank
        $CI->db->insert(db_prefix() . 'acc_journal_lines', [
            'journal_id' => $journal_id,
            'account_id' => $bank_account,
            'debit'      => $payment['amount'],
            'credit'     => 0,
        ]);

        // CR Debtors
        $CI->db->insert(db_prefix() . 'acc_journal_lines', [
            'journal_id' => $journal_id,
            'account_id' => $debtors_account,
            'debit'      => 0,
            'credit'     => $payment['amount'],
        ]);
    }
}
