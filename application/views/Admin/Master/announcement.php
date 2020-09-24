<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pt-0 pb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-left mt-2">
            <h4>Announcement</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card <?php if(!isset($update)){ echo 'collapsed-card'; } ?>">
              <div class="card-header">
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Announcement</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } else{
                    echo '<a href="'.base_url().'Master/announcement" type="button" class="btn btn-sm btn-primary" >Add New</a>';
                  } ?>
                </div>
              </div>
              <!--  -->
                <div class="card-body px-0 py-0 " <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="row p-4">
                      <div class="form-group col-md-12 ">
                        <label>Announcement Title</label>
                        <input type="text" class="form-control form-control-sm" name="announcement_name" id="announcement_name" value="<?php if(isset($announcement_info)){ echo $announcement_info['announcement_name']; } ?>" placeholder="Enter Announcement Title" required>
                      </div>
                      <div class="form-group col-md-12 ">
                        <label>Discription</label>
                        <textarea class="form-control form-control-sm" name="announcement_desc" id="announcement_desc" rows="3" required><?php if(isset($announcement_info)){ echo $announcement_info['announcement_desc']; } ?></textarea>
                      </div>
                      <div class="form-group col-md-4 ">
                        <label>Announcement Date</label>
                        <input type="text" class="form-control form-control-sm" name="announcement_date" value="<?php if(isset($announcement_info)){ echo $announcement_info['announcement_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Enter Announcement Date" required>
                      </div>
                      <div class="form-group col-md-4 ">
                        <label>Announcement Time</label>
                        <input type="text" class="form-control form-control-sm" name="announcement_time" value="<?php if(isset($announcement_info)){ echo $announcement_info['announcement_time']; } ?>" id="time1" data-target="#time1" data-toggle="datetimepicker" placeholder="Enter Announcement Time" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Announcement Image</label>
                        <input type="file" class="form-control form-control-sm" name="announcement_image" id="announcement_image" >
                      </div>
                      <div class="form-group col-md-6">
                        <?php if(isset($announcement_info) && $announcement_info['announcement_image']){ ?>
                          <label>Uploaded Announcement Image</label><br>
                          <img width="200px" src="<?php echo base_url() ?>assets/images/announcement/<?php echo $announcement_info['announcement_image'];  ?>" alt="Slider Image">
                          <input type="hidden" name="old_announcement_img" value="<?php echo $announcement_info['announcement_image']; ?>">
                        <?php } ?>
                      </div>
                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="announcement_status" id="announcement_status" value="0" <?php if(isset($announcement_info) && $announcement_info['announcement_status'] == 0){ echo 'checked'; } ?>>
                            <label for="announcement_status" class="custom-control-label">Disable This Announcement</label>
                          </div>
                        </div>
                        <div class="col-md-6 text-right">
                          <a href="<?php base_url(); ?>Master/announcement" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
                          <?php if(isset($update)){
                            echo '<button class="btn btn-sm btn-primary float-right px-4">Update</button>';
                          } else{
                            echo '<button class="btn btn-sm btn-success float-right px-4">Save</button>';
                          } ?>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>


          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List All Announcement Information</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Announcement Title</th>
                    <th class="wt_75">Date</th>
                    <th class="wt_50">Time</th>
                    <th class="wt_50">Image</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($announcement_list)){
                      $i=0; foreach ($announcement_list as $list) { $i++;
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Master/edit_announcement/<?php echo $list->announcement_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Master/delete_announcement/<?php echo $list->announcement_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Announcement Information');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td><?php echo $list->announcement_name; ?></td>
                      <td><?php echo $list->announcement_date; ?></td>
                      <td><?php echo $list->announcement_time; ?></td>
                      <td class="text-center"><img height="50px" src="<?php echo base_url() ?>assets/images/announcement/<?php echo $list->announcement_image;  ?>" alt="Announcement Image">
                      <td>
                        <?php if($list->announcement_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
                          else{ echo '<span class="text-success">Active</span>'; } ?>
                      </td>
                    </tr>
                  <?php } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>

</body>
</html>
