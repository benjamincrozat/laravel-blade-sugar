[![Build Status](https://travis-ci.org/benjamincrozat/laravel-blade-sugar.svg?branch=master)](https://travis-ci.org/benjamincrozat/laravel-blade-sugar)
[![Latest Stable Version](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/v/stable)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)
[![License](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/license)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)
[![Total Downloads](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/downloads)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)

# Laravel Blade Sugar

Add syntactic sugar to your templates.

## Requirements

This package is tested to run on PHP 5.6+ and Laravel 5.1+. Note that on older Laravel versions, some directives can't be used (like `@mix`) since the associated helper didn't exist yet.

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

- [@action()](#action)
- [@asset()](#asset)
- [@secureAsset()](#secureasset)
- [@checked()](#checked)
- [@config()](#config)
- [@gravatar()](#gravatar)
- [@markdown()](#markdown)
- [@mix()](#mix)
- [@route()](#route)
- [@selected()](#selected)
- [@storageUrl()](#storageUrl)
- [@title()](#title)
- [@url()](#url)
- [@with()](#with)

### @action()

Generates an URL for a given controller action.

```php
<a href="@action('SomeController@someAction', ['someParameter' => 'someValue'])">Some Link</a>
```

More in the official Laravel documentation: https://laravel.com/docs/helpers#method-action

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

### @config()

Displays a config value.

```php
@config('foo.bar')
@config('foo.bar', 'Default value')
@config(['foo.bar' => 'Value'])
```

More in the official Laravel documentation: https://laravel.com/docs/helpers#method-config

### @checked()

Automatically adds a `checked` attribute if your condition returns true.

```php
<input type="radio" value="foo" @checked('foo' === $value)> <label>Choice #1</label>
<input type="radio" value="bar" @checked('bar' === $value)> <label>Choice #2</label>
<input type="radio" value="baz" @checked('baz' === $value)> <label>Choice #3</label>
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

Returns the path to a versioned Mix file.

```php
<link rel="stylesheet" src="@mix('/path/to/some/styles.css')">
```

More in the official Laravel documentation: https://laravel.com/docs/helpers#method-mix

### @route()

Generates a URL for the given named route.

```php
<a href="@route('posts.index')">Blog</a>
<a href="@route('posts.show', $post)">{{ $post->title }}</a>
<a href="@route('posts.show', $post, true)">{{ $post->title }}</a>
```

More in the official Laravel documentation: https://laravel.com/docs/helpers#method-route

### @selected()

Adds a `selected` attribute if your condition returns true.

```php
<select>
    <option value="draft" @selected('draft' === $post->status)>Draft</option>
    <option value="published" @selected('published' === $post->status)>Published</option>
</select>
```

### @storageUrl()

Generates a URL from any supported storage.

```php
<img src="@storageUrl($article->illustration)">
<img src="@storageUrl($article->illustration, 's3')">
```

### @title()

Generates a title tag depending on the arguments you pass.

```php
<!-- Generates `<title>My Page Title</title>` -->
@title('My Page Title')

<!-- Generates `<title>Default Title</title>` -->
@title(null, 'Default Title')
```

### @url()

Generates a fully qualified URL to the given path.

```php
<a href="@url('user/profile')">Register</a>
<a href="@url('user/profile', 'john-doe')">Register</a>
<a href="@url('some/other/route', [
    'foo' => 'bar',
    ...
])">Register</a>
```

More in the official Laravel documentation: https://laravel.com/docs/helpers#method-url

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
