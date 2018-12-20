<header class="header">
        <img src="{{ url('mercurial/images/logo.png') }}" class="logo" alt="logo">
        <form class="form-inline form-search">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Введите поисковый запрос">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"><span class="icon icon-search"></span></button>
                </div>
            </div>
        </form>
        <ul class="block-right">
            <li class="icon 
                @if(Auth::user()->get_active_notifications_count() > 0)
                    icon-alarm-active
                @else
                    icon-alarm
                @endif
                "
                >
                <a href="#" class="active">{{ Auth::user()->get_active_notifications_count() }}</a>
            </li>
            <li class="icon icon-user">
                <a href="#">{{ Auth::user()->email }}</a>
            </li>
        </ul>
        
    </header>