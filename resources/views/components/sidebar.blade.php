 <aside class="left-sidebar sidebar-dark" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/dashboard">
                <img src="{{ asset('theme') }}/images/uniba.png" alt="Mono">
                <span class="brand-name">UNIBA MADURA</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                

                
              <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                  <a class="nav-link" href="/dashboard">
                      <i class="mdi mdi-briefcase-account-outline"></i>
                      <span>Dashboard</span>
                  </a>
              </li>

                 
              <li class="section-title">
                Auth
              </li>

                  
              @php
                $menuItems = [
                    ['label' => 'Contacts', 'url' => 'contacts', 'icon' => 'mdi-briefcase-account-outline'],
                    ['label' => 'Team', 'url' => 'team', 'icon' => 'mdi-briefcase-account-outline'],
                    // Tambahkan menu lainnya di sini
                ];
                $activeClass = 'active';
            @endphp

            @foreach ($menuItems as $menuItem)
                <li class="nav-item {{ Request::is($menuItem['url']) ? $activeClass : '' }}">
                    <a class="nav-link" href="{{ url($menuItem['url']) }}">
                        <i class="mdi {{ $menuItem['icon'] }}"></i>
                        <span>{{ $menuItem['label'] }}</span>
                    </a>
                </li>
            @endforeach

              
                  {{-- <li>
                    <a class="sidenav-item-link" href="{{ asset('theme') }}/calendar.html">
                      <i class="mdi mdi-calendar-check"></i>
                      <span class="nav-text">Calendar</span>
                    </a>
                  </li> --}}
                

                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#email"
                      aria-expanded="false" aria-controls="email">
                      <i class="mdi mdi-email"></i>
                      <span class="nav-text">email</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="email"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/email-inbox.html">
                                <span class="nav-text">Email Inbox</span>
                                
                              </a>
                            </li>
                          
                            <li>
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/email-details.html">
                                <span class="nav-text">Email Details</span>
                                
                              </a>
                            </li>
                    
                            <li>
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/email-compose.html">
                                <span class="nav-text">Email Compose</span>
                                
                              </a>
                            </li>

                      </div>
                    </ul>
                  </li>
                      
                  <li class="section-title">
                    UI Elements
                  </li>

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#ui-elements"
                      aria-expanded="false" aria-controls="ui-elements">
                      <i class="mdi mdi-folder-outline"></i>
                      <span class="nav-text">UI Components</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="ui-elements"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/alert.html">
                                <span class="nav-text">Alert</span>
                                
                              </a>
                            </li>
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/badge.html">
                                <span class="nav-text">Badge</span>
                                
                              </a>
                            </li>

                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/breadcrumb.html">
                                <span class="nav-text">Breadcrumb</span>
                                
                              </a>
                            </li>
                          

                        <li  class="has-sub" >
                          <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#buttons"
                            aria-expanded="false" aria-controls="buttons">
                            <span class="nav-text">Buttons</span> <b class="caret"></b>
                          </a>
                          <ul  class="collapse"  id="buttons">
                            <div class="sub-menu">
                              
                              <li >
                                <a href="{{ asset('theme') }}/button-default.html">Button Default</a>
                              </li>
                              
                              <li >
                                <a href="{{ asset('theme') }}/button-dropdown.html">Button Dropdown</a>
                              </li>
                              
                              <li >
                                <a href="{{ asset('theme') }}/button-group.html">Button Group</a>
                              </li>
                              
                              <li >
                                <a href="{{ asset('theme') }}/button-social.html">Button Social</a>
                              </li>
                              
                              <li >
                                <a href="{{ asset('theme') }}/button-loading.html">Button Loading</a>
                              </li>
                              
                            </div>
                          </ul>
                        </li>
                        
  
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/card.html">
                                <span class="nav-text">Card</span>
                                
                              </a>
                            </li>
                          
                          <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/carousel.html">
                                <span class="nav-text">Carousel</span>
                                
                              </a>
                            </li>
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/collapse.html">
                                <span class="nav-text">Collapse</span>
                                
                              </a>
                            </li>
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/editor.html">
                                <span class="nav-text">Editor</span>
                                
                              </a>
                            </li>
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/list-group.html">
                                <span class="nav-text">List Group</span>
                                
                              </a>
                            </li>

                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/modal.html">
                                <span class="nav-text">Modal</span>
                                
                              </a>
                            </li>
                          
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/pagination.html">
                                <span class="nav-text">Pagination</span>
                                
                              </a>
                            </li>
                            
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/popover-tooltip.html">
                                <span class="nav-text">Popover & Tooltip</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/progress-bar.html">
                                <span class="nav-text">Progress Bar</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/spinner.html">
                                <span class="nav-text">Spinner</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/switches.html">
                                <span class="nav-text">Switches</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                        <li  class="has-sub" >
                          <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#tables"
                            aria-expanded="false" aria-controls="tables">
                            <span class="nav-text">Tables</span> <b class="caret"></b>
                          </a>
                          <ul  class="collapse"  id="tables">
                            <div class="sub-menu">
                              
                              <li >
                                <a href="{{ asset('theme') }}/bootstarp-tables.html">Bootstrap Tables</a>
                              </li>
                              
                              <li >
                                <a href="{{ asset('theme') }}/data-tables.html">Data Tables</a>
                              </li>
                              
                            </div>
                          </ul>
                        </li>
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/tab.html">
                                <span class="nav-text">Tab</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/toaster.html">
                                <span class="nav-text">Toaster</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                        <li  class="has-sub" >
                          <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#icons"
                            aria-expanded="false" aria-controls="icons">
                            <span class="nav-text">Icons</span> <b class="caret"></b>
                          </a>
                          <ul  class="collapse"  id="icons">
                            <div class="sub-menu">
                              
                              <li >
                                <a href="{{ asset('theme') }}/material-icons.html">Material Icon</a>
                              </li>
                              
                              <li >
                                <a href="{{ asset('theme') }}/flag-icons.html">Flag Icon</a>
                              </li>
                              
                            </div>
                          </ul>
                        </li>
                        

                        
                        
                        <li  class="has-sub" >
                          <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#forms"
                            aria-expanded="false" aria-controls="forms">
                            <span class="nav-text">Forms</span> <b class="caret"></b>
                          </a>
                          <ul  class="collapse"  id="forms">
                            <div class="sub-menu">
                              
                              <li >
                                <a href="{{ asset('theme') }}/basic-input.html">Basic Input</a>
                              </li>
                              
                              <li >
                                <a href="{{ asset('theme') }}/input-group.html">Input Group</a>
                              </li>
                              
                              <li >
                                <a href="{{ asset('theme') }}/checkbox-radio.html">Checkbox & Radio</a>
                              </li>
                              
                              <li >
                                <a href="{{ asset('theme') }}/form-validation.html">Form Validation</a>
                              </li>
                              
                              <li >
                                <a href="{{ asset('theme') }}/form-advance.html">Form Advance</a>
                              </li>
                              
                            </div>
                          </ul>
                        </li>
                        

                        
                        
                        <li  class="has-sub" >
                          <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#maps"
                            aria-expanded="false" aria-controls="maps">
                            <span class="nav-text">Maps</span> <b class="caret"></b>
                          </a>
                          <ul  class="collapse"  id="maps">
                            <div class="sub-menu">
                              
                              <li >
                                <a href="{{ asset('theme') }}/google-maps.html">Google Map</a>
                              </li>
                              
                              <li >
                                <a href="{{ asset('theme') }}/vector-maps.html">Vector Map</a>
                              </li>
                              
                            </div>
                          </ul>
                        </li>
                        

                        
                        
                        <li  class="has-sub" >
                          <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#widgets"
                            aria-expanded="false" aria-controls="widgets">
                            <span class="nav-text">Widgets</span> <b class="caret"></b>
                          </a>
                          <ul  class="collapse"  id="widgets">
                            <div class="sub-menu">
                              
                              <li >
                                <a href="{{ asset('theme') }}/widgets-general.html">General Widget</a>
                              </li>
                              
                              <li >
                                <a href="{{ asset('theme') }}/widgets-chart.html">Chart Widget</a>
                              </li>
                              
                            </div>
                          </ul>
                        </li>
                        

                        
                      </div>
                    </ul>
                  </li>
                

                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#charts"
                      aria-expanded="false" aria-controls="charts">
                      <i class="mdi mdi-chart-pie"></i>
                      <span class="nav-text">Charts</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="charts"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/apex-charts.html">
                                <span class="nav-text">Apex Charts</span>
                                
                              </a>
                            </li>
                          
                        

                        
                      </div>
                    </ul>
                  </li>
                

                

                
                  <li class="section-title">
                    Pages
                  </li>
                

                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#users"
                      aria-expanded="false" aria-controls="users">
                      <i class="mdi mdi-image-filter-none"></i>
                      <span class="nav-text">User</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="users"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/user-profile.html">
                                <span class="nav-text">User Profile</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/user-activities.html">
                                <span class="nav-text">User Activities</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/user-profile-settings.html">
                                <span class="nav-text">User Profile Settings</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/user-account-settings.html">
                                <span class="nav-text">User Account Settings</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/user-planing-settings.html">
                                <span class="nav-text">User Planing Settings</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/user-billing.html">
                                <span class="nav-text">User billing</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/user-notify-settings.html">
                                <span class="nav-text">User Notify Settings</span>
                                
                              </a>
                            </li>
                          
                        

                        
                      </div>
                    </ul>
                  </li>
                

                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#authentication"
                      aria-expanded="false" aria-controls="authentication">
                      <i class="mdi mdi-account"></i>
                      <span class="nav-text">Authentication</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="authentication"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/sign-in.html">
                                <span class="nav-text">Sign In</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/sign-up.html">
                                <span class="nav-text">Sign Up</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/reset-password.html">
                                <span class="nav-text">Reset Password</span>
                                
                              </a>
                            </li>
                          
                        

                        
                      </div>
                    </ul>
                  </li>
                

                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#other-page"
                      aria-expanded="false" aria-controls="other-page">
                      <i class="mdi mdi-file-multiple"></i>
                      <span class="nav-text">Other pages</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="other-page"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/invoice.html">
                                <span class="nav-text">Invoice</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/404.html">
                                <span class="nav-text">404 page</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/page-comingsoon.html">
                                <span class="nav-text">Coming Soon</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/page-maintenance.html">
                                <span class="nav-text">Maintenance</span>
                                
                              </a>
                            </li>
                          
                        

                        
                      </div>
                    </ul>
                  </li>
                

                

                
                  <li class="section-title">
                    Documentation
                  </li>
                

                

                
                  <li
                   >
                    <a class="sidenav-item-link" href="{{ asset('theme') }}/getting-started.html">
                      <i class="mdi mdi-airplane"></i>
                      <span class="nav-text">Getting Started</span>
                    </a>
                  </li>
                

                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="{{ asset('theme') }}/javascript:void(0)" data-toggle="collapse" data-target="#customization"
                      aria-expanded="false" aria-controls="customization">
                      <i class="mdi mdi-square-edit-outline"></i>
                      <span class="nav-text">Customization</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="customization"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/navbar-customization.html">
                                <span class="nav-text">Navbar</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/sidebar-customization.html">
                                <span class="nav-text">Sidebar</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{ asset('theme') }}/styling.html">
                                <span class="nav-text">Styling</span>
                                
                              </a>
                            </li>
                          
                        

                        
                      </div>
                    </ul>
                  </li>
                

                
              </ul>

            </div>

            <div class="sidebar-footer">
              <div class="sidebar-footer-content">
                <ul class="d-flex">
                  <li>
                    <a href="{{ asset('theme') }}/user-account-settings.html" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a></li>
                  <li>
                    <a href="{{ asset('theme') }}/#" data-toggle="tooltip" title="No chat messages"><i class="mdi mdi-chat-processing"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </aside>
