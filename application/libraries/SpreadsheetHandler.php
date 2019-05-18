<?php 
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class SpreadsheetHandler
{
	private $reader;
	private $CI;

	public function __construct()
	{
		$this->reader = new Xlsx(); 
		$this->CI =& get_instance();
	}

	public function read($filepath)
	{
		$spreadsheet 	= $this->reader->load($filepath);
		$sheet 			= $spreadsheet->getActiveSheet();
		return $sheet;
	}

	public function saveToDB($sheet, $model)
	{
		$data = $this->serialize($sheet);
		$this->CI->load->model($model);
		call_user_func_array($model . '::insert', [$data]);
	}

	/**
	 * Import excel ke database dengan menentukan batas kolom. Misal: dari kolom A - E
	 * @param object $sheet
	 * @param object $model
	 * @param array $boundaries optional
	 */
	public function saveToDBCell($sheet, $model, $boundaries = [])
	{
		// TODO
	}

	public function serialize($sheet, $startRow = 0, $mappings = [])
	{
		$data 		= [];
		$columns 	= [];
		foreach ($sheet->getRowIterator() as $i => $row)
		{
			if ($i <= $startRow)
			{
				continue;
			}

			$cellIterator 	= $row->getCellIterator();
			$record 		= [];
			$j = 0;
			foreach ($cellIterator as $cell)
			{
				if ($i == $startRow + 1)
				{
					$col = str_replace(' ', '_', strtolower($cell->getValue()));
					$columns []= isset($mappings[$col]) ? $mappings[$col] : $col;
				}
				else if ($i > $startRow + 1)
				{
					$record[$columns[$j]] = $cell->getValue();
				}
				$j++;
			}

			if ($i > $startRow + 1)
			{
				$data []= $record;
			}
		}

		return $data;
	}
}