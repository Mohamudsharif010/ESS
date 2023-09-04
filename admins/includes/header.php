<?php 
ob_start(); 
ob_end_flush();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Volks</title>
    <title>Admin Dashboard | By Code Info</title>

    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>

    <style>
        /*  import google fonts */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            border: none;
            outline: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #0c4e92;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px;
            padding: 20px;
            background: #fff;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo a {
            color: #000;
            font-size: 18px;
            font-weight: 600;
            margin: 2rem 8rem 2rem 2rem;
        }


        .search_box {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .search_box input {
            padding: 9px;
            width: 250px;
            background: rgb(228, 228, 228);
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .search_box i {
            padding: 0.67rem;
            cursor: pointer;
            color: #fff;
            background: #000;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .promo_card {
            width: 100%;
            color: #0c4e92;
            margin-top: 10px;
            border-radius: 8px;
            padding: 0.5rem 1rem 1rem 3rem;
            background: #939598;
        }

        .promo_card h1,
        .promo_card span,
        button {
            margin: 10px;
        }

        .promo_card button {
            display: block;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .history_lists {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .header-icons {
            display: flex;
            align-items: center;
        }

        .header-icons i {
            margin-right: 2rem;
            cursor: pointer;
        }

        .header-icons .account {
            width: 130px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-icons .account img {
            width: 35px;
            height: 35px;
            cursor: pointer;
            border-radius: 50%;
        }

        .container {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        /* Sidebar Section */
        .sidebar {
            width: 15%;
            padding: 2rem 1rem;
            background: #fff;
        }

        .sidebar h4 {
            margin-bottom: 1.5rem;
        }

        .sidebar .balance {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .balance .icon {
            color: #fff;
            font-size: 20px;
            border-radius: 6px;
            margin-right: 1rem;
            padding: 1rem;
            background: rgb(37, 37, 37);
        }

        .balance .info h5 {
            font-size: 16px;
        }

        .balance .info span {
            font-size: 14px;
            color: rgb(100, 100, 100);
        }

        .balance .info i {
            margin-right: 2px;
        }

        /* Side menubar section */
        /* Side menubar section */
        nav {
            background: #fff;
        }

        .side_navbar {
            padding: 1px;
            display: flex;
            flex-direction: column;
        }

        .side_navbar span {
            color: gray;
            margin: 1rem 3rem;
            font-size: 12px;
        }

        .side_navbar a {
            width: 100%;
            padding: 0.8rem 3rem;
            font-weight: 500;
            font-size: 15px;
            color: rgb(100, 100, 100);
        }

        .links {
            margin-top: 5rem;
            display: flex;
            flex-direction: column;
        }

        .links a {
            font-size: 13px;
        }

        .side_navbar a:hover {
            background: rgb(235, 235, 235);
        }

        .side_navbar .active {
            border-left: 2px solid rgb(100, 100, 100);
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        h2 {
            color: #333;
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        img {
            max-width: 300px;
            height: auto;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 10px;
            width: 70%;
        }

        .form-label {
            font-weight: bold;
        }

        .form-input {
            width: 100%;
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .form-submit {
            padding: 10px 20px;
            border-radius: 4px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .main-body {
            width: 70%;
            padding: 1rem;

        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1rem 0;
        }

        table {
            background: #fff;
            padding: 1rem;
            text-align: left;
            border-radius: 10px;
        }

        table td,
        th {
            padding: 0.2rem 0.8rem;
        }

        table th {
            font-size: 15px;
        }

        table td {
            font-size: 13px;
            color: rgb(100, 100, 100);
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .edit-button,
        .delete-button {
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .delete-button {
            background-color: #f44336;
        }

        textarea#description {
            width: 100%;
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
            resize: vertical;
            /* Allows vertical resizing */
            height: auto;
            /* Automatically adjusts height based on content */
            min-height: 150px;
        }

        .edit-profile {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            margin-bottom: 15px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <header class="header">


    </header>
    <div class="container">
    <aside id="slide-out" class="side-nav white fixed">
        <div class="side-nav-wrapper">
            <div class="sidebar-profile">
                <div class="sidebar-profile-image">
                    <img src="../assets/images/profile-image.png" class="circle" alt="">
                </div>
                <div class="sidebar-profile-info">
                    <p>Admin</p>
                </div>
            </div>

            <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                <li class="no-padding">
                    <a class="waves-effect waves-grey" href="dashboard.php"><i class="material-icons">settings_input_svideo</i>Dashboard</a>
                </li>
                <li class="no-padding">
                    <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Department<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="adddepartment.php">Add Department</a></li>
                            <li><a href="managedepartments.php">Manage Department</a></li>
                        </ul>
                    </div>
                </li>
                <li class="no-padding">
                    <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">code</i>Leave Type<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="addleavetype.php">Add Leave Type</a></li>
                            <li><a href="manageleavetype.php">Manage Leave Type</a></li>
                        </ul>
                    </div>
                </li>
                <li class="no-padding">
                    <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">account_box</i>Employees<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="addemployee.php">Add Employee</a></li>
                            <li><a href="manageemployee.php">Manage Employee</a></li>
                        </ul>
                    </div>
                </li>
                <li class="no-padding">
                    <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">desktop_windows</i>Leave Management<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="leaves.php">All Leaves</a></li>
                            <li><a href="pending-leavehistory.php">Pending Leaves</a></li>
                            <li><a href="approvedleave-history.php">Approved Leaves</a></li>
                            <li><a href="notapproved-leaves.php">Not Approved Leaves</a></li>
                        </ul>
                    </div>
                </li>
                <li class="no-padding">
                    <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Sign Out</a>
                </li>
            </ul>

            <div class="footer">
                <p class="copyright">Brought To You By<a href="http://www.code-projects.org/">Code-Projects</a>©</p>
            </div>
        </div>
    </aside>
    </div>
