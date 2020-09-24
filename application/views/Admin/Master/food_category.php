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
            <h4>Category</h4>
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
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Category</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } else{
                    echo '<a href="'.base_url().'Master/food_category" type="button" class="btn btn-sm btn-outline-info" >Cancel Update</a>';
                  } ?>
                </div>
              </div>
              <!--  -->
                <div class="card-body px-0 py-0 " <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="row p-4">
                      <div class="form-group col-md-12 select_sm">
                        <label>Select Primary Category</label>
                        <select class="form-control select2 form-control-sm" name="main_food_category_id" id="main_food_category_id" data-placeholder="Select Primary Category" required>
                          <option value="">Select Primary Category</option>
                          <option value="0" <?php if(isset($food_category_info) && $food_category_info['main_food_category_id'] == 0){ echo 'selected'; } ?>>Set As Primary</option>
                          <?php if(isset($main_food_category_list)){
                            foreach ($main_food_category_list as $list) { ?>
                              <option value="<?php echo $list->food_category_id; ?>" <?php if(isset($food_category_info) && $food_category_info['main_food_category_id'] == $list->food_category_id){ echo 'selected'; } ?>
                                <?php if(isset($food_category_info) && $food_category_info['food_category_id'] == $list->food_category_id){ echo 'disabled'; } if($list->food_category_id == 0){ echo 'disabled'; } ?>

                                ><?php echo $list->food_category_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-12 ">
                        <label>Enter Category Name</label>
                        <input type="text" class="form-control form-control-sm" name="food_category_name" id="food_category_name" value="<?php if(isset($food_category_info)){ echo $food_category_info['food_category_name']; } ?>" placeholder="Enter Category Name" required>
                      </div>
                      <div class="form-group col-md-12 ">
                        <label>Enter Category Description</label>
                        <textarea class="form-control form-control-sm" name="food_category_descr" id="food_category_descr"  rows="5" required><?php if(isset($food_category_info)){ echo $food_category_info['food_category_descr']; } ?></textarea>
                        <!-- <input type="text" class="form-control form-control-sm" name="food_category_name" id="food_category_name" value="<?php if(isset($food_category_info)){ echo $food_category_info['food_category_name']; } ?>" placeholder="Enter Category Name" required> -->
                      </div>

                      <div class="form-group col-md-4">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="food_category_offer" id="food_category_offer" value="1" <?php if(isset($food_category_info) && $food_category_info['food_category_offer'] == 1){ echo 'checked'; } ?>>
                          <label for="food_category_offer" class="custom-control-label">Is Offer</label>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Offer Start Date</label>
                        <input type="text" class="form-control form-control-sm" name="food_category_offer_start" value="<?php if(isset($food_category_info)){ echo $food_category_info['food_category_offer_start']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Offer Start Date" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Offer End Date</label>
                        <input type="text" class="form-control form-control-sm" name="food_category_offer_end" value="<?php if(isset($food_category_info)){ echo $food_category_info['food_category_offer_end']; } ?>" id="date2" data-target="#date2" data-toggle="datetimepicker" placeholder="Offer End Date" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Category Image</label>
                        <input type="file" class="form-control form-control-sm" name="food_category_image" id="food_category_image" >
                      </div>
                      <div class="form-group col-md-6">
                        <?php if(isset($food_category_info) && $food_category_info['food_category_image']){ ?>
                          <label>Uploaded Category Image</label><br>
                          <img width="200px" src="<?php echo base_url() ?>assets/images/food_category/<?php echo $food_category_info['food_category_image'];  ?>" alt="Category Image">
                          <input type="hidden" name="old_food_category_img" value="<?php echo $food_category_info['food_category_image']; ?>">
                        <?php } ?>
                      </div>
                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="food_category_status" id="food_category_status" value="0" <?php if(isset($food_category_info) && $food_category_info['food_category_status'] == 0){ echo 'checked'; } ?>>
                            <label for="food_category_status" class="custom-control-label">Disable This Category</label>
                          </div>
                        </div>
                        <div class="col-md-6 text-right">
                          <a href="<?php base_url(); ?>Product/food_category" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
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
                <h3 class="card-title">List All Category Information</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Category Name</th>
                    <th class="wt_75">Type</th>
                    <th class="wt_50">Image</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($food_category_list)){
                     $i=0; foreach ($food_category_list as $list) { $i++;
                       $cnt = $this->Master_Model->get_count('food_category_id ','','main_food_category_id',$list->food_category_id,'','','','','rest_food_category');
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Master/edit_food_category/<?php echo $list->food_category_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <?php if($cnt == 0){ ?>
                          <a href="<?php echo base_url() ?>Master/delete_food_category/<?php echo $list->food_category_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Category Information');"><i class="fa fa-trash text-danger"></i></a>
                          <?php } ?>
                        </div>
                      </td>
                      <td><?php echo $list->food_category_name; ?></td>
                      <td>
                        <?php if($list->is_primary == 0){ echo '<span class="text-info">Sub-Category</span>'; }
                          else{ echo '<span class="text-primary">Main-Category</span>'; } ?>
                      </td>
                      <td><img width="50px" src="<?php echo base_url() ?>assets/images/food_category/<?php echo $list->food_category_image;  ?>" alt="Category Image">
                      <td>
                        <?php if($list->food_category_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
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
