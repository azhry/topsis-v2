<?php 

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
		redirect('admin/cari');
		$this->load->model('sekolah_m');
		$this->data['sekolah']	= $this->sekolah_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function daftar_sekolah()
	{
		$this->load->model('sekolah_m');

		$this->data['upload_dir'] 	= FCPATH . 'assets/foto/sekolah-';
		$this->data['sekolah']		= $this->sekolah_m->get_by_order('id', 'DESC');
		$this->data['title']		= 'Daftar Sekolah';
		$this->data['content']		= 'daftar_sekolah';
		$this->template($this->data, $this->module);
	}

	public function detail_sekolah()
	{
		$this->data['id']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));

		$this->load->model('sekolah_m');
		$this->data['sekolah']			= $this->sekolah_m->get_row(['id' => $this->data['id']]);
		$this->check_allowance(!isset($this->data['sekolah']), ['Data sekolah tidak ditemukan', 'danger']);

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
				'longitude'			=> $this->POST('longitude')
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

	// public function edit_ruko()
	// {
	// 	$this->data['id_ruko']	= $this->uri->segment(3);
	// 	$this->check_allowance(!isset($this->data['id_ruko']));

	// 	$this->load->model('ruko_m');
	// 	$this->data['ruko']			= $this->ruko_m->get_row(['id_ruko' => $this->data['id_ruko']]);
	// 	$this->check_allowance(!isset($this->data['ruko']), ['Data ruko tidak ditemukan', 'danger']);

	// 	if ($this->POST('submit'))
	// 	{
	// 		$assets_url = FCPATH . 'assets/';
	// 		$uploaded_files = $this->POST('new_uploaded_files');

	// 		$this->data['ruko'] = [
	// 			'ruko'							=> $this->POST('ruko'),
	// 			'biaya_sewa'					=> $this->POST('biaya_sewa'),
	// 			'luas_bangunan'					=> $this->POST('luas_bangunan'),
	// 			'akses_menuju_lokasi'			=> json_encode($this->POST('akses_menuju_lokasi')),
	// 			'pusat_keramaian'				=> json_encode($this->POST('pusat_keramaian')),
	// 			'zona_parkir'					=> $this->POST('zona_parkir'),
	// 			'jumlah_pesaing_serupa'			=> $this->POST('jumlah_pesaing_serupa'),
	// 			'tingkat_konsumtif_masyarakat'	=> $this->POST('tingkat_konsumtif_masyarakat'),
	// 			'lingkungan_lokasi_ruko'		=> $this->POST('lingkungan_lokasi_ruko'),
	// 			'latitude'						=> $this->POST('latitude'),
	// 			'longitude'						=> $this->POST('longitude')
	// 		];
	// 		$this->ruko_m->update($this->data['id_ruko'], $this->data['ruko']);

	// 		$uploaded_dir = $assets_url . 'foto/ruko-' . $this->data['id_ruko'];
	// 		$deleted_photos = $this->POST('deleted_photo');
	// 		if (isset($deleted_photos))
	// 		{
	// 			foreach ($deleted_photos as $photo)
	// 			{
	// 				@unlink($uploaded_dir . '/' . $photo);
	// 			}
	// 		}

	// 		if (!file_exists($uploaded_dir))
	// 		{
	// 			mkdir($uploaded_dir);	
	// 		}
			
	// 		if (isset($uploaded_files))
	// 		{
	// 			foreach ($uploaded_files as $file)
	// 			{
	// 				rename($assets_url . 'temp_files/' . $file, $uploaded_dir . '/' . $file);
	// 			}
	// 			$this->remove_directory($assets_url . 'temp_files/thumbnail');
	// 			$this->remove_directory($assets_url . 'temp_files');
	// 		}

	// 		$this->flashmsg('Data ruko berhasil disimpan');
	// 		redirect('pemilik/edit-ruko/' . $this->data['id_ruko']);	
	// 	}

	// 	$this->data['upload_dir'] 			= FCPATH . 'assets/foto/ruko-' . $this->data['ruko']->id_ruko;
	// 	$this->data['files']				= array_values(array_diff(scandir($this->data['upload_dir']), ['.', '..']));
	// 	$this->data['upload_path'] 			= base_url('assets/foto/ruko-' . $this->data['ruko']->id_ruko);
	// 	$this->data['akses_menuju_lokasi']	= json_decode($this->data['ruko']->akses_menuju_lokasi);
	// 	$this->data['pusat_keramaian']		= json_decode($this->data['ruko']->pusat_keramaian);
	// 	$this->data['title']				= 'Form Edit Data Ruko';
	// 	$this->data['content']				= 'form_edit_ruko';
	// 	$this->template($this->data, $this->module);
	// }

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
		$this->check_allowance(!isset($this->data['kriteria']), ['Data kriteria tidak ditemukan', 'danger']);

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
		
		$matrix = $this->topsis->fit($this->data['sekolah'], ['nama_sekolah', 'id', 'alamat', 'latitude', 'longitude', 'telepon', 'created_at', 'updated_at']);
		$weight = $this->topsis->weight();
		$distance = $this->topsis->solution_distance();
		$rank = $this->topsis->rank();
		$this->data['sekolah']	= $rank;
		$this->data['kriteria']	= $kriteria;
		$this->data['title']	= 'Cari Sekolah';
		$this->data['content']	= 'cari';
		$this->template($this->data, $this->module);
	}

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

			$len_fasilitas = count($this->POST('fasilitas'));
			if ($len_fasilitas > 0)
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}

				$i = 0;
				$cond .= '(';
				foreach ($this->POST('fasilitas') as $akses)
				{
					$cond .= 'fasilitas LIKE "%' . $akses . '%"';
					if ($i++ < $len_fasilitas - 1)
					{
						$cond .= ' AND ';
					}
				}
				$cond .= ') ';
			}

			$len_ekstrakurikuler = count($this->POST('ekstrakurikuler'));
			if ($len_ekstrakurikuler > 0)
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}

				$i = 0;
				$cond .= '(';
				foreach ($this->POST('ekstrakurikuler') as $row)
				{
					$cond .= 'ekstrakurikuler LIKE "%' . $row . '%"';
					if ($i++ < $len_ekstrakurikuler - 1)
					{
						$cond .= ' AND ';
					}
				}
				$cond .= ') ';
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

			$this->data['sekolah']	= $this->sekolah_m->get($cond);

			$this->load->model('kriteria_m');
			$this->load->library('Topsis/topsis');
			$kriteria = $this->kriteria_m->get();
			$config = [];
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
					'values'	=> $details
				];
			}
			$this->topsis->set_config($config);
			$this->topsis->fit($this->data['sekolah'], ['nama_sekolah', 'id', 'alamat', 'latitude', 'longitude', 'telepon', 'created_at', 'updated_at']);
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
			echo json_encode($rank);
		}
	}
}