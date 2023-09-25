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
            <div class="col-sm-12">
                <div class="card">
                    <div class="row product-page-main">
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs border-tab mb-0" id="top-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="topProvinceTab" data-bs-toggle="tab" href="#provinceTab" role="tab" aria-controls="positionTab" aria-selected="false" data-bs-original-title="" title=""><i class="fa fa-pied-piper-alt"></i> Province</a>
                                    <div class="material-border"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="topCityMunTab" data-bs-toggle="tab" href="#citymunTab" role="tab" aria-controls="top-profile" aria-selected="true" data-bs-original-title="" title=""><i class="fa fa-users"></i> City / Municipality</a>
                                    <div class="material-border"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="topBrgyTab" data-bs-toggle="tab" href="#brgyTab" role="tab" aria-controls="top-contact" aria-selected="false" data-bs-original-title="" title=""><i class="fa fa-gavel"></i> Barangay</a>
                                    <div class="material-border"></div>
                                </li>
                            </ul>
                            <div class="tab-content" id="top-tabContent">
                                <div class="tab-pane fade" id="provinceTab" role="tabpanel" aria-labelledby="top-home-tab">
                                    <div class="row">
                                        <div class="col-xl-3 xl-100 box-col-3">
                                            <div class="card-body">
                                                <h6>Create / Update Province</h6>
                                                <form class="theme-form" method="POST" action="javascript:void(0)" id="frmProvince">
                                                    <input class="form-control" type="text" name="provId" placeholder="" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Region</label>
                                                        <select class="jsSingleSelect col-sm-12" name="getRegion">
                                                        </select>
                                                        <h6 style="font-weight: bold;font-style: italic;color:red" name="selectRegion"></h6>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Code</label>
                                                        <input class="form-control" type="text" required name="code" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Name</label>
                                                        <input class="form-control" type="text" required name="name" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Acronym</label>
                                                        <input class="form-control" type="text" name="acronym" placeholder="">
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <div class="text-end mt-3">
                                                            <button class="btn btn-pill btn-outline-primary btn-lg" type="submit">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-xl-9 xl-100 box-col-9">
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
                                                                <th>Region</th>
                                                                <th>Province Code</th>
                                                                <th>Province Name</th>
                                                                <th>Acronym</th>
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
                                        <!-- DataTables events  Ends-->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="citymunTab" role="tabpanel" aria-labelledby="profile-top-tab">
                                    <div class="row">
                                        <div class="col-xl-3 xl-100 box-col-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6>Create / Update City / Municipality</h6>
                                                    <form class="theme-form" method="POST" action="javascript:void(0)" id="frmCityMun">
                                                        <input class="form-control" type="text" name="citymun_id" placeholder="" style="display: none;">
                                                        <div class="form-group">
                                                            <label class="col-form-label">Region</label>
                                                            <select class="jsSingleSelect col-sm-12" name="getRegion" id="asd"> 
                                                            </select>
                                                            <h6 style="font-weight: bold;font-style: italic;color:red" name="selectRegion"></h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Province</label>
                                                            <select class="jsSingleSelect col-sm-12" name="getProvince">
                                                            </select>
                                                            <h6 style="font-weight: bold;font-style: italic;color:red" name="selectProvince"></h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">PSGC Code</label>
                                                            <input class="form-control" type="number" required name="citymuncode" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Name</label>
                                                            <input class="form-control" type="text" name="name" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Acronym</label>
                                                            <input class="form-control" type="text" name="acronym" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Zip Code</label>
                                                            <input class="form-control" type="number" required name="zip" placeholder="">
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
                                                    <h6>List City / Municipality <a class="ms-2" href="#" name="refreshHead"><i class="fa fa-refresh"></i></a></h6>
                                                    <form class="row row-cols-sm-3 theme-form mt-3 form-bottom" id="frmCityMunFilter" method="GET" action="javascript:void(0)">
                                                        <div class="mb-3 d-flex">
                                                            <select class="jsSingleSelect col-sm-12" name="getRegion">
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 d-flex">
                                                            <select class="jsSingleSelect col-sm-12" name="getProvince">
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 d-flex">
                                                            <button class="btn btn-secondary" data-bs-original-title="" type="submit" title="">Search</button>
                                                        </div>
                                                    </form>  
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered row-border display " id="tableCityMun">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Region</th>
                                                                    <th>Province</th>
                                                                    <th>City / Municipality Code</th>
                                                                    <th>Name</th>
                                                                    <th>Acronym</th>
                                                                    <th>Zip Code</th>
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
                                        <!-- DataTables events  Ends-->
                                    </div>
                                </div>
                                <div class="tab-pane active show" id="brgyTab" role="tabpanel" aria-labelledby="contact-top-tab">
                                <div class="row">
                                        <div class="col-xl-3 xl-100 box-col-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6>Create / Update Barangay</h6>
                                                    <form class="theme-form" method="POST" action="javascript:void(0)" id="frmBrgy">
                                                        <input class="form-control" type="text" name="citymun_id" placeholder="" style="display: none;">
                                                        <div class="form-group">
                                                            <label class="col-form-label">Region</label>
                                                            <select class="jsSingleSelect col-sm-12" name="getRegion" id="asd"> 
                                                            </select>
                                                            <h6 style="font-weight: bold;font-style: italic;color:red" name="selectRegion"></h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Province</label>
                                                            <select class="jsSingleSelect col-sm-12" name="getProvince">
                                                                <option value="0"> Select province . . .</option>
                                                            </select>
                                                            <h6 style="font-weight: bold;font-style: italic;color:red" name="selectProvince"></h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">City/Municipality</label>
                                                            <select class="jsSingleSelect col-sm-12" name="getCitymun">
                                                                <option value="0"> Select city / municipality . . .</option>
                                                            </select>
                                                            <h6 style="font-weight: bold;font-style: italic;color:red" name="selectCitymun"></h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">PSGC Code</label>
                                                            <input class="form-control" type="number" required name="citymuncode" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Name</label>
                                                            <input class="form-control" type="text" name="name" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Acronym</label>
                                                            <input class="form-control" type="text" name="acronym" placeholder="">
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
                                                    <h6>List Barangay <a class="ms-2" href="#" name="refreshHead"><i class="fa fa-refresh"></i></a></h6>
                                                    <form class="row row-cols-sm-4 theme-form mt-4 form-bottom" id="frmBrgyFilter" method="GET" action="javascript:void(0)">
                                                        <div class="mb-3 d-flex">
                                                            <select class="jsSingleSelect col-sm-12" name="getRegion">
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 d-flex">
                                                            <select class="jsSingleSelect col-sm-12" name="getProvince">
                                                                <option value="0"> Select province . . .</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 d-flex">
                                                            <select class="jsSingleSelect col-sm-12" name="getCitymun">
                                                                <option value="0"> Select city / municipality . . .</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 d-flex">
                                                            <button class="btn btn-secondary" data-bs-original-title="" type="submit" title="">Search</button>
                                                        </div>
                                                    </form>  
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered row-border display " id="tableBrgy">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Region</th>
                                                                    <th>Province</th>
                                                                    <th>City/Municipality</th>
                                                                    <th>Baragay PSGC Code</th>
                                                                    <th>Name</th>
                                                                    <th>Acronym</th>
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
                                        <!-- DataTables events  Ends-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DataTables events  Ends-->
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>/js/libraries/psgc/Main.js"></script>
<script src="<?= base_url(); ?>/js/libraries/psgc/Province.js"></script>
<script src="<?= base_url(); ?>/js/libraries/psgc/CityMun.js"></script>
<script src="<?= base_url(); ?>/js/libraries/psgc/Brgy.js"></script>
<script>
    var baseUrl = '<?= base_url(); ?>';
</script>