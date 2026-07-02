PHP Full REST API with Authorization is an example project demonstrating a complete RESTful API built in native PHP with header-based authorization. It includes both a server API and a client that consumes the API. The server serves secured REST endpoints, and the client makes authorized requests to those endpoints and parses JSON responses.

#
How to start this app

1. Start the environment
Make sure PHP and a web server are available on your machine. If you are using Docker, start the containers for the project first.

2. Place the project in the web root
Make sure the application is available from your web server root, for example:
- /var/www/html/rest

3. Start the server
Open the server entry point in your browser:
- http://localhost/rest/server/index.php

4. Start the client
After the server is available, open the client entry point:
- http://localhost/rest/client/exec.php

5. Configure the database
- The application uses MySQL. Update the database settings in config.php if needed.

6. Import the database schema
- Import the SQL file from rest.sql.
