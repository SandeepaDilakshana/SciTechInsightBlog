<div class="flapt-sidemenu-wrapper">
    <!-- Desktop Logo -->
    <div class="flapt-logo">
        <a href="{{ route('dashboard') }}"><img class="desktop-logo" src="{{ asset('admin_template/img/core-img/blog.png') }}"
                alt="Desktop Logo"> <img class="small-logo"
                src="{{ asset('admin_template/img/core-img/blogdesktop.png') }}" alt="Mobile Logo"></a>
    </div>

    <!-- Side Nav -->
    <div class="flapt-sidenav" id="flaptSideNav">
    <div class="side-menu-area">
        <nav>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class='bx bx-home-heart'></i><span>Dashboard</span></a>
                </li>

                <li class="{{ Route::is('categories*') ? 'active' : '' }}">
                    <a href="{{ route('categories') }}"><i class='bx bx-collection'></i><span>Categories</span></a>
                </li>

                <li class="{{ Route::is('posts*') ? 'active' : '' }}">
                    <a href="{{ route('posts') }}"><i class='bx bx-news'></i><span>Posts</span></a>
                </li>

                <li class="{{ Route::is('tags*') ? 'active' : '' }}">
                    <a href="{{ route('tags') }}"><i class='bx bx-tag'></i><span>Tags</span></a>
                </li>

                <li class="{{ Route::is('post.create') ? 'active' : '' }}">
                    <a href="{{ route('post.create') }}"><i class='bx bx-plus-circle'></i><span>Add Post</span></a>
                </li>

                @role('admin')
                <li class="{{ Route::is('users*') ? 'active' : '' }}">
                    <a href="{{ route('users') }}"><i class='bx bx-user-circle'></i><span>Users</span></a>
                </li>

                <li class="{{ Route::is('user.create') ? 'active' : '' }}">
                    <a href="{{ route('user.create') }}"><i class='bx bx-user-plus'></i><span>Create New User</span></a>
                </li>

                <li class="{{ Route::is('messages*') ? 'active' : '' }}">
                    <a href="{{ route('messages') }}"><i class='bx bx-envelope'></i><span>Messages</span></a>
                </li>

                <li class="{{ Route::is('env_view') ? 'active' : '' }}">
                    <a href="{{ route('env_view') }}"><i class='bx bx-list-ul'></i><span>Email Configuration</span></a>
                </li>

                <li class="{{ Route::is('settings*') ? 'active' : '' }}">
                    <a href="{{ route('settings') }}"><i class='bx bx-cog'></i><span>Settings</span></a>
                </li>
                @endrole
            </ul>
        </nav>
    </div>
</div>
</div>
