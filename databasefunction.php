<?php
	class Database{
		private $pdo;

		public function __construct($host, $dbname, $uesrname, $password)
		{
			$con = new PDO('mysql:host='.$host.'; dbname='.$dbname.';',$uesrname,$password);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$con->exec('set names utf8');

			$this->pdo = $con;
		}

		public function query($show)
		{
			$stmt = $this->pdo->prepare($show);
			//echo $show;
			$stmt -> execute();

			if($show)
			{
				$data = $stmt->fetchAll();
				return $data;
			}
		}

		public function query2($show,$params)
		{
			$stmt2 = $this->pdo->prepare($show);
			$stmt2->execute();


			if( $stmt2->rowCount() ) {
				echo "Record add successfully";
				//return true;
			}

			$con = null;
			#Insert
		}

		public function query3($show,$params)
		{
			$stmt = $this->pdo->prepare($show);
			$stmt->execute($params);

			if( $stmt->rowCount() ) {
				 echo "Record add successfully";
			}

			$con = null;
			#Update
		}

		public function query4($show,$params)
		{
			$stmt2 = $this->pdo->prepare($show);
			$stmt2->execute();


			if( $stmt2->rowCount() ) {
				//echo "Record add successfully";
				return true;
			}

			$con = null;
			#Insert
		}

		public function query5($show,$params)
		{
			$stmt2 = $this->pdo->prepare($show);
			$stmt2->execute();


			if( $stmt2->rowCount() ) {
				//echo "Record add successfully";
				return true;
			}

			$con = null;
			#Insert
		}

		public function rowCount($show)
		{
			$stmt = $this->pdo->prepare($show);
			$stmt -> execute();

			if($show)
			{
				$data = $stmt->rowCount();
				return $data;
			}
		}
	}
?>