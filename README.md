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

Automatically adds a `checked` attribute if the condition returns true.

```php
<input type="checkbox" @checked($value === 'something')>
```

### @gravatar()

Automatically displays a Gravatar from a given email address.

```php
<img src="@gravatar($email)">
```

### @markdown()

Automatically parses Markdown.

```php
@markdown('**Hello, World!**')
```

### @pagination()

Display a paginator only if there is more than one page.

So you do this:

```php
@pagination($articles)
```

Instead of this:

```php
@if ($articles->hasMorePages())
    {{ $articles->links() }}
@endif
```

### @route()

Just the `route()` helper wrapped in a Blade directive.

```php
<a href="@route('articles.index')">Blog</a>
<a href="@route('articles.show', $article->slug)">{{ $article->title }}</a>
<a href="@route('articles.show', ['slug' => $article->slug])">{{ $article->title }}</a>
```

### @selected()

Automatically adds a `selected` attribute if the condition returns true.

```php
<select id="status" name="status">
    <option value="draft" @selected($article->status == 'draft')>Draft</option>
    <option value="published" @selected($article->status == 'published')>Published</option>
</select>
```

### @storageUrl()

Generates a URL from any supported storage.

```php
<img src="@storageUrl($article->illustration)">
<img src="@storageUrl($article->illustration, 's3')">
```

### @url()

Just the `url()` helper wrapped in a Blade directive.

```php
<a href="@url('user/profile')">Register</a>
<a href="@url('user/profile', 'john-doe')">Register</a>
<a href="@url('some/other/route', [
    'foo' => 'bar',
    ...
])">Register</a>
```

### @with()

You can now do this:

```php
@with('category', $article->category)
@with('username', $article->user->name)

by {{ $username }} in <a href="@route('article-categories.show', $category->slug)">{{ $category->name }}</a>
```

Instead of:

```php
by {{ $article->user->name }} in <a href="@route('article-categories.show', $article->category->slug)">{{ $article->category->name }}</a>
```

## License

[WTFPL](http://www.wtfpl.net/about/)
