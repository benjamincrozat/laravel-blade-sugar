<?php

namespace BC\Laravel\BladeSugar\Tests;

use Illuminate\Database\Capsule\Manager as DB;

class Dummy extends \Illuminate\Database\Eloquent\Model {}

class ServiceProviderTest extends TestCase
{
    /** @test */
    public function it_can_check_a_checkbox() : void
    {
        $this->assertEquals(
            '<input type="checkbox" checked><input type="checkbox" >',
            $this->renderView('checked')
        );
    }

    /** @test */
    public function it_can_generate_a_csrf_field() : void
    {
        $this->assertContains(
            '<input type="hidden" name="_token" value="">',
            $this->renderView('csrf-field')
        );
    }

    /** @test */
    public function it_can_generate_a_csrf_token() : void
    {
        $this->assertEmpty($this->renderView('csrf-token'));
    }

    /** @test */
    public function it_can_display_a_gravatar_from_an_email() : void
    {
        $this->assertEquals(
            'https://www.gravatar.com/avatar/87706b2618c2761e396b21a2e2240e68?s=128&d=mm&r=pg',
            $this->renderView('gravatar')
        );
    }

    /** @test */
    public function it_can_render_markdown() : void
    {
        $this->assertEquals(
            '<p><strong>Hello, World!</strong></p>',
            $this->renderView('markdown')
        );
    }

    /** @test */
    public function it_can_generate_a_method_field() : void
    {
        $this->assertContains(
            '<input type="hidden" name="_method" value="PUT">',
            $this->renderView('method-field')
        );
    }

    /** @test */
    public function it_can_display_pagination_only_if_needed() : void
    {
        $db = new DB;
        $db->addConnection([
            'driver'    => 'sqlite',
            'database'  => ':memory:',
        ]);
        $db->bootEloquent();
        $db->setAsGlobal();

        DB::schema()->create('dummies', function ($table) {
            $table->increments('id');
            $table->timestamps();
        });

        foreach (range(0, 9) as $i) {
            Dummy::create();
        }

        $this->assertNotEmpty(
            $this->renderView('pagination-if-pages', [
                'dummies' => Dummy::paginate(5)
            ])
        );

        Dummy::get()->each->delete();

        $this->assertEmpty(
            $this->renderView('pagination-if-pages', [
                'dummies' => Dummy::paginate(5)
            ])
        );
    }

    /** @test */
    public function it_can_generate_urls_from_routes() : void
    {
        $this->expectException(\ErrorException::class);
        $this->expectExceptionMessageRegExp('/\[hello\.world\] not defined/');

        $this->renderView('route');
    }

    /** @test */
    public function it_can_select_an_option_in_a_select_element() : void
    {
        $this->assertEquals(
            '<select><option selected></option></select>',
            $this->renderView('selected')
        );
    }

    /** @test */
    public function it_can_generate_urls_from_storages() : void
    {
        $this->assertEquals(
            '/storage/path/to/some/file',
            $this->renderView('storage-url')
        );
    }

    /** @test */
    public function it_can_display_localized_text() : void
    {
        $this->assertEquals(
            'hello.world',
            $this->renderView('trans')
        );
    }

    /** @test */
    public function it_can_generate_urls() : void
    {
        $this->assertEquals(
            'http://localhost/hello-world',
            $this->renderView('url')
        );
    }

    /** @test */
    public function it_can_create_new_variables() : void
    {
        $this->assertEquals(
            'Hello, World!',
            $this->renderView('with')
        );
    }
}
