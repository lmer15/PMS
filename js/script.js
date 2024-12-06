//SIDEBAR TOGGLE
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar links
    const dashboardLink = document.getElementById('dashboard-link');
    const projectsLink = document.getElementById('projects-link');
    const calendarLink = document.getElementById('calendar-link');
    const chatsLink = document.getElementById('chats-link');
    const settingsLink = document.getElementById('settings-link');
  
    // Section containers
    const rightSection = document.querySelector('.right');
    const projSection = document.querySelector('.proj');
    const calendarSection = document.querySelector('.calendars');
    const messageSection = document.querySelector('.message');
    const settingsSection = document.querySelector('.settings');
    const topSection = document.querySelector('.top');
    const projDetails = document.querySelector('.proj-details');
  
    // Hide all sections initially except for the dashboard (.right)
    projSection.style.display = 'none';
    calendarSection.style.display = 'none';
    messageSection.style.display = 'none';
    settingsSection.style.display = 'none';
  
    // Dashboard section
    dashboardLink.addEventListener('click', function(e) {
      e.preventDefault();
      rightSection.style.display = 'block';
      projSection.style.display = 'none';
      calendarSection.style.display = 'none';
      messageSection.style.display = 'none';
      settingsSection.style.display = 'none';
      topSection.style.display = 'flex';
      projDetails.style.display = 'none';
    });

    // Projects section
    projectsLink.addEventListener('click', function(e) {
      e.preventDefault();
      rightSection.style.display = 'none';
      projSection.style.display = 'block';
      projSection.style.visibility = 'visible'; 
      projSection.style.position = 'relative';  
      projDetails.style.display = 'none'; 
      calendarSection.style.display = 'none';
      messageSection.style.display = 'none';
      settingsSection.style.display = 'none';
      topSection.style.display = 'flex';
    });
  
    // Calendar section
    calendarLink.addEventListener('click', function(e) {
      e.preventDefault();
      rightSection.style.display = 'none';
      projSection.style.display = 'none';
      calendarSection.style.display = 'block';
      messageSection.style.display = 'none';
      settingsSection.style.display = 'none';
      topSection.style.display = 'flex';
      projDetails.style.display = 'none';
    });
  
    // Message section
    chatsLink.addEventListener('click', function(e) {
      e.preventDefault();
      rightSection.style.display = 'none';
      projSection.style.display = 'none';
      calendarSection.style.display = 'none';
      messageSection.style.display = 'block';
      settingsSection.style.display = 'none';
      topSection.style.display = 'flex';
      projDetails.style.display = 'none';
    });
  
    // Settings section
    settingsLink.addEventListener('click', function(e) {
      e.preventDefault();
      rightSection.style.display = 'none';
      projSection.style.display = 'none';
      calendarSection.style.display = 'none';
      messageSection.style.display = 'none';
      settingsSection.style.display = 'block';
      topSection.style.display = 'none'; 
      projDetails.style.display = 'none';
    });
  });


//SIDEBAR COLLAPSED
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector(".left");
    const toggleButton = document.querySelector(".logo");
  
    toggleButton.addEventListener("click", function () {
        sidebar.classList.toggle("collapsed");
    });
  });




// SETTINGS
document.getElementById("profile-link").addEventListener("click", function() {
  showSection('s-profile-section');
});

document.getElementById("account-link").addEventListener("click", function() {
  showSection('account-section');
});

document.getElementById("notifications-link").addEventListener("click", function() {
  showSection('notifications-section');
});

function showSection(sectionId) {
  let sections = document.querySelectorAll('.ss_section');
  sections.forEach(section => {
      section.classList.add('hidden');
  });
  
  document.getElementById(sectionId).classList.remove('hidden');
  document.getElementById(sectionId).classList.add('active');
}



// CHANGE & HIDE PASSWORD
document.getElementById('change-link').addEventListener('click', function(e) {
  e.preventDefault();
  document.getElementById('password-view').style.display = 'none';  // Hides the "Change" view
  document.getElementById('password-edit').style.display = 'block'; // Shows the "Edit" view
});

document.getElementById('hide-link').addEventListener('click', function(e) {
  e.preventDefault();
  document.getElementById('password-view').style.display = 'flex'; // Shows the "Change" view
  document.getElementById('password-edit').style.display = 'none'; // Hides the "Edit" view
});

