<?php 

class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'user';

		$this->data['id_pengguna'] 	= $this->session->userdata('id');
		$this->data['username'] 	= $this->session->userdata('username');
	    $this->data['id_role']		= $this->session->userdata('id_role');
		if (!isset($this->data['id_pengguna'], $this->data['username'], $this->data['id_role']))
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
			redirect('login');
		}

		if ($this->data['id_role'] != 2)
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login sebagai user', 'danger');
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->model('sekolah_m');
		$this->data['sekolah']	= $this->sekolah_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function profil()
	{
		$this->load->model('pengguna_m');
		if ($this->POST('submit'))
		{
			$this->data['pengguna'] = [
				'username'		=> $this->POST('username'),
				'nama'			=> $this->POST('nama'),
				'jenis_kelamin'	=> $this->POST('jenis_kelamin'),
				'email'			=> $this->POST('email'),
				'alamat'		=> $this->POST('alamat'),
				'kontak'		=> $this->POST('kontak')
			];

			$password = $this->POST('password');
			$rpassword = $this->POST('rpassword');
			if (!empty($password) or !empty($rpassword))
			{
				if ($password !== $rpassword)
				{
					$this->flashmsg('Kolom Password harus sama dengan kolom Re-type Password', 'danger');
					redirect('user/profil');
				}

				$this->data['pengguna']['password'] = md5($password);
			}

			if (isset($this->data['pengguna']['username']) && !empty($this->data['pengguna']['username']))
			{
				$this->session->set_userdata('username', $this->data['pengguna']['username']);
			}

			$this->pengguna_m->update($this->data['id_pengguna'], $this->data['pengguna']);
			$this->flashmsg('Profil anda berhasil diubah');
			redirect('user/profil');
		}

		$this->data['pengguna']	= $this->pengguna_m->get_row(['id' => $this->data['id_pengguna']]);
		$this->data['title']	= 'Profil';
		$this->data['content']	= 'profil';
		$this->template($this->data, $this->module);
	}
}