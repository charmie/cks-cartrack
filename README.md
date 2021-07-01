## About this Code Base

This is a simple CRUD REST API implementation in plain PHP using the MVC pattern. 

This is deployed in my personal AWS Server (Free Tier). ^_^

Please feel free to access its endpoints using any REST Client of your preference.




## API Endpoints

**CRUD** | **HTTP_REQUEST** | **Endpoint** | **JSON Request** | **Header** | 
--- |--- | --- | --- | -- |
Create | POST | http://ec2-18-207-184-223.compute-1.amazonaws.com/api/car/create | { "model_name": "Tesla Model Y 2021", "model_type": "Model X", "model_brand": "Tesla Motors", "model_year": "2021", "model_date_added" : "", "model_date_modified": ""} | content-type:application/json | 
Read | GET | http://ec2-18-207-184-223.compute-1.amazonaws.com/api/car/read | N/A | content-type:application/json |
Update | PUT | http://ec2-18-207-184-223.compute-1.amazonaws.com/api/car/update | { "id":"57", "model_name": "Testing XYZ", "model_type": "Test Model", "model_brand": "Tesla Motors", "model_year": "2000" } | content-type:application/json |
Delete | Delete | http://ec2-18-207-184-223.compute-1.amazonaws.com/api/car/delete/{cars.id} | N/A | content-type:application/json |




## API Responses

**CRUD** | **Endpoint** | **JSON Response** 
--- |--- | --- | 
Create | http://ec2-18-207-184-223.compute-1.amazonaws.com/api/car/create | {"status":"SUCCESS","message":"This is the create api"}, {"status":"FAILED","message":"Something went wrong. Please contact system administrator."}, {"status":"FAILED","message":"Please complete all fields."}, {"status":"FAILED","message":"Method not allowed."}
Read | http://ec2-18-207-184-223.compute-1.amazonaws.com/api/car/read | {"status":"SUCCESS","message":"This is the read api"}, {"status":"FAILED","message":"Unable to get data"}, {"status":"FAILED","message":"Method not allowed"}
Update | http://ec2-18-207-184-223.compute-1.amazonaws.com/api/car/update | {"status":"SUCCESS","message":"This is the update api"}, {"status":"FAILED","message":"Unexisting column identified"}, {"status":"FAILED","message":"Method not allowed"}
Delete | http://ec2-18-207-184-223.compute-1.amazonaws.com/api/car/delete/{cars.id} | {"status":"SUCCESS","message":"This is the delete api"}, {"status":"FAILED","message":"Method not allowed"}
