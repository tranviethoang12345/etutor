<?php
    include '../Connection/Connection.php';
	if(isset($_GET['id'])){
		$id= $_GET['id'];
		$sql = ConnectToDatabase("SELECT student_id from classrooms WHERE tutor_id = $id"); 
        
             } 

?>

<html>
 <head>
  <title>view Interactive statistics</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="http://code.highcharttable.org/2.0.0/jquery.highchartTable.js"></script> 
  <script src="http://highcharttable.org/js/highcharts.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">View Interactive statistics</h3>
   <br />
   
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="for_chart">
     <thead>
      <tr>
       <th width="20%">Name Student</th>
       <th width="40%">Upload</th>
       <th width="40%">Communication</th>
      </tr>
     </thead>
     <?php
     		 if ($sql->num_rows > 0) {
             $studen =  $sql->fetch_all(MYSQLI_ASSOC);
              foreach($studen as $row) {
				$S= $row['student_id'];
                    $th= ConnectToDatabase("SELECT s.id as id, s.fullname as fullname, (SELECT Count(*) from files where idStudent = $S  and timestamp >= CURRENT_TIMESTAMP() - INTERVAL 7 DAY group by idStudent) as total_upload, (SELECT COUNT(*) FROM chat_message  where from_user_id = $S and timestamp >= CURRENT_TIMESTAMP() - INTERVAL 7 DAY group by from_user_id) as total_chat from student_information as s
						left join files as f on s.id = f.idStudent
						left join chat_message as c on s.id = c.from_user_id
						where s.id = $S
						group by s.id");
                     foreach($th as $row) {

                    	echo '
                    	<tr>
						       <td>'.$row["fullname"].'</td>
						       <td>'.$row["total_upload"].'</td>
						       <td>'.$row["total_chat"].'</td>
						  </tr>
						  ';

                    	
                    }
                  }

  }
     ?>
    </table>
   </div>
   <br />
   <div id="chart_area" id="Student Admission & Passout Details">

   </div>
   <br />
   <div align="center">
    <button type="button" name="view_chart" id="view_chart" class="btn btn-info btn-lg">View Data in Chart</button>

   </div>
   <button type="button" onclick="back()"  class="btn btn-info btn-lg">back</button>

  <script>
      function back(){
          history.back();
      }
  </script>
   <br />
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
  
 $('#chart_area').dialog({
  autoOpen: false,
  width: 1000,
  height:500
 });

 $('#view_chart').click(function(){
  $('#for_chart').data('graph-container', '#chart_area');
  $('#for_chart').data('graph-type', 'column');
  $('#chart_area').dialog('open');
  $('#for_chart').highchartTable();
 });

});
</script>