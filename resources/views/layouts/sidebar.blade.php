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
          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
        @if(auth()->user()->position == 'wh')
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Purchase Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('po')}}" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>PO Supplier</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        @if(auth()->user()->position == 'admin' || auth()->user()->position == 'fac' || auth()->user()->position == 'bod')
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Purchase Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('po_customer')}}" class="nav-link">
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>PO Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('po')}}" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>PO Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('po_all')}}" class="nav-link">
                  <i class="nav-icon fas fa-chart-bar"></i>
                  <p>Report PO Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('po_customer_all')}}" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>Report PO Customer</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(auth()->user()->position == 'admin' || auth()->user()->position == 'fac' || auth()->user()->position == 'bod')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Invoicing
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('invoice')}}" class="nav-link">
                  <i class="nav-icon fas fa-list-alt"></i>
                  <p>List Invoice</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(auth()->user()->position == 'admin' || auth()->user()->position == 'wh' || auth()->user()->position == 'bod' || auth()->user()->position == 'produksi')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Stock
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('filter_stok_all')}}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('stock_customer')}}" class="nav-link">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>Stock Actual per Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('qty_prod_customer')}}" class="nav-link">
                  <i class="nav-icon fas fa-balance-scale"></i>
                  <p>Qty Produksi VS Order Customer</p>
                </a>
              </li>
              @if(auth()->user()->name == 'wh_g1' || auth()->user()->name == 'produksi_g1' || auth()->user()->position == 'bod' || auth()->user()->name == 'admin_sac')
              <li class="nav-item">
                <a href="{{url('filter_gudang_satu')}}" class="nav-link">
                  <i class="nav-icon fas fa-industry"></i>
                  <p>Gudang SAC</p>
                </a>
              </li>
              @endif
              @if(auth()->user()->name == 'wh_g2' || auth()->user()->name == 'produksi_g2' || auth()->user()->position == 'bod' || auth()->user()->name == 'admin_cf')
              <li class="nav-item">
                <a href="{{url('gudangdua')}}" class="nav-link">
                  <i class="nav-icon fas fa-industry"></i>
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
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>
                Cash
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('cashflow')}}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('pnl')}}" class="nav-link">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>PnL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('hutang')}}" class="nav-link">
                  <i class="nav-icon fas fa-hand-holding-usd"></i>
                  <p>Hutang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('piutang')}}" class="nav-link">
                  <i class="nav-icon fas fa-coins"></i>
                  <p>Piutang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('out_cash')}}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-circle-down"></i>
                  <p>Payment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('incoming_cash')}}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-circle-up"></i>
                  <p>Incoming</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('part_customer')}}" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>Master Part Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('part_supplier')}}" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>Master Part Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('bank')}}" class="nav-link">
                  <i class="nav-icon fas fa-university"></i>
                  <p>Master Bank</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('customer')}}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Master Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('vendor')}}" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>Master Vendor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('truk')}}" class="nav-link">
                  <i class="nav-icon fas fa-truck-moving"></i>
                  <p>Master Truk</p>
                </a>
              </li>
            </ul>

            <li class="nav-item">
                <a href="{{url('sop')}}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                  <p>SOP</p>
                </a>
              </li>
          </li>
          @if(auth()->user()->position == 'admin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('user')}}" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>List User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('user/create')}}" class="nav-link">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>Create User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{url('profile')}}" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>My Profile</p>
            </a>
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
