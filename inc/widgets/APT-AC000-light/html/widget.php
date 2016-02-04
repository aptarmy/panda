<?php if ($instance['before_posts']) : ?>
  <div class="APT-AC000-light-before">
    <?php echo wpautop($instance['before_posts']); ?>
  </div>
<?php endif; ?>

<div class="APT-AC000-light-posts hfeed">

  <?php if ($APT_AC000_light_query->have_posts()) : ?>

      <?php while ($APT_AC000_light_query->have_posts()) : $APT_AC000_light_query->the_post(); ?>

        <?php $current_post = ($post->ID == $current_post_id && is_single()) ? 'active' : ''; ?>

        <article <?php post_class($current_post); ?> data-index="<?php echo $APT_AC000_light_query->current_post + 1; ?>">
          <header>

            <?php if (has_post_thumbnail()) : ?>
              <div class="entry-image">
                <a href="<?php the_permalink(); ?>" rel="bookmark">
                  <?php the_post_thumbnail(); ?>
                </a>
              </div>
            <?php endif; ?>

            <?php if (get_the_title()) : ?>
              <h4 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark">
                  <?php the_title(); ?>
                </a>
              </h4>
            <?php endif; ?>

              <div class="entry-meta">
					<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_time(); ?></time>


  
                  <span class="sep"><?php _e('|', 'panda'); ?></span>

                  <span class="author vcard">
                    <?php echo __('By', 'panda'); ?>
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn">
                      <?php echo get_the_author(); ?>
                    </a>
                  </span>

                  <span class="sep"><?php _e('|', 'panda'); ?></span>

                  <a class="comments" href="<?php comments_link(); ?>">
                    <?php comments_number(__('No comments', 'panda'), __('One comment', 'panda'), __('% comments', 'panda')); ?>
                  </a>

              </div>


          </header>

            <div class="entry-summary">
              <p>
                <?php echo get_the_excerpt(); ?>
              </p>
            </div>
            <div class="entry-content">
              <?php the_content() ?>
            </div>

          <footer>

            <?php
            $categories = get_the_term_list($post->ID, 'category', '', ', ');
            ?>
              <div class="entry-categories">
                <strong class="entry-cats-label"><?php _e('Posted in', 'panda'); ?>:</strong>
                <span class="entry-cats-list"><?php echo $categories; ?></span>
              </div>

            <?php
            $tags = get_the_term_list($post->ID, 'post_tag', '', ', ');
            ?>
              <div class="entry-tags">
                <strong class="entry-tags-label"><?php _e('Tagged', 'panda'); ?>:</strong>
                <span class="entry-tags-list"><?php echo $tags; ?></span>
              </div>

          </footer>

        </article>

      <?php endwhile; ?>

  <?php else : ?>

    <p class="APT-AC000-light-not-found">
      <?php _e('No posts found.', 'panda'); ?>
    </p>

  <?php endif; ?>

</div>

<?php if ($instance['after_posts']) : ?>
  <div class="APT-AC000-light-after">
    <?php echo wpautop($instance['after_posts']); ?>
  </div>
<?php endif; ?>