<?php 

class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['id_role']	= $this->session->userdata('id_role');
		if (isset($this->data['id_role']))
		{
			switch ($this->data['id_role'])
			{
				case 1:
					redirect('admin');
					break;
			}
		}

		$this->module = 'login';
	}

	public function index()
	{
		if ($this->POST('login'))
		{
			$this->load->model('pengguna_m');
			$pengguna = $this->pengguna_m->get_row(['username' => $this->POST('username'), 'password' => md5($this->POST('password'))]);

			if (isset($pengguna))
			{
				$this->session->set_userdata([
					'id'			=> $pengguna->id,
					'id_role'		=> $pengguna->id_role,
					'username'		=> $pengguna->username,
					'pengguna'		=> $pengguna
				]);
			}
			else
			{
				$this->flashmsg('Username atau password salah', 'danger');
			}

			redirect('login');
		}

		$this->data['title']	= 'Login';
		$this->data['content']	= 'login';
		$this->load->view('login/' . $this->data['content']);
	}

}
