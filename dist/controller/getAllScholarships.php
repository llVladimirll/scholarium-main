<?php
session_start();
include('connection.php');


$search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
$query = "SELECT scholarship_id, scholarship_name, sponsoring_organization, photoName, photo FROM scholarships ORDER BY scholarship_id DESC";

if (!empty($search_query)) {
    $query = "SELECT scholarship_id, scholarship_name, sponsoring_organization, photoName, photo FROM scholarships WHERE scholarship_name LIKE '%$search_query%' ORDER BY scholarship_id DESC";
} elseif (empty($search_query) && isset($_GET['search_query'])) {
    // Redirect to scholarshipPage.php if search query is empty
    header("Location: scholarshipPage.php");
    exit();
}



// Check if the current URL doesn't already have the search query


// Fetch all scholarships

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $scholarships = []; // Array to store fetched scholarships

    // Fetch all scholarships and store them in an array
    while ($row = mysqli_fetch_assoc($result)) {
        $scholarships[] = $row;
    }

    // Output the scholarships except the latest one
    foreach ($scholarships as $index => $scholarship) {
        if ($index !== 0) {
            echo '<div class="w-[380px] h-[300px] relative sm:w-[420px] md:w-[380px] xl:w-[400px]">';
            if ($scholarship['photo'] && $scholarship['photoName']) {
                $imageData = base64_encode($scholarship['photo']);
                $imageType = 'image/jpeg';

                echo '<img src="data:' . $imageType . ';base64,' . $imageData . '" alt="' . $scholarship['photoName'] . '" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px] sm:w-[420px] md:w-[380px] xl:w-[400px]" />';
            } else {
                echo '<img src="./assets/image/example.jpg" alt="Default Image" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />';
            }
            echo '<div class="w-[372px] h-[70px] bg-white absolute bottom-1 left-1 rounded-[18px] py-4 px-4 sm:w-[412px] md:w-[372px] xl:w-[392px]">';
            echo '<h1 class="font-semibold text-night uppercase">' . $scholarship['scholarship_name'] . '</h1>';
            echo '<div class="flex gap-2">';
            echo '<h6 class="font-light text-sm leading-3 text-night">' . $scholarship['sponsoring_organization'] . '</h6>';
            echo '</div>';
            echo '<a href="../users_pages/clickPage.php?id=' . $scholarship['scholarship_id'] . '" class="absolute bottom-[15px] right-3" id="test" onclick="show()">';
            echo '<img src="../assets/icon/Navigation.svg" alt="" class="w-8"/></a>';
            echo '</div>';
            echo '</div>';
        }
    }

    // Output the latest scholarship at the bottom and aligned to the left
    $latestScholarship = $scholarships[0];
    echo '<div class="w-[380px] h-[300px] relative sm:w-[420px] md:w-[380px] xl:w-[400px]">';
    if ($latestScholarship['photo'] && $latestScholarship['photoName']) {
        $imageData = base64_encode($latestScholarship['photo']);
        $imageType = 'image/jpeg';

        echo '<img src="data:' . $imageType . ';base64,' . $imageData . '" alt="' . $latestScholarship['photoName'] . '" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px] sm:w-[420px] md:w-[380px] xl:w-[400px]" />';
    } else {
        echo '<img src="./assets/image/example.jpg" alt="Default Image" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />';
    }
    echo '<div class="w-[372px] h-[70px] bg-white absolute bottom-1 left-1 rounded-[18px] py-4 px-4 sm:w-[412px] md:w-[372px] xl:w-[392px]">';
    echo '<h1 class="font-semibold text-night uppercase">' . $latestScholarship['scholarship_name'] . '</h1>';
    echo '<div class="flex gap-2">';
    echo '<h6 class="font-light text-sm leading-3 text-night">' . $latestScholarship['sponsoring_organization'] . '</h6>';
    echo '</div>';
    echo '<a href="../users_pages/clickPage.php?id=" class="absolute bottom-[15px] right-3" id="test" onclick="show()">';
    echo '<img src="../assets/icon/Navigation.svg" alt="" class="w-8"/></a>';
    echo '</div>';
    echo '</div>';
} else {
    echo "No records available.";
}

mysqli_close($conn);
?>