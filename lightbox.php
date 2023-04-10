<?php

$wraparound = False;            // set to True if you want previous/next buttons to wrap around

$imgs = [                       // gallery images
    "https://fastly.picsum.photos/id/1043/3000/2000.jpg?hmac=Vcpoh3Xl9mRhUacVUVOyCTdpjqvZL0gmU8SBAHUn0UI",
    "https://fastly.picsum.photos/id/20/3000/2000.jpg?hmac=qPrwau0LnTpOPge6IYfbNmgEr-6Vo7sFAsUUDc4Nzpw",
    "https://fastly.picsum.photos/id/814/2000/3000.jpg?hmac=JkBnxHoKlUe_i4RFs-nsLyeGItxFR1lYJ7kHO8Qi9js",
    "https://fastly.picsum.photos/id/584/3000/2000.jpg?hmac=MLNMGLIa00xrwd5laqwf6PhAbMdxFWSwivHoovNu-9o",
    "https://fastly.picsum.photos/id/371/3000/2000.jpg?hmac=90q7TEDkslITkQ8YzOilfUhpM7D54AVHe7QnEX2Ki-4",
    "https://fastly.picsum.photos/id/364/2000/3000.jpg?hmac=CzGV9qgd71ra52htPcDg_wpb4vycbSC90PRvvIlYHXQ"
];

$captions = [                   // gallery captions
    "Lorem ipsum dolor sit amet",
    "Ea quae similque",
    "Cum odit dignissimos",
    "Sit nihil enim",
    "A inventore enim",
    "Et totam suscipit",
];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="lightbox.css">
  </head>

  <body>

    <!-- GALLERY -->

    <div class="gallery">
      <ul class="gallery-main">

        <?php
          foreach ($imgs as $i => $img) {
              echo "<li class='gallery-item'>\n";
              echo " <figure class='photo'>\n";
              echo "  <a class='link' href='#lightbox-item-{$i}'>\n";
              echo "   <img class='thumb' src='{$img}' />\n";
              echo "   <figcaption class='caption'>" . $captions[$i] . "</figcaption>\n";
              echo "  </a>\n";
              echo " </figure>\n";
              echo "</li>\n";
          }
        ?>

      </ul>

      <!-- LIGHTBOX -->

      <?php 
        foreach ($imgs as $i => $img) {
            if ($wraparound) {
                $prev = ($i - 1 + count($imgs)) % count($imgs);
                $next = ($i + 1) % count($imgs);
            } else {
                $prev = max(0, $i - 1);
                $next = min(count($imgs) - 1, $i + 1);
            }
            echo "<div class='lightbox' id='lightbox-item-{$i}'>\n";
            echo " <a href='#!' class='link lightbox-content'>\n";
            echo "  <img class='lightbox-img' src='{$img}' />\n";
            echo " </a>\n";
            echo " <h3 class='lightbox-caption'>" . $captions[$i] . "</h3>\n";
            echo " <a href='#lightbox-item-{$prev}' class='link btn-prev'>&lt;</a>\n";
            echo " <a href='#lightbox-item-{$next}' class='link btn-next'>&gt;</a>\n";
            echo "</div>\n";
        }
      ?>

    </div>
  </body>
</html>
