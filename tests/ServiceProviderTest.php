<?php

namespace BC\Laravel\BladeSugar\Tests;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Capsule\Manager as DB;

class ServiceProviderTest extends TestCase
{
    /** @test */
    public function it_can_render_an_asset()
    {
        $this->assertEquals(
            'http://localhost/img/test.jpg',
            $this->renderView('asset')
        );
    }

    /** @test */
    public function it_can_render_a_secure_asset()
    {
        $this->assertEquals(
            'http://localhost/img/test.jpg',
            $this->renderView('secure-asset')
        );
    }

    /** @test */
    public function it_can_check_a_checkbox()
    {
        $this->assertEquals(
            '<input type="checkbox" checked><input type="checkbox" >',
            $this->renderView('checked')
        );
    }

    /** @test */
    public function it_can_generate_a_csrf_field()
    {
        $this->assertContains(
            '<input type="hidden" name="_token" value="">',
            $this->renderView('csrf-field')
        );
    }

    /** @test */
    public function it_can_generate_a_csrf_token()
    {
        $this->assertEmpty($this->renderView('csrf-token'));
    }

    /** @test */
    public function it_can_display_a_gravatar_from_an_email()
    {
        $this->assertEquals(
            'https://www.gravatar.com/avatar/87706b2618c2761e396b21a2e2240e68?s=128&d=mm&r=pg',
            $this->renderView('gravatar')
        );
    }

    /** @test */
    public function it_can_render_markdown()
    {
        $this->assertEquals(
            '<p><strong>Hello, World!</strong></p>',
            $this->renderView('markdown')
        );
    }

    /** @test */
    public function it_can_generate_a_method_field()
    {
        $this->assertContains(
            '<input type="hidden" name="_method" value="PUT">',
            $this->renderView('method-field')
        );
    }

    /** @test */
    public function it_can_display_pagination_only_if_needed()
    {
        $this->assertNotEmpty(
            $this->renderView('pagination', [
                'dummies' => new Paginator([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 5)
            ])
        );

        $this->assertEmpty(
            $this->renderView('pagination', [
                'dummies' => new Paginator([], 5)
            ])
        );
    }

    /** @test */
    public function it_can_generate_urls_from_routes()
    {
        $this->expectException(\ErrorException::class);
        $this->expectExceptionMessageRegExp('/\[hello\.world\] not defined/');

        $this->renderView('route');
    }

    /** @test */
    public function it_can_select_an_option_in_a_select_element()
    {
        $this->assertEquals(
            '<select><option selected></option></select>',
            $this->renderView('selected')
        );
    }

    /** @test */
    public function it_can_generate_urls_from_storages()
    {
        $this->assertEquals(
            '/storage/path/to/some/file',
            $this->renderView('storage-url')
        );
    }

    /** @test */
    public function it_can_display_localized_text()
    {
        $this->assertEquals(
            'hello.world',
            $this->renderView('trans')
        );
    }

    /** @test */
    public function it_can_generate_urls()
    {
        $this->assertEquals(
            'http://localhost/hello-world',
            $this->renderView('url')
        );
    }

    /** @test */
    public function it_can_create_new_variables()
    {
        $this->assertEquals(
            'Hello, World!',
            $this->renderView('with')
        );
    }
}
