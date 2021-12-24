# 1. All subsites:
   - Register:
     - /register/
     - Registers an account on the site
   - Login:
     - /login/
     - Logins to an account that already exists.
   - Dashbord:
     - /dashbord/
     - Change password, Edit profile picture of the account you are logged into.
   - Profiles:
     - /profiles/
     - Shows every registered account, their profile picture, UID and balance.
   - admin panel:
     - /adminpanel/
     - Only available to admins, modify every account registered on the site and the site itself.
# 2. MySQL database example:
     UID  | username | password | email | name | lastname | Balance 
     ------------- | ------------- | ------------- | ------------- | ------------- | ------------- 
     Int, Auto Increment  | VARCHAR, 255 | VARCHAR, 255| VARCHAR, 255 | VARCHAR, 255 | VARCHAR, 255 | INT, 255 