document.getElementById('save-password-btn').addEventListener('click', function() {
  var newPassword = document.getElementById('new-password').value;
  var currentPassword = document.getElementById('current-password').value;

  // Check if both fields are filled
  if (!newPassword || !currentPassword) {
      alert('Please fill in both fields.');
      return;
  }

  // Validate the new password length (at least 8 characters)
  if (newPassword.length < 8) {
      alert('New password must be at least 8 characters long.');
      return;
  }

  // Validate if the password contains at least one uppercase letter
  if (!/[A-Z]/.test(newPassword)) {
      alert('New password must contain at least one uppercase letter.');
      return;
  }

  // Validate if the password contains at least one lowercase letter
  if (!/[a-z]/.test(newPassword)) {
      alert('New password must contain at least one lowercase letter.');
      return;
  }

  // Validate if the password contains at least one number
  if (!/[0-9]/.test(newPassword)) {
      alert('New password must contain at least one number.');
      return;
  }

  // Validate if the password contains at least one special character
  if (!/[!@#$%^&*(),.?":{}|<>]/.test(newPassword)) {
      alert('New password must contain at least one special character.');
      return;
  }

  // Logic to handle password change 
  alert('Password successfully changed!');

  // After success, return to the original view
  document.getElementById('password-view').style.display = 'flex';  // Shows the "Change" view
  document.getElementById('password-edit').style.display = 'none';  // Hides the "Edit" view
});


// PROJECT-DATE
document.addEventListener('DOMContentLoaded', function() {
  const dateElement = document.getElementById('current-date');
  
  const today = new Date();
  
  const months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sep.", "Oct.", "Nov.", "Dec."];

  const formattedDate = `${months[today.getMonth()]} ${today.getDate()}, ${today.getFullYear()}`;
  
  dateElement.textContent = formattedDate;
});

document.addEventListener("DOMContentLoaded", function () {
    const modalOverlay = document.getElementById("modal-overlay");
    const newProjectBtn = document.querySelector(".new-project-btn");
    const saveProjectBtn = document.querySelector(".save-project-btn");
    const colorOptions = document.querySelectorAll(".color-option");
    let selectedColor = "#ffffff"; 

    newProjectBtn.addEventListener("click", () => {
        modalOverlay.style.display = "flex";
    });

    modalOverlay.addEventListener("click", (event) => {
        if (event.target === modalOverlay) {
            modalOverlay.style.display = "none";
        }
    });

    colorOptions.forEach(option => {
        option.addEventListener("click", () => {
            colorOptions.forEach(opt => opt.classList.remove("select"));
            option.classList.add("select");
            selectedColor = option.getAttribute("data-color");

            // Set the value of the hidden input field
            document.getElementById("color-theme-hidden").value = selectedColor;
        });
    });

    function calculateDaysLeft(finishDate) {
        const currentDate = new Date();
        const endDate = new Date(finishDate);
        const timeDiff = endDate - currentDate;
        return Math.max(0, Math.ceil(timeDiff / (1000 * 60 * 60 * 24)));
    }

    // Save project via AJAX
    saveProjectBtn.addEventListener("click", (event) => {
        event.preventDefault();

        // Get form values
        const projectName = document.getElementById("project-name").value;
        const projectCategory = document.getElementById("project-category").value;
        const startDate = document.getElementById("start-date").value;
        const finishDate = document.getElementById("finish-date").value;

        // Validate required fields
        if (!projectName || !projectCategory || !startDate || !finishDate) {
            alert("Please fill in all fields.");
            return; // Stop form submission
        }

        // Validate the start date (it must not be in the past)
        const currentDate = new Date();
        const startDateObj = new Date(startDate);
        if (startDateObj < currentDate) {
            alert("Start date cannot be in the past.");
            return;
        }

        // Validate the finish date (it must not be before the start date)
        const finishDateObj = new Date(finishDate);
        if (finishDateObj < startDateObj) {
            alert("Finish date cannot be before the start date.");
            return;
        }

        // Calculate the days left
        const daysLeft = calculateDaysLeft(finishDate);
        const status = daysLeft < 0 ? "Overdue" : "Ongoing"; // Set status based on the finish date

        // Prepare project data
        const projectData = {
            name: projectName,
            category: projectCategory,
            startDate: startDate,
            finishDate: finishDate,
            colorTheme: selectedColor,
            daysLeft: daysLeft,
            status: status
        };

        // Corrected fetch request
        fetch('back_end/save_project.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(projectData).toString() // Properly encode data
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Project created successfully!') {
                alert('Project created successfully!');
                document.querySelector(".project-form").reset();
                modalOverlay.style.display = "none";
            } else {
                alert(data.message);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('An error occurred while saving the project.');
        });

    });
});


