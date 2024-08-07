<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(234, 247, 156)">
<a class="navbar-brand" style="margin-left: 25px; width: 250px; height: auto;" href="/questions">
    <img src="/clarifynet.png" alt="Logo" style="width: 100%; height: auto;">
</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="space-x-4" id="navbarNavDropdown" style="margin-left: auto; margin-right:25px;">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/questions">Home</a>
        </li>
        @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.notifications') }}">{{ auth()->user()->unreadNotifications->count() }} Notifications </a>
            </li>
        @endauth
        <li class="nav-item active">
            <a class="nav-link" href="/profile">Profile</a>
        </li>
      </ul>
    </div>
</nav>
