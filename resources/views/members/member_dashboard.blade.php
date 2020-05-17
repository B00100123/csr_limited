@extends('layouts.m_app')

@section('content')
    <!-- Page Content -->
    <div id="page-content-wrapper">

        <div class="container-fluid py-3">
            <!-- table-->
            <div class="card">
                <div class="card-header bg-blue text-light">
                    <h4 class="mb-0">Member Dashboard</h4>
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
