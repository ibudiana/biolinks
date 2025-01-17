<?php
require_once '../database.php';

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
}else if($_SESSION['status'] != 'active'){
    header('Location: ../index.php');
}

$username = $_SESSION['username'];
$profile = view_profile($username);

if ($profile) {

    $image      = $profile['image'];
    $name       = $profile['name'];
    $bio        = $profile['bio'];
    
    $twitter    = $profile['sosial_links']['twitter'];
    $facebook   = $profile['sosial_links']['facebook'];
    $instagram  = $profile['sosial_links']['instagram'];
    $youtube    = $profile['sosial_links']['youtube'];
    $tiktok     = $profile['sosial_links']['tiktok'];
    
    $links = $profile['other_links'];

    if(empty($links)){
        $links      = [
            ['name' => 'Link 1', 'url' => '#'],
            ['name' => 'Link 2', 'url' => '#'],
            ['name' => 'Link 3', 'url' => '#'],
            ['name' => 'Link 4', 'url' => '#'],
            ['name' => 'Link 5', 'url' => '#'],
            ['name' => 'Link 6', 'url' => '#']
        ];
    }else{
        $defaultLinks = [
            ['name' => 'Link 1', 'url' => '#'],
            ['name' => 'Link 2', 'url' => '#'],
            ['name' => 'Link 3', 'url' => '#'],
            ['name' => 'Link 4', 'url' => '#'],
            ['name' => 'Link 5', 'url' => '#'],
            ['name' => 'Link 6', 'url' => '#']
        ];

        $links = array_merge($links, array_slice($defaultLinks, count($links)));
    }
} else {
    $image      = "";
    $name       = "";
    $bio        = "";
    
    $twitter    = "";
    $facebook   = "";
    $instagram  = "";
    $youtube    = "";
    $tiktok     = "";
    
    $links      = [
        ['name' => 'Link 1', 'url' => '#'],
        ['name' => 'Link 2', 'url' => '#'],
        ['name' => 'Link 3', 'url' => '#'],
        ['name' => 'Link 4', 'url' => '#'],
        ['name' => 'Link 5', 'url' => '#'],
        ['name' => 'Link 6', 'url' => '#']
    ];
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['profile']) || isset($_POST['bio']) || isset($_FILES['image'])){

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            
            $fileInfo = pathinfo($_FILES['image']['name']);
            $fileExtension = strtolower($fileInfo['extension']);
            
            $targetDir = "../assets/upload/";
            $fileName = $_SESSION['username'] . "." . $fileExtension;

            $targetFilePath = $targetDir . $fileName;

             // Validasi tipe file
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array(strtolower($fileType), $allowedTypes)) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                    $image = $targetFilePath;
                } else {
                    $image = "kosong";
                }

            }
    
        }

        $save_profile = save_profile($_SESSION['user_id'], $_POST['profile'], $_POST['bio'], $image);
        if(!$save_profile){
            echo "<script>alert('Save Profile Gagal')</script>";
        }else{
            header("Location: $domain/dashboard/customer.php");
        }
    }

    if(isset($_POST['twitter']) || isset($_POST['instagram']) || isset($_POST['facebook']) || isset($_POST['tiktok']) || isset($_POST['youtube']) ){
        $sosial_links = [
            'twitter' => $_POST['twitter'],
            'instagram' => $_POST['instagram'],
            'facebook' => $_POST['facebook'],
            'tiktok' => $_POST['tiktok'],
            'youtube' => $_POST['youtube']
        ];

        $save_sosial_links = save_sosial_links($_SESSION['user_id'], $sosial_links);
        if(!$save_sosial_links){
            echo "<script>alert('Save Sosial Links Gagal')</script>";
        }else{
            header("Location: $domain/dashboard/customer.php");
        }
    }

    if(isset($_POST['link0']) || isset($_POST['link1']) || isset($_POST['link2']) || isset($_POST['link3']) || isset($_POST['link4']) || isset($_POST['link5'])){
        $other_links = [];
        for($i=0; $i < 6; $i++){
            $link = explode(",", $_POST['link'.$i]);
            $other_links[] = ['name' => $link[0], 'url' => $link[1]];
        }

        $save_other_links = save_other_links($_SESSION['user_id'], $other_links);
        if(!$save_other_links){
            echo "<script>alert('Save Other Links Gagal')</script>";
        }else{
            header("Location: $domain/dashboard/customer.php");
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
            <div class="right">
                <a href="<?php echo "$domain/bio/biolinks.php?username=$username"; ?>"><button class="btn"> View Page </button></a>
                <form action="<?php echo $domain; ?>/logout.php" method="POST">
                    <button class="btn"> Logout </button>
                </form>
            </div>
            
        </nav>
    </header>

    <main>
        <aside id="sidebar" class="hidden">
            <div class="logo">
                <img src="../assets/images/logo.png" alt="logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">Home</a></li>
                </ul>
            </div>
        </aside>

        <section class="admin-customer">
            <div class="card">
                <div class="card-item">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <h2>Profile</h2>
                        <input type="file" name="image" id="image">
                        <input type="text" name="profile" id="profile" placeholder="Name Profile" value="<?php echo $name; ?>">
                        <input type="text" name="bio" id="bio" placeholder="bio" value="<?php echo $bio; ?>">
                        <button class="btn" type="submit">Save</button>
                    </form>
                </div>

                <div class="card-item">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <h2>Socials</h2>
                        <input type="text" name="twitter" id="twitter" placeholder="Twitter" value="<?php echo $twitter; ?>">
                        <input type="text" name="instagram" id="instagram" placeholder="Instagram" value="<?php echo $instagram; ?>">
                        <input type="text" name="facebook" id="facebook" placeholder="Facebook" value="<?php echo $facebook; ?>">
                        <input type="text" name="tiktok" id="tiktok" placeholder="Tiktok" value="<?php echo $tiktok; ?>">
                        <input type="text" name="youtube" id="youtube" placeholder="Youtube" value="<?php echo $youtube; ?>">
                        <button class="btn" type="submit">Save</button>
                    </form>
                </div>

                <div class="card-item">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <h2>Other Links <span>(Tulis Nama dan Link dengan tanda baca koma)</span></h2>
                        <?php for($i=0; $i < count($links); $i++){ ?>
                        <input type="text" name="link<?php echo $i; ?>" id="link<?php echo $i; ?>" placeholder="Link Name, Link URL <?php echo $i; ?>" value="<?php echo $links[$i]['name']; echo ","; echo $links[$i]['url']; ?>">
                        <?php } ?>
                        <button class="btn" type="submit">Save</button>
                    </form>
                </div>
                
            </div>
            
            <div class="customer-preview">
                <!-- Profile -->
                <div class="profile">
                    <div class="profile-img">
                        <img src="<?php echo $image ?>" alt="Profile">
                    </div>
                
                    <h1><?php echo $name; ?></h1>

                    <p><?php echo $bio; ?></p>

                    <div class="social-media">
                        <a href="<?php echo $twitter; ?>">
                            <svg class="icon" width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.85313 20.3136C17.2875 20.3136 22.4484 12.4964 22.4484 5.72921C22.4505 5.50942 22.4474 5.28962 22.4391 5.06983C23.4435 4.34209 24.3106 3.44163 25 2.41046C24.0611 2.82338 23.0666 3.09609 22.0484 3.21983C23.1212 2.57875 23.9247 1.56985 24.3094 0.380771C23.302 0.978772 22.1987 1.39797 21.0484 1.61983C20.2753 0.796432 19.2522 0.250954 18.1376 0.0678916C17.0231 -0.115171 15.8793 0.0743978 14.8833 0.607235C13.8874 1.14007 13.095 1.98644 12.6288 3.01524C12.1626 4.04404 12.0487 5.19785 12.3047 6.29796C10.2651 6.19618 8.26976 5.66657 6.44817 4.74353C4.62658 3.82049 3.01949 2.52464 1.73125 0.940146C1.07747 2.07005 0.878047 3.40637 1.17345 4.67793C1.46885 5.94949 2.23695 7.06104 3.32187 7.78702C2.50845 7.76074 1.7128 7.54228 1 7.14952V7.21983C1.00199 8.40324 1.41222 9.54972 2.16144 10.4658C2.91067 11.3818 3.953 12.0113 5.1125 12.248C4.6723 12.3693 4.21755 12.4297 3.76094 12.4276C3.43894 12.431 3.11745 12.4011 2.80156 12.3386C3.12874 13.3578 3.76684 14.249 4.62631 14.8871C5.48577 15.5252 6.52347 15.8781 7.59375 15.8964C5.77516 17.3229 3.53007 18.0971 1.21875 18.0948C0.811404 18.0979 0.404291 18.0744 0 18.0245C2.34597 19.5206 5.07073 20.3148 7.85313 20.3136Z"/>
                            </svg>
                        </a>
                        <a href="<?php echo $facebook; ?>">
                            <svg class="icon" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.6667 10.218C20.6667 4.66124 16.1897 0.156799 10.6679 0.156799C5.1436 0.158049 0.666656 4.66124 0.666656 10.2193C0.666656 15.2399 4.3237 19.4019 9.1031 20.1568V13.1264H6.56592V10.2193H9.1056V8.00082C9.1056 5.47988 10.5992 4.08756 12.8826 4.08756C13.9775 4.08756 15.1211 4.28378 15.1211 4.28378V6.75847H13.86C12.6189 6.75847 12.2315 7.53463 12.2315 8.33078V10.218H15.0036L14.5612 13.1252H12.2302V20.1555C17.0096 19.4006 20.6667 15.2387 20.6667 10.218Z" />
                            </svg>                        
                        </a>
                        <a href="<?php echo $instagram; ?>">
                            <svg class="icon" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.6666 0.156799C7.95288 0.156799 7.61163 0.169299 6.54538 0.216799C5.47913 0.266799 4.75288 0.434299 4.11663 0.681799C3.44893 0.932206 2.8443 1.32605 2.34538 1.83555C1.83587 2.33448 1.44203 2.9391 1.19163 3.6068C0.944126 4.2418 0.775376 4.9693 0.726626 6.0318C0.679126 7.10055 0.666626 7.44055 0.666626 10.158C0.666626 12.873 0.679126 13.213 0.726626 14.2793C0.776626 15.3443 0.944126 16.0705 1.19163 16.7068C1.44788 17.3643 1.78913 17.9218 2.34538 18.478C2.90038 19.0343 3.45788 19.3768 4.11538 19.6318C4.75288 19.8793 5.47788 20.048 6.54288 20.0968C7.61038 20.1443 7.95038 20.1568 10.6666 20.1568C13.3829 20.1568 13.7216 20.1443 14.7891 20.0968C15.8529 20.0468 16.5816 19.8793 17.2179 19.6318C17.8851 19.3812 18.4893 18.9874 18.9879 18.478C19.5441 17.9218 19.8854 17.3643 20.1416 16.7068C20.3879 16.0705 20.5566 15.3443 20.6066 14.2793C20.6541 13.213 20.6666 12.873 20.6666 10.1568C20.6666 7.44055 20.6541 7.10055 20.6066 6.03305C20.5566 4.9693 20.3879 4.2418 20.1416 3.6068C19.8912 2.9391 19.4974 2.33448 18.9879 1.83555C18.4889 1.32605 17.8843 0.932206 17.2166 0.681799C16.5791 0.434299 15.8516 0.265549 14.7879 0.216799C13.7204 0.169299 13.3816 0.156799 10.6641 0.156799H10.6666ZM9.77038 1.9593H10.6679C13.3379 1.9593 13.6541 1.96805 14.7079 2.0168C15.6829 2.06055 16.2129 2.2243 16.5654 2.36055C17.0316 2.5418 17.3654 2.7593 17.7154 3.1093C18.0654 3.4593 18.2816 3.7918 18.4629 4.2593C18.6004 4.61055 18.7629 5.14055 18.8066 6.11555C18.8554 7.1693 18.8654 7.48555 18.8654 10.1543C18.8654 12.823 18.8554 13.1405 18.8066 14.1943C18.7629 15.1693 18.5991 15.698 18.4629 16.0505C18.3014 16.4842 18.0457 16.8765 17.7141 17.1993C17.3641 17.5493 17.0316 17.7655 16.5641 17.9468C16.2141 18.0843 15.6841 18.2468 14.7079 18.2918C13.6541 18.3393 13.3379 18.3505 10.6679 18.3505C7.99788 18.3505 7.68038 18.3393 6.62663 18.2918C5.65163 18.2468 5.12288 18.0843 4.77038 17.9468C4.33642 17.7859 3.94362 17.5306 3.62038 17.1993C3.28822 16.8763 3.03204 16.4835 2.87038 16.0493C2.73413 15.698 2.57038 15.168 2.52663 14.193C2.47913 13.1393 2.46913 12.823 2.46913 10.1518C2.46913 7.48055 2.47913 7.1668 2.52663 6.11305C2.57163 5.13805 2.73413 4.60805 2.87163 4.25555C3.05288 3.7893 3.27038 3.45555 3.62038 3.10555C3.97038 2.75555 4.30288 2.5393 4.77038 2.35805C5.12288 2.22055 5.65163 2.05805 6.62663 2.01305C7.54913 1.97055 7.90663 1.95805 9.77038 1.9568V1.9593ZM16.0054 3.6193C15.8478 3.6193 15.6917 3.65034 15.5462 3.71064C15.4006 3.77095 15.2683 3.85934 15.1568 3.97077C15.0454 4.0822 14.957 4.21449 14.8967 4.36008C14.8364 4.50567 14.8054 4.66171 14.8054 4.8193C14.8054 4.97689 14.8364 5.13293 14.8967 5.27852C14.957 5.42411 15.0454 5.5564 15.1568 5.66783C15.2683 5.77926 15.4006 5.86765 15.5462 5.92795C15.6917 5.98826 15.8478 6.0193 16.0054 6.0193C16.3236 6.0193 16.6289 5.89287 16.8539 5.66783C17.0789 5.44278 17.2054 5.13756 17.2054 4.8193C17.2054 4.50104 17.0789 4.19581 16.8539 3.97077C16.6289 3.74573 16.3236 3.6193 16.0054 3.6193ZM10.6679 5.0218C9.98671 5.01117 9.31024 5.13616 8.67785 5.38948C8.04545 5.64279 7.46977 6.01939 6.98431 6.49733C6.49886 6.97527 6.11333 7.54501 5.85018 8.17337C5.58702 8.80174 5.4515 9.47618 5.4515 10.1574C5.4515 10.8387 5.58702 11.5131 5.85018 12.1415C6.11333 12.7698 6.49886 13.3396 6.98431 13.8175C7.46977 14.2955 8.04545 14.6721 8.67785 14.9254C9.31024 15.1787 9.98671 15.3037 10.6679 15.293C12.0161 15.272 13.3019 14.7217 14.2478 13.7609C15.1938 12.8 15.724 11.5058 15.724 10.1574C15.724 8.80908 15.1938 7.51482 14.2478 6.55399C13.3019 5.59316 12.0161 5.04283 10.6679 5.0218ZM10.6679 6.82305C11.1057 6.82305 11.5392 6.90928 11.9436 7.07682C12.3481 7.24435 12.7156 7.48991 13.0252 7.79948C13.3348 8.10905 13.5803 8.47656 13.7479 8.88103C13.9154 9.2855 14.0016 9.71901 14.0016 10.1568C14.0016 10.5946 13.9154 11.0281 13.7479 11.4326C13.5803 11.837 13.3348 12.2045 13.0252 12.5141C12.7156 12.8237 12.3481 13.0692 11.9436 13.2368C11.5392 13.4043 11.1057 13.4905 10.6679 13.4905C9.78371 13.4905 8.93576 13.1393 8.31056 12.5141C7.68536 11.8889 7.33413 11.041 7.33413 10.1568C7.33413 9.27263 7.68536 8.42468 8.31056 7.79948C8.93576 7.17428 9.78371 6.82305 10.6679 6.82305Z"/>
                            </svg>      
                        </a>
                        <a href="<?php echo $youtube; ?>">
                            <svg class="icon" width="26" height="21" viewBox="0 0 26 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.2471 0.156799H13.3862C14.6706 0.162138 21.1788 0.215524 22.9336 0.752938C23.4641 0.916953 23.9475 1.23665 24.3355 1.68008C24.7235 2.12351 25.0026 2.67514 25.1447 3.27985C25.3025 3.95607 25.4135 4.85117 25.4885 5.77474L25.5041 5.95981L25.5385 6.42248L25.551 6.60755C25.6526 8.23403 25.6651 9.7573 25.6666 10.0901V10.2235C25.6651 10.5688 25.651 12.1952 25.5385 13.8893L25.526 14.0762L25.5119 14.2613C25.4338 15.2791 25.3182 16.2899 25.1447 17.0337C25.0026 17.6385 24.7235 18.1901 24.3355 18.6335C23.9475 19.0769 23.4641 19.3966 22.9336 19.5607C21.121 20.1159 14.2315 20.155 13.2768 20.1568H13.0549C12.5721 20.1568 10.5751 20.1461 8.48118 20.0643L8.21554 20.0536L8.07959 20.0465L7.81239 20.034L7.54518 20.0216C5.8107 19.9344 4.15903 19.7938 3.39805 19.5589C2.86774 19.395 2.38447 19.0756 1.99648 18.6325C1.60849 18.1894 1.32936 17.6381 1.18697 17.0337C1.01352 16.2917 0.89789 15.2791 0.819761 14.2613L0.80726 14.0744L0.794759 13.8893C0.717197 12.6836 0.674463 11.4752 0.666626 10.2662L0.666626 10.0474C0.669751 9.66476 0.682252 8.34258 0.766632 6.88338L0.77757 6.70009L0.782258 6.60755L0.794759 6.42248L0.829136 5.95981L0.844762 5.77474C0.919767 4.85117 1.03071 3.95429 1.18853 3.27985C1.33068 2.67514 1.6097 2.12351 1.99771 1.68008C2.38572 1.23665 2.86912 0.916953 3.39961 0.752938C4.16059 0.521601 5.81226 0.379239 7.54674 0.290263L7.81239 0.277806L8.08115 0.26713L8.21554 0.261791L8.48274 0.249335C9.96988 0.194887 11.4576 0.164632 12.9455 0.158579L13.2471 0.156799ZM10.6673 5.86905V14.4428L17.163 10.1577L10.6673 5.86905Z" />
                            </svg>
                        </a>
                        <a href="<?php echo $tiktok; ?>">
                            <svg class="icon" width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.1904 0.156799H12.5476C12.719 1.05055 13.1904 2.17805 14.0178 3.2968C14.8273 4.39305 15.9011 5.1568 17.3333 5.1568V7.6568C15.2464 7.6568 13.6785 6.6393 12.5714 5.37055V13.9068C12.5714 15.1429 12.2223 16.3513 11.5682 17.3791C10.9142 18.4069 9.98454 19.208 8.89689 19.681C7.80923 20.1541 6.61241 20.2779 5.45776 20.0367C4.30311 19.7955 3.2425 19.2003 2.41004 18.3262C1.57759 17.4521 1.01068 16.3385 0.781002 15.1261C0.551328 13.9137 0.669205 12.6571 1.11973 11.515C1.57025 10.373 2.33318 9.39687 3.31204 8.71011C4.29091 8.02335 5.44174 7.6568 6.61901 7.6568V10.1568C5.91265 10.1568 5.22215 10.3767 4.63483 10.7888C4.04751 11.2008 3.58975 11.7865 3.31944 12.4717C3.04913 13.157 2.9784 13.911 3.1162 14.6384C3.25401 15.3658 3.59415 16.034 4.09363 16.5584C4.5931 17.0829 5.22947 17.44 5.92226 17.5847C6.61505 17.7294 7.33314 17.6552 7.98573 17.3713C8.63833 17.0875 9.19611 16.6069 9.58854 15.9902C9.98098 15.3735 10.1904 14.6485 10.1904 13.9068V0.156799Z" />
                                </svg>
                                
                        </a>
                    </div>
                </div>

                <!-- Links -->
                <div class="links">
                    <?php foreach($links as $link){ ?>
                    <a href="<?php echo $link['url']; ?>"><button class="link"><?php echo $link['name']; ?></button></a>
                    <?php } ?>
                </div>
                
                <!-- Footer -->
                <div class="footer">
                    <p>© BuildLinks</p>
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