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
            <h4>Expense</h4>
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
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Expense</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } else{
                    echo '<a href="'.base_url().'Transaction/expense" type="button" class="btn btn-sm btn-outline-info" >Cancel Update</a>';
                  } ?>
                </div>
              </div>
              <!--  -->
                <div class="card-body p-0 " <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="row p-4">
                      <div class="col-md-6">
                        <div class="row">
                          <div class="form-group col-md-12 select_sm">
                            <label>Select Expense Category</label>
                            <select class="form-control select2 form-control-sm" name="expense_category_id" id="expense_category_id" data-placeholder="Select Expense Category" required>
                              <option value="">Select Expense Category</option>
                              <?php if(isset($expense_category_list)){ foreach ($expense_category_list as $list) { ?>
                              <option value="<?php echo $list->expense_category_id; ?>" <?php if(isset($expense_info) && $expense_info['expense_category_id'] == $list->expense_category_id){ echo 'selected'; } ?>><?php echo $list->expense_category_name; ?></option>
                              <?php } } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-12 ">
                            <label>Expense Name</label>
                            <input type="text" class="form-control form-control-sm" name="expense_name" id="expense_name" value="<?php if(isset($expense_info)){ echo $expense_info['expense_name']; } ?>" placeholder="Enter Expense Name" required>
                          </div>
                          <div class="form-group col-md-12 ">
                            <label>Amount</label>
                            <input type="number" class="form-control form-control-sm" name="expense_amount" id="expense_amount" value="<?php if(isset($expense_info)){ echo $expense_info['expense_amount']; } ?>" placeholder="Enter Amount" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="">
                          <div class="form-group col-md-12 ">
                            <label>Description</label>
                            <textarea class="textarea form-control form-control-sm" name="expense_descr" id="expense_descr" rows="8"><?php if(isset($expense_info)){ echo $expense_info['expense_descr']; } ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="expense_status" id="expense_status" value="0" <?php if(isset($expense_info) && $expense_info['expense_status'] == 0){ echo 'checked'; } ?>>
                            <label for="expense_status" class="custom-control-label">Disable This Expense</label>
                          </div>
                        </div>
                        <div class="col-md-6 text-right">
                          <a href="<?php base_url(); ?>Product/expense" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
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
                <h3 class="card-title">List All Expense Information</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Expense Name</th>
                    <th class="wt_75">Category</th>
                    <th class="wt_50">Amount</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($expense_list)){
                     $i=0; foreach ($expense_list as $list) { $i++;
                       $expense_category_info = $this->Master_Model->get_info_arr_fields3('expense_category_name', '', 'expense_category_id', $list->expense_category_id, '', '', '', '', 'smm_expense_category');
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-expense">
                          <a href="<?php echo base_url() ?>Transaction/edit_expense/<?php echo $list->expense_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Transaction/delete_expense/<?php echo $list->expense_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Expense Information');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td><?php echo $list->expense_name; ?></td>
                      <td><?php if($expense_category_info) { echo $expense_category_info[0]['expense_category_name']; } ?></td>
                      <td><?php echo $list->expense_amount; ?></td>
                      <td>
                        <?php if($list->expense_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
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
