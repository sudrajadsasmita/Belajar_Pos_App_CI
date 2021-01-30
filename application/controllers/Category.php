<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Category
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

class Category extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Category_model', 'category');
  }

  public function index()
  {
    $data['row'] = $this->category->get();
    $this->template->load('template', 'product/category/category_data', $data);
  }

  public function delete($id)
  {
    $this->category->delete($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'data berhasil di hapus');
    }
    echo "<script>
            window.location = '" . site_url('category') . "';
          </script>";
  }

  public function add()
  {
    $category = new stdClass();
    $category->id_category = null;
    $category->name = null;
    $data = [
      'page' => 'add',
      'row' => $category,
      'title' => 'Add'
    ];
    $this->template->load('template', 'product/category/category_form', $data);
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);

    if (isset($_POST['add'])) {
      $this->category->add($post);
    } elseif (isset($_POST['edit'])) {
      $this->category->update($post);
    }

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'data berhasil di simpan');
    }
    redirect('category');
  }

  public function edit($id)
  {
    $query = $this->category->get($id);
    if ($query->num_rows() > 0) {
      $category = $query->row();
      $data = [
        'page' => 'edit',
        'row' => $category,
        'title' => 'Update'
      ];
      $this->template->load('template', 'product/category/category_form', $data);
    } else {
      echo "<script>
              alert('Data tidak di temukan');
              window.location = '" . site_url('category') . "'
            </script>";
    }
  }
}


/* End of file Category.php */
/* Location: ./application/controllers/Category.php */