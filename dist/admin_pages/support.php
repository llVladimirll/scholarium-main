<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Support Page</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Basic styles for the page layout */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        nav ul {
            list-style: none;
            background-color: #444;
            text-align: center;
            padding: 10px 0;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
        }

        main {
            margin: 20px;
        }

        .messages table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .messages th, .messages td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .messages th {
            background-color: #f2f2f2;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <h1>Admin Support Page</h1>
    </header>

    <main>
        <div class="messages">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>johndoe@example.com</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                        <td>December 1, 2023 10:30 AM</td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>janesmith@example.com</td>
                        <td>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
                        <td>December 2, 2023 11:45 AM</td>
                    </tr>
                    <!-- Add more rows for additional messages -->
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Admin Support</p>
    </footer>

    <script src="scripts.js"></script>
</body>

</html>
