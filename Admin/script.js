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
