<?php

namespace Tests\Feature;

use App\Models\Photo;
use Database\Seeders\PhotoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PhotoGalleryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PhotoSeeder::class);
    }

    public function test_gallery_index_page_displays_photos(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Lensa Alam');
        $response->assertSee('Matahari Terbit di Kaldera Bromo');
    }

    public function test_gallery_detail_page_displays_photo_details(): void
    {
        $photo = Photo::first();

        $response = $this->get(route('photos.show', $photo->id));

        $response->assertStatus(200);
        $response->assertSee($photo->title);
        $response->assertSee($photo->photographer);
        $response->assertSee($photo->location);
        $response->assertSee($photo->category);
    }

    public function test_gallery_filter_by_category(): void
    {
        $response = $this->get('/?category=Satwa+Liar');

        $response->assertStatus(200);
        $response->assertSee('Sang Predator Purba Komodo');
    }

    public function test_gallery_search_functionality(): void
    {
        $response = $this->get('/?search=Bromo');

        $response->assertStatus(200);
        $response->assertSee('Matahari Terbit di Kaldera Bromo');
    }

    public function test_about_page_is_accessible(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('Lensa Alam Indonesia');
        $response->assertSee('Galeri Fotografi Alam');
    }

    public function test_photo_images_exist_in_public_assets_images_folder(): void
    {
        $photos = Photo::all();

        $this->assertGreaterThan(0, $photos->count());

        foreach ($photos as $photo) {
            $path = public_path('assets/images/' . $photo->image);
            $this->assertFileExists($path, "Image {$photo->image} not found in public/assets/images/");
        }
    }
}

