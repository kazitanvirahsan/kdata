## Name of the project
A simple data sanitizer developed in PHP

## What's included
code snippet for File name sanitization

## What's included
1. Sanitize Email Address
2. Sanitize Date & Time
3. Sanitize Variable
...


## Why we need to sanitize input data & when?

Some theory..

Meticulous user can embeded js code in input fields where only string is expected. For example, 

"><script>window.open("http://hack.com");</script> 

If the code simply collects the user input and store it in database, prints it our for all it's users, they will be redirected to different sites when they they click it. However, there are many times, we want to show the user supplied tags. In that case, the output escaping will come handy.


Data like user's first name and last name, we can can only allow letters range from a-z otherwise we make it invalid. That's how we validate incoming data. 

However if we want to remove unwanted characters and tags from incoming data then we need to do Sanitization.








