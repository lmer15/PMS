<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="user.css">
</head>

<body>
    <!-- container start --> 
    <div class="container">  
        <!-- left start -->
        <div class="left">
            <!-- header start -->
            <header>
                <!-- logo start -->
                <div class="logo">
                    <img src="pics/logo.png" class="log">
                    <h2 class="logo_name">PMS</h2>
                    <div class="close">
                        <span class="material-symbols-outlined"></span>
                    </div>
                </div>
                <!-- nav start -->
                <nav>
                    <ul>
                        <li>
                            <a href="#dashboard" id="dashboard-link">
                                <span class="material-symbols-outlined full">
                                </span>
                                <i class='bx bxs-dashboard'></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="projects-option">
                            <a href="#projects" id="projects-link">
                                <span class="material-symbols-outlined">
                                </span>
                                <i class='bx bxs-package'></i>
                                <span class="title">Projects</span>
                            </a>
                        </li>
                        <li>
                            <a href="#calendar" id="calendar-link">
                                <span class="material-symbols-outlined">
                                </span>
                                <i class='bx bxs-calendar' ></i>
                                <span class="title">Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="#chats" id="chats-link">
                                <span class="material-symbols-outlined">
                                </span>
                                <i class='bx bxs-chat' ></i>
                                <span class="title">Message</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings" id="settings-link">
                                <span class="material-symbols-outlined">
                                </span>
                                <i class='bx bxs-cog' ></i>
                                <span class="title">Settings</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- nav end -->
            </header>

            <!-- upgrade start -->
            <div class="upgrade">
                <h2>Go PRO</h2>
                <h4>Upgrade to <bold>PRO</bold> for<br> more features</h4>
                <div class="upBtn">
                    <button>Upgrade</button>
                </div>
                <img src="pics/up.png" class="up_pic">
            </div>
            <!-- upgrade end -->
        </div>
        <!-- left end -->

        <section class="subscription" id="subscription">
            <div class="sub-wrapper">
                <div class="sub-header">
                    <h1>Choose Your Right Plan!</h1>
                    <p>Unlock endless possibilities.</p>
                </div>
            
                <div class="sub-pricing">
                    <div class="pricing-card">
                        <h3>Basic</h3>
                        <p class="sub-price">$19<span>/mo</span></p>
                        <ul>
                            <li>Time tracking</li>
                            <li>Customer reports and dashboards</li>
                            <li>Loyalty survey</li>
                        </ul>
                        <button>Select Plan</button>
                    </div>
                    <div class="pricing-card featured">
                        <!-- <div class="badge">Standard</div> -->
                        <h3>Standard</h3>
                        <p class="sub-price">$39<span>/mo</span></p>
                        <ul>
                            <li>Time tracking</li>
                            <li>Customer reports and dashboards</li>
                            <li>Loyalty survey</li>
                        </ul>
                        <button>Select Plan</button>
                    </div>
                    <div class="pricing-card">
                        <h3>Professional</h3>
                        <p class="sub-price">$59<span>/mo</span></p>
                        <ul>
                            <li>Time tracking</li>
                            <li>Customer reports and dashboards</li>
                            <li>Loyalty survey</li>
                        </ul>
                        <button>Select Plan</button>
                    </div>
                </div>
            </div>
        </section>

        <div class="top">
            <!-- searchBx start -->
            <div class="searchBx">
                <h2>Hi, Angel!</h2>
                <div class="inputBx">
                    <span class="material-symbols-outlined searchOpen">
                        <!-- search -->
                    </span>
                    <img src="pics/search-regular-36.png">
                    <input type="text" placeholder="Search...">
                    <span class="material-symbols-outlined searchClose"></span>
                </div>
                <img src="pics/bell-regular-48.png" class="notif">
            </div>
            <!-- searchBx end -->
            <!-- user start -->
            <div class="user">
                <span class="material-symbols-outlined"></span>
                <div class="profile-pic1"></div>
                <div class="dropdown">
                    <div class="nam">
                        <h4>Angel</h4>
                        <p>angelbaby123@gmail.com</p>
                    </div>
                    <ul>
                        <li>
                            <span class="material-symbols-outlined"></span>
                            <i class='bx bx-user'></i>
                            My Profile
                        </li>
                        <li>
                            <span class="material-symbols-outlined"></span>
                            <i class='bx bx-cog' ></i>
                            Account Settings
                        </li>
                        <li>
                            <span class="material-symbols-outlined"></span>
                            <i class='bx bx-devices' ></i>
                            Device Management
                        </li>
                        <li>
                            <a href="signin.html">
                                <span class="material-symbols-outlined"></span>
                                <i class='bx bx-log-out' ></i>
                                Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- user end -->
        </div>
        <!-- top end -->
    
        <!-- DASHBOARD -->
        <section id="dashboard" class="right">

            <!-- main start -->
            <main>
                <!-- projectCard start -->
                <div class="projectCard">
                    <div class="info-boxes">
                        <div class="info-box">
                            <span>Pending Projects</span>
                            <p>0</p>
                        </div>
                        <div class="info-box">
                            <span>Completed Projects</span>
                            <p>0</p>
                        </div>
                        <div class="info-box">
                            <span>Pending Tasks</span>
                            <p>0</p>
                        </div>
                        <div class="info-box">
                            <span>Completed Tasks</span>
                            <p>0</p>
                        </div>
                    </div>
                </div>
                <!-- projectCard end -->

                <!-- Container for Ongoing Projects -->
                <div class="projects-container">
                    <div class="projects-header">
                        <h2>Ongoing Projects</h2>
                        <a href="#projects" class="all-projects-link">All Projects</a>
                    </div>

                    <div class="projects-grid">
                        <!-- Project Card 1 -->
                        <div class="project-card white-bg">
                            <div class="project-header">
                                <span class="project-date">Oct. 7, 2024</span>
                                <span class="project-menu">⋮</span>
                            </div>
                            <h3>Web Designing</h3>
                            <p>Prototyping</p>
                            <div class="project-progress-bar">
                                <div class="progress blue"></div>
                            </div>
                            <div class="project-footer">
                                <div class="team">
                                    <img src="pics/SHREK.jpg" alt="team member">
                                    <img src="pics/bob.jpg" alt="team member">
                                    <span class="add-member">+</span>
                                </div>
                                <span class="days-left">2 Days Left</span>
                            </div>
                        </div>
                    
                        <!-- Project Card 2 -->
                        <div class="project-card red-bg">
                            <div class="project-header">
                                <span class="project-date">Oct. 8, 2024</span>
                                <span class="project-menu">⋮</span>
                            </div>
                            <h3>Mobile App</h3>
                            <p>Shopping</p>
                            <div class="project-progress-bar">
                                <div class="progress red"></div>
                            </div>
                            <div class="project-footer">
                                <div class="team">
                                    <img src="pics/bob.jpg" alt="team member">
                                    <img src="pics/1672369246156.jpg" alt="team member">
                                    <span class="add-member">+</span>
                                </div>
                                <span class="days-left">2 Days Left</span>
                            </div>
                        </div>
                    
                        <!-- Project Card 3 -->
                        <div class="project-card green-bg">
                            <div class="project-header">
                                <span class="project-date">Oct. 7, 2024</span>
                                <span class="project-menu">⋮</span>
                            </div>
                            <h3>Web Designing</h3>
                            <p>Prototyping</p>
                            <div class="project-progress-bar">
                                <div class="progress green"></div>
                            </div>
                            <div class="project-footer">
                                <div class="team">
                                    <img src="pics/SHREK.jpg" alt="team member">
                                    <img src="pics/bob.jpg" alt="team member">
                                    <span class="add-member">+</span>
                                </div>
                                <span class="days-left">2 Days Left</span>
                            </div>
                        </div>
                    
                        <!-- Project Card 4 -->
                        <div class="project-card white-bg">
                            <div class="project-header">
                                <span class="project-date">Oct. 7, 2024</span>
                                <span class="project-menu">⋮</span>
                            </div>
                            <h3>Web Designing</h3>
                            <p>Prototyping</p>
                            <div class="project-progress-bar">
                                <div class="progress blue"></div>
                            </div>
                            <div class="project-footer">
                                <div class="team">
                                    <img src="pics/1672369246156.jpg" alt="team member">
                                    <img src="pics/mona.jpg" alt="team member">
                                    <span class="add-member">+</span>
                                </div>
                                <span class="days-left">2 Days Left</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- projectCard2 end -->

                <!-- myTasks start -->
                <div class="myTasks">
                    <!-- tasksHead start -->
                    <div class="tasks">
                        <div class="task-header">
                            <h3>Recent Tasks</h3>
                            <a href="#projects">All Tasks</a>
                        </div>
                        <ul class="task-list">
                            <li>
                                <div class="task-details">
                                    <span class="task-name">Web Design Review</span>
                                    <span class="task-tool">Figma</span>
                                </div>
                            </li>
                            <li>
                                <div class="task-details">
                                    <span class="task-name">Web Design Review</span>
                                    <span class="task-tool">Figma</span>
                                </div>
                            </li>
                            <li>
                                <div class="task-details">
                                    <span class="task-name">Web Design Review</span>
                                    <span class="task-tool">Figma</span>
                                </div>
                            </li>
                            <li>
                                <div class="task-details">
                                    <span class="task-name">Web Design Review</span>
                                    <span class="task-tool">Figma</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- tasks ens -->
                </div>
                <!-- myTasks end -->

                <!-- calendar start -->
                <div class="calendar">
                    <div class="calendarHead">
                        <h2 id="monthYear"></h2>
                        <div class="calendarIcon">
                            <span id="prevMonth">
                                <img src="pics/less than.png" class="less" alt="Previous Month">
                            </span>
                            <span id="nextMonth">
                                <img src="pics/greater.png" class="great" alt="Next Month">
                            </span>
                        </div>
                    </div>
                    <div class="calendarData">
                        <ul class="weeks">
                            <li>Sun</li>
                            <li>Mon</li>
                            <li>Tue</li>
                            <li>Wed</li>
                            <li>Thu</li>
                            <li>Fri</li>
                            <li>Sat</li>
                        </ul>
                        <ul class="days" id="calendarDays"></ul>
                    </div>
                </div>
                
                <!-- calendar end -->

                <!-- messages start -->
                <div class="messages">
                    <!-- messagesHead start -->
                    <div class="messagesHead">
                        <h2>Messages</h2>
                    </div>

                    <div class="messagesUser">
                        <div class="messagesUserImg">
                            <img src="pics/1672369246156.jpg" alt="img1">
                        </div>
                        <h2>Jai Anoba<br><span>Front-end</span></h2>
                    </div>

                    <div class="messagesUser">
                        <div class="messagesUserImg">
                            <img src="pics/bob.jpg" alt="img2">
                        </div>
                        <h2>Gen La Rosa<br><span>Analyst</span></h2>
                    </div>

                    <div class="messagesUser">
                        <div class="messagesUserImg">
                            <img src="pics/mona.jpg" alt="img3">
                        </div>
                        <h2>Jera Peritos<br><span>QA</span></h2>
                    </div>

                    <div class="messagesUser">
                        <div class="messagesUserImg">
                            <img src="pics/SHREK.jpg" alt="img4">
                        </div>
                        <h2>Elmer Rapon<br><span>Back-end</span></h2>
                    </div>

                    <div class="messagesUser">
                        <div class="messagesUserImg">
                            <img src="pics/bob.jpg" alt="img5">
                        </div>
                        <h2>Ian Tradio<br><span>Front-end</span></h2>
                    </div>
                    <!-- messagesUser end -->
                </div>
                <!-- messages end -->
            </main>
            <!-- main end -->
        </section>
        <!-- DASHBOARD END -->

        <!-- PROJECTS -->
        <section id="projects" class="proj">
            <div class="proj-wrap">
                <div class="projects-overview">
                    <h1>Projects</h1>
                    <div class="projects-date">
                        <p id="current-date">
                    </div>
                </div>

                <div class="projects-actions">
                    <div class="projects-stats">
                        <div class="stat">
                            <p>0</p>
                            <span>In Progress</span>
                        </div>
                        <div class="stat">
                            <p>0</p>
                            <span>Completed</span>
                        </div>
                        <div class="stat">
                            <p>0</p>
                            <span>Total Projects</span>
                        </div>
                    </div>
                    <i class='bx bx-filter'><p class="filter-btn">Filter</p></i>
                    <button class="new-project-btn">+ New Project</button>
                </div>
            </div>

            <div id="project-container" class="projects-grids">
                <!-- Project Card 1 -->
                <div id="project-card-template" class="project-cards">
                    <div class="proj-cards">
                        <div class="card-headers">
                            <p class="project-date"></p>
                            <div class="menu-icon">
                                <span class="dot"></span>
                                <span class="dot"></span>

                                 <!-- Dropdown menu -->
                                <div class="p-dropdown-menu">
                                    <div class="p-dropdown-item delete">Delete</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-title">
                            <h3></h3>
                            <p></p>
                        </div>
                        <div class="progresss">
                            <div class="progress-bars" style="width: 0%;"></div>
                        </div>
                        <div class="progress-percentage">
                            <span>0%</span>
                        </div>
                        <div class="project-footers">
                            <div class="avatars">
                                <img src="pics/mona.jpg" alt="Team Member">
                                <img src="pics/SHREK.jpg" alt="Team Member">
                                <span class="add-team-member">+</span>
                            </div>
                            <p class="due"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>   

        <!-- TASKS & DOCUMENTS -->
        <div class="proj-details" style="display: none;">
            <a href="#project-container"><i class='bx bx-chevron-left'></i></a>

            <div class="tabs">
                <span id="tasks-tab" class="tab">Tasks</span>
                <span id="documents-tab" class="tab">Documents</span>
                <div class="ad-btn">
                    <button class="proj-add-user"><i class='bx bx-plus'></i> <i class='bx bxs-user'></i></button>
                    <button class="proj-upload-btn" style="display: none;"><i class='bx bx-cloud-upload'></i> Upload</button>
                </div>
            </div>

            <!-- Tasks Section -->
            <div id="tasks-section" class="section-task">
                <div class="proj-header">
                    <div class="proj-status">
                        <div class="proj-stat">
                            <p id="done-count">0</p>
                            <span>Done</span>
                        </div>
                        <div class="proj-stat">
                            <p id="remaining-count">0</p>
                            <span>Remaining Tasks</span>
                        </div>
                    </div>
                    <button class="new-task-btn">+ New Task</button>
                </div>
                

            <!-- Proj-Task Modal -->
            <div id="p-task-modal" class="p-modal-task" style="display: none;">
                <div class="p-modal-content">
                  <h2>New Task</h2>
                
                  <form id="p-task-form">
                    <label for="p-task-title">Title</label>
                    <input type="text" id="p-task-title" name="p-task-title">

                    <label for="description">Description</label>
                    <div class="des">
                        <textarea id="description" rows="2" placeholder="Task description"></textarea>
                    </div>
                
                    <label for="assigned-to">Assigned To</label>
                    <input type="text" id="assigned-to" name="assigned-to">

                    <label for="due-date">Due Date</label>
                    <input type="date" id="due-date" name="due-date">
                
                    <label for="p-task-color">Color Theme</label>
                    <div class="p-color-options">
                      <span class="p-color-option" data-color="#e6b7e0" style="background-color: #e6b7e0;"></span>
                      <span class="p-color-option" data-color="#b6c1ff" style="background-color: #b6c1ff;"></span>
                      <span class="p-color-option" data-color="#b7e6c9" style="background-color: #b7e6c9;"></span>
                      <span class="p-color-option" data-color="#e6e6e6" style="background-color: #e6e6e6;"></span>
                    </div>
                
                    <button type="submit" class="p-save-task-btn">Save Task</button>
                  </form>
                </div>
            </div>

            <div id="done-tasks-container" style="display: none;"></div>

            <div class="p-tasks" id="tasks-container">
                <!-- Task items -->
                    <div class="proj-task" style="display: none;">
                        <span class="check-circle" onclick="toggleCheck(this)"></span>
                      <div class="proj-task-info">
                        <span class="proj-task-title"></span>
                        <span class="proj-task-subtitle"></span>
                      </div>
                      <div class="proj-icon">
                        <i class='bx bx-trash-alt'></i>
                      </div>
                    </div>
            </div>

            <!-- TASK CONTENT -->
            <div class="t-task-card" id="t-task-card" style="display: none;">
                <div class="task-card">
                    <div class="t-header">
                        <button class="t-mark-complete" id="mark-complete"><i class='bx bx-check'></i>Mark Complete</button>
                        <button class="t-close-btn">✖</button>
                    </div>
                
                    <div class="t-content">
                        <div class="t-name">
                            <p><i class='bx bx-credit-card'></i> Task Name</p>
                            <h2 class="t-task-name"></h2>
                        </div>
                        <div class="t-details">
                            <div class="t-assignee">
                                <p>Assignee</p>
                                <div class="t-assigned">
                                </div>
                            </div>
                            <div class="t-due-date">
                                <p class="t-date-title">Due Date</p>
                                <p class="t-due"><i class='bx bx-time'></i> </p>
                            </div>
                        </div>
                    
                        <div class="t-description">
                            <div class="t-des_con">
                                <h4><i class='bx bx-poll'></i> Description</h4>
                                <i class='bx bx-pencil' ></i>
                            </div>
                            <p class="t-des"></p>
                        </div>
                    
                        <div class="t-attachments">
                            <div class="t-labels">
                                <h4><i class='bx bx-paperclip bx-rotate-90' ></i> Attachments</h4>
                                <p class="t-add-attachment-btn">+ Add an Attachment...</p>
                            </div>
                            <div class="files-container"></div>
                        </div>
                    
                        <div class="t-comments-section">
                            <div class="t-add-comment">
                                <img src="user-avatar.jpg" alt="User Avatar">
                                <div class="t-comment-input-wrapper">
                                    <input 
                                        type="text" 
                                        class="t-comment-input" 
                                        placeholder="Write a comment..."
                                    >
                                    <div class="t-comment-options">
                                        <button class="t-emoji-btn"><i class='bx bx-smile'></i></button>
                                        <button class="t-mention-btn">@</button>
                                        <button class="t-send-btn"><i class='bx bxl-telegram'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            </div>

            <!-- Documents Section -->
            <div id="documents-section" class="section-docs">
                <div class="projj-header">
                    <div class="proj-status">
                        <div class="proj-stat">
                            <p>0</p>
                            <span>All Files</span>
                        </div>
                    </div>
                    <!-- Sort and view controls -->
                    <div class="proj-controls">
                        <span class="sort-option">Name ↑</span> 
                    </div>
                </div>
                <div class="document-grid">
                </div>
            </div>

        </div>
        <!-- END OF TASKS & DOCUMENTS -->

        <!-- PROJECT MODAL -->
        <div class="modal-overlay" id="modal-overlay">
            <div class="p-modal">
                <h2>Add New Project</h2>
                <form class="project-form">
                    <label for="project-name">Project Name</label>
                    <input type="text" id="project-name" placeholder="Enter project name">
        
                    <label for="project-category">Category</label>
                    <input type="text" id="project-category" placeholder="Enter category">

                    <!-- Due Date Section -->
                    <label for="due-date">Due Date</label>
                    <div class="date-range">
                        <div class="date-field">
                            <label for="start-date">Start</label>
                            <input type="date" id="start-date">
                        </div>
                        <div class="date-field">
                            <label for="finish-date">Finish</label>
                            <input type="date" id="finish-date">
                        </div>
                    </div>

                    <!-- Color Theme Section -->
                    <label for="color-theme">Color Theme</label>
                    <div class="color-theme">
                        <div class="color-option" style="background-color: #e6b7e0;" data-color="#e6b7e0"></div>
                        <div class="color-option" style="background-color: #b6c1ff;" data-color="#b6c1ff"></div>
                        <div class="color-option" style="background-color: #b7e6c9;" data-color="#b7e6c9"></div>
                        <div class="color-option" style="background-color: #ffffff; border: 1px solid #ccc;" data-color="#ffffff"></div>
                    </div>
       
                    <!-- Hidden input to store the selected color -->
                    <input type="hidden" id="color-theme-hidden" name="colorTheme" value="#ffffff">

                    <button type="submit" class="save-project-btn">Save Project</button>
                </form>
            </div>
        </div>


        <!-- CALENDAR -->
        <section class="calendars" id="calendar">
            <div class="cal">
                <h1>Calendar</h1>
            </div>
            <div class="cal-wrapper">
            <div class="small-calendar">
                <div class="month-navigation">
                    <button onclick="prevMonth()"><img src="pics/less than.png" ></button>
                    <span id="month-year"></span>
                    <button onclick="nextMonth()"><img src="pics/greater.png"></button>
                </div>
                <div class="weekdays-s">
                    <span>Sun</span>
                    <span>Mon</span>
                    <span>Tue</span>
                    <span>Wed</span>
                    <span>Thu</span>
                    <span>Fri</span>
                    <span>Sat</span>
                </div>
                <div id="mini-calendar"></div>
            </div>
            
            <div class="big-calendar">
                <h2 id="big-month-year"></h2>
                <div class="weekdays">
                    <span>Sun</span>
                    <span>Mon</span>
                    <span>Tue</span>
                    <span>Wed</span>
                    <span>Thu</span>
                    <span>Fri</span>
                    <span>Sat</span>
                </div>
                <div id="large-calendar"></div>
            </div>
            </div>
            <div class="taskss">
                <h3>Tasks</h3>
                <ul></ul>
            </div>
        </section> 

        <!-- Task Modal -->
        <div id="task-modal" class="modal" style="display: none;">
            <div class="modal-content">
                <i class='bx bx-x'></i>
                <h2 id="modal-title">Add Task</h2>
                <label for="task-title">Title</label>
                <input type="text" id="task-title" placeholder="Task Title">
                
                <label for="task-desc">Description</label>
                <textarea id="task-desc" placeholder="Task Description"></textarea>

                <label for="task-date">Date</label>
                <input type="date" id="task-date" value="" disabled>
                
                <label for="task-deadline">Time</label>
                <input type="time" id="task-time">
                
                <label for="task-category">Category</label>
                <select id="task-category">
                    <option value="personal">Personal (Green)</option>
                    <option value="work">Work (Blue)</option>
                    <option value="urgent">Urgent (Red)</option>
                </select>
                
                <button id="add-task-btn">Add Task</button>
                <button id="update-task-btn" style="display: none;">Update Task</button>
            </div>
        </div>        

        <!-- CHATS -->
        <section class="message" id="chats">
            <div class="chat-list">
                <header>
                    <div class="header-container">
                        <h2>Chats</h2>
                        <div class="menu-iconn" onclick="toggleMenu()"><i class='bx bx-box' undefined ></i></div>
                    </div>
                </header>
                <div class="profile" oncontextmenu="showContextMenu(event)">
                    <img src="pics/mona.jpg" alt="Profile Picture">
                    <h3>Angel Baby</h3>
                    <span>Team Leader</span>
                </div>
                <div class="search-box-container">
                    <input type="text" placeholder="Search" class="search-boxx">
                    <i class="bx bx-search search-icon"></i>
                </div>        
                <div class="button-container">
                    <button class="add-btn" onclick="addMember()">+</button>
                    <div class="menu-iconn" onclick="toggleChatMenu()">⋮</div>
                </div>

                <div class="chats">
                    <div class="chat-item" oncontextmenu="showContextMenu(event, 'Team Athena')">
                        <img src="pics/1672369246156.jpg" alt="Team Athena">
                        <div>
                            <h4>Team Athena</h4>
                            <p>What to do?</p>
                        </div>
                        <span class="time">12:15</span>
                    </div>
                    <div class="chat-item" oncontextmenu="showContextMenu(event, 'Jai Anoba')">
                        <img src="pics/SHREK.jpg" alt="Jai Anoba">
                        <div>
                            <h4>Jai Anoba</h4>
                            <p>I'm done.</p>
                        </div>
                        <span class="time">12:16</span>
                    </div>
                    <!-- Repeat for more chats -->
                </div>
            </div>
            <div class="chat-window">
                <header>
                    <div class="header-left">
                        <img src="pics/1672369246156.jpg" alt="Team Avatar" class="team-avatar">
                        <h4>Team Athena</h4>
                    </div>
                    <div class="menu-iconn" onclick="toggleChatMenu()">⋮</div>
                </header>
                <div class="messages-container">
                    <div class="message-row leftt">
                        <img src="pics/SHREK.jpg" alt="User Avatar" class="avatar">
                        <div class="messagee">....</div>
                    </div>
                    <div class="message-row rightt">
                        <div class="messagee">....</div>
                        <img src="pics/mona.jpg" alt="User Avatar" class="avatar">
                    </div>
                </div>

                <div class="message-input">
                    <!-- Display container for selected file -->
                    <div id="fileDisplay" class="file-display" style="display: none;"></div>

                    <!-- Text input for message -->
                    <input type="text" id="messageInput" placeholder="Write your message...">

                    <!-- Hidden file input for attachment -->
                    <input type="file" id="fileInput" style="display: none;" onchange="handleFileSelect(event)">

                    <!-- Attachment icon triggers the file input -->
                    <i class="bx bx-paperclip attach-icon" onclick="document.getElementById('fileInput').click();"></i>

                    <!-- Send button -->
                    <button class="send-btn" onclick="sendMessage()"><i class="bx bx-send"></i></button>
                </div>
            </div>

            <div class="context-menu" id="contextMenu">
                <ul>
                    <li onclick="archiveChat()">Archive</li>
                    <li onclick="deleteChat()">Delete</li>
                    <li onclick="blockUser()">Block</li>
                </ul>
            </div>
        </section>


        <!-- SETTINGS -->
        <section class="settings" id="settings">
            <div class="settings-container">
                <!-- Sidebar -->
                <div class="s_sidebar">
                    <h1>Settings</h1>
                    <ul>
                        <li><a href="#s-profile-section" id="profile-link">Public Profile</a></li>
                        <li><a href="#account-section" id="account-link">Account Settings</a></li>
                        <li><a href="#notifications-section" id="notifications-link">Notifications</a></li>
                    </ul>
                </div>
        
                <!-- Content -->
                <div class="s_content" id="content">
                    <!-- Public Profile Section -->
                    <div id="s-profile-section" class="ss_section active">
                        <h3>My Profile</h3>
                        <div class="s_profile">
                            <!-- Profile Image Section -->
                            <div class="s_profile-image">
                                <div class="profile-pic2"></div>
                                <input type="file" id="file-input" accept="image/*" style="display: none;">
                                <div class="s_text">
                                    <h4>Upload new image</h4>
                                    <p class="file-size">Max file size - 10mb</p>
                                </div>
                                <div class="image-buttons">
                                    <button class="upload-btn">Upload</button>
                                    <button class="remove-btn">Remove image</button>
                                </div>
                            </div>
                    
                            <!-- Profile Form Section -->
                            <form>
                                <label>Username<i class='bx bx-edit-alt'></i></label>
                                <input type="text" value="Angel" class="input-field">
                                
                                <label>Role</label>
                                <input type="text" value="Team Leader" class="input-field" disabled>
                                
                                <div class="form-buttons">
                                    <button type="submit" class="save-btn">Save Changes</button>
                                    <button type="reset" class="clear-btn">Clear all</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
        
                    <!-- Account Settings Section -->
                    <div id="account-section" class="ss_section hidden">
                        <h3>Account Settings</h3>
                        <form>
                            <!-- Name Section -->
                            <div class="s-full">
                                <h4 class="namee">Name</h4>
                                <div class="form-row">
                                    <div class="form-group">
                                        <p>First name</p>
                                        <input type="text" value="Angel" class="f-input-field">
                                    </div>
                                    <div class="form-group">
                                        <p>Last name</p>
                                        <div class="name">
                                            <input type="text" value="Canete" class="l-input-field">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Email Address Section -->
                            <div class="form-group">
                                <div class="s-em">
                                    <label>Email Address</label>
                                    <div class="email">
                                        <p class="email-display">Your email is <strong>angelbaby@gmail.com</strong></p>
                                        <!-- <a href="#" class="change-link">Change</a> -->
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Password Section -->
                            <div class="form-group">
                                <label>Password</label>
                                <div id="password-view" class="p-pass">
                                    <input type="password" value="********" class="p-input-field" disabled>
                                    <a href="#" id="change-link" class="change-link">Change</a>
                                </div>
                                <div id="password-edit" class="p-hidden">
                                    <div class="pass">
                                        <div class="p-current">
                                            <p>Current Password</p>
                                            <input type="password" id="new-password" class="p--input-field" placeholder="Enter new password">
                                        </div>
                                        <div class="p-new">
                                            <p>New Password</p>
                                            <input type="password" id="current-password" class="p--input-field" placeholder="Enter current password">
                                        </div>
                                        <a href="#" id="hide-link" class="change-link">Hide</a>
                                    </div>
                                    <div class="reset">
                                        <p>Can't remember your current password? <a href="#">Reset your password</a></p>
                                        <button type="button" id="save-password-btn">Save password</button>
                                    </div>
                                </div>    
                            </div>
                    
                            <!-- Delete Account Section -->
                            <div class="delete-account">
                                <label>Delete Account</label>
                                <div class="del">
                                    <p class="d-text">Would you like to delete your account? Deleting your account will remove all the content associated with it.</p>
                                    <a href="#" class="delete-link">I want to delete my account</a>
                                </div>
                            </div>

                            <div class="popup-overlay" id="popup">
                                <div class="popup-content">
                                    <div class="popup-header">
                                        <i class='bx bx-trash'></i>
                                        <h2>Delete Account?</h2>
                                    </div>
                                    <p>Deleting your account is irreversible and will erase all your data. This action cannot be undone.</p>
                                    <div class="popup-actions">
                                        <button id="continueButton" class="continue-button">Continue</button>
                                        <button id="cancelButton" class="cancel-button">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
        
                    <!-- Notifications Section -->
                    <div id="notifications-section" class="ss_section hidden">
                        <h3>Notifications</h3>
                        <div class="s_notifications">
                            <!-- Enable Desktop Notification -->
                            <div class="notification-group">
                                <div class="notification-text">
                                    <strong>Enable Desktop Notification</strong>
                                    <p>Receive notification for all messages, updates, and documents</p>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                    
                            <!-- Enable Unread Notification -->
                            <div class="notification-group-n">
                                <div class="notification-text">
                                    <strong>Enable Unread Notification</strong>
                                    <p>Shows a red badge when you have an unread message</p>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                    
                            <!-- Email Notifications -->
                            <h3 class="n_email">Email Notifications</h3>
                    
                            <!-- Communication Emails -->
                            <div class="notification-group">
                                <div class="notification-text">
                                    <strong>Communication Emails</strong>
                                    <p>Receive emails for messages, contracts, and documents</p>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                    
                            <!-- Announcements & Updates -->
                            <div class="notification-group">
                                <div class="notification-text">
                                    <strong>Announcements & Updates</strong>
                                    <p>Receive emails about product updates, improvements, etc.</p>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>        
    
        
    </div>
    <!-- container end -->
    <script src="js/script.js"></script>
    <script src="js/calendar.js"></script>
</body>

</html>