<?php
    function sidebar_tab_active_checker($sidebar_tab_name, $active_sidebar_name){
        if($sidebar_tab_name == $active_sidebar_name){
            echo 'active';
        }
    }

    if(!isset($active_sidebar_name)){
        $active_sidebar_name = '';
    }
?>

<section class="section-sidebar">
        <h3 class="sidebar-title">
            <span class="menu-item-description collapse show">Meню</span>
            <span class="icon icon-menu"></span>
        </h3>
        <ul class="list-menu">
            <li class="{{ sidebar_tab_active_checker('sources', $active_sidebar_name) }}">
                <a href="{{ url('sources_list') }}">
                    <span class="icon icon-data-sources"></span>
                    <span class="menu-item-description collapse show">Источники данных</span>
                </a>
            </li>
            <li class="{{ sidebar_tab_active_checker('search', $active_sidebar_name) }}">
                <a href="{{ url('indicator_search') }}">
                    <span class="icon icon-search-list"></span>
                    <span class="menu-item-description collapse show">Поиск данных</span>
                </a>
            </li>
            <li class="{{ sidebar_tab_active_checker('monitoring', $active_sidebar_name) }}">
                <a href="{{ url('user_indicator_watch_list') }}">
                    <span class="icon icon-monitoring"></span>
                    <span class="menu-item-description collapse show">Мониторинг данных</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/statistics-analysis') }}">
                    <span class="icon icon-statist"></span>
                    <span class="menu-item-description collapse show">Статистика и анализ</span>
                </a>
            </li>
            <li class="{{ sidebar_tab_active_checker('settings', $active_sidebar_name) }}">
                <a href="{{ url('settings') }}">
                    <span class="icon icon-setup"></span>
                    <span class="menu-item-description collapse show">Настройки</span>
                </a>
            </li>
            <li class="{{ sidebar_tab_active_checker('help', $active_sidebar_name) }}">
                <a href="{{ url('help') }}">
                    <span class="icon icon-help"></span>
                    <span class="menu-item-description collapse show">Помощь</span>
                </a>
            </li>
        </ul>
    </section>