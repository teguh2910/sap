<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('img/logo_sap.jpeg')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SAP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">         
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Cash
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/cashflow')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{asset('/out_cash')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Payment</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{asset('/incoming_cash')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Incoming</p>
                </a>
              </li> 
              {{-- <li class="nav-item">
                <a href="{{asset('/')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Jurnal Invoice Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Jurnal Invoice Customer</p>
                </a>
              </li>                             --}}
            </ul>
          </li> 

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Purchase Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/po')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/po_all')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Summary</p>
                </a>
              </li>                            
            </ul>
          </li>  

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Stock
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/stok_all')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/gudangsatu')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Gudang 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/gudangdua')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Gudang 2</p>
                </a>
              </li>              
            </ul>
          </li>         
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/produk')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Master Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/material')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Master Material</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/basemetal')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Master BaseMetal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/additive')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Master Additive</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="{{asset('/bank')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Master Bank</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/customer')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Master Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/vendor')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Master Vendor</p>
                </a>
              </li>                            
              <li class="nav-item">
                <a href="{{asset('/truk')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Master Truk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/sop')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>SOP</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
          <i class="nav-icon fas fa-power-off"></i> Logout
          </a>    
          <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          </li>  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>