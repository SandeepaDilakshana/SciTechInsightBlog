@extends('admin_panel.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between">
            <div class="dashboard-header-title">
                <h5 class="mb-0">Welcome back,</h5>
                <p class="mb-0"> Here's what's happening today.
                    today.
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-6 col-xxl-3">
        <div class="card ">
            <div class="card-body" data-intro="Total Posts">
                <div class="single-widget d-flex align-items-center justify-content-between">
                    <div>
                        <div class="widget-icon">
                            <i class='bx bx-mouse-alt'></i>
                        </div>
                        <div class="widget-desc">
                            <h5>Total Posts</h5>
                        </div>
                    </div>
                    <div class="progress-report" data-title="progress" data-intro="Number of total posts">
                        <p>4</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-6 col-xxl-3">
        <div class="card">
            <div class="card-body" data-intro="Categories">
                <div class="single-widget d-flex align-items-center justify-content-between">
                    <div>
                        <div class="widget-icon">
                            <i class='bx bx-user-voice'></i>
                        </div>
                        <div class="widget-desc">
                            <h5>Categories</h5>
                        </div>
                    </div>
                    <div class="progress-report" data-title="progress" data-intro="Number of total categories">
                        <p>+ 4.56%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-6 col-xxl-3">
        <div class="card">
            <div class="card-body" data-intro="Tags">
                <div class="single-widget d-flex align-items-center justify-content-between">
                    <div>
                        <div class="widget-icon">
                            <i class='bx bx-wallet'></i>
                        </div>
                        <div class="widget-desc">
                            <h5>Tags</h5>
                        </div>
                    </div>
                    <div class="progress-report" data-title="progress" data-intro="Number of total tags">
                        <p>- 2.56%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-6 col-xxl-3">
        <div class="card">
            <div class="card-body" data-intro="Users">
                <div class="single-widget d-flex align-items-center justify-content-between">
                    <div>
                        <div class="widget-icon">
                            <i class='bx bx-bar-chart-alt-2'></i>
                        </div>
                        <div class="widget-desc">
                            <h5>Users</h5>
                        </div>
                    </div>
                    <div class="progress-report" data-title="progress" data-intro="Number of users">
                        <p>+ 2.56%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-4">
        <div class="overflow-hidden card w-100 position-relative">
            <div class="pb-4 card-body">
                <div class="card-title">
                    <h4> Monthly Earnings </h4>
                    <h6 class="text-success">$6,820</h6>
                </div>

                <div id="most-visited"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title border-bootom-none mb-30 d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">Top Selling Products</h6>
                    <div class="dashboard-dropdown">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dashboardDropdown57"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="ti-more"></i></button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dashboardDropdown57">
                                <a class="dropdown-item" href="#"><i class="ti-pencil-alt"></i>
                                    Edit</a>
                                <a class="dropdown-item" href="#"><i class="ti-settings"></i>
                                    Settings</a>
                                <a class="dropdown-item" href="#"><i class="ti-eraser"></i>
                                    Remove</a>
                                <a class="dropdown-item" href="#"><i class="ti-trash"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table mb-0 table-centered table-nowrap table-hover">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Sold</th>
                                <th>Total Sale</th>
                                <th>Stutas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="d-flex align-items-center"><img class="shop-img"
                                        src="{{ asset('admin_template/img/shop-img/1.png') }}" alt="">
                                    <span>Sound Box</span>
                                </td>
                                <td>$88.49</td>
                                <td>$125</td>
                                <td class="text-success">In stock</td>
                                <td><a class="table-btn" href="#">View</a></td>
                            </tr>

                            <tr>
                                <td class="d-flex align-items-center"><img class="shop-img"
                                        src="{{ asset('admin_template/img/shop-img/3.png') }}" alt="">
                                    <span>Head Phone</span>
                                </td>
                                <td>$88.49</td>
                                <td>$125</td>
                                <td class="text-success">In stock</td>
                                <td><a class="table-btn" href="#">View</a></td>
                            </tr>

                            <tr>
                                <td class="d-flex align-items-center"><img class="shop-img"
                                        src="{{ asset('admin_template/img/shop-img/4.png') }}" alt="">
                                    <span>New Sound</span>
                                </td>
                                <td>$88.49</td>
                                <td>$125</td>
                                <td class="badges text-danger">Stock out</td>
                                <td><a class="table-btn" href="#">View</a></td>
                            </tr>

                            <tr>
                                <td class="d-flex align-items-center"><img class="shop-img"
                                        src="{{ asset('admin_template/img/shop-img/1.png') }}" alt="">
                                    <span>Sound Box</span>
                                </td>
                                <td>$88.49</td>
                                <td>$125</td>
                                <td class="text-success">In stock</td>
                                <td><a class="table-btn" href="#">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
