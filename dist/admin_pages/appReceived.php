<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../assets/css/test.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Web | Scholarium</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* Button styles */
    .whatsapp-btn,
    .email-btn {
      padding: 8px 16px;
      font-size: 14px;
      border: none;
      cursor: pointer;
      border-radius: 4px;
      margin-right: 8px;
    }

    /* WhatsApp button specific style */
    .whatsapp-btn {
      background-color: #25d366;
      color: white;
    }

    /* Email button specific style */
    .email-btn {
      background-color: #007bff;
      color: white;
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


    <?php
    include('../controller/connection.php');

    // Query to retrieve payment and user details
    $sql = "SELECT p.payment_id, p.user_id, p.total_payment, p.payment_date, u.first_name, u.last_name, u.country, u.email, u.phone_number FROM payments p INNER JOIN users u ON p.user_id = u.user_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0): ?>
      <!-- Table for displaying payment and user information -->
      <table>
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>User Country</th>
            <th>Total Payment</th>
            <th>Email</th>
            <th>Number</th>
            <th>Start Applying</th>
            <th>Send Email</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td>
                <?php echo $row['first_name']; ?>
              </td>
              <td>
                <?php echo $row['last_name']; ?>
              </td>
              <td>
                <?php echo $row['country']; ?>
              </td>
              <td>
                <?php echo $row['total_payment']; ?>
              </td>
              <td>
                <?php echo $row['email']; ?>
              </td>
              <td>
                <?php echo $row['phone_number']; ?>
              </td>
              <td><button class="whatsapp-btn"
                  onclick="sendWhatsApp('<?php echo $row['phone_number']; ?>', '<?php echo $row['first_name']; ?>')">Send
                  WhatsApp</button></td>
              <td><button class="email-btn"
                  onclick="sendEmail('<?php echo $row['email']; ?>', '<?php echo $row['first_name']; ?>')">Send
                  Email</button></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>No payment records found.</p>
    <?php endif;

    $conn->close();
    ?>

    <script>
      function sendWhatsApp(phoneNumber, firstName) {
        let message = `Hi ${firstName}, we checked your payments, it is valid. We will start to apply for you soon... Be ready`;

        // Construct the WhatsApp API link with encoded message
        let waLink = `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${encodeURIComponent(message)}`;

        // Open WhatsApp link in a new tab/window
        window.open(waLink, '_blank');
      }

      function sendEmail(email, firstName) {
        let subject = 'Regarding Your Application';
        let message = `Hi ${firstName}, we checked your payments, it is valid. We will start to apply for you soon. Be ready.`;

        // Construct the email link
        let mailtoLink = `mailto:${email}?subject=${subject}&body=${message}`;

        // Open email client with pre-filled message
        window.location.href = mailtoLink;
      }
    </script>



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