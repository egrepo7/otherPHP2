<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quote extends CI_Model {

	
	public function addUser($post)
	{

		$query = "INSERT INTO users (name, alias, email, password, password_confirm, date_of_birth) VALUES (?, ?, ?, ?, ?, ?)";
		$values = [$post['reg_name'], $post['reg_alias'], $post['reg_email'], $post['reg_password'], $post['reg_confpassword'], $post['date_of_birth']];
		return $this->db->query($query, $values);

	}

	public function getUserinfo($login_info)
	{
		
		$query = "SELECT name, alias, email, users.id FROM users WHERE email = ? AND password = ?";
		$values = [$login_info['login_email'], $login_info['login_password']];
		return $this->db->query($query, $values)->row_array();
	}

	public function displayFavorites($id)
	{
		$query = "SELECT quoted_by as speaker, quotes.id, message, alias, poster_id FROM quotes LEFT JOIN favorites ON favorites.quote_id = quotes.id LEFT JOIN users ON users.id = favorites.user_id WHERE users.id = ?";
		$values = [$id];
		return $this->db->query($query, $values)->result_array();
	}

	public function displayNotFavorites($id)
	{
		$query = "SELECT quotes.id, quoted_by as speaker, message, poster_id, alias FROM quotes LEFT JOIN favorites on favorites.quote_id = quotes.id  LEFT JOIN users on users.id = poster_id WHERE NOT quotes.id IN (SELECT quotes.id FROM quotes WHERE favorites.user_id = ?)";
		$values = [$id];
		return $this->db->query($query, $values)->result_array();

	}

	public function addQuote($post)
	{
	$query = "INSERT INTO quotes (quoted_by, message, poster_id) VALUES (?, ?, ?)";
	$values = [$post['quoted_by'], $post['message'], $post['poster_id']];
	$this->db->query($query, $values);

	}

	public function addToList($quoteid, $userid)
	{
		$query = "INSERT INTO favorites (user_id, quote_id) VALUES (?, ?)";
		$values = [$userid, $quoteid];
		$this->db->query($query,$values);

	}

	public function removeFave($quoteid, $userid)
	{
		$query = "DELETE FROM favorites WHERE quote_id = ? AND user_id = ?";
		$values = [$quoteid, $userid];
		$this->db->query($query, $values);
	}

	public function viewPoster($id)
	{
		$query = "SELECT name, alias, quoted_by as speaker, message, poster_id FROM quotes LEFT JOIN users ON quotes.poster_id = users.id WHERE users.id = ?";
		$values = [$id];
		return $this->db->query($query, $values)->result_array();


	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */