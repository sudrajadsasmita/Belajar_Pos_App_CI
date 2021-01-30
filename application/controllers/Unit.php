<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Unit
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Unit extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Unit_model', 'unit');
  }

  public function index()
  {
    $data['row'] = $this->unit->get();
    $this->template->load('template', 'product/unit/unit_data', $data);
  }

  public function delete($id)
  {
    $this->unit->delete($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'data berhasil di hapus');
    }
    echo "<script>
            window.location = '" . site_url('unit') . "';
          </script>";
  }

  public function add()
  {
    $unit = new stdClass();
    $unit->id_unit = null;
    $unit->name = null;
    $data = [
      'page' => 'add',
      'row' => $unit,
      'title' => 'Add'
    ];
    $this->template->load('template', 'product/unit/unit_form', $data);
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);

    if (isset($_POST['add'])) {
      $this->unit->add($post);
    } elseif (isset($_POST['edit'])) {
      $this->unit->update($post);
    }

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'data berhasil di simpan');
    }
    redirect('unit');
  }

  public function edit($id)
  {
    $query = $this->unit->get($id);
    if ($query->num_rows() > 0) {
      $unit = $query->row();
      $data = [
        'page' => 'edit',
        'row' => $unit,
        'title' => 'Update'
      ];
      $this->template->load('template', 'product/unit/unit_form', $data);
    } else {
      echo "<script>
              alert('Data tidak di temukan');
              window.location = '" . site_url('unit') . "'
            </script>";
    }
  }
}


/* End of file Unit.php */
/* Location: ./application/controllers/Unit.php */