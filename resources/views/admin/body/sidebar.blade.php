<div class="vertical-menu">
  <div data-simplebar class="h-100">
    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>
        <li>
          <a href="{{ route('dashboard') }}" class="waves-effect">
          <i class="ri-dashboard-line"></i>
          <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
          <i class="ri-bank-fill"></i>
          <span>Home</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('home-banner.edit') }}">Banner</a></li>
            <li><a href="{{ route('about-us.edit') }}">About Us</a></li>
            <li><a href="{{ route('footer.edit') }}">Footer</a></li>
          </ul>
        </li>
        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
          <i class="ri-image-2-fill"></i>
          <span>Portfolios</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('portfolios.index') }}">Show Portfolios</a></li>
            <li><a href="{{ route('portfolios.create') }}">Create Portfolio</a></li>
          </ul>
        </li>
        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
          <i class="fas fa-blog"></i>
          <span>Blogs</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('blog_categories.index') }}">Show Categories</a></li>
            <li><a href="{{ route('blog_categories.create') }}">Create Category</a></li>
            <li><a href="{{ route('blog_posts.index') }}">Show Posts</a></li>
            <li><a href="{{ route('blog_posts.create') }}">Create Post</a></li>
          </ul>
        </li>
        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
          <i class="fas fa-blog"></i>
          <span>Contact Messages</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('contact_me.index') }}">Show All</a></li>
          </ul>
        </li>
        <!-- <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
          <i class="ri-mail-send-line"></i>
          <span>Email</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li><a href="email-inbox.html">Inbox</a></li>
            <li><a href="email-read.html">Read Email</a></li>
          </ul>
        </li>
        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
          <i class="ri-layout-3-line"></i>
          <span>Layouts</span>
          </a>
          <ul class="sub-menu" aria-expanded="true">
            <li>
              <a href="javascript: void(0);" class="has-arrow">Vertical</a>
              <ul class="sub-menu" aria-expanded="true">
                <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                <li><a href="layouts-preloader.html">Preloader</a></li>
                <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
              </ul>
            </li>
            <li>
              <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
              <ul class="sub-menu" aria-expanded="true">
                <li><a href="layouts-horizontal.html">Horizontal</a></li>
                <li><a href="layouts-hori-topbar-light.html">Topbar light</a></li>
                <li><a href="layouts-hori-boxed-width.html">Boxed width</a></li>
                <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                <li><a href="layouts-hori-colored-header.html">Colored Header</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="menu-title">Pages</li>
        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
          <i class="ri-account-circle-line"></i>
          <span>Authentication</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li><a href="auth-login.html">Login</a></li>
            <li><a href="auth-register.html">Register</a></li>
            <li><a href="auth-recoverpw.html">Recover Password</a></li>
            <li><a href="auth-lock-screen.html">Lock Screen</a></li>
          </ul>
        </li>
        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
          <i class="ri-profile-line"></i>
          <span>Utility</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li><a href="pages-starter.html">Starter Page</a></li>
            <li><a href="pages-timeline.html">Timeline</a></li>
            <li><a href="pages-directory.html">Directory</a></li>
            <li><a href="pages-invoice.html">Invoice</a></li>
            <li><a href="pages-404.html">Error 404</a></li>
            <li><a href="pages-500.html">Error 500</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
    <!-- Sidebar -->
  </div>
</div>