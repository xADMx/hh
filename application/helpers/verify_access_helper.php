<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('verify_access'))
{
	/**
	 * verify_access проверка на доступ к методу
	 *
	 */
	function verify_access($id_group, $nameurl)
	{
		$this->db->where('Name_Group', $nameurl);
		$this->db->or_like('ID_Group', $id_group);
		$this->db->from('access');
		$this->db->join('group', 'Group.ID_Group = access.ID_Group');
		Return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
	}
}