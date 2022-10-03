<?php
    require_once "conn.php";

    $filename = 'TRANSRECORDCICT-'.date('y-m-d').'.csv';
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);

    $array = array();

    $file = fopen($filename, 'w');

    $array = array('Reciept #', 'Date', 'First Name', 'Last Name', 'Item', 'Claim Status', 'Paid Status', 'Year/Section');
    fputcsv($file, $array);

    while($row = mysqli_fetch_array($result)){
        $reciept = $row['reciept'];
        $date = $row['date'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $item = $row['item'];
        $claimstatus = $row['claimstatus'];
        $paidstatus = $row['paidstatus'];
        $yearsection = $row['yearsection'];

        $array = array($reciept, $date, $firstname, $lastname, $item, $claimstatus, $paidstatus, $yearsection);
        fputcsv($file, $array);


    }
    fclose($file);

    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename='.$filename);
    header('Content-Type: application/csv;');
    readfile($filename);
    unlink($filename);
    exit;
    

?>