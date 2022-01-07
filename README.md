To begin with I used PHPStorm as my IDE as it offers the best PHP troubleshooting and function autocompletion.

I began by choosing to create a dockerized mysql server to save me the hassle of having to configure and run a mysql server on my local machine.

After configuring docker and the database within, I started creating the different routes.

I used twig for the HTML templates and their rendering and doctrine for all the database functionalities.

To use follow the Install.md instructions.

## Homepage

__Route = "/"__

- This is the central part of my web server where you can access the different routes. I added the html template at the end as I decided to make it easier to navigate.

## Projects 

__Route = "/projects"__ 

- Here a list of the created projects is displayed in a table, with all the necessary info.

## Add Projects

__Route = "/projects/add"__

- This route is to create new projects via the completion of a form. I came across the use of forms by searching around and thought I would try and implement it. The output from the form is then stored in the database.

## Search Projects

__Route = "/projects/{name}"__

- This route adds the functionality to search projects by name, returning a table if the name is found. If not, it will return an error.

## Totals

__Route = "/projects/show/total"__

- Outputs the total number of projects as well as the sum of their amounts. I wanted to create a custom console command for this but I ran into some difficulties so instead I just added this route to return the necessary values.
 
