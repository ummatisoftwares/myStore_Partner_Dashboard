@extends('layouts.master')
@section('title', 'Socials')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Socials</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Socials</li>
<li class="breadcrumb-item active">Manage Socials</li>
@endsection

@section('content')
<!-- <div class="container-fluid">
    <div class="email-wrap bookmark-wrap">
        <div class="row">
            <div class="col-xl-12 col-md-12 box-col-12">
                <div class="email-right-aside bookmark-tabcontent">
                    <div class="card email-body radius-left">
                        <div class="ps-0">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                                    aria-labelledby="pills-created-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h5 class="mb-0">Manage Socials</h5>
                                            <a class="btn btn-primary" href="{{ route('sociallinkscreate') }}">
                                                <i data-feather="plus-square"></i> Add New Social
                                            </a>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="taskadd">
                                                @if($socials->isEmpty())
                                                <div class="text-center">
                                                    No records found.
                                                </div>
                                                @else
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody class="ui-sortable" id="draggableMultiples">
                                                            @foreach($socials as $social)
                                                            <tr>
                                                                <td>
                                                                    <h6 class="task_title_0">
                                                                        {{ $social->social_platform_name }}</h6>
                                                                    <p class="project_name_0">
                                                                        <div class="social-circle"><i
                                                                                class="{{ $social->social_icon }}"></i>
                                                                        </div>

                                                                    </p>
                                                                    <p class="project_name_0">
                                                                        <a href="{{ $social->social_url }}"
                                                                            target="_blank">{{ $social->social_url }}</a>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="task_desc_0">{{ $social->description }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <div class="media-body text-end icon-state">
                                                                        <label class="switch">
                                                                            <input type="checkbox"
                                                                                {{ $social->status ? 'checked' : '' }}
                                                                                onchange="updateSocialStatus({{ $social->id }}, this.checked)">
                                                                            <span
                                                                                class="switch-state bg-success"></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('sociallinksedit', $social->id) }}"
                                                                        data-bs-original-title="" title="">
                                                                        <i class="icon-pencil-alt"></i>
                                                                    </a>
                                                                    <a class="me-2" href="#" data-bs-original-title=""
                                                                        title=""><svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-link">
                                                                            <path
                                                                                d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71">
                                                                            </path>
                                                                            <path
                                                                                d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71">
                                                                            </path>
                                                                        </svg></a>
                                                                    <a href="#" data-bs-original-title="" title=""><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-more-horizontal">
                                                                            <circle cx="12" cy="12" r="1"></circle>
                                                                            <circle cx="19" cy="12" r="1"></circle>
                                                                            <circle cx="5" cy="12" r="1"></circle>
                                                                        </svg></a>
                                                                    <a href="{{ route('sociallinksdestroy', $social->id) }}"
                                                                        data-bs-original-title="" title=""
                                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $social->id }}').submit();">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-trash-2">
                                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                                            <path
                                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                            </path>
                                                                            <line x1="10" y1="11" x2="10" y2="17">
                                                                            </line>
                                                                            <line x1="14" y1="11" x2="14" y2="17">
                                                                            </line>
                                                                        </svg>
                                                                    </a>

                                                                    <form id="delete-form-{{ $social->id }}"
                                                                        action="{{ route('sociallinksdestroy', $social->id) }}"
                                                                        method="POST" style="display: none;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
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

