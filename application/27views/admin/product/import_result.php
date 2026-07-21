 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"> 
			 <li class="breadcrumb-item"><a href="Home"><?php echo $this->lang->line('dashboard_page_title');?></a></li>
              <li class="breadcrumb-item active"><?php echo $page_title;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
 
<div class="row">
      <!-- Default box -->
    <div class="col-md-12">
	<div class="card">
      
        <div class="card-body" style="overflow-x: auto;">
           <table id="example_php" class="table table-bordered table-striped col-xs-12" >
								<thead>
									<tr >
										<th>#  </th>
										<th>  Status</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach(@$results as $result){ ?>
									<tr   >
										<td><?php echo ($search['no_of_records']*$search['pagi_number'])+$i++ ; ?>
										 
										</td>
										<td><?php echo $result->importmsg;?></td>
										 
										 
									</tr>
									<?php } ?>
								</tbody>
								 
							</table>
							
        </div>
        <!-- /.card-body -->
        
      </div>
	</div>
</div>
    </form> </section>
    <!-- /.content -->
  </div>
 