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
            <h4>Project</h4>
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
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Project</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } else{
                    echo '<a href="<?php base_url(); ?>Project/project" class="btn btn-sm btn-outline-info">Cancel Edit</a>';
                  } ?>
                </div>
              </div>
              <!--  -->
              <div class="card-body px-0 py-0" <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                <form class="input_form m-0" id="form_action" role="form" action="" method="post">
                  <div class="row p-4">
                    <div class="col-md-6 row px-0 py-0">
                      <div class="form-group col-md-6 select_sm">
                        <label>Project Name</label>
                        <input type="text" class="form-control form-control-sm" name="project_name" id="project_name" value="<?php if(isset($project_info)){ echo $project_info['project_name']; } ?>"  placeholder="Enter Name of Project" required >
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Project No.</label>
                        <input type="number" class="form-control form-control-sm" name="project_no" id="project_no" value="<?php if(isset($project_info)){ echo $project_info['project_no']; } ?>"  placeholder="Enter Project No." required >
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>P. O. No.</label>
                        <input type="number" class="form-control form-control-sm" name="project_po_no" id="project_po_no" value="<?php if(isset($project_info)){ echo $project_info['project_po_no']; } ?>"  placeholder="Enter P. O. No." required >
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Phase No. </label>
                        <input type="number" class="form-control form-control-sm" name="project_phase_no" id="project_phase_no" value="<?php if(isset($project_info)){ echo $project_info['project_phase_no']; } ?>"  placeholder="Phase No." required>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Client(Customer)</label>
                        <select class="form-control select2" name="customer_id" id="customer_id" data-placeholder="Client(Customer)">
                          <option value="">Select Client(Customer)</option>
                          <?php if(isset($customer_list)){ foreach ($customer_list as $list) { ?>
                          <option value="<?php echo $list->customer_id; ?>" <?php if(isset($project_info) && $project_info['customer_id'] == $list->customer_id){ echo 'selected'; } ?>><?php echo $list->customer_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <!-- <div class="form-group col-md-6 select_sm">
                        <label>Company </label>
                        <input type="text" class="form-control form-control-sm" name="project_company" id="project_company" value="<?php if(isset($project_info)){ echo $project_info['project_company']; } ?>"  placeholder="Company" required>
                      </div> -->
                      <div class="form-group col-md-6 select_sm">
                        <label>Start Date</label>
                        <input type="text" class="form-control form-control-sm" name="project_start_date" value="<?php if(isset($project_info)){ echo $project_info['project_start_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Start Date" required>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>End Date</label>
                        <input type="text" class="form-control form-control-sm" name="project_end_date" value="<?php if(isset($project_info)){ echo $project_info['project_end_date']; } ?>" id="date2" data-target="#date2" data-toggle="datetimepicker" placeholder="End Date" required>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Budget Hours</label>
                        <input type="number" class="form-control form-control-sm" name="project_budget_hours" id="project_budget_hours" value="<?php if(isset($project_info)){ echo $project_info['project_budget_hours']; } ?>"  placeholder="Budget Hours" required>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Priority</label>
                        <select class="form-control select2" name="project_piority" id="project_piority" data-placeholder="Priority">
                          <option value="">Priority</option>
                          <option value="Low" <?php if(isset($project_info) && $project_info['project_piority'] == 'Low'){ echo 'selected'; } ?>>Low</option>
                          <option value="Medium" <?php if(isset($project_info) && $project_info['project_piority'] == 'Medium'){ echo 'selected'; } ?>>Medium</option>
                          <option value="High" <?php if(isset($project_info) && $project_info['project_piority'] == 'High'){ echo 'selected'; } ?>>High</option>
                        </select>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Project Members</label>
                        <input type="text" class="form-control form-control-sm" name="project_members" id="project_members" value="<?php if(isset($project_info)){ echo $project_info['project_members']; } ?>"  placeholder="Project Members" required>
                      </div>
                    </div>
                    <div class="col-md-6 px-0 py-0">
                      <div class="form-group col-md-12 select_sm">
                        <style media="screen">
                        .note-editing-area {
                          height: 201px !important;
                        }
                        </style>
                        <label>Description</label>
                        <textarea class="textarea form-control form-control-sm" name="project_descr" id="project_descr" placeholder="Place some text here" rows="12"><?php if(isset($project_info)){ echo $project_info['project_descr']; } ?></textarea>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Summary</label>
                        <textarea class="form-control form-control-sm" name="project_summery" id="project_summery" rows="2"><?php if(isset($project_info)){ echo $project_info['project_summery']; } ?></textarea>
                      </div>
                    </div>



                  </div>
                  <div class="card-footer clearfix" style="display: block;">
                    <div class="row">
                      <div class="col-md-6 text-left">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="project_status" id="project_status" value="0" <?php if(isset($project_info) && $project_info['project_status'] == 0){ echo 'checked'; } ?>>
                          <label for="project_status" class="custom-control-label">Disable This Project</label>
                        </div>
                      </div>
                      <div class="col-md-6 text-right">
                        <a href="<?php base_url(); ?>Project/project" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
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
                <h3 class="card-title">List All Project</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Project Name</th>
                    <th class="wt_75">Client</th>
                    <th class="wt_75">Priority</th>
                    <th class="wt_75">Start Date</th>
                    <th class="wt_75">End Date</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($project_list)){
                    $i=0; foreach ($project_list as $list) { $i++;
                      $customer_info = $this->Master_Model->get_info_arr_fields3('customer_name', '', 'customer_id', $list->customer_id, '', '', '', '', 'smm_customer');
                    ?>
                      <tr>
                        <td class="d-none"><?php echo $i; ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="<?php echo base_url() ?>Project/edit_project/<?php echo $list->project_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                            <a href="<?php echo base_url() ?>Project/delete_project/<?php echo $list->project_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Project');"><i class="fa fa-trash text-danger"></i></a>
                          </div>
                        </td>
                        <td><?php echo $list->project_name; ?></td>
                        <td><?php if($customer_info){ echo $customer_info[0]['customer_name']; } ?></td>
                        <td><?php echo $list->project_piority; ?></td>
                        <td><?php echo $list->project_start_date; ?></td>
                        <td><?php echo $list->project_end_date; ?></td>
                        <td>
                          <?php if($list->project_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
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
