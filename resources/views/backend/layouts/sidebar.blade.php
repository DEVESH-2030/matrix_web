
     <!-- ! Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-start">
            <div class="sidebar-head">
                <a href="{{ route('dashboard') }}" class="logo-wrapper" title="Home">
                    <span class="sr-only">Home</span>
                    <span class="icon logo" aria-hidden="true"></span>
                    {{-- <picture><source srcset="{{ asset('img/svg/deftsoft-logo.svg')}}" type="image/webp"><img src="{{ asset('img/svg/deftsoft-logo.svg')}}" alt=""></picture> --}}
                    <div class="logo-text">
                        <span class="logo-title">Matrix</span>
                        <span class="logo-subtitle">Dashboard</span>
                    </div>
                </a>
                <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                    <span class="sr-only">Toggle menu</span>
                    <span class="icon menu-toggle" aria-hidden="true"></span>
                </button>
            </div>

            <div class="sidebar-body">
                <ul class="sidebar-body-menu">
                    <li>
                        <a class="active" href="{{ route('dashboard')}}"><span class="icon home" aria-hidden="true"></span> <i class="fas fa-tachometer-alt"></i> &nbsp; Dashboard</a>
                    </li>
                    <li>
                        <a href=""><span class="icon user-3" aria-hidden="true"></span> <i class="fas fa-user"></i> &nbsp; Student</a>
                    </li>
                    <li>
                        <a href=""><span class="icon home" aria-hidden="true"></span> <i class="fas fa-home"></i> &nbsp; University</a>
                    </li>
                </ul>
                <span class="system-menu__title">system</span>
                <ul class="sidebar-body-menu">
                    <li>
                        <a class="show-cat-btn" href="##">
                            <span class="icon user-3" aria-hidden="true"></span> <i class="fas fa-users-cog"></i> &nbsp; Manage User
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a href="{{ route('users') }}"> <i class="fas fa-users"></i> &nbsp; Users</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><span class="icon setting" aria-hidden="true"></span> <i class="fas fa-cogs"></i> &nbsp; Settings</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="sidebar-footer">
            <a href="##" class="sidebar-user">
                <span class="sidebar-user-img">
                    <picture><source srcset="{{ asset('img/avatar/avatar-illustrated-01.webp')}}" type="image/webp"><img src="{{ asset('img/avatar/avatar-illustrated-01.png')}}" alt="User name"></picture>
                </span>
                <div class="sidebar-user-info">
                    <span class="sidebar-user__title">Dee Sh.</span>
                    <span class="sidebar-user__subtitle">Support manager</span>
                </div>
            </a>
        </div>
    </aside>