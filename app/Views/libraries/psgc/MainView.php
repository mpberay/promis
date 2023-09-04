<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="git-pull-request"> </i></a></li>
                        <li class="breadcrumb-item">Libraries</li>
                        <li class="breadcrumb-item">PSGC</li>
        
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
            <div class="col-sm-12 col-xl-12 xl-100">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-2 tabs-responsive-side">
                        <div class="nav flex-column nav-pills border-tab nav-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false" data-bs-original-title="" title="">Province</a>
                          <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" data-bs-original-title="" title="">City / Municipality</a>
                          <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" data-bs-original-title="" title="">Barangay</a>
                        </div>
                      </div>
                      <div class="col-sm-10">
                        <div class="tab-content" id="v-pills-tabContent">
                          <div class="tab-pane active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">
                              <div class="col-xl-3 xl-100 box-col-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Create / Update Province</h6>
                                        <form class="theme-form" method="POST" action="javascript:void(0)" id="frmProvince">
                                            <input class="form-control" type="text" name="posID" placeholder="" style="display: none;">
                                            <div class="form-group">
                                              <label class="col-form-label">Region</label>
                                              <select class="jsSingleSelect col-sm-12" name="getRegion">
                                              </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Code</label>
                                                <input class="form-control" type="text" required name="posName" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Name</label>
                                                <input class="form-control" type="text" required name="posAcronym" placeholder="">
                                            </div>
                                            <div class="form-group mb-0">
                                                <div class="text-end mt-3">
                                                    <button class="btn btn-pill btn-outline-primary btn-lg" type="submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                              </div>
                              <div class="col-xl-9 xl-100 box-col-8">
                                  <div class="card">
                                      <div class="card-body">
                                          <h6>List of Provice</h6> 
                                          <form class="row row-cols-sm-3 theme-form mt-3 form-bottom" id="frmProvinceFilter" method="GET" action="javascript:void(0)">
                                            <div class="mb-3 d-flex">
                                              <select class="jsSingleSelect col-sm-12" name="getRegion">
                                              </select>
                                            </div>
                                            <div class="mb-3 d-flex">
                                              <button class="btn btn-secondary" data-bs-original-title="" type="submit" title="">Search</button>
                                            </div>
                                          </form>  
                                          <div class="table-responsive">
                                            <table class="table table-bordered row-border display" id="tableProvince">
                                              <thead>
                                                <tr>
                                                  <th>#</th>
                                                  <th>Code</th>
                                                  <th>Name</th>
                                                  <th>Date Added</th>
                                                  <th>Status</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                  
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="row">
                              <div class="col-xl-3 xl-100 box-col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Create / Update City / Municipality</h6>
                                        <form class="theme-form" method="POST" action="javascript:void(0)" id="frmHead">
                                          <input class="form-control" type="text" name="headID" placeholder="" style="display: none;">
                                          <div class="form-group">
                                            <label class="col-form-label">Provice</label>
                                            <select class="jsSingleSelect col-sm-12" name="getPosition" id="getPosition">
                                            </select>
                                            <h6 style="font-weight: bold;font-style: italic;color:red" id="sexPosition"></h6>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-form-label">Code</label>
                                            <input class="form-control" type="text" required name="lastname" placeholder="">
                                          </div>
                                          <div class="form-group">
                                            <label class="col-form-label">Name</label>
                                            <input class="form-control" type="text" name="extensionname" placeholder="">
                                          </div>
                                          <div class="form-group mb-0">
                                            <div class="text-end mt-3">
                                              <button class="btn btn-pill btn-outline-info btn-lg" type="submit">Click Here</button>
                                            </div>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                              </div>
                              <div class="col-xl-9 xl-100 box-col-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>List of City / Municipality <a class="ms-2" href="#" name="refreshHead"><i class="fa fa-refresh"></i></a></h6>
                                        <div class="table-responsive">
                                            <table class="table table-bordered row-border display " id="tableHead">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Code</th>
                                                        <th>Name</th>
                                                        <th>Province Name</th>
                                                        <th>Date Added</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>  
                          </div>
                          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <div class="row">
                                <div class="col-xl-3 xl-100 box-col-3">
                                  <div class="card">
                                      <div class="card-body">
                                          <h6>Create / Update Barangay</h6>
                                          <form class="theme-form" method="POST" action="javascript:void(0)" id="frmHead">
                                              <input class="form-control" type="text" name="headID" placeholder="" style="display: none;">
                                              <div class="form-group">
                                                <label class="col-form-label">Province</label>
                                                <select class="jsSingleSelect col-sm-12" name="getPosition" id="getPosition">
                                                </select>
                                                <h6 style="font-weight: bold;font-style: italic;color:red" id="sexPosition"></h6>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-form-label">City / Municipality</label>
                                                <select class="jsSingleSelect col-sm-12" name="getPosition" id="getPosition">
                                                </select>
                                                <h6 style="font-weight: bold;font-style: italic;color:red" id="sexPosition"></h6>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-form-label">Code</label>
                                                <input class="form-control" type="text" required name="lastname" placeholder="">
                                              </div>
                                              <div class="form-group">
                                                <label class="col-form-label">Name</label>
                                                <input class="form-control" type="text" name="extensionname" placeholder="">
                                              </div>
                                              <div class="form-group mb-0">
                                                <div class="text-end mt-3">
                                                    <button class="btn btn-pill btn-outline-info btn-lg" type="submit">Click Here</button>
                                                </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                                </div>
                                <div class="col-xl-9 xl-100 box-col-9">
                                  <div class="card">
                                      <div class="card-body">
                                          <h6>List Head <a class="ms-2" href="#" name="refreshHead"><i class="fa fa-refresh"></i></a></h6>
                                          <div class="table-responsive">
                                              <table class="table table-bordered row-border display " id="tableHead">
                                                  <thead>
                                                      <tr>
                                                          <th>#</th>
                                                          <th>First Name</th>
                                                          <th>Middle Name</th>
                                                          <th>Last Name</th>
                                                          <th>Ext. Name</th>
                                                          <th>Sex</th>
                                                          <th>Position</th>
                                                          <th>Date Added</th>
                                                          <th>Status</th>
                                                          <th>Action</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </div> 
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>/js/libraries/psgc/Main.js"></script>
<script src="<?= base_url(); ?>/js/libraries/psgc/Province.js"></script>
<script>
  var baseUrl = '<?= base_url(); ?>';
</script>