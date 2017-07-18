# Aist Queue [![SensioLabsInsight](https://insight.sensiolabs.com/projects/0268f676-1c96-4d1c-bd0d-d59b120d3286/small.png)](https://insight.sensiolabs.com/projects/0268f676-1c96-4d1c-bd0d-d59b120d3286)

[![build status][build image]][build]
[![coverage status][coverage image]][coverage]
[![code climate][Code Climate image]][Code Climate]
[![scrutinizer][Scrutinizer image]][Scrutinizer]
[![check][SensioLabsInsight image]][SensioLabsInsight]
[![packagist][Packagist image]][Packagist]

![requirements][dependencies image]
[![issues][issues image]][issues]
[![pull requests][pull requests image]][pull requests]

[![Minimum PHP Version][Minimum PHP Version image]][PHP]
[![license][license image]][license]

*container-interop queue.*

## Installation
Install via composer:
```console
$ composer require aist/queue
```
> ###### zf-component-installer
>
> If you use [zf-component-installer](https://github.com/zendframework/zf-component-installer),
> that component will install itself as a module for you.

## Usage
```console
$ vendor/bin/console queue:worker:start <queue name>
```

  [build image]: https://img.shields.io/travis/ma-si/queue/master.svg?style=flat-square
  [build]: https://secure.travis-ci.org/ma-si/queue
  [coverage image]: https://img.shields.io/coveralls/ma-si/queue.svg?style=flat-square
  [coverage]: https://coveralls.io/r/ma-si/queue?branch=master
  
  [Code Climate image]: https://img.shields.io/codeclimate/github/ma-si/queue.svg?style=flat-square
  [Code Climate]: https://codeclimate.com/github/ma-si/queue
  [Scrutinizer image]: https://img.shields.io/scrutinizer/g/ma-si/queue.svg?style=flat-square
  [Scrutinizer]: https://scrutinizer-ci.com/g/ma-si/queue
  
  [SensioLabsInsight image]: https://img.shields.io/sensiolabs/i/0268f676-1c96-4d1c-bd0d-d59b120d3286.svg?style=flat-square
  [SensioLabsInsight]: https://insight.sensiolabs.com/projects/0268f676-1c96-4d1c-bd0d-d59b120d3286
  
  [Packagist image]: https://img.shields.io/packagist/v/aist/queue.svg?style=flat-square
  [Packagist]: https://packagist.org/packages/aist/queue

  [dependencies image]: https://img.shields.io/requires/github/ma-si/queue.svg?style=flat-square
  [issues image]: https://img.shields.io/github/issues/ma-si/queue.svg?style=flat-square
  [issues]: https://github.com/ma-si/queue/issues
  [pull requests image]: https://img.shields.io/github/issues-pr/ma-si/queue.svg?style=flat-square
  [pull requests]: https://github.com/ma-si/queue/pulls
  
  [Minimum PHP Version image]: https://img.shields.io/badge/php-%3E%3D%207.0-8892BF.svg?style=flat-square
  [PHP]: https://php.net
  [license image]: https://poser.pugx.org/aist/queue/license?format=flat-square
  [license]: https://opensource.org/licenses/BSD-3-Clause
