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
  <title>User Density Map</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <style>
    #map { height: 400px; }
  </style>
</head>
<body>

<div id="map"></div>

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