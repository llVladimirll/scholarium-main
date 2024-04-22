<?php
include('../controller/connection.php');

$sql = "SELECT workshop_course_id, workshop_course_name, provider_organization, description, date_and_time, duration, location_venue, registration_deadline, target_audience, cost_fees, instructors_facilitators, requirements, notes, likes, application_link, photoName, photo FROM workshops_and_courses";

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
        <button class="addData"><a href="../pages/Data/workshop.html">Add Data </a></button>
      </div>
      <?php if ($result && $result->num_rows > 0): ?>
        <table>
          <tr>
            <th>workshop_course_id </th>
            <th>Workshop/Course Name</th>
            <th>Provider Organization</th>
            <th>Description</th>
            <th>Date and Time</th>
            <th>Duration</th>
            <th>Location/Venue</th>
            <th>Registration Deadline</th>
            <th>Target Audience</th>
            <th>Cost/Fees</th>
            <th>Instructors/Facilitators</th>
            <th>Requirements</th>
            <th>Notes</th>
            <th>Likes</th>
            <th>Application Link</th>
            <th>Image</th>
            <th>Button</th>
          </tr>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td>
                <?php echo $row["workshop_course_id"] ?>
              </td>
              <td>
                <?php echo $row["workshop_course_name"] ?>
              </td>
              <td>
                <?php echo $row["provider_organization"] ?>
              </td>
              <td>
                <?php echo $row["description"] ?>
              </td>
              <td>
                <?php echo $row["date_and_time"] ?>
              </td>
              <td>
                <?php echo $row["duration"] ?>
              </td>
              <td>
                <?php echo $row["location_venue"] ?>
              </td>
              <td>
                <?php echo $row["registration_deadline"] ?>
              </td>
              <td>
                <?php echo $row["target_audience"] ?>
              </td>
              <td>
                <?php echo $row["cost_fees"] ?>
              </td>
              <td>
                <?php echo $row["instructors_facilitators"] ?>
              </td>
              <td>
                <?php echo $row["requirements"] ?>
              </td>
              <td>
                <?php echo $row["notes"] ?>
              </td>
              <td>
                <?php echo $row["likes"] ?>
              </td>
              <td>
                <?php echo $row["application_link"] ?>
              </td>
              <td><button class="table-btn show-image-btn"
                  onclick="showImagePopup(<?php echo $row['workshop_course_id']; ?>)">Show Image</button></td>
              <td><button class="table-btn edit-btn" id="editData"
                  onclick="editWorkshop(<?php echo $row['workshop_course_id']; ?>)">Edit</button></td>
            </tr>
          <?php endwhile; ?>
        </table>



        <div class="editPopUp" id="editPopUp">
          <div class="close-btn" onclick="closeEditPopup()">&times;</div>
          <div class="form">
            <form action="../controller/workshopUpdate.php" method="post" enctype="multipart/form-data" id="updateForm">
              <h1>Update Data</h1>
              <input type="hidden" id="workshop_course_id" name="workshop_course_id" />
              <!-- Workshop/Course Name: Text input -->
              <label for="workshopName">Workshop/Course Name:</label>
              <input type="text" id="workshopName" name="workshopName" required>

              <!-- Provider/Organization: Text input -->
              <label for="provider">Provider/Organization:</label>
              <input type="text" id="provider" name="provider" required>

              <!-- Description: Text area -->
              <label for="description">Description:</label>
              <textarea id="description" name="description" rows="4" required></textarea>

              <!-- Date and Time: Date and time pickers -->
              <label for="dateTime">Date and Time:</label>
              <input type="datetime-local" id="dateTime" name="dateTime" required>

              <!-- Duration: Text input or dropdown -->
              <label for="duration">Duration:</label>
              <input type="text" id="duration" name="duration" required>
              <!-- Or use dropdown/select options -->

              <!-- Location/Venue: Text input or dropdown -->
              <label for="location">Location/Venue:</label>
              <input type="text" id="location" name="location" required>
              <!-- Or use dropdown/select options -->

              <!-- Registration Deadline: Date picker or text input -->
              <label for="regDeadline">Registration Deadline:</label>
              <input type="date" id="regDeadline" name="regDeadline" required>

              <!-- Target Audience: Text area or checkboxes/radio buttons -->
              <label for="targetAudience">Target Audience:</label>
              <textarea id="targetAudience" name="targetAudience" rows="4" required></textarea>
              <!-- Or use checkboxes/radio buttons -->

              <!-- Cost/Fees: Text input or dropdown -->
              <label for="fees">Cost/Fees:</label>
              <input type="text" id="fees" name="fees" required>
              <!-- Or use dropdown/select options -->

              <!-- Instructors/Facilitators: Text area or a structured form -->
              <label for="instructors">Instructors/Facilitators:</label>
              <textarea id="instructors" name="instructors" rows="4" required></textarea>
              <!-- Or use structured form inputs -->

              <!-- Requirements: Text area or checklist -->
              <label for="requirements">Requirements:</label>
              <textarea id="requirements" name="requirements" rows="4" required></textarea>
              <!-- Or use checkboxes for a checklist -->

              <!-- Notes: Text Area -->
              <label for="notes">Notes:</label>
              <textarea id="notes" name="notes" rows="4" required></textarea>

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
      fetch('../controller/workshopGetImages.php?id=' + workshopId)
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

    function editWorkshop(workshopId) {
      fetch(`../controller/workshopGetData.php?id=${workshopId}`)
        .then(response => response.json())
        .then(data => {
          document.getElementById('workshop_course_id').value = workshopId;
          document.getElementById("workshopName").value = data.workshop_course_name;
          document.getElementById("provider").value = data.provider_organization;
          document.getElementById("description").value = data.description;
          document.getElementById("dateTime").value = data.date_and_time;
          document.getElementById("duration").value = data.duration;
          document.getElementById("location").value = data.location_venue;
          document.getElementById("regDeadline").value = data.registration_deadline;
          document.getElementById("targetAudience").value = data.target_audience;
          document.getElementById("fees").value = data.cost_fees;
          document.getElementById("instructors").value = data.instructors_facilitators;
          document.getElementById("requirements").value = data.requirements;
          document.getElementById("notes").value = data.notes;
          document.getElementById("applicationLink").value = data.application_link;

          document.getElementById("editPopUp").style.display = "block";
        })
        .catch(error => {
          console.error('Error fetching workshop data:', error);
        });
    }

    function closeEditPopup() {
      document.getElementById("editPopUp").style.display = "none";
    }

  </script>
</body>

</html>