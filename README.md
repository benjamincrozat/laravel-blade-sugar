[![Build Status](https://travis-ci.org/benjamincrozat/laravel-blade-sugar.svg?branch=master)](https://travis-ci.org/benjamincrozat/laravel-blade-sugar)
[![Latest Stable Version](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/v/stable)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)
[![License](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/license)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)
[![Total Downloads](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/downloads)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)

# Laravel Blade Sugar

Add syntactic sugar to your templates.

## Installation

```php
composer require benjamincrozat/laravel-blade-sugar
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
- [@old()](#old)
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
<script src="@mix('/path/to/some/script.js')"></script>
```

More in the official Laravel documentation: https://laravel.com/docs/helpers#method-mix

### @old()

Retrieves an old input value flashed into the session:

```php
<input type="text" name="foo" value="@old('foo')">
```

More in the official Laravel documentation: https://laravel.com/docs/helpers#method-old

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
<img src="@storageUrl($post->illustration)">
<img src="@storageUrl($post->illustration, 's3')">
```

### @title()

Generates a title tag.

```php
@title('My Page Title')
@title($optional_title, 'Fallback Title')
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
@php $foo = 'bar'; @endphp

{{ $foo }}
```

## License

[WTFPL](http://www.wtfpl.net/about/)
