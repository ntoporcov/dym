# DYM – Did You Mean...

### What is this?

I needed a simple way to fix user mispelling on one of my apps and I thought it would be neat if I could leverage suggestions from Google, so I created this open API. It could not be simpler now to get suggestions on mispellings.

Google blocks their suggestion API from cross origin calls, so DYM allows you to easily get a suggestion array from anywhere.


### How to use the API

- DYM only accepts **GET** Requests.
- Header **Accept** must be set to **application/json**
- Query must be formatted for URL.
- Request must be sent to http://dym.show/QUERY

####Javascript Example　

```javascript
    const request = new XMLHttpRequest();
    request.open('GET', 'http://dym.show/'+QUERY, true);
    request.setRequestHeader('Accept', 'application/json');

    request.onreadystatechange = function() {
        if (request.readyState === 4) {
            const response = JSON.parse(request.responseText);
            // do stuff here
        }
    };

    request.send();
```