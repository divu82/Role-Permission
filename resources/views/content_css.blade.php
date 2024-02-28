<style>
/* Reset default margin and padding */
/* * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
} */

/* Global styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

/* Header styles */
header {
    background: linear-gradient(to right, #4a77d4, #64b6ff);
    color: white;
    padding: 20px;
    text-align: center;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    
}

.nav-container {
    display: flex;
    align-items: center;
    gap:150px;
}

.nav-bar-logo img {
    max-height: 60px;
    border-radius: 50%;
}

.nav-links ul {
    list-style: none;
    display: flex;
}

.nav-links li {
    margin-right: 20px;
}

.nav-title h1 {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
}

.nav-link {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 20px;
    transition: background-color 0.3s ease;
}

.nav-link:hover {
    background: linear-gradient(to right, #042971, #64b6ff);
}
.permission_links{
    text-decoration: none;
    color: black;
}
.permission_links:hover{
    background: linear-gradient(to right, #042971, #64b6ff);
}

/* Aside styles */
aside {
    background-color: #fff;
    padding: 20px;
    float: left;
}

/* Content Section styles */
.content {
    padding: 20px;
    margin-left:272px;
    background-color: #fff;
}

.content button {
    padding: 10px 20px;
    background-color: #4a77d4;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.content button:hover {
    background-color: #64b6ff;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table caption {
    font-weight: bold;
    margin-bottom: 10px;
}

table th,
table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

/* Footer styles */
footer {
    background: linear-gradient(to right, #4a77d4, #64b6ff);
    color: white;
    text-align: center;
    padding:20px;
    position:relative;
    bottom: 0;
    width: 100%;
}
.nav-admin-details {
            position: relative;
        }

.admin-details-popup {
    position: absolute;
    bottom: -260px; /* Adjust the distance from the image */
    left: 50%;
    transform: translateX(-50%);
    background-color: #fff;
    padding: 20px; /* Add padding to make it larger */
    border-radius: 10px; /* Add rounded corners */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
    display: none;
    width: 200px;
    text-align: center; 
    font-size: 20px; 
    z-index: 1; 
}
        .nav-admin-details:hover .admin-details-popup {
            display: block;
        }

</style>