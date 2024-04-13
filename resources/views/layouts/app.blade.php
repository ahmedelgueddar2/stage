<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* CSS pour le menu latéral */
        #sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #2980b9; /* Couleur de fond */
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        #sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: #ffffff; /* Couleur du texte */
            display: block;
            transition: 0.3s;
        }

        #sidebar a:hover {
            background-color: #2980b9; /* Couleur de fond au survol */
        }

        #sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 30px;
            margin-left: 50px;
            color: #ffffff; /* Couleur de l'icône de fermeture */
        }

        #main-content {
            transition: margin-left .5s;
            padding: 20px;
        }

        #openMenuBtn {
            font-size: 30px;
            cursor: pointer;
            color: #343a40; /* Couleur de l'icône de menu */
        }
    </style>
</head>
<body>

<div id="sidebar" class="bg-dark">
    <h2 class="text-white text-center py-3"><i class="fas fa-users mr-2"></i> User Management</h2>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{ route('users.index') }}"><i class="fas fa-users mr-2"></i> Users</a>
    <a href="{{ route('roles.index') }}"><i class="fas fa-user-tag mr-2"></i> Roles</a>
    <a href="{{ route('permissions.index') }}"><i class="fas fa-lock mr-2"></i> Permissions</a>
</div>

<div id="main-content">
    <span id="openMenuBtn">&#9776;</span>
    <div class="container mt-4">
        @yield('content')
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script>
    function openNav() {
        document.getElementById("sidebar").style.width = "250px";
        document.getElementById("main-content").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("sidebar").style.width = "0";
        document.getElementById("main-content").style.marginLeft = "0";
    }

    // Toggle menu on button click
    document.getElementById("openMenuBtn").addEventListener("click", function() {
        document.getElementById("sidebar").style.width === "0px" ? openNav() : closeNav();
    });
</script>

</body>
</html>
