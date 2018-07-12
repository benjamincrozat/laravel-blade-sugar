[![Build Status](https://travis-ci.org/benjamincrozat/laravel-blade-sugar.svg?branch=master)](https://travis-ci.org/benjamincrozat/laravel-blade-sugar)
[![Latest Stable Version](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/v/stable)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)
[![License](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/license)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)
[![Total Downloads](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/downloads)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)

# Laravel Blade Sugar

Add sugar to Laravel Blade to keep your templates DRY and clean.

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

### @asset()

Renders an asset using the current URL scheme:

```php
<!-- Renders as <img src="http(s)://example.com/img/photo.jpg"> -->
<img src="@asset('img/photo.jpg')">
```

More in the official Laravel documentation: https://laravel.com/docs/5.4/helpers#method-asset

### @secureAsset()

Renders an asset using HTTPS:

```php
<!-- Renders as <img src="https://example.com/img/photo.jpg"> -->
<img src="@secureAsset('img/photo.jpg')">
```

More in the official Laravel documentation: https://laravel.com/docs/5.4/helpers#method-secure-asset

### @checked()

Automatically adds a `checked` attribute if your condition returns true.

```php
<input type="checkbox" @checked('something' === $value)>
```

### @gravatar()

Automatically displays a Gravatar from a given email address.

```php
<img src="@gravatar($email)">
```

### @markdown()

Displays Markdown.

```php
@markdown('**Hello, World!**')
```

### @route()

Just the `route()` helper wrapped in a Blade directive.

```php
<a href="@route('articles.index')">Blog</a>
<a href="@route('articles.show', $article->slug)">{{ $article->title }}</a>
<a href="@route('articles.show', ['slug' => $article->slug])">{{ $article->title }}</a>
```

### @selected()

Automatically adds a `selected` attribute if your condition returns true.

```php
<select name="status">
    <option value="draft" @selected($post->status == 'draft')>Draft</option>
    <option value="published" @selected($post->status == 'published')>Published</option>
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
