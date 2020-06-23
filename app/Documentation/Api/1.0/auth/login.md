<p align="center"><a href="https://venoudev.com"><img src="https://venoudev.com/img/venoudev-2.png" width="200" alt="VenouDev API Rest Base"></a>
</p>

# API Docs

At [Venoudev](https://venoudev.com) uses laracipe for document our API Rest



- [Login](#login)

<a name="login"></a>
## Login


Gives Oauth2 Token for the QueoApp User 
### Endpoint

|Method|URI|
|:-|:-|:-|
|POST|`/api/v1/auth/login`|

|Headers|
|:-|
|[`Accept: application/json`]|


### Role

```text
admin, employee, user
```
### Authorization

```text
None
```

### Body Data

```json
{
    "email"         : "email",
    "password"      : "string",
}
```

|   Responses|
|:-|

> {success} Success Response

Code `200` `Ok`

Content

```json
{
    "success": true,
    "description": "Welcome Be Awesome!",
    "data": {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMjAxZWIzN2IyMTVkNTc5OWU0ZDg2NjJlNTRkYWM5OWEyNTYzMWE3OWM4MWZiMGEzNmRkMDY3NzdlN2M3ZTllZjYzMTA1ZjNiZmYwMzgxOWQiLCJpYXQiOjE1OTI2OTU4ODYsIm5iZiI6MTU5MjY5NTg4NiwiZXhwIjoxNjI0MjMxODg2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.JgK84-CDMJ6xOQlmpnSdvtTGu0to0mDi0tjY6JhZCeGrfWSWb23SEf3rNDKbtWWiSAp3yBnP08v9J9GYrMwtx9ItYoANGn8qjSr2GVep2bK9GjjkErOkDWOIXeEw7tPxD5KD4xWXKY6_uiGX3Jj5m6EbhFsxzj1q1nIpJtGBxkVNQvg1fDtUGjc2qA5aFiqjRGDajFTPMyojyTOvf-tKhid_RWupdz5H4fBBjODMCAw4XBmqRhvT6WHv0WWAyvwoJCzAQTWqiEpctqthc-0HzpGTBxuqsdj71poowFJMtnL6r6_AYsEOn2IrDsR8tNjIBQ05iDrM6KZkHTuHVsKPo7augrwf6glpsuiASuy4Au1VlwJVUfno3xjCTcX7vsNzvqVSb6E2_0FWTTMwSHqkWQQNfI03daDOFyVej69U_4DqbN_cvcl9rZJp-WYXiB3C89Za1UwSxp8Ff9xcYowrw8vwb0PHvnPpkMTeHAnS59zLQrl5R-fqh-PKJe0gACK3W5-weJqoyE7_B-FziFqZdRhm7zwvSEZW2myEFdNOiUBeJ7OUV81a5CP1Gt7C0n5ejQhoPN5s60qHcSiYQFaKuhI_6rWLW9bNlFSqzHTA1DHYFFBQg4j6Vx-EqaAuZGw_cCYZMpF95A8C9_kLtjh1ayHhKae773BCulf_1ZEAYE",
        "roles": [
            "admin"
        ]
    },
    "errors": [],
    "messages": [
        {
            "code_message": "[LOGIN_SUCCESS]",
            "message": "login do correctly"
        }
    ]
}
```
> {danger} Error Response

Code `400` `Bad Request`

### Messages

<larecipe-badge type="info" circle icon="fa fa-commenting-o"></larecipe-badge> 

|code_message|message|
|:-|:-|
|`[ERR_CHECK_DATA]`|The form has errors whit the inputs.|

### Errors

<larecipe-badge type="danger" circle icon="fa fa-exclamation-triangle"></larecipe-badge> 

|code_message|field|message|
|:-|:-|:-|
|`[ERR_REQUIRED]`|`[email]`|The email field is required.|
|`[ERR_REQUIRED]`|`[password]`|The password field is required.|
|`[FAILED_AUTH]`|`[NOTHING]`|Invalid login credential|

<larecipe-swagger endpoint="/api/v1/auth/login"></larecipe-swagger>
