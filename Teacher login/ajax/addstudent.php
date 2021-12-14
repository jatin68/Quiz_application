<?php
include("Classes/PHPExcel.php");
include("connection.php");
$class=$_POST['list3'];
if(!empty($_FILES["excel"]))
{
	$file_array = explode(".", $_FILES["excel"]["name"]);
	if($file_array[1] == "xls" || $file_array[1] == "xlsx")
	{
		$uploadFilePath = 'upload/'.basename($_FILES['excel']['name']);
		move_uploaded_file($_FILES['excel']['tmp_name'], $uploadFilePath);
		$filename = $_FILES["excel"]["name"];
		$object = PHPExcel_IOFactory::load($uploadFilePath);
		foreach ($object->getWorksheetIterator() as $worksheet)
		{
			$rowcount = $worksheet->getHighestRow();
			for($row=2;$row<=$rowcount;$row++)
			{
                $sname=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
                $email=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
                $password1_hash=password_hash(substr($sname,0,4)."7055", PASSWORD_DEFAULT);
				$query = $db->prepare('INSERT INTO addstudent(sname,email,class,password) VALUES (?,?,?,?)');
                $data=array($sname,$email,$class,$password1_hash);            
				$execute=$query->execute($data);
				if($execute)
				{
					echo 0;
				}
			}
		}
	}
}

?>

