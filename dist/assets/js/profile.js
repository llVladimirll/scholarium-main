function updateUserInformation(fieldName, newValue) {
    // Assuming editUser.php is in the same directory as your HTML file
    const apiUrl = './controller/editUser.php'; // Path to your PHP script
    return fetch(apiUrl, {
        method: 'POST',
        body: JSON.stringify({ field: fieldName, value: newValue }),
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error('Failed to update user information');
        }
        return response.json();
    });
}