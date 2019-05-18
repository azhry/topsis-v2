<?php 

class Pengguna_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'pengguna';
		$this->data['primary_key']	= 'id';
	}

	public function login($data)
	{
		$pengguna = $this->get_row(['username' => $data['username'], 'password' => $data['password']]);
		if (isset($pengguna))
		{
			$this->session->set_userdata([
				'id' 			=> $pengguna->id,
				'username'		=> $pengguna->username,
				'id_role'		=> $pengguna->id_role
			]);
			return $pengguna;
		}

		return null;
	}
}