<?php
/*
* Template Name: Gallery
*/
get_header(); ?>

<main class="container page section">
    <!-- the wordpress loop -->
    <!-- the_post() function will have the information in the wordpress posts -->
  <?php  while (have_posts()): the_post(); ?>

    <?php
        //wordpress function that will retrieve the gallery
        // args are postID and boolean if you want to display the gallery
        //get_the_ID() function returns id of the gallery
        $gallery = get_post_gallery(get_the_ID(), false);

        $gallery_images_ids = explode(',', $gallery['ids']);

        ?>

        <ul class="gallery-images">
          <?php
            //image counter that counts the image so we know what image we are on
            $i = 1;

            foreach ($gallery_images_ids as $id):
              //changing size based on image counter
              $size = ($i === 3 || $i === 6) ? 'portrait' : 'square';

              // args wp_get_attachment_image_sizes($attachment_id, $size, $image_meta);
              //passing $id foreach image into this function to retrive src of the image
              //image the user clicks on
              $imageThumb = wp_get_attachment_image_src($id, $size);

              //bigger image that pops up when the user clicks on $imageThumb
              $image = wp_get_attachment_image_src($id, 'large');

          ?>
          <li>
              <!-- anchor tags for lightbox to work -->
              <a href="<?php echo $image[0]; ?>" data-lightbox="gallery">
              <img src="<?php echo $imageThumb[0]; ?>" id="<?php echo $id; ?>"/>
            </a>
          </li>


           <?php ++$i; endforeach; ?>

          ?>
        </ul>
    ?>

    <!-- Recommended to use endwhile rather than brackets -->
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
