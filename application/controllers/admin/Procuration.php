<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Procuration extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('procurationstate_model');
        $this->load->model('procurationtype_model');
        // $this->load->model('procuration_model');
    }

    /* List all Procuration */
    public function index()
    {
        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data('procuration');
        }
        $data['title'] = _l('procuration');
        $this->load->view('admin/procuration/manage', $data);
    }


    /* List all Procuration state */
    public function state()
    {
        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data('my_procurationstate');
        }
        $data['title'] = _l('procuration_state');
        $this->load->view('admin/procuration/managestate', $data);
    }

    /* List all Procuration Type */
    public function type()
    {
        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data('my_procurationtype');
        }
        $data['title'] = _l('procuration_type');
        $this->load->view('admin/procuration/managetype', $data);
    }

    /* Edit Procuration or add new if passed id */
    public function procurationcu($id = '')
    {
        if (!is_admin()) {
            access_denied('Procuration');
        }
        if ($this->input->post()) {
            $data            = $this->input->post();
            // $data['message'] = $this->input->post('message', false);
            if ($id == '') {
                $id = $this->procuration_model->add($data);
                if ($id) {
                    set_alert('success', _l('added_successfully', 'Procuration'));
                    redirect(admin_url('procuration'));
                }
            } else {
                $success = $this->procurationstate_model->update($data, $id);
                if ($success) {
                    set_alert('success', _l('updated_successfully', 'Procuration'));
                }
                redirect(admin_url('procuration'));
            }
        }
        if ($id == '') {
            $title = _l('add_new', 'Procuration');
        } else {
            $data['procuration'] = $this->procuration_model->get($id);
            $title                = _l('edit', 'Procuration');
        }
        $data['title'] = $title;
        $this->load->view('admin/procuration/procuration', $data);
    }

    /* Edit Procuration state or add new if passed id */
    public function statecu($id = '')
    {
        if (!is_admin()) {
            access_denied('Procuration State');
        }
        if ($this->input->post()) {
            $data            = $this->input->post();
            // $data['message'] = $this->input->post('message', false);
            if ($id == '') {
                $id = $this->procurationstate_model->add($data);
                if ($id) {
                    set_alert('success', _l('added_successfully', 'Procuration State'));
                    redirect(admin_url('procuration/state'));
                }
            } else {
                $success = $this->procurationstate_model->update($data, $id);
                if ($success) {
                    set_alert('success', _l('updated_successfully', 'Procuration State'));
                }
                redirect(admin_url('procuration/state'));
            }
        }
        if ($id == '') {
            $title = _l('add_new', 'Procuration State');
        } else {
            $data['procurationstate'] = $this->procurationstate_model->get($id);
            $title                = _l('edit', 'Procuration State');
        }
        $data['title'] = $title;
        $this->load->view('admin/procuration/procurationstate', $data);
    }

    /* Edit Procuration type or add new if passed id */
    public function typecu($id = '')
    {
        if (!is_admin()) {
            access_denied('Procuration Type');
        }
        if ($this->input->post()) {
            $data            = $this->input->post();
            // $data['message'] = $this->input->post('message', false);
            if ($id == '') {
                $id = $this->procurationtype_model->add($data);
                if ($id) {
                    set_alert('success', _l('added_successfully', 'Procuration Type'));
                    redirect(admin_url('procuration/type'));
                }
            } else {
                $success = $this->procurationtype_model->update($data, $id);
                if ($success) {
                    set_alert('success', _l('updated_successfully', 'Procuration Type'));
                }
                redirect(admin_url('procuration/type'));
            }
        }
        if ($id == '') {
            $title = _l('add_new', 'Procuration Type');
        } else {
            $data['procurationtype'] = $this->procurationtype_model->get($id);
            $title                = _l('edit', 'Procuration Type');
        }
        $data['title'] = $title;
        $this->load->view('admin/procuration/procurationtype', $data);
    }

    /* Delete procurationstate from database */
    public function stated($id)
    {
        if (!$id) {
            redirect(admin_url('procuration/state'));
        }
        if (!is_admin()) {
            access_denied('Procuration State');
        }
        $response = $this->procurationstate_model->delete($id);
        if ($response == true) {
            set_alert('success', _l('deleted', 'Procuration State'));
        } else {
            set_alert('warning', _l('problem_deleting', 'Procuration State'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

      /* Delete procurationtype from database */
      public function typed($id)
      {
          if (!$id) {
              redirect(admin_url('procuration/type'));
          }
          if (!is_admin()) {
              access_denied('Procuration Type');
          }
          $response = $this->procurationtype_model->delete($id);
          if ($response == true) {
              set_alert('success', _l('deleted', 'Procuration Type'));
          } else {
              set_alert('warning', _l('problem_deleting', 'Procuration Type'));
          }
          redirect($_SERVER['HTTP_REFERER']);
      }

}