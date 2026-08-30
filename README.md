In order to replicate the CTF environment, you must have ```XAMPP``` and ```SSH``` installed. You will also need a password configured for your root user. However, even if those conditions have been met, you will still need to do some configuration. The steps you should take (assuming you are running Linux) are outlined below:

1. Create a new user. This user will run the web server that hosts the webapp with RCE vulnerabilities. Let's call this user ```developer```. 

2. Give ```developer``` ownership of the ```/opt/lampp/htdocs``` folder with this command:

```sudo chown -R developer:developer /opt/lampp/htdocs```

3. Configure LAMPP to run as the ```developer``` user by opening ```/opt/lampp/etc/httpd.conf``` and modifying the User directive:

```User developer```

```Group developer```


4. Verify the command was successful:

```ls -ld /opt/lampp/htdocs```

You should see ```developer``` instead of ```root```.

5. Download the webapp source code (it is just one file: ```index.php```) and place it directly inside the ```/opt/lampp/htdocs``` folder. 

6. Run LAMPP with this command: 

```sudo /opt/lampp/lampp start```


7. Navigate to ```127.0.0.1``` to verify the server is working and you can view the webpage. 

8. Assuming you already have a password set for your root user, download the ```TODO.txt``` file from the repository and replace the placeholder with your actual root password. (This is how the user will instigate privilege escalation)

9. Also download the ```user.txt``` file with the flag inside it. Both this and the ```TODO.txt``` files should be located in ```/home/developer/```.

10. Log into your root account and place the ```root.txt``` file in ```/root``` directory. 

11. Run these commands to ensure ```root.txt``` is only readable by the ```root``` user.

```sudo chown root:root /root/root.txt```

```sudo chmod 600 /root/root.txt```


12. Verify the command succeeded with: 
```ls -l /root/root.txt``

The output should look something like:

```-rw------- 1 root root 32 Month Day Timestamp root.txt```


13. The environment setup is now complete; you may begin the CTF by starting LAMPP with: ```sudo /opt/lampp/lampp start```.
