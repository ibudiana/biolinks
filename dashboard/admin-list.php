<?php
require_once '../database.php';

session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
}

$members        = list_member();

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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil nilai dari form member list
    $member_id = $_POST['member_id'];
    $member_status = $_POST['status'];

    if (isset($member_id) && isset($member_status)) {
        $update_status = update_status_member($member_id, $member_status);

        if($member_status == 'active'){
           create_profile($member_id);
        }

        if(!$update_status){
            echo "Update status member gagal";
        }else{
            $members = list_member();
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
                    <h2>List Member</h2>
                </div>
            </div>

            <div class="widget-admin">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DATE</th>
                                <th>CUSTOMER</th>
                                <th>STATUS</th>
                                <th>OPTION</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($members as $member) { ?>
                                <tr>
                                    <td><?php echo $member['id']; ?></td>
                                    <td><?php echo $member['created_at']; ?></td>
                                    <td><?php echo $member['username']; ?></td>
                                    <td><span class="status"><?php echo $member['status']; ?></span></td>
                                    <td>
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <input type="hidden" name="member_id" value="<?php echo $member['id']; ?>">
                                            <select name="status">
                                                <option value="active" <?php echo $member['status'] == 'suspend' ? 'selected' : ''; ?>>Active</option>
                                                <option value="suspend" <?php echo $member['status'] == 'active' ? 'selected' : ''; ?>>Suspended</option>
                                            </select>
                                            <button class="btn" type="submit">Update</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="<?php echo $domain; ?>/dashboard/admin-edit.php?username=<?php echo $member['username']; ?>" class="btn">Edit</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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