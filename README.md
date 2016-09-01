[![Latest Stable Version](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/v/stable)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)
[![License](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/license)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)
[![Total Downloads](https://poser.pugx.org/benjamincrozat/laravel-blade-sugar/downloads)](https://packagist.org/packages/benjamincrozat/laravel-blade-sugar)

# Laravel Blade Sugar

Some useful sugar for your Laravel Blade templates to keep 'em DRY and clean.

## Usage

In your ```config/app.php```, add the service provider:

```php
'providers' => [

    BC\Laravel\BladeSugar\ServiceProvider::class,

],
```

## Available directives

### @csrfField()

```php
<form>
    @csrfField()
</form>
```

### @csrfToken()

```php
<form>
    <input type="hidden" name="_token" value="@csrfToken()">
</form>
```

### @gravatar()

```php
<img src="@gravatar($email)">
```

### @markdown()

```php
<article>
    <h1>{{ $title }}</h1>
    @markdown($content)
</article>
```

### @methodField()

```php
<form>
    @methodField('PUT')
</form>
```

### @route()

```php
<a href="@route('articles.index')">Blog</a>
<a href="@route('articles.show', $article->slug)">{{ $article->title }}</a>
<a href="@route('articles.show', ['slug' => $article->slug])">{{ $article->title }}</a>
```

### @selected()

```php
<select id="status" name="status">
    <option value="draft" @selected($article->status == 'draft')>Draft</option>
    <option value="visible" @selected($article->status == 'visible')>Visible</option>
</select>
```

### @trans()

```php
<p>@trans('text.welcome')</p>
<p>@trans('text.welcome-name', ['name' => 'Homer Simpson'])</p>
```

### @url()

```php
<a href="@url('user/profile')">Register</a>
<a href="@url('user/profile', [1])">Register</a>
```

### @with()

You can now do this:

```php
@with('category', $article->category)

by {{ $article->user->name }} in <a href="@route('article-categories.show', $category->slug)">{{ $category->name }}</a>
```

Instead of:

```php
by {{ $article->user->name }} in <a href="@route('article-categories.show', $article->category->slug)">{{ $article->category->name }}</a>
```

## License

[WTFPL](http://www.wtfpl.net/about/)
