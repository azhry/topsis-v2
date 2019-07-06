<?php 
/**
* Main class which implements TOPSIS method.
*
* @package    Topsis
* @author     Azhary Arliansyah
* @version    1.1 (with cost & benefit)
*/

require_once(__DIR__ . '/Criteria.php');

class Topsis
{
	private $data;
	private $result;
	private $normalized_result;
	private $weighted_result;
	private $distance_result;
	private $normalizer;
	private $weights;
	private $exps;

	public $criteria;

	public function __construct()
	{
		$this->criteria 	= new Criteria();
		$this->normalizer 	= [];
		$this->weights 		= [];
		$this->exps 		= null;

		foreach ($this->criteria->config as $key => $value)
		{
			$this->weights[$key] = $value['weight'];
		}
	}

	public function set_exps($exps)
	{
		$this->exps = $exps;
	}

	public function set_config($config)
	{
		$this->criteria = new Criteria();
		$this->criteria->set_config($config);
		foreach ($this->criteria->config as $key => $value)
		{
			$this->weights[$key] = $value['weight'];
		}
	}

	public function fit($data, $exclude_key = [])
	{
		$this->data = $data;
		$this->result = $this->criteria->fit($data, $exclude_key);
		
		foreach ($this->weights as $key => $value)
		{
			$this->normalizer[$key] = $this->euclidean_distance(array_column($this->result, $key));
		}
		return $this->result;
	}

	private function normalize()
	{
		$this->normalized_result = array_map(function($row) {
			$result = [];
			foreach ($row as $key => $value)
			{
				$result[$key] = $this->normalizer[$key] == 0 ? 0 : $value / $this->normalizer[$key];
			}
			return $result;
		}, $this->result);

		$_SESSION['unormalized_result']	= $this->result;
		$_SESSION['normalized_result'] 	= $this->normalized_result;

		return $this->normalized_result;
	}

	public function weight()
	{
		$this->normalize();

		$this->weighted_result = array_map(function($row) {
			$result = [];
			foreach ($row as $key => $value)
			{
				$result[$key] = $value * $this->weights[$key];
			}
			return $result;
		}, $this->normalized_result);
		$_SESSION['weighted_result'] = $this->weighted_result;
		return $this->weighted_result;
	}

	public function solution_distance()
	{
		$solution_matrix = $this->solution_matrix($this->weighted_result);
		$_SESSION['solution_matrix'] = $solution_matrix;
		$this->distance_result = array_map(function($row) use ($solution_matrix) {
			$positive_sum = $negative_sum = 0;
			foreach ($row as $key => $value)
			{
				$positive_sum += pow($value - $solution_matrix['positive'][$key], 2);
				$negative_sum += pow($value - $solution_matrix['negative'][$key], 2);
			}
			return [
				'positive'	=> sqrt($positive_sum),
				'negative'	=> sqrt($negative_sum)
			];
		}, $this->weighted_result);

		$_SESSION['distance_result'] = $this->distance_result;
		return $this->distance_result;
	}

	public function result()
	{
		$result = array_map(function($row) {
			return $this->preference($row['positive'], $row['negative']);
		}, $this->distance_result);
		$_SESSION['result'] = $result;
		return $result;
	}

	public function rank($order = 'desc')
	{
		$result = $this->result();
		$data = $this->data;
		array_multisort($result, $order == 'desc' ? SORT_DESC : SORT_ASC, $data);
		return $data;
	}

	private function preference($x, $y)
	{
		return ($x + $y) == 0 ?  0 : $y / ($x + $y);
	}

	private function solution_matrix($matrix)
	{
		$solution = ['positive' => [], 'negative' => []];
		foreach ($this->weights as $key => $value)
		{
			$col = array_column($matrix, $key);
			$len_col = count($col);
			if ($this->exps != null)
			{
				switch ($this->exps[$key])
				{
					case 'Cost':
						$solution['positive'][$key] = $len_col > 0 ? min($col) : 0;
						$solution['negative'][$key] = $len_col > 0 ? max($col) : 0;	
						break;

					case 'Benefit':
						$solution['positive'][$key] = $len_col > 0 ? max($col) : 0;
						$solution['negative'][$key] = $len_col > 0 ? min($col) : 0;	
						break;
				}
			}
			else
			{
				$solution['positive'][$key] = $len_col > 0 ? max($col) : 0;
				$solution['negative'][$key] = $len_col > 0 ? min($col) : 0;	
			}
		}

		return $solution;
	}

	private function euclidean_distance($vector)
	{
		$powered_vect = array_map(function($x) { return $x * $x; }, $vector);
		$sum = array_sum($powered_vect);
		return sqrt($sum);
	}

}
