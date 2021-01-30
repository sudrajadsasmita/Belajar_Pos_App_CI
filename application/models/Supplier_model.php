<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Supplier_model
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

class Supplier_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function get($id = null)
  {
    $this->db->from('tb_supplier');
    if ($id != null) {
      $this->db->where('id_supplier', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function delete($id)
  {
    $this->db->where('id_supplier', $id);
    $this->db->delete('tb_supplier');
  }

  public function add($post)
  {
    $params = [
      'name' => htmlspecialchars($post['supplier_name']),
      'phone' => htmlspecialchars($post['phone']),
      'address' => htmlspecialchars($post['address']),
      'description' => empty($post['description']) ? null : htmlspecialchars($post['description']),
    ];
    $this->db->insert('tb_supplier', $params);
  }

  public function update($post)
  {
    $params = [
      'name' => htmlspecialchars($post['supplier_name']),
      'phone' => htmlspecialchars($post['phone']),
      'address' => htmlspecialchars($post['address']),
      'description' => empty($post['description']) ? null : htmlspecialchars($post['description']),
      'updated' => date('Y-m-d H:i:s')
    ];
    $this->db->where('id_supplier', $post['id_supplier']);
    $this->db->update('tb_supplier', $params);
  }

  // ------------------------------------------------------------------------

}

/* End of file Supplier_model.php */
/* Location: ./application/models/Supplier_model.php */