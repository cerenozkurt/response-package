# Response Messages
```php
composer require cerenimo/response-messages "dev-main" 
 ```

<br>

The ResponseTrait is a trait used to standardize the HTTP response messages in Laravel and Lumen. You can install it using the composer command mentioned above. To use it in your class, add the following line with the "use" keyword:


```php
use CerenOzkurt\ResponseMessages\ResponseTrait;

class YourClass {

use ResponseTrait;
// ...
}
```

<br>

Inside your function, you can use it as follows:

```php 
return $this->responseData(['message' => $message]);
```
Response / 200 OK
```php
{
    "result": true,
    "data": {
        "message": {
            "id": 372,
            "role": "user",
            "message": "Hi",
            "end_conversation": 0,
            "created_time": "2023-05-30T09:28:01.000000Z",
            "conversation_completion_count": "0.60",
            "word_count": 1
        }
    }
}
```
<br>
<hr>
<br>
The package provides the following functions:

<br>

- **responseData($data, $message = null)** : *Use if the request is successful and data is wanted to be returned.*
  
- **responseSuccess($message = null)** : *Use if the request is successful.*

- **responseError($message = null, $status = 500)** : *Use if the request is error.*

- **responseValidation($validation)** : *Use if there is a validation error.*

- **responseDataNotFound($data_name = null)** : *Use if not found error.*

- **responseForbidden($message = null)** : *Use in forbidden error.*

- **responseUnauthorized($message = null)** : *Use in unauthorized error.*

- **responseTryCatch($message = null, $status = 500)** : *Use in try-catch error.*

- **responseDataCount($data)** : *Use if the data need count information.*

- **responseBadRequest($message = null)** : *Use if the sent request is incorrect.*

- **responseConflict($message = null)** : *Use if a mismatch occurs due to a predetermined rule or version differences on the web server of your request.*

- **responsePayloadTooLarge($message = null)** : *Use if the request entity is much larger than the limits defined by the server.*

- **responseTooManyRequests($message = null)** : *Use if the website exceeded the specified request limit.*

- **responseInternalServer($message = null)** : *Use if a server-side error occurred.*

- **responseNotImplemented($message = null)** : *Use if the server does not support the features required to fulfill the request.*