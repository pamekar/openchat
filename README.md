# Laravel

The goal of this exercise will be to create a Laravel REST API for a basic chat.

## Coding

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
