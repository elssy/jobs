<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header" style="background-color: #ffffff;">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu" >
        <img class="navbar-brand-logo" src="../../assets/images/dots-logo.png" title="logo">

      </div>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button>
    </div>
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="nav-item hidden-float" id="toggleMenubar">
            <a class="nav-link" data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
            </a>
          </li>
          <li class="nav-item hidden-sm-down" id="toggleFullscreen">
            <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
              <span class="sr-only">Toggle fullscreen</span>
            </a>
          </li>
          <li style="margin-top: 19px; font-size: 20px;">
            <label><b>Finance Department</b></label>
          </li>
         

        </ul>
        <!-- End Navbar Toolbar -->
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          
          <li style="width: 70px; margin-top: 20px; font-size: 17px;">
              <b><?php echo $_SESSION['GuyJob3']; ?></b>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
            aria-expanded="false" data-animation="scale-up" role="button">
              <i class="icon wb-bell" aria-hidden="true"></i>
              <span class="badge badge-pill badge-danger up">5</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
              <div class="dropdown-menu-header">
                <h5>NOTIFICATIONS</h5>
                <span class="badge badge-round badge-danger">New 5</span>
              </div>
              <div class="list-group">
                <div data-role="container">
                  <div data-role="content">
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">A new order has been placed</h6>
                          <time class="media-meta" datetime="2017-06-12T20:50:48+08:00">5 hours ago</time>
                        </div>
                      </div>
                    </a>
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Completed the task</h6>
                          <time class="media-meta" datetime="2017-06-11T18:29:20+08:00">2 days ago</time>
                        </div>
                      </div>
                    </a>
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Settings updated</h6>
                          <time class="media-meta" datetime="2017-06-11T14:05:00+08:00">2 days ago</time>
                        </div>
                      </div>
                    </a>
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Event started</h6>
                          <time class="media-meta" datetime="2017-06-10T13:50:18+08:00">3 days ago</time>
                        </div>
                      </div>
                    </a>
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Message received</h6>
                          <time class="media-meta" datetime="2017-06-10T12:34:48+08:00">3 days ago</time>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="dropdown-menu-footer">
                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                  <i class="icon md-settings" aria-hidden="true"></i>
                </a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    All notifications
                  </a>
              </div>
            </div>
          </li>
          
          <li class="nav-item" id="toggleChat">
            
            <a class="nav-link" data-toggle="site-sidebar" href="javascript:void(0)" title="Chat"
            data-url="../site-sidebar.php">
              <i class="icon wb-chat" aria-hidden="true"></i>
              <span class="badge badge-pill badge-info up">3</span>
            </a>
          </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon wb-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
              data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
  <div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
         <ul class="site-menu" data-plugin="menu">
            <li class="site-menu-category">Payroll Management</li>
            <li class="site-menu-item">
              <a href="index.php">
                <i class="fa fa-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title"> Payrolls</i></span>
                
              </a>
            </li>
            <li class="site-menu-item">
                  <a class="animsition-link" href="clients.php">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="site-menu-title"> Clients </span>
                    
                  </a>
                  
            </li>
            <li class="site-menu-item">
                  <a class="animsition-link" href="invoices.php">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span class="site-menu-title"> Invoices </span>
                    
                  </a>
                  
            </li>

            <li class="site-menu-item">
                  <a class="animsition-link" href="quotations.php">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span class="site-menu-title"> Quotations</span>
                    
                  </a>
            </li>
            <li class="site-menu-item">
                  <a class="animsition-link" href="approved.php">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    <span class="site-menu-title"> Approved Advances</span>
                    
                  </a>
            </li>
            <li class="site-menu-item">
                  <a class="animsition-link" href="dispatch.php">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    <span class="site-menu-title"> Dispatch Jobs</span>
                    
                  </a>
            </li>
            <li class="site-menu-item">
                  <a class="animsition-link" href="leave.php">
                    <i class="fa fa-fighter-jet" aria-hidden="true"></i>
                    <span class="site-menu-title">Leave</span>
                    
                  </a>
            </li>
            <li class="site-menu-item">
                  <a class="animsition-link" href="advance.php">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span class="site-menu-title">Advance</span>
                    
                  </a>
            </li>
                
             
          </ul>
          
        </div>
      </div>
    </div>
    <div class="site-menubar-footer">
     <a href="newquotation.php" data-placement="top" data-toggle="tooltip" data-original-title="Add new Quotation">
        <span class="fa fa-plus" aria-hidden="true"></span>
      </a>
       <a href="#" class="fold-show" data-placement="top" data-toggle="tooltip"
      data-original-title="">
        <span class="" aria-hidden="false"></span>
      </a>
      <a href="logout.php" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
        <span class="icon wb-power" aria-hidden="true"></span>
      </a>
    </div>
  </div>