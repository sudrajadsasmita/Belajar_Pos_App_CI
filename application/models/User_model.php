<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model User_model
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

class User_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function login($post)
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('username', $post['username']);
    $this->db->where('password', sha1($post['password']));
    $query = $this->db->get();
    return $query;
  }

  public function get($id = null)
  {
    $this->db->from('tb_user');
    if ($id != null) {
      $this->db->where('id_user', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params['username'] = htmlspecialchars($post['username']);
    $params['name'] = htmlspecialchars($post['fullname']);
    $params['password'] = sha1($post['password1']);
    $params['address'] = htmlspecialchars($post['address'] != "" ? $post['address'] : null);
    $params['level'] = htmlspecialchars($post['level']);

    $this->db->insert('tb_user', $params);
  }

  public function delete($id)
  {
    $this->db->where('id_user', $id);
    $this->db->delete('tb_user');
  }

  public function edit($post)
  {
    $params['username'] = htmlspecialchars($post['username']);
    $params['name'] = htmlspecialchars($post['fullname']);
    if (!empty($post['password1'])) {
      $params['password'] = sha1($post['password1']);
    }
    $params['address'] = htmlspecialchars($post['address'] != "" ? $post['address'] : null);
    $params['level'] = htmlspecialchars($post['level']);

    $this->db->where('id_user', $post['id_user']);
    $this->db->update('tb_user', $params);
  }
  // ------------------------------------------------------------------------

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */