<?php

session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $userId = $_SESSION['user_id'];
} else {

    header('Location: ./login.html');
    exit();
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

<body class="font-Raleway overflow-x-hidden scroll-smooth">
    <nav class="w-full flex px-8 gap-3 align-middle items-center justify-between relative">
        <div>
            <a href="./index.php"><img src="./image/letter-s.png" alt class="w-10"></a>
        </div>
        <div class="flex bg-light px-3 rounded-xl w-[87%] sm:w-[50%] align-middle fixed z-50 top-[8px] ml-[54px]">
            <div class="flex gap-3 rounded-lg w-[87%] mr-2">
                <img src="../assets/icon/Searching.svg" alt class="w-5">
                <input type="search" placeholder="Search Something"
                    class="focus:outline-none bg-light py-3 rounded-sm text-sm w-full">
            </div>
            <span class="mt-[10px]  ">
                <span class="h-full mr-12 border-l-2 border-gray-300"></span>
            </span>
            <div class="custom-dropdown" onclick="toggleDropdown(event)">
                <div class="selected-item">Scholarship</div>
                <ul class="dropdown-list" id="categoryList">
                    <li data-value="scholarship" class="dropdown-item"><a href="./scholarshipPage.php">Scholarship</a>
                    </li>
                    <li data-value="fellowship" class="dropdown-item"><a href="./fellowship.html">Fellowship</a></li>
                    <li data-value="grants" class="dropdown-item"><a href="./grants.html">Grants</a></li>
                    <li data-value="volunteer" class="dropdown-item"><a href="./volunteer.html">Volunteer</a></li>
                    <li data-value="event" class="dropdown-item"><a href="./event.html">Event</a></li>
                    <li data-value="competition" class="dropdown-item"><a href="./competition.html">Competition</a></li>
                    <li data-value="cultural-exchange" class="dropdown-item"><a
                            href="./interchange.html">Interchange</a></li>
                    <li data-value="workshop" class="dropdown-item"><a href="./workshop.html">Workshop</a></li>
                    <li data-value="training-center" class="dropdown-item"><a href="./skillHub.html">Skill Hub</a></li>
                </ul>
            </div>
            <img src="../assets/icon/dropdown.svg" alt="" class="relative left-[3px]">
        </div>
        <div class="ml-2 relative">
            <button id="dropdownButton" class="focus:outline-none">
                <img src="./image/login-icon.svg" alt class="w-10 mt-3">
            </button>
            <!-- Dropdown Menu -->
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 bg-night rounded-md shadow-md px-2 py-3">
                <a href="#" class="block px-4 py-2 text-sm text-white hover:text-light">Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-white hover:text-light">Settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-white hover:text-light">Logout</a>
            </div>
            <!-- End Dropdown Menu -->
        </div>
    </nav>
    <!-- END NAVBAR -->

    <!--Hero-Section-->
    <div>
        <div class="m-auto w-11/12">
            <h2
                class="md:mt-[12%] mb-[8%] mt-[8%]  text-center font-medium text-night xl:text-4xl text-4xl sm:text-2xl ">
                Discover inspiration and explore a wealth of<br>opportunities from all over the world.
            </h2>
        </div>
    </div>
    <!--End-Hero-Section-->
    <!--Scholarship Cart-->
    <div class="px-12 mt-12 relative">
        <div class="flex flex-wrap-reverse justify-center gap-6 ">
            <?php include('../controller/getAllScholarships.php'); ?>
        </div>
    </div>
    <!--End Scholarship Cart-->
    <!-- Footer -->
    <footer class="px-12 mt-6 h-[150px]">
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
    <script src="../assets/js/scholarship"></script>
</body>

</html>