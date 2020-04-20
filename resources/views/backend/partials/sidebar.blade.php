    <aside id="leftsidebar" class="sidebar">

        <!-- Menu -->
        <div class="menu">
            <ul class="list">

                <li class="header">MAIN NAVIGATION</li>
                
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/sliders*') ? 'active' : '' }}">
                    <a href="{{ route('admin.sliders.index') }}">
                        <i class="material-icons">burst_mode</i>
                        <span>Sliders</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/building*') ? 'active' : '' }}">
                    <a href="{{ route('admin.building.index') }}">
                        <i class="material-icons">apartment</i>
                        <span>Buildings</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/house*') ? 'active' : '' }}">
                    <a href="{{ route('admin.house.index') }}">
                        <i class="material-icons">home</i>
                        <span>Houses</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/billing*') ? 'active' : '' }}">
                    <a href="{{ route('admin.billing') }}">
                        <i class="material-icons">attach_money</i>
                        <span>Billing</span>
                    </a>
                </li>

                <!-- <li class="{{ Request::is('admin/building*') or Request::is('admin/house*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">home</i>
                        <span>Property</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ Request::is('admin/building*') ? 'active' : '' }}">
                            <a href="{{ route('admin.building.index') }}">
                                <span>Building</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/house*') ? 'active' : '' }}">
                            <a href="{{ route('admin.house.index') }}">
                                <span>House</span>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <!-- <li class="{{ Request::is('admin/properties*') ? 'active' : '' }}">
                    <a href="{{ route('admin.properties.index') }}">
                        <i class="material-icons">home</i>
                        <span>Property</span>
                    </a>
                </li> -->

                <!-- <li class="{{ Request::is('admin/features*') ? 'active' : '' }}">
                    <a href="{{ route('admin.features.index') }}">
                        <i class="material-icons">star</i>
                        <span>Features</span>
                    </a>
                </li> -->

                <li class="{{ Request::is('admin/services*') ? 'active' : '' }}">
                    <a href="{{ route('admin.services.index') }}">
                        <i class="material-icons">wb_sunny</i>
                        <span>Services</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/testimonials*') ? 'active' : '' }}">
                    <a href="{{ route('admin.testimonials.index') }}">
                        <i class="material-icons">view_carousel</i>
                        <span>Testimonials</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/freestyles*') ? 'active' : '' }}">
                    <a href="{{ route('admin.freestyles.index') }}">
                        <i class="material-icons">view_stream</i>
                        <span>Free Style</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/workstyles*') ? 'active' : '' }}">
                    <a href="{{ route('admin.workstyles.index') }}">
                        <i class="material-icons">view_stream</i>
                        <span>Work Style</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/neverwears*') ? 'active' : '' }}">
                    <a href="{{ route('admin.neverwears.index') }}">
                        <i class="material-icons">view_stream</i>
                        <span>Never Wear Style</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/brands*') ? 'active' : '' }}">
                    <a href="{{ route('admin.brands.index') }}">
                        <i class="material-icons">view_stream</i>
                        <span>Brand Style</span>
                    </a>
                </li>
 
                <li class="{{ Request::is('admin/ages*') ? 'active' : '' }}">
                    <a href="{{ route('admin.ages.index') }}">
                        <i class="material-icons">view_stream</i>
                        <span>Age Kind</span>
                    </a>
                </li>

                
                <li class="{{ Request::is('admin/priceranges*') ? 'active' : '' }}">
                    <a href="{{ route('admin.priceranges.index') }}">
                        <i class="material-icons">view_stream</i>
                        <span>Price Range</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                            <a href="{{ route('admin.settings') }}">
                                <span>Settings</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/changepassword') ? 'active' : '' }}">
                            <a href="{{ route('admin.changepassword') }}">
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                            <a href="{{ route('admin.profile') }}">
                                <span>Profile</span>
                            </a>
                        </li>
<!--                         <li class="{{ Request::is('admin/message*') ? 'active' : '' }}">
                            <a href="{{ route('admin.message') }}">
                                <span>Message</span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                

            </ul>
        </div>
        <!-- #Menu -->
        
    </aside>