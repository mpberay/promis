<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/vendors/cuba/assets/css/vendors/datatables.css">
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i data-feather="git-pull-request"> </i></a></li>
            <li class="breadcrumb-item">Data Tables</li>
            <li class="breadcrumb-item">Advanced DataTables</li><br>
            
            <div class="media">
              <div class="badge-groups w-100">
                <div class="badge f-12"><i class="me-1" data-feather="clock"></i><span id="txt"></span></div>
                <div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div>
              </div>
            </div>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5>User's List</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tableList">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Employee ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Date Register</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- DataTables events  Ends-->
      </div>
    </div>
</div>
<script src="<?= base_url(); ?>/js/users/usersList.js"></script>
<script>
  var baseUrl = '<?= base_url(); ?>';
</script>