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
            <h4>Package</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card <?php if(!isset($update)){ echo 'collapsed-card'; } ?> card-default">
              <div class="card-header">
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Package</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } ?>
                </div>
              </div>
              <!--  -->
              <div class="card-body px-0 py-0" <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                <form class="input_form m-0" id="form_action" role="form" action="" method="post" enctype="multipart/form-data">
                  <div class="row p-4">
                    <div class="col-md-6 pl-0">
                      <div class="row">
                        <div class="form-group col-md-12 select_sm">
                          <label>Select Type</label>
                          <select class="form-control select2 form-control-sm" name="package_type" id="package_type" data-placeholder="Select Type" required>
                            <option value="">Select Type</option>
                            <option value="1" <?php if(isset($package_info) && $package_info['package_type'] == '1'){ echo 'selected'; } ?>>Product</option>
                            <option value="2" <?php if(isset($package_info) && $package_info['package_type'] == '2'){ echo 'selected'; } ?>>Service</option>
                          </select>
                        </div>
                        <div class="form-group col-md-12">
                          <label>Package Name</label>
                          <input type="text" class="form-control form-control-sm" name="package_name" id="package_name" value="<?php if(isset($package_info)){ echo $package_info['package_name']; } ?>"  placeholder="Enter Package Name" required >
                        </div>

                        <!-- <div class="form-group col-md-6 select_sm">
                          <label>Package for Employee</label>
                          <select class="form-control select2 form-control-sm" name="employee_id" id="employee_id" data-placeholder="Select Employee" required>
                            <option value="">Select Employee</option>
                            <option value="1" <?php if(isset($package_info) && $package_info['employee_id'] == '1'){ echo 'selected'; } ?>>Employee 1</option>
                            <option value="2" <?php if(isset($package_info) && $package_info['employee_id'] == '2'){ echo 'selected'; } ?>>Employee 2</option>
                          </select>
                        </div> -->
                        <div class="form-group col-md-12 select_sm">
                          <label>Validity</label>
                          <select class="form-control select2 form-control-sm" name="package_validitty" id="package_validitty" data-placeholder="Select Validity" required>
                            <option value="">Validity</option>
                            <option value="30" <?php if(isset($package_info) && $package_info['package_validitty'] == '30'){ echo 'selected'; } ?>>30 Days</option>
                            <option value="60" <?php if(isset($package_info) && $package_info['package_validitty'] == '60'){ echo 'selected'; } ?>>60 Days</option>
                            <option value="90" <?php if(isset($package_info) && $package_info['package_validitty'] == '90'){ echo 'selected'; } ?>>90 Days</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Cost</label>
                          <input type="text" min="0" class="form-control form-control-sm" name="package_cost" id="package_cost" value="<?php if(isset($package_info)){ echo $package_info['package_cost']; } ?>" placeholder="Enter Package Cost" required >
                        </div>
                        <div class="form-group col-md-6 select_sm">
                          <label>GST Slab</label>
                          <label>Select GST</label>
                          <select class="form-control select2" name="gst_slab_id" id="gst_slab_id" data-placeholder="Select GST" required>
                            <option value="">Select GST</option>
                            <?php if(isset($gst_slab_list)){ foreach ($gst_slab_list as $list) { ?>
                            <option value="<?php echo $list->gst_slab_id; ?>" <?php if(isset($package_info) && $package_info['gst_slab_id'] == $list->gst_slab_id){ echo 'selected'; } ?>><?php echo $list->gst_slab_name; ?></option>
                            <?php } } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Package Image</label>
                          <input type="file" class="form-control form-control-sm" name="package_image" id="package_image">
                        </div>
                        <?php if(isset($package_info) && $package_info['package_image']){ ?>
                          <div class="form-group col-md-6">
                            <label>Package Image</label><br>
                            <input type="hidden" name="old_package_image" value="<?php echo $package_info['package_image']; ?>">
                            <img width="200px" src="<?php echo base_url(); ?>assets/images/package/<?php echo $package_info['package_image']; ?>" alt="">
                          </div>
                        <?php } ?>
                      </div>


                    </div>
                    <div class="col-md-6 pr-0">
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label>Discription</label>
                          <textarea class="textarea form-control form-control-sm" rows="3" name="package_descr" id="package_descr" placeholder="Enter Discription" required><?php if(isset($package_info)){ echo $package_info['package_descr']; } ?></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-12">
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                          <label>Package Feature</label>
                        </div>
                        <div class="col-md-6 text-right">
                          <button type="button" id="add_row" class="btn btn-sm btn-info mb-3 mr-1" width="150px">Add Row</button>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="" style="overflow-x:auto;">
                        <table id="myTable" class="table table-bordered tbl_list">
                          <thead>
                          <tr>
                            <th class="wt_250">Name</th>
                            <th>Description</th>
                            <th class="wt_50"></th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php if(isset($package_feature_list)){ $i = 0; foreach ($package_feature_list as $list) { ?>
                              <input type="hidden" name="input[<?php echo $i; ?>][package_feature_id]" value="<?php echo $list->package_feature_id; ?>">
                              <tr>
                                <td  class="wt_250">
                                  <input type="text" class="form-control form-control-sm" name="input[<?php echo $i; ?>][package_feature_name]" value="<?php echo $list->package_feature_name; ?>" required>
                                </td>
                                <td>
                                  <input type="text"  class="form-control form-control-sm" name="input[<?php echo $i; ?>][package_feature_descr]" value="<?php echo $list->package_feature_descr; ?>" required>
                                </td>
                                <td class="wt_50"><?php if($i > 0){ ?><a class="rem_row"><i class="fa fa-trash text-danger"></i></a><?php } ?></td>
                              </tr>
                            <?php $i++;  } } else{ ?>
                              <tr>
                                <td class="wt_250">
                                  <input type="text" class="form-control form-control-sm" name="input[0][package_feature_name]" required>
                                </td>
                                <td>
                                  <input type="text"  class="form-control form-control-sm" name="input[0][package_feature_descr]" required>
                                </td>
                                <td class="wt_50"></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>


                  </div>
                  <div class="card-footer clearfix" style="display: block;">
                    <div class="row">
                      <div class="col-md-6 text-left">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="package_status" id="package_status" value="0" <?php if(isset($package_info) && $package_info['package_status'] == 0){ echo 'checked'; } ?>>
                          <label for="package_status" class="custom-control-label">Disable This Package</label>
                        </div>
                      </div>
                      <div class="col-md-6 text-right">
                        <a href="<?php base_url(); ?>Project/package" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
                        <?php if(isset($update)){
                          echo '<button class="btn btn-sm btn-primary float-right px-4">Update</button>';
                        } else{
                          echo '<button type="submit" class="btn btn-sm btn-success float-right px-4">Save</button>';
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
              <div class="card-header border-transparent">
                <h3 class="card-title">List All Package</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Package Name</th>
                    <th class="wt_50">Validity</th>
                    <th class="wt_50">Cost</th>
                    <th class="wt_50">Image</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($package_list)){
                      $i=0; foreach ($package_list as $list) { $i++;
                        // $city_info = $this->Master_Model->get_info_arr_fields3('city_name', '', 'city_id', $list->city_id, '', '', '', '', 'city');
                    ?>
                      <tr>
                        <td class="d-none"><?php echo $i; ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="<?php echo base_url() ?>Project/edit_package/<?php echo $list->package_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                            <a href="<?php echo base_url() ?>Project/delete_package/<?php echo $list->package_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Package');"><i class="fa fa-trash text-danger"></i></a>
                          </div>
                        </td>
                        <td><?php echo $list->package_name; ?></td>
                        <td><?php echo $list->package_validitty; ?></td>
                        <td><?php echo $list->package_cost; ?></td>
                        <!-- <td><?php if($city_info){ echo $city_info[0]['city_name']; } ?></td> -->
                        <td><img width="50px" src="<?php echo base_url() ?>assets/images/package/<?php echo $list->package_image;  ?>" alt="Package Image">
                        <td>
                          <?php if($list->package_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
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



<!-- <script type="text/javascript">
  $("#package_category_type").on("change", function(){
    var package_category_type =  $('#package_category_type').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>Project/category_by_type',
      type: 'POST',
      data: {"package_category_type":package_category_type},
      context: this,
      success: function(result){
        $('#package_category_id').html(result);
      }
    });
  });
</script> -->

  <script type="text/javascript">
    // Add Row...
    <?php if(isset($update)){ ?>
    var i = <?php echo $i-1; ?>
    <?php } else { ?>
    var i = 0;
    <?php } ?>

    $('#add_row').click(function(){
      i++;
      var row = ''+
      '<tr>'+
        '<td class="wt_250">'+
          '<input type="text" class="form-control form-control-sm" name="input['+i+'][package_feature_name]" required>'+
        '</td>'+
        '<td>'+
          '<input type="text" class="form-control form-control-sm" name="input['+i+'][package_feature_descr]" placeholder="" required>'+
        '</td>'+
        '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
      '</tr>';
      $('#myTable').append(row);
    });

    $('#myTable').on('click', '.rem_row', function () {
      $(this).closest('tr').remove();
    });
  </script>
