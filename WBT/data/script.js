var database = [
    { username: "taj", password: "1234" }
];

function signIn(event) {
    event.preventDefault();

    var user = document.getElementById("username").value.trim();
    var pass = document.getElementById("password").value.trim();
    var appointment = document.getElementById("appointment").value;

    var skillElements = document.querySelectorAll("input[name='skills']:checked");
    var skills = Array.from(skillElements).map(el => el.value);

    var jobType = document.querySelector("input[name='jobType']:checked");

    var userFound = database.find(dbUser => dbUser.username === user && dbUser.password === pass);

    if (userFound) {
        if (appointment === "" || !jobType || skills.length === 0) {
            console.log(" Please fill all required fields!");
        } else {
            console.log("Login Successful!");
            console.log("Username:", user);
            console.log("Appointment Time:", appointment);
            console.log("Skills:", skills.join(", "));
            console.log("Job Type:", jobType.value);
        }
    } else {
        console.log("Incorrect username or password");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("contactForm").addEventListener("submit", signIn);
});
