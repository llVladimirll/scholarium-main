<?php
include('../controller/connection.php');

$sql = "SELECT event_id, event_name, organizing_institution_organization, description, date_and_time, location_venue, registration_deadline, registration_fees, application_link, photoName, photo, likes FROM events_and_conferences";

$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../assets/css/test.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Web | Scholarium</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxs-graduation'></i>
      <span class="logo_name">Scholarium</span>
    </div>
    <ul class="nav-links">
      <li id="dashboard-link">
        <a href="./dashboard.php">
          <i class='bx bxs-dashboard'></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="#">
            <i class='bx bxs-data'></i>
            <span class="link_name">Data</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Data</a></li>
          <li><a class="sidebar-link" href="./scholarship.php">Scholarship</a></li>
          <li><a class="sidebar-link" href="./fellowship.php">Fellowship</a></li>
          <li><a class="sidebar-link" href="./competition.php>Competition</a></li>
          <li><a class=" sidebar-link" href="./workshop.php">Workshop or Courses</a></li>
          <li><a class="sidebar-link" href="./grant.php">Grants</a></li>
          <li><a class="sidebar-link" href="./volunteer.php">Volunteer</a></li>
          <li><a class="sidebar-link" href="./training.php">Training center</a></li>
          <li><a class="sidebar-link" href="./culutralExchange.php">Cultural exchange</a></li>
          <li><a class="sidebar-link" href="./events.php">Events and Conferences</a></li>
        </ul>
      </li>



      <li id="users-link">
        <a href="./users.php">
          <i class='bx bxs-user-detail'></i>
          <span class="link_name">Users</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Users</a></li>
        </ul>
      </li>




      <li>
        <div class="icon-link">
          <a href="#">
            <i class='bx bx-envelope'></i>
            <span class="link_name">Applications</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Applications</a></li>
          <li><a id="received-link" href="./appReceived.php">Received</a></li>
          <li><a id="inProgress-link" href="./appInprogress.php">In Progress</a></li>
          <li><a id="finished-link" href="./appFinished.php">Finished</a></li>
        </ul>
      </li>



      <li id="chat-link">
        <a href="../pages/chatting.php">
          <i class='bx bx-conversation'></i>
          <span class="link_name">Chatting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="">Chatting</a></li>
        </ul>
      </li>



      <li id="payment-link">
        <a href="./payments.php">
          <i class='bx bx-dollar'></i>
          <span class="link_name">Payment</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Payment</a></li>
        </ul>
      </li>




      <li id="noti-link">
        <a href="./notifi.php">
          <i class='bx bxs-notification'></i>
          <span class="link_name">Notification</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Notification</a></li>
        </ul>
      </li>


      <li id="support-link">
        <a href="./support.php">
          <i class='bx bx-support'></i>
          <span class="link_name">Support</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Support</a></li>
        </ul>
      </li>
      <li>

        <div class="profile-details">
          <div class="profile-content">
            <img src="../assets/Images/profile.jpg" alt="profile">
          </div>
          <div class="name-job">
            <div class="profile_name">Abdullah</div>
            <div class="job">Admin</div>
          </div>
          <i class='bx bx-log-out'></i>
        </div>
      </li>
    </ul>
  </div>


  <section class="home-section">
    <div class="topbar">
      <div class="header">
        <div>
          <h2>Workshops and Courses Data</h2>
        </div>
        <button class="addData"><a href="../pages/Data/events.html">Add Data </a></button>
      </div>
      <?php if ($result && $result->num_rows > 0): ?>
        <table>
          <tr>
            <th>Event ID</th>
            <th>Event Name</th>
            <th>Organizing Institution/Organization</th>
            <th>Description</th>
            <th>Date and Time</th>
            <th>Location/Venue</th>
            <th>Registration Deadline</th>
            <th>Registration Fees</th>

            <th>Application Link</th>
            <th>Likes</th>
            <th>Photo</th>

            <th>Button</th>
          </tr>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td>
                <?php echo $row["event_id"] ?>
              </td>
              <td>
                <?php echo $row["event_name"] ?>
              </td>
              <td>
                <?php echo $row["organizing_institution_organization"] ?>
              </td>
              <td>
                <?php echo $row["description"] ?>
              </td>
              <td>
                <?php echo $row["date_and_time"] ?>
              </td>
              <td>
                <?php echo $row["location_venue"] ?>
              </td>
              <td>
                <?php echo $row["registration_deadline"] ?>
              </td>
              <td>
                <?php echo $row["registration_fees"] ?>
              </td>

              <td>
                <?php echo $row["application_link"] ?>
              </td>
              <td>
                <?php echo $row["likes"] ?>
              </td>
              <!-- Display image or button to show image -->
              <td><button class="table-btn show-image-btn" onclick="showImagePopup(<?php echo $row['event_id']; ?>)">Show
                  Image</button></td>

              <!-- Edit button to edit event -->
              <td><button class="table-btn edit-btn" onclick="editEvent(<?php echo $row['event_id']; ?>)">Edit</button></td>
            </tr>
          <?php endwhile; ?>
        </table>


        <div class="editPopUp" id="editPopUp">
          <div class="close-btn" onclick="closeEditPopup()">&times;</div>
          <div class="form">
            <form action="../controller/eventUpdate.php" method="post" enctype="multipart/form-data" id="updateForm">
              <h1>Update Data</h1>
              <input type="hidden" id="event_id" name="event_id" />
              <label for="eventName">Event/Conference Name:</label>
              <input type="text" id="eventName" name="eventName" required>

              <!-- Organizing Institution/Organization: Text input -->
              <label for="organizingInstitution">Organizing Institution/Organization:</label>
              <input type="text" id="organizingInstitution" name="organizingInstitution" required>

              <!-- Description: Text area -->
              <label for="description">Description:</label>
              <textarea id="description" name="description" rows="4" required></textarea>

              <!-- Date and Time: Date and time pickers -->
              <label for="dateTime">Date and Time:</label>
              <input type="datetime-local" id="dateTime" name="dateTime" required>

              <!-- Location/Venue: Text input or dropdown -->
              <label for="location">Location/Venue:</label>
              <input type="text" id="location" name="location" required>
              <!-- Or use dropdown/select options for city/venue name -->

              <!-- Registration Deadline: Date picker or text input -->
              <label for="regDeadline">Registration Deadline:</label>
              <input type="date" id="regDeadline" name="regDeadline" required>

              <!-- Registration Fees: Text input or dropdown -->
              <label for="regFees">Registration Fees:</label>
              <input type="text" id="regFees" name="regFees" required>
              <!-- Or use dropdown/select options for free/paid -->



              <!-- Application Link: URL input -->
              <label for="applicationLink">Application Link:</label>
              <input type="url" id="applicationLink" name="applicationLink" required>

              <!-- Upload Photo -->
              <label for="photo">Upload Photo:</label>
              <input type="file" id="photo" name="photo" accept="image/*">

              <!-- Submit Button -->
              <input type="submit" value="Submit">
            </form>
          </div>
        </div>
      </div>

    <?php else: ?>
      <p>No data found.</p>
    <?php endif; ?>
    </div>
    <div id="overlay"
      style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); justify-content: center; align-items: center;">
      <div id="popupContent" style="background-color: white; padding: 20px;">
        <span onclick="closePopup()" style="position: absolute; top: 10px; right: 10px; cursor: pointer;">Close</span>
        <img id="popupImage" src="" alt="Popup Image"
          style="max-width: 80%; max-height: 80%; display: block; margin: 0 auto;">
      </div>
    </div>
  </section>






  <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;
        console.log(arrowParent);
        arrowParent.classList.toggle("showMenu");
      });
    }

    function showImagePopup(workshopId) {
      fetch('../controller/eventGetImages.php?id=' + workshopId)
        .then(response => response.blob())
        .then(blob => {
          const imageUrl = URL.createObjectURL(blob);
          document.getElementById("popupImage").src = imageUrl;
          document.getElementById("overlay").style.display = "flex";
        })
        .catch(error => {
          console.error('Error fetching image:', error);
        });
    }

    function closePopup() {
      document.getElementById("overlay").style.display = "none";
    }

    function editEvent(eventId) {
      fetch(`../controller/eventGetData.php?id=${eventId}`)
        .then(response => response.json())
        .then(data => {
          document.getElementById('event_id').value = eventId;
          document.getElementById("eventName").value = data.event_name;
          document.getElementById("organizingInstitution").value = data.organizing_institution_organization;
          document.getElementById("description").value = data.description;
          document.getElementById("dateTime").value = data.date_and_time;
          document.getElementById("location").value = data.location_venue;
          document.getElementById("regDeadline").value = data.registration_deadline;
          document.getElementById("regFees").value = data.registration_fees;
          document.getElementById("applicationLink").value = data.application_link;

          document.getElementById("editPopUp").style.display = "block";
        })
        .catch(error => {
          console.error('Error fetching event data:', error);
        });
    }


    function closeEditPopup() {
      document.getElementById("editPopUp").style.display = "none";
    }

  </script>
</body>

</html>