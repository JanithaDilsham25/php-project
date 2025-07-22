// Sample data to demonstrate adding users and courses
let users = [];
let courses = [];

// Fetch users from localStorage on page load
document.addEventListener("DOMContentLoaded", () => {
    users = JSON.parse(localStorage.getItem("users")) || [];
    courses = JSON.parse(localStorage.getItem("courses")) || [];
    renderUsers();
    renderCourses();
});

// Show Add User Form when Add User button is clicked
document.getElementById("add-user-btn").addEventListener("click", () => {
    document.getElementById("add-user-form-container").style.display = "flex";
});

// Close Add User Form when Cancel button is clicked
document.getElementById("cancel-user-form").addEventListener("click", () => {
    document.getElementById("add-user-form-container").style.display = "none";
});

// Add a new user
document.getElementById("add-user-form").addEventListener("submit", (e) => {
    e.preventDefault();
    const userName = document.getElementById("user-name").value;
    const userEmail = document.getElementById("user-email").value;
    const userId = users.length + 1;

    // Create user object and add to array
    const newUser = { id: userId, name: userName, email: userEmail };
    users.push(newUser);

    // Save to localStorage and render the users
    localStorage.setItem("users", JSON.stringify(users));
    renderUsers();

    // Clear the form fields
    document.getElementById("add-user-form").reset();
    document.getElementById("add-user-form-container").style.display = "none";
});

// Add a new course
document.getElementById("add-course-form").addEventListener("submit", (e) => {
    e.preventDefault();
    const courseName = document.getElementById("course-name").value;
    const courseDescription = document.getElementById("course-description").value;

    // Create course object and add to array
    const newCourse = { name: courseName, description: courseDescription };
    courses.push(newCourse);

    // Save to localStorage and render the courses
    localStorage.setItem("courses", JSON.stringify(courses));
    renderCourses();

    // Clear the form fields
    document.getElementById("add-course-form").reset();
});

// Render users in the table
function renderUsers() {
    const tableBody = document.querySelector("#users-table tbody");
    tableBody.innerHTML = ""; // Clear existing rows
    users.forEach(user => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${user.id}</td>
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td><button class="delete-btn" data-id="${user.id}">Delete</button></td>
        `;
        tableBody.appendChild(row);
    });

    // Add delete button functionality
    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", (e) => {
            const userId = e.target.dataset.id;
            users = users.filter(user => user.id != userId);
            localStorage.setItem("users", JSON.stringify(users));
            renderUsers();
        });
    });
}

// Render courses
function renderCourses() {
    const courseList = document.createElement("ul");
    courses.forEach(course => {
        const listItem = document.createElement("li");
        listItem.innerText = `${course.name}: ${course.description}`;
        courseList.appendChild(listItem);
    });
    document.querySelector(".courses-section").appendChild(courseList);
}
