<?php

class LaravelBladeSugarTest extends TestCase
{
    /** @test */
    public function it_generates_urls_from_actions()
    {
        // If the "action" helper throws an exception, that means our
        // directive works. No need to setup a bunch of routes.
        $this->expectException(ErrorException::class);
        $this->expectExceptionMessage('Action SomeController@someMethod not defined.');

        $this->renderView('action');
    }

    /** @test */
    public function it_renders_an_asset()
    {
        $this->assertEquals(
            'http://localhost/img/test.jpg',
            $this->renderView('asset')
        );
    }

    /** @test */
    public function it_renders_a_secure_asset()
    {
        $this->assertEquals(
            'http://localhost/img/test.jpg',
            $this->renderView('secure-asset')
        );
    }

    /** @test */
    public function it_checks_a_checkbox()
    {
        $this->assertEquals(
            '<input type="checkbox" checked><input type="checkbox" >',
            $this->renderView('checked')
        );
    }

    /** @test */
    public function it_displays_config_values()
    {
        config(['foo.bar' => 'Foo Bar']);

        $this->assertEquals(
            'Foo Bar',
            $this->renderView('config')
        );
    }

    /** @test */
    public function it_displays_a_gravatar_from_an_email()
    {
        $this->assertEquals(
            'https://www.gravatar.com/avatar/87706b2618c2761e396b21a2e2240e68?s=128&d=mm&r=pg',
            $this->renderView('gravatar')
        );
    }

    /** @test */
    public function it_renders_markdown()
    {
        $this->assertStringContainsString(
            '<p><strong>Hello, World!</strong></p>',
            $this->renderView('markdown')
        );
    }

    /** @test */
    public function it_returns_the_path_from_a_versionned_mix_file()
    {
        // The mix helper throws the exception,
        // that means our directive works. No
        // need to setup a real environment.
        $this->expectException(ErrorException::class);

        $this->assertEquals(
            '/path/to/some/styles.css',
            $this->renderView('mix')
        );
    }

    /** @test */
    public function it_retrieves_an_old_input_value_flashed_into_the_session()
    {
        if (app()->version() < 5.5) {
            $this->expectException(ErrorException::class);
            $this->expectExceptionMessage('Session store not set on request.');
        }

        $this->assertEquals(
            '',
            $this->renderView('old')
        );
    }

    /** @test */
    public function it_generates_urls_from_routes()
    {
        $this->expectException(ErrorException::class);
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
    public function it_generates_urls_from_storages()
    {
        $this->assertEquals(
            '/storage/path/to/some/file
/storage/path/to/some/file',
            $this->renderView('storage-url')
        );
    }

    /** @test */
    public function it_generates_a_title_tag()
    {
        $this->assertEquals(
            "<title>Some Title</title>\n<title>Default Value</title>",
            $this->renderView('title')
        );
    }

    /** @test */
    public function it_generates_urls()
    {
        $this->assertEquals(
            'http://localhost/hello-world',
            $this->renderView('url')
        );
    }

    /** @test */
    public function it_can_assign_new_variables()
    {
        $this->assertEquals(
            'bar foo foo FOO 123',
            $this->renderView('with')
        );
    }

    protected function renderView($name, array $parameters = [])
    {
        return view($name)->with($parameters)->render();
    }
}
