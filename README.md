joomla-catcher
==============

Catcher is a bundle of plugins and a library for catching and debug Joomla! events.

## Installation

### Composer

Go to the root directory of your Joomla installation in command line and execute this command: 

```
composer require nooku/joomla-catcher:*
```

### Phing

For convenience, a [phing](http://www.phing.info/) script for building the package is also available under the `/scripts/build` folder of the repo.

After building it, the package may be installed using the Joomla! extension manager.

## Usage

After the package is installed, make sure to enable the plugins and configure them to catch and report events.
