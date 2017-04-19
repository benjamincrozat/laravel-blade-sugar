<?php
$some_array = [
    'items' => [
        'Hello,',
        'World!',
    ],
];
?>

@with('items', $some_array['items'])

<?= implode(' ', $items); ?>