[![Build Status](https://travis-ci.org/benjamincrozat/laravel-blade-sugar.svg?branch=master)](https://travis-ci.org/benjamincrozat/laravel-blade-sugar)
[![Latest Stable Version](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/v/stable)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)
[![License](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/license)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)
[![Total Downloads](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/downloads)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)

# Laravel Blade Sugar

Add syntaxic sugar to Laravel Blade to keep your templates DRY and clean.

## Requirements

This package is tested to run on PHP 5.6+ and Laravel 5.4+.

## Installation

```php
composer require benjamincrozat/laravel-blade-sugar
```

## Usage

If you're on Laravel 5.4 or older, add the service provider in your ```config/app.php``` file:

```php
'providers' => [

    BC\Laravel\BladeSugar\ServiceProvider::class,

],
```

## Available directives

- [@asset()](#asset)
- [@secureAsset()](#secureasset)
- [@checked()](#checked)
- [@gravatar()](#gravatar)
- [@markdown()](#markdown)
- [@mix()](#mix)
- [@route()](#route)
- [@selected()](#selected)
- [@storageUrl()](#storageUrl)
- [@url()](#url)
- [@with()](#with)

### @asset()

Renders an asset using the current URL scheme:

```php
<img src="@asset('img/photo.jpg')">
```

More in the official Laravel documentation: https://laravel.com/docs/helpers#method-asset

### @secureAsset()

Renders an asset using HTTPS:

```php
<img src="@secureAsset('img/photo.jpg')">
```

More in the official Laravel documentation: https://laravel.com/docs/helpers#method-secure-asset

### @checked()

Automatically adds a `checked` attribute if your condition returns true.

```php
<input type="radio" @checked('something' === $value)> <label>Choice #1</label>
<input type="radio" @checked('something' === $value)> <label>Choice #2</label>
<input type="radio" @checked('something' === $value)> <label>Choice #3</label>
```

### @gravatar()

Automatically displays a Gravatar from a given email address.

```php
<img src="@gravatar('homer@simpson.com')">
```

### @markdown()

Renders Markdown using [Parsedown](https://github.com/erusev/parsedown), which is built in Laravel.

```php
@markdown('**Hello, World!**')
```

### @mix()

Echos out the path to your Laravel Mix generated asset.

```php
<link rel="stylesheet" src="@mix('/path/to/some/styles.css')">
```

### @route()

The `route()` helper wrapped in a Blade directive.

```php
<a href="@route('posts.index')">Blog</a>
<a href="@route('posts.show', $post)">{{ $post->title }}</a>
<a href="@route('posts.show', $post, true)">{{ $post->title }}</a>
```

### @selected()

Adds a `selected` attribute if your condition returns true.

```php
<select>
    <option value="draft" @selected($post->status === 'draft')>Draft</option>
    <option value="published" @selected($post->status === 'published')>Published</option>
</select>
```

### @storageUrl()

Generates a URL from any supported storage.

```php
<img src="@storageUrl($article->illustration)">
<img src="@storageUrl($article->illustration, 's3')">
```

### @url()

The `url()` helper wrapped in a Blade directive.

```php
<a href="@url('user/profile')">Register</a>
<a href="@url('user/profile', 'john-doe')">Register</a>
<a href="@url('some/other/route', [
    'foo' => 'bar',
    ...
])">Register</a>
```

### @with()

This directive let you assign new variables inside your Blade template.

```php
@with('foo', 'bar')

{{ $foo }}
```

Instead of:

```php
<?php $foo = 'bar'; ?>

{{ $foo }}
```

## License

[WTFPL](http://www.wtfpl.net/about/)
