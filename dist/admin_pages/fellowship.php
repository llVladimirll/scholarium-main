<?php
include ('../controller/connection.php');

$sql = "SELECT fellowship_id, fellowship_name, organizing_institution, description, bachelor, master, phd, application_deadline, eligibility_criteria, duration, benefits, application_process, selection_criteria, notes, likes, application_link FROM fellowships";

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
          <h2>Fellowships Data</h2>
        </div>
        <button class="addData"><a href="./Data/fellowship.html">Add Data </a></button>

      </div>

      <?php if ($result && $result->num_rows > 0): ?>
        <table>
          <tr>
            <th>Fellowship ID</th>
            <th>Fellowship Name</th>
            <th>Organizing Institution</th>
            <th>Description</th>
            <th>Bachelor</th>
            <th>Master</th>
            <th>PHD</th>
            <th>Application Deadline</th>
            <th>Eligibility Criteria</th>
            <th>Duration</th>
            <th>Benefits</th>
            <th>Appliction Process</th>
            <th>Selection Criteria</th>
            <th>Notes</th>
            <th>Likes</th>
            <th>Application Link</th>
            <th>Image</th>
            <th>Button</th>
          </tr>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td>
                <?php echo $row["fellowship_id"] ?>
              </td>
              <td>
                <?php echo $row["fellowship_name"] ?>
              </td>
              <td>
                <?php echo $row["organizing_institution"] ?>
              </td>
              <td>
                <?php echo $row["description"] ?>
              </td>
              <td>
                <?php
                if ($row["bachelor"] == 1) {
                  echo 'yes';
                } else {
                  echo 'no';
                }
                ?>
              </td>
              <td>
                <?php
                if ($row["master"] == 1) {
                  echo 'yes';
                } else {
                  echo 'no';
                }
                ?>
              </td>
              <td>
                <?php
                if ($row["phd"] == 1) {
                  echo 'yes';
                } else {
                  echo 'no';
                }
                ?>
              </td>
              <td>
                <?php echo $row["application_deadline"] ?>
              </td>
              <td>
                <?php echo $row["eligibility_criteria"] ?>
              </td>
              <td>
                <?php echo $row["duration"] ?>
              </td>
              <td>
                <?php echo $row["benefits"] ?>
              </td>
              <td>
                <?php echo $row["application_process"] ?>
              </td>
              <td>
                <?php echo $row["selection_criteria"] ?>
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
                  onclick="showImagePopup(<?php echo $row['fellowship_id']; ?>)">Show Image</button></td>
              <td><button class="table-btn edit-btn"
                  onclick="editFellowship(<?php echo $row['fellowship_id']; ?>)">Edit</button></td>

            </tr>
          <?php endwhile; ?>
        </table>
        <div class="editPopUp" id="editPopUp" style="display: none;">
          <div class="close-btn" onclick="closeEditPopup()">&times;</div>
          <h1>Update Fellowship</h1>
          <div class="form">
            <form action="../controller/fellowshipUpdate.php" method="post" enctype="multipart/form-data" id="updateForm">
              <input type="hidden" id="fellowship_id" name="fellowship_id" />
              <label for="fellowship_name">Fellowship Name:</label>
              <input type="text" id="fellowship_name" name="fellowship_name" required>

              <label for="organizing_institution">Organizing Institution:</label>
              <input type="text" id="organizing_institution" name="organizing_institution" required>

              <label for="description">Description:</label>
              <textarea id="description" name="description" required></textarea>

              <label for="degree">Degree:</label>
              <div class="degree-options">
                <label>
                  <input type="checkbox" id="bachelor" name="bachelor">
                  Bachelor
                </label>
                <label>
                  <input type="checkbox" id="master" name="master">
                  Master
                </label>
                <label>
                  <input type="checkbox" id="phd" name="phd">
                  PhD
                </label>
              </div>

              <label for="application_deadline">Application Deadline:</label>
              <input type="date" id="application_deadline" name="application_deadline" required>

              <label for="duration">Duration:</label>
              <input type="text" id="duration" name="duration" required>

              <label for="benefits">Benefits:</label>
              <textarea id="benefits" name="benefits" required></textarea>

              <label for="selection_criteria">Selection Criteria:</label>
              <textarea id="selection_criteria" name="selection_criteria" required></textarea>


              <label for="application_process">Application Process:</label>
              <textarea id="application_process" name="application_process" required></textarea>

              <label for="eligibility_criteria">Eligibility Criteria:</label>
              <textarea id="eligibility_criteria" name="eligibility_criteria" required></textarea>

              <label for="note">Notes:</label>
              <textarea id="note" name="note" required></textarea>

              <label for="application_link">Application Link:</label>
              <input type="url" id="application_link" name="application_link" required>

              <label for="photo">Upload Photo:</label>
              <input type="file" id="photo" name="photo" accept="image/*">

              <input type="submit" value="Save Changes" />
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
    // Toggle menu for fellowship options
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;
        arrowParent.classList.toggle("showMenu");
      });
    }

    // Function to display an image popup
    function showImagePopup(fellowshipId) {
      fetch('../controller/fellowshipGetImages.php?id=' + fellowshipId)
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

    // Function to close the image popup
    function closePopup() {
      document.getElementById("overlay").style.display = "none";
    }

    // Function to edit fellowship data
    function editFellowship(fellowshipId) {
      console.log("Edit button clicked for Fellowship ID: " + fellowshipId);
      fetch(`../controller/fellowshipGetData.php?id=${fellowshipId}`)
        .then(response => response.json())
        .then(data => {
          document.getElementById('fellowship_id').value = fellowshipId;
          document.getElementById("fellowship_name").value = data.fellowship_name;
          document.getElementById("organizing_institution").value = data.organizing_institution;
          document.getElementById("description").value = data.description;
          document.getElementById("bachelor").checked = !!parseInt(data.bachelor);
          document.getElementById("master").checked = !!parseInt(data.master);
          document.getElementById("phd").checked = !!parseInt(data.phd);
          document.getElementById("application_deadline").value = data.application_deadline;
          document.getElementById("duration").value = data.duration;
          document.getElementById("benefits").value = data.benefits;
          document.getElementById("selection_criteria").value = data.selection_criteria;
          document.getElementById("application_process").value = data.application_process;
          document.getElementById("eligibility_criteria").value = data.eligibility_criteria;
          document.getElementById("note").value = data.note;
          document.getElementById("application_link").value = data.application_link;

          document.getElementById("editPopUp").style.display = "block";
        })
        .catch(error => {
          console.error('Error fetching fellowship data:', error);
        });
    }

    // Function to close the edit popup
    function closeEditPopup() {
      document.getElementById("editPopUp").style.display = "none";
    }
  </script>
</body>

</html>