# Case insensitive URLs in Neos

This is a Neos package that allows the usage of case insensitive URLs. A uriPathSegment `/foobar` can be accessed as

* `foobar`
* `FooBar`
* `fooBar`
* `FOOBAR`
* ...

## Installation

Just add this package in your `composer.json` using

    composer require swisscom/neos-caseinsensitiveurls

and execute the node migration

    ./flow node:migrate --version 20151105104300 --confirmation TRUE
