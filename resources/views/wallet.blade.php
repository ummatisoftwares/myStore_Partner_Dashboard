@extends('layouts.master')
@section('title', 'Wallet')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
@endsection

@section('breadcrumb-title')
<h3>Wallet</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item active">Wallet</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row size-column">
        <div class="col-xxl-12 col-md-12 box-col-8 grid-ed-12">
            <div class="row">
                <div class="col-xxl-5 col-md-7 box-col-7">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card o-hidden">
                                <div class="card-body balance-widget"><span class="f-w-500 f-light">Total Balance</span>
                                    <h4 class="mb-3 mt-1 f-w-500 mb-0 f-22">$<span class="counter">245,154.00
                                        </span><span class="f-light f-14 f-w-400 ms-1">this month</span></h4><a
                                        class="purchase-btn btn btn-primary btn-hover-effect f-w-500"
                                        href="#">Withdraw</a>
                                    <div class="mobile-right-img"><img class="left-mobile-img"
                                            src="https://laravel.pixelstrap.com/cuba/assets/images/dashboard-2/widget-img.png"
                                            alt=""><img class="mobile-img"
                                            src="https://laravel.pixelstrap.com/cuba/assets/images/dashboard-2/mobile.gif"
                                            alt="mobile with coin"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-sm-6 box-col-6">
                    <div class="card balance-box height-equal-2" style="min-height: 369.594px;">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <div class="balance-profile">
                                <div class="balance-img"><img
                                        src="https://laravel.pixelstrap.com/cuba/assets/images/dashboard-4/user.png"
                                        alt="user vector"><a class="edit-icon"
                                        href="https://laravel.pixelstrap.com/cuba/users/user-profile"
                                        data-bs-original-title="" title="">
                                        <svg>
                                            <use href="{{ asset('assets/svg/icon-sprite.svg#pencil') }}">
                                            </use>
                                        </svg></a></div><span class="f-light d-block">Total Balance </span>
                                <h5 class="mt-1">$768,987.90</h5>
                                <ul>
                                    <li>
                                        <div class="balance-item danger">
                                            <div class="balance-icon-wrap">
                                                <div class="balance-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-arrow-down-right">
                                                        <line x1="7" y1="7" x2="17" y2="17"></line>
                                                        <polyline points="17 7 17 17 7 17"></polyline>
                                                    </svg></div>
                                            </div>
                                            <div> <span class="f-12 f-light">Sales </span>
                                                <h5>78.8K</h5><span
                                                    class="badge badge-light-danger rounded-pill">-11.67%</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="balance-item success">
                                            <div class="balance-icon-wrap">
                                                <div class="balance-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-arrow-up-right">
                                                        <line x1="7" y1="17" x2="17" y2="7"></line>
                                                        <polyline points="7 7 17 7 17 17"></polyline>
                                                    </svg></div>
                                            </div>
                                            <div> <span class="f-12 f-light">Affiliated</span>
                                                <h5>19.7K</h5><span
                                                    class="badge badge-light-success rounded-pill">+10.67%</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- <a
                                        class="purchase-btn btn btn-primary btn-hover-effect f-w-500"
                                        href="#">Withdraw</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Payouts</h4>
                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
                            class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#"
                        data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div>
            <div class="table-responsive add-project">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>Payment Method</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a class="text-inherit" href="#">Untrammelled prevents </a></td>
                            <td>28 May 2018</td>
                            <td><span class="status-icon bg-success"></span> Completed</td>
                            <td>$56,908</td>
                            <td class="text-end"><a class="icon" href="javascript:void(0)"></a><a
                                    class="btn btn-primary btn-sm" href="javascript:void(0)"><i
                                        class="fa fa-pencil"></i> Edit</a><a class="icon"
                                    href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm"
                                    href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon"
                                    href="javascript:void(0)"></a><a class="btn btn-danger btn-sm"
                                    href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                        <tr>
                            <td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
                            <td>12 June 2018</td>
                            <td><span class="status-icon bg-danger"></span> On going</td>
                            <td>$45,087</td>
                            <td class="text-end"><a class="icon" href="javascript:void(0)"></a><a
                                    class="btn btn-primary btn-sm" href="javascript:void(0)"><i
                                        class="fa fa-pencil"></i> Edit</a><a class="icon"
                                    href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm"
                                    href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon"
                                    href="javascript:void(0)"></a><a class="btn btn-danger btn-sm"
                                    href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                        <tr>
                            <td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
                            <td>12 July 2018</td>
                            <td><span class="status-icon bg-warning"></span> Pending</td>
                            <td>$60,123</td>
                            <td class="text-end"><a class="icon" href="javascript:void(0)"></a><a
                                    class="btn btn-primary btn-sm" href="javascript:void(0)"><i
                                        class="fa fa-pencil"></i> Edit</a><a class="icon"
                                    href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm"
                                    href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon"
                                    href="javascript:void(0)"></a><a class="btn btn-danger btn-sm"
                                    href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                        <tr>
                            <td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
                            <td>14 June 2018</td>
                            <td><span class="status-icon bg-warning"></span> Pending</td>
                            <td>$70,435</td>
                            <td class="text-end"><a class="icon" href="javascript:void(0)"></a><a
                                    class="btn btn-primary btn-sm" href="javascript:void(0)"><i
                                        class="fa fa-pencil"></i> Edit</a><a class="icon"
                                    href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm"
                                    href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon"
                                    href="javascript:void(0)"></a><a class="btn btn-danger btn-sm"
                                    href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                        <tr>
                            <td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
                            <td>25 June 2018</td>
                            <td><span class="status-icon bg-success"></span> Completed</td>
                            <td>$15,987</td>
                            <td class="text-end"><a class="icon" href="javascript:void(0)"></a><a
                                    class="btn btn-primary btn-sm" href="javascript:void(0)"><i
                                        class="fa fa-pencil"></i> Edit</a><a class="icon"
                                    href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm"
                                    href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon"
                                    href="javascript:void(0)"></a><a class="btn btn-danger btn-sm"
                                    href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/dashboard_2.js') }}"></script>
<script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script>
@endsection
