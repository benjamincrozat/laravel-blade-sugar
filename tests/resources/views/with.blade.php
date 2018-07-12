@with("foo", 'bar')
@with('bar', "foo")
@with('baz', $bar)
@with('something', strtoupper($bar))

{{ $foo }} {{ $bar }} {{ $baz }} {{ $something }}