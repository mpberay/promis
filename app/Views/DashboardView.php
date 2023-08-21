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
              <h5 >DOM / jQuery</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display" id="advance-1">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                    </tr>
                    <tr>
                      <td>Cedric Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2012/03/29</td>
                      <td>$433,060</td>
                    </tr>
                    <tr>
                      <td>Airi Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
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
<script src="<?php echo base_url(); ?>/vendors/cuba/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script>
  $(window).ready(function(){
    jsLoadClients();
  });
  function jsLoadClients(){
    $('#advance-1').DataTable();
  }
</script>