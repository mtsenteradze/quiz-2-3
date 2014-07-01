<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src = "notes.js" type="text/javascript"></script>
</head>
<body>


<form id = "form" method="post" action="notes.php">
    <fieldset>
        <legend>Add note</legend>
            <div>
                <textarea name="note" cols="12" rows="4"></textarea>
            </div>
    </fieldset>
<div>
    <button type="submit" name="save">Save</button>
</div>
<div class="table">
    <table  id="table">
        <thread>
            <th></th> <td>ID</td>
            <th></th> <td>Note</td>
            <th></th> <td>Date</td>
            <th></th> <td>Delete</td>
        </thread>
        <tbody>
                    <?php
                        $con=mysqli_connect("localhost","root","","notes");
                        $query = ("SELECT * FROM `note_table`");
                        $data= mysqli_query($con, $query) or die ('error');
                        
                        while( $row = mysqli_fetch_array($data,MYSQLI_ASSOC)){

                        	echo "<tr>"; 
                        	echo "<th></th> <td>".$row['id'] . "</td> "; 
                            echo "<th></th> <td>".$row['note'] . "</td> "; 
                            echo "<th></th> <td>".$row['date'] . " </td>";
                            echo "</tr>";
                        }
                           


                    ?>
                </tbody>
    </table>
</div>

</body>
</html>
