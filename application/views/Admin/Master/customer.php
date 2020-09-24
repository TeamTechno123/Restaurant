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
            <h4>Customer</h4>
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
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Customer</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } ?>
                </div>
              </div>
              <!--  -->
              <div class="card-body p-0" <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                <form class="input_form m-0" id="form_action" role="form" action="" method="post" enctype="multipart/form-data">
                  <div class="row p-4">
                    <div class="form-group col-md-12">
                      <label>Customer Name</label>
                      <input type="text" class="form-control form-control-sm" name="customer_name" id="customer_name" value="<?php if(isset($customer_info)){ echo $customer_info['customer_name']; } ?>"  placeholder="Enter Name of Customer" required >
                    </div>
                    <div class="form-group col-md-12">
                      <label>Address</label>
                      <textarea class="form-control form-control-sm" rows="3" name="customer_address" id="customer_address" placeholder="Enter Company Address" required><?php if(isset($customer_info)){ echo $customer_info['customer_address']; } ?></textarea>
                    </div>
                    <div class="form-group col-md-4 select_sm">
                      <label>Select Country</label>
                      <select class="form-control select2" name="country_id" id="country_id" data-placeholder="Select Country" required>
                        <option value="">Select Country</option>
                        <?php if(isset($country_list)){ foreach ($country_list as $list) { ?>
                        <option value="<?php echo $list->country_id; ?>" <?php if(isset($customer_info) && $customer_info['country_id'] == $list->country_id){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4 select_sm">
                      <label>Select State</label>
                      <select class="form-control select2" name="state_id" id="state_id" data-placeholder="Select State" required>
                        <option value="">Select State</option>
                        <?php if(isset($state_list)){ foreach ($state_list as $list) { ?>
                        <option value="<?php echo $list->state_id; ?>" <?php if(isset($customer_info) && $customer_info['state_id'] == $list->state_id){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4 select_sm">
                      <label>Select City</label>
                      <select class="form-control select2" name="city_id" id="city_id" data-placeholder="Select City" required>
                        <option value="">Select City</option>
                        <?php if(isset($city_list)){ foreach ($city_list as $list) { ?>
                        <option value="<?php echo $list->city_id; ?>" <?php if(isset($customer_info) && $customer_info['city_id'] == $list->city_id){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
                        <?php } } ?>
                      </select>
                    </div>

                    <div class="form-group col-md-4">
                      <label>Mobile No. 1</label>
                      <input type="number" class="form-control form-control-sm" name="customer_mobile" id="customer_mobile" value="<?php if(isset($customer_info)){ echo $customer_info['customer_mobile']; } ?>" placeholder="Mobile No. 1" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Mobile No. 2 / Landline No.</label>
                      <input type="number" class="form-control form-control-sm" name="customer_mobile2" id="customer_mobile2" value="<?php if(isset($customer_info)){ echo $customer_info['customer_mobile2']; } ?>" placeholder="Mobile No. 2">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Email Id</label>
                      <input type="email" class="form-control form-control-sm" name="customer_email" id="customer_email" value="<?php if(isset($customer_info)){ echo $customer_info['customer_email']; } ?>" placeholder="Email" required>
                    </div>
                    <!-- <div class="form-group col-md-4">
                      <label>Website</label>
                      <input type="text" class="form-control form-control-sm" name="customer_website" id="customer_website" value="<?php if(isset($customer_info)){ echo $customer_info['customer_website']; } ?>" placeholder="Website">
                    </div>
                    <div class="form-group col-md-4">
                      <label>PAN No.</label>
                      <input type="text" class="form-control form-control-sm" name="customer_pan_no" id="customer_pan_no" value="<?php if(isset($customer_info)){ echo $customer_info['customer_pan_no']; } ?>" placeholder="Pan No.">
                    </div>
                    <div class="form-group col-md-4">
                      <label>GST No.</label>
                      <input type="text" class="form-control form-control-sm" name="customer_gst_no" id="customer_gst_no" value="<?php if(isset($customer_info)){ echo $customer_info['customer_gst_no']; } ?>" placeholder="GST No.">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Lic No. 1</label>
                      <input type="text" class="form-control form-control-sm" name="customer_lic1" id="customer_lic1" value="<?php if(isset($customer_info)){ echo $customer_info['customer_lic1']; } ?>" placeholder="Enter Lic No. 1">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Lic No. 2</label>
                      <input type="text" class="form-control form-control-sm" name="customer_lic2" id="customer_lic2" value="<?php if(isset($customer_info)){ echo $customer_info['customer_lic2']; } ?>" placeholder="Enter Lic No. 2">
                    </div> -->
                    <!-- <div class="form-group col-md-4">
                      <label>Opening Credit Balance</label>
                      <input type="number" class="form-control form-control-sm" name="customer_op_crd_balance" id="customer_op_crd_balance" value="<?php if(isset($customer_info)){ echo $customer_info['customer_op_crd_balance']; } ?>" placeholder="Enter Opening Credit Balance">
                    </div> -->
                    <div class="form-group col-md-4">
                      <label>Customer Password</label>
                      <input type="password" class="form-control form-control-sm" name="customer_password" id="customer_password" value="<?php if(isset($customer_info)){ echo $customer_info['customer_password']; } ?>" placeholder="Enter Customer Password" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Customer Confirm Password</label>
                      <input type="password" class="form-control form-control-sm" id="customer_c_password" value="<?php if(isset($customer_info)){ echo $customer_info['customer_password']; } ?>" placeholder="Enter Customer Password" required>
                    </div>
                    <div class="form-group col-md-4">
                    </div>

                    <div class="form-group col-md-4">
                      <label>Customer Logo</label>
                      <input type="file" class="form-control form-control-sm" name="customer_logo" id="customer_logo">
                    </div>
                    <?php if(isset($customer_info) && $customer_info['customer_logo']){ ?>
                      <div class="form-group col-md-4">
                        <label>Customer Logo</label><br>
                        <input type="hidden" name="old_customer_logo" value="<?php echo $customer_info['customer_logo']; ?>">
                        <img width="200px" src="<?php echo base_url(); ?>assets/images/customer/<?php echo $customer_info['customer_logo']; ?>" alt="">
                      </div>
                    <?php } ?>



                  </div>
                  <div class="card-footer clearfix" style="display: block;">
                    <div class="row">
                      <div class="col-md-6 text-left">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="customer_status" id="customer_status" value="0" <?php if(isset($customer_info) && $customer_info['customer_status'] == 0){ echo 'checked'; } ?>>
                          <label for="customer_status" class="custom-control-label">Disable This Customer</label>
                        </div>
                      </div>
                      <div class="col-md-6 text-right">
                        <a href="<?php base_url(); ?>Master/customer" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
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
              <div class="card-header border-transparent">
                <h3 class="card-title">List All Customer</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Customer Name</th>
                    <th class="wt_75">Mobile No.</th>
                    <th class="wt_125">Email</th>
                    <th class="wt_100">City</th>
                    <th class="wt_50">Logo</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($customer_list)){
                      $i=0; foreach ($customer_list as $list) { $i++;
                        $city_info = $this->Master_Model->get_info_arr_fields3('city_name', '', 'city_id', $list->city_id, '', '', '', '', 'city');
                    ?>
                      <tr>
                        <td class="d-none"><?php echo $i; ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="<?php echo base_url() ?>Master/edit_customer/<?php echo $list->customer_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                            <a href="<?php echo base_url() ?>Master/delete_customer/<?php echo $list->customer_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Customer');"><i class="fa fa-trash text-danger"></i></a>
                          </div>
                        </td>
                        <td><?php echo $list->customer_name; ?></td>
                        <td><?php echo $list->customer_mobile; ?></td>
                        <td><?php echo $list->customer_email; ?></td>
                        <td><?php if($city_info){ echo $city_info[0]['city_name']; } ?></td>
                        <td><img width="50px" src="<?php echo base_url() ?>assets/images/customer/<?php echo $list->customer_logo;  ?>" alt="Group Image">
                        <td>
                          <?php if($list->customer_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
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
  // Check Mobile Duplication..
  var customer_mobile1 = $('#customer_mobile').val();
  $('#customer_mobile').on('change',function(){
    var customer_mobile = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>Master/check_duplication',
      type: 'POST',
      data: {"column_name":"customer_mobile",
             "column_val":customer_mobile,
             "table_name":"smm_customer"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#customer_mobile').val(customer_mobile1);
          toastr.error(customer_mobile+' Mobile No Exist.');
        }
      }
    });
  });

  // Check Email Duplication..
  var customer_email1 = $('#customer_email').val();
  $('#customer_email').on('change',function(){
    var customer_email = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>Master/check_duplication',
      type: 'POST',
      data: {"column_name":"customer_email",
             "column_val":customer_email,
             "table_name":"smm_customer"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#customer_email').val(customer_email1);
          toastr.error(customer_email+' Email No Exist.');
        }
      }
    });
  });

  $("#country_id").on("change", function(){
    var country_id =  $('#country_id').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>Master/get_state_by_country',
      type: 'POST',
      data: {"country_id":country_id},
      context: this,
      success: function(result){
        $('#state_id').html(result);
      }
    });
  });

  $("#state_id").on("change", function(){
    var state_id =  $('#state_id').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>Master/get_city_by_state',
      type: 'POST',
      data: {"state_id":state_id},
      context: this,
      success: function(result){
        $('#city_id').html(result);
      }
    });
  });

  $('#customer_password, #customer_c_password').on('change',function(){
    var customer_password = $('#customer_password').val();
    var customer_c_password = $('#customer_c_password').val();
    if(customer_password != customer_c_password){
      toastr.error('Password and Confirm Password must be same');
      $('#customer_c_password').val('');
    }
  });
</script>
