<?php

	require'PHPMailer/PHPMailerAutoload.php';
	require 'vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	$mail = new PHPmailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '465';
	$mail->isHTML();
  $user = 'root';
  $password = ''; 
  $server = 'localhost';
  $database = 'excel';
  $pdo = new PDO("mysql:host=$server;dbname=$database", $user, $password);
	if (is_uploaded_file ($_FILES['attachment1']['tmp_name'])) {
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($_FILES['attachment1']['tmp_name']);
      $reader->setReadDataOnly(TRUE);
      $spreadsheet = $reader->load($_FILES['attachment1']['tmp_name']);
      $worksheet = $spreadsheet->getActiveSheet();    
          $highestRow = $worksheet->getHighestRow(); 
          $highestColumn = $worksheet->getHighestColumn(); 
          $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); 
          $row_names=8;
          $col_constant = 1;          
     for ($row_indention=9  ; $row_indention <= $highestRow; $row_indention++ ){
            unset($tempoutput);
            $tempoutput = "";
            $row_constant = 7; 
            $row_names++;
            $row_constant2 = 8;
            $value2 = "";
            $increment = 1;
            $names = $worksheet->getCellByColumnAndRow(2, $row_indention)->getCalculatedValue();
            $sql = "SELECT `excel_id`, `excel_name`, `excel_email` FROM `excel` WHERE `excel_name` = :excel_name";
            $statement = $pdo->prepare($sql);
            $excel_name = $names;
            $statement->bindValue(':excel_name', $excel_name);
            $statement->execute();
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach($rows as $row){
                $GmailAdd = $row['excel_email'];
                $mail->AddAddress($GmailAdd); }

            // $value2 = $worksheet->getCellByColumnAndRow($col_grades, $row_constant)->getValue();
            // echo "<script> console.log($value2);</script>";


                  for ($col_grades = 3; $worksheet->getCellByColumnAndRow($col_grades, 6)->getCalculatedValue() != 'Periodic Grade'; $col_grades++) 
              {
                          $value = $worksheet->getCellByColumnAndRow($col_grades, $row_names)->getCalculatedValue();
                          // $col_activities++;
                          $value2 = $worksheet->getCellByColumnAndRow($col_grades, $row_constant)->getCalculatedValue();
                          $items = $worksheet->getCellByColumnAndRow($col_grades, $row_constant2)->getCalculatedValue();                          
                          if (is_null($value)){
                            $value ="MISSING ACTIVITY";
                            $output = $value2. "=" . $value . "\n";
                          }
                          else{ 
                            if ($value2 == "PE"){ 
                            $output = $value2. "=" . $value . " " . "%" . "\n";
                          }
                            elseif($value2 == "WP"){
                            $output = $value2. "=" . $value . " " . "%" . "\n";
                            $increment++;
                          }
                            elseif ($value2 == NULL){
                            $output = NULL;
                          }
                            else {
                            $output = $value2. "=" . $value . "/" . $items . " " . "Points" . "\n";
                          }
                            
                          }                  
                        

                        if ($increment == 1 && $value2 == "WW1"){
                          $tempoutput2 = "Writtern Work (35%):\n";                          
                        }
                        elseif ($increment == 2 && $value2 == "AAT1" ){
                          $tempoutput2 = "\nPerformance Task (40%):\n"; 
                        }
                        elseif ($increment == 3 && $value2 == "Total"){
                          $tempoutput2 = "\nPeriodic Assesment(25%):\n"; 
                        }
                        else{
                          $tempoutput2 = NULL;
                        }
    
                        $tempoutput .= nl2br($tempoutput2 . $output); 
                
              }
                          
                          
                          
              
                $GmailAdd = $worksheet->getCellByColumnAndRow($col_constant, $row_names)->getValue(); 
                // $GmailAdd = getEmail($row_indention);

        $mail->Username = $_POST['Gmail'];
        $mail->Password = $_POST['Password'];
        $mail->SetFrom('viverbungag1@gmail.com');
        $mail->Subject = 'Your Grades';
        $mail->Body = $tempoutput;
        $mail->send();
        $mail->ClearAddresses();
            }
          }
			
	
	
	if(!$mail->send()){
		echo "Message has been sent";
	}
	else{
		echo "Message was not sent!";
	}



// function getEmail($row_check) {
    
//       $output_all = " ";
//       $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($_FILES['attachment2']['tmp_name']);
//       $reader->setReadDataOnly(TRUE);
//       $spreadsheet = $reader->load($_FILES['attachment2']['tmp_name']);
//       $worksheet = $spreadsheet->getActiveSheet();
//       $highestRow = $worksheet->getHighestRow(); 
//       $highestColumn = $worksheet->getHighestColumn(); 
//       $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); 
//         $col_nochange = 2;
//         $col_nochangesecond=1;
//         $row_check-8;
//               $output_gmail = $worksheet->getCellByColumnAndRow($col_nochange, $row_check)->getValue();
 
//       return $output_gmail;


//}



?>

