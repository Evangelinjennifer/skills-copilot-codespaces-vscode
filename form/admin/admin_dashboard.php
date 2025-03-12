
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar Navigation -->
        <nav class="sidebar">
            <h2>Admin </h2>
            <ul>
                <li><a href="admin.php">HOME</a></li>
                <li><a href="user.php">Manage Users</a></li>
                <li><a href="user1.php">Issue Books</a></li>
                <li><a href="adlog.php">Logout</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h1>DASHBOARD</h1>
            </header>
            <section class="cards">
                <a href="book_man.php" class="card">
                    <h4>Books Issued</h4>
                </a>
                <a href="manage_user.php" class="card">
                    <h4>Total Users</h4>
                </a>
                <a href="view_complaints.php" class="card">
                    <h4>Complaint box</h4>
                </a>
                <a href="admindash.php" class="card">
                    <h4>Book taken</h4>
                </a>
            </section>
        </div>
    </div>
</body>
</html>
