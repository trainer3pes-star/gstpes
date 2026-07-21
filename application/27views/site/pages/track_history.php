<div class="row">
	<div class="col-md-12" style="overflow: auto;">
		 	<table class="table">
			<thead><tr> 
				<th style="text-align: center;">#</th>
				<th style="text-align: center;">Comment</th>  
				<th style="text-align: center;">On Date</th> 
				</tr>
			</thead>
			 <?php
$j=1;			 
			foreach($results as $result){   ?>
				 <tr>
				 <td><?php echo $j++;?></td>
				 <td><?php echo $result->comment;?></td>
				 <td><?php echo date(DISPLAY_DATE_TIME,strtotime($result->comment_date));?></td>
				 </tr>
			<?php } ?> 
			 
		 </table>
		   
	</div>
</div>