// --------------------------------------------
//PROJECT-DETAILS
document.addEventListener("DOMContentLoaded", function () {
    const projectContainer = document.getElementById("project-container");
    const projSection = document.querySelector(".proj");
    const projDetails = document.querySelector(".proj-details");
    const backButton = projDetails.querySelector(".bx-chevron-left");

    // Function to show project details
    function showProjectDetails() {
        projSection.style.display = "none";
        projDetails.style.display = "block";
        projDetails.style.visibility = "visible";
        projDetails.style.position = "relative";
    }

    // Function to go back to project list
    function hideProjectDetails() {
        projSection.style.display = "block"; 
        projSection.style.visibility = "visible"; 
        projSection.style.position = "fixed"; 

        projDetails.style.visibility = "hidden";  
        projDetails.style.position = "absolute";  
    }

    // Add click event to each project card
    projectContainer.addEventListener("click", (event) => {
        const menuIconClicked = event.target.closest(".menu-icon");
        if (!menuIconClicked) { 
            const clickedElement = event.target.closest(".project-cards");
            if (clickedElement) {
                showProjectDetails();
            }
        }
    });

    // Add click event to the back button in proj-details
    backButton.addEventListener("click", hideProjectDetails);
});


//TASKS & DOCS TOGGLE
document.addEventListener("DOMContentLoaded", function () {
    const tasksTab = document.getElementById("tasks-tab");
    const documentsTab = document.getElementById("documents-tab");
    const tasksSection = document.getElementById("tasks-section");
    const documentsSection = document.getElementById("documents-section");
    const addUserButton = document.querySelector(".proj-add-user");
    const uploadButton = document.querySelector(".proj-upload-btn");

    // Function to show the Tasks section, show addUser button, and hide the Upload button
    function showTasks() {
        tasksSection.style.display = "block";
        documentsSection.style.display = "none";
        tasksTab.classList.add("active-tab");
        documentsTab.classList.remove("active-tab");
        addUserButton.style.display = "inline-flex"; // Show add user button
        uploadButton.style.display = "none"; // Hide upload button in Tasks section
    }

    // Function to show the Documents section, show Upload button, and hide the addUser button
    function showDocuments() {
        documentsSection.style.display = "block";
        tasksSection.style.display = "none";
        documentsTab.classList.add("active-tab");
        tasksTab.classList.remove("active-tab");
        uploadButton.style.display = "inline-flex";  // Show upload button
        addUserButton.style.display = "none";  // Hide add user button
    }

    // Event listeners for the tabs
    tasksTab.addEventListener("click", showTasks);
    documentsTab.addEventListener("click", showDocuments);

    // Initial setup: show the Tasks section and addUser button by default, hide upload button
    showTasks();
});



//USER DROPDOWN
document.addEventListener("DOMContentLoaded", function () {
  const userImg = document.querySelector(".profile-pic1");
  const dropdown = document.querySelector(".dropdown");

  userImg.addEventListener("click", function () {
      dropdown.classList.toggle("active");
  });

  // Close dropdown if clicking outside of it
  document.addEventListener("click", function (event) {
      if (!userImg.contains(event.target) && !dropdown.contains(event.target)) {
          dropdown.classList.remove("active");
      }
  });
});



//DELETE ACC POP-UP
document.addEventListener("DOMContentLoaded", function () {
  const deleteLink = document.querySelector(".delete-link");
  const popup = document.getElementById("popup");
  const continueButton = document.getElementById("continueButton");
  const cancelButton = document.getElementById("cancelButton");

  // Show the popup when the delete link is clicked
  deleteLink.addEventListener("click", function (event) {
      event.preventDefault();
      popup.style.display = "flex";
  });

  // Handle the Continue button click (delete action)
  continueButton.addEventListener("click", function () {
      popup.style.display = "none";
      alert("Account deleted successfully."); 
  });

  // Handle the Cancel button click (close popup)
  cancelButton.addEventListener("click", function () {
      popup.style.display = "none";
  });
});



