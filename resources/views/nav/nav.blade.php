<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Tciket Service</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{Route::currentRouteName()=='home' ? 'active' : ''}}" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                @if(Auth::check() && Auth::user())
                <li class="nav-item">
                    <a class="nav-link {{Request::is('ticket*') ? 'active' :''}}" href="{{route('ticket.index')}}">Ticket</a>
                </li>
                @endif
                @if(!Auth::check() && !Auth::user())
                <li class="nav-item">
                    <a class="nav-link {{Request::is('admin*') ? 'active' :''}}" href="{{route('admin.loginPage')}}">Admin</a>
                </li>
                @endif
                @if(!Auth::check() && !Auth::user())
                <li class="nav-item">
                    <a class="nav-link {{Request::is('user*') ? 'active' :''}}" href="{{route('user.login')}}">User</a>
                </li>
                @endif
                @if(Auth::check() && Auth::user())
                <li class="nav-item">
                    <a class="nav-link {{Request::is('user*') ? 'active' :''}}" id='logoutBtn' href='#'>Logout</a>
                    <form action="{{route('admin.logout')}}" id='logoutForm' method="post">@csrf</form>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<script>
    let logoutBtn = document.getElementById('logoutBtn');
    let logoutForm = document.getElementById('logoutForm');
    logoutBtn.addEventListener('click',function(e){
        e.preventDefault();
        logoutForm.submit();
    })
</script>