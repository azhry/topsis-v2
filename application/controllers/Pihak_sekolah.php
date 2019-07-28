<?php 

class Pihak_sekolah extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'pihak_sekolah';

		$this->data['id_pengguna'] 	= $this->session->userdata('id');
		$this->data['username'] 	= $this->session->userdata('username');
	    $this->data['id_role']		= $this->session->userdata('id_role');
		if (!isset($this->data['id_pengguna'], $this->data['username'], $this->data['id_role']))
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
			redirect('login');
		}

		if ($this->data['id_role'] != 3)
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login sebagai pihak sekolah', 'danger');
			redirect('login');
		}

		$this->load->model('pengguna_m');
		$this->data['pengguna'] = $this->pengguna_m->get_row(['id' => $this->data['id_pengguna']]);
	}

	public function index()
	{
		$this->load->model('sekolah_m');
		$this->data['sekolah']			= $this->sekolah_m->get_row(['id_user' => $this->data['id_pengguna']]);

		if (isset($this->data['sekolah']))
		{
			$this->data['upload_dir'] 			= FCPATH . 'assets/foto/sekolah-' . $this->data['sekolah']->id;
			if (!file_exists($this->data['upload_dir']))
			{
				$files = [];
			}
			else
			{
				$files = scandir($this->data['upload_dir']);
			}
			$this->data['files']				= array_values(array_diff($files, ['.', '..']));
			$this->data['upload_path'] 			= base_url('assets/foto/sekolah-' . $this->data['sekolah']->id);
			$this->data['fasilitas']			= json_decode($this->data['sekolah']->fasilitas);
			$this->data['ekstrakurikuler']		= json_decode($this->data['sekolah']->ekstrakurikuler);
			$this->data['lokasi']				= json_decode($this->data['sekolah']->lokasi);	
		}
		
		$this->data['title']				= 'Detail Informasi Sekolah';
		$this->data['content']				= 'detail_sekolah';
		$this->template($this->data, $this->module);
	}

	public function edit_sekolah()
	{
		$this->load->model('sekolah_m');
		$this->data['sekolah']			= $this->sekolah_m->get_row(['id_user' => $this->data['id_pengguna']]);

		if (isset($this->data['sekolah']))
		{
			$this->data['upload_dir'] 			= FCPATH . 'assets/foto/sekolah-' . $this->data['sekolah']->id;
			if (!file_exists($this->data['upload_dir']))
			{
				$files = [];
			}
			else
			{
				$files = scandir($this->data['upload_dir']);
			}
			$this->data['files']				= array_values(array_diff($files, ['.', '..']));
			$this->data['upload_path'] 			= base_url('assets/foto/sekolah-' . $this->data['sekolah']->id);
		}
		else
		{
			$this->data['files'] = [];
		}
		

		if ($this->POST('submit'))
		{
			$this->load->model('sekolah_m');
			$assets_url = FCPATH . 'assets/';
			$uploaded_files = $this->POST('new_uploaded_files');

			$data = [
				'nama_sekolah'		=> $this->POST('nama_sekolah'),
				'akreditasi'		=> $this->POST('akreditasi'),
				'telepon'			=> json_encode($this->POST('telepon')),
				'fasilitas'			=> json_encode($this->POST('fasilitas')),
				'ekstrakurikuler'	=> json_encode($this->POST('ekstrakurikuler')),
				'alamat'			=> $this->POST('alamat'),
				'biaya_masuk'		=> $this->POST('biaya_masuk'),
				'spp_bulanan'		=> $this->POST('spp_bulanan'),
				'lokasi'			=> json_encode($this->POST('lokasi')),
				'latitude'			=> $this->POST('latitude'),
				'longitude'			=> $this->POST('longitude'),
				'id_user'			=> $this->data['id_pengguna'],
				'halaman_parkir'	=> $this->POST('halaman_parkir')
			];

			if (isset($this->data['sekolah']))
			{
				$this->sekolah_m->update($this->data['sekolah']->id, $data);
				$this->data['id'] = $this->data['sekolah']->id;	
			}
			else
			{
				$this->sekolah_m->insert($data);
				$this->data['id'] = $this->db->insert_id();
			}
			

			$uploaded_dir = $assets_url . 'foto/sekolah-' . $this->data['id'];
			$deleted_photos = $this->POST('deleted_photo');
			if (isset($deleted_photos))
			{
				foreach ($deleted_photos as $photo)
				{
					@unlink($uploaded_dir . '/' . $photo);
				}
			}

			if (!file_exists($uploaded_dir))
			{
				mkdir($uploaded_dir);	
			}

			if (isset($uploaded_files))
			{
				foreach ($uploaded_files as $file)
				{
					rename($assets_url . 'temp_files/' . $file, $uploaded_dir . '/' . $file);
				}

				$this->remove_directory($assets_url . 'temp_files/thumbnail');
				$this->remove_directory($assets_url . 'temp_files');
			}

			$this->flashmsg('Data sekolah berhasil disimpan');
			redirect('pihak-sekolah');
		}

		if (isset($this->data['sekolah']))
		{
			$this->data['fasilitas']			= json_decode($this->data['sekolah']->fasilitas);
			$this->data['ekstrakurikuler']		= json_decode($this->data['sekolah']->ekstrakurikuler);
			$this->data['lokasi']				= json_decode($this->data['sekolah']->lokasi);	
		}
		else
		{
			$this->data['fasilitas'] 		= [];
			$this->data['ekstrakurikuler'] 	= [];
			$this->data['lokasi'] 			= [];
		}
		
		$this->load->model('kriteria_m');
		$this->data['fasilitas_k'] 		= $this->kriteria_m->get_row(['id' => 4]);
		$this->data['ekstrakurikuler_k'] 	= $this->kriteria_m->get_row(['id' => 5]);

		$this->data['title']	= 'Form Edit Sekolah';
		$this->data['content']	= 'form_edit_sekolah';
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
					redirect('pihak-sekolah/profil');
				}

				$this->data['pengguna']['password'] = md5($password);
			}

			if (isset($this->data['pengguna']['username']) && !empty($this->data['pengguna']['username']))
			{
				$this->session->set_userdata('username', $this->data['pengguna']['username']);
			}

			$this->pengguna_m->update($this->data['id_pengguna'], $this->data['pengguna']);
			$this->flashmsg('Profil anda berhasil diubah');
			redirect('pihak-sekolah/profil');
		}

		$this->data['pengguna']	= $this->pengguna_m->get_row(['id' => $this->data['id_pengguna']]);
		$this->data['title']	= 'Profil';
		$this->data['content']	= 'profil';
		$this->template($this->data, $this->module);
	}

	public function upload_handler()
	{
		require_once(FCPATH . '/assets/jQuery-File-Upload-9.23.0/server/php/index.php');
	}

	public function send_confirm_email()
	{
		$this->data['id'] = $this->input->get('id');
		if (!isset($this->data['id']))
		{
			$this->flashmsg('Required parameter is missing', 'danger');
			redirect('pihak-sekolah');
			exit;
		}

		$this->load->model('pengguna_m');
		$pengguna = $this->pengguna_m->get_row(['id' => $this->data['id']]);
		if (!isset($pengguna))
		{
			$this->flashmsg('Data not found', 'danger');
			redirect('pihak-sekolah');
			exit;
		}	

		$this->load->library('CI_PHPMailer/ci_phpmailer');
		try 
		{
			// assume you are using gmail
			$this->ci_phpmailer->setServer('smtp.gmail.com');
			$this->ci_phpmailer->setAuth('azhryarliansyah@gmail.com', '4kuGanteng');
			$this->ci_phpmailer->setAlias('sistem@pendidikan.edu', 'Sistem'); // you can use whatever alias you want
			$this->ci_phpmailer->sendMessage($this->data['pengguna']->email, 'Konfirmasi Email', 'Anda dapat melakukan konfirmasi akun dengan klik link berikut: <a href="' . base_url('register/confirm-email?id=' . $this->data['id']) . '">' . base_url('register/confirm-email?id=' . $this->data['id']) . '</a>');    
		} 
		catch (Exception $e)
		{
			$this->ci_phpmailer->displayError();
		}

		$this->flashmsg('Email konfirmasi telah dikirim');
		redirect('pihak-sekolah');
	}
}