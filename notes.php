<?php
$con=mysqli_connect("localhost","root","","notes");

if ($con){
if (isset($_POST['note'])){
    $note = trim($_POST['note']);
   
    if (!empty($note)){
    
        $date = date('Y-m-d', time());
        $query = "INSERT INTO `note_table` VALUES('','$note', '$date')";
        if (!mysqli_query($con,$query))
            {
            die('Error: ' . mysqli_error($con));
            }
        header("Content_Type: application/json");
        header("HTTP/1.0 201 Created");


	    $response = array(
        'status' => array(
            "message" => "Note created"
        )
    	);
         

     echo json_encode($response, JSON_PRETTY_PRINT);	
	    
	}else{

		header('Content-Type: application/json');
        header('HTTP/1.1 400 Bad Request');

        $response = array(
            'status' => array(
                "message" => "Unable to create note..."
            )
        );

    print json_encode($response, JSON_PRETTY_PRINT);
	}

	if(!empty($_GET)){

    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');

    $con=  mysqli_connect("localhost","root","","notes");
    $query = "SELECT * FROM `note_table`" or die(mysqli_error($con));
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $count = mysqli_num_rows($result);

    $result = array();

    for ($i=0; $i<$count; $i++) {
        $row = mysqli_fetch_row($result);
        $result[] = array(
            "id"    => $row["0"],
            "note"  => $row["1"],
            "date"  => $row["2"]
        );
    }
    print json_encode($result);
}

	}
}
else{
	echo ("connection fail");
	}
	
?>