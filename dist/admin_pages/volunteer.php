<?php
include('../controller/connection.php');

$sql = "SELECT opportunity_id, opportunity_name, organizing_organization, description, application_deadline, eligibility_criteria, volunteer_duration, location, notes, application_link, photoName, photo FROM volunteer_opportunities";

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
          <h2>Volunteer Opportunities Data</h2>
        </div>
        <!-- Link to add new volunteer data -->
        <button class="addData"><a href="../pages/Data/volunteer.html">Add Data</a></button>
      </div>
      <?php if ($result && $result->num_rows > 0): ?>
        <!-- Table for displaying volunteer opportunities information -->
        <table>
          <tr>
            <th>Opportunity ID</th>
            <th>Opportunity Name</th>
            <th>Organizing Organization</th>
            <th>Description</th>
            <th>Application Deadline</th>
            <th>Eligibility Criteria</th>
            <th>Volunteer Duration</th>
            <th>Location</th>
            <th>Notes</th>
            <th>Application Link</th>
            <th>Photo</th>
            <th>Edit</th>
            <!-- Adjusted table headers based on volunteer opportunities data -->
          </tr>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td>
                <?php echo $row["opportunity_id"] ?>
              </td>
              <td>
                <?php echo $row["opportunity_name"] ?>
              </td>
              <td>
                <?php echo $row["organizing_organization"] ?>
              </td>
              <td>
                <?php echo $row["description"] ?>
              </td>
              <td>
                <?php echo $row["application_deadline"] ?>
              </td>
              <td>
                <?php echo $row["eligibility_criteria"] ?>
              </td>
              <td>
                <?php echo $row["volunteer_duration"] ?>
              </td>
              <td>
                <?php echo $row["location"] ?>
              </td>
              <td>
                <?php echo $row["notes"] ?>
              </td>
              <td>
                <?php echo $row["application_link"] ?>
              </td>
              <!-- Display image or button to show image -->
              <td><button class="table-btn show-image-btn"
                  onclick="showImagePopup(<?php echo $row['opportunity_id']; ?>)">Show Image</button></td>
              <!-- You might need to adjust the columns based on your data -->
              <td><button class="table-btn edit-btn"
                  onclick="editOpportunity(<?php echo $row['opportunity_id']; ?>)">Edit</button></td>



            </tr>
          <?php endwhile; ?>
        </table>
        <div class="editPopUp" id="editPopUp">
          <div class="close-btn" onclick="closeEditPopup()">&times;</div>
          <div class="form">
            <form action="../controller/volunteerUpdate.php" method="post" enctype="multipart/form-data" id="updateForm">
              <h1>Update Data</h1>
              <input type="hidden" id="opportunity_id" name="opportunity_id" />
              <!-- Opportunity Name: Text input -->
              <label for="opportunityName">Opportunity Name:</label>
              <input type="text" id="opportunityName" name="opportunityName" required>

              <!-- Organizing Organization: Text input -->
              <label for="organizingOrg">Organizing Organization:</label>
              <input type="text" id="organizingOrg" name="organizingOrg" required>

              <!-- Description: Text area -->
              <label for="description">Description:</label>
              <textarea id="description" name="description" rows="4" required></textarea>

              <!-- Application Deadline: Date picker or text input -->
              <label for="appDeadline">Application Deadline:</label>
              <input type="date" id="appDeadline" name="appDeadline" required>

              <!-- Eligibility Criteria: Text area or checkboxes/radio buttons -->
              <label for="eligibilityCriteria">Eligibility Criteria:</label>
              <textarea id="eligibilityCriteria" name="eligibilityCriteria" rows="4" required></textarea>
              <!-- Or use checkboxes/radio buttons -->

              <!-- Volunteer Duration: Text input or dropdown -->
              <label for="volunteerDuration">Volunteer Duration:</label>
              <input type="text" id="volunteerDuration" name="volunteerDuration">
              <!-- Or use dropdown/select options for hours/weeks -->

              <!-- Location: Text input or dropdown -->
              <label for="location">Location:</label>
              <input type="text" id="location" name="location" required>
              <!-- Or use dropdown/select options for city/remote -->

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
          <?php else: ?>
            <p>No data found.</p>
          <?php endif; ?>
        </div>
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

    function showImagePopup(grantId) {
      fetch('../controller/volunteerGetImages.php?id=' + grantId)
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

    function editOpportunity(opportunityId) {
      fetch(`../controller/volunteerGetData.php?id=${opportunityId}`)
        .then(response => response.json())
        .then(data => {
          document.getElementById('opportunity_id').value = opportunityId;
          document.getElementById("opportunityName").value = data.opportunity_name;
          document.getElementById("organizingOrg").value = data.organizing_organization;
          document.getElementById("description").value = data.description;
          document.getElementById("appDeadline").value = data.application_deadline;
          document.getElementById("eligibilityCriteria").value = data.eligibility_criteria;
          document.getElementById("volunteerDuration").value = data.volunteer_duration;
          document.getElementById("location").value = data.location;
          document.getElementById("notes").value = data.notes;
          document.getElementById("applicationLink").value = data.application_link;

          document.getElementById("editPopUp").style.display = "block";
        })
        .catch(error => {
          console.error('Error fetching opportunity data:', error);
        });
    }


    function closeEditPopup() {
      document.getElementById("editPopUp").style.display = "none";
    }

  </script>
</body>

</html>