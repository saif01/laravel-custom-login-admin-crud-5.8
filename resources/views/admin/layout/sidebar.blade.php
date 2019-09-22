<div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">


                <li class="has-sub nav-item"><a href="#"><i class="ft-aperture"></i><span data-i18n="" class="menu-title">Admin Section</span></a>
                <ul class="menu-content">
                  <li><a href="{{ url('/admin/add') }}" class="menu-item">Admin Add</a></li>
                  <li><a href="{{ url('/admin/all') }}" class="menu-item">Admin All</a></li>

                </ul>
              </li>

              <li class="nav-item"><a href="{{ url('/blank') }}"><i class="ft-droplet"></i><span data-i18n="" class="menu-title">Blank Page</span></a>
              </li>

              <li class="has-sub nav-item"><a href="#"><i class="ft-aperture"></i><span data-i18n="" class="menu-title">UI Kit</span></a>
                <ul class="menu-content">
                  <li><a href="grids.html" class="menu-item">Grid</a>
                  </li>

                  <li class="has-sub"><a href="#" class="menu-item">Icons</a>
                    <ul class="menu-content">
                      <li><a href="feather.html" class="menu-item">Feather Icon</a>
                      </li>

                    </ul>
                  </li>
                </ul>
              </li>
            <li class="nav-item">
                <a href="{{ route('admin.logout') }}"><i class="ft-log-out red"></i><span data-i18n="" class="menu-title">Logout</span></a>
            </li>

            </ul>
          </div>
        </div>
