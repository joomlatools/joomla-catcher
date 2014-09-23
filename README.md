joomla-catcher
==============

Catcher is a bundle of plugins and a library for catching and debug Joomla! events.

## Installation

### Composer

You can install this package using [Composer](https://getcomposer.org/). Create a `composer.json` file inside the root directory of your Joomla! site containing the following code:

```
{
    "require": {        
        "nooku/pkg_catcher": "dev-master"
    },
    "minimum-stability": "dev"
}
```

Run composer install.

### Phing

For convenience, a [phing](http://www.phing.info/) script for building the package is also available under the `/scripts/build` folder of the repo.

After building it, the package may be installed using the Joomla! extension manager.

## Usage

After the package is installed, make sure to enable the plugins and configure them to catch and report events.
