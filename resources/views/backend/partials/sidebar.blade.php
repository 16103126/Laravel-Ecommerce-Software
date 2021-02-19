<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <hr>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.index')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <!-- Manage Product -->

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#products_pages" aria-expanded="false" aria-controls="products_pages">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Manage Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="products_pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.products')}}">Manage products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.product.create')}}">Add products</a>
            </li>
          </ul>
        </div>
      </li>

      <!-- Manage Order -->

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#orders_pages" aria-expanded="false" aria-controls="orders_pages">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Manage Orders</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="orders_pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.orders')}}">Manage Orders</a>
            </li>
          </ul>
        </div>
      </li>

      <!-- Manage Category -->
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#category-pages" aria-expanded="false" aria-controls="category-pages">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Manage Categories</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="category-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.categories')}}">Manage Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.category.create')}}">Add Category</a>
            </li>
          </ul>
        </div>
      </li>


      <!-- Manage Brand -->
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#brand-pages" aria-expanded="false" aria-controls="brand-pages">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Manage Brands</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="brand-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.brands')}}">Manage Brands</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.brand.create')}}">Add Brand</a>
            </li>
          </ul>
        </div>
      </li>


      <!-- Manage Division -->
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#division-pages" aria-expanded="false" aria-controls="division-pages">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Manage Divisions</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="division-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.divisions')}}">Manage Divisions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.division.create')}}">Add Division</a>
            </li>
          </ul>
        </div>
      </li>


      <!-- Manage District -->
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#district-pages" aria-expanded="false" aria-controls="district-pages">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Manage Districts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="district-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.districts')}}">Manage Districts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.district.create')}}">Add District</a>
            </li>
          </ul>
        </div>
      </li>

      <!-- Manage Slider -->
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#slider-pages" aria-expanded="false" aria-controls="slider-pages">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Manage Slider</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="slider-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.sliders')}}">Manage Sliders</a>
            </li>
          </ul>
        </div>
      </li>
      
     
     
    </ul>
  </nav>