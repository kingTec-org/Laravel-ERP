@if (session('whoIsLoggedIn') == 'admin') @php $menus = $adminMenus; @endphp @else @php $menus = $instructorMenus; @endphp @endif
<div class="sidebar" id="ix" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <div class="sidebar-panel">
            @foreach ($menus as $k => &$menu)
            <div class="panel panel-info">
                <div class="panel-heading">
                    <a data-toggle="collapse" href="#collapse{{ $k }}"><i class="{{ $menu->icon->icon_path or null }}"></i> <strong>{{ $menu->menu_name }}</strong></a>
                </div>
                <div class="panel-body panel-collapse collapse in" id="collapse{{ $k }}">
                    <ul class="nav" id="side-menu">
                        @foreach ($submenus->where('menu_id',$menu->id) as $submenu)
                        <li><a href="{{ url($submenu->link) }}"><i class="{{ $submenu->icon->icon_path or null }}"></i> <span>{{ $submenu->menu_name }}</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>