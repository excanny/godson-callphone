<h1 align="center">
    
    Callphone
</h1>


## Using Callphone on POSTMAN
After the JWT is generated upon a successful login, use "Authorization : 'generated.jwttoken.value'" to access the protected routes in POSTMAN

## Routes Overview

| HTTP Verb    | Route          | Action | Used For    | Request | Expected Response/Action |
| :---:         |     :---:      |         :---: | :---: |  :---: | :---: |
| POST   | '/register'     | register action    | route to create a new user account   | {"name": "string", "username" : "string","password" : "string", "password_confirmation": "string"} | {"status": true,"message": "User successfully created" |
| POST | '/login'      | login action     |route to login    |{"username" : "string","password" : "string"}    | Generates an JWT authentication token that allows access to protected endpoints    |
| POST | '/uploadPhoto/'     | uploads photo    | uploads one photo   |{"file": "/imagepath"} |{ "status": true, "message": "Photo successfully uploaded"} |


