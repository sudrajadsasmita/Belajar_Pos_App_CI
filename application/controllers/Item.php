<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Item
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



class Item extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Item_model', 'item');
    $this->load->model('Category_model', 'category');
    $this->load->model('Unit_model', 'unit');
  }

  public function index()
  {
    $data['row'] = $this->item->get();
    $this->template->load('template', 'product/item/item_data', $data);
  }

  public function delete($id)
  {
    $item = $this->item->get($id)->row();
    if ($item->image != null) {
      $target_file = './uploads/product/' . $item->image;
      unlink($target_file);
    }
    $this->item->delete($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'data berhasil di hapus');
    }
    echo "<script>
            window.location = '" . site_url('item') . "';
          </script>";
  }

  public function add()
  {
    $item = new stdClass();
    $item->id_item = null;
    $item->barcode = null;
    $item->name = null;
    $item->price = null;
    $item->category_id = null;

    $query_category = $this->category->get();
    $query_unit = $this->unit->get();

    $unit[null] = '- pilih -';
    foreach ($query_unit->result() as $key) {
      $unit[$key->id_unit] = $key->name;
    }
    $data = [
      'page' => 'add',
      'row' => $item,
      'title' => 'Add',
      'category' => $query_category,
      'unit' => $unit,
      'selected_unit' => null
    ];
    $this->template->load('template', 'product/item/item_form', $data);
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);

    if (isset($_POST['add'])) {

      if ($this->item->check_barcode($post['barcode'])->num_rows() > 0) {
        $this->session->set_flashdata('error', "Data barcode $post[barcode] sudah di pakai barang lain");
        redirect('item/add');
      } else {
        $config['upload_path']    = './uploads/product/';
        $config['allowed_types']  = 'gif|png|jpg|jpeg';
        $config['max_size']       = 2048;
        $config['file_name']       = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (@$_FILES['image']['name'] != null) {
          if ($this->upload->do_upload('image')) {
            $post['image'] = $this->upload->data('file_name');
            $this->item->add($post);
            if ($this->db->affected_rows() > 0) {
              $this->session->set_flashdata('success', 'data berhasil di simpan');
            }
            redirect('item');
          } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('item/add');
          }
        } else {
          $post['image'] = null;
          $this->item->add($post);
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil di simpan');
          }
          redirect('item');
        }
      }
    } elseif (isset($_POST['edit'])) {
      if ($this->item->check_barcode($post['barcode'], $post['id_item'])->num_rows() > 0) {
        $this->session->set_flashdata('error', "Data barcode $post[barcode] sudah di pakai barang lain");
        redirect("item/edit/$post[id_item]");
      } else {
        $config['upload_path']    = './uploads/product/';
        $config['allowed_types']  = 'gif|png|jpg|jpeg';
        $config['max_size']       = 2048;
        $config['file_name']       = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (@$_FILES['image']['name'] != null) {
          if ($this->upload->do_upload('image')) {

            $item = $this->item->get($post['id_item'])->row();
            if ($item->image != null) {
              $target_file = './uploads/product/' . $item->image;
              unlink($target_file);
            }

            $post['image'] = $this->upload->data('file_name');
            $this->item->update($post);
            if ($this->db->affected_rows() > 0) {
              $this->session->set_flashdata('success', 'data berhasil di simpan');
            }
            redirect('item');
          } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('item/add');
          }
        } else {
          $post['image'] = null;
          $this->item->update($post);
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil di simpan');
          }
          redirect('item');
        }
      }
    }
  }

  public function edit($id)
  {
    $query = $this->item->get($id);
    if ($query->num_rows() > 0) {
      $item = $query->row();

      $query_category = $this->category->get();
      $query_unit = $this->unit->get();

      $unit[null] = '- pilih -';
      foreach ($query_unit->result() as $key) {
        $unit[$key->id_unit] = $key->name;
      }
      $data = [
        'page' => 'edit',
        'row' => $item,
        'title' => 'Update',
        'category' => $query_category,
        'unit' => $unit,
        'selected_unit' => $item->unit_id
      ];
      $this->template->load('template', 'product/item/item_form', $data);
    } else {
      echo "<script>
              alert('Data tidak di temukan');
              window.location = '" . site_url('item') . "'
            </script>";
    }
  }
  public function barcode_qrcode($id)
  {
    $data['row'] = $this->item->get($id)->row();
    $this->template->load('template', 'product/item/barcode_qrcode', $data);
  }

  public function get_ajax()
  {
    $list = $this->item->get_datatables();
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $item) {
      $no++;
      $row = [];
      $row[] = $no . ".";
      $row[] = $item->barcode . '<br><a href="' . site_url('item/barcode_qrcode/' . $item->id_item) . '" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
      $row[] = $item->name;
      $row[] = $item->category_name;
      $row[] = $item->unit_name;
      $row[] = $item->price;
      $row[] = $item->stock;
      $row[] = '<img src="' . site_url("uploads/product/") . $item->image . '" alt="" width="200px">';
      $row[] = $item->created;
      $row[] = $item->updated;
      $row[] = '
          <a href="' . site_url('item/edit/' . $item->id_item) . '" class="btn btn-warning btn-xs">
              <i class="fa fa-pencil"></i> Edit
          </a>
          <a href="' . site_url('item/delete/' . $item->id_item) . '" onclick="return confirm(`apakah anda yakin ingin menghapus <?=' . $item->name . '; ?>`)" class="btn btn-danger btn-xs">
              <i class="fa fa-trash"></i> Delete
          </a>                                 
      ';
      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->item->count_all(),
      'recordsFiltered' => $this->item->count_filtered(),
      'data' => $data
    ];

    echo json_encode($output);
  }
}


/* End of file Item.php */
/* Location: ./application/controllers/Item.php */