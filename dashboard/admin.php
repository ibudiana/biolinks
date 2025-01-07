<?php
require_once '../database.php';

session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
}

$members = list_member();

$register       = 0;
$pending        = 0;
$active         = 0;
$suspended      = 0;

if(!empty($members)){
    $register = count($members);

    foreach($members as $member){
        if($member['status'] == 'pending'){
            $pending++;
        }elseif($member['status'] == 'active'){
            $active++;
        }elseif($member['status'] == 'suspend'){
            $suspended++;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin-style.css">
    <title>Admin Customer</title>
</head>
<body>
<div class="container">

    <header>
        <nav>
            <div class="left" >
                <button class="btn" id="toggleButton">☰</button>
            </div>
            <form action="<?php echo $domain; ?>/logout.php" method="POST">
                <button class="btn"> Logout </button>
            </form>
        </nav>
    </header>

    <main>
        <aside id="sidebar" class="hidden">
            <div class="logo">
                <img src="../assets/images/logo.png" alt="logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="<?php echo $domain; ?>/dashboard/admin.php">Home</a></li>
                    <li><a href="<?php echo $domain; ?>/dashboard/admin-list.php">Member List</a></li>
                    <li><a href="<?php echo $domain; ?>/dashboard/admin-add.php">Add Member</a></li>
                </ul>
            </div>
        </aside>

        <section class="admin">
            <div class="widget-admin">
                <div class="widget-admin-item">
                    <h2>Register</h2>
                    <span><?php echo $register; ?></span>
                </div>
                <div class="widget-admin-item">
                    <h2>Pending</h2>
                    <span><?php echo $pending; ?></span>
                </div>
                <div class="widget-admin-item">
                    <h2>Active</h2>
                    <span><?php echo $active; ?></span>
                </div>
                <div class="widget-admin-item">
                    <h2>Suspended</h2>
                    <span><?php echo $suspended; ?></span>
                </div>
            </div>

            <div class="widget-admin">
                <div class="widget-admin-item">
                    <h2>Welcome Admin</h2>
                </div>
            </div>
        </section>

       
    </main>
    
    <footer>
        <div class="footer-bottom">
            <span>made by I Wayan Budiana</span>
        </div>
    </footer>

    <script>
        const toggleButton = document.getElementById('toggleButton');
        const sidebar = document.getElementById('sidebar');
        toggleButton.addEventListener('click', () => {
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                toggleButton.textContent = 'X'; 
            } else {
                sidebar.classList.add('hidden');
                toggleButton.textContent = '☰'; 
            }
        });

    </script>

</div>
</body>
</html>