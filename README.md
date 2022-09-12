<h1 align="center">
    
    Callphone
</h1>

## Default test user

The following user is already seeding for testing:

<p><b>username:</b> john </p>
<p><b>password:</b> john</p>

you are also free to create more users using the register endpoint


## Using Callphone on POSTMAN
After the JWT is generated upon a successful login, use "Authorization : 'generated.jwttoken.value'" to access the protected routes in POSTMAN

## Routes Overview

| HTTP Verb    | Route          | Action | Used For    | Request | Expected Response/Action |
| :---:         |     :---:      |         :---: | :---: |  :---: | :---: |
| POST   | '/api/register'     | register action    | route to create a new user account   | {"name": "string", "username" : "string","password" : "string", "password_confirmation": "string"} | {"status": true,"message": "User successfully created" |
| POST | '/api/login'      | login action     |route to login    |{"username" : "string","password" : "string"}    | Generates an JWT authentication token that allows access to protected endpoints    |
| POST | '/api/uploadPhoto/'     | uploads photo    | uploads one photo   |{"file": "/imagepath"} |{ "status": true, "message": "Photo successfully uploaded"} |


