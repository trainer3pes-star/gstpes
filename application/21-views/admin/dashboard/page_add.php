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
			  <li class="breadcrumb-item"><a href="Home/pages-list"><?php echo $this->lang->line('menu_page_list');?></a></li>
              <li class="breadcrumb-item active"><?php echo $page_title;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
	 <div class="col-md-12">
<div class="alert alert-danger alert-dismissible"  <?php if(@strlen($this->session->flashdata('errorsmsg'))){?> style="display:block" <?php }else{?> style="display:none" <?php } ?>>
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> <?php echo $this->lang->line('common_error');?> !</h5>
                 <?php echo $this->session->flashdata('errorsmsg') ?> 
                </div>
				<div class="alert alert-success alert-dismissible" <?php if(@strlen($this->session->flashdata('successmsg'))){?> style="display:block" <?php }else{?> style="display:none" <?php } ?>>
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i><?php echo $this->lang->line('common_success');?> ! </h5>
                  <?php echo $this->session->flashdata('successmsg') ?> 
                </div>
                </div>
<div class="row">
      <!-- Default box -->
    <div class="col-md-8">
	<?php echo form_open_multipart('admin/Home/save-page', array('id' => 'master_frrm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
	  <div class="card"> 	   
        <div class="card-header">
          <h3 class="card-title"><?php echo $page_title;?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
           <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('language');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="language_id" id="language_id" class=" form-control select2 " style="width:100%;"  > 
		<?php foreach($languages as $language){?>
			<option value="<?php echo $language->id?>" <?php if($language->id == $result->language_id) echo 'selected="selected"'; ?>><?php echo $language->language_name;?></option>
		<?php } ?>
		</select> 
				   </div>
                </div>
           <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('common_title_label');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input data-id="<?php echo @$result->id?>" data-module="pages" type="text" class="form-control required no_special  set_alais " name="name" id="name" value="<?php echo @$result->name?>">
				   </div>
                </div>
			 <div class="form-group row" style="display:none;">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('common_alias_label');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input data-id="<?php echo @$result->id?>" data-module="pages" type="text" class="form-control   no_special   " readonly name="alias_name" id="alias_name" value="<?php echo @$result->alias_name?>">
				   </div>
                </div> 
			<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('common_content_label');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<textarea  class="form-control required    editor_class "   name="page_body" id="editor1" ><?php echo @$result->page_body?></textarea>
				   </div>
                </div>
			 
			 
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
			<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
			<input type="button" name="save" id="save" value="<?php echo $this->lang->line('common_save_btn');?>" class="btn btn-info btn_validator" data-frm="master_frrm"  style="<?php if(@$result->id){?> width:50%; <?php }else{ ?> width:100%; <?php  } ?>float:left" />
			<?php if(@$result->id){?>
			<a style="float:right;width:40%" class="btn btn-secondary" href="Home/pages-list"><?php echo $this->lang->line('common_close_btn');?></a>
			<?php } ?>
        </div>
        <!-- /.card-footer-->
      </div>
	  </form>
      </div>
	  
	    </div>
	<!-- /.card -->    </section>
    <!-- /.content -->
  </div>
 