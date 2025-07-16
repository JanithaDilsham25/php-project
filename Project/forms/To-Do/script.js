document.getElementById("task-form").addEventListener("submit", function(e) {
    e.preventDefault();
    let taskInput = document.getElementById("task-input");
    let task = taskInput.value.trim();

    if (task !== "") {
        fetch("add_task.php", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: "task=" + encodeURIComponent(task)
        })
        .then(response => response.text())
        .then(id => {
            let li = document.createElement("li");
            li.setAttribute("data-id", id);
            li.innerHTML = task + ' <button class="delete-btn">X</button>';
            document.getElementById("task-list").prepend(li);
            taskInput.value = "";
        });
    }
});

document.getElementById("task-list").addEventListener("click", function(e) {
    if (e.target.classList.contains("delete-btn")) {
        let li = e.target.parentElement;
        let id = li.getAttribute("data-id");

        fetch("delete_task.php", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: "id=" + id
        }).then(() => li.remove());
    }
});
