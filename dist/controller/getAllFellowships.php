<?php
session_start();
include ('connection.php');



$query = "SELECT fellowship_id, fellowship_name, organizing_institution, photoName, photo FROM fellowships ORDER BY fellowship_id DESC";





// Check if the current URL doesn't already have the search query


// Fetch all fellowships

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $fellowships = []; // Array to store fetched fellowships

    // Fetch all fellowships and store them in an array
    while ($row = mysqli_fetch_assoc($result)) {
        $fellowships[] = $row;
    }

    // Output the fellowships except the latest one
    foreach ($fellowships as $index => $fellowship) {
        if ($index !== 0) {
            echo '<div class="w-[380px] h-[300px] relative sm:w-[420px] md:w-[380px] xl:w-[400px]">';
            if ($fellowship['photo'] && $fellowship['photoName']) {
                $imageData = base64_encode($fellowship['photo']);
                $imageType = 'image/jpeg';

                echo '<img src="data:' . $imageType . ';base64,' . $imageData . '" alt="' . $fellowship['photoName'] . '" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px] sm:w-[420px] md:w-[380px] xl:w-[400px]" />';
            } else {
                echo '<img src="./assets/image/example.jpg" alt="Default Image" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />';
            }
            echo '<div class="w-[372px] h-[70px] bg-white absolute bottom-1 left-1 rounded-[18px] py-4 px-4 sm:w-[412px] md:w-[372px] xl:w-[392px]">';
            echo '<h1 class="font-semibold text-night uppercase">' . $fellowship['fellowship_name'] . '</h1>';
            echo '<div class="flex gap-2">';
            echo '<h6 class="font-light text-sm leading-3 text-night">' . $fellowship['sponsoring_organization'] . '</h6>';
            echo '</div>';
            echo '<a href="../users_pages/clickPage.php?id=' . $fellowship['fellowship_id'] . '" class="absolute bottom-[15px] right-3" id="test" onclick="show()">';
            echo '<img src="../assets/icon/Navigation.svg" alt="" class="w-8"/></a>';
            echo '</div>';
            echo '</div>';
        }
    }

    // Output the latest fellowship at the bottom and aligned to the left
    $latestfellowship = $fellowships[0];
    echo '<div class="w-[380px] h-[300px] relative sm:w-[420px] md:w-[380px] xl:w-[400px]">';
    if ($latestfellowship['photo'] && $latestfellowship['photoName']) {
        $imageData = base64_encode($latestfellowship['photo']);
        $imageType = 'image/jpeg';

        echo '<img src="data:' . $imageType . ';base64,' . $imageData . '" alt="' . $latestfellowship['photoName'] . '" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px] sm:w-[420px] md:w-[380px] xl:w-[400px]" />';
    } else {
        echo '<img src="./assets/image/example.jpg" alt="Default Image" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />';
    }
    echo '<div class="w-[372px] h-[70px] bg-white absolute bottom-1 left-1 rounded-[18px] py-4 px-4 sm:w-[412px] md:w-[372px] xl:w-[392px]">';
    echo '<h1 class="font-semibold text-night uppercase">' . $latestfellowship['fellowship_name'] . '</h1>';
    echo '<div class="flex gap-2">';
    echo '<h6 class="font-light text-sm leading-3 text-night">' . $latestfellowship['sponsoring_organization'] . '</h6>';
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