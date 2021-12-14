<?php
include("Classes/PHPExcel.php");
include("connection.php");
$testname=$_POST['list3'];
if(!empty($_FILES["excel"]))
{
	$file_array = explode(".", $_FILES["excel"]["name"]);
	if($file_array[1] == "xls" || $file_array[1] == "xlsx")
	{
		$uploadFilePath = 'upload/'.basename($_FILES['excel']['name']);
		move_uploaded_file($_FILES['excel']['tmp_name'], $uploadFilePath);
		$filename = $_FILES["excel"]["name"];
		echo $filename;
		$object = PHPExcel_IOFactory::load($uploadFilePath);
		foreach ($object->getWorksheetIterator() as $worksheet)
		{
			$rowcount = $worksheet->getHighestRow();
			for($row=2;$row<=$rowcount;$row++)
			{
				$question=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
				$opt1=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
				$opt2=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
				$opt3=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
				$opt4=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
				$correct=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
				$query = $db->prepare('INSERT INTO addquestion(testname,question,opt1,opt2,opt3,opt4,correct) VALUES (?,?,?,?,?,?,?)');
                $data=array($testname,$question,$opt1,$opt2,$opt3,$opt4,$correct);            
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

