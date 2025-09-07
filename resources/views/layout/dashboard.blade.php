<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('sidebar/sidebar.css') }}">
    <script src="{{ asset('sidebar/sidebar.js') }}"></script>
    <title>@yield('title')</title>

    <style>
        /* General Layout */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #e0e0e0;
        }
        body.dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }
        body.light-mode .navbar {
            background-color: #f8f9fa;
            color: #121212;
        }
        .btn-toggle-mode {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            border: none;
            background-color: #3b82f6;
            color: #fff;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
        }

        .btn-toggle-mode:hover {
            background-color: #2563eb;
        }

        .navbar {
            background-color: #1f1f1f;
        }

        .navbar-brand h4 {
            color: #bb86fc;
            font-weight: bold;
            margin-left: 176px;
        }

        .navbar-light .navbar-toggler {
            color: #e0e0e0;
            border-color: #e0e0e0;
        }

        .navbar-light .navbar-toggler-icon {
            color: #e0e0e0;
        }

        .btn-outline-success {
            color: #e0e0e0;
            border-color: #e0e0e0;
        }

        .btn-outline-success:hover {
            background-color: #bb86fc;
            color: #121212;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            width: 183px;
            top: 0;
            left: 0;
            background-color: #1f1f1f;
            padding-top: 20px;
            color: #e0e0e0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.5);
        }

        .sidebar a {
            display: block;
            color: #e0e0e0;
            padding: 15px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #3b82f6;
            /* Light blue hover effect */
            color: #121212;
        }

        .dropdown .dropdown-menu .dropdown-item {
            color: #000;
            background-color: #fff;
            transition: background-color 0.3s, color 0.3s;

        }


        .dropdown .dropdown-menu .dropdown-item:hover {
            background-color: #3b82f6;
            /* Light blue background on hover */
            color: #fff;
            /* White text on hover */

        }

        /* Main Content */
        .content {
            margin-left: 250px;
            padding: 20px;
            background-color: #121212;
            color: #e0e0e0;
        }

        .container-fluid {
            margin-top: 10px;
        }

        .search-bar {
            width: 300px;
            background-color: #333;
            color: #e0e0e0;
            border: none;
        }

        .search-bar::placeholder {
            color: #bbb;
        }

        /* Footer */
        footer {
            margin-top: 20px;
            text-align: center;
            color: #888;
        }

        #canvas-wrapper.dark-mode {
            background: #222;
            color: #DDD;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h4>Business Management</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <form class="d-flex ms-auto">
                    <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    @if(auth()->guard('web')->user() && auth()->guard('web')->user()->can('Manage all business transactions'))
    <div class="sidebar">

        <a href="{{ route('user.profile') }}">profile</a>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Customer Information</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('customer.index') }}">Register Customer</a></li>
                <li><a class="dropdown-item" href="{{ route('customer.customers') }}">View Customer</a></li>
            </ul>
        </div>


        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Invoice</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('invoice.index') }}">Register Invoice</a></li>
                <li><a class="dropdown-item" href="{{ route('invoice.outstandingInvoice') }}">View Invoice</a></li>
            </ul>
        </div>


        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Vendor</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('supplier.index') }}">Register Vendor</a></li>
                <li><a class="dropdown-item" href="{{ route('supplier.vendors') }}">View Vendor</a></li>
            </ul>
        </div>



        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Expense</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('expense.index') }}">register Expense</a></li>
                <li><a class="dropdown-item" href="{{ route('expense.expenses') }}">View Expence Detiles</a></li>
            </ul>
        </div>



        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Bank</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('bank.index') }}">Register Bank Detiles</a></li>
                <li><a class="dropdown-item" href="{{ route('bank.detiles') }}">View Bank Detiles</a></li>
            </ul>
        </div>
        <a href="#">Settings</a>



    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Business Management. All Rights Reserved.</p>
    </footer>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function(){
        
      });
    </script>
</body>

</html>