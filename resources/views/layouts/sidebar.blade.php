<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="{{ route('/')}}"><img class="img-fluid for-light"
                    src="{{ asset('assets/images/logo/logo.png') }}" alt=""><img class="img-fluid for-dark"
                    src="{{ asset('assets/images/logo/logo_dark.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('/')}}"><img class="img-fluid"
                    src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('index')}}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg><span>Dashboard</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('wallet')}}">
                            <svg class="stroke-icon svg-fill">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#profit') }}"></use>
                            </svg>
                            <span>Wallet</span>
                        </a></li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-project') }}"></use>
                            </svg><span>Orders </span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('orderslistings')}}">Order List</a></li>
                            <li><a href="{{ route('ordercreate')}}">Create new</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-ecommerce') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-ecommerce') }}"></use>
                            </svg><span>Products </span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('products')}}">Manage Products</a></li>
                            <li><a href="{{ route('product_categories')}}">Categories</a></li>
                            <li><a href="{{ route('product_groups')}}">Products Group</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-social') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-social') }}"></use>
                            </svg><span>Socials </span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('sociallinks')}}">Manage Links</a></li>
                            <li><a href="#">link products to social media</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list"><a href="{{ route('feedbackscreate')}}" class="sidebar-link sidebar-title">
                            <svg class="stroke-icon svg-fill">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-support-tickets') }}"></use>
                            </svg>
                            <span>Feedback</span>
                        </a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title">
                            <svg class="stroke-icon svg-fill">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-learning') }}"></use>
                            </svg>
                            <span>Learn</span>
                        </a></li>
                    <li class="sidebar-list"><a href="{{ route('affiliates')}}" class="sidebar-link sidebar-title">
                            <svg class="stroke-icon svg-fill">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#profit') }}"></use>
                            </svg>
                            <span>Affiliates</span>
                        </a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('store_settings')}}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-editors') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-editors') }}"></use>
                            </svg>
                            <span>Settings</span>
                        </a></li>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
