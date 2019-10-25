<?php

//including class for handling excel sheets
require_once 'Classes/PHPExcel.php';

//connecting to server
$conn = mysqli_connect('localhost','root','') or die('Error in connecting with server!!');

//connecting to database
$db = mysqli_select_db($conn,'test') or die('Error in connecting with DB!!');

//deleting table if already exists
$drop = "DROP TABLE IF EXISTS task";
$qry_drop = mysqli_query($conn , $drop) or die('Error in deleting previous table!!');

//removing the contents of CSV file if already exists 
$file = fopen("task.csv", "w") or die('Error in Opening file for deletion!!');
fclose($file);

//using inbuilt function to load excel file
$excel = PHPExcel_IOFactory::load('Taskinternship.xlsx') or die('Error in opening Excel Sheet!!');

//setting active sheet to the first sheet
$excel->setActiveSheetIndex(0);

//initiating row of the excel sheet
$i = 1;

//loop until we have data in the first column that is "A"
while($excel->getActiveSheet()->getCell('A'.$i)->getValue() != "")
{
		$col_1  = $excel->getActiveSheet()->getCell('A'.$i)->getValue();
		$col_2  = $excel->getActiveSheet()->getCell('B'.$i)->getValue();
		$col_3  = $excel->getActiveSheet()->getCell('C'.$i)->getValue();
		$col_4  = $excel->getActiveSheet()->getCell('D'.$i)->getValue();
		$col_5  = $excel->getActiveSheet()->getCell('E'.$i)->getValue();
		$col_6  = $excel->getActiveSheet()->getCell('F'.$i)->getValue();
		$col_7  = $excel->getActiveSheet()->getCell('G'.$i)->getValue();
		$col_8  = $excel->getActiveSheet()->getCell('H'.$i)->getValue();
		$col_9  = $excel->getActiveSheet()->getCell('I'.$i)->getValue();
		$col_10 = $excel->getActiveSheet()->getCell('J'.$i)->getValue();
		
/* This is to show data on webpage
		echo("<table border = '1'>");
		echo('<tr>
				<td>'.$col_1.'</td>
				<td>'.$col_2.'</td>
				<td>'.$col_3.'</td>
				<td>'.$col_4.'</td>
				<td>'.$col_5.'</td>
				<td>'.$col_6.'</td>
				<td>'.$col_7.'</td>
				<td>'.$col_8.'</td>
				<td>'.$col_9.'</td>
				<td>'.$col_10.'</td>
			</tr>');
		echo("</table>");

*/
		//query for creating a table in MySQL if it does not exists
		$create = 'CREATE  TABLE IF NOT EXISTS task('
		.$col_1.'  VARCHAR(20),'
		.$col_2.'  VARCHAR(20),'
		.$col_3.'  VARCHAR(250),'
		.$col_4.'  INT(10),'
		.$col_5.'  VARCHAR(20),'
		.$col_6.'  INT(10),'
		.$col_7.'  INT(10),'
		.$col_8.'  INT(10),'
		.$col_9.'  VARCHAR(20),'
		.$col_10.' VARCHAR(20))';
		
		//query for inserting data into tables fields
		$insert = "INSERT INTO task VALUES('$col_1','$col_2','$col_3','$col_4','$col_5','$col_6','$col_7','$col_8','$col_9','$col_10')";
		
		//for first row we will name the fields of table with that of the fields of excel sheet
		//one thing to be noted, the first row in excel sheet that decides the field of MySQL table should not contain any white spaces, but we can use underscore
		if( $i == 1)
		{
			//executing query for creating table(for first row only)
			$qry_create = mysqli_query($conn , $create) or die('Error in creating table!!');
			
			//success message
			if($qry_create)
			{
				echo('Table created successfully!!
				<br>');
			}
		}
		//for entering data in the rows and columns
		else
		{
			//executing query for entering data in rows and columns
			$qry_insert = mysqli_query($conn , $insert) or die('Error in inserting values in table!!');
			
			//success message
			if($qry_insert)
			{
				echo('Row '.($i-1).' inserted successfully!!
				<br>');
			}
		}
		
		//array for entering data into CSV file
		$list = array(
					array($col_1, $col_2, $col_3, $col_4, $col_5, $col_6, $col_7, $col_8, $col_9, $col_10) 
					);
		
		//opening the file with append attribute as we need to add data after every iteration
		$file = fopen('task.csv', 'a');
		
		//iterating over every row
		foreach ($list as $fields)
		{
			fputcsv($file, $fields) or die('Error in inserting data into CSV file!!');
		}
		
		//incrementing the row
		$i++;
		
}

//closing file
fclose($file);

//closing the database connection
mysqli_close($conn);

?>