<div class="container-fluid">
    <div class="email-wrap bookmark-wrap">
        <div class="row">
            <div class="col-xl-12 col-md-12 box-col-12">
                <div class="email-right-aside bookmark-tabcontent">
                    <div class="card email-body radius-left">
                        <div class="ps-0">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                                    aria-labelledby="pills-created-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h5 class="mb-0">Manage Socials</h5>
                                            <a class="btn btn-primary" href="{{ route('sociallinkscreate') }}">
                                                <i data-feather="plus-square"></i> Add New Social
                                            </a>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="taskadd">
                                                @if($socials->isEmpty())
                                                <div class="text-center">
                                                    No records found.
                                                </div>
                                                @else
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody class="ui-sortable" id="draggableMultiples">
                                                            @foreach($socials as $social)
                                                            <tr>
                                                                <td>
                                                                    <h6 class="task_title_0">
                                                                        {{ $social->social_platform_name }}</h6>
                                                                    <p class="project_name_0">
                                                                        <div class="social-circle"><i
                                                                                class="{{ $social->social_icon }}"></i>
                                                                        </div>

                                                                    </p>
                                                                    <p class="project_name_0">
                                                                        <a href="{{ $social->social_url }}"
                                                                            target="_blank">{{ $social->social_url }}</a>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="task_desc_0">{{ $social->description }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <div class="media-body text-end icon-state">
                                                                        <label class="switch">
                                                                            <input type="checkbox"
                                                                                {{ $social->status ? 'checked' : '' }}
                                                                                onchange="updateSocialStatus({{ $social->id }}, this.checked)">
                                                                            <span
                                                                                class="switch-state bg-success"></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('sociallinksedit', $social->id) }}"
                                                                        data-bs-original-title="" title="">
                                                                        <i class="icon-pencil-alt"></i>
                                                                    </a>
                                                                    <a class="me-2" href="#" data-bs-original-title=""
                                                                        title=""><svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-link">
                                                                            <path
                                                                                d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71">
                                                                            </path>
                                                                            <path
                                                                                d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71">
                                                                            </path>
                                                                        </svg></a>
                                                                    <a href="#" data-bs-original-title="" title=""><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-more-horizontal">
                                                                            <circle cx="12" cy="12" r="1"></circle>
                                                                            <circle cx="19" cy="12" r="1"></circle>
                                                                            <circle cx="5" cy="12" r="1"></circle>
                                                                        </svg></a>
                                                                    <a href="{{ route('sociallinksdestroy', $social->id) }}"
                                                                        data-bs-original-title="" title=""
                                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $social->id }}').submit();">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-trash-2">
                                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                                            <path
                                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                            </path>
                                                                            <line x1="10" y1="11" x2="10" y2="17">
                                                                            </line>
                                                                            <line x1="14" y1="11" x2="14" y2="17">
                                                                            </line>
                                                                        </svg>
                                                                    </a>

                                                                    <form id="delete-form-{{ $social->id }}"
                                                                        action="{{ route('sociallinksdestroy', $social->id) }}"
                                                                        method="POST" style="display: none;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
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
</div> -->

