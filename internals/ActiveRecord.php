<?php

class ActiveRecord extends ApplicationBase
{

	protected $tablename;
	protected $property;

	public function __construct(){
		Database::connect();
	}
	
	public function __call($function, $params)
	{
		if(substr($function,0,9) == 'find_all_'){
			if(!count($params))
				return $this->find(substr($function,9));
			else
				return $this->find(substr($function,9), $params[0]);
		}elseif(substr($function,0,9) == 'find_one_'){
			if(!count($params))
				$result = $this->find(substr($function,9));
			else
				$result = $this->find(substr($function,9), $params[0]);
			return !empty($result[0]) ? $result[0] : false;
		}	
	}
	
	private function find($table, $hash=false)
	{
		$sql = "SELECT ";
		
		if(isset($hash[':function'])){
			$sql .= join(", ",$hash[':function']);
		}
		
		
		
		#select fieldnames
		if(isset($hash[':fields'])){
			$sql .= "`" . join("`, `",$hash[':fields'])."`";
		}
		
		if(!empty($hash[':function']) && !empty($hash[':fields'])){
			$sql .= ", ";
		}elseif(empty($hash[':function']) && empty($hash[':fields'])){
			$sql .= " * ";
		}
		
		$sql .= " FROM $table";
		
		#specify conditions
		if(isset($hash[':criteria'])){
			$sql .= " WHERE ";
			foreach($hash[':criteria'] as $key=>$val){
				if($val != "")
				$this->errors[] = array('2001', ucwords($key) . ' has no value!');
				$sql .= $key . " = " . (is_numeric($val) ? $val : "'" . $val . "'") . " AND ";
			}
			$sql .= "1";
		}
		
		#set order
		if(isset($hash[':order'])){
			$sql .= " ORDER BY " . $hash[':order'][0] . ' ' . $hash[':order'][1];
		}
		
		#set limit
		if(isset($hash[':limit'])){
			$sql .= " LIMIT " . $hash[':limit'][0] . ',' . $hash[':limit'][1];
		}
		
		//echo $sql . "<br/>";
		#mysql_connect('localhost', 'iyanski_pfu', 'iyanski_pfw');
		#mysql_select_db('iyanski_pinoyfreelancers');
		$res = mysql_query($sql) or die(mysql_error());
		
		if(!empty($res))
		while($row = mysql_fetch_assoc($res)){
			$result[] = $row;
		}
		return isset($result) ? $result : false;
	}
	
	public function save()
	{
		$x = 0;
		$sql = "INSERT INTO " . strtolower($this->tablename) .
			(is_array($this->property) ? "(`" . join("`, `", array_keys($this->property)) . "`" : '') . ")";
		$sql .= " VALUES(";
		if(is_array($this->property))
		foreach($this->property as $val){
			if	($x < count($this->property) - 1)
				$sql .= is_numeric($val) ? $val . ", " : "'" .  addslashes($val) . "', ";
			else
				$sql .= is_numeric($val) ? $val . "" : "'" .  addslashes($val) . "'";
			$x++;
		}
		$sql .= ")";
		if	(mysql_query($sql)){
			$this->property['id'] = mysql_insert_id();
			return true;
		}else{
			return false;
			die(mysql_error());
		}
	}
	
	public function update($hash = false){
		$x = 1;
		$sql = "UPDATE " . strtolower($this->tablename) . " SET ";
		if(is_array($this->property)){
			$total_property_count = count($this->property);
			foreach($this->property as $key => $val){
				//if properties havent reached limit yet
				if($x < $total_property_count){
					if(is_integer($val))
						$sql .= $key . " = " . $val . ", ";
					else
						$sql .= $key . " = '" . $val . "', ";
				} else {	//if property has reached limit
					if(is_integer($val))
						$sql .= $key . " = " . $val . " ";
					else
						$sql .= $key . " = '" . $val . "' ";
				}
			$x++;	//increments the counter
			}
			
			#specify conditions
			if(isset($hash[':criteria'])){
				$sql .= " WHERE ";
				foreach($hash[':criteria'] as $key=>$val){
					if($val == NULL)
					$this->errors[] = array('2001', ucwords($val) . ' has no value!');
					$sql .= $key . " = " . (is_numeric($val) ? $val : "'" . $val . "'") . " AND ";
				}
				$sql .= "1";
			}
			#echo $sql;
			#mysql_query($sql) or die(mysql_error());
			if	(mysql_query($sql)){
				return true;
			}else{
				return false;
				die(mysql_error());
			}
		}
	}
	
	public function show(){$this->trigger();}
	
	public function delete($hash = false)
	{
		$x = 1;
		$sql = "DELETE FROM ".strtolower($this->tablename)." WHERE ";
		
		if(!empty($hash[':criteria'])){
			$total_property_count = count($hash[':criteria']);
			foreach($hash[':criteria'] as $key => $val){
				if($x < $total_property_count){
				$sql .= $key . " = " . (is_numeric($val) ? $val : "'" . $val . "'") . " AND ";
				}else{
				$sql .= $key . " = " . (is_numeric($val) ? $val : "'" . $val . "'");
				}
			$x++;
			}
		}
		#echo $sql;
		if	(mysql_query($sql)){
				return true;
			}else{
				return false;
				die(mysql_error());
			}
	}
	
	public function sql($query){
		return mysql_query($query);
	}
}
?>