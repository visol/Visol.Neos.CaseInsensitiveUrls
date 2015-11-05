# Case insensitive URLs in TYPO3 Neos

This is a TYPO3 Neos package that allows the usage of case insensitive URLs. A uriPathSegment `/foobar` can be accessed as

* `foobar`
* `FooBar`
* `fooBar`
* `FOOBAR`
* ...

## Installation

Just add this package in your `composer.json`
```
	...
	"repositories" : [
		{
			"type": "git",
			"url": "git://github.com/sinso/Swisscom.Neos.CaseInsensitiveUrls.git"
		}
	],
	"require" : {
		...
		"swisscom/neos-caseinsensitiveurls": "@dev",
		...
```
and execute the node migration
```
./flow node:migrate --version 20151105104300 --confirmation TRUE
```