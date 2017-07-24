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

Automatically adds a `checked` attribute if the condition returns true.

```php
<input type="checkbox" @checked($value === 'something')>
```

### 2. @csrfField()

Adds a hidden CSRF field.

```php
<form>
    @csrfField()
</form>
```

### 3. @csrfToken()

Sometimes, it can be useful to only get the CSRF Token. So here is a Blade directive for that.

```php
<form>
    <input type="hidden" name="_token" value="@csrfToken()">
</form>
```

### 4. @gravatar()

Automatically displays a Gravatar from a given email address.

```php
<img src="@gravatar($email)">
```

### 5. @markdown()

Automatically parses Markdown.

```php
@markdown('**Hello, World!**')
```

### 6. @methodField()

Adds a hidden method field.

```php
<form>
    @methodField('PUT')
</form>
```

### 7. @paginationIfPages()

Displays pagination only if needed. (It only works with `paginate()`, not `simplePaginate()`, yet.)

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

Just the `route()` helper wrapped in a Blade directive.

```php
<a href="@route('articles.index')">Blog</a>
<a href="@route('articles.show', $article->slug)">{{ $article->title }}</a>
<a href="@route('articles.show', ['slug' => $article->slug])">{{ $article->title }}</a>
```

### 9. @selected()

Automatically adds a `selected` attribute if the condition returns true.

```php
<select id="status" name="status">
    <option value="draft" @selected($article->status == 'draft')>Draft</option>
    <option value="published" @selected($article->status == 'published')>Published</option>
</select>
```

### 10. @storageUrl()

Generates a URL from any supported storage.

```php
<img src="@storageUrl($article->illustration)">
<img src="@storageUrl($article->illustration, 's3')">
```

### 11. @trans()

**This directive is not useful anymore. Since Laravel 5.2, you can just use the `@lang()` Blade directive.**

Just the `trans()` helper wrapped in a Blade directive.

```php
<p>@trans('text.welcome')</p>
<p>@trans('text.welcome-name', ['name' => 'Homer Simpson'])</p>
```

### 12. @url()

Just the `url()` helper wrapped in a Blade directive.

```php
<a href="@url('user/profile')">Register</a>
<a href="@url('user/profile', 'john-doe')">Register</a>
<a href="@url('some/other/route', [
    'foo' => 'bar',
    ...
])">Register</a>
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
```

## License

[WTFPL](http://www.wtfpl.net/about/)
