<?php
require_once('../database/dbFunc.php');
$targetDir = '../source/';
// check lv
$checkTokenAccount = validateToken();
if ($checkTokenAccount) {
    if ($checkTokenAccount['lv'] == 2) {
    } else {
        header("location: ../public/?page=login");
    }
} else {
    header("location: ../public/?page=login");
}

$page = getGET('page');
?>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.mobile-hidden {
    display: block;
}

.pc-hidden {
    display: none;
}

@media screen and (max-width: 1000px) {
    .mobile-hidden {
        display: none;
    }

    .pc-hidden {
        display: block;
    }
}
</style>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../access/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- -==================================== -->
    <link rel="stylesheet" href="../access/css/public.css">

</head>


<body>
    <div class="container-fluid" style="margin: 0; padding: 0;">
        <section class="header">
            <?php
            include './components/header.php';
            ?>
        </section>
        <div class="content">
            <?php
            if ($page == 'category') {
                include './components/category.php';
            } elseif ($page == 'products') {
                include './components/products.php';
            } elseif ($page == 'evaluated') {
                include './components/evaluated.php';
            } elseif ($page == 'statistic') {
                include './components/statistic.php';
            } elseif ($page == 'user') {
                include './components/user.php';
            } elseif ($page == 'banner') {
                include './components/banner.php';
            } elseif ($page == 'contact') {
                include './components/contact.php';
            }
            ?>
        </div>
    </div>
</body>

</html>