<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advanced_accounting extends App_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('advanced_accounting/accounting_model');
    }

    public function index()
    {
        if (!has_permission('advanced_accounting', '', 'view')) {
            access_denied();
        }
        $data['title'] = _l('aa_dashboard');
        $this->load->view('dashboard', $data);
    }

    public function accounts()
    {
        if (!has_permission('advanced_accounting', '', 'view')) {
            access_denied();
        }
        $data['title'] = _l('aa_chart_of_accounts');
        $data['accounts'] = $this->accounting_model->get_accounts();
        $this->load->view('accounts/index', $data);
    }

    public function profit_loss()
    {
        if (!has_permission('advanced_accounting', '', 'view')) {
            access_denied();
        }
        $data['title'] = _l('aa_profit_loss');
        $data['report'] = $this->accounting_model->profit_loss_report();
        $this->load->view('reports/profit_loss', $data);
    }

    public function settings()
    {
        if (!has_permission('advanced_accounting', '', 'manage')) {
            access_denied();
        }
        $data['title'] = _l('aa_settings');
        if ($this->input->post()) {
            update_option('aa_fiscal_year_start', $this->input->post('aa_fiscal_year_start'));
            set_alert('success', _l('settings_updated'));
            redirect(admin_url('advanced_accounting/settings'));
        }
        $this->load->view('settings/index', $data);
    }
}
