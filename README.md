# CSS Lightbox

CSS Lightbox is a photo gallery with a "lightbox" feature, completely
written in only HTML and CSS.  It is blindlingly fast because there
is no javascript executed - it's all done with CSS!

**Demo:** [http://kjellpost.com/git/lightbox/lightbox.html]



| ![lightbox-1.png](http://kjellpost.com/git/lightbox/lightbox-1.png) | 
|:--:| 
| *Gallery view* |

| ![lightbox-2.png](http://kjellpost.com/git/lightbox/lightbox-2.png) | 
|:--:| 
| *Lightbox view* |


# Overview

CSS Lightbox initially displays a gallery view of `img` elements: these can
have various aspect ratios and are laid out in a grid using a CSS flexbox so 
that the page is completely responsive.

The height of each grid image is determined by the variable
`--gallery-img-size` in `lightbox.css`.  (There are many other
variables in that CSS file that you can modify to determine the look and
feel of the gallery and its lightbox.)

Each gallery item in `lightbox.html` is represented as, e.g.,

```
<li class="gallery-item">
  <figure class="photo">
    <a class="link" href="#lightbox-item-42">
      <img class="thumb" src="http://example.com/image.jpg" />
      <figcaption class="caption">Lorem ipsum dolor sit amet</figcaption>
    </a>
  </figure>
</li>
```
Further down in the HTML there is a corresponding lightbox for that
same image:
```
<div class="lightbox" id="lightbox-item-42">
  <a href="#!" class="link lightbox-content">
    <img class="lightbox-img" src="http://example.com/image.jpg" />
  </a>
  <h3 class="lightbox-caption">Lorem ipsum dolor sit amet</h3>
  <a href="#lightbox-item-41" class="link btn-prev">&lt;</a>
  <a href="#lightbox-item-43" class="link btn-next">&gt;</a>
</div>
```
The lightbox element is displayed large when the gallery item is clicked on.
Click on lightbox element and you return to the gallery view.
The lightbox is also responsive and respects the image's aspect ratio.

Each lightbox element is identified by an `id`, e.g., `lightbox-item-42` above.
The lightbox element features navigation arrows to go the previous and next
image: it is your responsibility to make sure the links go to the previous
and next image and you can decide whether the lightbox should wrap around or
stay on the first/last image.

You can have different captions for the gallery and the lightbox item
and also different `img`-elements, if you prefer. The benefit of using the
same `img` `src` is that the lightbox appears instantenously and makes for
a snappier experience.  The drawback is that it takes longer time to load
the gallery.  If you use thumbnail versions for the gallery, they load faster
but then the user may have to wait a little for the lightbox image to load.

# Details

The CSS file `lightbox.css` contains a set of variables in the `:root`
rule that dictates the look and feel of the gallery and lightbox.

First, for the gallery:

- `--gallery-img-size` determines the height of the thumbnails in the gallery.
- `--gallery-bg-color` is the background colour for the gallery.  This can be,
e.g., `#black` for a black background or `rgba(0, 0, 0, 0)` if you want it to
be completely transparent, for instance if you a separate background colour
for your HTML body.
- `--gallery-font-family` is the font family used for the gallery captions.
- `--gallery-font-weight` is the font weight for the gallery captions.
- `--gallery-font-size` is the font size for the gallery captions.  This can
be, e.g., `2em` or you can have something responsive as I do in the example with
a `clamp` setting.
- `--gallery-text-color` is the font color for the captions.
- `--gallery-text-transform` is currently set to `uppercase` but can be removed
if you don't want it.
- `--gallery-caption-height` is probably not necessary but if you mix, e.g.,
Latin characters with Chinese characters the captions will have different
heights which looks... well, not so good.

Then for the lightbox:

- `--lightbox-font-family` is the font family for the ligthbox caption.
- `--lightbox-font-weight` is the font weight for the lightbox caption.
- `--lightbox-font-size` is the font size for the lightbox caption.
- `--lightbox-bg-color` is the background colour for the lightbox itself.
- `--lightbox-caption-bg-color` is the background colour for the lightbox caption.
- `--lightbox-caption-text-color` is the text color for the lightbox caption.
- `--lightbox-text-transform` is the text transform for the lightbox caption.
- `--lightbox-letter-spacing` is currently set to 1px which makes the caption look a little bit better.
- `--lightroom-z-index` is the lightbox's z-index.  A value of 10 would probably
suffice but if you have, e.g., a sticky header and you don't want that to show,
then 99999 would probably trump that.
- `--lightbox-cover` tells the browser how large the lightbox image should be.
This is a matter of taste but something between 95-100% should work.
- `--lightbox-fudge: 10em` gives some space around the lighbox.

There are of course other CSS rules you can play with but the above are the
important ones.

# Lots of images?

Entering HTML code for a bunch of images can be tedious so it is easier
to let a PHP script generate the HTML code for you, based on a list of images.

A sample program, `lightbox.php` is provided in this repository.  It uses
two arrays, `$imgs` and `$captions`, to list the image addresses and their
captions, respectively.  There is also a boolean flag `$wraparound` which
determines if the previous/next buttons should wrap around or stay when
the users clicks previous on the first image, or next on the last image.

# Credits

This project is loosely based on Kevin Powell's CSS lightbox project
[https://www.youtube.com/watch?v=6j5q-hP8sfk]
where I discovered the `:target` pseudo class.

