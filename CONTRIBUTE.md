# Blogbook- Contributions


## Prequisites
* [Git](https://git-scm.com/downloads) 
* [PHP/XAMPP](https://www.apachefriends.org/download.html)
* Code Editor like [Vs Code](https://code.visualstudio.com/download)

## Local Setup

1. Fork the repository.
2. Clone the Forked repo
   * copy the repo link
   * open git bash or command prompt and run the code 
       ```
       git clone <repo lin>
       ```
## Running using Xampp
1. Run XAMPP server
2. Open **localhost/phpmyadmin**
3. Click on **Import**
4. Select import.sql from database folder
5. go to db.php in includes folder and comment the remote database code and uncomment the local database code
6. paste the whole code in htdocs of Xampp and run localhost/blogbook in new tab
### NOTE: you can also use the remote sql database if you dont need the database for any manual checks or updates.You can then skip step 2-5.

## Using Vs code directly
   * Or open the blogbook folder in vs code, 
   * install php live server exstension,
   * right click on index file and select open server.

## Reent updates
We have separated the database for production and the real website.
This help the developrs to work freely and do changes to the database.
### Credential for login:
* username -  **admin**  pass- **admin** for role- admin
* username- **subscriber** pass- **subscriber** for role- subscriber
