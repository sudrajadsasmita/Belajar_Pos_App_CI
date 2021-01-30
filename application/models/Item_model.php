<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Item_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Item_model extends CI_Model
{

  // ------------------------------------------------------------------------

  var $column_order = [null, 'barcode', 'tb_product_item.name', 'category_name', 'unit_name', 'price', 'stock'];
  var $column_search = ['barcode', 'tb_product_item.name', 'price'];

  var $order = ['id_item' => 'asc'];

  public function _get_datatables_query()
  {
    $this->db->select("tb_product_item.*, tb_product_category.name as category_name, tb_product_unit.name as unit_name");
    $this->db->from("tb_product_item");
    $this->db->join("tb_product_category", "tb_product_category.id_category = tb_product_item.category_id");
    $this->db->join("tb_product_unit", "tb_product_unit.id_unit = tb_product_item.unit_id");

    $i = 0;

    foreach ($this->column_search as $item) {
      if (@$_POST['search']['value']) {
        if ($i == 0) {
          $this->db->group_start();

          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }
        if (count($this->column_search) - 1 == $i) {
          $this->db->group_end();
        }
      }
      $i++;
    }
    if (isset($_POST['order'])) {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } elseif (isset($this->order)) {
      $order =  $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  public function get_datatables()
  {
    $this->_get_datatables_query();

    if (@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  public function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from('tb_product_item');
    return $this->db->count_all_results();
  }

  public function get($id = null)
  {
    $this->db->select("tb_product_item.*, tb_product_category.name as category_name, tb_product_unit.name as unit_name");
    $this->db->from("tb_product_item");
    $this->db->join("tb_product_category", "tb_product_category.id_category = tb_product_item.category_id");
    $this->db->join("tb_product_unit", "tb_product_unit.id_unit = tb_product_item.unit_id");
    if ($id != null) {
      $this->db->where('id_item', $id);
    }
    $this->db->order_by('barcode', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function delete($id)
  {
    $this->db->where('id_item', $id);
    $this->db->delete('tb_product_item');
  }

  public function add($post)
  {
    $params = [
      'barcode' => htmlspecialchars($post['barcode']),
      'name' => htmlspecialchars($post['item_name']),
      'category_id' => htmlspecialchars($post['category']),
      'unit_id' => htmlspecialchars($post['unit']),
      'price' => htmlspecialchars($post['price']),
      'image' => htmlspecialchars($post['image']),
    ];
    $this->db->insert('tb_product_item', $params);
  }

  public function update($post)
  {
    $params = [
      'barcode' => htmlspecialchars($post['barcode']),
      'name' => htmlspecialchars($post['item_name']),
      'category_id' => htmlspecialchars($post['category']),
      'unit_id' => htmlspecialchars($post['unit']),
      'price' => htmlspecialchars($post['price']),
      'updated' => date('Y-m-d H:i:s')
    ];
    if ($post['image'] != null) {
      $params['image'] = htmlspecialchars($post['image']);
    }
    $this->db->where('id_item', $post['id_item']);
    $this->db->update('tb_product_item', $params);
  }

  public function check_barcode($code, $id = null)
  {
    $this->db->from('tb_product_item');
    $this->db->where('barcode', $code);
    if ($id != null) {
      $this->db->where('id_item !=', $id);
    }
    $query = $this->db->get();

    return $query;
  }

  // ------------------------------------------------------------------------

}

/* End of file Item_model.php */
/* Location: ./application/models/Item_model.php */