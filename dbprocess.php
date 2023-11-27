<?php
	session_start();
	require_once('databasefunction.php');

	$db = new Database('localhost', 'db_survey', 'root', '');

	#find now date time vaule
	$nowdate = date("d/m/Y");
	//echo "Date : ".$nowdate."<br/>";
	list($day1,$month1,$year1) = explode("/",$nowdate);
	$DDate = "$year1-$month1-$day1";
	$Dtime = date("H:i:s",time());

	$xaction = "";
	$output = "";

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		if(isset($_GET['xaction']))
		{
			$xaction = $_GET['xaction'];
		}else{
			$xaction = "show";
		}


		if($xaction == "saveunaccept")
		{
			$accept_value = $_GET['accept_value'];

			$output = Insertacceptdata2($accept_value,$DDate,$Dtime,$db);

			echo $output;
		}else if($xaction == "getDept")
		{
			echo json_encode($db->query('SELECT * FROM tbl_faculty'));
		}
	}

	function Insertacceptdata2($inAccept,$inDate,$inTime,$inConn)
	{
		$output = "";
		$sql1 = "";
  	    $value1 = "";
        $params = "";
        $datedata = $inDate." ".$inTime;

        $sql1 = "insert into tblacceptdata (accept_status,accept_date) values ('$inAccept','$datedata')";

		//echo $sql1;

		$params = array($inAccept,$datedata);

		$inConn->query5($sql1,$params);

		if($inConn)
		{
		    $output = true;
		}else{
		    $output = false;
		}

		return $output;
	}#end function
?>