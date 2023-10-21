<?php 
		$con = mysqli_connect("localhost","root","","attendance_system_db");
		$query = "select * from student_attendance";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($result)
	?>


<!DOCTYPE html>
<html>
<head>
	<title>PHP Practice</title>
</head>
<body>


	<?php 

	if(isset($_POST['Add'])){
		for($a=0;$a<4;$a++){
			$dates = $_POST['dates'][$a];
			$class = $_POST['class'][$a];
			$section = $_POST['section'][$a];
			$class_teacher = $_POST['class_teacher'][$a];
			$student_name = $_POST['student_name'][$a];
			$status = $_POST['status'][$a];
		
		$insert_sql = "insert into student_attendance (dates,class,section,class_teacher,student_name,status) values ('$dates','$class','$section','$class_teacher','$student_name','$status')";
		$result_sql = mysqli_query($con,$insert_sql);
		}
		if($result_sql){
			echo "<script>alert('Data inserted');</script>";

		}else{
			echo "<script>alert('Data not inserted');</script>";
		}
}
	?>
<form action="" method="post">
<table>
	<tr>
		<th>Date</th>
		<th>Class</th>
		<th>Section</th>
		<th>Class Teacher</th>
		<th>Student Name</th>
		<th>Status</th>
	</tr>
	
	<?php for ($i=0; $i <4 ; $i++) { ?>
	
		<tr>
			<td><input type="text" name="dates[]" value="<?php echo $row['dates'] ?>"></td>
			<td><input type="text" name="class[]" value="<?php echo $row['class'] ?>"></td>
			<td><input type="text" name="section[]" value="<?php echo $row['section'] ?>"></td>
			<td><input type="text" name="class_teacher[]" value="<?php echo $row['class_teacher'] ?>"></td>
			<td><input type="text" name="student_name[]" value="<?php echo $row['student_name'] ?>"></td>
			<td><input type="checkbox" name="status[]" value="<?php echo $row['status'] ?>"></td>
		</tr>
	<?php } ?>
	<input type="submit" name="Add" >
</table>
</form>
</body>
</html>