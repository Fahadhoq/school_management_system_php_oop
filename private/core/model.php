<?php

/**
 * main model
 */
class Model extends Database
{
	protected $table = "users";

	function __construct()
	{
		
		if (!property_exists($this,'table')) {
			$this->table = strtolower($this::class)."s";
		}
	}


	public function where($column,$value)
	{

		$column = addslashes($column);
		$query = "select * from $this->table where $column = :value";
		return $this->query($query,[
			'value'=>$value
		]);
	}

	public function findAll()
	{

		$query = "select * from $this->table ";
		return $this->query($query);
	}

	public function insert($data)
	{
		// Extract keys and construct column names
		$keys = array_keys($data);
		$columns = implode(',', $keys);
		
		// Construct placeholders for the values
		$placeholders = implode(',', array_map(fn($key) => ":$key", $keys));

		// Build the query
		$query = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";

		// Execute the query with the provided data
		return $this->query($query, $data);
	}

	public function update($id,$data)
	{
		$data['id'] = $id;
		$str = "";
		foreach ($data as $key => $value) {
			$str .= $key. "=:". $key.",";
		}

		$str = trim($str,",");

		// Build the query
		$query = "UPDATE $this->table SET $str WHERE id= :id";

		// Execute the query with the provided data
		return $this->query($query, $data);
	}

	public function delete($id)
	{
		$query = "DELETE from $this->table WHERE id= :id";
        $data['id'] = $id;
		// Execute the query with the provided data
		return $this->query($query, $data);
	}

	
}

