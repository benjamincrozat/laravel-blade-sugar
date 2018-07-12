@with("foo", 'bar')
@with('bar', "foo")
@with('baz', $bar)
@with('something', strtoupper($bar))
@with('blah', implode('', [1, 2, 3]))

{{ $foo }} {{ $bar }} {{ $baz }} {{ $something }} {{ $blah }}