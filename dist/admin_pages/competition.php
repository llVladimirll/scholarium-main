<?php
include('../controller/connection.php');

$sql = "SELECT competition_id, competition_name, organizer, description, deadline, eligibility_criteria, prize_details, application_process, judging_criteria, notes, application_link, likes, photoName, photo FROM competitions_and_prizes";

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
  <style>
    .home-section button.addData {
      background-color: black;
      /* Set button background color to black */
      border: none;
      /* Remove button border */
      padding: 8px 16px;
      /* Adjust button padding */
    }

    /* Styling for the anchor within .home-section button */
    .home-section button.addData a {
      color: white;
      /* Set anchor text color to white */
      font-weight: bold;
      /* Make anchor text bold */
      text-decoration: none;
      /* Remove underline from anchor */
    }
  </style>

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
          <h2>Competitions and Prizes Data</h2>
        </div>
        <button class="addData"><a href="../pages/Data/compitition.html">Add Data </a></button>
      </div>
      <?php if ($result && $result->num_rows > 0): ?>
        <table>
          <tr>
            <th>competition_id</th>
            <th>competition_name</th>
            <th>organizer</th>
            <th>description</th>
            <th>deadline</th>
            <th>eligibility_criteria</th>
            <th>prize_details</th>
            <th>application_process</th>
            <th>judging_criteria</th>
            <th>notes</th>

            <th>likes</th>
            <th>application_link</th>
            <th>Image</th>
            <th>Button</th>
          </tr>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td>
                <?php echo $row["competition_id"] ?>
              </td>
              <td>
                <?php echo $row["competition_name"] ?>
              </td>
              <td>
                <?php echo $row["organizer"] ?>
              </td>
              <td>
                <?php echo $row["description"] ?>
              </td>
              <td>
                <?php echo $row["deadline"] ?>
              </td>
              <td>
                <?php echo $row["eligibility_criteria"] ?>
              </td>
              <td>
                <?php echo $row["prize_details"] ?>
              </td>
              <td>
                <?php echo $row["application_process"] ?>
              </td>
              <td>
                <?php echo $row["judging_criteria"] ?>
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
                  onclick="showImagePopup(<?php echo $row['competition_id']; ?>)">Show Image</button></td>
              <td><button class="table-btn edit-btn" id="editData"
                  onclick="editCompetition(<?php echo $row['competition_id']; ?>)">Edit</button></td>
            </tr>
          <?php endwhile; ?>
        </table>

        <div class="editPopUp" id="editPopUp">
          <div class="close-btn" onclick="closeEditPopup()">&times;</div>
          <div class="form">
            <form action="../controller/competitionUpdate.php" method="post" enctype="multipart/form-data"
              id="updateForm">
              <h1>Update Data</h1>
              <input type="hidden" id="competition_id" name="competition_id" />
              <!-- Competition/Prize Name: Text input -->
              <label for="competitionName">Competition/Prize Name:</label>
              <input type="text" id="competitionName" name="competitionName" required>

              <!-- Organizer: Text input -->
              <label for="organizer">Organizer:</label>
              <input type="text" id="organizer" name="organizer" required>

              <!-- Description: Text area for a brief overview -->
              <label for="description">Description:</label>
              <textarea id="description" name="description" rows="4" required></textarea>

              <!-- Deadline: Date picker or text input -->
              <label for="deadline">Deadline:</label>
              <input type="date" id="deadline" name="deadline" required>

              <!-- Eligibility Criteria: Text area or checkboxes/radio buttons -->
              <label for="eligibilityCriteria">Eligibility Criteria:</label>
              <textarea id="eligibilityCriteria" name="eligibilityCriteria" rows="4" required></textarea>
              <!-- Or use checkboxes/radio buttons here -->

              <!-- Prize Details: Text area or a structured form -->
              <label for="prizeDetails">Prize Details:</label>
              <textarea id="prizeDetails" name="prizeDetails" rows="4" required></textarea>
              <!-- Or use structured form inputs -->

              <!-- Application Process: Text area or a step-by-step form -->
              <label for="applicationProcess">Application Process:</label>
              <textarea id="applicationProcess" name="applicationProcess" rows="4" required></textarea>
              <!-- Or use step-by-step form inputs -->

              <!-- Judging Criteria: Text area or a structured form -->
              <label for="judgingCriteria">Judging Criteria:</label>
              <textarea id="judgingCriteria" name="judgingCriteria" rows="4" required></textarea>
              <!-- Or use structured form inputs -->

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
      <p>No data available</p>
    <?php endif; ?>

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

    function showImagePopup(competitionId) {
      fetch('../controller/competitionGetImages.php?id=' + competitionId)
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


    function editCompetition(competitionId) {
      fetch(`../controller/competitionGetData.php?id=${competitionId}`)
        .then(response => response.json())
        .then(data => {
          document.getElementById('competition_id').value = competitionId;
          document.getElementById("competitionName").value = data.competition_name;
          document.getElementById("organizer").value = data.organizer;
          document.getElementById("description").value = data.description;
          document.getElementById("deadline").value = data.deadline;
          document.getElementById("eligibilityCriteria").value = data.eligibility_criteria;
          document.getElementById("prizeDetails").value = data.prize_details;
          document.getElementById("applicationProcess").value = data.application_process;
          document.getElementById("judgingCriteria").value = data.judging_criteria;
          document.getElementById("notes").value = data.notes;
          document.getElementById("applicationLink").value = data.application_link;

          document.getElementById("editPopUp").style.display = "block";
        })
        .catch(error => {
          console.error('Error fetching competition data:', error);
        });
    }

    function closeEditPopup() {
      document.getElementById("editPopUp").style.display = "none";
    }
  </script>
</body>

</html>