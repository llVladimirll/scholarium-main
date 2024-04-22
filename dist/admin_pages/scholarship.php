<?php
include('../controller/connection.php');

$sql = "select scholarship_id, scholarship_name, sponsoring_organization, country, type, description, degree_bachelor, degree_master, degree_phd, application_deadline, majors, required_documents, benefits, notes, likes, application_link FROM scholarships";

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
          <h2>Scholarships Data</h2>
        </div>
        <button class="addData"><a href="./Data/scholarship.html">Add Data </a></button>

      </div>

      <?php if ($result && $result->num_rows > 0): ?>
        <table>
          <tr>
            <th>Scholarship ID</th>
            <th>Scholarship Name</th>
            <th>Scolarship Organizer</th>
            <th>Country</th>
            <th>Type</th>
            <th>Description</th>
            <th>Bachelor</th>
            <th>Master</th>
            <th>PHD</th>
            <th>Application Deadline</th>
            <th>Majors</th>
            <th>Required Documents</th>
            <th>Benefits</th>
            <th>Notes</th>
            <th>Likes</th>
            <th>Application Link</th>
            <th>Image</th>
            <th>Button</th>
          </tr>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td>
                <?php echo $row["scholarship_id"] ?>
              </td>
              <td>
                <?php echo $row["scholarship_name"] ?>
              </td>
              <td>
                <?php echo $row["sponsoring_organization"] ?>
              </td>
              <td>
                <?php echo $row["country"] ?>
              </td>
              <td>
                <?php echo $row["type"] ?>
              </td>
              <td>
                <?php echo $row["description"] ?>
              </td>
              <td>
                <?php
                if ($row["degree_bachelor"] == 1) {
                  echo 'yes';
                } else {
                  echo 'no';
                } ?>

              <td>
                <?php
                if ($row["degree_master"] == 1) {
                  echo 'yes';
                } else {
                  echo 'no';
                } ?>
              </td>
              <td>
                <?php if ($row["degree_phd"] == 1) {
                  echo 'yes';
                } else {
                  echo 'no';
                } ?>
              <td>
                <?php echo $row["application_deadline"] ?>
              </td>
              <td>
                <?php echo $row["majors"] ?>
              </td>
              <td>
                <?php echo $row["required_documents"] ?>
              </td>
              <td>
                <?php echo $row["benefits"] ?>
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
                  onclick="showImagePopup(<?php echo $row['scholarship_id']; ?>)">Show Image</button></td>
              <td>
                <button class="table-btn edit-btn" id="editData"
                  onclick="editScholarship(<?php echo $row['scholarship_id']; ?>)">Edit</button>
              </td>
            </tr>
          <?php endwhile; ?>
        </table>
        <div class="editPopUp" id="editPopUp">
          <div class="close-btn" onclick="closeEditPopup()">&times;</div>
          <div class="form">
            <form action="../controller/scholarshipUpdate.php" method="post" enctype="multipart/form-data"
              id="updateForm">
              <h1>Update Data</h1>

              <input type="hidden" id="scholarship_id" name="scholarship_id" />
              <label for="scholarship_name">Scholarship Name:</label>
              <input type="text" id="scholarship_name" name="scholarship_name" required />

              <label for="sponsoring_organization">Sponsoring Organization:</label>
              <input type="text" id="sponsoring_organization" name="sponsoring_organization" required />

              <label for="country">Country:</label>
              <select id="country" name="country" required>
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
                <option value="Central African Republic">
                  Central African Republic
                </option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo (Congo-Brazzaville)">
                  Congo (Congo-Brazzaville)
                </option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czechia (Czech Republic)">
                  Czechia (Czech Republic)
                </option>
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
                <option value="Eswatini (fmr. Swaziland)">
                  Eswatini (fmr. Swaziland)
                </option>
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
                <option value="Myanmar (formerly Burma)">
                  Myanmar (formerly Burma)
                </option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="North Macedonia (formerly Macedonia)">
                  North Macedonia (formerly Macedonia)
                </option>
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
                <option value="Saint Vincent and the Grenadines">
                  Saint Vincent and the Grenadines
                </option>
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
                <option value="United States of America">
                  United States of America
                </option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City">Vatican City</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Yemen" selected>Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
              </select>

              <label for="type">Type:</label>
              <select id="type" name="type" required>
                <option value="fully_funded">Fully Funded</option>
                <option value="partly_funded">Partly Funded</option>
              </select>

              <label for="description">Description:</label>
              <textarea id="description" name="description" required></textarea>

              <label for="degree">Degree:</label>
              <div class="degree-options">
                <label>
                  <input type="checkbox" id="bachelor" name="bachelor" />
                  Bachelor
                </label>
                <label>
                  <input type="checkbox" id="master" name="master" />
                  Master
                </label>
                <label>
                  <input type="checkbox" id="phd" name="phd" />
                  PhD
                </label>
                <label>
                  <input type="checkbox" id="other" name="degree" value="other" />
                  Other
                </label>
              </div>

              <label for="application_deadline">Application Deadline:</label>
              <input type="date" id="application_deadline" name="application_deadline" required />

              <label for="majors">Majors:</label>
              <textarea id="majors" name="majors" required></textarea>

              <label for="required_documents">Required Documents:</label>
              <textarea id="required_documents" name="required_documents" required></textarea>

              <label for="benefits">Benefits:</label>
              <textarea id="benefits" name="benefits" required></textarea>

              <label for="note">Note:</label>
              <textarea id="notes" name="notes" required></textarea>

              <label for="application_link">Application Link:</label>
              <input type="url" id="application_link" name="application_link" required />

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
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;
        console.log(arrowParent);
        arrowParent.classList.toggle("showMenu");
      });
    }

    function showImagePopup(scholarshipId) {
      fetch('../controller/scholarshipGetImages.php?id=' + scholarshipId)
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

    function editScholarship(scholarshipId) {
      fetch(`../controller/scholarshipGetData.php?id=${scholarshipId}`)
        .then(response => response.json())
        .then(data => {
          document.getElementById('scholarship_id').value = scholarshipId;
          document.getElementById("scholarship_name").value = data.scholarship_name;
          document.getElementById("sponsoring_organization").value = data.sponsoring_organization;
          document.getElementById("country").value = data.country;
          document.getElementById("type").value = data.type;
          document.getElementById("description").value = data.description;
          document.getElementById("bachelor").checked = !!parseInt(data.degree_bachelor);
          document.getElementById("master").checked = !!parseInt(data.degree_master);
          document.getElementById("phd").checked = !!parseInt(data.degree_phd);
          document.getElementById("application_deadline").value = data.application_deadline
          document.getElementById("majors").value = data.majors
          document.getElementById("required_documents").value = data.required_documents
          document.getElementById("benefits").value = data.benefits
          document.getElementById("notes").value = data.notes
          document.getElementById("application_link").value = data.application_link



          document.getElementById("editPopUp").style.display = "block";
        })
        .catch(error => {
          console.error('Error fetching scholarship data:', error);
        });
    }

    function closeEditPopup() {
      document.getElementById("editPopUp").style.display = "none";
    }
  </script>
</body>

</html>