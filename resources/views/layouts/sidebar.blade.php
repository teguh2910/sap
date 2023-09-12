<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{asset('img/logo_sap.jpeg')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SAP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">         
        @if(auth()->user()->position == 'wh')
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
                  <p>PO Supplier</p>
                </a>
              </li>                                          
            </ul>
          </li> 
          @endif
        @if(auth()->user()->position == 'admin' || auth()->user()->position == 'fac' || auth()->user()->position == 'bod')
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
                <a href="{{asset('/po_customer')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>PO Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/po')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>PO Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/po_all')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Report PO Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/po_customer_all')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Report PO Customer</p>
                </a>
              </li>                            
            </ul>
          </li> 
          @endif
          @if(auth()->user()->position == 'admin' || auth()->user()->position == 'fac' || auth()->user()->position == 'bod')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Invoicing
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/invoice')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>List Invoice</p>
                </a>
              </li>                                        
            </ul>
          </li> 
          @endif
          @if(auth()->user()->position == 'admin' || auth()->user()->position == 'wh' || auth()->user()->position == 'bod' || auth()->user()->position == 'produksi')
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
                <a href="{{asset('/filter_stok_all')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/stock_customer')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Stock Actual per Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/qty_prod_customer')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Qty Produksi VS Order Customer</p>
                </a>
              </li>
              @if(auth()->user()->name == 'wh_g1' || auth()->user()->name == 'produksi_g1' || auth()->user()->position == 'bod' || auth()->user()->name == 'admin_sac')
              <li class="nav-item">
                <a href="{{asset('/filter_gudang_satu')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Gudang SAC</p>
                </a>
              </li>
              @endif
              @if(auth()->user()->name == 'wh_g2' || auth()->user()->name == 'produksi_g2' || auth()->user()->position == 'bod' || auth()->user()->name == 'admin_cf')
              <li class="nav-item">
                <a href="{{asset('/gudangdua')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Gudang CF</p>
                </a>
              </li>
              @endif              
            </ul>
          </li>  
          @endif
          @if(auth()->user()->position == 'admin' || auth()->user()->position == 'fac' || auth()->user()->position == 'bod')
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
                <a href="{{asset('/pnl')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>PnL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/hutang')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Hutang</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{asset('/piutang')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Piutang</p>
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
            </ul>
          </li>                             
          @endif
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
                <a href="{{asset('/part_customer')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Master Part Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/part_supplier')}}" class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Master Part Supplier</p>
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
            </ul>
           
            <li class="nav-item">
                <a href="{{asset('/sop')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                  <p>SOP</p>
                </a>
              </li>
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