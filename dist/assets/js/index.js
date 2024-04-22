

//work layout
const homeSection = document.querySelector('.home-section');





//Date Pages
const sidebarLinks = document.querySelectorAll('.sidebar-link');
function loadContent(url) {
    fetch(url)
        .then(response => response.text())
        .then(data => {
            homeSection.innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching content:', error);
        });
}
sidebarLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault(); 
        const url = e.target.getAttribute('href');
        loadContent(url);
    });
});




//Dashboard Page
const dashboardLink = document.getElementById('dashboard-link');
function loadDashboardContent() {
    const dashboardURL = '/HTML/Dashboard/dashboard.html';
    fetch(dashboardURL)
        .then(response => response.text())
        .then(data => {
            homeSection.innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching dashboard content:', error);
        });
}
dashboardLink.addEventListener('click', (e) => {
    e.preventDefault();
    loadDashboardContent();
});







//Users Page
const usersLink = document.getElementById('users-link');
function loadUsersContent() {
    const usersURL = '/HTML/Users/users.html';
    fetch(usersURL)
        .then(response => response.text())
        .then(data => {
            homeSection.innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching users content:', error);
        });
}
usersLink.addEventListener('click', (e) => {
    e.preventDefault(); 
    loadUsersContent(); 
});






const receivedLink = document.getElementById('received-link');
const inProgressLink = document.getElementById('inProgress-link');
const finishedLink = document.getElementById('finished-link');
function loadContent(url) {
    fetch(url)
        .then(response => response.text())
        .then(data => {
            homeSection.innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching content:', error);
        });
}
receivedLink.addEventListener('click', (e) => {
    e.preventDefault();
    const url = '/HTML/Applications/received.html';
    loadContent(url);
});

inProgressLink.addEventListener('click', (e) => {
    e.preventDefault();
    const url = '/HTML/Applications/inProgress.html';
    loadContent(url);
});

finishedLink.addEventListener('click', (e) => {
    e.preventDefault();
    const url = '/HTML/Applications/finished.html';
    loadContent(url);
});







//chatting page
const chatLink = document.getElementById('chat-link');
function loadChattingContent() {
    const chattingURL = '/HTML/Chatting/chatting.html';
    fetch(chattingURL)
        .then(response => response.text())
        .then(data => {
            homeSection.innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching chatting content:', error);
        });
}
chatLink.addEventListener('click', (e) => {
    e.preventDefault();
    loadChattingContent();
});




// Payment page
const paymentLink = document.getElementById('payment-link');
function loadPaymentContent() {
    const paymentURL = '/HTML/Payment/payment.html';
    fetch(paymentURL)
        .then(response => response.text())
        .then(data => {
            homeSection.innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching payment content:', error);
        });
}
paymentLink.addEventListener('click', (e) => {
    e.preventDefault();
    loadPaymentContent();
});





//Notification Page
const notificationLink = document.getElementById('noti-link');
function loadNotificationContent() {
    const notificationURL = '/HTML/Notification/notification.html';
    fetch(notificationURL)
        .then(response => response.text())
        .then(data => {
            homeSection.innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching notification content:', error);
        });
}
notificationLink.addEventListener('click', (e) => {
    e.preventDefault();
    loadNotificationContent();
});







// Support page
const supportLink = document.getElementById('support-link');
function loadSupportContent() {
    const supportURL = '/HTML/Support/support.html';
    fetch(supportURL)
        .then(response => response.text())
        .then(data => {
            homeSection.innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching support content:', error);
        });
}
supportLink.addEventListener('click', (e) => {
    e.preventDefault();
    loadSupportContent();
});
