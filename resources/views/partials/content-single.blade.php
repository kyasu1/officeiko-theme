<article @php(post_class("ph1 ph4-ns pv2"))>
  <header>
    <h1 class="entry-title black-90 tc pa2">{{ get_the_title() }}</h1>
  </header>
  <div class="entry-content">
    @php(the_content())
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
