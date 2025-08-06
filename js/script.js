function checkReason() {
    var reason = prompt("DO you contact me? (yes/no)");
    if (!reason) {
        alert("You did not enter any reason.");
        return;
    }

    reason = reason.toLowerCase();

    if (reason === "yes") {
        alert("Congratulations, this reason is valid.");

        var purpose = prompt("Is it for a 'project' or a 'job'?");
        if (!purpose) {
            alert("You did not select project or job.");
            return;
        }

        purpose = purpose.toLowerCase();

        if (purpose === "project") {
            var projectType = prompt("Which type of project? (Web / Mobile / AI / Game)");
            if (projectType) {
                alert("You selected a " + projectType + " project.");
            } else {
                alert("No project type selected.");
            }

        } else if (purpose === "job") {
         var jobType = prompt("Which type of project? (part-time / full-time / contract / Intern)");
            if (jobType) {
                alert("You selected a " + jobType + " job.");
            } else {
                alert("No job type selected.");
            }
    } else if (reason === "no") {
        alert("Sorry, this reason is not valid.");
    } else {
        alert("Please enter 'yes' or 'no'.");
    }
    
    
}
}function checkReason() {
    var reason = prompt("Do you want to contact me? (yes/no)");
    if (!reason) {
        alert("You did not enter any reason.");
        return;
    }

    reason = reason.toLowerCase();

    if (reason === "yes") {
        alert("Congratulations, this reason is valid.");

        var purpose = prompt("Is it for a 'project' or a 'job'?");
        if (!purpose) {
            alert("You did not select project or job.");
            return;
        }

        purpose = purpose.toLowerCase();

        if (purpose === "project") {
            var projectType = prompt("Which type of project? (Web / Mobile / AI / Game)");
            if (projectType) {
                alert("You selected a " + projectType + " project.");
                alert("Thank you for select all.");
            } else {
                
            }

        } else if (purpose === "job") {
            var jobType = prompt("Which type of job? (part-time / full-time / contract / intern)");
            if (jobType) {
                alert("You selected a " + jobType + " job.");
            } else {
                alert("No job type selected.");
            }

        } else {
            alert("Invalid input. Please type 'project' or 'job'.");
        }
        

    }
     purpose = purpose.toLowerCase();
     if (purpose=="job"|| purpose==" project"){
        var vivaTime=prompt ("which Time? (10:00 am/ 11:00 am)");
        if (vivaTime){
            alert("You selected a " + vivaTime + "  Time.");
                alert("Thank you for selct all.");
        } else {
                alert("No Time selected.");
            }
        

    }
     else if (reason === "no") {
        alert("Sorry, this reason is not valid.");
    } else {
        alert("Please enter 'yes' or 'no'.");
    }
} 

