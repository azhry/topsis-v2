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
				'id_role'		=> 3,
				'nama'			=> $this->POST('nama'),
				'email'			=> $this->POST('email'),
				'alamat'		=> $this->POST('alamat'),
				'kontak'		=> $this->POST('kontak'),
				'jenis_kelamin'	=> $this->POST('jenis_kelamin')
			];

			$this->load->model('pengguna_m');
			$this->pengguna_m->insert($this->data['pengguna']);

			$this->load->library('CI_PHPMailer/ci_phpmailer');
			try 
			{
				// assume you are using gmail
				$this->ci_phpmailer->setServer('smtp.gmail.com');
				$this->ci_phpmailer->setAuth('azhryarliansyah@gmail.com', '4kuGanteng');
				$this->ci_phpmailer->setAlias('sistem@pendidikan.edu', 'Sistem'); // you can use whatever alias you want
				$this->ci_phpmailer->sendMessage($this->post('email'), 'Konfirmasi Email', 'Anda dapat melakukan konfirmasi akun dengan klik link berikut: <a href="' . base_url('register/confirm-email?id=' . $this->db->insert_id()) . '">' . base_url('register/confirm-email?id=' . $this->db->insert_id()) . '</a>');    
			} 
			catch (Exception $e)
			{
				$this->ci_phpmailer->displayError();
			}

			$this->flashmsg('Pendaftaran berhasil. Silahkan login menggunakan akun yang telah didaftarkan');
			redirect('login');
		}

		$this->data['title'] 	= 'Registration Form';
		$this->data['content']	= 'register';
		$this->load->view($this->module . '/' . $this->data['content'], $this->data);
	}

	public function confirm_email()
	{
		$this->data['id'] = $this->input->get('id');
		if (!isset($this->data['id']))
		{
			$this->flashmsg('Required parameter is missing', 'danger');
			redirect('register');
			exit;
		}

		$this->load->model('pengguna_m');
		$pengguna = $this->pengguna_m->get_row(['id' => $this->data['id']]);
		if (!isset($pengguna))
		{
			$this->flashmsg('Data not found', 'danger');
			redirect('register');
			exit;
		}	

		$this->pengguna_m->update($this->data['id'], ['status' => 1]);
		$this->flashmsg('Konfirmasi email berhasil');
		redirect('pihak-sekolah');
	}
}