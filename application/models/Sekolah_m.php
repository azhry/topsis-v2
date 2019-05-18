<?php 

class Sekolah_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'sekolah';
		$this->data['primary_key']	= 'id';
	}


	public function get_range()
	{
		$min_values = $this->get_min_values();
		$max_values = $this->get_max_values();

		$min_biaya_masuk 	= $min_values->biaya_masuk;
		$max_biaya_masuk 	= $max_values->biaya_masuk;
		$min_spp_bulanan 		= $min_values->spp_bulanan;
		$max_spp_bulanan 		= $max_values->spp_bulanan;

		return [
			'biaya_masuk'	=> $this->calculate_range($min_biaya_masuk, $max_biaya_masuk, 5),
			'spp_bulanan'	=> $this->calculate_range($min_spp_bulanan, $max_spp_bulanan, 5),
		];
	}

	private function calculate_range($min, $max, $n)
	{
		$range = ($max - $min) / $n;
		$range_set = [];
		for ($i = 0; $i < $n; $i++)
		{
			if ($i > 0) $min += 0.1;

			$range_set []= [
				'min'	=> $min,
				'max'	=> $min + $range
			];

			$min += $range;
		}

		return $range_set;
	}

	private function get_min_values()
	{
		$this->db->select([
			'MIN(biaya_masuk) AS biaya_masuk',
			'MIN(spp_bulanan) AS spp_bulanan'
		])->from($this->data['table_name']);

		$query = $this->db->get();
		return $query->row();
	}

	private function get_max_values()
	{
		$this->db->select([
			'MAX(biaya_masuk) AS biaya_masuk',
			'MAX(spp_bulanan) AS spp_bulanan'
		])->from($this->data['table_name']);

		$query = $this->db->get();
		return $query->row();
	}
}