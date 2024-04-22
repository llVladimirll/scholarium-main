<?php

session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $userId = $_SESSION['user_id'];
} else {

    header('Location: ./login.html');
    exit();
}

?>

<?php
include('../controller/connection.php');

$scholarship_id = $_GET['id'];
$check_query = "SELECT * FROM likes WHERE user_id = ? AND scholarship_id = ?";
$check_statement = mysqli_prepare($conn, $check_query);
mysqli_stmt_bind_param($check_statement, 'ii', $userId, $scholarship_id);
mysqli_stmt_execute($check_statement);
mysqli_stmt_store_result($check_statement);

$alreadyLiked = mysqli_stmt_num_rows($check_statement) > 0;
?>

<?php
include('../controller/connection.php');

if (isset($_GET['id'])) {
    $scholarship_id = $_GET['id'];

    // Fetch scholarship data based on ID
    $query = "SELECT scholarship_name, sponsoring_organization, country, type, description, degree_bachelor, degree_master, degree_phd, likes, application_deadline, majors, required_documents, benefits, notes, application_link, photoName, photo FROM scholarships WHERE scholarship_id = $scholarship_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Display fetched data
        $likes = $row['likes'];
        $scholarship_name = $row['scholarship_name'];
        $sponsoring_organization = $row['sponsoring_organization'];
        $country = $row['country'];
        $benefits = $row['benefits'];
        $type = $row['type'];
        $description = $row['description'];
        $bachelor = $row['degree_bachelor'];
        $master = $row['degree_master'];
        $phd = $row['degree_phd'];
        $deadline = $row['application_deadline'];
        $majors = $row['majors'];
        $requiredDocument = $row['required_documents'];
        $notes = $row['notes'];
        $applicationLink = $row['application_link'];

    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarium</title>
    <link rel="icon" href="./image/web-logo.png" type="image/png">
    <link rel="stylesheet" href="style.css">
</head>

<body class="w-full px-3 py-3 font-Raleway overflow-x-hidden scroll-smooth">
    <!-- Header -->
    <header>
        <div class="w-full flex justify-between align-middle items-center pr-10">
            <div class="pl-8">
                <a href="./index.php">
                    <img src="./image/letter-s.png" alt="" class="w-10">
                </a>
            </div>
            <div class="ml-2">
                <a href="">
                    <img src="../assets/icon/profile.png" alt="" class="mt-[6px]">
                </a>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Hero-Section -->
    <div class="flex mt-16">
        <div class="flex-col items-center mx-auto text-center">
            <h1 class="text-5xl font-semibold mb-3">
                <?php
                echo $scholarship_name;
                ?>
            </h1>
            <h3 class="text-xl">
                <?php
                echo $sponsoring_organization;
                ?>

            </h3>
            <h3 class="text-sm">
                <?php
                echo $country
                    ?>
            </h3>
        </div>
    </div>
    <!-- End-Hero-Section -->
    <!-- Content -->
    <div class="flex-col mt-24 w-full px-12 mb-32">
        <div class="flex w-full">
            <div class="flex-col w-11/12">
                <div class="flex gap-3 mb-1">
                    <img src="../assets/icon/degree_icon.png" alt="" class="w-6 h-6">
                    <div class="text-base">

                        <?php
                        if ($bachelor == 1 && $master == 1 && $phd == 1) {
                            echo '<p>Bachelor</p>';
                        } else if ($bachelor == 1 && $master == 1) {
                            echo '<p>Bachelor, Master</p>';
                        } else if ($bachelor == 1 && $phd == 1) {
                            echo '<p>Bachelor, Master, PhD</p>';
                        } else if ($master == 1 && $phd == 1) {
                            echo '<p>Bachelor, PhD</p>';
                        }
                        if ($bachelor == 1) {
                            echo '<p>Master, PhD</p>';
                        } else if ($master == 1) {
                            echo '<p>Master</p>';
                        } else if ($phd == 1) {
                            echo '<p>PhD</p>';
                        } else {
                            echo 'No data';
                        }
                        ?>

                    </div>
                </div>
                <div class="flex gap-3 mb-1">
                    <img src="../assets/icon/calendar_icon.png" alt="" class="w-6 h-6">
                    <p class="text-base my-0.5">
                        <?php
                        echo date('d - F - Y', strtotime($deadline));
                        ?>
                    </p>
                </div>
                <div class="flex gap-3">
                    <img src="../assets/icon/money-icon.png" alt="" class="w-6 h-5">
                    <p class="text-base my-0.5">
                        <?php
                        echo $type;
                        ?>
                    </p>
                </div>
            </div>
            <div class="flex justify-end">
                <a href=<?php
                echo '"' . $applicationLink . '"';
                ?>>
                    <div class="bg-black w-48 h-12 rounded-full flex mt-3.5">
                        <p class="text-white m-auto">Visit Website</p>
                    </div>
                </a>
            </div>
            <div class="flex">
                <div class="flex gap-4 ml-8 mt-2 mr-4">
                    <button id="like" class="w-6 h-5 mt-4 ">
                        <a href="../controller/likes_scholarship.php?id=<?php echo $scholarship_id; ?>&action=like">
                            <?php if ($alreadyLiked): ?>
                                <img src="../assets/icon/heart-filled.png" alt="">
                            <?php else: ?>
                                <img src="../assets/icon/heart.png" alt="">
                            <?php endif; ?>
                        </a>
                    </button>
                    <p class="text-lg font-semibold mt-3.5">
                        <?php
                        echo $likes;
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="bg-black w-full h-[1px] mt-7"></div>
        <div class="flex justify-end">
            <h3 class="my-3 font-semibold">DESCRIPTION</h3>
        </div>
        <div class="bg-black w-full h-[1px]"></div>
        <p class="my-3">
            <?php
            echo $description;
            ?>
        </p>
        <div class="bg-black w-full h-[1px] mt-7"></div>
        <div class="flex justify-end">
            <h3 class="my-3 font-semibold">BENEFITS</h3>
        </div>
        <div class="bg-black w-full h-[1px]"></div>
        <p class="my-3">
            <?php
            echo $benefits;
            ?>
        </p>
        <div class="bg-black w-full h-[1px] mt-7"></div>
        <div class="flex justify-end">
            <h3 class="my-3 font-semibold">REQUIREMENTS</h3>
        </div>
        <div class="bg-black w-full h-[1px]"></div>
        <p class="my-3">
            <?php
            echo $requiredDocument;
            ?>
        </p>
        <div class="bg-black w-full h-[1px] mt-7"></div>
        <div class="flex justify-end">
            <h3 class="my-3 font-semibold">MAJORS</h3>
        </div>
        <div class="bg-black w-full h-[1px]"></div>
        <p class="my-3">
            <?php
            echo $majors;
            ?>
        <div class="bg-black w-full h-[1px] mt-7"></div>
        <div class="flex justify-end">
            <h3 class="my-3 font-semibold">NOTES</h3>
        </div>
        <div class="bg-black w-full h-[1px]"></div>
        <p class="my-3">
            <?php
            echo $notes;
            ?>
        </p>
    </div>
    <!-- Footer -->
    <footer class="px-12 mt-16 h-[150px]">
        <div>
            <img src="./image/letter-s.png" alt="" class="w-10">
        </div>
        <hr class="mt-3">
        <div class="mt-6 flex justify-between">
            <ul class="flex gap-4">
                <li><a href="" class="font-semibold">About Us</a></li>
                <li><a href="" class="font-semibold">FAQs</a></li>
                <li><a href="" class="font-semibold">Contact Us</a></li>
            </ul>
            <div class="flex gap-3">
                <p class="font-semibold">Connect with us :</p>
                <a href="">Instagram</a>
                <a href="">Telegram</a>
                <a href="">Youtube</a>
                <a href="">Facebook</a>
            </div>
        </div>
    </footer>
    <!-- End-Footer -->
</body>

</html>