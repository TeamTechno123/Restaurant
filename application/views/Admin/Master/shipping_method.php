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
            <h4>Shipping Method</h4>
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
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Shipping Method</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } else{
                    echo '<a href="'.base_url().'Master/shipping_method" type="button" class="btn btn-sm btn-outline-info" >Cancel Update</a>';
                  } ?>
                </div>
              </div>
              <!--  -->
                <div class="card-body p-0 " <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="row p-4">
                      <div class="form-group col-md-12 ">
                        <label>Enter Shipping Method Name</label>
                        <input type="text" class="form-control form-control-sm" name="shipping_method_name" id="shipping_method_name" value="<?php if(isset($shipping_method_info)){ echo $shipping_method_info['shipping_method_name']; } ?>" placeholder="Enter Shipping Method Name" required>
                      </div>
                      <div class="form-group col-md-6 ">
                        <label>Shipping Rate</label>
                        <input type="number" class="form-control form-control-sm" name="shipping_method_rate" id="shipping_method_rate" value="<?php if(isset($shipping_method_info)){ echo $shipping_method_info['shipping_method_rate']; } ?>" placeholder="Enter Shipping Rate" required>
                      </div>
                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="shipping_method_status" id="shipping_method_status" value="0" <?php if(isset($shipping_method_info) && $shipping_method_info['shipping_method_status'] == 0){ echo 'checked'; } ?>>
                            <label for="shipping_method_status" class="custom-control-label">Disable This Shipping Method</label>
                          </div>
                        </div>
                        <div class="col-md-6 text-right">
                          <a href="<?php base_url(); ?>Product/shipping_method" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
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
                <h3 class="card-title">List All Shipping Method Information</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Shipping Method Name</th>
                    <th class="wt_50">Shipping Rate</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($shipping_method_list)){
                     $i=0; foreach ($shipping_method_list as $list) { $i++;
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-shipping_method">
                          <a href="<?php echo base_url() ?>Master/edit_shipping_method/<?php echo $list->shipping_method_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Master/delete_shipping_method/<?php echo $list->shipping_method_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Shipping Method Information');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td><?php echo $list->shipping_method_name; ?></td>
                      <td><?php echo $list->shipping_method_rate; ?></td>
                      <td>
                        <?php if($list->shipping_method_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
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
