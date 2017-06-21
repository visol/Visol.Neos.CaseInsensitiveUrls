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

## Optional redirection to the lower case URI to prevent duplicated content on search engines

If the URL has caps, redirect (301) to the lowercase variant. That tells Google that we have only one valid URL and with this, no duplicated content.

Declare a the tolower function "lc" (has to be within the server- or vhost-config.
```
RewriteMap lc int:tolower
```

The redirection code. Can be within the .htaccess, or server- / vhost-config.
Does use the function defined above "lc".
```
# Redirect "301 moved permanently" to the lower case url,
if the url has caps (normalize Url).
# ---------------------------------------------------------------
RewriteCond %{REQUEST_URI} [A-Z]
RewriteRule (.*) ${lc:$1} [R=301,L]
```

Source: http://stackoverflow.com/questions/2923658/convert-to-lowercase-in-a-mod-rewrite-rule
