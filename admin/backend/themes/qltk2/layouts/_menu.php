<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item ">
            <a class="nav-link <?= $this->params['active_menu'] === 'user'?'active':''?> collapsed" href="/admin/user">
                <i class="bi bi-grid"></i>
                <span>User</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link <?= $this->params['active_menu'] === 'give-gift'?'active':''?> collapsed" href="/admin/give-gift">
                <i class="bi bi-gift-fill"></i>
                <span>Give gift</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link <?= $this->params['active_menu'] === 'wheel'?'active':''?> collapsed" href="/admin/wheel">
                <i class="bi bi-bullseye"></i>
                <span>Reward</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link <?= $this->params['active_menu'] === 'price'?'active':''?> collapsed" href="/admin/price-manager">
                <i class="bi bi-currency-dollar"></i>
                <span>Price</span>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link <?= $this->params['active_menu'] === 'spin-price'?'active':''?> collapsed" href="/admin/spin-price">
                <i class="bi bi-cart-plus"></i>
                <span>Buy Spin</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link <?= $this->params['active_menu'] === 'daily-quest'?'active':''?> collapsed" href="/admin/daily-quest-manager">
                <i class="bi bi-calendar-day"></i>
                <span>Daily quest</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link <?= $this->params['active_menu'] === 'grand-quest'?'active':''?> collapsed" href="/admin/grand-quest-manager">
                <i class="bi bi-check-circle"></i>
                <span>Grand quest</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link <?= $this->params['active_menu'] === 'background'?'active':''?> collapsed" href="/admin/config/background">
                <i class="bi bi-image"></i>
                <span>Background</span>
            </a>
        </li>
<!--        <li class="nav-item">-->
<!--            <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">-->
<!--                <i class="bi bi-gear"></i><span>System</span><i class="bi bi-chevron-down ms-auto"></i>-->
<!--            </a>-->
<!--            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">-->
<!--                <li class="--><!--">-->
<!--                    <a href="/admin/danh-muc">-->
<!--                        <i class="bi bi-circle"></i><span>Category</span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="">-->
<!--                    <a href="/admin/cauhinh">-->
<!--                        <i class="bi bi-circle"></i><span>Config</span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="">-->
<!--                    <a href="/admin/phan-quyen">-->
<!--                        <i class="bi bi-circle"></i><span>Permission</span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="">-->
<!--                    <a href="/admin/vai-tro">-->
<!--                        <i class="bi bi-circle"></i><span>Roles</span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="">-->
<!--                    <a href="/admin/chuc-nang">-->
<!--                        <i class="bi bi-circle"></i><span>Feature</span>-->
<!--                    </a>-->
<!--                </li>-->

<!--            </ul>-->
<!--        </li>-->
<!--    </ul>-->

</aside><!-- End Sidebar-->
