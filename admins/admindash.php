<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap JS (optional, but needed for certain interactive features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
    .avatar-small {
        width: 60px;  /* Adjust the width as needed */
        height: 60px; /* Adjust the height as needed */
    }
    .container-fluid {
            display: flex;
            flex-direction: row;
            min-height: 100vh; /* Make sure the sidebar extends to at least the height of the viewport */
        }

        .sidebar {
            flex: 0 0 auto; /* Sidebar doesn't grow or shrink */
            height: 100%; /* Sidebar takes full height */
            background-color: #f8f9fa; /* Placeholder background color */
            padding: 20px; /* Add padding to sidebar */
            border-right: 1px solid #ccc; /* Add a border on the right side */
            display: flex;
            flex-direction: column;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa; /* Placeholder background color */
            border-top: 1px solid #ccc; /* Add a border on the top */
            flex-shrink: 0;
        }

</style>
</head>
<body>
<div class="container-fluid">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="py-3 text-center">
                <img src="../assets/images/profile-image.png" alt="Avatar" class="img-fluid rounded-circle avatar-img avatar-small">
                <p class="mt-2">Admin</p>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#departmentCollapse">
                        Department
                    </a>
                    <ul id="departmentCollapse" class="nav flex-column ml-3 collapse">
                        <li class="nav-item">
                            <a class="nav-link" href="adddepartment.php">Add Department</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Manage Department</a>
                        </li>
                    </ul>
                </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#leaveTypeCollapse">
                    Leave Type
                </a>
                <ul id="leaveTypeCollapse" class="nav flex-column ml-3 collapse">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Add Leave Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Leave Type</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#employeesCollapse">
                    Employees
                </a>
                <ul id="employeesCollapse" class="nav flex-column ml-3 collapse">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Add Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Employee</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#leaveManagementCollapse">
                    Leave Management
                </a>
                <ul id="leaveManagementCollapse" class="nav flex-column ml-3 collapse">
                    <li class="nav-item">
                        <a class="nav-link" href="#">All Leaves</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pending Leaves</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Approved Leaves</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Not Approved Leaves</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Sign Out
                </a>
            </li>
        </ul>
        <ul class="footer">
                    <p class="copyright">Brought To You By <a href="https://mohamudsharif.netlify.app/"> Mudice</a>©</p>
                
                </ul>
    </div>
    
</nav>
    </div>
   
    <script>
    // JavaScript to toggle sub-menu visibility and deactivate others
    document.addEventListener("DOMContentLoaded", function() {
        var navLinks = document.querySelectorAll(".nav-link");

        navLinks.forEach(function(link) {
            link.addEventListener("click", function(event) {
                var subMenu = event.target.nextElementSibling;
                var otherSubMenus = document.querySelectorAll(".nav.flex-column.ml-3.show");

                if (subMenu) {
                    otherSubMenus.forEach(function(otherSubMenu) {
                        if (otherSubMenu !== subMenu) {
                            otherSubMenu.classList.remove("show");
                        }
                    });

                    subMenu.classList.toggle("show");
                }
            });
        });
    });
</script>
</body>
</html>
