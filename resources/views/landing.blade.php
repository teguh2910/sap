<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAP - Sales & Purchasing System</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --accent-color: #28a745;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            border-radius: 0 0 50px 50px;
        }
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--primary-color);
        }
        .btn-landing {
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-login {
            background: var(--primary-color);
            color: white;
        }
        .btn-login:hover {
            background: #0056b3;
            transform: scale(1.05);
        }
        .btn-register {
            background: var(--accent-color);
            color: white;
        }
        .btn-register:hover {
            background: #218838;
            transform: scale(1.05);
        }
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        .footer {
            background: #343a40;
            color: white;
            padding: 40px 0;
            margin-top: 80px;
        }
        .logo {
            max-height: 60px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logo_sap.jpeg') }}" alt="SAP Logo" class="logo me-2">
                <span class="fw-bold text-primary">SAP System</span>
            </a>
            <div class="d-flex">
                <a href="{{ url('/login') }}" class="btn btn-outline-primary me-2">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Streamline Your Sales & Purchasing Operations</h1>
                    <p class="lead mb-4">Comprehensive ERP solution for managing inventory, invoices, purchase orders, and financial tracking in one integrated platform.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ url('/login') }}" class="btn btn-landing btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i>Login to Dashboard
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                         alt="Dashboard Preview" class="img-fluid rounded shadow-lg" style="max-height: 400px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Powerful Features</h2>
                <p class="text-muted">Everything you need to manage your business operations efficiently</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card card h-100 p-4">
                        <div class="text-center">
                            <i class="feature-icon fas fa-warehouse"></i>
                            <h4>Inventory Management</h4>
                            <p class="text-muted">Track stock levels across multiple warehouses, manage inventory movements, and monitor stock availability in real-time.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card card h-100 p-4">
                        <div class="text-center">
                            <i class="feature-icon fas fa-file-invoice-dollar"></i>
                            <h4>Invoice & Billing</h4>
                            <p class="text-muted">Create professional invoices, track payments, manage customer accounts, and generate financial reports.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card card h-100 p-4">
                        <div class="text-center">
                            <i class="feature-icon fas fa-chart-line"></i>
                            <h4>Analytics Dashboard</h4>
                            <p class="text-muted">Gain insights with interactive charts, KPI tracking, and real-time business intelligence for informed decision-making.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">35+</div>
                        <p class="text-muted mb-0">Modules</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">24/7</div>
                        <p class="text-muted mb-0">Availability</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">100%</div>
                        <p class="text-muted mb-0">Secure</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">187</div>
                        <p class="text-muted mb-0">Tests Passed</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-4">Ready to Transform Your Business Operations?</h2>
                    <p class="lead mb-4">Join hundreds of businesses that trust our SAP system for their daily operations.</p>
                    <a href="{{ url('/login') }}" class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fas fa-rocket me-2"></i>Launch Your Dashboard
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <img src="{{ asset('img/logo_sap.jpeg') }}" alt="SAP Logo" class="logo mb-3">
                    <p>Comprehensive Sales & Purchasing System designed to streamline business operations and improve efficiency.</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/login') }}" class="text-light text-decoration-none">Login</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Documentation</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Support</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Contact</h5>
                    <p class="mb-1"><i class="fas fa-envelope me-2"></i> support@sap-system.com</p>
                    <p class="mb-1"><i class="fas fa-phone me-2"></i> +62 21 1234 5678</p>
                    <p class="mb-0"><i class="fas fa-map-marker-alt me-2"></i> Jakarta, Indonesia</p>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center pt-3">
                <p class="mb-0">&copy; 2023 SAP System. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
