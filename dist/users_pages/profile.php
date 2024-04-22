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

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Scholarium</title>
</head>

<body class=" font-Raleway">

    <nav class="w-full flex px-8 gap-3 align-middle items-center justify-between relative">
        <div>
            <a href="./index.php"><img src="./image/letter-s.png" alt class="w-10"></a>
        </div>
        <div class="flex bg-light px-3 rounded-xl w-[87%] sm:w-[50%] align-middle fixed z-50 top-[8px] ml-[54px]">
            <div class="flex gap-3 rounded-lg w-[87%] mr-2">
                <img src="../assets/icon/search.svg" alt class="w-5">
                <input type="search" placeholder="Search Something"
                    class="focus:outline-none bg-light py-3 rounded-sm text-sm w-full">
            </div>
            <span class="mt-[10px]  ">
                <span class="h-full mr-12 border-l-2 border-gray-300"></span>
            </span>
            <div class="custom-dropdown" onclick="toggleDropdown(event)">
                <div class="selected-item">Category</div>
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
                    <li data-value="training-center" class="dropdown-item"><a href="./training.html">Training</a></li>
                </ul>
            </div>
            <img src="../assets/icon/dropdown.svg" alt class="relative left-[3px]">
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

    <div class="container p-8 w-full mt-7">
        <h1 class="text-2xl font-semibold mb-6">Profile & Settings</h1>
        <p class="text-base">Here are your personal information.</p>


        <!-- Change First and Last Name -->
        <section class="mb-6 flex gap-8 w-full mt-6">

            <?php
            include("../controller/connection.php");

            $query = "SELECT first_name, last_name, email, phone_number, degree, country FROM users WHERE user_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                $firstName = $row['first_name'];
                $lastName = $row['last_name'];
                $email = $row['email'];
                $phoneNumber = $row['phone_number'];


            }

            ?>
            <!-- Default Information -->
            <div class="mb-4 w-1/2">
                <label for="currentFirstName" class="block text-gray-700 text-sm font-medium">Current
                    First Name</label>
                <div class="bg-light p-3 rounded-md mt-3 flex justify-between">
                    <span id="currentFirstNameDisplay" class="text-gray-800 ">
                        <?php echo $firstName; ?>
                    </span>
                    <button onclick="editUserInfo('FirstName')" class="text-blue-500 hover:underline ml-2">Edit</button>
                </div>
            </div>
            <div class="mb-4 w-1/2">
                <label for="currentLastName" class="block text-gray-700 text-sm font-medium">Current
                    Last Name</label>
                <div class="bg-light p-3 rounded-md mt-3 flex justify-between">
                    <span id="currentLastNameDisplay" class="text-gray-800">
                        <?php echo $lastName; ?>
                    </span>
                    <button onclick="editUserInfo('LastName')" class="text-blue-500 hover:underline ml-2">Edit</button>
                </div>
            </div>
            <!-- Edit Form Modal -->
            <div id="editModalFirstName"
                class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
                <form action="../controller/editName.php?id=<?php echo $userId; ?>" method="POST">
                    <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
                        <label for="newFirstName" class="block text-gray-700 text-sm font-medium mb-2">New
                            First Name</label>
                        <input type="text" id="newFirstName" name="newFirstName"
                            class="form-input mt-1 block p-3 w-full mb-4">
                        <div class="flex justify-between">
                            <button onclick="exitEdit('FirstName')" class="text-gray-500 hover:underline">Exit</button>
                            <button onclick="saveChanges('FirstName')"
                                class="bg-night hover:bg-hover text-white font-medium py-2 px-4 rounded">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="editModalLastName"
                class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
                <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
                    <label for="newLastName" class="block text-gray-700 text-sm font-medium mb-2">New
                        Last Name</label>
                    <input type="text" id="newLastName" class="form-input mt-1 block p-3 w-full mb-4">
                    <div class="flex justify-between">
                        <button onclick="exitEdit('LastName')" class="text-gray-500 hover:underline">Exit</button>
                        <button onclick="saveChanges('LastName')"
                            class="bg-night hover:bg-hover text-white font-medium py-2 px-4 rounded">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Change Email -->
        <section class="mb-6 w-full flex gap-8">
            <!-- Default Information -->
            <div class="mb-4 w-1/2">
                <label for="currentEmail" class="block text-gray-700 text-sm font-medium">Current
                    Email</label>
                <div class="flex justify-between bg-light p-3 rounded-md mt-3">
                    <span id="currentEmailDisplay" class="text-gray-800">
                        <?php echo $email; ?>
                    </span>
                    <button onclick="editUserInfo('Email')" class="text-blue-500 hover:underline ml-2">Edit</button>
                </div>
            </div>
            <!-- Edit Form Modal -->
            <div id="editModalEmail"
                class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
                <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
                    <label for="newEmail" class="block text-gray-700 text-sm font-medium mb-2">New
                        Email</label>
                    <input type="email" id="newEmail" class="form-input mt-1 block p-3 w-full mb-4">
                    <div class="flex justify-between">
                        <button onclick="exitEdit('Email')" class="text-gray-500 hover:underline">Exit</button>
                        <button onclick="saveChanges('Email')"
                            class="bg-night hover:bg-hover text-white font-medium py-2 px-4 rounded">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
            <!-- Default Information -->
            <div class="mb-4 w-1/2">
                <label for="currentPassword" class="block text-gray-700 text-sm font-medium">Current
                    Password</label>
                <div class="mt-3 p-3 rounded-md bg-light flex justify-between">
                    <span id="currentPasswordDisplay" class="text-gray-800">••••••••••</span>
                    <button onclick="editUserInfo('Password')" class="text-blue-500 hover:underline ml-2">Edit</button>
                </div>
            </div>
            <!-- Edit Form Modal -->
            <div id="editModalPassword"
                class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
                <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
                    <label for="newPassword" class="block text-gray-700 text-sm font-medium mb-2">New
                        Password</label>
                    <input type="password" id="newPassword" class="form-input mt-1 block p-3 w-full mb-4">
                    <div class="flex justify-between">
                        <button onclick="exitEdit('Password')" class="text-gray-500 hover:underline">Exit</button>
                        <button onclick="saveChanges('Password')"
                            class="bg-night hover:bg-hover text-white font-medium py-2 px-4 rounded">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Change Password -->
        <!-- Change Phone Number -->
        <section>
            <!-- Default Information -->
            <div class="mb-4">
                <label for="currentPhoneNumber" class="block text-gray-700 text-sm font-medium">Current
                    Phone Number</label>
                <div class="mt-3 p-3 flex justify-between bg-light rounded-md">
                    <span id="currentPhoneNumberDisplay" class="text-gray-800">
                        <?php echo $phoneNumber; ?>
                    </span>
                    <button onclick="editUserInfo('PhoneNumber')"
                        class="text-blue-500 hover:underline ml-2">Edit</button>
                </div>
            </div>
            <!-- Edit Form Modal -->
            <div id="editModalPhoneNumber"
                class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
                <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
                    <label for="newPhoneNumber" class="block text-gray-700 text-sm font-medium mb-2">New
                        Phone Number</label>
                    <input type="tel" id="newPhoneNumber" class="form-input mt-1 p-3  block w-full mb-4">
                    <div class="flex justify-between">
                        <button onclick="exitEdit('PhoneNumber')" class="text-gray-500 hover:underline">Exit</button>
                        <button onclick="saveChanges('PhoneNumber')"
                            class="bg-night hover:bg-hover text-white font-medium py-2 px-4 rounded">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </section>


        <script>
            function editUserInfo(fieldName) {
                // Display the modal
                const modalId = `editModal${fieldName}`;
                document.getElementById(modalId).classList.remove('hidden');

                // Populate the modal with current user info
                const currentInfo = document.getElementById(`current${fieldName}Display`).innerText;
                document.getElementById(`new${fieldName}`).value = currentInfo;
            }

            function exitEdit(fieldName) {
                // Close the modal without saving changes
                const modalId = `editModal${fieldName}`;
                document.getElementById(modalId).classList.add('hidden');
            }

            function saveChanges(fieldName) {
                // Update the display with new information
                const newInfo = document.getElementById(`new${fieldName}`).value;
                document.getElementById(`current${fieldName}Display`).innerText = newInfo;

                // Close the modal
                const modalId = `editModal${fieldName}`;
                document.getElementById(modalId).classList.add('hidden');
            }
        </script>
    </div>

</body>

</html>