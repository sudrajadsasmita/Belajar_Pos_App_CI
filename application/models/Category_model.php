<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Category_model
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

class Category_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function get($id = null)
  {
    $this->db->from('tb_product_category');
    if ($id != null) {
      $this->db->where('id_category', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function delete($id)
  {
    $this->db->where('id_category', $id);
    $this->db->delete('tb_product_category');
  }

  public function add($post)
  {
    $params = [
      'name' => htmlspecialchars($post['category_name']),
    ];
    $this->db->insert('tb_product_category', $params);
  }

  public function update($post)
  {
    $params = [
      'name' => htmlspecialchars($post['category_name']),
      'updated' => date('Y-m-d H:i:s')
    ];
    $this->db->where('id_category', $post['id_category']);
    $this->db->update('tb_product_category', $params);
  }

  // ------------------------------------------------------------------------

}

/* End of file Category_model.php */
/* Location: ./application/models/Category_model.php */