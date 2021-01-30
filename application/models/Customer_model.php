<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Customer_model
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

class Customer_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function get($id = null)
  {
    $this->db->from('tb_customer');
    if ($id != null) {
      $this->db->where('id_customer', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function delete($id)
  {
    $this->db->where('id_customer', $id);
    $this->db->delete('tb_customer');
  }

  public function add($post)
  {
    $params = [
      'name' => htmlspecialchars($post['customer_name']),
      'gender' => htmlspecialchars($post['gender']),
      'phone' => htmlspecialchars($post['phone']),
      'address' => htmlspecialchars($post['address']),

    ];
    $this->db->insert('tb_customer', $params);
  }

  public function update($post)
  {
    $params = [
      'name' => htmlspecialchars($post['customer_name']),
      'gender' => htmlspecialchars($post['gender']),
      'phone' => htmlspecialchars($post['phone']),
      'address' => htmlspecialchars($post['address']),
      'updated' => date('Y-m-d H:i:s')
    ];
    $this->db->where('id_customer', $post['id_customer']);
    $this->db->update('tb_customer', $params);
  }

  // ------------------------------------------------------------------------

}

/* End of file Customer_model.php */
/* Location: ./application/models/Customer_model.php */