//SUBSCRIPTION TOGGLE
const upgradeButton = document.querySelector('.upgrade .upBtn button');
const subscriptionSection = document.getElementById('subscription');
const subWrapper = document.querySelector('.sub-wrapper');

subscriptionSection.style.display = 'none';

upgradeButton.addEventListener('click', (event) => {
    event.stopPropagation(); 
    if (subscriptionSection.style.display === 'none') {
        subscriptionSection.style.display = 'block';
    } else {
        subscriptionSection.style.display = 'none';
    }
});

document.addEventListener('click', (event) => {
    if (subscriptionSection.style.display === 'block' && !subWrapper.contains(event.target)) {
        subscriptionSection.style.display = 'none';
    }
});


//FILTER IN PROJECTS FUNCTIONALITY
const filterButton = document.querySelector('.bx-filter');
const projectContainer = document.querySelector('.projects-grids');

filterButton.addEventListener('click', function () {
    const projectCards = Array.from(projectContainer.children);

    if (projectCards.length > 0) {
        const sortedCards = projectCards.sort((a, b) => {
            const titleA = a.querySelector('.p-title h3').textContent.trim().toLowerCase();
            const titleB = b.querySelector('.p-title h3').textContent.trim().toLowerCase();

            if (titleA < titleB) {
                return -1; 
            } else if (titleA > titleB) {
                return 1; 
            } else {
                return 0; 
            }
        });

        projectContainer.innerHTML = ''; 
        for (let i = 0; i < sortedCards.length; i++) {
            projectContainer.appendChild(sortedCards[i]); 
        }
    } else {
        console.log('No projects to sort.');
    }
});



//SETTINGS UPLOAD PROFILE PIC
const uploadButton = document.querySelector('.upload-btn');
const removeButton = document.querySelector('.remove-btn');
const profilePics = document.querySelectorAll('.profile-pic1, .profile-pic2');

// hide the remove button if there's no image in .profile-pic2
window.addEventListener('DOMContentLoaded', () => {
  if (!profilePics[1].style.backgroundImage) {
    removeButton.style.display = 'none';
  }
});

// Create the file input for image uploads
const filInput = document.createElement('input');
filInput.type = 'file';
filInput.accept = 'image/*';

uploadButton.addEventListener('click', () => filInput.click());

filInput.addEventListener('change', () => {
  if (filInput.files && filInput.files[0]) {
    const file = filInput.files[0];
    const reader = new FileReader();

    reader.onload = (e) => {
      profilePics.forEach((pic) => {
        pic.style.backgroundImage = `url('${e.target.result}')`;
        pic.style.backgroundSize = 'cover';
        pic.style.backgroundPosition = 'center';
      });
      checkImageDisplay();
    };

    reader.readAsDataURL(file);
  }
});

// Function to check if any profile picture has an image
function checkImageDisplay() {
  const hasImage = profilePics[1].style.backgroundImage; 
  removeButton.style.display = hasImage ? 'block' : 'none';
}

removeButton.addEventListener('click', () => {
  profilePics.forEach((pic) => (pic.style.backgroundImage = ''));
  checkImageDisplay();
});



//SETTINGS-PROFILE FORM
const pencilIcon = document.querySelector('.bx-edit-alt');
const formButtons = document.querySelector('.form-buttons');
const inputField = document.querySelector('.input-field');
const saveButton = document.querySelector('.save-btn');
const clearButton = document.querySelector('.clear-btn');

formButtons.style.display = 'none';
inputField.disabled = true;

pencilIcon.addEventListener('click', function () {
    if (formButtons.style.display === 'none') {
        formButtons.style.display = 'block';
        inputField.disabled = false;
    } else {
        formButtons.style.display = 'none';
        inputField.disabled = true;
    }
});

saveButton.addEventListener('click', function (event) {
    event.preventDefault();

    console.log('Saved Username:', inputField.value);

    formButtons.style.display = 'none';
    inputField.disabled = true;
});

clearButton.addEventListener('click', function (event) {
    event.preventDefault();

    inputField.value = '';
});
