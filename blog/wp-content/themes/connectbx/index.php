
<?php get_header(); ?>

<?php if(have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>
    <article>
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

      <p>
        <?php the_time('j M Y'); ?> |
        de <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> |

        catégorie

        <?php
        $categories = get_the_category();
        $separator = " ";
        $output = "";

        if ($categories)
        {
          foreach ($categories as $category) {
            $output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name . $separator.'</a>';
          }

          echo $output;
        }

        ?>

      </p>

      <p>
        <?php echo get_the_excerpt(); ?><br/>
        <a href="<?php the_permalink(); ?>">Lire la suite&raquo;</a>
      </p>

    </article>
  <?php endwhile; ?>

<?php else : ?>

  <p>No content found</p>

<?php endif; ?>

<?php get_footer(); ?>
