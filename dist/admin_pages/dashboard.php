<?php
// Your database connection and query code here
include('../controller/connection.php');

// SQL query to get user count for each country
$sql = "SELECT country, COUNT(*) AS user_count FROM users GROUP BY country";
$result = $conn->query($sql);

// Prepare arrays to store labels (countries) and data (user counts)
$labels = [];
$data = [];

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $labels[] = $row['country'];
    $data[] = $row['user_count'];
  }
}

$conn->close();

// Create an array combining labels and data for Chart.js
$chartData1 = [
  'labels' => $labels,
  'data' => $data,
];
?>

<?php
// Your database connection and query code here
include('../controller/connection.php');

// SQL query to get user count for each degree
$sql = "SELECT degree, COUNT(*) AS user_count FROM users GROUP BY degree";
$result = $conn->query($sql);

// Prepare arrays to store labels (degrees) and data (user counts)
$labels = [];
$data = [];

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $labels[] = $row['degree'];
    $data[] = $row['user_count'];
  }
}

$conn->close();

// Create an array combining labels and data for Chart.js
$chartData2 = [
  'labels' => $labels,
  'data' => $data,
];
?>

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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* New style for the container holding payment info */
    .payment-container {
      display: flex;
      justify-content: space-between;
      width: 100%;
      margin-bottom: 20px;
    }

    /* Style for the payment info divs */
    .payment-info {
      flex: 1;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      margin-right: 12px;
      /* Margin between the payment info divs */
    }

    .payment-info:last-child {
      margin-right: 0;
      /* Remove margin from the last payment info div */
    }

    .payment-info h3 {
      margin-top: 0;
      font-size: 24px;
    }

    .payment-info p {
      margin: 10px 0;
      font-size: 16px;
    }

    .payment-info:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Unique styles for each payment info div */
    .payment-info:nth-child(1) {
      background-color: #4CAF50;
      /* Green background */
      color: #fff;
      /* White text */
    }

    .payment-info:nth-child(2) {
      background-color: #3498db;
      /* Blue background */
      color: #fff;
      /* White text */
    }

    .payment-info:nth-child(3) {
      background-color: #e74c3c;
      /* Red background */
      color: #fff;
      /* White text */
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
    <div class="payment-container">
      <?php
      include('../controller/connection.php');

      function displayPaymentInfo($title, $amount)
      {
        global $conn;
        $paymentInfo = getPaymentInfo($amount);
        echo '
      <div class="payment-info">
        <h3>' . $title . '</h3>
        <p>Total Amount: $' . $paymentInfo['total_amount'] . '</p>
        <p>Total Users: ' . $paymentInfo['user_count'] . '</p>
      </div>';
      }

      function getPaymentInfo($amount)
      {
        global $conn;
        $sql = "SELECT COUNT(*) AS user_count, SUM(total_payment) AS total_amount FROM payments WHERE total_payment = $amount";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
          return $row;
        } else {
          return ['user_count' => 0, 'total_amount' => 0];
        }
      }

      // Display payment information
      displayPaymentInfo('Type of Payment $50', 50);
      displayPaymentInfo('Type of Payment $75', 75);
      displayPaymentInfo('Type of Payment $100', 100);

      $conn->close();
      ?>
    </div>
    <!-- <div class="chart-container" ><canvas id="paymentChart" style="position: relative; height: 400px; width: 100%;"></canvas></div> -->

    <div style="width: 400px; display:none;"><canvas id="userDegreeChart"
        style="position: relative; height: 400px; width: 400px;"></canvas></div>
    <div style="width: 406px; display:none;"><canvas id="userCountryChart"
        style="position: relative; height: 400px; width: 800px;"></canvas></div>

    <div class="my-charts" style="display:flex;">
      <div style="width: 400px;">
        <canvas id="userDegreePieChart" style="position: relative; height: 400px; width: 400px;"></canvas>
      </div>
      <div style="width: 800px;">
        <canvas id="userCountryBarChart" style="position: relative; height: 510px; width: 800px;"></canvas>
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

    // Get PHP data and convert it to JavaScript
    const chartData = <?php echo json_encode($chartData1); ?>;

    // Function to generate an array of distinct colors
    const generateRandomColors = (numColors) => {
      const colors = [];
      for (let i = 0; i < numColors; i++) {
        const color = `rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(
          Math.random() * 256
        )}, ${Math.floor(Math.random() * 256)}, 0.8)`;
        colors.push(color);
      }
      return colors;
    };

    // Generate 200 distinct colors
    const colorsFor200Countries = generateRandomColors(200);

    const ctx = document.getElementById('userCountryChart').getContext('2d');
    const userCountryPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: chartData.labels,
        datasets: [{
          data: chartData.data,
          backgroundColor: colorsFor200Countries,
          borderColor: colorsFor200Countries.map((color) => color.replace('0.8', '1')),
          borderWidth: 1,
        }],
      },
      options: {
        // Customize options if needed
      },
    });


    const chartData2 = <?php echo json_encode($chartData2); ?>;

    const ctx2 = document.getElementById('userDegreeChart').getContext('2d');
    const userDegreeBarChart = new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: chartData2.labels,
        datasets: [{
          label: 'Number of Users',
          data: chartData2.data,
          backgroundColor: 'rgba(54, 162, 235, 0.8)', // You can change the color here
          borderColor: 'rgba(54, 162, 235, 1)', // You can change the border color here
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    document.addEventListener('DOMContentLoaded', function () {
      // Fetch the necessary data for the chart from the server-side using PHP or an API
      // Store this data in appropriate variables (dates, user count for $50, $75, $100)

      // Dummy data for example (replace this with your fetched data)
      let dates = ['2023-01-01', '2023-02-01', '2023-03-01', '2023-04-01', '2023-05-01'];

      // Replace with your fetched user count data for $50, $75, $100
      let users50 = [50, 60, 70, 55, 80]; // Example data for $50
      let users75 = [30, 40, 45, 50, 35]; // Example data for $75
      let users100 = [20, 25, 30, 35, 40]; // Example data for $100

      let ctx = document.getElementById('paymentChart').getContext('2d');

      let paymentChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: dates,
          datasets: [
            {
              label: 'Total Users for $50',
              data: users50, // Use fetched user count data for $50
              borderColor: 'rgba(255, 99, 132, 1)', // Red color for $50 line
              borderWidth: 2,
              fill: false
            },
            {
              label: 'Total Users for $75',
              data: users75, // Use fetched user count data for $75
              borderColor: 'rgba(54, 162, 235, 1)', // Blue color for $75 line
              borderWidth: 2,
              fill: false
            },
            {
              label: 'Total Users for $100',
              data: users100, // Use fetched user count data for $100
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
            text: 'Total Users Over Time'
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
                labelString: 'Total Users'
              }
            }]
          }
        }
      });
    });



    const chartDataDegrees = <?php echo json_encode($chartData2); ?>;

    const ctxDegrees = document.getElementById('userDegreePieChart').getContext('2d');
    const userDegreePieChart = new Chart(ctxDegrees, {
      type: 'pie',
      data: {
        labels: chartDataDegrees.labels,
        datasets: [{
          data: chartDataDegrees.data,
          backgroundColor: generateRandomColors(chartDataDegrees.labels.length),
          borderColor: '#ffffff',
          borderWidth: 1,
        }],
      },
      options: {
        plugins: {
          title: {
            display: true,
            text: 'Degree Distribution', // Title text
            font: {
              size: 30 // Adjust the font size as needed
            }
          }
        }
      },
    });


    const chartDataCountries = <?php echo json_encode($chartData1); ?>;

    const ctxCountries = document.getElementById('userCountryBarChart').getContext('2d');
    const userCountryBarChart = new Chart(ctxCountries, {
      type: 'bar',
      data: {
        labels: chartDataCountries.labels,
        datasets: [{
          label: 'Number of Users',
          data: chartDataCountries.data,
          backgroundColor: 'rgba(255, 159, 64, 0.8)', // You can change the color here
          borderColor: 'rgba(255, 159, 64, 1)', // You can change the border color here
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

  </script>
</body>

</html>