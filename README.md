Provides a portal for HTTP-authenticated users, including

 * a list of services
 * a password change tool

Configuration
---
Enable authentication in Apache with directives similar to these in `.htaccess`, in the root directory you want to protect.

    AuthType Basic
    AuthName "FrogSong"
    AuthUserFile /path/to/htpasswd
    Require valid-user

Copy `config.sample.php` to `config.php` and change the settings appropriately:

 * `TITLE`: page title and main header
 * `PASSWD_FILE`: path to the same file as set previously
 * `$Services`: names and links to list in the services menu

Password file
---
The password file should be specified an absolute path for Apache, but may be specified as a path relative to this directory for `config.php`. For changing passwords to work, the web server needs write permission to this file.

Also, the password change tool creates a backup copy of the password file, with a `.bak` extension appended. Therefore, the web server needs write access to this file also (create it if necessary), or else write access to the entire directory in which the password file and backup live.

