<?php

use App\Models\AnonymousConcern;

it('stores a concern without collecting a name or contact details', function () {
    $response = $this->post(route('anonymous-concerns.store'), [
        'topic' => 'Communication',
        'concern' => 'We need help having calmer conversations.',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('concern_success');
    expect(AnonymousConcern::count())->toBe(1);
    $this->assertDatabaseHas('anonymous_concerns', [
        'topic' => 'Communication',
        'concern' => 'We need help having calmer conversations.',
    ]);
});

it('requires concern details', function () {
    $response = $this->post(route('anonymous-concerns.store'), [
        'topic' => 'Communication',
    ]);

    $response->assertSessionHasErrors('concern');
    expect(AnonymousConcern::count())->toBe(0);
});
