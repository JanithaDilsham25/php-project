// Function to handle adding a new user
function addUser(event) {
    event.preventDefault(); // Prevent form submission (page reload)

    // Get user data from the form
    const userName = document.getElementById('user-name').value;
    const userEmail = document.getElementById('user-email').value;

    // Create a new row for the table
    const table = document.getElementById('users-table').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow(table.rows.length);

    // Add cells for user data
    const cell1 = newRow.insertCell(0);
    const cell2 = newRow.insertCell(1);
    const cell3 = newRow.insertCell(2);
    const cell4 = newRow.insertCell(3);

    // Populate the cells with user data
    cell1.textContent = table.rows.length; // User ID
    cell2.textContent = userName; // User Name
    cell3.textContent = userEmail; // User Email

    // Create action button (Delete)
    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Delete";
    deleteButton.classList.add("delete-btn");
    deleteButton.onclick = function () {
        table.deleteRow(newRow.rowIndex); // Delete the row from the table
    };
    cell4.appendChild(deleteButton);

    // Reset the form
    document.getElementById("add-user-form").reset();

    // Close the Add User form
    cancelAddUserForm();
}

// Function to handle adding a new course
function addCourse(event) {
    event.preventDefault(); // Prevent form submission (page reload)

    // Get course data from the form
    const courseName = document.getElementById('course-name').value;
    const courseDescription = document.getElementById('course-description').value;

    // Display the course data
    const courseList = document.getElementById("course-list");
    const newCourse = document.createElement("div");
    newCourse.classList.add("course-item");
    newCourse.innerHTML = `
        <h4>${courseName}</h4>
        <p>${courseDescription}</p>
    `;
    courseList.appendChild(newCourse);

    // Reset the form
    document.getElementById("add-course-form").reset();
}

// Toggle visibility between "Manage Users" and "Add User" form
function toggleAddUserForm() {
    // Hide Manage Users section
    document.getElementById("users-section").style.display = "none";
    
    // Show Add User Form section
    document.getElementById("add-user-form-container").style.display = "block";
}

function cancelAddUserForm() {
    // Show Manage Users section
    document.getElementById("users-section").style.display = "block";
    
    // Hide Add User Form section
    document.getElementById("add-user-form-container").style.display = "none";
}

// On page load, hide the Add User form and show Manage Users by default
window.onload = function() {
    document.getElementById("add-user-form-container").style.display = "none";
    document.getElementById("users-section").style.display = "block";
};

// Attach event listeners to form submit buttons
document.getElementById("add-user-form").addEventListener("submit", addUser);
document.getElementById("add-course-form").addEventListener("submit", addCourse);
