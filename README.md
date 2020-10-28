# Dog Breeds

Simple single page app that allows users to input the dog names, dog breeds, locations, and time they saw these dogs and then save this information in the database.

#### Admin and API made with CakePHP
DEMO: http://ec2-52-204-31-43.compute-1.amazonaws.com/admin

username: admin
password: admin

#### SPA made with Vue.JS
DEMO: http://ec2-52-204-31-43.compute-1.amazonaws.com/client/index.html

## Missing features and bugs
### SPA
Detect user initial location only works in local env
Only dog breed images from s3 get with rouded corners
Detect JWT expiration and renew token
Button Get Started should send direct to Register tab
Split GoogleMap.vue in more components

### Admin
Dog breeds CRUD should enable upload of pictures direct to AWS S3
User CRUD should hide passwords

### General
Write tests
