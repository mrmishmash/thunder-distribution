<?php

namespace Drupal\Tests\thunder\FunctionalJavascript;

/**
 * Tests the image upload.
 *
 * @group Thunder
 */
class ImageUploadTest extends ThunderJavascriptTestBase {

  use ThunderMediaLibraryTestTrait;

  /**
   * Test upload of webp images in media library.
   *
   * @group NoUpdate
   */
  public function testWebpImageUpload(): void {
    $this->drupalGet('node/add/article');
    $this->assertWaitOnAjaxRequest();

    $this->openMediaLibrary('field-teaser-media');
    $this->uploadFile(__DIR__ . '/../../fixtures/reference.webp', TRUE);
    $this->submitMediaLibrary();
    $this->assertSession()->elementTextContains('css', '.media-library-item__name', 'reference.webp');
  }

}
