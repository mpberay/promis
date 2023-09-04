<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="git-pull-request"> </i></a></li>
                        <li class="breadcrumb-item">Libraries</li>
                        <li class="breadcrumb-item">Offices</li>
        
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
                                    <a class="nav-link active" id="topPositionTab" data-bs-toggle="tab" href="#positionTab" role="tab" aria-controls="positionTab" aria-selected="false" data-bs-original-title="" title=""><i class="fa fa-pied-piper-alt"></i> Positions</a>
                                    <div class="material-border"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="topHeadTab" data-bs-toggle="tab" href="#headTab" role="tab" aria-controls="top-profile" aria-selected="true" data-bs-original-title="" title=""><i class="fa fa-users"></i> Office Heads</a>
                                    <div class="material-border"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="topDesignationTab" data-bs-toggle="tab" href="#designationTab" role="tab" aria-controls="top-contact" aria-selected="false" data-bs-original-title="" title=""><i class="fa fa-gavel"></i> Designations</a>
                                    <div class="material-border"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="topDivisionTab" data-bs-toggle="tab" href="#divisionTab" role="tab" aria-controls="top-brand" aria-selected="false" data-bs-original-title="" title=""><i class="fa fa-stack-overflow"></i> Divisions</a>
                                    <div class="material-border"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="topSectionTab" data-bs-toggle="tab" href="#sectionTab" role="tab" aria-controls="top-brand" aria-selected="false" data-bs-original-title="" title=""><i class="fa fa-vk"></i> Sections</a>
                                    <div class="material-border"></div>
                                </li>
                            </ul>
                            <div class="tab-content" id="top-tabContent">
                                <div class="tab-pane active show" id="positionTab" role="tabpanel" aria-labelledby="top-home-tab">
                                    <div class="row">
                                        <div class="col-xl-4 xl-100 box-col-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6>Create / Update Employee Position</h6>
                                                    <form class="theme-form" method="POST" action="javascript:void(0)" id="frmPosition">
                                                        <input class="form-control" type="text" name="posID" placeholder="" style="display: none;">
                                                        <div class="form-group">
                                                            <label class="col-form-label">Position Name</label>
                                                            <input class="form-control" type="text" required name="posName" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Acronym</label>
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
                                        <div class="col-xl-8 xl-100 box-col-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6>List Position <a class="ms-2" href="#" name="refreshPosition"><i class="fa fa-refresh"></i></a></h6> 
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered row-border display" id="tablePosition">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
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
                                <div class="tab-pane fade" id="headTab" role="tabpanel" aria-labelledby="profile-top-tab">
                                    <div class="row">
                                        <div class="col-xl-3 xl-100 box-col-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6>Create / Update Office Head</h6>
                                                    <form class="theme-form" method="POST" action="javascript:void(0)" id="frmHead">
                                                        <input class="form-control" type="text" name="headID" placeholder="" style="display: none;">
                                                        <div class="form-group">
                                                            <label class="col-form-label">First Name</label>
                                                            <input class="form-control" type="text" required name="firstname" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Middle Name</label>
                                                            <input class="form-control" type="text" name="middlename" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Last Name</label>
                                                            <input class="form-control" type="text" required name="lastname" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Extention Name</label>
                                                            <input class="form-control" type="text" name="extensionname" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Sex</label>
                                                            <div class="col">
                                                                <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                                                                    <div class="form-check form-check-inline radio radio-primary">
                                                                        <input class="form-check-input" id="radioinline1" type="radio" name="radioSex" value="Female" data-bs-original-title="" title="">
                                                                        <label class="form-check-label mb-0" for="radioinline1">Female</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline radio radio-primary">
                                                                        <input class="form-check-input" id="radioinline2" type="radio" name="radioSex" value="Male" data-bs-original-title="" title="">
                                                                        <label class="form-check-label mb-0" for="radioinline2">Male</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h6 style="font-weight: bold;font-style: italic;color:red" id="sexValidator"></h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Position</label>
                                                            <select class="jsSingleSelect col-sm-12" name="getPosition" id="getPosition">
                                                            </select>
                                                            <h6 style="font-weight: bold;font-style: italic;color:red" id="sexPosition"></h6>
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
                                        <!-- DataTables events  Ends-->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="designationTab" role="tabpanel" aria-labelledby="contact-top-tab">
                                    <div class="row">
                                        <div class="col-xl-3 xl-100 box-col-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6>Create / Update Employee Designation</h6>
                                                    <form class="theme-form" method="POST" action="javascript:void(0)" id="frmDesignation">
                                                        <input class="form-control" type="text" name="desID" placeholder="" style="display: none;">
                                                        <div class="form-group">
                                                            <label class="col-form-label">Designation Name</label>
                                                            <input class="form-control" type="text" required name="desName" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Acronym</label>
                                                            <input class="form-control" type="text" name="desAcronym" placeholder="">
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
                                        <div class="col-xl-9 xl-100 box-col-9">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6>List Designation <a class="ms-2" href="#" name="refreshDesignation"><i class="fa fa-refresh"></i></a></h6>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered row-border display" id="tableDesignation">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
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
                                <div class="tab-pane fade" id="divisionTab" role="tabpanel" aria-labelledby="brand-top-tab">
                                    <div class="row">
                                        <div class="col-xl-3 xl-100 box-col-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6>Create / Update Division Office</h6>
                                                    <form class="theme-form" method="POST" action="javascript:void(0)" id="frmDivision">
                                                        <input class="form-control" type="text" name="divID" placeholder="" style="display: none;">
                                                        <div class="form-group">
                                                            <label class="col-form-label">Code</label>
                                                            <input class="form-control" type="text" required name="divCode" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Name</label>
                                                            <input class="form-control" type="text" required name="divName" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Acronym</label>
                                                            <input class="form-control" type="text" required name="divAcronym" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Office Head</label>
                                                            <select class="jsSingleSelect col-sm-12" name="headID">
                                                                <option>Select office head . . .</option>
                                                            </select>
                                                            <h6 style="font-weight: bold;font-style: italic;color:red" id="h6_headID"></h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Head designation</label>
                                                            <select class="jsSingleSelect col-sm-12" name="desID">
                                                                <option>Select head designation . . .</option>
                                                            </select>
                                                            <h6 style="font-weight: bold;font-style: italic;color:red" id="h6_desID"></h6>
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
                                                    <h6>List Division <a class="ms-2" href="#" name="refreshDivision"><i class="fa fa-refresh"></i></a></h6>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered row-border display " id="tableDivision">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Code</th>
                                                                    <th>Division Name</th>
                                                                    <th>Acronym</th>
                                                                    <th>Head</th>
                                                                    <th>Designation</th>
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
                                <div class="tab-pane fade" id="sectionTab" role="tabpanel" aria-labelledby="brand-top-tab">
                                    <div class="row">
                                        <div class="col-xl-3 xl-100 box-col-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6>Create / Update Section</h6>
                                                    <form class="theme-form" method="POST" action="javascript:void(0)" id="frmSection">
                                                        <input class="form-control" type="text" name="secID" placeholder="" style="display: none;">
                                                        <div class="form-group">
                                                            <label class="col-form-label">Code</label>
                                                            <input class="form-control" type="text" required name="secCode" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Name</label>
                                                            <input class="form-control" type="text" required name="secName" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Acronym</label>
                                                            <input class="form-control" type="text" required name="secAcronym" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Division</label>
                                                            <select class="jsSingleSelect col-sm-12" name="divID">
                                                                <option>Select division name . . .</option>
                                                            </select>
                                                            <h6 style="font-weight: bold;font-style: italic;color:red" id="h6_divID"></h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Head</label>
                                                            <select class="jsSingleSelect col-sm-12" name="headID">
                                                                <option>Select office head . . .</option>
                                                            </select>
                                                            <h6 style="font-weight: bold;font-style: italic;color:red" id="h6_headID"></h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Designation</label>
                                                            <select class="jsSingleSelect col-sm-12" name="desID">
                                                                <option>Select head designation . . .</option>
                                                            </select>
                                                            <h6 style="font-weight: bold;font-style: italic;color:red" id="h6_desID"></h6>
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
                                                    <h6>List Section <a class="ms-2" href="#" name="refreshSection"><i class="fa fa-refresh"></i></a></h6>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered row-border display " id="tableSection">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Code</th>
                                                                    <th>Section Name</th>
                                                                    <th>Acronym</th>
                                                                    <th>Division Name</th>
                                                                    <th>Head</th>
                                                                    <th>Designation</th>
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
<script src="<?= base_url(); ?>/js/libraries/offices/Main.js"></script>
<script src="<?= base_url(); ?>/js/libraries/offices/Position.js"></script>
<script src="<?= base_url(); ?>/js/libraries/offices/Head.js"></script>
<script src="<?= base_url(); ?>/js/libraries/offices/Designation.js"></script>
<script src="<?= base_url(); ?>/js/libraries/offices/Division.js"></script>
<script src="<?= base_url(); ?>/js/libraries/offices/Section.js"></script>
<script>
    var baseUrl = '<?= base_url(); ?>';
</script>