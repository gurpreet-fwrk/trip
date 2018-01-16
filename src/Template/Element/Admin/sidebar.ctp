<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if($loggeduser['image'] != ''){ ?>
            <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo $loggeduser['image']; ?>" class="img-circle" />
            <?php }else{ ?>
            <img src="<?php echo $this->request->webroot; ?>images/users/noimage.png" class="img-circle" />
            <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $loggeduser['first_name'].' '.$loggeduser['last_name'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="active">
          <a href="<?php echo $this->request->webroot; ?>admin/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li>
          <a href="<?php echo $this->request->webroot; ?>admin/users">
            <i class="fa fa-user"></i> <span>Users</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <!-- <li>
          <a href="<?php echo $this->request->webroot; ?>admin/contacts">
            <i class="fa fa-phone"></i> <span>Contact Us</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li>
          <a href="<?php echo $this->request->webroot; ?>admin/staticpages">
            <i class="fa fa-book"></i> <span>Static Pages</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li>
          <a href="<?php echo $this->request->webroot; ?>admin/homesections">
            <i class="fa fa-home"></i> <span>Homepage Sections</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li>
          <a href="<?php echo $this->request->webroot; ?>admin/reviews">
            <i class="fa fa-signal"></i> <span>Review And Rating</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li>
          <a href="<?php echo $this->request->webroot; ?>admin/links">
            <i class="fa fa-link"></i> <span>Social Links</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bicycle"></i> <span>Trips</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->request->webroot; ?>admin/trips"><i class="fa fa-circle-o"></i>All Trips</a></li>
            <li><a href="<?php echo $this->request->webroot; ?>admin/locations"><i class="fa fa-circle-o"></i>Locations</a>
<!--            <li><a href="<?php echo $this->request->webroot; ?>admin/tripfeatures"><i class="fa fa-circle-o"></i>Trip Features</a></li>-->
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-tasks"></i> <span>Activity Section</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->request->webroot; ?>admin/activities"><i class="fa fa-circle-o"></i>Activities</a></li>
            <li><a href="<?php echo $this->request->webroot; ?>admin/activitycategories"><i class="fa fa-circle-o"></i>Activity Categories</a>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i> <span>Transportations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->request->webroot; ?>admin/transportations"><i class="fa fa-circle-o"></i>Transportations</a></li>
            <li><a href="<?php echo $this->request->webroot; ?>admin/transportationvehicles"><i class="fa fa-circle-o"></i>Transportation Vehicles</a>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-clock-o"></i> <span>Meeting Points</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->request->webroot; ?>admin/meetingpointtypes"><i class="fa fa-circle-o"></i>Meeting Point Types</a></li>
            <li><a href="<?php echo $this->request->webroot; ?>admin/meetingpoints"><i class="fa fa-circle-o"></i>Meeting Points</a>
          </ul>
        </li>
<!--        <li>
          <a href="<?php echo $this->request->webroot; ?>admin/priceconditions">
            <i class="fa fa-info"></i> <span>Price Conditions</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>-->

        <li>
          <a href="<?php echo $this->request->webroot; ?>admin/extraconditions">
            <i class="fa fa-info"></i> <span>Extra Conditions</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>