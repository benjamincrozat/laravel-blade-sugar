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

In your ```config/app.php```, add the service provider:

```php
'providers' => [

    BC\Laravel\BladeSugar\ServiceProvider::class,

],
```

## Available directives

### 1. @checked()

```php
<!-- This checkbox will be checked if the condition below returns true. -->
<input type="checkbox" @checked($value === 'something')>
```

### 2. @csrfField()

```php
<form>
    @csrfField()
</form>
```

### 3. @csrfToken()

```php
<form>
    <input type="hidden" name="_token" value="@csrfToken()">
</form>
```

### 4. @gravatar()

```php
<img src="@gravatar($email)">
```

### 5. @markdown()

```php
@markdown('**Hello, World!**')
```

### 6. @methodField()

```php
<form>
    @methodField('PUT')
</form>
```

### 7. @paginationIfPages()

This one will display a pagination only if needed.

So you do this:

```php
@paginationIfPages($articles)
```

Instead of this:

```php
@if ($articles->lastPage() > 1)
    {{ $articles->links() }}
@endif
```

### 8. @route()

```php
<a href="@route('articles.index')">Blog</a>
<a href="@route('articles.show', $article->slug)">{{ $article->title }}</a>
<a href="@route('articles.show', ['slug' => $article->slug])">{{ $article->title }}</a>
```

### 9. @selected()

```php
<select id="status" name="status">
    <option value="draft" @selected($article->status == 'draft')>Draft</option>
    <option value="published" @selected($article->status == 'published')>Published</option>
</select>
```

### 10. @storageUrl()

```php
<img src="@storageUrl($article->illustration)">
<img src="@storageUrl($article->illustration, 's3')">
```

### 11. @trans()

```php
<p>@trans('text.welcome')</p>
<p>@trans('text.welcome-name', ['name' => 'Homer Simpson'])</p>
```

### 12. @url()

```php
<a href="@url('user/profile')">Register</a>
<a href="@url('user/profile', [1])">Register</a>
```

### 13. @with()

You can now do this:

```php
@with('category', $article->category)
@with('user', $article->user)

by {{ $user->name }} in <a href="@route('article-categories.show', $category->slug)">{{ $category->name }}</a>
```

Instead of:

```php
by {{ $article->user->name }} in <a href="@route('article-categories.show', $article->category->slug)">{{ $article->category->name }}</a>

## License

[WTFPL](http://www.wtfpl.net/about/)
