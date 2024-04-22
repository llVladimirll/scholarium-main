<?php
// Your database connection code
include('../controller/connection.php');

$sql = "SELECT payment_id, user_id, total_payment, payment_date FROM payments";
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
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

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
    <div class="header">
      <h2>Payments Data</h2>
      <!-- Search and filter inputs -->
      <!-- ... -->
    </div>

    <div class="filter">
      <p>Filter by Total: </p>
      <label>
        <input type="checkbox" value="50" onclick="filterByTotal()">
        Total $50
      </label>
      <label>
        <input type="checkbox" value="75" onclick="filterByTotal()">
        Total $75
      </label>
      <label>
        <input type="checkbox" value="100" onclick="filterByTotal()">
        Total $100
      </label>
    </div>

    <div id="totalPaymentsSum"></div>

    <!-- Hidden modal or section for displaying user details -->
    <div id="userDetailsModal" class="modal" style="display: none;">
      <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="userDetailsContent"></div>
      </div>
    </div>


    <?php if ($result && $result->num_rows > 0): ?>
      <!-- Table for displaying payment information -->
      <table>
        <thead>
          <tr>
            <th>Payment ID</th>
            <th>User ID</th>
            <th>Total Payment</th>
            <th>Payment Date</th>
            <th>Show Details</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td>
                <?php echo $row['payment_id']; ?>
              </td>
              <td>
                <?php echo $row['user_id']; ?>
              </td>
              <td>
                <?php echo $row['total_payment']; ?>
              </td>
              <td>
                <?php echo $row['payment_date']; ?>
              </td>
              <td><button onclick="showUserDetails(<?php echo $row['user_id']; ?>)">View User Details</button></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>No payment records found.</p>
    <?php endif; ?>






    <!-- <div class="chart-container" style="position: relative; height: 400px; width: 800px;">
    <canvas id="paymentChart"></canvas>
  </div> -->
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

    // Function to show user details in a modal
    function showUserDetails(userId) {
      // AJAX call to fetch user details using user ID
      fetch('../controller/getUserDetails.php?userId=' + userId)
        .then(response => response.text())
        .then(data => {
          // Display user details in the modal
          document.getElementById('userDetailsContent').innerHTML = data;
          document.getElementById('userDetailsModal').style.display = 'block';
        })
        .catch(error => {
          console.error('Error fetching user details:', error);
        });
    }

    // Function to close the modal
    function closeModal() {
      document.getElementById('userDetailsModal').style.display = 'none';
    }

    function filterByTotal() {
      let tableRows = document.querySelectorAll('tbody tr');
      let checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
      let selectedAmounts = Array.from(checkboxes).map(checkbox => parseFloat(checkbox.value));

      tableRows.forEach(row => {
        let totalPayment = parseFloat(row.getElementsByTagName('td')[2].innerText); // Assuming total payment is in the third column (index 2)
        if (selectedAmounts.length === 0 || selectedAmounts.includes(totalPayment)) {
          row.style.display = 'table-row';
        } else {
          row.style.display = 'none';
        }
      });
    }

    // Function to calculate and display total payment
    function calculateTotalPayment() {
      let tableRows = document.querySelectorAll('tbody tr');
      let totalPayment = 0;

      tableRows.forEach(row => {
        let payment = parseFloat(row.getElementsByTagName('td')[2].innerText); // Assuming total payment is in the third column (index 2)
        totalPayment += payment;
      });

      // Display the total payment amount in the designated div
      document.getElementById('totalPaymentsSum').innerText = "Total Payments: $" + totalPayment.toFixed(2);
    }

    // Call the function after the table is loaded
    document.addEventListener('DOMContentLoaded', function () {
      calculateTotalPayment();
    });



































    // Your existing PHP code for fetching payment records remains the same as before
    // ...

    // JavaScript for creating the line chart
    document.addEventListener('DOMContentLoaded', function () {
      // Fetch the necessary data for the chart from the server-side using PHP or an API
      // Store this data in appropriate variables (dates, payments for $50, $75, $100)

      // Dummy data for example (replace this with your fetched data)
      let dates = ['2023-01-01', '2023-02-01', '2023-03-01', '2023-04-01', '2023-05-01'];
      let payments50 = [100, 150, 120, 200, 180]; // Replace with your fetched payments for $50
      let payments75 = [80, 90, 110, 130, 100]; // Replace with your fetched payments for $75
      let payments100 = [120, 170, 150, 190, 160]; // Replace with your fetched payments for $100

      let ctx = document.getElementById('paymentChart').getContext('2d');

      let paymentChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: dates,
          datasets: [
            {
              label: 'Total Payment $50',
              data: payments50,
              borderColor: 'rgba(255, 99, 132, 1)', // Red color for $50 line
              borderWidth: 2,
              fill: false
            },
            {
              label: 'Total Payment $75',
              data: payments75,
              borderColor: 'rgba(54, 162, 235, 1)', // Blue color for $75 line
              borderWidth: 2,
              fill: false
            },
            {
              label: 'Total Payment $100',
              data: payments100,
              borderColor: 'rgba(75, 192, 192, 1)', // Green color for $100 line
              borderWidth: 2,
              fill: false
            }
          ]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Total Payments Over Time'
          },
          scales: {
            xAxes: [{
              scaleLabel: {
                display: true,
                labelString: 'Date'
              }
            }],
            yAxes: [{
              scaleLabel: {
                display: true,
                labelString: 'Total Payment Amount'
              }
            }]
          }
        }
      });
    });

  </script>
</body>

</html>