# Traffic-Light System

An interactive traffic light system with customizable signal sequences and intervals.

## Overview

The Signal Lights project creates an interactive system with four signals: A, B, C, and D. Users can decide the sequence in which the signals operate and set intervals for Green and Yellow lights.

## Key Features

- Signal Sequence Input: Users define the operational sequence of signals (A, B, C, D)
- Green and Yellow Intervals: Users set intervals for Green and Yellow lights
- Start/Stop Buttons: Controls for starting and stopping signal operations
- AJAX-Based Operations: All operations performed via AJAX without page reloads
- Input Validation: Robust validation to prevent invalid inputs

## Setup Instructions
### Backend Configuration

1. Set up a server environment (e.g., XAMPP or WAMP for local development)
2. Create a MySQL database and import the provided SQL script (`database.sql`)
3. Configure database connection in your project's configuration file

### Start the Server

If using PHP's built-in server for testing:


## Usage Instructions

1. Open the Interface
   Navigate to the homepage to access the signal lights control panel.

2. Configure the Signals
   - Enter the sequence of signals (e.g., A -> B -> C -> D)
   - Set intervals for Green and Yellow lights

3. Start and Stop Operations
   - Click "Start" to initiate the sequence based on input intervals
   - Use "Stop" button to halt signal operation

## Validations

The system validates:
- Signal Sequence: Ensures input sequence contains only signals A, B, C, and D
- Green/Yellow Intervals: Accepts only positive numbers, rejects empty values

## Technologies Used

- Frontend: HTML, CSS, JavaScript, AJAX
- Backend: PHP (CodeIgniter or Custom MVC Framework)
- Database: MySQL

## Contributing

Contributions are welcome! Please fork this repository and submit a pull request with your changes.


