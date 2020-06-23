<p align="center"><a href="https://venoudev.com"><img src="https://venoudev.com/img/venoudev-2.png" width="400" alt="VenouDev API Rest Base"></a>
</p>


# API Docs

<larecipe-card shadow>
    Welcome to the Venoudev API Rest Base Documentation
</larecipe-card>

At [Venoudev](https://venoudev.com) uses [Larecipe](https://github.com/saleem-hadad/larecipe) for document our API Rest

|Json Response Structure|
|:-|

```json
{
    "success": bool ,
    "description": "string",
    "data": { JsonObject } || { JsonArrayObject[] },
    "errors": [
        {
            "error_code": "[CODE]",
            "field": "[field]" || "[NOTHING]",
            "message": "string"
        }
    ],
    "messages": [
        {
            "message_code": "[CODE]",
            "message": "string"
        }
    ]
}
```

> {info} Message Object

#### Example
```json
    {
        "message_code": "[LOGIN_SUCCESS]",
        "message": "Login do correctly"
    }

```

> {danger} Error Object

#### Example
```json

    {
        "error_code": "[ERR_REQUIRED]",
        "field": "[email]",
        "message": "The email field is required."
    }

```
```json

    {
        "error_code": "[ERR_STATUS_USER]",
        "field": "[NOTHING]",
        "message": "The status of user is baned."
    }

```

