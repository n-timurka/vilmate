# Vilmate test assignment

## About
Application consist of two parts: backend and frontend

## Install
To set up this application just clone it and run docker command  
`docker-compose up`  

### API  
For the Laravel part you need to copy the `.env.example` file to `.env` like usual and copy DB file `cp database/database.sqlite.example database/database.sqlite`.  
Run `composer install` to install dependencies and that should be it for the app.  
After that you need to generate key `php artisan key:generate` and run a migrations `php artisan migrate`
   
Now you can see running API here: `http://localhost:8000/api`  

API endpoints:  
- `http://api.local:8000/api/listings GET` - Get all listings
- `http://api.local:8000/api/listings POST` - Add new listing
- `http://api.local:8000/api/listings/{id} GET` - Get one listing
- `http://api.local:8000/api/listings/{id} POST` - Update listing
- `http://api.local:8000/api/listings/{id} DELETE` - Delete listing

### Frontend    
- `cd front`
- `npm install`
- `npm run dev`  
  
Now you can see running application here: `http://localhost:8080/`

Sorry for that large amount of steps! I realize that it can be automated, but I haven't time for that :(
