<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <img src="{{asset('/AdminAssets/app-assets/images/logo/logo.png')}}" width="90%" />
            <!-- <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li> -->
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="@if(isset($active) && $active == 'panelHome') active @endif nav-item" >
                <a class="d-flex align-items-center" href="{{route('admin.index')}}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="{{trans('common.PanelHome')}}">
                        الرئيسية
                    </span>
                </a>
            </li>
            <li class="nav-item @if(isset($active) && $active == 'setting') active @endif">
                <a class="d-flex align-items-center" href="{{route('admin.settings.general')}}">
                    <i data-feather='settings'></i>
                    <span class="menu-title text-truncate" data-i18n="{{trans('common.setting')}}">
                        الإعدادات
                    </span>
                </a>
            </li>

            <li class=" nav-item @if(isset($active) && $active == 'courses') active @endif">
                <a class="d-flex align-items-center" href="{{ route('admin.courses') }}">
                    <i data-feather="book-open"></i>
                    <span class="menu-title text-truncate" data-i18n="#">
                        الدورات
                    </span>
                </a>
            </li>
            <li class=" nav-item @if(isset($active) && $active == 'videos') active @endif">
                <a class="d-flex align-items-center" href="{{ route('admin.videos') }}">
                    <i data-feather="book-open"></i>
                    <span class="menu-title text-truncate" data-i18n="#">
                        الفيديوهات
                    </span>
                </a>
            </li>
            <li class=" nav-item @if(isset($active) && $active == 'reviews') active @endif">
                <a class="d-flex align-items-center" href="{{ route('admin.reviews') }}">
                    <i data-feather="book-open"></i>
                    <span class="menu-title text-truncate" data-i18n="#">
                        التقييمات
                    </span>
                </a>
            </li>

            <li class="nav-item @if(isset($active) && $active == 'contactMessages') active @endif">
                <a class="d-flex align-items-center" href="{{route('admin.contactmessages')}}">
                    <i data-feather='help-circle'></i>
                    <span class="menu-title text-truncate" data-i18n="#">
                        رسائل اتصل بنا
                    </span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
