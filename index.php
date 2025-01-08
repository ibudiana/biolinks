<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/landing-style.css">
    <title>Biolinks Landing Page</title>
</head>
<body>

<div class="container">
    <header>
        <nav>
            <div class="logo">
                <a href="<?php echo $domain; ?>"><img src="assets/images/logo.png" alt="Logo"></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">Free Templates</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Discover</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Pricing</a></li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li>
                        <a href="<?php echo $domain; ?>sign-up.php"><button class="btn">Try Free</button></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section class="hero">
            <div class="hero-content">
                <h2>LET'S CREATE</h2>
                <h3>JUST ONE LINK FOR EVERY THING</h3>
                <p>Place all your necessary links in one location</p>
                <a href="<?php echo $domain; ?>sign-up.php"><button class="btn">Start for Free</button></a><br/>
                <span>Allready on buildlinks <a href="<?php echo $domain; ?>login.php">Log in</a></span>
                <h4>The one link to rule them all</h4>
                <div class="card">
                    <div class="card-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46" fill="none"><path d="M20.3789 2.5553C21.0623 -0.17265 24.9349 -0.17265 25.6211 2.5553L25.8208 3.35963C25.9376 3.82706 26.1774 4.25471 26.5152 4.5982C26.8531 4.94169 27.2767 5.18851 27.7422 5.31305C28.2076 5.43758 28.6979 5.4353 29.1621 5.30643C29.6264 5.17756 30.0477 4.9268 30.3824 4.58018L30.9589 3.98678C32.9134 1.96472 36.2685 3.90241 35.4952 6.60505L35.2702 7.40375C35.1377 7.8668 35.1315 8.35684 35.2523 8.82308C35.373 9.28932 35.6163 9.71477 35.9568 10.0553C36.2974 10.3959 36.7228 10.6391 37.1891 10.7599C37.6553 10.8806 38.1454 10.8744 38.6084 10.742L39.4043 10.5142C42.1041 9.74079 44.0446 13.0959 42.0226 15.0505L41.4292 15.627C41.0825 15.9616 40.8318 16.3829 40.7029 16.8472C40.574 17.3115 40.5718 17.8017 40.6963 18.2672C40.8208 18.7326 41.0676 19.1562 41.4111 19.4941C41.7546 19.832 42.1823 20.0717 42.6497 20.1886L43.454 20.3883C46.182 21.0716 46.182 24.9442 43.454 25.6304L42.6497 25.8301C42.1823 25.9469 41.7546 26.1867 41.4111 26.5246C41.0676 26.8624 40.8208 27.2861 40.6963 27.7515C40.5718 28.2169 40.574 28.7072 40.7029 29.1715C40.8318 29.6357 41.0825 30.057 41.4292 30.3917L42.0226 30.9682C44.0446 32.9228 42.1069 36.2779 39.4043 35.5045L38.6056 35.2795C38.1425 35.1471 37.6525 35.1409 37.1863 35.2616C36.72 35.3824 36.2946 35.6256 35.954 35.9662C35.6135 36.3067 35.3702 36.7322 35.2495 37.1984C35.1287 37.6646 35.1349 38.1547 35.2674 38.6177L35.4952 39.4136C36.2685 42.1135 32.9134 44.054 30.9589 42.0319L30.3824 41.4385C30.0477 41.0919 29.6264 40.8411 29.1621 40.7122C28.6979 40.5834 28.2076 40.5811 27.7422 40.7056C27.2767 40.8302 26.8531 41.077 26.5152 41.4205C26.1774 41.764 25.9376 42.1916 25.8208 42.659L25.6211 43.4634C24.9377 46.1913 21.0651 46.1913 20.3789 43.4634L20.1792 42.659C20.0624 42.1916 19.8226 41.764 19.4848 41.4205C19.1469 41.077 18.7233 40.8302 18.2578 40.7056C17.7924 40.5811 17.3021 40.5834 16.8379 40.7122C16.3736 40.8411 15.9523 41.0919 15.6177 41.4385L15.0411 42.0319C13.0866 44.054 9.73145 42.1163 10.5048 39.4136L10.7298 38.6149C10.862 38.1522 10.8681 37.6625 10.7475 37.1966C10.6269 36.7307 10.3839 36.3055 10.0437 35.965C9.70357 35.6246 9.27858 35.3812 8.81277 35.2602C8.34697 35.1392 7.85728 35.1449 7.39441 35.2767L6.59571 35.5045C3.89588 36.2779 1.95538 32.9228 3.97744 30.9682L4.57084 30.3917C4.91747 30.057 5.16822 29.6357 5.29709 29.1715C5.42596 28.7072 5.42825 28.2169 5.30371 27.7515C5.17917 27.2861 4.93235 26.8624 4.58886 26.5246C4.24537 26.1867 3.81772 25.9469 3.35029 25.8301L2.54597 25.6304C-0.181989 24.947 -0.181989 21.0745 2.54597 20.3883L3.35029 20.1886C3.81772 20.0717 4.24537 19.832 4.58886 19.4941C4.93235 19.1562 5.17917 18.7326 5.30371 18.2672C5.42825 17.8017 5.42596 17.3115 5.29709 16.8472C5.16822 16.3829 4.91747 15.9616 4.57084 15.627L3.97744 15.0505C1.95538 13.0959 3.89307 9.74079 6.59571 10.5142L7.39441 10.7392C7.85717 10.8714 8.34685 10.8775 8.81276 10.7568C9.27867 10.6362 9.70386 10.3932 10.0443 10.0531C10.3848 9.7129 10.6281 9.28792 10.7491 8.82211C10.8701 8.35631 10.8645 7.86662 10.7326 7.40375L10.5048 6.60505C9.73145 3.90522 13.0866 1.96472 15.0411 3.98678L15.6177 4.58018C15.9523 4.9268 16.3736 5.17756 16.8379 5.30643C17.3021 5.4353 17.7924 5.43758 18.2578 5.31305C18.7233 5.18851 19.1469 4.94169 19.4848 4.5982C19.8226 4.25471 20.0624 3.82706 20.1792 3.35963L20.3789 2.5553ZM36.9857 24.4155H23.7031L15.733 35.0433C17.7631 36.2695 20.0705 36.962 22.4404 37.0564C24.8102 37.1509 27.1654 36.6441 29.2867 35.5833C31.408 34.5225 33.2263 32.9423 34.5725 30.9896C35.9186 29.0369 36.7488 26.7754 36.9857 24.4155ZM36.9857 21.6032C36.7488 19.2433 35.9186 16.9818 34.5725 15.0291C33.2263 13.0764 31.408 11.4961 29.2867 10.4354C27.1654 9.37457 24.8102 8.86781 22.4404 8.96223C20.0705 9.05666 17.7631 9.74921 15.733 10.9754L23.7031 21.606L36.9857 21.6032ZM13.4859 12.6656C12.0521 13.9799 10.9078 15.5783 10.1258 17.3592C9.34379 19.1401 8.94132 21.0643 8.944 23.0093C8.944 27.1013 10.6933 30.7854 13.4859 33.3531L21.2423 23.0093L13.4859 12.6656Z"/>
                        </svg>
                        <span>Create</span>
                        <p>Easily Create and manage</p>
                    </div>
                    <div class="card-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46" fill="none"> <path d="M0.783585 6.76401C0.403044 8.19518 0.405528 9.7012 0.790789 11.1311C1.17605 12.561 1.93055 13.8646 2.97867 14.9111C4.02678 15.9577 5.33169 16.7105 6.76259 17.094C8.19349 17.4776 9.70011 17.4784 11.1314 17.0965L28.9715 34.6791C28.6007 35.9381 28.5286 37.2662 28.7609 38.558C28.9932 39.8497 29.5235 41.0696 30.3096 42.1208C31.0958 43.172 32.1162 44.0255 33.29 44.6137C34.4637 45.2019 35.7584 45.5086 37.0714 45.5093C38.281 45.5077 39.4762 45.2461 40.5758 44.7424C41.6755 44.2387 42.654 43.5046 43.445 42.5899C44.236 41.6751 44.8211 40.6011 45.1607 39.4406C45.5002 38.2801 45.5862 37.0602 45.4129 35.8635C45.2396 34.6669 44.811 33.5214 44.1561 32.5048C43.5013 31.4882 42.6355 30.6242 41.6174 29.9713C40.5993 29.3183 39.4527 28.8918 38.2553 28.7205C37.0579 28.5492 35.8376 28.6372 34.6772 28.9785L17.0875 11.1456C17.4715 9.7143 17.472 8.20722 17.0892 6.77562C16.7063 5.34403 15.9534 4.03829 14.9062 2.98945C13.8589 1.94061 12.5541 1.18558 11.1226 0.800132C9.6912 0.414684 8.18352 0.412382 6.75091 0.793456L12.7745 6.81744L11.7504 11.7615L6.80718 12.7852L0.783585 6.76401ZM38.3994 32.1283L39.8849 32.2014L40.6923 33.4529L41.9443 34.2601L42.0175 35.7478L42.6983 37.0724L42.0175 38.397L41.9443 39.8847L40.6923 40.6918L39.8849 41.9433L38.3966 42.0164L37.0714 42.697L35.7463 42.0164L34.258 41.9433L33.4505 40.6918L32.1985 39.8847L32.1254 38.397L31.4445 37.0724L32.1254 35.7478L32.1985 34.2601L33.4505 33.4529L34.258 32.2014L35.7463 32.1283L37.0714 31.4477L38.3994 32.1283Z"/>
                        </svg>
                        <span>Manage</span>
                        <p>Easily Create and manage</p>
                    </div>
                    <div class="card-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46" fill="none"> <path d="M31.4377 7.54049C31.4375 5.891 32.0174 4.29395 33.0759 3.02877C34.1344 1.76359 35.6041 0.910844 37.2279 0.619717C38.8517 0.32859 40.5262 0.617625 41.9584 1.43625C43.3906 2.25488 44.4893 3.55098 45.0623 5.09777C45.6353 6.64457 45.646 8.34357 45.0927 9.89752C44.5395 11.4515 43.4573 12.7614 42.0356 13.5982C40.614 14.4349 38.9433 14.7452 37.3159 14.4747C35.6886 14.2042 34.2081 13.3702 33.1336 12.1186L14.2396 20.8924C14.6738 22.2687 14.6738 23.7454 14.2396 25.1218L33.1336 33.8955C34.2694 32.5748 35.8552 31.7226 37.5835 31.5043C39.3118 31.2859 41.0597 31.7168 42.4884 32.7136C43.917 33.7103 44.9248 35.2019 45.3163 36.8992C45.7077 38.5965 45.4551 40.3787 44.6073 41.9004C43.7595 43.4221 42.3769 44.5749 40.7275 45.1354C39.0781 45.6959 37.2793 45.6242 35.6797 44.9342C34.0801 44.2442 32.7937 42.985 32.0697 41.4007C31.3458 39.8164 31.2358 38.0197 31.7612 36.3589L12.8671 27.5852C11.9318 28.6751 10.6851 29.4524 9.29467 29.8126C7.90427 30.1728 6.43689 30.0986 5.08993 29.6C3.74297 29.1014 2.58105 28.2022 1.76046 27.0236C0.939879 25.8449 0.5 24.4432 0.5 23.0071C0.5 21.5709 0.939879 20.1693 1.76046 18.9906C2.58105 17.8119 3.74297 16.9128 5.08993 16.4141C6.43689 15.9155 7.90427 15.8413 9.29467 16.2015C10.6851 16.5617 11.9318 17.3391 12.8671 18.429L31.7612 9.65519C31.5461 8.97091 31.437 8.25776 31.4377 7.54049Z"/>
                        </svg>
                        <span>Share</span>
                        <p>Easily Create and manage</p>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <img src="assets/images/biolinks-mockup.png" alt="Hero Image">
            </div>
        </section>
        <section class="banner">
            <img src="assets/images/banner-main.png" alt="Hero Image">
        </section>
    </main>

    <footer>
        <div class="footer-widget">
            <div class="widget">
                <h3>Features</h3>
                <ul>
                    <li><a href="#">Free link in bio templates</a></li>
                    <li><a href="#">Link in bio for instagram</a></li>
                    <li><a href="#">Link in bio for facebook</a></li>
                    <li><a href="#">Link in bio for tiktok</a></li>
                    <li><a href="#">Link in bio for youtube</a></li>
                    <li><a href="#">Link in bio for twitter</a></li>
                </ul>
            </div>
            <div class="widget">
                <h3>Discover</h3>
                <ul>
                    <li><a href="#">Get rich with link in bio</a></li>
                    <li><a href="#">Manage multiple accounts</a></li>
                    <li><a href="#">Link in bio for your business</a></li>
                    <li><a href="#">Your private branding</a></li>
                    <li><a href="#">Enterprise</a></li>
                    <li><a href="#">Partnerships</a></li>
                </ul>
            </div>
            <div class="widget">
                <h3>Company</h3>
                <ul>
                    <li><a href="#">Blog & Help</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Cummunity</a></li>
                    <li><a href="#">How to Guides</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Suggest a Feature</a></li>
                </ul>
            </div>
            <div class="widget sosmed">
                <h3>Features</h3>
                <ul>
                <li><a href="#">
                    <svg class="icon" width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.85313 20.3136C17.2875 20.3136 22.4484 12.4964 22.4484 5.72921C22.4505 5.50942 22.4474 5.28962 22.4391 5.06983C23.4435 4.34209 24.3106 3.44163 25 2.41046C24.0611 2.82338 23.0666 3.09609 22.0484 3.21983C23.1212 2.57875 23.9247 1.56985 24.3094 0.380771C23.302 0.978772 22.1987 1.39797 21.0484 1.61983C20.2753 0.796432 19.2522 0.250954 18.1376 0.0678916C17.0231 -0.115171 15.8793 0.0743978 14.8833 0.607235C13.8874 1.14007 13.095 1.98644 12.6288 3.01524C12.1626 4.04404 12.0487 5.19785 12.3047 6.29796C10.2651 6.19618 8.26976 5.66657 6.44817 4.74353C4.62658 3.82049 3.01949 2.52464 1.73125 0.940146C1.07747 2.07005 0.878047 3.40637 1.17345 4.67793C1.46885 5.94949 2.23695 7.06104 3.32187 7.78702C2.50845 7.76074 1.7128 7.54228 1 7.14952V7.21983C1.00199 8.40324 1.41222 9.54972 2.16144 10.4658C2.91067 11.3818 3.953 12.0113 5.1125 12.248C4.6723 12.3693 4.21755 12.4297 3.76094 12.4276C3.43894 12.431 3.11745 12.4011 2.80156 12.3386C3.12874 13.3578 3.76684 14.249 4.62631 14.8871C5.48577 15.5252 6.52347 15.8781 7.59375 15.8964C5.77516 17.3229 3.53007 18.0971 1.21875 18.0948C0.811404 18.0979 0.404291 18.0744 0 18.0245C2.34597 19.5206 5.07073 20.3148 7.85313 20.3136Z"/>
                    </svg>
                </a></li>
                <li><a href="#">
                    <svg class="icon" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.6667 10.218C20.6667 4.66124 16.1897 0.156799 10.6679 0.156799C5.1436 0.158049 0.666656 4.66124 0.666656 10.2193C0.666656 15.2399 4.3237 19.4019 9.1031 20.1568V13.1264H6.56592V10.2193H9.1056V8.00082C9.1056 5.47988 10.5992 4.08756 12.8826 4.08756C13.9775 4.08756 15.1211 4.28378 15.1211 4.28378V6.75847H13.86C12.6189 6.75847 12.2315 7.53463 12.2315 8.33078V10.218H15.0036L14.5612 13.1252H12.2302V20.1555C17.0096 19.4006 20.6667 15.2387 20.6667 10.218Z" />
                    </svg>                        
                </a></li>
                <li><a href="#">
                    <svg class="icon" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.6666 0.156799C7.95288 0.156799 7.61163 0.169299 6.54538 0.216799C5.47913 0.266799 4.75288 0.434299 4.11663 0.681799C3.44893 0.932206 2.8443 1.32605 2.34538 1.83555C1.83587 2.33448 1.44203 2.9391 1.19163 3.6068C0.944126 4.2418 0.775376 4.9693 0.726626 6.0318C0.679126 7.10055 0.666626 7.44055 0.666626 10.158C0.666626 12.873 0.679126 13.213 0.726626 14.2793C0.776626 15.3443 0.944126 16.0705 1.19163 16.7068C1.44788 17.3643 1.78913 17.9218 2.34538 18.478C2.90038 19.0343 3.45788 19.3768 4.11538 19.6318C4.75288 19.8793 5.47788 20.048 6.54288 20.0968C7.61038 20.1443 7.95038 20.1568 10.6666 20.1568C13.3829 20.1568 13.7216 20.1443 14.7891 20.0968C15.8529 20.0468 16.5816 19.8793 17.2179 19.6318C17.8851 19.3812 18.4893 18.9874 18.9879 18.478C19.5441 17.9218 19.8854 17.3643 20.1416 16.7068C20.3879 16.0705 20.5566 15.3443 20.6066 14.2793C20.6541 13.213 20.6666 12.873 20.6666 10.1568C20.6666 7.44055 20.6541 7.10055 20.6066 6.03305C20.5566 4.9693 20.3879 4.2418 20.1416 3.6068C19.8912 2.9391 19.4974 2.33448 18.9879 1.83555C18.4889 1.32605 17.8843 0.932206 17.2166 0.681799C16.5791 0.434299 15.8516 0.265549 14.7879 0.216799C13.7204 0.169299 13.3816 0.156799 10.6641 0.156799H10.6666ZM9.77038 1.9593H10.6679C13.3379 1.9593 13.6541 1.96805 14.7079 2.0168C15.6829 2.06055 16.2129 2.2243 16.5654 2.36055C17.0316 2.5418 17.3654 2.7593 17.7154 3.1093C18.0654 3.4593 18.2816 3.7918 18.4629 4.2593C18.6004 4.61055 18.7629 5.14055 18.8066 6.11555C18.8554 7.1693 18.8654 7.48555 18.8654 10.1543C18.8654 12.823 18.8554 13.1405 18.8066 14.1943C18.7629 15.1693 18.5991 15.698 18.4629 16.0505C18.3014 16.4842 18.0457 16.8765 17.7141 17.1993C17.3641 17.5493 17.0316 17.7655 16.5641 17.9468C16.2141 18.0843 15.6841 18.2468 14.7079 18.2918C13.6541 18.3393 13.3379 18.3505 10.6679 18.3505C7.99788 18.3505 7.68038 18.3393 6.62663 18.2918C5.65163 18.2468 5.12288 18.0843 4.77038 17.9468C4.33642 17.7859 3.94362 17.5306 3.62038 17.1993C3.28822 16.8763 3.03204 16.4835 2.87038 16.0493C2.73413 15.698 2.57038 15.168 2.52663 14.193C2.47913 13.1393 2.46913 12.823 2.46913 10.1518C2.46913 7.48055 2.47913 7.1668 2.52663 6.11305C2.57163 5.13805 2.73413 4.60805 2.87163 4.25555C3.05288 3.7893 3.27038 3.45555 3.62038 3.10555C3.97038 2.75555 4.30288 2.5393 4.77038 2.35805C5.12288 2.22055 5.65163 2.05805 6.62663 2.01305C7.54913 1.97055 7.90663 1.95805 9.77038 1.9568V1.9593ZM16.0054 3.6193C15.8478 3.6193 15.6917 3.65034 15.5462 3.71064C15.4006 3.77095 15.2683 3.85934 15.1568 3.97077C15.0454 4.0822 14.957 4.21449 14.8967 4.36008C14.8364 4.50567 14.8054 4.66171 14.8054 4.8193C14.8054 4.97689 14.8364 5.13293 14.8967 5.27852C14.957 5.42411 15.0454 5.5564 15.1568 5.66783C15.2683 5.77926 15.4006 5.86765 15.5462 5.92795C15.6917 5.98826 15.8478 6.0193 16.0054 6.0193C16.3236 6.0193 16.6289 5.89287 16.8539 5.66783C17.0789 5.44278 17.2054 5.13756 17.2054 4.8193C17.2054 4.50104 17.0789 4.19581 16.8539 3.97077C16.6289 3.74573 16.3236 3.6193 16.0054 3.6193ZM10.6679 5.0218C9.98671 5.01117 9.31024 5.13616 8.67785 5.38948C8.04545 5.64279 7.46977 6.01939 6.98431 6.49733C6.49886 6.97527 6.11333 7.54501 5.85018 8.17337C5.58702 8.80174 5.4515 9.47618 5.4515 10.1574C5.4515 10.8387 5.58702 11.5131 5.85018 12.1415C6.11333 12.7698 6.49886 13.3396 6.98431 13.8175C7.46977 14.2955 8.04545 14.6721 8.67785 14.9254C9.31024 15.1787 9.98671 15.3037 10.6679 15.293C12.0161 15.272 13.3019 14.7217 14.2478 13.7609C15.1938 12.8 15.724 11.5058 15.724 10.1574C15.724 8.80908 15.1938 7.51482 14.2478 6.55399C13.3019 5.59316 12.0161 5.04283 10.6679 5.0218ZM10.6679 6.82305C11.1057 6.82305 11.5392 6.90928 11.9436 7.07682C12.3481 7.24435 12.7156 7.48991 13.0252 7.79948C13.3348 8.10905 13.5803 8.47656 13.7479 8.88103C13.9154 9.2855 14.0016 9.71901 14.0016 10.1568C14.0016 10.5946 13.9154 11.0281 13.7479 11.4326C13.5803 11.837 13.3348 12.2045 13.0252 12.5141C12.7156 12.8237 12.3481 13.0692 11.9436 13.2368C11.5392 13.4043 11.1057 13.4905 10.6679 13.4905C9.78371 13.4905 8.93576 13.1393 8.31056 12.5141C7.68536 11.8889 7.33413 11.041 7.33413 10.1568C7.33413 9.27263 7.68536 8.42468 8.31056 7.79948C8.93576 7.17428 9.78371 6.82305 10.6679 6.82305Z"/>
                    </svg>      
                </a></li>
                <li><a href="#">
                    <svg class="icon" width="26" height="21" viewBox="0 0 26 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.2471 0.156799H13.3862C14.6706 0.162138 21.1788 0.215524 22.9336 0.752938C23.4641 0.916953 23.9475 1.23665 24.3355 1.68008C24.7235 2.12351 25.0026 2.67514 25.1447 3.27985C25.3025 3.95607 25.4135 4.85117 25.4885 5.77474L25.5041 5.95981L25.5385 6.42248L25.551 6.60755C25.6526 8.23403 25.6651 9.7573 25.6666 10.0901V10.2235C25.6651 10.5688 25.651 12.1952 25.5385 13.8893L25.526 14.0762L25.5119 14.2613C25.4338 15.2791 25.3182 16.2899 25.1447 17.0337C25.0026 17.6385 24.7235 18.1901 24.3355 18.6335C23.9475 19.0769 23.4641 19.3966 22.9336 19.5607C21.121 20.1159 14.2315 20.155 13.2768 20.1568H13.0549C12.5721 20.1568 10.5751 20.1461 8.48118 20.0643L8.21554 20.0536L8.07959 20.0465L7.81239 20.034L7.54518 20.0216C5.8107 19.9344 4.15903 19.7938 3.39805 19.5589C2.86774 19.395 2.38447 19.0756 1.99648 18.6325C1.60849 18.1894 1.32936 17.6381 1.18697 17.0337C1.01352 16.2917 0.89789 15.2791 0.819761 14.2613L0.80726 14.0744L0.794759 13.8893C0.717197 12.6836 0.674463 11.4752 0.666626 10.2662L0.666626 10.0474C0.669751 9.66476 0.682252 8.34258 0.766632 6.88338L0.77757 6.70009L0.782258 6.60755L0.794759 6.42248L0.829136 5.95981L0.844762 5.77474C0.919767 4.85117 1.03071 3.95429 1.18853 3.27985C1.33068 2.67514 1.6097 2.12351 1.99771 1.68008C2.38572 1.23665 2.86912 0.916953 3.39961 0.752938C4.16059 0.521601 5.81226 0.379239 7.54674 0.290263L7.81239 0.277806L8.08115 0.26713L8.21554 0.261791L8.48274 0.249335C9.96988 0.194887 11.4576 0.164632 12.9455 0.158579L13.2471 0.156799ZM10.6673 5.86905V14.4428L17.163 10.1577L10.6673 5.86905Z" />
                    </svg>
                </a>
                <li><a href="#">
                    <svg class="icon" width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.1904 0.156799H12.5476C12.719 1.05055 13.1904 2.17805 14.0178 3.2968C14.8273 4.39305 15.9011 5.1568 17.3333 5.1568V7.6568C15.2464 7.6568 13.6785 6.6393 12.5714 5.37055V13.9068C12.5714 15.1429 12.2223 16.3513 11.5682 17.3791C10.9142 18.4069 9.98454 19.208 8.89689 19.681C7.80923 20.1541 6.61241 20.2779 5.45776 20.0367C4.30311 19.7955 3.2425 19.2003 2.41004 18.3262C1.57759 17.4521 1.01068 16.3385 0.781002 15.1261C0.551328 13.9137 0.669205 12.6571 1.11973 11.515C1.57025 10.373 2.33318 9.39687 3.31204 8.71011C4.29091 8.02335 5.44174 7.6568 6.61901 7.6568V10.1568C5.91265 10.1568 5.22215 10.3767 4.63483 10.7888C4.04751 11.2008 3.58975 11.7865 3.31944 12.4717C3.04913 13.157 2.9784 13.911 3.1162 14.6384C3.25401 15.3658 3.59415 16.034 4.09363 16.5584C4.5931 17.0829 5.22947 17.44 5.92226 17.5847C6.61505 17.7294 7.33314 17.6552 7.98573 17.3713C8.63833 17.0875 9.19611 16.6069 9.58854 15.9902C9.98098 15.3735 10.1904 14.6485 10.1904 13.9068V0.156799Z" />
                        </svg>
                        
                </a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>made by I Wayan Budiana</span>
        </div>
    </footer>
</div>
    
</body>
</html>