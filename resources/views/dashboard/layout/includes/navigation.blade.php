<ul class="metismenu" id="menu">
    <li>
        <a href="{{ route('admin.dashboard') }}">
            <div class="parent-icon">
                <ion-icon name="home-sharp"></ion-icon>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li class="menu-label">Elements</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
                <ion-icon name="bag-handle-sharp"></ion-icon>
            </div>
            <div class="menu-title">Blank</div>
        </a>
        <ul>
            <li><a href="{{ route('admin.blank.index') }}">
                    <ion-icon name="ellipse-outline"></ion-icon>Index
                </a>
            </li>
            <li><a href="{{ route('admin.blank.create') }}">
                    <ion-icon name="ellipse-outline"></ion-icon>create
                </a>
            </li>
        </ul>
    </li>
{{-- settings --}}
<li>
    <a href="javascript:;" class="has-arrow">
        <div class="parent-icon">
            <ion-icon name="bag-handle-sharp"></ion-icon>
        </div>
        <div class="menu-title">Settings</div>
    </a>
    <ul>
        <li><a href="{{ route('admin.role.index') }}" >
                <ion-icon name="ellipse-outline"></ion-icon>Roles & Permission
            </a>
        </li>
        <li><a href="{{ route('admin.blank.create') }}">
                <ion-icon name="ellipse-outline"></ion-icon>create
            </a>
        </li>
    </ul>
</li>

    <li class="menu-label">Others</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon">
                <ion-icon name="list-sharp"></ion-icon>
            </div>
            <div class="menu-title">Menu Levels</div>
        </a>
        <ul>
            <li> <a class="has-arrow" href="javascript:;">
                    <ion-icon name="ellipse-outline"></ion-icon>Level One
                </a>
                <ul>
                    <li> <a class="has-arrow" href="javascript:;">
                            <ion-icon name="ellipse-outline"></ion-icon>Level Two
                        </a>
                        <ul>
                            <li> <a href="javascript:;">
                                    <ion-icon name="ellipse-outline"></ion-icon>Level Three
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" target="_blank">
            <div class="parent-icon">
                <ion-icon name="document-text-sharp"></ion-icon>
            </div>
            <div class="menu-title">Documentation</div>
        </a>
    </li>
</ul>
