<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POS System</title>
    <style>
    	th {
    		padding: 5px;
    		border: 1px solid black;
    		background-color: black;
    		color: white;
    	}
    	td {
    		padding: 5px;
    		border: 1px solid rgba(0,0,0,.15);
    	}
        a {
            color: blue;
            text-decoration: none;
        }
        a:hover {
            color: black;
        }
        a.delete {
            color: red;
            text-decoration: none;
        }
        a.delete:hover {
            text-decoration: underline;
        }
        a.edit {
            color: blue;
            text-decoration: none;
        }
        a.edit:hover {
            text-decoration: underline;
        }
        a.create {
            color: limegreen;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: bold;
        }
        a.create:hover {
            color: black;
        }
        a.mainnav {
            color: blue;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 12pt;
        }
        a.mainnav:hover {
            color: black;
        }
        .formwrap {
            border: 1px solid black;
            width: 315px;
            padding-left: 5px;
        }
    </style>
</head>
<body>
    <nav>
        <a class="mainnav" href="/item">Items</a> | 
        <a class="mainnav" href="/customer">Customers</a> | 
        <a class="mainnav" href="/invoice">Invoices</a>
    </nav>
    @yield('main')
</body>
</html>