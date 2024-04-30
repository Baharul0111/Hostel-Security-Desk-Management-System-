document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var userType = document.getElementById('userType').value;

    if (userType === 'student') {

        window.location.href = 'student_page.html';
    } else if (userType === 'guard') {

        window.location.href = 'dashboard.html';
    }
});