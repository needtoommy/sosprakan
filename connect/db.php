<?php
date_default_timezone_set('Asia/Bangkok');
//<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
//Class ประกาศตัวแปร Host Database
//ini_set('display_errors', 'Off');
//ชุดคำำสั่งติดต่อ Database

class DB
{

	var $con;
	var $link;

	private $host = "163.44.198.64";
	private $user = "cp080869_prakan";
	private $pass = "Yesnookay";
	private $dbname = "cp080869_sosprakan";


	// Function Connect Database
	function DB()
	{
		//DBcon::$dbname = $name;
		$this->con = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if ($this->con == 0) {
			//echo "ไม่สามารถเชื่อมต่อได้";
			$this->Error[] = "ไม่สามารถเชื่อมต่อได้";
		} else {
			//echo "เชื่อมต่อได้แล้ว";
			//mysql_db_query(DBcon::$dbname,"SET NAMES UTF8");
			$this->link = $this->con->set_charset("utf8");
		}
	}


	// Function Execute ข้อมูล 
	function Execute($strSQL)
	{
		$this->link = $this->con->query($strSQL);
		if ($this->link == 0) {
			$this->Error[] = "คำสั่งไม่่ถูกต้อง";
			return 0;
		} else {
			return 1;
		}
	}

	// Function GetData ข้อมูล
	function getData()
	{
		if ($this->link->num_rows != 0) {
			$rows = $this->link->fetch_array();
			return $rows;
		} else {
			$this->Error[] = "ไม่มีข้อมูล";
			return 0;
		}
	}

	// Function นับจำนวนข้อมูลที่ Query ข้อมูล
	function getNum()
	{
		try {
			$num = $this->link->num_rows();
			return $num;
		} catch (Exception $e) {
			return 0;
		}
	}
	// Function ปิดการเชื่อมต่อ
	function Disconnect()
	{
		$this->con->close();
	}
}
