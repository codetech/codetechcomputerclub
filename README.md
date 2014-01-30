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
$ git clone https://github.com/codetech/codetechcomputerclub.git
$ cd codetechcomputerclub
$ php bin/composer.phar install
```

### Windows:

1. [Install PHP](http://windows.php.net/download/) if you haven't already.
2. Download and extract [the website's archive](https://github.com/codetech/codetechcomputerclub/archive/master.zip).
3. Open a command prompt and navigate to the `codetechcomputerclub` folder you just extracted.
4. Issue the following command, but replace `c:\php\php.exe` with **your** path to `php.exe`. (Figure out where it is.)

```bat
> c:\php\php.exe bin\composer.phar install
```

If the above command doesn't work, [Install Composer on your system](https://getcomposer.org/Composer-Setup.exe) and then (in the `codetechcomputerclub` folder) issue the following command:

```bat
> composer install
```

Finally, set up the database in MySQL.

(TODO: Include the database schema .sql file.)


Contact
-------

This project is led by Jackson Ray Hamilton (jackson@jacksonrayhamilton.com). Email him if you want to help out!

Further contact info is also available on our [About page](http://www.codetechcomputerclub.com/about).
