# CRUD Assessment for GCE

NOTE: In assessment description DB table name was said to be `users` but Laravel by default comes with a `users` table which have some extra fields not part of this assessment so I just created a new DB table by the name of `gce_users`.

# Technologies Used
1. <a href="https://laravel.com/">Laravel PHP framework version 10 (latest)</a>
2. <a href="https://laravel.com/docs/10.x/starter-kits#laravel-breeze">Laravel Breeze</a>
    1. Laravel Breeze is a minimal, simple implementation of all of Laravel's authentication features, including login, registration, password reset, email verification, and password confirmation. In addition, Breeze includes a simple "profile" page where the user may update their name, email address, and password.
3. <a href="https://inertiajs.com/">InertiaJS</a>
    1. Inertia allows you to create fully client-side rendered, single-page apps, without the complexity that comes with modern SPAs. It does this by leveraging existing server-side patterns that you already love.
4. Frontend in <a href="https://vuejs.org/">Vue JS</a>

# Steps to Test

1. Clone repository
2. cd into to directory `/grand-canyon`
3. Run migrations `php artisan migrate`
    - This will create laravel default DB changes and new custom table `gce_users`
4. Run application by `php artisan serve`
5. Go to the url at which application is being served, we will call it for now [BASE_URL], go to http://[BASE_URL]
    1. you should see Laravel welcome page with links to Login or Register on top right as shown below
    
    2. <img width="1727" alt="Screenshot at Feb 21 22-19-47" src="https://user-images.githubusercontent.com/2493730/220512910-865c58df-8b54-4a3a-a22d-2d13f7aacfbb.png">

6. Create a new account by clicking on register
    1. <img width="591" alt="Screenshot at Feb 21 22-22-02" src="https://user-images.githubusercontent.com/2493730/220513191-b863085a-e511-4448-ac95-fbb37a7d0ff5.png">

7. ## List of Users
    1. System should take you to page [BASE_URL]/dashboard where users will be displayed in a table format
    2. <img width="1407" alt="Screenshot at Feb 21 22-23-37" src="https://user-images.githubusercontent.com/2493730/220513368-915ed201-87bc-42e2-b84f-4c768f5aa53c.png">

9. ## Create new user
    1. To create a new user, click on button `Create New GCE User`
    2. <img width="1476" alt="image" src="https://user-images.githubusercontent.com/2493730/220513656-99d7d2cf-dd0c-460a-b5e5-949c0653ccc9.png">
    3. Create user form displayed below with employee_id validation error displayed
    4. <img width="1489" alt="image" src="https://user-images.githubusercontent.com/2493730/220513855-d429254e-4841-4f68-9bda-36d85bfe0f24.png">

10. After creating new user, system will take you back to dashboard page
11. ## Edit User
    1. To edit any user, click on corresponding `Edit` link for that user
    2. <img width="1455" alt="image" src="https://user-images.githubusercontent.com/2493730/220513967-e101e48d-c68c-45a5-8d88-4618d370c9d1.png">

12. ## Delete User
    1. To delete a user, click on corresponding delete button
    2. <img width="1319" alt="image" src="https://user-images.githubusercontent.com/2493730/220514186-083b922a-bbee-45fb-98c0-9fc8c6703772.png">
