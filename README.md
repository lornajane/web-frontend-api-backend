Sample code for the *Web Frontend, API Backend* talk
====================================================

This is the example project whose code samples show up in the talk.  It is mostly here for posterity but if you did want to get the code running, there are a few things you will need.

Database
--------

The database is from the [http://joind.in](http://joind.in) project; you will need to visit the [joindin-api repo](https://github.com/joindin/joindin-api) and run the `patchdb.sh` script from there, followed by its *dbgen* utility to generate some data you can work with.

API Backend
-----------

In the `api` directory, run `composer install`.  This pulls in all the dependencies we'll need.

Your webroot is the `public` directory.

Web Frontend
------------

In the `web` directory, run `composer install`.

In `lib\ApiClient` there are hardcoded URLs which point to where your API is.

Your webroot is the `public` directory.

References
----------

Projects used in this example project to get me started really quickly:

 - [Slim Framework](http://www.slimframework.com/) is an excellent microframework from Josh Lockhart, also the author/curator of [PHP The Right Way](http://www.phptherightway.com/).
 - [PureCSS](http://purecss.io/) helped me to hide how useless I am with anything frontendish, this project also uses one of their example layouts.
 - [Guzzle](http://docs.guzzlephp.org/en/latest) is the API Client I used
 - [Pimple](http://pimple.sensiolabs.org/) is a super-simple dependency injection container that I used in the API backend.

Learning More
-------------

The best way to learn is by doing; this example project is a dumbed-down version of how the new [joind.in](http://m.joind.in) site actually works.  It's an open source project, so why don't you jump in and help?  More info for contributors (current or future!) [http://m.joind.in/about](http://m.joind.in/about)
