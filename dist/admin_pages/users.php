<?php
include('../controller/connection.php');

$sql2 = "SELECT user_id, first_name, last_name, email, phone_number, password_hash, degree, country FROM users";

$result2 = $conn->query($sql2);

$conn->close();
?>

<?php
include('../controller/connection.php');

$sql = "SELECT country, COUNT(user_id) AS user_count FROM users GROUP BY country";
$result = $conn->query($sql);

$userData = array();
while ($row = $result->fetch_assoc()) {
  $country = $row['country'];
  $users = intval($row['user_count']);
  $userData[] = array('country' => $country, 'users' => $users);
}

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
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <style>
    #map {
      height: 400px;
      margin-bottom: 5px;
      border-radius: 8px;
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
        <a href="./Chatting.php">
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
          <h2>Users Data</h2>
        </div>
        <div id="map"></div>
        <input type="text" id="searchByName" placeholder="Search by First Name">
        <input type="text" id="searchByEmail" placeholder="Search by Email">

        <select id="filterByCountry">
          <option value="">Filter by Country</option>
          <option value="Afghanistan">Afghanistan</option>
          <option value="Albania">Albania</option>
          <option value="Algeria">Algeria</option>
          <option value="Andorra">Andorra</option>
          <option value="Angola">Angola</option>
          <option value="Antigua and Barbuda">Antigua and Barbuda</option>
          <option value="Argentina">Argentina</option>
          <option value="Armenia">Armenia</option>
          <option value="Australia">Australia</option>
          <option value="Austria">Austria</option>
          <option value="Azerbaijan">Azerbaijan</option>
          <option value="Bahamas">Bahamas</option>
          <option value="Bahrain">Bahrain</option>
          <option value="Bangladesh">Bangladesh</option>
          <option value="Barbados">Barbados</option>
          <option value="Belarus">Belarus</option>
          <option value="Belgium">Belgium</option>
          <option value="Belize">Belize</option>
          <option value="Benin">Benin</option>
          <option value="Bhutan">Bhutan</option>
          <option value="Bolivia">Bolivia</option>
          <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
          <option value="Botswana">Botswana</option>
          <option value="Brazil">Brazil</option>
          <option value="Brunei">Brunei</option>
          <option value="Bulgaria">Bulgaria</option>
          <option value="Burkina Faso">Burkina Faso</option>
          <option value="Burundi">Burundi</option>
          <option value="Cabo Verde">Cabo Verde</option>
          <option value="Cambodia">Cambodia</option>
          <option value="Cameroon">Cameroon</option>
          <option value="Canada">Canada</option>
          <option value="Central African Republic">Central African Republic</option>
          <option value="Chad">Chad</option>
          <option value="Chile">Chile</option>
          <option value="China">China</option>
          <option value="Colombia">Colombia</option>
          <option value="Comoros">Comoros</option>
          <option value="Congo (Congo-Brazzaville)">Congo (Congo-Brazzaville)</option>
          <option value="Costa Rica">Costa Rica</option>
          <option value="Croatia">Croatia</option>
          <option value="Cuba">Cuba</option>
          <option value="Cyprus">Cyprus</option>
          <option value="Czechia (Czech Republic)">Czechia (Czech Republic)</option>
          <option value="Denmark">Denmark</option>
          <option value="Djibouti">Djibouti</option>
          <option value="Dominica">Dominica</option>
          <option value="Dominican Republic">Dominican Republic</option>
          <option value="Ecuador">Ecuador</option>
          <option value="Egypt">Egypt</option>
          <option value="El Salvador">El Salvador</option>
          <option value="Equatorial Guinea">Equatorial Guinea</option>
          <option value="Eritrea">Eritrea</option>
          <option value="Estonia">Estonia</option>
          <option value="Eswatini (fmr. Swaziland)">Eswatini (fmr. Swaziland)</option>
          <option value="Ethiopia">Ethiopia</option>
          <option value="Fiji">Fiji</option>
          <option value="Finland">Finland</option>
          <option value="France">France</option>
          <option value="Gabon">Gabon</option>
          <option value="Gambia">Gambia</option>
          <option value="Georgia">Georgia</option>
          <option value="Germany">Germany</option>
          <option value="Ghana">Ghana</option>
          <option value="Greece">Greece</option>
          <option value="Grenada">Grenada</option>
          <option value="Guatemala">Guatemala</option>
          <option value="Guinea">Guinea</option>
          <option value="Guinea-Bissau">Guinea-Bissau</option>
          <option value="Guyana">Guyana</option>
          <option value="Haiti">Haiti</option>
          <option value="Holy See">Holy See</option>
          <option value="Honduras">Honduras</option>
          <option value="Hungary">Hungary</option>
          <option value="Iceland">Iceland</option>
          <option value="India">India</option>
          <option value="Indonesia">Indonesia</option>
          <option value="Iran">Iran</option>
          <option value="Iraq">Iraq</option>
          <option value="Ireland">Ireland</option>
          <option value="Israel">Israel</option>
          <option value="Italy">Italy</option>
          <option value="Jamaica">Jamaica</option>
          <option value="Japan">Japan</option>
          <option value="Jordan">Jordan</option>
          <option value="Kazakhstan">Kazakhstan</option>
          <option value="Kenya">Kenya</option>
          <option value="Kiribati">Kiribati</option>
          <option value="Korea, North">Korea, North</option>
          <option value="Korea, South">Korea, South</option>
          <option value="Kosovo">Kosovo</option>
          <option value="Kuwait">Kuwait</option>
          <option value="Kyrgyzstan">Kyrgyzstan</option>
          <option value="Laos">Laos</option>
          <option value="Latvia">Latvia</option>
          <option value="Lebanon">Lebanon</option>
          <option value="Lesotho">Lesotho</option>
          <option value="Liberia">Liberia</option>
          <option value="Libya">Libya</option>
          <option value="Liechtenstein">Liechtenstein</option>
          <option value="Lithuania">Lithuania</option>
          <option value="Luxembourg">Luxembourg</option>
          <option value="Madagascar">Madagascar</option>
          <option value="Malawi">Malawi</option>
          <option value="Malaysia">Malaysia</option>
          <option value="Maldives">Maldives</option>
          <option value="Mali">Mali</option>
          <option value="Malta">Malta</option>
          <option value="Marshall Islands">Marshall Islands</option>
          <option value="Mauritania">Mauritania</option>
          <option value="Mauritius">Mauritius</option>
          <option value="Mexico">Mexico</option>
          <option value="Micronesia">Micronesia</option>
          <option value="Moldova">Moldova</option>
          <option value="Monaco">Monaco</option>
          <option value="Mongolia">Mongolia</option>
          <option value="Montenegro">Montenegro</option>
          <option value="Morocco">Morocco</option>
          <option value="Mozambique">Mozambique</option>
          <option value="Myanmar (formerly Burma)">Myanmar (formerly Burma)</option>
          <option value="Namibia">Namibia</option>
          <option value="Nauru">Nauru</option>
          <option value="Nepal">Nepal</option>
          <option value="Netherlands">Netherlands</option>
          <option value="New Zealand">New Zealand</option>
          <option value="Nicaragua">Nicaragua</option>
          <option value="Niger">Niger</option>
          <option value="Nigeria">Nigeria</option>
          <option value="North Macedonia (formerly Macedonia)">North Macedonia (formerly Macedonia)</option>
          <option value="Norway">Norway</option>
          <option value="Oman">Oman</option>
          <option value="Pakistan">Pakistan</option>
          <option value="Palau">Palau</option>
          <option value="Palestine State">Palestine State</option>
          <option value="Panama">Panama</option>
          <option value="Papua New Guinea">Papua New Guinea</option>
          <option value="Paraguay">Paraguay</option>
          <option value="Peru">Peru</option>
          <option value="Philippines">Philippines</option>
          <option value="Poland">Poland</option>
          <option value="Portugal">Portugal</option>
          <option value="Qatar">Qatar</option>
          <option value="Romania">Romania</option>
          <option value="Russia">Russia</option>
          <option value="Rwanda">Rwanda</option>
          <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
          <option value="Saint Lucia">Saint Lucia</option>
          <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
          <option value="Samoa">Samoa</option>
          <option value="San Marino">San Marino</option>
          <option value="Sao Tome and Principe">Sao Tome and Principe</option>
          <option value="Saudi Arabia">Saudi Arabia</option>
          <option value="Senegal">Senegal</option>
          <option value="Serbia">Serbia</option>
          <option value="Seychelles">Seychelles</option>
          <option value="Sierra Leone">Sierra Leone</option>
          <option value="Singapore">Singapore</option>
          <option value="Slovakia">Slovakia</option>
          <option value="Slovenia">Slovenia</option>
          <option value="Solomon Islands">Solomon Islands</option>
          <option value="Somalia">Somalia</option>
          <option value="South Africa">South Africa</option>
          <option value="South Sudan">South Sudan</option>
          <option value="Spain">Spain</option>
          <option value="Sri Lanka">Sri Lanka</option>
          <option value="Sudan">Sudan</option>
          <option value="Suriname">Suriname</option>
          <option value="Sweden">Sweden</option>
          <option value="Switzerland">Switzerland</option>
          <option value="Syria">Syria</option>
          <option value="Taiwan">Taiwan</option>
          <option value="Tajikistan">Tajikistan</option>
          <option value="Tanzania">Tanzania</option>
          <option value="Thailand">Thailand</option>
          <option value="Timor-Leste">Timor-Leste</option>
          <option value="Togo">Togo</option>
          <option value="Tonga">Tonga</option>
          <option value="Trinidad and Tobago">Trinidad and Tobago</option>
          <option value="Tunisia">Tunisia</option>
          <option value="Turkey">Turkey</option>
          <option value="Turkmenistan">Turkmenistan</option>
          <option value="Tuvalu">Tuvalu</option>
          <option value="Uganda">Uganda</option>
          <option value="Ukraine">Ukraine</option>
          <option value="United Arab Emirates">United Arab Emirates</option>
          <option value="United Kingdom">United Kingdom</option>
          <option value="United States of America">United States of America</option>
          <option value="Uruguay">Uruguay</option>
          <option value="Uzbekistan">Uzbekistan</option>
          <option value="Vanuatu">Vanuatu</option>
          <option value="Vatican City">Vatican City</option>
          <option value="Venezuela">Venezuela</option>
          <option value="Vietnam">Vietnam</option>
          <option value="Yemen">Yemen</option>
          <option value="Zambia">Zambia</option>
          <option value="Zimbabwe">Zimbabwe</option>
        </select>

        <select id="filterByDegree">
          <option value="">Filter by Degree</option>
          <option value="Bachelor">Bachelor</option>
          <option value="Master">Master</option>
          <option value="PhD">PhD</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <?php if ($result && $result->num_rows > 0): ?>
        <!-- Table for displaying user information -->
        <table id="userData">
          <thead>
            <tr>
              <th>User ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Degree</th>
              <th>Country</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result2->fetch_assoc()): ?>
              <tr>
                <td>
                  <?php echo $row['user_id']; ?>
                </td>
                <td>
                  <?php echo $row['first_name']; ?>
                </td>
                <td>
                  <?php echo $row['last_name']; ?>
                </td>
                <td>
                  <?php echo $row['email']; ?>
                </td>
                <td>
                  <?php echo $row['phone_number']; ?>
                </td>
                <td>
                  <?php echo $row['degree']; ?>
                </td>
                <td>
                  <?php echo $row['country']; ?>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php else: ?>
        <p>No users found.</p>
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

    //     document.addEventListener('DOMContentLoaded', function() {
    //   let searchInput = document.getElementById('searchInput');
    //   let userData = document.getElementById('userData');

    //   searchInput.addEventListener('input', function() {
    //     let filter = searchInput.value.toUpperCase();
    //     let rows = userData.getElementsByTagName('tr');

    //     for (let i = 1; i < rows.length; i++) {
    //       let firstNameCol = rows[i].getElementsByTagName('td')[1]; // Change index based on the column order
    //       if (firstNameCol) {
    //         let textValue = firstNameCol.textContent || firstNameCol.innerText;
    //         if (textValue.toUpperCase().indexOf(filter) > -1) {
    //           rows[i].style.display = '';
    //         } else {
    //           rows[i].style.display = 'none';
    //         }
    //       }
    //     }
    //   });
    // });


    document.addEventListener('DOMContentLoaded', function () {
      let searchByName = document.getElementById('searchByName');
      let searchByEmail = document.getElementById('searchByEmail');
      let filterByCountry = document.getElementById('filterByCountry');
      let filterByDegree = document.getElementById('filterByDegree');
      let userData = document.getElementById('userData');

      searchByName.addEventListener('input', filterTable);
      searchByEmail.addEventListener('input', filterTable);
      filterByCountry.addEventListener('change', filterTable);
      filterByDegree.addEventListener('change', filterTable);

      function filterTable() {
        let filterByName = searchByName.value.toUpperCase();
        let filterByEmail = searchByEmail.value.toUpperCase();
        let selectedCountry = filterByCountry.value.toUpperCase();
        let selectedDegree = filterByDegree.value.toUpperCase();
        let rows = userData.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) {
          let firstNameCol = rows[i].getElementsByTagName('td')[1]; // Change index based on the column order
          let emailCol = rows[i].getElementsByTagName('td')[3]; // Change index based on the column order
          let countryCol = rows[i].getElementsByTagName('td')[6]; // Change index based on the column order
          let degreeCol = rows[i].getElementsByTagName('td')[5]; // Change index based on the column order

          if (firstNameCol && emailCol && countryCol && degreeCol) {
            let firstNameText = firstNameCol.textContent || firstNameCol.innerText;
            let emailText = emailCol.textContent || emailCol.innerText;
            let countryText = countryCol.textContent || countryCol.innerText;
            let degreeText = degreeCol.textContent || degreeCol.innerText;

            let displayFirstName = firstNameText.toUpperCase().indexOf(filterByName) > -1;
            let displayEmail = emailText.toUpperCase().indexOf(filterByEmail) > -1;
            let displayCountry = (selectedCountry === '' || countryText.toUpperCase().indexOf(selectedCountry) > -1);
            let displayDegree = (selectedDegree === '' || degreeText.toUpperCase().indexOf(selectedDegree) > -1);

            if (displayFirstName && displayEmail && displayCountry && displayDegree) {
              rows[i].style.display = '';
            } else {
              rows[i].style.display = 'none';
            }
          }
        }
      }
    });
  </script>

  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://leaflet.github.io/Leaflet.heat/dist/leaflet-heat.js"></script>
  <script>
    // Country coordinates
    const countryCoordinates = {
      "Afghanistan": [33.93911, 67.709953],
      "Albania": [41.153332, 20.168331],
      "Algeria": [28.033886, 1.659626],
      "Andorra": [42.546245, 1.601554],
      "Angola": [-11.202692, 17.873887],
      "Antigua and Barbuda": [17.060816, -61.796428],
      "Argentina": [-38.416097, -63.616672],
      "Armenia": [40.069099, 45.038189],
      "Australia": [-25.274398, 133.775136],
      "Austria": [47.516231, 14.550072],
      "Azerbaijan": [40.143105, 47.576927],
      "Bahamas": [25.03428, -77.39628],
      "Bahrain": [25.930414, 50.637772],
      "Bangladesh": [23.684994, 90.356331],
      "Barbados": [13.193887, -59.543198],
      "Belarus": [53.709807, 27.953389],
      "Belgium": [50.503887, 4.469936],
      "Belize": [17.189877, -88.49765],
      "Benin": [9.30769, 2.315834],
      "Bhutan": [27.514162, 90.433601],
      "Bolivia": [-16.290154, -63.588653],
      "Bosnia and Herzegovina": [43.915886, 17.679076],
      "Botswana": [-22.328474, 24.684866],
      "Brazil": [-14.235004, -51.92528],
      "Brunei": [4.535277, 114.727669],
      "Bulgaria": [42.733883, 25.48583],
      "Burkina Faso": [12.238333, -1.561593],
      "Burundi": [-3.373056, 29.918886],
      "Cabo Verde": [16.5388, -23.0418],
      "Cambodia": [12.565679, 104.990963],
      "Cameroon": [7.369722, 12.354722],
      "Canada": [56.130366, -106.346771],
      "Central African Republic": [6.611111, 20.939444],
      "Chad": [15.454166, 18.732207],
      "Chile": [-35.675147, -71.542969],
      "China": [35.86166, 104.195397],
      "Colombia": [4.570868, -74.297333],
      "Comoros": [-11.875001, 43.872219],
      "Congo (Congo-Brazzaville)": [-0.228021, 15.827659],
      "Costa Rica": [9.748917, -83.753428],
      "Croatia": [45.1, 15.2],
      "Cuba": [21.521757, -77.781167],
      "Cyprus": [35.126413, 33.429859],
      "Czechia (Czech Republic)": [49.817492, 15.472962],
      "Denmark": [56.26392, 9.501785],
      "Djibouti": [11.825138, 42.590275],
      "Dominica": [15.414999, -61.370976],
      "Dominican Republic": [18.735693, -70.162651],
      "Ecuador": [-1.831239, -78.183406],
      "Egypt": [26.820553, 30.802498],
      "El Salvador": [13.794185, -88.89653],
      "Equatorial Guinea": [1.650801, 10.267895],
      "Eritrea": [15.179384, 39.782334],
      "Estonia": [58.595272, 25.013607],
      "Eswatini (fmr. Swaziland)": [-26.522503, 31.465866],
      "Ethiopia": [9.145, 40.489673],
      "Fiji": [-17.713371, 178.065032],
      "Finland": [61.92411, 25.748151],
      "France": [46.603354, 1.888334],
      "Gabon": [-0.803689, 11.609444],
      "Gambia": [13.443182, -15.310139],
      "Georgia": [42.315407, 43.356892],
      "Germany": [51.165691, 10.451526],
      "Ghana": [7.946527, -1.023194],
      "Greece": [39.074208, 21.824312],
      "Grenada": [12.262776, -61.604171],
      "Guatemala": [15.783471, -90.230759],
      "Guinea": [9.945587, -9.696645],
      "Guinea-Bissau": [11.803749, -15.180413],
      "Guyana": [4.860416, -58.93018],
      "Haiti": [18.971187, -72.285215],
      "Holy See": [41.902916, 12.453389],
      "Honduras": [15.199999, -86.241905],
      "Hungary": [47.162494, 19.503304],
      "Iceland": [64.963051, -19.020835],
      "India": [20.593684, 78.96288],
      "Indonesia": [-0.789275, 113.921327],
      "Iran": [32.427908, 53.688046],
      "Iraq": [33.223191, 43.679291],
      "Ireland": [53.41291, -8.24389],
      "Israel": [31.046051, 34.851612],
      "Italy": [41.87194, 12.56738],
      "Jamaica": [18.109581, -77.297508],
      "Japan": [36.204824, 138.252924],
      "Jordan": [30.585164, 36.238414],
      "Kazakhstan": [48.019573, 66.923684],
      "Kenya": [-0.023559, 37.906193],
      "Kiribati": [-3.370417, -168.734039],
      "Korea, North": [40.339852, 127.510093],
      "Korea, South": [35.907757, 127.766922],
      "Kosovo": [42.602636, 20.902977],
      "Kuwait": [29.31166, 47.481766],
      "Kyrgyzstan": [41.20438, 74.766098],
      "Laos": [19.85627, 102.495496],
      "Latvia": [56.879635, 24.603189],
      "Lebanon": [33.854721, 35.862285],
      "Lesotho": [-29.609988, 28.233608],
      "Liberia": [6.428055, -9.429499],
      "Libya": [26.3351, 17.228331],
      "Liechtenstein": [47.166, 9.555373],
      "Lithuania": [55.169438, 23.881275],
      "Luxembourg": [49.815273, 6.129583],
      "Madagascar": [-18.766947, 46.869107],
      "Malawi": [-13.254308, 34.301525],
      "Malaysia": [4.210484, 101.975766],
      "Maldives": [3.202778, 73.22068],
      "Mali": [17.570692, -3.996166],
      "Malta": [35.937496, 14.375416],
      "Marshall Islands": [7.131474, 171.184478],
      "Mauritania": [21.00789, -10.940835],
      "Mauritius": [-20.348404, 57.552152],
      "Mexico": [23.634501, -102.552784],
      "Micronesia": [7.425554, 150.550812],
      "Moldova": [47.411631, 28.369885],
      "Monaco": [43.750298, 7.412841],
      "Mongolia": [46.862496, 103.846656],
      "Montenegro": [42.708678, 19.37439],
      "Morocco": [31.791702, -7.09262],
      "Mozambique": [-18.665695, 35.529562],
      "Myanmar (formerly Burma)": [21.916221, 95.955974],
      "Namibia": [-22.95764, 18.49041],
      "Nauru": [-0.522778, 166.931503],
      "Nepal": [28.394857, 84.124008],
      "Netherlands": [52.132633, 5.291266],
      "New Zealand": [-40.900557, 174.885971],
      "Nicaragua": [12.865416, -85.207229],
      "Niger": [17.607789, 8.081666],
      "Nigeria": [9.081999, 8.675277],
      "North Macedonia (formerly Macedonia)": [41.608635, 21.745275],
      "Norway": [60.472024, 8.468946],
      "Oman": [21.512583, 55.923255],
      "Pakistan": [30.375321, 69.345116],
      "Palau": [7.51498, 134.58252],
      "Palestine State": [31.952162, 35.233154],
      "Panama": [8.537981, -80.782127],
      "Papua New Guinea": [-6.314993, 143.95555],
      "Paraguay": [-23.442503, -58.443832],
      "Peru": [-9.189967, -75.015152],
      "Philippines": [12.879721, 121.774017],
      "Poland": [51.919438, 19.145136],
      "Portugal": [39.399872, -8.224454],
      "Qatar": [25.354826, 51.183884],
      "Romania": [45.943161, 24.96676],
      "Russia": [61.52401, 105.318756],
      "Rwanda": [-1.940278, 29.873888],
      "Saint Kitts and Nevis": [17.357822, -62.782998],
      "Saint Lucia": [13.909444, -60.978893],
      "Saint Vincent and the Grenadines": [12.984305, -61.287228],
      "Samoa": [-13.759029, -172.104629],
      "San Marino": [43.94236, 12.457777],
      "Sao Tome and Principe": [0.18636, 6.613081],
      "Saudi Arabia": [23.885942, 45.079162],
      "Senegal": [14.497401, -14.452362],
      "Serbia": [44.016521, 21.005859],
      "Seychelles": [-4.679574, 55.491977],
      "Sierra Leone": [8.460555, -11.779889],
      "Singapore": [1.352083, 103.819836],
      "Slovakia": [48.669026, 19.699024],
      "Slovenia": [46.151241, 14.995463],
      "Solomon Islands": [-9.64571, 160.156194],
      "Somalia": [5.152149, 46.199616],
      "South Africa": [-30.559482, 22.937506],
      "South Sudan": [6.876991, 31.306978],
      "Spain": [40.463667, -3.74922],
      "Sri Lanka": [7.873054, 80.771797],
      "Sudan": [12.862807, 30.217636],
      "Suriname": [3.919305, -56.027783],
      "Sweden": [60.128161, 18.643501],
      "Switzerland": [46.818188, 8.227512],
      "Syria": [34.802075, 38.996815],
      "Taiwan": [23.69781, 120.960515],
      "Tajikistan": [38.861034, 71.276093],
      "Tanzania": [-6.369028, 34.888822],
      "Thailand": [15.870032, 100.992541],
      "Timor-Leste": [-8.874217, 125.727539],
      "Togo": [8.619543, 0.824782],
      "Tonga": [-21.178986, -175.198242],
      "Trinidad and Tobago": [10.691803, -61.222503],
      "Tunisia": [33.886917, 9.537499],
      "Turkey": [38.963745, 35.243322],
      "Turkmenistan": [38.969719, 59.556278],
      "Tuvalu": [-7.109535, 177.64933],
      "Uganda": [1.373333, 32.290275],
      "Ukraine": [48.379433, 31.16558],
      "United Arab Emirates": [23.424076, 53.847818],
      "United Kingdom": [55.378051, -3.435973],
      "United States of America": [37.09024, -95.712891],
      "Uruguay": [-32.522779, -55.765835],
      "Uzbekistan": [41.377491, 64.585262],
      "Vanuatu": [-15.376706, 166.959158],
      "Vatican City": [41.902916, 12.453389],
      "Venezuela": [6.42375, -66.58973],
      "Vietnam": [14.058324, 108.277199],
      "Yemen": [15.552727, 48.516388],
      "Zambia": [-13.133897, 27.849332],
      "Zimbabwe": [-19.015438, 29.154857]
    };

    // Prepare data for heatmap (using the user data and their countries)
    const userData = <?php echo json_encode($userData); ?>;
    const heatData = userData.map(user => {
      const country = user.country;
      if (countryCoordinates.hasOwnProperty(country) && user.users > 0) {
        return {
          lat: countryCoordinates[country][0],
          lng: countryCoordinates[country][1],
          count: user.users
        };
      }
      return null; // Or handle missing coordinates or no users as needed
    }).filter(data => data !== null); // Filter out null values

    // Create the map
    const map = L.map('map').setView([20, 0], 2); // Default view

    // Add the base map layer (OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add heatmap layer if there are users
    if (heatData.length > 0) {
      const heat = L.heatLayer(heatData, { radius: 25 }).addTo(map);
    }

    // Add markers for each country location with users
    userData.forEach(user => {
      const country = user.country;
      const userCount = user.users;
      if (countryCoordinates.hasOwnProperty(country) && userCount > 0) {
        const marker = L.marker(countryCoordinates[country]).addTo(map);
        marker.bindPopup(`<b>${country}</b><br>Users: ${userCount}`).openPopup();
      }
    });

  </script>
</body>

</html>