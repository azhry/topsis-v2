<?php 

define('JUMLAH_FASILITAS', 23);
define('JUMLAH_EKSTRAKURIKULER', 29);

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'admin';

		$this->data['id_pengguna'] 	= $this->session->userdata('id');
		$this->data['username'] 	= $this->session->userdata('username');
	    $this->data['id_role']		= $this->session->userdata('id_role');
		if (!isset($this->data['id_pengguna'], $this->data['username'], $this->data['id_role']))
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
			redirect('login');
		}

		if ($this->data['id_role'] != 1)
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login sebagai admin', 'danger');
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

	public function daftar_pengguna()
	{
		$this->load->model('pengguna_m');
		$this->data['id'] = $this->uri->segment(3);
		if (isset($this->data['id']))
		{
			$this->pengguna_m->delete($this->data['id']);
			$this->flashmsg('Data pengguna berhasil dihapuskan');
			redirect('admin/daftar-pengguna');
		}

		$this->data['pengguna']		= $this->pengguna_m->get(['id !=' => $this->data['id_pengguna']]);
		$this->load->model('role_m');
		for ($i = 0; $i < count($this->data['pengguna']); $i++)
		{
			$this->data['pengguna'][$i]->role = $this->role_m->get_row(['id' => $this->data['pengguna'][$i]->id_role]);
		}


		$this->data['title']		= 'Daftar Pengguna';
		$this->data['content']		= 'daftar_pengguna';
		$this->template($this->data, $this->module);
	}

	public function detail_pengguna()
	{
		$this->data['id']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));

		$this->load->model('pengguna_m');
		$this->data['pengguna']		= $this->pengguna_m->get_row(['id' => $this->data['id']]);
		// $this->check_allowance(!isset($this->data['pengguna']), ['Data tidak ditemukan', 'danger']);

		$this->load->model('role_m');
		$this->data['pengguna']->role = $this->role_m->get_row(['id' => $this->data['pengguna']->id_role]);

		$this->data['title']		= 'Detail Pengguna';
		$this->data['content']		= 'detail_pengguna';
		$this->template($this->data, $this->module);	
	}

	public function tambah_pengguna()
	{
		if ($this->POST('submit'))
		{
			$password 	= $this->POST('password');
			$rpassword 	= $this->POST('rpassword');
			if ($password !== $rpassword)
			{
				$this->flashmsg('Kolom Password harus sama dengan kolom Re-type Password', 'danger');
				redirect('admin/tambah-pengguna');
			}

			$this->data['pengguna'] = [
				'username'		=> $this->POST('username'),
				'password'		=> md5($password),
				'id_role'		=> $this->POST('id_role'),
				'nama'			=> $this->POST('nama'),
				'email'			=> $this->POST('email'),
				'alamat'		=> $this->POST('alamat'),
				'kontak'		=> $this->POST('kontak'),
				'jenis_kelamin'	=> $this->POST('jenis_kelamin')
			];

			$this->load->model('pengguna_m');
			$this->pengguna_m->insert($this->data['pengguna']);
			$this->flashmsg('Data pengguna berhasil ditambahkan');
			redirect('admin/daftar-pengguna');	
		}

		$this->load->model('role_m');
		$this->data['role']			= $this->role_m->get();
		$this->data['title']		= 'Tambah Pengguna';
		$this->data['content']		= 'form_tambah_pengguna';
		$this->template($this->data, $this->module);
	}

	public function edit_pengguna()
	{
		$this->data['id']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));

		$this->load->model('pengguna_m');
		$this->data['pengguna']		= $this->pengguna_m->get_row(['id' => $this->data['id']]);
		// $this->check_allowance(!isset($this->data['pengguna']), ['Data tidak ditemukan', 'danger']);

		if ($this->POST('submit'))
		{
			$this->data['pengguna'] = [
				'username'		=> $this->POST('username'),
				'nama'			=> $this->POST('nama'),
				'jenis_kelamin'	=> $this->POST('jenis_kelamin'),
				'email'			=> $this->POST('email'),
				'alamat'		=> $this->POST('alamat'),
				'kontak'		=> $this->POST('kontak'),
				'id_role'		=> $this->POST('id_role')
			];

			$password 	= $this->POST('password');
			$rpassword 	= $this->POST('rpassword');
			if (!empty($password) or !empty($rpassword))
			{
				if ($password !== $rpassword)
				{
					$this->flashmsg('Kolom Password harus sama dengan kolom Re-type Password', 'danger');
					redirect('admin/edit-pengguna/' . $this->data['id']);
				}

				$this->data['pengguna']['password'] = md5($password);
			}

			$this->pengguna_m->update($this->data['id'], $this->data['pengguna']);
			$this->flashmsg('Data pengguna berhasil diubah');
			redirect('admin/edit-pengguna/' . $this->data['id']);
		}

		$this->load->model('role_m');
		$this->data['role']			= $this->role_m->get();
		$this->data['title']		= 'Edit Pengguna';
		$this->data['content']		= 'form_edit_pengguna';
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

			$password 	= $this->POST('password');
			$rpassword 	= $this->POST('rpassword');
			if (!empty($password) or !empty($rpassword))
			{
				if ($password !== $rpassword)
				{
					$this->flashmsg('Kolom Password harus sama dengan kolom Re-type Password', 'danger');
					redirect('admin/profil');
				}

				$this->data['pengguna']['password'] = md5($password);
			}

			if (isset($this->data['pengguna']['username']) && !empty($this->data['pengguna']['username']))
			{
				$this->session->set_userdata('username', $this->data['pengguna']['username']);
			}

			$this->pengguna_m->update($this->data['id_pengguna'], $this->data['pengguna']);
			$this->flashmsg('Profil anda berhasil diubah');
			redirect('admin/profil');
		}

		$this->data['pengguna']	= $this->pengguna_m->get_row(['id' => $this->data['id_pengguna']]);
		$this->data['title']	= 'Profil';
		$this->data['content']	= 'profil';
		$this->template($this->data, $this->module);
	}

	public function daftar_sekolah()
	{
		$this->load->model('sekolah_m');
		$this->data['upload_dir'] 	= FCPATH . 'assets/foto/sekolah-';

		$this->data['id'] = $this->uri->segment(3);
		if (isset($this->data['id']))
		{
			if (file_exists($this->data['upload_dir'] . $this->data['id']))
			{
				$this->remove_directory($this->data['upload_dir'] . $this->data['id']);
			}

			$this->sekolah_m->delete($this->data['id']);
			$this->flashmsg('Data sekolah berhasil dihapus');
			redirect('admin/daftar-sekolah');
		}

		$this->data['sekolah']		= $this->sekolah_m->get_by_order('id', 'DESC');
		$this->data['title']		= 'Daftar Sekolah';
		$this->data['content']		= 'daftar_sekolah';
		$this->template($this->data, $this->module);
	}

	public function verifikasi_sekolah()
	{
		$this->data['id']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));

		$this->load->model('sekolah_m');
		$this->data['sekolah']			= $this->sekolah_m->get_row(['id' => $this->data['id']]);

		if (isset($this->data['sekolah']))
		{
			$this->sekolah_m->update($this->data['id'], ['valid' => 1]);
			$this->flashmsg('Data sekolah berhasil diverifikasi');
		}
		
		redirect('admin/detail-sekolah/' . $this->data['id']);	
	}

	public function detail_sekolah()
	{
		$this->data['id']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));

		$this->load->model('sekolah_m');
		$this->data['sekolah']			= $this->sekolah_m->get_row(['id' => $this->data['id']]);
		// $this->check_allowance(!isset($this->data['sekolah']), ['Data sekolah tidak ditemukan', 'danger']);

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
		$this->data['title']				= 'Detail Informasi Sekolah';
		$this->data['content']				= 'detail_sekolah';
		$this->template($this->data, $this->module);
	}

	public function tambah_sekolah()
	{
		if ($this->POST('submit'))
		{
			$this->load->model('sekolah_m');
			$assets_url = FCPATH . 'assets/';
			$uploaded_files = $this->POST('uploaded_files');

			$this->data['sekolah'] = [
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
				'jarak'				=> $this->POST('jarak')
			];
			$this->sekolah_m->insert($this->data['sekolah']);

			$uploaded_dir = $assets_url . 'foto/sekolah-' . $this->db->insert_id();
			mkdir($uploaded_dir);
			foreach ($uploaded_files as $file)
			{
				rename($assets_url . 'temp_files/' . $file, $uploaded_dir . '/' . $file);
			}
			$this->remove_directory($assets_url . 'temp_files/thumbnail');
			$this->remove_directory($assets_url . 'temp_files');

			$this->flashmsg('Data sekolah berhasil disimpan');
			redirect('admin/tambah-sekolah');
		}

		$this->data['title']	= 'Form Penambahan Sekolah Baru';
		$this->data['content']	= 'form_tambah_sekolah';
		$this->template($this->data, $this->module);
	}

	public function edit_sekolah()
	{
		$this->data['id']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));

		$this->load->model('sekolah_m');
		$this->data['sekolah']			= $this->sekolah_m->get_row(['id' => $this->data['id']]);
		// $this->check_allowance(!isset($this->data['sekolah']), ['Data sekolah tidak ditemukan', 'danger']);

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

		if ($this->POST('submit'))
		{
			$this->load->model('sekolah_m');
			$assets_url = FCPATH . 'assets/';
			$uploaded_files = $this->POST('new_uploaded_files');

			$this->data['sekolah'] = [
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
				'jarak'				=> $this->POST('jarak')
			];
			$this->sekolah_m->update($this->data['id'], $this->data['sekolah']);

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
			redirect('admin/edit-sekolah/' . $this->data['id']);
		}

		$this->data['fasilitas']			= json_decode($this->data['sekolah']->fasilitas);
		$this->data['ekstrakurikuler']		= json_decode($this->data['sekolah']->ekstrakurikuler);
		$this->data['lokasi']				= json_decode($this->data['sekolah']->lokasi);

		$this->data['title']	= 'Form Edit Sekolah';
		$this->data['content']	= 'form_edit_sekolah';
		$this->template($this->data, $this->module);
	}

	public function upload_handler()
	{
		require_once(FCPATH . '/assets/jQuery-File-Upload-9.23.0/server/php/index.php');
	}

	public function kriteria()
	{
		$this->load->model('kriteria_m');

		$this->data['id']	= $this->uri->segment(3);
		if (isset($this->data['id']))
		{
			$this->kriteria_m->delete($this->data['id']);
			$this->flashmsg('Kriteria berhasil dihapus');
			redirect('admin/kriteria');
		}

		$this->data['kriteria']		= $this->kriteria_m->get();
		$this->data['title']		= 'Daftar Kriteria';
		$this->data['content']		= 'kriteria';
		$this->template($this->data, $this->module);
	}

	public function detail_kriteria()
	{
		$this->data['id']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));

		$this->load->model('kriteria_m');
		$this->data['kriteria']			= $this->kriteria_m->get_row(['id' => $this->data['id']]);
		// $this->check_allowance(!isset($this->data['kriteria']), ['Data kriteria tidak ditemukan', 'danger']);

		$this->data['title']				= 'Detail Kriteria';
		$this->data['content']				= 'detail_kriteria';
		$this->template($this->data, $this->module);
	}

	public function tambah_kriteria()
	{
		if ($this->POST('submit'))
		{
			$this->load->model('kriteria_m');
			$type 		= $this->POST('type');
			$details 	= [];
			if ($type == 'range')
			{
				$range_label 	= $this->POST('range_label');
				$range_max 		= $this->POST('range_max');
				$range_min		= $this->POST('range_min');
				$range_value	= $this->POST('range_value');

				for ($i = 0; $i < count($range_label); $i++)
				{
					$details []= [
						'label'	=> $range_label[$i],
						'max'	=> $range_max[$i],
						'min'	=> $range_min[$i],
						'value'	=> $range_value[$i]
					];
				} 
			} 
			elseif ($type == 'option')
			{
				$option_label 	= $this->POST('option_label');
				$option_value	= $this->POST('option_value');

				for ($i = 0; $i < count($option_label); $i++)
				{
					$details []= [
						'label'	=> $option_label[$i],
						'value'	=> $option_value[$i]
					];
				} 
			}

			$this->kriteria_m->insert([
				'key'		=> $this->POST('key'),
				'type'		=> $type,
				'bobot'		=> $this->POST('weight'),
				'kriteria'	=> $this->POST('label'),
				'inisial'	=> $this->POST('initial'),
				'exp'		=> $this->POST('exp'),
				'details'	=> json_encode($details)
			]);

			$this->flashmsg('Data kriteria berhasil disimpan');
			redirect('admin/tambah-kriteria');
		}

		$this->data['title']	= 'Form Penambahan Kriteria Baru';
		$this->data['content']	= 'form_tambah_kriteria';
		$this->template($this->data, $this->module);
	}

	public function edit_kriteria()
	{
		$this->data['id']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));

		$this->load->model('kriteria_m');
		$this->data['kriteria']			= $this->kriteria_m->get_row(['id' => $this->data['id']]);
		// $this->check_allowance(!isset($this->data['kriteria']), ['Data kriteria tidak ditemukan', 'danger']);

		if ($this->POST('submit'))
		{
			$type 		= $this->POST('type');
			$details 	= [];
			if ($type == 'range')
			{
				$range_label 	= $this->POST('range_label');
				$range_max 		= $this->POST('range_max');
				$range_min		= $this->POST('range_min');
				$range_value	= $this->POST('range_value');

				for ($i = 0; $i < count($range_label); $i++)
				{
					if (empty($range_label[$i]) or !isset($range_max[$i]) or !isset($range_min[$i]) or empty($range_value[$i]))
					{
						continue;
					}

					$details []= [
						'label'	=> $range_label[$i],
						'max'	=> $range_max[$i],
						'min'	=> $range_min[$i],
						'value'	=> $range_value[$i]
					];
				} 
			} 
			elseif ($type == 'option')
			{
				$option_label 	= $this->POST('option_label');
				$option_value	= $this->POST('option_value');

				for ($i = 0; $i < count($option_label); $i++)
				{
					if (empty($option_label[$i]) or empty($option_value[$i]))
					{
						continue;
					}

					$details []= [
						'label'	=> $option_label[$i],
						'value'	=> $option_value[$i]
					];
				} 
			}

			$this->kriteria_m->update($this->data['id'], [
				'key'		=> $this->POST('key'),
				'type'		=> $type,
				'bobot'		=> $this->POST('weight'),
				'kriteria'	=> $this->POST('label'),
				'inisial'	=> $this->POST('initial'),
				'exp'		=> $this->POST('exp'),
				'details'	=> json_encode($details)
			]);

			$this->flashmsg('Data kriteria berhasil disimpan');
			redirect('admin/edit-kriteria/' . $this->data['id']);
		}


		$this->data['details']	= json_decode($this->data['kriteria']->details);
		$this->data['title']	= 'Form Edit Kriteria';
		$this->data['content']	= 'form_edit_kriteria';
		$this->template($this->data, $this->module);
	}

	public function perhitungan()
	{
		$this->load->model('kriteria_m');
		$this->load->library('Topsis/topsis');
		$kriteria = $this->kriteria_m->get();
		$config = [];
		foreach ($kriteria as $row)
		{
			$details = json_decode($row->details, true);

			if ($row->type == 'range')
			{
				$max = PHP_INT_MIN;
				$min = PHP_INT_MAX;
				$max_idx = -1;
				$min_idx = -1;
				for ($i = 0; $i < count($details); $i++)
				{
					if ($details[$i]['max'] > $max)
					{
						$max = $details[$i]['max'];
						$max_idx = $i;
					}

					if ($details[$i]['min'] < $min)
					{
						$min = $details[$i]['min'];
						$min_idx = $i;
					}
				}
				$details[$max_idx]['max'] = null;
				$details[$min_idx]['min'] = null;
			}

			$config[$row->key] = [
				'key'		=> $row->key,
				'weight'	=> $row->bobot,
				'label'		=> $row->kriteria,
				'type'		=> $row->type,
				'values'	=> $details
			];
		}

		$this->topsis->set_config($config);
		$this->load->model('sekolah_m');
		
		$this->data['range']	= $this->sekolah_m->get_range();
		$this->data['criteria']	= $this->topsis->criteria;
		$this->data['config']	= $this->data['criteria']->get_config();

		$this->data['sekolah']		= json_decode(json_encode($this->sekolah_m->get()), true);

		$this->data['sekolah']		= array_map(function($sekolah) {

			$fasilitas 					= count(json_decode($sekolah['fasilitas'])) / JUMLAH_FASILITAS;
			$ekstrakurikuler 			= count(json_decode($sekolah['ekstrakurikuler'])) / JUMLAH_EKSTRAKURIKULER;
			$sekolah['fasilitas'] 		= round($fasilitas, 2);
			$sekolah['ekstrakurikuler'] = round($ekstrakurikuler, 2);
			return $sekolah;

		}, $this->data['sekolah']);
		$_SESSION['sekolah'] = $this->data['sekolah'];
		
		$matrix = $this->topsis->fit($this->data['sekolah'], ['nama_sekolah', 'id', 'alamat', 'latitude', 'longitude', 'telepon', 'created_at', 'updated_at', 'id_user', 'valid']);
		$weight = $this->topsis->weight();
		$distance = $this->topsis->solution_distance();
		$rank = $this->topsis->rank();
		$this->data['sekolah']	= $rank;
		$_SESSION['ranked'] = $this->data['sekolah'];
		$this->data['kriteria']	= $kriteria;

		$this->data['title'] 	= 'Alur Perhitungan Topsis';
		$this->data['content']	= 'alur_perhitungan';
		$this->template($this->data, $this->module);
	}

	public function cari()
	{
		$this->load->model('kriteria_m');
		$this->load->library('Topsis/topsis');
		$kriteria = $this->kriteria_m->get();
		$config = [];
		foreach ($kriteria as $row)
		{
			$details = json_decode($row->details, true);

			if ($row->type == 'range')
			{
				$max = PHP_INT_MIN;
				$min = PHP_INT_MAX;
				$max_idx = -1;
				$min_idx = -1;
				for ($i = 0; $i < count($details); $i++)
				{
					if ($details[$i]['max'] > $max)
					{
						$max = $details[$i]['max'];
						$max_idx = $i;
					}

					if ($details[$i]['min'] < $min)
					{
						$min = $details[$i]['min'];
						$min_idx = $i;
					}
				}
				$details[$max_idx]['max'] = null;
				$details[$min_idx]['min'] = null;
			}

			$config[$row->key] = [
				'key'		=> $row->key,
				'weight'	=> $row->bobot,
				'label'		=> $row->kriteria,
				'type'		=> $row->type,
				'values'	=> $details
			];
		}
		$this->topsis->set_config($config);
		$this->load->model('sekolah_m');
		
		$this->data['range']	= $this->sekolah_m->get_range();
		$this->data['criteria']	= $this->topsis->criteria;
		$this->data['config']	= $this->data['criteria']->get_config();

		$this->data['sekolah']		= json_decode(json_encode($this->sekolah_m->get()), true);
		
		$matrix = $this->topsis->fit($this->data['sekolah'], ['nama_sekolah', 'id', 'alamat', 'latitude', 'longitude', 'telepon', 'created_at', 'updated_at', 'valid', 'id_user']);
		$weight = $this->topsis->weight();
		$distance = $this->topsis->solution_distance();
		$rank = $this->topsis->rank();
		$this->data['sekolah']	= $rank;
		$this->data['kriteria']	= $kriteria;
		$this->data['title']	= 'Cari Sekolah';
		$this->data['content']	= 'cari';
		$this->template($this->data, $this->module);
	}

	// public function rank()
	// {
	// 	if ($this->POST('cari'))
	// 	{
	// 		$this->load->model('sekolah_m');
	// 		$range = $this->sekolah_m->get_range();
	// 		$cond = '';
			
	// 		if (!empty($this->POST('biaya_masuk')))
	// 		{
	// 			$biaya_masuk = $this->POST('biaya_masuk');
	// 			$range_masuk = $range['biaya_masuk'];
 //                $cond .= '(biaya_masuk >= ' . $range_masuk[count($range_masuk) - $biaya_masuk]['min'] . ' AND biaya_masuk <= ' . $range_masuk[count($range_masuk) - $biaya_masuk]['max'] . ') ';
	// 		}

	// 		if (!empty($this->POST('spp_bulanan')))
	// 		{
	// 			if (strlen($cond) > 0)
	// 			{
	// 				$cond .= 'AND ';
	// 			}

	// 			$spp_bulanan = $this->POST('spp_bulanan');
	// 			$range_spp = $range['spp_bulanan'];
 //                $cond .= '(spp_bulanan >= ' . $range_spp[count($range_spp) - $spp_bulanan]['min'] . ' AND spp_bulanan <= ' . $range_spp[count($range_spp) - $spp_bulanan]['max'] . ') ';
	// 		}

	// 		if (!empty($this->POST('akreditasi')))
	// 		{
	// 			if (strlen($cond) > 0)
	// 			{
	// 				$cond .= 'AND ';
	// 			}

	// 			$akreditasi = $this->POST('akreditasi');
 //                $cond .= 'akreditasi = "' . $akreditasi . '" ';
	// 		}

	// 		$len_fasilitas = count($this->POST('fasilitas'));
	// 		if ($len_fasilitas > 0)
	// 		{
	// 			if (strlen($cond) > 0)
	// 			{
	// 				$cond .= 'AND ';
	// 			}

	// 			$i = 0;
	// 			$cond .= '(';
	// 			foreach ($this->POST('fasilitas') as $akses)
	// 			{
	// 				$cond .= 'fasilitas LIKE "%' . $akses . '%"';
	// 				if ($i++ < $len_fasilitas - 1)
	// 				{
	// 					$cond .= ' AND ';
	// 				}
	// 			}
	// 			$cond .= ') ';
	// 		}

	// 		$len_ekstrakurikuler = count($this->POST('ekstrakurikuler'));
	// 		if ($len_ekstrakurikuler > 0)
	// 		{
	// 			if (strlen($cond) > 0)
	// 			{
	// 				$cond .= 'AND ';
	// 			}

	// 			$i = 0;
	// 			$cond .= '(';
	// 			foreach ($this->POST('ekstrakurikuler') as $row)
	// 			{
	// 				$cond .= 'ekstrakurikuler LIKE "%' . $row . '%"';
	// 				if ($i++ < $len_ekstrakurikuler - 1)
	// 				{
	// 					$cond .= ' AND ';
	// 				}
	// 			}
	// 			$cond .= ') ';
	// 		}

	// 		$len_lokasi = count($this->POST('lokasi'));
	// 		if ($len_lokasi > 0)
	// 		{
	// 			if (strlen($cond) > 0)
	// 			{
	// 				$cond .= 'AND ';
	// 			}

	// 			$i = 0;
	// 			$cond .= '(';
	// 			foreach ($this->POST('lokasi') as $row)
	// 			{
	// 				$cond .= 'lokasi LIKE "%' . $row . '%"';
	// 				if ($i++ < $len_lokasi - 1)
	// 				{
	// 					$cond .= ' AND ';
	// 				}
	// 			}
	// 			$cond .= ') ';
	// 		}

	// 		$this->data['sekolah']	= $this->sekolah_m->get($cond);

	// 		$this->load->model('kriteria_m');
	// 		$this->load->library('Topsis/topsis');
	// 		$kriteria = $this->kriteria_m->get();
	// 		$config = [];
	// 		$exps = [];
	// 		foreach ($kriteria as $row)
	// 		{
	// 			$details = json_decode($row->details);

	// 			if ($row->type == 'range')
	// 			{
	// 				$max = PHP_INT_MIN;
	// 				$min = PHP_INT_MAX;
	// 				$max_idx = -1;
	// 				$min_idx = -1;
	// 				for ($i = 0; $i < count($details); $i++)
	// 				{
	// 					if ($details[$i]->max > $max)
	// 					{
	// 						$max = $details[$i]->max;
	// 						$max_idx = $i;
	// 					}

	// 					if ($details[$i]->min < $min)
	// 					{
	// 						$min = $details[$i]->min;
	// 						$min_idx = $i;
	// 					}
	// 				}
	// 				$details[$max_idx]->max = null;
	// 				$details[$min_idx]->min = null;
	// 			}

	// 			$config[$row->key] = [
	// 				'key'		=> $row->key,
	// 				'weight'	=> $this->POST('bobot_' . $row->key),
	// 				'label'		=> $row->kriteria,
	// 				'type'		=> $row->type,
	// 				'exp'		=> $row->exp,
	// 				'values'	=> $details
	// 			];

	// 			$exps[$row->key] = $row->exp;
	// 		}
	// 		$this->topsis->set_config($config);
	// 		$this->topsis->set_exps($exps);
	// 		$this->topsis->fit($this->data['sekolah'], ['nama_sekolah', 'id', 'alamat', 'latitude', 'longitude', 'telepon', 'created_at', 'updated_at', 'valid', 'id_user']);
	// 		$this->data['sekolah']		= array_map(function($sekolah) {

	// 			$fasilitas 					= count(json_decode($sekolah['fasilitas'])) / JUMLAH_FASILITAS;
	// 			$ekstrakurikuler 			= count(json_decode($sekolah['ekstrakurikuler'])) / JUMLAH_EKSTRAKURIKULER;
	// 			$sekolah['fasilitas'] 		= $fasilitas;
	// 			$sekolah['ekstrakurikuler'] = $ekstrakurikuler;
	// 			return $sekolah;

	// 		}, $this->data['sekolah']);
	// 		$_SESSION['sekolah'] = $this->data['sekolah'];
	// 		$this->topsis->weight();
	// 		$this->topsis->solution_distance();
	// 		$rank = $this->topsis->rank();
	// 		$rank = array_map(function($row) {
	// 			$row = (array)$row;
	// 			$path = 'assets/foto/sekolah-' . $row['id'];
	// 			if (!file_exists(FCPATH . $path))
	// 			{
	// 				$foto = [];
	// 			}
	// 			else 
	// 			{
	// 				$foto = scandir(FCPATH . $path);
	// 			}
	// 			$foto = array_values(array_diff($foto, ['.', '..']));
	// 			$row['foto'] = isset($foto[0]) ? base_url($path . '/' . $foto[0]) : 'http://placehold.it/313x313';
	// 			$row['biaya_masuk'] = 'Rp. ' . number_format($row['biaya_masuk'], 2, ',', '.');
	// 			$row['spp_bulanan'] = 'Rp. ' . number_format($row['spp_bulanan'], 2, ',', '.');
	// 			return $row;
	// 		}, $rank);
	// 		$data = [
	// 			'rank'		=> $rank,
	// 			'session'	=> $_SESSION
	// 		];
	// 		echo json_encode($data);
	// 	}
	// }

	public function rank()
	{
		if ($this->POST('cari'))
		{
			$this->load->model('sekolah_m');
			$range = $this->sekolah_m->get_range();
			$cond = '';
			
			if (!empty($this->POST('biaya_masuk')))
			{
				$biaya_masuk = $this->POST('biaya_masuk');
				$range_masuk = $range['biaya_masuk'];
                $cond .= '(biaya_masuk >= ' . $range_masuk[count($range_masuk) - $biaya_masuk]['min'] . ' AND biaya_masuk <= ' . $range_masuk[count($range_masuk) - $biaya_masuk]['max'] . ') ';
			}

			if (!empty($this->POST('spp_bulanan')))
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}

				$spp_bulanan = $this->POST('spp_bulanan');
				$range_spp = $range['spp_bulanan'];
                $cond .= '(spp_bulanan >= ' . $range_spp[count($range_spp) - $spp_bulanan]['min'] . ' AND spp_bulanan <= ' . $range_spp[count($range_spp) - $spp_bulanan]['max'] . ') ';
			}

			if (!empty($this->POST('akreditasi')))
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}

				$akreditasi = $this->POST('akreditasi');
                $cond .= 'akreditasi = "' . $akreditasi . '" ';
			}

			$len_lokasi = count($this->POST('lokasi'));
			if ($len_lokasi > 0)
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}

				$i = 0;
				$cond .= '(';
				foreach ($this->POST('lokasi') as $row)
				{
					$cond .= 'lokasi LIKE "%' . $row . '%"';
					if ($i++ < $len_lokasi - 1)
					{
						$cond .= ' AND ';
					}
				}
				$cond .= ') ';
			}

			$this->load->model('kriteria_m');
			$this->load->library('Topsis/topsis');
			$kriteria = $this->kriteria_m->get();
			$config = [];
			$exps = [];
			foreach ($kriteria as $row)
			{
				$details = json_decode($row->details);

				if ($row->type == 'range')
				{
					$max = PHP_INT_MIN;
					$min = PHP_INT_MAX;
					$max_idx = -1;
					$min_idx = -1;
					for ($i = 0; $i < count($details); $i++)
					{
						if ($details[$i]->max > $max)
						{
							$max = $details[$i]->max;
							$max_idx = $i;
						}

						if ($details[$i]->min < $min)
						{
							$min = $details[$i]->min;
							$min_idx = $i;
						}
					}
					$details[$max_idx]->max = null;
					$details[$min_idx]->min = null;
				}

				$config[$row->key] = [
					'key'		=> $row->key,
					'weight'	=> $this->POST('bobot_' . $row->key),
					'label'		=> $row->kriteria,
					'type'		=> $row->type,
					'exp'		=> $row->exp,
					'values'	=> $details
				];

				$exps[$row->key] = $row->exp;
			}

			$this->data['sekolah']	= $this->sekolah_m->get($cond);
			$lat = $this->POST('lat');
			$lng = $this->POST('lng');
			$this->data['sekolah']	= array_map(function($sekolah) use ($lat, $lng) {

				$sekolah->jarak = $this->vincentyGreatCircleDistance($lat, $lng, $sekolah->latitude, $sekolah->longitude) / 1000; // convert meter to kilometer
				return $sekolah;

			}, $this->data['sekolah']);
			
			$fasilitas 			= $this->POST('fasilitas');
			$ekstrakurikuler 	= $this->POST('ekstrakurikuler');
			$jarak 				= $this->POST('jarak');
			$this->data['sekolah']	= array_filter($this->data['sekolah'], function($sekolah) use ($fasilitas, $ekstrakurikuler, $jarak, $config) {
				
				$res = true;
				if (!empty($fasilitas))
				{
					$c_fasilitas = count(json_decode($sekolah->fasilitas)) / JUMLAH_FASILITAS;

					$f_result = 0;
					foreach ($config['fasilitas']['values'] as $value)
					{
						if (!isset($value->max))
						{
							if ($c_fasilitas >= $value->min)
							{
								$f_result = $value->value;
								break;
							}
						}
						else if (!isset($value->min))
						{
							if ($c_fasilitas <= $value->max)
							{
								$f_result = $value->value;
								break;
							}	
						}
						else
						{
							if ($c_fasilitas >= $value->min && $c_fasilitas <= $value->max)
							{
								$f_result = $value->value;
								break;
							}	
						}
						
					} 

					$res = ($fasilitas == $f_result);
				}
				
				if ($res && !empty($ekstrakurikuler))
				{
					$c_ekstrakurikuler = count(json_decode($sekolah->ekstrakurikuler)) / JUMLAH_EKSTRAKURIKULER;

					$e_result = 0;
					foreach ($config['ekstrakurikuler']['values'] as $value)
					{
						if (!isset($value->max))
						{
							if ($c_ekstrakurikuler >= $value->min)
							{
								$e_result = $value->value;
								break;
							}
						}
						else if (!isset($value->min))
						{
							if ($c_ekstrakurikuler <= $value->max)
							{
								$e_result = $value->value;
								break;
							}	
						}
						else
						{
							if ($c_ekstrakurikuler >= $value->min && $c_ekstrakurikuler <= $value->max)
							{
								$e_result = $value->value;
								break;
							}	
						}
					} 

					$res = ($ekstrakurikuler == $e_result);
				}
				
				if ($res && !empty($jarak))
				{
					$j_result = 0;
					foreach ($config['jarak']['values'] as $value)
					{
						if (!isset($value->max))
						{
							if ($sekolah->jarak >= $value->min)
							{
								$j_result = $value->value;
								break;
							}
						}
						else if (!isset($value->min))
						{
							if ($sekolah->jarak <= $value->max)
							{
								$j_result = $value->value;
								break;
							}	
						}
						else
						{
							if ($sekolah->jarak >= $value->min && $sekolah->jarak <= $value->max)
							{
								$j_result = $value->value;
								break;
							}	
						}
					} 

					$res = ($jarak == $j_result);
				}

				return $res;
			});

			
			$this->topsis->set_config($config);
			$this->topsis->set_exps($exps);
			$this->topsis->fit($this->data['sekolah'], ['nama_sekolah', 'id', 'alamat', 'latitude', 'longitude', 'telepon', 'created_at', 'updated_at', 'id_user', 'valid']);
			$this->topsis->weight();
			$this->topsis->solution_distance();
			$rank = $this->topsis->rank();
			$rank = array_map(function($row) {
				$row = (array)$row;
				$path = 'assets/foto/sekolah-' . $row['id'];
				if (!file_exists(FCPATH . $path))
				{
					$foto = [];
				}
				else 
				{
					$foto = scandir(FCPATH . $path);
				}
				$foto = array_values(array_diff($foto, ['.', '..']));
				$row['foto'] = isset($foto[0]) ? base_url($path . '/' . $foto[0]) : 'http://placehold.it/313x313';
				$row['biaya_masuk'] = 'Rp. ' . number_format($row['biaya_masuk'], 2, ',', '.');
				$row['spp_bulanan'] = 'Rp. ' . number_format($row['spp_bulanan'], 2, ',', '.');
				return $row;
			}, $rank);
			$data = [
				'rank'		=> $rank,
				'session'	=> $_SESSION
			];
			echo json_encode($data);
		}
	}

	/**
	 * Calculates the great-circle distance between two points, with
	 * the Vincenty formula.
	 * @param float $latitudeFrom Latitude of start point in [deg decimal]
	 * @param float $longitudeFrom Longitude of start point in [deg decimal]
	 * @param float $latitudeTo Latitude of target point in [deg decimal]
	 * @param float $longitudeTo Longitude of target point in [deg decimal]
	 * @param float $earthRadius Mean earth radius in [m]
	 * @return float Distance between points in [m] (same as earthRadius)
	 */
	public function vincentyGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
	{
		// convert from degrees to radians
		$latFrom = deg2rad($latitudeFrom);
		$lonFrom = deg2rad($longitudeFrom);
		$latTo = deg2rad($latitudeTo);
		$lonTo = deg2rad($longitudeTo);

		$lonDelta = $lonTo - $lonFrom;
		$a = pow(cos($latTo) * sin($lonDelta), 2) +
		pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
		$b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

		$angle = atan2(sqrt($a), $b);
		return $angle * $earthRadius;
	}
}