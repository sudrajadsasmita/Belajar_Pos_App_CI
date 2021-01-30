<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Unit_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @unit	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Unit_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function get($id = null)
  {
    $this->db->from('tb_product_unit');
    if ($id != null) {
      $this->db->where('id_unit', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function delete($id)
  {
    $this->db->where('id_unit', $id);
    $this->db->delete('tb_product_unit');
  }

  public function add($post)
  {
    $params = [
      'name' => htmlspecialchars($post['unit_name']),
    ];
    $this->db->insert('tb_product_unit', $params);
  }

  public function update($post)
  {
    $params = [
      'name' => htmlspecialchars($post['unit_name']),
      'updated' => date('Y-m-d H:i:s')
    ];
    $this->db->where('id_unit', $post['id_unit']);
    $this->db->update('tb_product_unit', $params);
  }
  // ------------------------------------------------------------------------

}

/* End of file Unit_model.php */
/* Location: ./application/models/Unit_model.php */