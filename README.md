# Case insensitive URLs in Neos

This is a Neos package that allows the usage of case-insensitive URLs. As a consequence, the uriPathSegment `/foobar` can be accessed as

* `foobar`
* `FooBar`
* `fooBar`
* `FOOBAR`
* ...

## Compatibility and Maintenance

This package is currently maintained for the following versions:

| Neos Version | Package Version | Branch | Maintained |
|--------------|-----------------|--------|------------|
| Neos 9.x     | 5.x             | main   | Yes        |
| Neos 3.x-8.x | 4.x             | 4.x    | Yes        |
| Neos 3.x-4.x | 3.x             | 3.x    | No         |
| Neos 2.3 LTS | 2.x             | -      | No         |

## Installation

Just add this package to your `composer.json` using

    composer require visol/neos-caseinsensitiveurls

and execute the node migration

    ./flow nodemigration:execute --version 20250403134604 --confirmation TRUE

Warning: The node migration will convert all uriPathSegments to lowercase. This process cannot be reversed.

## Credits

This package was originally created and maintained by Swisscom Internet Solutions.

It is now maintained by visol digitale Dienstleistungen GmbH, www.visol.ch
