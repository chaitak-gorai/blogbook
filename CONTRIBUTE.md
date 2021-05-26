# Blogbook- Contributions


## Prequisites
* [Git](https://git-scm.com/downloads) 
* [XAMPP](https://www.apachefriends.org/download.html)
* Code Editor like [Vs Code](https://code.visualstudio.com/download)

## Local Setup

1. Fork the repository.
2. Clone the Forked repo
   * copy the repo link
   * open git bash or command prompt and run the code 
       ```
       git clone <repo lin>
       ```
3. Run XAMPP server
4. Open **localhost/phpmyadmin**
5. Click on **Import**
6. Select import.sql from database folder
7. go to db.php in includes folder and comment the remote database code and uncomment the local database code
8. You can now run the site by 
   * Either paste the whole code in htdocs of Xampp and run localhost/blogbook in new tab
   * Or open the blogbook folder in vs code, install php server exstension,right click on index file and select open server.


## Commmiting to this repo.
 1. While commiting please create a branch in your name/issue name and then commit. **DO NOT COMMIT TO MASTER BRANCH**
 2. After a successful contribution, you can add your name to Contributors.md 
