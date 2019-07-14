# OpenChat

This is a test, and the goal of this exercise will be to create a Laravel REST API for a basic chat.

## Guide

- Clone the git repo
- Run the following commands on terminal
  - `$ composer install`
  - `$ php artisan migrate`
  - `$ php artisan serve`
- Goto http://localhost:8000 on your browser
  - Enter a username of your choice
  - You'll get further instructions when you're logged in ;)

## Actions/Optimisations/Improvements

- Database: 
  - We should consider the use of a key-value store for our messages and conversations. This is necessary, since an obvious prediction will be that the DB size for a messaging application will increase rapidly.
  - A NoSQL database like redis is well suited for a messaging application. It is very fast, can handle a rapid increasing size of data, and can structure data in formats best suited for a messaging app.
  - The message model might not require very complex queries, so the NoSQL DB can handle the messages, and a RDBMS can handle other models. In other words, the two different databases can be used simultaneously.
- Caching
  - To avoid frequent queries to the DB (NoSQL or RDBMS), it's best to cache messages. This is advisable, since most messaging apps do not support edits on messages.
  - Caching can increase the speed of your application impressively, and the beauty of this will be appreciated when the messages roll into millions of data rows.
- Mobile Support
  - To obtain user's acceptance, it's advisable to implement support for mobile devices. Support for auto responsive on mobile browsers; and more preferable, creating a mobile app for openchat.
  - This is necessary, since mobile devices are the most used devices for internet access.
- Notifications
  - Notifications for new messages should be implemented. The current design does not support notifications for new messages. New messages are loaded only when the refresh button is clicked, or when a message is sent.
  - Using broadcast channels via Pusher can help solve this issue, with the pub-sub communication.
- Authentication
  - Its obviously a simple chat App, but if it's gonna be serious, then there must be authentication.
  - This will form the minimum level of security required for a messaging application.
  - Using JWTAuth for API's is this best option for this application.
  - With authentication, we could build a more robust and structured API.
- Monitoring and Debugging
  - It's advised to to integrate third-party API's to help with monitoring of the app performance, and error reporting.
  - It's necessary to monitor your application's performance, to hep investigate how user's react to changes in the API, help you scale server resources for your app, and a lot more.
  - You should implement automated error reporting. No one should wait for user's to report bugs to admin. You'll loose for every second you waste waiting for a user to report a bug.
  - Third party services one could use are datadog, new-relic, bugsnag, sentry, etc.
- Microservices
  - As the application grows bigger in complexity and size of development team, there'll be need to split the services according to business needs.
  - Adopting the microservices architecture will require a larger development team, but will improve productivity of your app.
  - There'll be increased progress in development, if the microservices architecture is adopted.
- Hosting
  - If the microservices architecture is implemented, the use of docker containers can be built on the kubernetes platform.
  - AWS and Google Cloud provide support the kubernetes platform.
- Support for Media
  - As a messaging app, there'll be need to send media files between users, and not just text.
  - This should be implemented, as this generation of users don't limit expression in communication via text only.
  - Also, every modern messaging app supports text, images, videos, and even video calls/streaming.
- GraphQL
  - GraphQL API is a more efficient and faster API to use, especially for a messaging app that uses text based communication.
  - GraphQL might still depend on REST, especially when there's need to exchange images and files between users.
  - GraphQL gives control to the client to specify what is needed for the application, and will be a nice tool to integrate.
- There's more to be done. A continuous cycle of system development will improve the quality of our application.  

## Coding Instructions Followed

- Create 3 models and their database migration called user, conversation and message.
  - A user can be part of multiple conversation and have multiple messages. It has at least the following field:
    - username: The user name for the chat.
  - A conversation needs at least 2 users and has multiple messages.
  - A message is part of a conversation and is authored by a user. It has at least the following fields:
    - content: The content of the message
    - created_at: The date at which it's been created
- Create the REST API controllers for each of the models. No authentication is required (it's a REALLY basic chat :)). The application should allow ___at least___ the followings:
  - Create a user
  - Update a user
  - List all the users
  - Create a conversation with users
  - List all the conversations
  - Create a message from a user as part of a conversation
  - List all the messages in a conversation
  - Some logic should prevent creating a new conversation if a conversation with the same users already exists.
  - Some logic should make sure no invalid data can be submitted through the API

Please provide the result of this exercise as an archive containing:

- The Laravel application source code
- The list of API endpoints as a Postman collection ( https://www.getpostman.com )

## Thinking

Based on this basic application, please provide a list of actions/optimisations/improvements that can be put in place in order to make sure the performances of this application are the best.

The list of actions/optimisations/improvements can range from:

- Database related
- Laravel related (example: caching)
- Hosting related
- Anything else

-----------------------------------------------

```
# Wordpress

The goal of this exercise will be to create a basic Wordpress theme that will allow building the following page: https://invis.io/A2ODHATWNFX#/237809432_Boldton_Clarke_-_RL_Landing

The requirements are:

- The theme should be flexible in order to allow editors to add, remove, reorder the sections in the page.
- The code should be structured well enough to allow the number of sections to grow without necessitating code changes, only creating the code for a new section should be required (think dynamic injection)
- No need to make the page responsive
- No need to build the Javascript for the carousel or the scroll back to top button, having the CSS styles for these elements is enough
- No need to use the images from the mock-up, a placeholder image at the right dimensions is fine.

__Please note:__ You're not evaluated on the pixel-perfect aspect of the page, but a minimum of CSS is requested (think prototype).

In order to help you, I've attached to this email an archive containing the followings:

- Sketch file for the page
- Fonts files
- The Advanced Custom Fields Worpdress plugin (The flexible content field should allow you to achieve the first requirement: https://www.advancedcustomfields.com/resources/flexible-content/ ).

Please provide the result of this exercise as an archive containing:

- The wordpress theme source code
- A Wordpress export file
- The list of the Wordpress plugin used
`