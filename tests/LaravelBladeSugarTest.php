<?php

class LaravelBladeSugarTest extends TestCase
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
    public function it_has_a_directive_for_the_mix_helper()
    {
        // The mix helper throws the error, that means our directive works.
        $this->expectException(ErrorException::class);

        $this->assertEquals(
            '/path/to/some/styles.css',
            $this->renderView('mix')
        );
    }

    /** @test */
    public function it_can_generate_urls_from_routes()
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
    public function it_can_generate_urls_from_storages()
    {
        $this->assertEquals(
            '/storage/path/to/some/file',
            $this->renderView('storage-url')
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
    public function it_can_assign_new_variables()
    {
        $this->assertEquals(
            'bar foo foo FOO 123',
            $this->renderView('with')
        );
    }

    public function renderView($name, array $parameters = [])
    {
        return view($name)->with($parameters)->render();
    }
}
