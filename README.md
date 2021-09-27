EasyAdmin Demo Application
==========================

This project is the official [EasyAdmin][1] Demo application that showcases the
main features of EasyAdmin, a popular admin generator for [Symfony][2] applications.

It's a fork of the [Symfony Demo application][3]. This allows to compare the
manual backend/admin included in Symfony Demo and the backend/admin created with
EasyAdmin.

Requirements
------------

  * PHP 7.3 or higher;
  * PDO-SQLite PHP extension enabled;
  * and the [usual Symfony application requirements][2].

Installation
------------


```bash
$ composer install
```

Usage
-----

There's no need to configure anything to run the application. If you have
[installed Symfony CLI][5], run this command:

```bash
$ cd my_project/
$ symfony serve
```

Then access the application in your browser at the given URL (<https://localhost:8000> by default).