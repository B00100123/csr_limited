@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div id="page-content-wrapper">

        <div class="container-fluid py-3">
            <!-- Forms-->
            <!-- <div class="row">
                <div class="form-group col-sm-6 col-md-4">
                    <label for="usertypeid">Usertype</label>
                    <select class="form-control custom-select" id="usertypeid" name="usertypeid">
                        <option value="" disabled="" selected="">-- CHOOSE --</option>
                        <option value="">COSPACE MEMBER</option>
                        <option value="">ADMIN</option>
                        <option value="">MANAGEMENT</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-md-4">
                    <label for="PStatus">Profile Status</label>
                    <select class="form-control custom-select" id="Status" name="Status">
                        <option value="" disabled="" selected="">-- CHOOSE --</option>
                        <option value="">WAITING</option>
                        <option value="">APPROVED</option>
                        <option value="">DECLINE</option>
                        <option value="">PENDING</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-md-4">
                    <label for="PackageStatus">Package Status</label>
                    <select class="form-control custom-select" id="PackageId" name="PackageId">
                        <option value="" disabled="" selected="">-- CHOOSE --</option>
                        <option value="Past">Past</option>
                        <option value="Current">Current</option>
                        <option value="Future">Future</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-md-4 ">
                    <label for="FirstName">First Name</label>
                    <input class="form-control" id="FirstName" name="FirstName" type="text" value="">
                </div>
                <div class="form-group col-sm-6 col-md-4">
                    <label for="LastName">Last Name</label>
                    <input class="form-control" id="LastName" name="LastName" type="text" value="">
                </div>
                <div class="form-group col-sm-6 col-md-4">
                    <label for="EmailAddress">Email Address</label>
                    <input class="form-control" id="EmailAddress" name="EmailAddress" type="email" value="">
                </div>
            </div>
            <div class="form-group">
                <div class="text-right">
                    <button type="submit" value="Search" class="btn-search btn btn-primary btn-blue">Search</button>
                </div>
            </div> -->

            <!-- table-->
            <div class="card">
                <div class="card-header bg-blue text-light">
                    <h4 class="mb-0">Admin Dashboard</h4>
                </div>
                <div class="table-responsive small">
                    <table class="table table-condensed" id="userTable">
                        <!-- <thead>
                            <tr>
                                <th class="text-center" style="width: 100px;"><span>Status</span></th>
                                <th><span>User</span></th>
                                <th><span>Email Address</span></th>
                                <th><span>Phone Number</span></th>
                                <th><span>Start Date</span></th>
                                <th><span>End Date</span></th>
                                <th class="text-center" style="width:110px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <span class="fa-stack"><i class="fa fa-circle fa-stack-2x text-blue"></i><i class="fa fa-check fa-stack-1x fa-inverse" aria-hidden="true"></i></span><br><span class="small">APPROVED</span>
                                </td>
                                <td><a href="#" class="user-link blue-link">M Abbas AB</a><br><span class="user-subhead small">COSPACE MEMBER</span></td>
                                <td><a href="#">abbas.ali.abawa@outlook.com</a></td>
                                <td>0331-9080070</td>
                                <td>01 Sep 2018</td>
                                <td>30 Sep 2018</td>
                                <td class="text-center text-nowrap">
                                    <a href="#" class="co-no-under"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x text-blue"></i><i class="fa fa-comments fa-stack-1x fa-inverse" aria-hidden="true"></i></span></a>
                                    <a href="#" class="co-no-under"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x text-blue"></i><i class="fa fa-credit-card fa-stack-1x fa-inverse" aria-hidden="true"></i></span></a>
                                    <a href="#" class="co-no-under"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x text-blue-dark"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i></span></a>
                                </td>
                            </tr>
                        </tbody> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
