<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $userId = $_SESSION['user_id']; // Retrieve user ID from the session
    // Continue with your payment logic, using $userId as needed
} else {
    // Redirect the user to the login page if they are not logged in
    header('Location: ./login.html');
    exit();
}


?>

<?php
session_start();

if (isset($_SESSION['payment_success']) && $_SESSION['payment_success']) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('successModal');
            modal.style.display = 'block';

            // Close modal and redirect on 'Continue' click
            const continueButton = document.getElementById('continueButton');
            continueButton.addEventListener('click', function () {
                modal.style.display = 'none';
                window.location.href = './index.php'; // Redirect to index page or appropriate location
            });
        });
    </script>";

    unset($_SESSION['payment_error']);
    unset($_SESSION['payment_success']);
} ?>

<?php
if (isset($_GET['package'])) {
    $package = $_GET['package'];
    if ($package == 'essential') {
        $total = 50;
    } else if ($package == 'premium') {
        $total = 75;
    } else if ($package == 'ultimate') {
        $total = 100;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Scholarium</title>
    <link rel="icon" href="./image/web-logo.png" type="image/png" />
    <link rel="stylesheet" href="./style.css" />
</head>

<body class="font-Raleway">
    <nav class="w-full flex px-8 gap-3 align-middle items-center justify-between relative">
        <div>
            <a href="./index.php"><img src="../assets/icon/letter-s.png" alt class="w-10" /></a>
        </div>
        <div class="flex bg-light px-3 rounded-xl w-[87%] sm:w-[50%] align-middle fixed z-50 top-[8px] ml-[54px]">
            <div class="flex gap-3 rounded-lg w-[87%] mr-2">
                <img src="../assets/icon/Searching.svg" alt class="w-5" />
                <input type="search" placeholder="Search Something"
                    class="focus:outline-none bg-light py-3 rounded-sm text-sm w-full" />
            </div>
            <span class="mt-[10px]">
                <span class="h-full mr-12 border-l-2 border-gray-300"></span>
            </span>
            <div class="custom-dropdown" onclick="toggleDropdown(event)">
                <div class="selected-item">Category</div>
                <ul class="dropdown-list" id="categoryList">
                    <li data-value="scholarship" class="dropdown-item">
                        <a href="./scholarshipPage.php">Scholarship</a>
                    </li>
                    <li data-value="fellowship" class="dropdown-item">
                        <a href="./fellowship.html">Fellowship</a>
                    </li>
                    <li data-value="grants" class="dropdown-item">
                        <a href="./grants.html">Grants</a>
                    </li>
                    <li data-value="volunteer" class="dropdown-item">
                        <a href="./volunteer.html">Volunteer</a>
                    </li>
                    <li data-value="event" class="dropdown-item">
                        <a href="./event.html">Event</a>
                    </li>
                    <li data-value="competition" class="dropdown-item">
                        <a href="./competition.html">Competition</a>
                    </li>
                    <li data-value="cultural-exchange" class="dropdown-item">
                        <a href="./interchange.html">Interchange</a>
                    </li>
                    <li data-value="workshop" class="dropdown-item">
                        <a href="./workshop.html">Workshop</a>
                    </li>
                    <li data-value="training-center" class="dropdown-item">
                        <a href="./skillHub.html">Skill Hub</a>
                    </li>
                </ul>
            </div>
            <img src="../assets/icon/dropdown.svg" alt class="relative left-[3px]" />
        </div>
        <div class="ml-2 relative">
            <button id="dropdownButton" class="focus:outline-none">
                <img src="./image/login-icon.svg" alt class="w-10 mt-3" />
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

    <main class="mt-10">
        <div class="w-ful min-h-screen items-center flex flex-grow">
            <div class="flex-col justify-center items-center w-full">
                <div class="max-w-lg w-full m-auto pl-12 py-6">
                    <div class="flex justify-between">
                        <h3 class="text-3xl font-semibold" id="subscriptionTitle">
                            Monthly subscription
                        </h3>
                        <div class="text-xl font-semibold" id="subscriptionPrice">
                            <?php
                            echo '$' . $total;
                            ?>
                        </div>
                    </div>
                    <div class="mt-2 text-gray-500 -400 text-base" id="subscriptionDescription">
                        <?php
                        echo '$' . $total;
                        ?>
                        billed every month
                    </div>
                </div>
            </div>
            <div class="w-full gap-8 flex flex-col">
                <div class="max-w-lg w-full mx-auto px-8 py-6">
                    <!-- Form Start -->
                    <form action="../controller/process_payment.php" method="post">
                        <input type="hidden" name="userId" value="<?php echo $userId; ?>">

                        <input type="hidden" name="total" value="<?php echo $total; ?>">

                        <div class="mb-5">
                            <label for="input-number" class="block text-sm font-medium mb-2">Card number</label>
                            <input type="text" id="input-number"
                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm placeholder-gray-300 shadow-sm"
                                placeholder="0000 0000 0000 0000" />
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6">
                            <div class="mb-5">
                                <label for="input-exp" class="block text-sm font-medium mb-2">Expiration</label>
                                <input type="text" id="input-exp"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm placeholder-gray-300 shadow-sm"
                                    placeholder="MM/YY" />
                            </div>
                            <div class="mb-5">
                                <label for="input-exp" class="block text-sm font-medium mb-2">CVC</label>
                                <input type="text" id="input-exp"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm placeholder-gray-300 shadow-sm"
                                    placeholder="CVC" />
                            </div>
                        </div>
                        <div class="mb-5 text-xs text-gray-400">
                            By providing your card information, you allow Company to charge
                            your card for future payments in accordance with their terms.
                        </div>
                        <div class="mb-5">
                            <label for="input-number" class="block text-sm font-medium mb-2">Cardholder name</label>
                            <input type="text" id="input-number"
                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm placeholder-gray-300 shadow-sm"
                                placeholder="John Doe" />
                        </div>
                        <div class="mb-5">
                            <label for="input-country" class="block text-sm font-medium mb-2">Billing address</label>
                            <select id="input-country"
                                class="py-3 px-4 block w-full border-gray-200 rounded-t-lg text-sm placeholder-gray-300">
                                <option>Country</option>
                            </select>
                            <input type="text" id="input-zip"
                                class="py-3 px-4 block w-full border-gray-200 rounded-b-lg border-t-0 text-sm placeholder-gray-300 shadow-sm"
                                placeholder="Zip Code" />
                        </div>
                        <div class="mb-5">
                            <div class="flex justify-between py-1 text-gray-700 font-medium">
                                <div id="subtotalLabel">Subtotal</div>
                                <div id="subtotalValue">
                                    <?php
                                    echo '$' . $total;
                                    ?>
                                </div>
                            </div>
                            <div class="flex justify-between py-1 text-gray-700 font-medium">
                                <div id="totalLabel">Total</div>
                                <div id="totalValue">
                                    <?php
                                    echo '$' . $total;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Pay Now"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent bg-night text-white hover:bg-hover  transition-all" />
                </div>
                </form>
            </div>
        </div>
    </main>
    <!-- This goes within your HTML -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <h2>Payment Status</h2>
            <?php
            // Display appropriate message based on payment success/failure
            if (isset($_SESSION['payment_success']) && $_SESSION['payment_success'] === true) {
                echo "<p>Your payment was successful!</p>";
            } else {
                echo "<p>Payment failed. Error: " . $_SESSION['payment_error'] . "</p>";
            }
            ?>
            <button id="continueButton">Continue</button>
        </div>
    </div>

    <script src="./assets/js/payment.js"></script>
</body>

</html>