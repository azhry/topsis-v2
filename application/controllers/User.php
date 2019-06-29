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

	public function cari()
	{
		$this->load->model('kriteria_m');
		$this->load->library('Topsis/topsis');
		$kriteria = $this->kriteria_m->get();
		$config = [];
		$exps = [];
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
				'exp'		=> $row->exp,
				'values'	=> $details
			];

			$exps[$row->key] = $row->exp;
		}
		$this->topsis->set_config($config);
		$this->topsis->set_exps($exps);
		$this->load->model('sekolah_m');
		
		$this->data['range']	= $this->sekolah_m->get_range();
		$this->data['criteria']	= $this->topsis->criteria;
		$this->data['config']	= $this->data['criteria']->get_config();

		$this->data['sekolah']		= json_decode(json_encode($this->sekolah_m->get()), true);
		
		$matrix = $this->topsis->fit($this->data['sekolah'], ['nama_sekolah', 'id', 'alamat', 'latitude', 'longitude', 'telepon', 'created_at', 'updated_at', 'id_user']);
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

			if (!empty($this->POST('akreditasi')))
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}

				$akreditasi = $this->POST('akreditasi');
                $cond .= 'akreditasi = "' . $akreditasi . '" ';
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
			$this->topsis->set_config($config);
			$this->topsis->set_exps($exps);
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
			$data = [
				'rank'		=> $rank,
				'session'	=> $_SESSION
			];
			echo json_encode($data);
		}
	}
}