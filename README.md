<h1 align="center">
    
    Callphone
</h1>


## Using Callphone on POSTMAN
After the JWT is generated upon a successful login, use "Authorization : 'generated.jwttoken.value'" to access the protected routes in POSTMAN

## Routes Overview

| HTTP Verb    | Route          | Action | Used For    | Request | Expected Response/Action |
| :---:         |     :---:      |         :---: | :---: |  :---: | :---: |
| POST   | '/register'     | register action    | route to create a new user account   | {"name": "string", "email" : "string","password" : "string"} | {"status": true,"message": "User created successfully" |
| POST | '/login'      | login action     |route to login    |{"username" : "string","password" : "string"}    | Generates an JWT authentication token and logs user into Dashboard    |
| POST | '/uploadPhoto/'     | uploads photo    | uploads one photo   |{"file": "/imagepath"} |{ "status": true, "message": "Photo successfully uploaded"} |


