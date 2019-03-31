
 <?php
 require 'dbconnect.php';

 session_start();
 if($_GET['uid'])
 {
    $uid=$_GET['uid'];
   
 if(isset($_POST['btn_comment'])) {
    
$uid=$_GET['uid'];
  $comment=$_POST['Comment'];
 $user=$_SESSION['log-user'];
 $date=date('Y-m-d H:i:s');
 $qry="INSERT INTO answer VALUES('','$uid','$comment',' $user','$date')";
 
 if(!$conn->query($qry))
 {
     die("Error : ". $conn->error);
 }

 }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Community forum</title>
 
  
  <?php include('includepasttimecss.php');?>
  <?php include('css.php');?>
 
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
 

<body>


	<?php include('homesprite.php');?>
<?php
require 'dbconnect.php';
if(isset($_GET['uid']))
{

    $uid=$_GET['uid'];
    $qry_row="SELECT * FROM question WHERE q_id='$uid' ";
    $res_row=$conn->query($qry_row);
   
   


foreach($res_row as $data_row)
{
	?>
  <div class="container">
	<div class="row forum-title-container">
		<div class="col-md-9">
			<span class="forum-title text-primary">Question</span>
		</div>
		<div class="col-md-3">
			<span class="forum-cat">Member feedback</span>
		</div>
	</div>
	<div class="row forum-description">
		<div class="col-md-3" >
			<span><b>Posted By:<?php echo $data_row['User'];?></b></span>
			<div class="text-muted small"><?php echo $data_row['Postdate'];?></div>
		</div>
		<div class="col-md-9">
			<div class="row  forum-message">
				<div class="col-md-12" id="forum-question">
					<?php
					echo $data_row['Question']; 
					?>
				</div>
			</div>
        <?php
         $qry_row="SELECT * FROM answer WHERE que_id='$uid'";
         $data=$conn->query($qry_row);
         foreach($data as $res_row)
         {
        ?>
        	<div class="row  forum-message" id="forum-message">
						<div class="col-md-12" id="forum-answer">					
							<div class="reply-comment" style="font-family:bold; font-size:20px;">
								<?php echo $res_row['answer'];?>
							</div>
							<div>
								<span class="reply-user"> reply by:<?php echo $res_row['User'];?></span> <span class="text-muted reply-date"><?php echo $res_row['Cdate'];?></span>
							</div>
						</div>
					</div>
                    <?php
         }
                    ?>
                    <div class="row forum-comment">
                    <div class="col-md-12">
					<form method="post">
						
						<div class="form-group">							
							<textarea class="form-control" id="commenttext" name="Comment" placeholder="Comment here" ></textarea>
						</div>
						<div class="input-group">
							<button type="submit" class="btn btn-primary" name="btn_comment">Post</button>									
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
  </div>
				
            <?php
         
}

}
            ?>

</body>
</html>