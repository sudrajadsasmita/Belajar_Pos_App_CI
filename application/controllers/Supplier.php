<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Supplier
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

class Supplier extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Supplier_model', 'supplier');
  }

  public function index()
  {
    $data['row'] = $this->supplier->get();
    $this->template->load('template', 'supplier/supplier_data', $data);
  }

  public function delete($id)
  {
    $this->supplier->delete($id);
    if ($this->db->affected_rows() > 0) {
      echo "<script>
              alert('data berhasil di hapus');
            </script>";
    }
    echo "<script>
            window.location = '" . site_url('supplier') . "';
          </script>";
  }

  public function add()
  {
    $supplier = new stdClass();
    $supplier->id_supplier = null;
    $supplier->name = null;
    $supplier->phone = null;
    $supplier->address = null;
    $supplier->description = null;
    $data = [
      'page' => 'add',
      'row' => $supplier,
      'title' => 'Add'
    ];
    $this->template->load('template', 'supplier/supplier_form', $data);
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);

    if (isset($_POST['add'])) {
      $this->supplier->add($post);
    } elseif (isset($_POST['edit'])) {
      $this->supplier->update($post);
    }

    if ($this->db->affected_rows() > 0) {
      echo "<script>
              alert('data berhasil di simpan');
            </script>";
    }
    echo "<script>
                window.location = '" . site_url('supplier') . "';
              </script>";
  }

  public function edit($id)
  {
    $query = $this->supplier->get($id);
    if ($query->num_rows() > 0) {
      $supplier = $query->row();
      $data = [
        'page' => 'edit',
        'row' => $supplier,
        'title' => 'Update'
      ];
      $this->template->load('template', 'supplier/supplier_form', $data);
    } else {
      echo "<script>
              alert('Data tidak di temukan');
              window.location = '" . site_url('supplier') . "'
            </script>";
    }
  }
}


/* End of file Supplier.php */
/* Location: ./application/controllers/Supplier.php */