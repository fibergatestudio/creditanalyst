<header class="header">
        <img src="{{ url('mercurial/images/logo.png') }}" class="logo" alt="logo">        
             {{-- Форма поиска (Поиск в шапке несет такуюже функцию как поиск данных)--}}
            <form class="form-inline form-search" method="POST" action="{{ url('indicator_search_post') }} ">
             @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control typeahead input-lg" placeholder="@lang('indicator_search.Введите поисковый запрос')" name="search_query" style="width: 500px">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><span class="icon icon-search"></span></button>
                    </div>
                </div>

            </form>
            {{-- Конец формы --}}

                  
        {{--<form class="form-inline form-search">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="@lang('indicator_search.Введите поисковый запрос')">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"><span class="icon icon-search"></span></button>
                </div>
            </div>
        </form>--}}
        <ul class="block-right">
            @if(Auth::user()->isAdmin())
                <li class="icon icon-admin">
                    <a href="{{ url('/admin_user_management/index') }}" class="top-icon-admin">Админ</a>
                </li>
            @endif
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
 @section('scripts')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    {{-- Typeahead JS --}}
    <script src="{{ url('assets/typeahead.bundle.js') }}"></script>

    <script>
        var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function(i, str) {
            if (substrRegex.test(str)) {
                matches.push(str);
            }
            });

            cb(matches);
        };
        };

        // Сделать прогрузку по API

        var hints = [];
        $( document ).ready(function() {

            $.getJSON("{{ url('ajax/indicator_hints') }}", function(data){
                for (var i = 0, len = data.length; i < len; i++) {
                    //console.log(data[i]);
                    hints.push(data[i]);
                }
            });

        });



        //var states = ['Объёмы производства картошки в Украине'];

        $('.typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'hints',
            source: substringMatcher(hints)
        });
    </script>

    <style>
        .tt-menu{
            background-color: white;
            border: 1px solid grey;
        }
    </style>
@endsection   