<div class="col-xl-12">
    <div class="card">
        <div class="card-header card-no-border">
            <div class="header-top">
                <h5 class="m-0">Manage Socials</h5>

                <a class="btn btn-primary" style="    display: flex;
    gap: 4px;
    font-size: 15px;" href="{{ route('sociallinkscreate') }}">
                    <i data-feather="plus-square"></i> Add New Social
                </a>

                <!-- <div class="card-header-right-icon">
                    <div class="dropdown icon-dropdown">
                    <a class="btn btn-primary" href="{{ route('sociallinkscreate') }}">
                                                <i data-feather="plus-square"></i> Add New Social
                                            </a>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="card-body pt-0 campaign-table">
            <div class="recent-table table-responsive currency-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="f-light">Social Platform</th>
                            <th class="f-light">Name</th>
                            <th class="f-light">URL</th>
                            <th class="f-light">Description</th>
                            <th class="f-light">Status</th>
                            <th class="f-light">Action</th>
                        </tr>
                    </thead>
                    <tbody class="ui-sortable" id="draggableMultiple">
                        @foreach($socials as $social)
                        <tr>
                            <td
                                class="border-icon {{ $social->social_platform_name == 'Facebook' ? 'facebook' : ($social->social_platform_name == 'Instagram' ? 'instagram' : 'pinterest') }}">
                                <div>
                                    @if(strpos($social->social_icon, 'fa ') !== false)
                                    <div class="social-circle"><i class="{{ $social->social_icon }}"></i></div>
                                    @else
                                    <!-- <div class="social-circle"> -->
                                        <img src="{{ asset('storage/social_icons/' . $social->social_icon) }}"
                                            alt="Social Icon" width="50" height="50">
                                    <!-- </div> -->
                                    @endif
                                </div>
                            </td>
                            <td>{{ $social->social_platform_name }}</td>
                            <td> <a href="{{ $social->social_url }}" target="_blank">{{ $social->social_url }}</a></td>
                            <td>
                                {{ $social->description }}
                            </td>
                            <td>
                                <div class="media-body icon-state">
                                    <label class="switch">
                                        <input type="checkbox" {{ $social->status ? 'checked' : '' }}
                                            onchange="updateSocialStatus({{ $social->id }}, this.checked)">
                                        <span class="switch-state bg-success"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('sociallinksedit', $social->id) }}" data-bs-original-title=""
                                    title="">
                                    <i class="icon-pencil-alt"></i>
                                </a>
                                <a href="{{ route('sociallinksdestroy', $social->id) }}" data-bs-original-title=""
                                    title=""
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $social->id }}').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-trash-2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17">
                                        </line>
                                        <line x1="14" y1="11" x2="14" y2="17">
                                        </line>
                                    </svg>
                                </a>

                                <form id="delete-form-{{ $social->id }}"
                                    action="{{ route('sociallinksdestroy', $social->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <!-- <tr>
                            <td class="border-icon instagram">
                                <div>
                                    <div class="social-circle"><i class="fa fa-instagram"></i></div>
                                </div>
                            </td>
                            <td>Floyd Miles</td>
                            <td>DE</td>
                            <td>
                                <div class="change-currency"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trending-down font-danger me-1">
                                        <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                        <polyline points="17 18 23 18 23 12"></polyline>
                                    </svg>12.3%</div>
                            </td>
                            <td>$19,7098</td>
                            <td>
                                <button class="btn badge-light-primary" data-bs-original-title=""
                                    title="">Active</button>
                            </td>
                            <td>
                                <button class="plus-btn" data-bs-original-title="" title="">+ </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-icon pinterest">
                                <div>
                                    <div class="social-circle"><i class="fa fa-pinterest"></i></div>
                                </div>
                            </td>
                            <td>Guy Hawkins</td>
                            <td>ES</td>
                            <td>
                                <div class="change-currency"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trending-up font-success me-1">
                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                        <polyline points="17 6 23 6 23 12"></polyline>
                                    </svg>65.6%</div>
                            </td>
                            <td>$90,986</td>
                            <td>
                                <button class="btn badge-light-primary" data-bs-original-title=""
                                    title="">Active</button>
                            </td>
                            <td>
                                <button class="plus-btn" data-bs-original-title="" title="">+ </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-icon twitter">
                                <div>
                                    <div class="social-circle"><i class="fa fa-twitter"></i></div>
                                </div>
                            </td>
                            <td> Travis Wright</td>
                            <td>ES</td>
                            <td>
                                <div class="change-currency"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trending-down font-danger me-1">
                                        <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                        <polyline points="17 18 23 18 23 12"></polyline>
                                    </svg>35.6%</div>
                            </td>
                            <td>$23,654</td>
                            <td>
                                <button class="btn badge-light-light disabled" data-bs-original-title=""
                                    title="">Inactive</button>
                            </td>
                            <td>
                                <button class="plus-btn" data-bs-original-title="" title="">+ </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-icon you-tube">
                                <div>
                                    <div class="social-circle"><i class="fa fa-youtube-play"></i></div>
                                </div>
                            </td>
                            <td>Mark Green</td>
                            <td>UK</td>
                            <td>
                                <div class="change-currency"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trending-up font-success me-1">
                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                        <polyline points="17 6 23 6 23 12"></polyline>
                                    </svg>45.6%</div>
                            </td>
                            <td>$12,796</td>
                            <td>
                                <button class="btn badge-light-light disabled" type="button" data-bs-original-title=""
                                    title="">Inactive</button>
                            </td>
                            <td>
                                <button class="plus-btn" type="button" data-bs-original-title="" title="">+ </button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container-fluid">
    <div class="email-wrap bookmark-wrap">
        <div class="row">
            <div class="col-xl-12 col-md-12 box-col-12">
                <div class="email-right-aside bookmark-tabcontent">
                    <div class="card email-body radius-left">
                        <div class="ps-0">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                                    aria-labelledby="pills-created-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h5 class="mb-0">Manage Socials</h5>
                                            <a class="btn btn-primary" href="{{ route('sociallinkscreate') }}">
                                                <i data-feather="plus-square"></i> Add New Social
                                            </a>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="taskadd">
                                                @if($socials->isEmpty())
                                                <div class="text-center">
                                                    No records found.
                                                </div>
                                                @else
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Social Platform Name</th>
                                                                <th>Social Icon</th>
                                                                <th>Social URL</th>
                                                                <th>Description</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($socials as $social)
                                                            <tr>
                                                                <td>{{ $social->social_platform_name }}</td>
                                                                <td>
                                                                    <div class="social-circle"><i
                                                                            class="{{ $social->social_icon }}"></i>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $social->social_url }}</td>
                                                                <td>{{ $social->description }}</td>
                                                                <td>
                                                                    <a href="#"><i data-feather="link"></i></a>
                                                                    <a href="#"><i
                                                                            data-feather="more-horizontal"></i></a>
                                                                    <a href="#"><i data-feather="trash-2"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
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
</div> -->
@endsection

@section('script')


<script>
    function updateSocialStatus(socialId, checked) {
        // Send AJAX request to update status
        $.ajax({
            type: 'POST',
            url: '/update-social-status',
            data: {
                id: socialId,
                status: checked ? 1 : 0,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                // Reload the page after successful update
                location.reload();
            },
            error: function (xhr, status, error) {
                // Handle error response if needed
                console.error('Error updating status:', error);
            }
        });
    }

</script>

<script src="{{asset('assets/js/jquery.ui.min.js')}}"></script>
<script src="{{asset('assets/js/dragable/sortable.js')}}"></script>
<script src="{{asset('assets/js/dragable/sortable-custom.js')}}"></script>

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script src="{{asset('assets/js/task/custom.js')}}"></script>
@endsection
