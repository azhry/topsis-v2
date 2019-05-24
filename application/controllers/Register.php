<?php 

class Register extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'register';
	}

	public function index()
	{
		if ($this->POST('submit'))
		{
			$password 	= $this->POST('password');
			$rpassword 	= $this->POST('rpassword');
			if ($password !== $rpassword)
			{
				$this->flashmsg('Kolom Password harus sama dengan kolom Re-type Password', 'danger');
				redirect('register');
			}

			$this->data['pengguna'] = [
				'username'		=> $this->POST('username'),
				'password'		=> md5($password),
				'id_role'		=> 1,
				'nama'			=> $this->POST('nama'),
				'email'			=> $this->POST('email'),
				'alamat'		=> $this->POST('alamat'),
				'kontak'		=> $this->POST('kontak'),
				'jenis_kelamin'	=> $this->POST('jenis_kelamin')
			];

			$this->load->model('pengguna_m');
			$this->pengguna_m->insert($this->data['pengguna']);
			$this->flashmsg('Pendaftaran berhasil. Silahkan login menggunakan akun yang telah didaftarkan');
			redirect('login');
		}

		$this->data['title'] 	= 'Registration Form';
		$this->data['content']	= 'register';
		$this->load->view($this->module . '/' . $this->data['content'], $this->data);
	}
}