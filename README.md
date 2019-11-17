## Name of the project
A standalone library for data validation and sanitization developed in PHP.


## Why we need to sanitize input data & when?

Some theory..

Meticulous user can embeded js code in input fields where only string is expected. For example, 

"><script>window.open("http://hack.com");</script> 

If the code simply collects the user input and store it in database, prints it our for all it's users, they will be redirected to different sites when they they click it. However, there are many times, we want to show the user supplied tags. In that case, the output escaping will come handy.


Data like user's first name and last name, we can can only allow letters range from a-z otherwise we make it invalid. That's how we validate incoming data. 

However if we want to remove unwanted characters and tags from incoming data then we need to do Sanitization.



## Why we need to sanitize input data & when?
Add more validation filter
Add sanitization filter
Add it to packagist






