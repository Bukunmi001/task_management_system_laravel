Task Management API Documentation
The API documentation for the Task Management system is available through Postman. It includes details on how to authenticate, use various endpoints, and view request/response formats.

Postman Collection
You can access the Postman collection here: 
1)Task Management: https://app.getpostman.com/join-team?invite_code=c3d755f48589848c94977e287b7a3a30 
2)API Documentation: https://api.postman.com/collections/35241101-36435441-0ac1-40d9-a456-04185c01c0bb?access_key=PMAT-01J515PSN5TXD27CF35HF5BW89


Authentication
Register a user via the /api/register endpoint.
Log in via the /api/login endpoint to receive an authToken.
Use the authToken in the Authorization: Bearer {{authToken}} header for authenticated requests.
Available Endpoints
GET /api/tasks - List all tasks.
POST /api/tasks - Create a new task.
GET /api/tasks/{id} - Get details of a specific task.
PUT /api/tasks/{id} - Update a specific task.
DELETE /api/tasks/{id} - Delete a specific task.
POST /api/register - Register a new user.
POST /api/login - Log in as a user.
