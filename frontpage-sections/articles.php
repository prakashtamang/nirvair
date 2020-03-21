<?php
/**
 * Article Section
 *
 * @package nirvair
 */

$hide_article_section = get_theme_mod( 'hide_article_section' );
$article_title = get_theme_mod( 'article_title' );
$article_subtitle = get_theme_mod( 'article_subtitle' );
$article_enable_background = get_theme_mod( 'article_enable_background' );
?>
<!-- Blog -->
<section class="content-section 
<?php 
  if ( $hide_article_section == 1 ) :
    echo 'nirvair_hide_section ';
  endif;

  if ( $article_enable_background == 1 ) :
    echo 'bg-light ';
  endif;
?>" id="blog">
<div class="container">
  <div class="row mb-5">
    <div class="col-12 text-center">
      <h2 class="section-heading mb-3 to-animate">Article</h2>
      <p class="section-subheading to-animate">Its hard to stay ahead of the game. I take every tasks seriously. Things I do flawlessly.</p>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-4">
      <article class="blog-post-wrapper p-1 mb-5 to-animate">
        <div class="figure">
          <div class="post-thumbnail">
          <a href="#">
          <img width="800" height="600" src="https://sketchthemes.com/samples/xperson-personal-portfolio-demo/wp-content/uploads/sites/98/2016/05/xperson-blog-1-800x600.jpg" class="img-fluid" alt=""> </a>
          </div>
          <i class="fa fa-file-photo-o"></i> 
        </div>
      
        <header class="entry-header px-2">
          <div class="post-meta mb-2">
            <span class="the-category">
              <a href="#" rel="category tag">Post Format</a>, <a href="#" rel="category tag">Uncategorized</a> 
            </span>
          </div>
        
          <h2 class="entry-title"><a href="#" rel="">Link:Post Format: Standard</a></h2>
          <hr>
          <div class="entry-meta">
            <ul class="list-inline">
              <li class="list-inline-item">
                <span class="the-author"><i class="fas fa-user"></i> <a href="#" title="Posts by gunjan" rel="author">Nirvair</a></span>
              </li>
              <li class="list-inline-item">
                <span class="the-time"> <i class="far fa-calendar-alt"></i>
                  <a href="#" title="Archive for May 2016">May</a> 
                  <a href="#" title="Archive for May 13, 2016">13</a>, 
                  <a href="#" title="Archive for 2016">2016</a> 
                </span>
              </li>
              <li class="list-inline-item">
                <span class="the-comments"> <i class="far fa-comments"></i> 0 </span>
              </li>
            </ul>
          </div>
        </header>
      </article>
    </div>
    <div class="col-md-4">
      <article class="blog-post-wrapper p-1 mb-5 to-animate">
        <div class="figure">
          <div class="post-thumbnail">
          <a href="#">
          <img width="800" height="600" src="https://sketchthemes.com/samples/xperson-personal-portfolio-demo/wp-content/uploads/sites/98/2016/05/xperson-blog-1-800x600.jpg" class="img-fluid" alt=""> </a>
          </div>
          <i class="fa fa-file-photo-o"></i> 
        </div>
      
        <header class="entry-header px-2">
          <div class="post-meta mb-2">
            <span class="the-category">
              <a href="#" rel="category tag">Post Format</a>, <a href="#" rel="category tag">Uncategorized</a> 
            </span>
          </div>
        
          <h2 class="entry-title"><a href="#" rel="">Link:Post Format: Standard</a></h2>
          <hr>
          <div class="entry-meta">
            <ul class="list-inline">
              <li class="list-inline-item">
                <span class="the-author"><i class="fas fa-user"></i> <a href="#" title="Posts by gunjan" rel="author">Nirvair</a></span>
              </li>
              <li class="list-inline-item">
                <span class="the-time"> <i class="far fa-calendar-alt"></i>
                  <a href="#" title="Archive for May 2016">May</a> 
                  <a href="#" title="Archive for May 13, 2016">13</a>, 
                  <a href="#" title="Archive for 2016">2016</a> 
                </span>
              </li>
              <li class="list-inline-item">
                <span class="the-comments"> <i class="far fa-comments"></i> 0 </span>
              </li>
            </ul>
          </div>
        </header>
      </article>
    </div>
    <div class="col-md-4">
      <article class="blog-post-wrapper p-1 mb-5 to-animate">
        <div class="figure">
          <div class="post-thumbnail">
          <a href="#">
          <img width="800" height="600" src="https://sketchthemes.com/samples/xperson-personal-portfolio-demo/wp-content/uploads/sites/98/2016/05/xperson-blog-1-800x600.jpg" class="img-fluid" alt=""> </a>
          </div>
        </div>
      
        <header class="entry-header px-2">
          <div class="post-meta mb-2">
            <span class="the-category">
              <a href="#" rel="category tag">Post Format</a>, <a href="#" rel="category tag">Uncategorized</a> 
            </span>
          </div>
        
          <h2 class="entry-title"><a href="#" rel="">Link:Post Format: Standard</a></h2>
          <hr>
          <div class="entry-meta">
            <ul class="list-inline">
              <li class="list-inline-item">
                <span class="the-author"><i class="fas fa-user"></i> <a href="#" title="Posts by gunjan" rel="author">Nirvair</a></span>
              </li>
              <li class="list-inline-item">
                <span class="the-time"> <i class="far fa-calendar-alt"></i>
                  <a href="#" title="Archive for May 2016">May</a> 
                  <a href="#" title="Archive for May 13, 2016">13</a>, 
                  <a href="#" title="Archive for 2016">2016</a> 
                </span>
              </li>
              <li class="list-inline-item">
                <span class="the-comments"> <i class="far fa-comments"></i> 0 </span>
              </li>
            </ul>
          </div>
        </header>
      </article>
    </div>
  </div>

  <div class="row">
    <div class="blog-more text-center mt-2 mx-auto">
      <a href="#" class="btn btn-primary">View More</a>
    </div>
  </div>
</div>
</section>