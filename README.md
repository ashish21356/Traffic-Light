# Traffic-Light
The Signal Lights project involves creating an interactive system with four signals: A, B, C, and D. The user can decide the sequence in which the signals will operate, as well as the intervals for Green and Yellow lights. 

# Key Features:
Signal Sequence Input: Users decide the operational sequence of the signals (A, B, C, D).
Green and Yellow Intervals: Users provide input for the Green and Yellow light intervals.
Start/Stop Buttons: Controls for starting and stopping the signal operation.
AJAX-Based Operations: All operations, including sequence updates and interval changes, are done via AJAX without reloading the page.
Input Validation: Robust validation is applied to avoid invalid or erroneous inputs.

# Configure the Backend

Ensure you have a server environment set up (e.g., XAMPP or WAMP for local development).
Create a MySQL database and import the provided SQL script (database.sql).
# Setup Configuration
Configure the database connection in your project’s configuration file:
# Start the Server
If you're using PHP's built-in server for testing:

# Usage Instructions
Open the Interface
Navigate to the homepage where you'll find the signal lights control panel.

# Configure the Signals

Enter the sequence of signals (e.g., A -> B -> C -> D).
Set the intervals for Green and Yellow lights.
Start and Stop

Click the "Start" button to initiate the sequence based on the input intervals.
Use the "Stop" button to halt the signal operation.
# Validations
The system will validate the following:

Signal Sequence: Ensure the input sequence consists of signals A, B, C, and D only.
Green/Yellow Intervals: Only positive numbers are allowed, and empty values are not accepted.
# Technologies Used
Frontend: HTML, CSS, JavaScript, AJAX
Backend: PHP (CodeIgniter or Custom MVC Framework)
Database: MySQL
