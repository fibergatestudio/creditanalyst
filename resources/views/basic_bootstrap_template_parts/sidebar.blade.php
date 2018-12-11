<?php
    function sidebar_tab_active_checker($sidebar_tab_name, $active_sidebar_name){
        if($sidebar_tab_name == $active_sidebar_name){
            echo 'active';
        }
    }
?>
<ul class="list-group">
    <a href="{{ url('sources_list') }}">
        <li class="list-group-item {{ sidebar_tab_active_checker('sources',$active_sidebar_name) }}">Источники данных</li>
    </a>
    <a href="{{ url('indicator_search') }}">
        <li class="list-group-item {{ sidebar_tab_active_checker('search',$active_sidebar_name) }}">Поиск данных</li>
    </a>
    <a href="{{ url('user_indicator_watch_list') }}">
        <li class="list-group-item {{ sidebar_tab_active_checker('monitoring',$active_sidebar_name) }}">Мониторинг</li>
    </a>

    <a href="{{ url('notifications') }}">
        <li class="list-group-item d-flex justify-content-between align-items-center {{ sidebar_tab_active_checker('notifications',$active_sidebar_name) }}">Уведомления
        
        </li>
        
    </a>

    <a href="{{ url('admin/charts') }}">
        <li class="list-group-item {{ sidebar_tab_active_checker('',$active_sidebar_name) }}">Построение графика</li>
    </a>

    <a href="{{ url('user_logout') }}">
        <li class="list-group-item">Выход</li>
    </a>
</ul>