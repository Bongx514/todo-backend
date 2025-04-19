# Todo API

This is a simple Todo API built with PHP and MySQL. It provides endpoints to create, retrieve, and delete tasks. The API is designed to be used with a frontend application or for testing with tools like Postman or cURL.

## Prerequisites

- [XAMPP](https://www.apachefriends.org/) or any PHP and MySQL server.
- A MySQL database named `todoapp` with a table named `tasks`.

### Database Setup

Run the following SQL script to create the `tasks` table:

```sql
CREATE TABLE tasks (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    project_name VARCHAR(255) NOT NULL,
    description TEXT,
    due_date DATE NOT NULL,
    priority VARCHAR(50) NOT NULL
);

API Endpoints
1. Create Task
Endpoint: /todo-endpoints/api/createTask.php
Method: POST
Description: Creates a new task in the database.

Request Body:
Parameter	Type	Required	Description
title	String	Yes	The title of the task.
project_name	String	Yes	The project name.
description	String	No	A description of the task.
due_date	Date	Yes	The due date (YYYY-MM-DD).
priority	String	Yes	The priority (e.g., High).

Example:
curl -X POST -d "title=Task1&project_name=ProjectA&description=Sample task&due_date=2025-04-30&priority=High" http://localhost/todo-endpoints/api/createTask.php

2. Get Tasks
Endpoint: /todo-endpoints/api/getTasks.php
Method: GET
Description: Retrieves all tasks from the database.

Example:
curl -X GET http://localhost/todo-endpoints/api/getTasks.php

3. Delete Task
Endpoint: /todo-endpoints/api/deleteTask.php
Method: POST
Description: Deletes a task by its ID.

Request Body:
Parameter	Type	Required	Description
Id	        Int	    Yes	        The ID of the task.

Example:
curl -X POST -d "Id=1" http://localhost/todo-endpoints/api/deleteTask.php

Project Structure
api/: Contains the API endpoints.
db.php: Handles the database connection.
index.php: Displays available API endpoints.
Testing
You can test the API using:

Postman
cURL commands (examples provided above).
License
This project is open-source and available for use under the MIT License.
