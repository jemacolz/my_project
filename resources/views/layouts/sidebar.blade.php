<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('posts.index') }}" class="brand-link">
            <img
                src="{{ asset('images/dora.jpg') }}"
                alt="Logo"
                class="brand-image opacity-75 shadow rounded-circle"
            >

            <span class="brand-text fw-light">AdminLTE 4</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="navigation"
                aria-label="Main navigation"
                data-accordion="false"
                id="navigation"
            >

                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">POSTS</li>

                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-card-list"></i>
                        <p>All Posts</p>
                    </a>
                </li>

                @auth
                    <li class="nav-item">
                        <a href="{{ route('posts.create') }}" class="nav-link">
                            <i class="nav-icon bi bi-plus-circle"></i>
                            <p>Create Post</p>
                        </a>
                    </li>
                @endauth

                <li class="nav-header">ACCOUNT</li>

                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="nav-icon bi bi-box-arrow-in-right"></i>
                            <p>Login</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">
                            <i class="nav-icon bi bi-person-plus"></i>
                            <p>Register</p>
                        </a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                                <i class="nav-icon bi bi-box-arrow-right"></i>
                                <p>Logout</p>
                            </button>
                        </form>
                    </li>
                @endauth

            </ul>
        </nav>
    </div>
</aside>