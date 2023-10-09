<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand text-white m-3"><span class="ps-5 fs-4">SendWiz</span></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

        @if (Auth::guard('admin')->check())
            <ul class="navbar-nav navbar-sidenav flex-column bg-dark Dashboard-sidebar">
                <li class="nav-item mt-4" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link text-center" href="{{ route('admin.dashboard') }}">
                        <span class="nav-link-text fs-4" href=".">DashBoard
                        </span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="{{ route('admin.dashboard.userControlPanel') }}">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">User Account</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"
                        href="{{ route('admin.dashboard.campaignControlPanel') }}" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Campaign</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"
                        href="{{ route('admin.dashboard.RecipientControlPanel') }}" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Recipient</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"
                        href="{{ route('admin.dashboard.TemplatePanel') }}" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Templates</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"
                        href="{{ route('admin.dashboard.LaunchCampaignPanel') }}" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">LaunchCampaign</span>
                    </a>
                </li>
            </ul>
        @endif
        @if (Auth::guard('web')->check())
            <ul class="navbar-nav navbar-sidenav flex-column bg-dark Dashboard-sidebar">
                <li class="nav-item mt-4" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link text-center" href="{{ route('auth.dashboard') }}">
                        <span class="nav-link-text fs-4" href=".">Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">User Accounts</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"
                        data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Campaign</span>
                    </a>
                </li>
            </ul>
        @endif

        <ul class="navbar-nav ms-auto pe-5">
            <li class="nav-item text-white me-3 mt-1">
                {{ Auth::user()->name }}
            </li>
            <li class="nav-item ">
                <form method="POST" action="{{ route('auth.logout') }}">
                    @csrf
                    <button class="btn btn-sm btn-primary w-full w-lg-auto" type="submit">Log
                        Out</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
