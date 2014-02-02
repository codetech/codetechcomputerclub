codeTech Computer Club (Website)
================================

codeTech Computer Club was founded at Mira Costa College Oceanside in early-2013. Our goal was to bring together students, graduates, teachers, and industrymen, all who were aspiring to enter or who had experience in technology fields. We would share our knowledge and build great things together.

codeTech's website serves a few purposes:

* To allow prospective members can learn about and join the club.
* To allow members to collaborate and communicate with each other.
* To allow members to track the progress of projects, start their own, and share them with members, friends, employers.
* To provide software and tutorials as resources.


Live Website
------------

[codetechcomputerclub.com](http://codetechcomputerclub.com)


Installation
------------

The website has dependencies that need to be installed with [Composer](https://getcomposer.org/).

### Linux / Mac:

1. Have git and php installed.
    - Debian: `sudo apt-get install git php5`
    - Mac (using [Homebrew](http://brew.sh/)): `brew install git`
2. Open a terminal and issue the following commands:

```bash
git clone https://github.com/codetech/codetechcomputerclub.git
cd codetechcomputerclub
php bin/composer.phar install
```

### Windows:

1. [Install PHP](http://windows.php.net/download/) if you haven't already.
2. Download and extract [the website's archive](https://github.com/codetech/codetechcomputerclub/archive/master.zip).
3. Open a command prompt and navigate to the `codetechcomputerclub` folder you just extracted.
4. Issue the following command, but replace `c:\php\php.exe` with **your** path to `php.exe`. (Figure out where it is.)

```bat
c:\php\php.exe bin\composer.phar install
```

If the above command doesn't work, [Install Composer on your system](https://getcomposer.org/Composer-Setup.exe) and then (in the `codetechcomputerclub` folder) issue the following command:

```bat
composer install
```

### Set up the database:

1. A database schema is located at `bin/database.sql`. Run the commands contained therein to set up the website's database.
    - In bash, you can issue the command `mysql < bin/database.sql`.
    - In phpMyAdmin, you can click the "SQL" tab at the top of any page, copy and paste the contents of `database.sql` into the "Run SQL query/queries" form, and click "Go".
    - Or look up "how to execute SQL queries in MySQL".
2. Make a copy of `app/Config/database.php.default` named `database.php`. Fill out your credentials in the `$development` array, and change the `__construct()` function if you want to use a ServerName other than `localhost` or `ctcc.local`.

### Configure Apache:

Open up `/etc/apache2/apache2.conf`, or `httpd.conf` (wherever it may be on your system), or create a new virtual host.

- If editing `apache2.conf` or `httpd.conf`, edit your `<Directory>` directive so that it includes the following components:

```apache
DocumentRoot "/var/www/app/webroot"
SetEnv CAKEPHP_DEBUG 1
<Directory "/var/www">
    AllowOverride all
    Order allow,deny
    Allow from all
    Require all granted
</Directory>
```

- If creating a virtual host:

```apache
<VirtualHost *>
    DocumentRoot "/var/www/ctcc/app/webroot"
    ServerName ctcc.local
    SetEnv CAKEPHP_DEBUG 1
    <Directory "/var/www/ctcc">
        AllowOverride all
        Order allow,deny
        Allow from all
        Require all granted
    </Directory>
</VirtualHost>
```

- And also, if using virtual hosts:
    - Make sure to add `ctcc.local` to the `/etc/hosts` file (Linux / Mac), or the `C:\Windows\System32\drivers\etc\hosts` file (Windows).
    - Make sure to properly enable virtual hosts in `apache2.conf` or `httpd.conf`. (This process is different for every system, so have fun Googling.)


Contact
-------

This project is led by Jackson Ray Hamilton (jackson@jacksonrayhamilton.com). Email him if you want to help out!

Further contact info is also available on our [Contact page](http://www.codetechcomputerclub.com/contact).
