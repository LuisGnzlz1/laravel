<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

### Interview Exercise

The goal of this exercise is not if the code works but thought process into the solution and handling of failure.   

Steps to Complete Interview Exercise:
1. Make a fork of the Laravel/Laravel repo to your own github account
2. Modify the fork to add a new Artisan console command
3. Make artisan command send a simple POST request to https://atomic.incfile.com/fakepost. Note that this is dummy site and the process failing on the post is acceptable.
4. It is very critical that the request reaches the destination, take all necessary steps to ensure reliable delivery. We want to see what acceptable methods needed to the handle failure.
5. Let's say the post was active and it was not failing, What would be the implementation if there was 100K requests? Bear in mind that the solution should consider what happens if there was a failure in one of the request or multiple requests. if you actually run the code, they will all fail. The solution should be thought out.

Comment which process handle question 4 and which one handles question 5. These are two separate processes.

### Steps to run application

- Add cron entry:

```
     * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```
- Run migrations:
```
     php artisan migrate
```

- Execute the following command:

```
     php artisan queue:listen
```

- Start server and run

```
     php artisan serve
```

**Note:** If you want to modify the url of the command that sends a simple post request, you can do it from the .env file.
* * *


### Response to activity 4 and 5

Activity 4 was solved using jobs to secure the data until the end, the process begins by placing the data in a queue and doing it recursively in case an error occurs with the url, if the url is active it executes its process in a normal way, but it stays in the cycle checking until it is active.


To solve activity 5 use an artisan command to verify those requests that gave an error and process them according to the given error. The command runs in the background every minute.

