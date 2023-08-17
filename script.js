document.getElementById("customerServiceForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Get form values
    var buildingName = document.getElementById("buildingName").value;
    var phoneNumber = document.getElementById("phoneNumber").value;
    var email = document.getElementById("email").value;
    var reason = document.getElementById("reason").value;
    var solved = document.getElementById("solved").checked;
    var notSolved = document.getElementById("notSolved").checked;

    // Create an object to represent the form submission
    var submission = {
        buildingName: buildingName,
        phoneNumber: phoneNumber,
        email: email,
        reason: reason,
        solved: solved,
        notSolved: notSolved
    };

    // Send the form data to the server for storage
    saveFormData(submission);

    // Clear form fields
    document.getElementById("buildingName").value = "";
    document.getElementById("phoneNumber").value = "";
    document.getElementById("email").value = "";
    document.getElementById("reason").value = "";
    document.getElementById("solved").checked = false;
    document.getElementById("notSolved").checked = false;
});

document.getElementById("generateReportButton").addEventListener("click", function() {
    // Fetch the data from the server and generate the report
    fetchFormData();
});

function saveFormData(submission) {
    // Send an AJAX request to the server to save the form data
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "saveFormData.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.error("Failed to save form data.");
            }
        }
    };
    xhr.send(JSON.stringify(submission));
}

function fetchFormData() {
    // Send an AJAX request to the server to fetch the form data
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetchFormData.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var formData = JSON.parse(xhr.responseText);
                generateReport(formData);
            } else {
                console.error("Failed to fetch form data.");
            }
        }
    };
    xhr.send();
}

function generateReport(formData) {
    // Generate the report as an HTML table
    var reportHTML = "<h2>Customer Service Report</h2>";
    reportHTML += "<table>";
    reportHTML += "<tr><th>Building Name</th><th>Phone Number</th><th>Email</th><th>Reason for Call Back</th><th>Status</th></tr>";

    // Iterate over the form data and create table rows
    for (var i = 0; i < formData.length; i++) {
        var submission = formData[i];

        reportHTML += "<tr>";
        reportHTML += "<td>" + submission.buildingName + "</td>";
        reportHTML += "<td>" + submission.phoneNumber + "</td>";
        reportHTML += "<td>" + submission.email + "</td>";
        reportHTML += "<td>" + submission.reason + "</td>";
        reportHTML += "<td>" + (submission.solved ? "Solved" : "Not Solved") + "</td>";
        reportHTML += "</tr>";
    }

    reportHTML += "</table>";

    // Display the report
    var reportContainer = document.getElementById("reportContainer");
    if (formData.length > 0) {
        reportContainer.innerHTML = reportHTML;
    } else {
        reportContainer.innerHTML = "<p>No data available.</p>";
    }
}
