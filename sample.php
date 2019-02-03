<?php
session_start();
//error_reporting(0);
include('include/config.php');
?>

<html><body>


<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">List<span class="text-bold">Patients</span></h5>
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-hover" id="sample-table-1">
									<thead>
											<tr>
							<th class="center">#</th>
							<th>Name</th>
							<th>Age</th>
                            <th>Blood</th>
                            <th>City</th>
                            <th>Doctor</th>
                            <th>Disease</th>		
											</tr>
										</thead>
										<tbody>
<?php
$sql=mysqli_query($con,"select memo from notice");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

										
<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs">
                                                   
												<td><?php echo $row['memo'];?></td>
											</tr>
											
											<?php 
$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>
								</div>
							</div>
    
    
    </body></html>