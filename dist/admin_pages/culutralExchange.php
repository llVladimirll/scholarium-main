<?php
include('../controller/connection.php');

$sql = "SELECT program_id, program_name, organizing_institution_organization, description, application_deadline, eligibility_criteria, program_duration, location, application_link, photoName, photo FROM cultural_exchange_residency_programs";

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
          <h2>Cultural Exchange Programs Data</h2>
        </div>
        <!-- Link to add new cultural exchange program data -->
        <button class="addData"><a href="../pages/Data/culutralExchange.html">Add Data</a></button>
      </div>
      <?php if ($result && $result->num_rows > 0): ?>
        <!-- Table for displaying cultural exchange program information -->
        <table>
          <thead>
            <tr>
              <th>Program ID</th>
              <th>Program Name</th>
              <th>Organizing Institution</th>
              <th>Description</th>
              <th>Application Deadline</th>
              <th>Eligibility Criteria</th>
              <th>Program Duration</th>
              <th>Location</th>
              <th>Application Link</th>
              <th>Photo</th>
              <th>Edit</th>

            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td>
                  <?php echo $row['program_id']; ?>
                </td>
                <td>
                  <?php echo $row['program_name']; ?>
                </td>
                <td>
                  <?php echo $row['organizing_institution_organization']; ?>
                </td>
                <td>
                  <?php echo $row['description']; ?>
                </td>
                <td>
                  <?php echo $row['application_deadline']; ?>
                </td>
                <td>
                  <?php echo $row['eligibility_criteria']; ?>
                </td>
                <td>
                  <?php echo $row['program_duration']; ?>
                </td>
                <td>
                  <?php echo $row['location']; ?>
                </td>
                <td>
                  <?php echo $row['application_link']; ?>
                </td>
                <td><button class="table-btn show-image-btn"
                    onclick="showImagePopup(<?php echo $row['program_id']; ?>)">Show Image</button></td>
                <!-- You might need to adjust the columns based on your data -->
                <td><button class="table-btn edit-btn" onclick="editGrant(<?php echo $row['program_id']; ?>)">Edit</button>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php else: ?>
        <p>No cultural exchange programs found.</p>
      <?php endif; ?>
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
  </script>
</body>

</html>