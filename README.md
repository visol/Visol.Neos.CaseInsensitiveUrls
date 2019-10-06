# Case insensitive URLs in Neos

This is a Neos package that allows the usage of case insensitive URLs. As a consequence, the uriPathSegment `/foobar` can be accessed as

* `foobar`
* `FooBar`
* `fooBar`
* `FOOBAR`
* ...

## Compatibility and Maintenance

This package is currently being maintained for the following versions:

| Neos / Flow Version        | Version | Branch | Maintained |
|----------------------------|----------------------------------|--------|------------|
| Neos 3.x-5.x         | 4.x  | master | Yes        |
| Neos 3.x-4.x         | 3.x | 3.x    | No   |
| Neos 2.3 LTS | 2.x  | - | No         |


## Installation

Just add this package to your `composer.json` using

    composer require visol/neos-caseinsensitiveurls

and execute the node migration

    ./flow node:migrate --version 20151105104300 --confirmation TRUE

Warning: The node migration will convert all uriPathSegments to lowercase. This process cannot be reversed.

## Credits

This package was originally created and maintained by Swisscom Internet Solutions.

It is now maintained by visol digitale Dienstleistungen GmbH, www.visol.ch
