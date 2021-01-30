<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller User
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

class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
  }

  public function index()
  {
    check_not_login();

    check_admin();

    $data['row'] = $this->user->get();

    $this->template->load('template', 'user/user_data', $data);
  }

  public function add()
  {
    $this->form_validation->set_rules('fullname', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[tb_user.username]', [
      'min_length' => '%s minimal 5 karakter',
      'is_unique' => '%s sudah dipakai, silahkan ganti'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|min_length[8]', [
      'min_length' => '%s minimal 8 karakter'
    ]);
    $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password1]', [
      'matches' => '%s tidak sesuai dengan Password'
    ]);
    $this->form_validation->set_rules('level', 'Level', 'required');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template', 'user/user_form_add');
    } else {
      $post = $this->input->post(null, TRUE);

      $this->user->add($post);

      if ($this->db->affected_rows() > 0) {
        echo "<script>
                alert('Data berhasil di simpan');
              </script>";
      }
      echo "<script>
              window.location='" . site_url('user') . "';
            </script>";
    }
  }

  public function delete()
  {
    $id = $this->input->post('id');
    $this->user->delete($id);

    if ($this->db->affected_rows() > 0) {
      echo "<script>
              alert('Data berhasil di hapus');
            </script>";
    }
    echo "<script>
            window.location = '" . site_url('user') . "'
          </script>";
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('fullname', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_usernameCheck', [
      'min_length' => '%s minimal 5 karakter',
      'is_unique' => '%s sudah dipakai, silahkan ganti'
    ]);

    if ($this->input->post('password1')) {
      $this->form_validation->set_rules('password1', 'Password', 'min_length[8]', [
        'min_length' => '%s minimal 8 karakter'
      ]);
    }

    if ($this->input->post('password2')) {
      $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password1]', [
        'matches' => '%s tidak sesuai dengan Password'
      ]);
    }
    $this->form_validation->set_rules('level', 'Level', 'required');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $query = $this->user->get($id);
      if ($query->num_rows() > 0) {
        $data['row'] = $query->row();
        $this->template->load('template', 'user/user_form_edit', $data);
      } else {
        echo "<script>
                alert('Data tidak di temukan');
                window.location = '" . site_url('user') . "'
              </script>";
      }
    } else {
      $post = $this->input->post(null, TRUE);

      $this->user->edit($post);

      if ($this->db->affected_rows() > 0) {
        echo "<script>
                alert('Data berhasil di simpan');
              </script>";
      }
      echo "<script>
              window.location='" . site_url('user') . "';
            </script>";
    }
  }
  public function usernameCheck()
  {
    $post = $this->input->post(null, TRUE);
    $query = $this->db->query("SELECT * FROM tb_user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('usernameCheck', '%s field ini sudah di pakai');
      return FALSE;
    } else {
      return TRUE;
    }
  }
}


/* End of file User.php */
/* Location: ./application/controllers/User.php */