<div class="navbar-custom-menu" style="background:#26b1b0;">

        <ul class="nav navbar-nav">
            <li>
                @if(Auth::check())
                    <a href="#">Logout</a>
                    @else
                    <a href="#">login</a>
                @endif

            </li>
        </ul>

</div>
