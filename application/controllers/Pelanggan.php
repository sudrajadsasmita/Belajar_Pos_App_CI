<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Customer
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

class Pelanggan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Customer_model', 'customer');
  }

  public function index()
  {
    $data['row'] = $this->customer->get();
    $this->template->load('template', 'customer/customer_data', $data);
  }

  public function delete($id)
  {
    $this->customer->delete($id);
    if ($this->db->affected_rows() > 0) {
      echo "<script>
              alert('data berhasil di hapus');
            </script>";
    }
    echo "<script>
            window.location = '" . site_url('customer') . "';
          </script>";
  }

  public function add()
  {
    $customer = new stdClass();
    $customer->id_customer = null;
    $customer->name = null;
    $customer->gender = null;
    $customer->phone = null;
    $customer->address = null;
    $data = [
      'page' => 'add',
      'row' => $customer,
      'title' => 'Add'
    ];
    $this->template->load('template', 'customer/customer_form', $data);
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);

    if (isset($_POST['add'])) {
      $this->customer->add($post);
    } elseif (isset($_POST['edit'])) {
      $this->customer->update($post);
    }

    if ($this->db->affected_rows() > 0) {
      echo "<script>
              alert('data berhasil di simpan');
            </script>";
    }
    echo "<script>
                window.location = '" . site_url('customer') . "';
              </script>";
  }

  public function edit($id)
  {
    $query = $this->customer->get($id);
    if ($query->num_rows() > 0) {
      $customer = $query->row();
      $data = [
        'page' => 'edit',
        'row' => $customer,
        'title' => 'Update'
      ];
      $this->template->load('template', 'customer/customer_form', $data);
    } else {
      echo "<script>
              alert('Data tidak di temukan');
              window.location = '" . site_url('customer') . "'
            </script>";
    }
  }
}


/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */