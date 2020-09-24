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
            <h4>Food</h4>
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
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Food</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } else{
                    echo '<a href="'.base_url().'Master/food" type="button" class="btn btn-sm btn-outline-info" >Cancel Update</a>';
                  } ?>
                </div>
              </div>
              <!--  -->
                <div class="card-body px-0 py-0 " <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="row p-4">
                      <div class="col-md-6">
                        <div class="row">
                          <div class="form-group col-md-6 select_sm">
                            <label>Select Primary Category</label>
                            <select class="form-control select2 form-control-sm" name="main_food_category_id" id="main_food_category_id" data-placeholder="Select Primary Category" required>
                              <option value="">Select Primary Category</option>
                              <?php if(isset($main_food_category_list)){
                                foreach ($main_food_category_list as $list) { ?>
                                  <option value="<?php echo $list->main_food_category_id; ?>" <?php if(isset($food_info) && $food_info['main_food_category_id'] == $list->food_category_id){ echo 'selected'; } if($list->food_category_id == 0){ echo 'disabled'; } ?>><?php echo $list->food_category_name; ?></option>
                              <?php } } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-6 select_sm">
                            <label>Select Sub Category</label>
                            <select class="form-control select2 form-control-sm" name="sub_food_category_id" id="sub_food_category_id" data-placeholder="Select Sub Category" required>
                              <option value="">Select Sub Category</option>
                              <?php if(isset($sub_food_category_list)){
                                foreach ($sub_food_category_list as $list) { ?>
                                  <option value="<?php echo $list->sub_food_category_id; ?>" <?php if(isset($food_info) && $food_info['sub_food_category_id'] == $list->food_category_id){ echo 'selected'; } if($list->food_category_id == 0){ echo 'disabled'; } ?>><?php echo $list->food_category_name; ?></option>
                              <?php } } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-12 ">
                            <label>Food Name</label>
                            <input type="text" class="form-control form-control-sm" name="food_name" id="food_name" value="<?php if(isset($food_info)){ echo $food_info['food_name']; } ?>" placeholder="Enter Food Name" required>
                          </div>
                          <div class="form-group col-md-12 ">
                            <label>Component</label>
                            <input type="text" class="form-control form-control-sm" name="food_component" id="food_component" value="<?php if(isset($food_info)){ echo $food_info['food_component']; } ?>" placeholder="Enter Component" required>
                          </div>
                          <div class="form-group col-md-6">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" name="food_offer" id="food_offer" value="1" <?php if(isset($food_info) && $food_info['food_offer'] == 1){ echo 'checked'; } ?>>
                              <label for="food_offer" class="custom-control-label">Is Offer</label>
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" name="food_special" id="food_special" value="1" <?php if(isset($food_info) && $food_info['food_special'] == 1){ echo 'checked'; } ?>>
                              <label for="food_special" class="custom-control-label">Is Special</label>
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Offer Start Date</label>
                            <input type="text" class="form-control form-control-sm" name="food_offer_start" value="<?php if(isset($food_info)){ echo $food_info['food_offer_start']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Offer Start Date" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Offer End Date</label>
                            <input type="text" class="form-control form-control-sm" name="food_offer_end" value="<?php if(isset($food_info)){ echo $food_info['food_offer_end']; } ?>" id="date2" data-target="#date2" data-toggle="datetimepicker" placeholder="Offer End Date" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Food Image</label>
                            <input type="file" class="form-control form-control-sm" name="food_image" id="food_image" >
                          </div>
                          <div class="form-group col-md-6">
                            <?php if(isset($food_info) && $food_info['food_image']){ ?>
                              <label>Uploaded Food Image</label><br>
                              <img width="200px" src="<?php echo base_url() ?>assets/images/food/<?php echo $food_info['food_image'];  ?>" alt="Category Image">
                              <input type="hidden" name="old_food_image" value="<?php echo $food_info['food_image']; ?>">
                            <?php } ?>
                          </div>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="form-group col-md-12 ">
                            <label>Enter Food Notes</label>
                            <textarea class="form-control form-control-sm" name="food_notes" id="food_notes"  rows="3" required><?php if(isset($food_info)){ echo $food_info['food_notes']; } ?></textarea>
                          </div>
                          <div class="form-group col-md-12 ">
                            <label>Enter Food Description</label>
                            <textarea class="textarea form-control form-control-sm" name="food_descr" id="food_descr"  rows="5" required><?php if(isset($food_info)){ echo $food_info['food_descr']; } ?></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="form-group col-md-12">
                        <hr>
                        <div class="row">
                          <div class="col-md-6">
                            <label>Food Variant</label>
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
                              <th>Variant Name</th>
                              <th class="wt_250">Price</th>
                              <th class="wt_50"></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($food_variant_list)){ $i = 0; foreach ($food_variant_list as $list) { ?>
                                <input type="hidden" name="input[<?php echo $i; ?>][food_variant_id]" value="<?php echo $list->food_variant_id; ?>">
                                <tr>
                                  <td>
                                    <input type="text" class="form-control form-control-sm" name="input[<?php echo $i; ?>][food_variant_name]" value="<?php echo $list->food_variant_name; ?>" required>
                                  </td>
                                  <td class="wt_250">
                                    <input type="number" min="1" class="form-control form-control-sm" name="input[<?php echo $i; ?>][food_variant_price]" value="<?php echo $list->food_variant_price; ?>" required>
                                  </td>
                                  <td class="wt_50"><?php if($i > 0){ ?><a class="rem_row"><i class="fa fa-trash text-danger"></i></a><?php } ?></td>
                                </tr>
                              <?php $i++;  } } else{ ?>
                                <tr>
                                  <td>
                                    <input type="text" class="form-control form-control-sm" name="input[0][food_variant_name]" required>
                                  </td>
                                  <td class="wt_250">
                                    <input type="number" min="1"  class="form-control form-control-sm" name="input[0][food_variant_price]" required>
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
                            <input class="custom-control-input" type="checkbox" name="food_status" id="food_status" value="0" <?php if(isset($food_info) && $food_info['food_status'] == 0){ echo 'checked'; } ?>>
                            <label for="food_status" class="custom-control-label">Disable This Food</label>
                          </div>
                        </div>
                        <div class="col-md-6 text-right">
                          <a href="<?php base_url(); ?>Product/food" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
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
                <h3 class="card-title">List All Food Information</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Food Name</th>
                    <th class="wt_75">Category</th>
                    <th class="wt_50">Image</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($food_list)){
                     $i=0; foreach ($food_list as $list) { $i++;
                       $cnt = $this->Master_Model->get_count('food_id ','','main_food_category_id',$list->food_id,'','','','','rest_food');
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Master/edit_food/<?php echo $list->food_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <?php if($cnt == 0){ ?>
                          <a href="<?php echo base_url() ?>Master/delete_food/<?php echo $list->food_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Food Information');"><i class="fa fa-trash text-danger"></i></a>
                          <?php } ?>
                        </div>
                      </td>
                      <td><?php echo $list->food_name; ?></td>
                      <td>
                        <?php if($list->is_primary == 0){ echo '<span class="text-info">Sub-Category</span>'; }
                          else{ echo '<span class="text-primary">Main-Category</span>'; } ?>
                      </td>
                      <td><img width="50px" src="<?php echo base_url() ?>assets/images/food/<?php echo $list->food_image;  ?>" alt="Category Image">
                      <td>
                        <?php if($list->food_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
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
      '<td>'+
        '<input type="text" class="form-control form-control-sm" name="input['+i+'][food_variant_name]" required>'+
      '</td>'+
      '<td  class="wt_250">'+
        '<input type="number" min="1" class="form-control form-control-sm" name="input['+i+'][food_variant_price]" placeholder="" required>'+
      '</td>'+
      '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
    '</tr>';
    $('#myTable').append(row);
  });

  $('#myTable').on('click', '.rem_row', function () {
    $(this).closest('tr').remove();
  });
</script>
