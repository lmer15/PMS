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
    });

    // Projects section
    projectsLink.addEventListener('click', function(e) {
      e.preventDefault();
      rightSection.style.display = 'none';
      projSection.style.display = 'block';
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
    });
  });


// CHECK CIRCLE
function toggleCheck(element) {
  element.classList.toggle("checked");
}


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



// USER DROPDOWN 
document.querySelector('.userImg').addEventListener('click', function() {
  const dropdown = document.querySelector('.dropdown');
  dropdown.style.zIndex = 10000;
  dropdown.classList.toggle('show-dropdown');
});
  


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


//SIDEBAR COLLAPSED
document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.querySelector(".left");
  const toggleButton = document.querySelector(".logo");

  toggleButton.addEventListener("click", function () {
      sidebar.classList.toggle("collapsed");
  });
});

// PROJECT-DATE
document.addEventListener('DOMContentLoaded', function() {
  const dateElement = document.getElementById('current-date');
  
  const today = new Date();
  
  const months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sep.", "Oct.", "Nov.", "Dec."];

  const formattedDate = `${months[today.getMonth()]} ${today.getDate()}, ${today.getFullYear()}`;
  
  dateElement.textContent = formattedDate;
});

// LIST-VIEW & GRID PROJECT-CARDS
document.addEventListener("DOMContentLoaded", function () {
  const listViewIcon = document.querySelector(".bx-list-ul");
  const gridViewIcon = document.querySelector(".bx-grid-alt");
  const projectsGrids = document.querySelector(".projects-grids");

  // Toggle list view
  listViewIcon.addEventListener("click", function () {
      projectsGrids.classList.add("list-view");
      document.querySelectorAll(".project-cards").forEach(card => {
          card.classList.add("list");
          card.classList.remove("grid");
      });
  });

  // Toggle grid view
  gridViewIcon.addEventListener("click", function () {
      projectsGrids.classList.remove("list-view");
      document.querySelectorAll(".project-cards").forEach(card => {
          card.classList.remove("list");
          card.classList.add("grid");
      });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const modalOverlay = document.getElementById("modal-overlay");
  const newProjectBtn = document.querySelector(".new-project-btn");
  const saveProjectBtn = document.querySelector(".save-project-btn");
  const projectContainer = document.getElementById("project-container");
  const colorOptions = document.querySelectorAll(".color-option");
  let selectedColor = "#ffffff"; // Default color

  // Open the modal
  newProjectBtn.addEventListener("click", () => {
      modalOverlay.style.display = "flex";
  });

  // Close the modal when clicking outside
  modalOverlay.addEventListener("click", (event) => {
      if (event.target === modalOverlay) {
          modalOverlay.style.display = "none";
      }
  });

  // Function to calculate days left
  function calculateDaysLeft(finishDate) {
      const currentDate = new Date();
      const endDate = new Date(finishDate);
      const timeDiff = endDate - currentDate;
      return Math.max(0, Math.ceil(timeDiff / (1000 * 60 * 60 * 24)));
  }

  // Function to darken a color
  function darkenColor(color, percentage) {
      const colorValue = parseInt(color.slice(1), 16);
      const r = Math.max(0, ((colorValue >> 16) & 0xff) * (1 - percentage));
      const g = Math.max(0, ((colorValue >> 8) & 0xff) * (1 - percentage));
      const b = Math.max(0, (colorValue & 0xff) * (1 - percentage));
      return `rgb(${Math.round(r)}, ${Math.round(g)}, ${Math.round(b)})`;
  }

  // Event listener for selecting a color theme
  colorOptions.forEach(option => {
      option.addEventListener("click", () => {
          // Remove 'select' class from all options and add to the clicked one
          colorOptions.forEach(opt => opt.classList.remove("select"));
          option.classList.add("select");
          
          // Get the selected color
          selectedColor = option.getAttribute("data-color");
      });
  });

  // Fetch projects from the backend and create project cards
  function fetchProjects() {
      fetch('back_end/get_projects.php')
          .then(response => response.json())
          .then(projects => {
              // Clear any existing projects
              const projectList = document.getElementById("project-list");
              projectList.innerHTML = '';

              // Loop through the projects and create a card for each
              projects.forEach(project => {
                  createProjectCard(
                      project.name,
                      project.category,
                      project.start_date,
                      project.finish_date,
                      project.days_left,
                      project.access_code,
                      project.status,
                      project.color
                  );
              });
          })
          .catch(error => {
              console.error('Error fetching projects:', error);
          });
  }

  // Function to create a project card
  function createProjectCard(name, category, startDate, finishDate, daysLeft, accessCode, status, color) {
      const card = document.createElement("div");
      card.classList.add("project-cards");
      card.style.backgroundColor = color;

      const textColor = "#000000";
      const darkerColor = darkenColor(color, 0.2);

      const startFormatted = new Date(startDate).toLocaleString("en-US", {
          weekday: "short", year: "numeric", month: "short", day: "numeric", hour: "2-digit", minute: "2-digit"
      });
      const finishFormatted = new Date(finishDate).toLocaleString("en-US", {
          weekday: "short", year: "numeric", month: "short", day: "numeric", hour: "2-digit", minute: "2-digit"
      });

      card.innerHTML = `
          <div class="project-header" style="background-color: ${darkerColor}; color: ${textColor}">
              <h3>${name}</h3>
              <p>Status: <span class="status">${status}</span></p>
          </div>
          <div class="project-body">
              <p>Category: ${category}</p>
              <p>Start Date: ${startFormatted}</p>
              <p>Finish Date: ${finishFormatted}</p>
              <p>Days Left: ${daysLeft}</p>
              <p>Access Code: ${accessCode}</p>
          </div>
      `;

      // Append the card to the project list
      const projectList = document.getElementById("project-list");
      projectList.appendChild(card);
  }

  // Function to save project to the backend
  saveProjectBtn.addEventListener("click", (event) => {
      event.preventDefault();

      // Get form values
      const projectName = document.getElementById("project-name").value;
      const projectCategory = document.getElementById("project-category").value;
      const description = document.getElementById("description").value;
      const startDate = document.getElementById("start-date").value;
      const finishDate = document.getElementById("finish-date").value;

      // Validate required fields
      if (!projectName || !projectCategory || !description || !startDate || !finishDate) {
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
          description: description,
          startDate: startDate,
          finishDate: finishDate,
          colorTheme: selectedColor,
          daysLeft: daysLeft,
          status: status // Send status to backend
      };

      // Send data to the server (backend)
      fetch('back_end/save_project.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: new URLSearchParams(projectData)
      })
      .then(response => response.json())
      .then(data => {
          if (data.message === 'Project created successfully!') {
              // Fetch and display all projects again (to include the newly added one)
              fetchProjects();
              
              // Close the modal and reset the form
              document.querySelector(".project-form").reset();
              modalOverlay.style.display = "none";
          } else {
              console.error('Error:', data.message);
              alert(data.message);
          }
      })
      .catch((error) => {
          console.error('Error:', error);
          alert('An error occurred while saving the project.');
      });
  });

  // Call fetchProjects to display existing projects when page is loaded
  fetchProjects();

  // PROJECT-CARD MENU DROPDOWN
  projectContainer.addEventListener("click", function (event) {
      const menuIcon = event.target.closest(".menu-icon");

      // If a menu icon was clicked
      if (menuIcon) {
          // Prevent click event from propagating to document
          event.stopPropagation();

          // Find the dropdown menu within the clicked menu icon
          const dropdown = menuIcon.querySelector(".p-dropdown-menu");
          if (dropdown) {
              // Toggle dropdown visibility
              dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
          }
      } else {
          // Close all dropdowns if clicked outside the menu-icon
          document.querySelectorAll(".p-dropdown-menu").forEach(menu => menu.style.display = "none");
      }
  });

  // Event listener for delete button inside dropdown menu
  projectContainer.addEventListener("click", function (event) {
      if (event.target.classList.contains("delete")) {
          const card = event.target.closest(".project-cards");
          if (card) {
              card.remove(); // Remove the project card
          }
      }
  });

  // CLOSE ALL DROPDOWN MENUS IF CLICKED OUTSIDE
  document.addEventListener("click", function () {
      document.querySelectorAll(".p-dropdown-menu").forEach(menu => menu.style.display = "none");
  });
});
