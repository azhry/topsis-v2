<?php 

define('JUMLAH_FASILITAS', 23);
define('JUMLAH_EKSTRAKURIKULER', 29);


class App extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'app';
	}

	public function index()
	{
		$this->load->model('sekolah_m');
		$this->data['sekolah']	= $this->sekolah_m->get(['valid' => 1]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
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

		$this->data['sekolah']		= json_decode(json_encode($this->sekolah_m->get(['valid' => 1])), true);
		
		$matrix = $this->topsis->fit($this->data['sekolah'], ['nama_sekolah', 'id', 'alamat', 'latitude', 'longitude', 'telepon', 'created_at', 'updated_at', 'id_user', 'valid']);
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
			$cond = 'valid = 1 ';
			
			if (!empty($this->POST('biaya_masuk')))
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'OR ';
				}

				$biaya_masuk = $this->POST('biaya_masuk');
				$range_masuk = $range['biaya_masuk'];
                $cond .= '(biaya_masuk >= ' . $range_masuk[count($range_masuk) - $biaya_masuk]['min'] . ' AND biaya_masuk <= ' . $range_masuk[count($range_masuk) - $biaya_masuk]['max'] . ') ';
			}

			if (!empty($this->POST('spp_bulanan')))
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'OR ';
				}

				$spp_bulanan = $this->POST('spp_bulanan');
				$range_spp = $range['spp_bulanan'];
                $cond .= '(spp_bulanan >= ' . $range_spp[count($range_spp) - $spp_bulanan]['min'] . ' AND spp_bulanan <= ' . $range_spp[count($range_spp) - $spp_bulanan]['max'] . ') ';
			}

			if (!empty($this->POST('akreditasi')))
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'OR ';
				}

				$akreditasi = $this->POST('akreditasi');
                $cond .= 'akreditasi = "' . $akreditasi . '" ';
			}

			$len_lokasi = count($this->POST('lokasi'));
			if ($len_lokasi > 0)
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'OR ';
				}

				$i = 0;
				$cond .= '(';
				foreach ($this->POST('lokasi') as $row)
				{
					$cond .= 'lokasi LIKE "%' . $row . '%"';
					if ($i++ < $len_lokasi - 1)
					{
						$cond .= ' OR ';
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
		
		/*
		$latDelta = $latTo - $latFrom;
		$a = pow(sin($latDelta/2), 2);
		$a += cos(deg2rad($latTo)) * cos(deg2rad($latTo)) * pow(sin(deg2rad($lonDelta/29)), 2);
		$c = 2 * atan2(sqrt($a), sqrt(1-$a)); 

		$distance = 2 * $earthRadius * $c;
		return $distance; */
	}
}