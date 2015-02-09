<div<?php print $attributes; ?>>
  <div id="header" class="l-constrained l-header" role="banner">
      <?php if ($logo): ?>
        <div id="logo">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site-branding__logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
        </div>
      <?php endif; ?>
      <?php if ($site_slogan): ?>
        <div id="slogan">
          <h2 class="site-branding__slogan"><?php print $site_slogan; ?></h2>
        </div>
      <?php endif; ?>
      <?php print render($page['navigation']); ?>
  </div>
  <?php if (!empty($page['highlighted'])): ?>
    <div class="l-highlighted-wrapper">
      <?php print render($page['highlighted']); ?>
    </div>
  <?php endif; ?>
  <div class="l-main l-constrained">
    <a id="main-content"></a>
    <?php print render($tabs); ?>
    <?php print $messages; ?>
    <?php print render($page['help']); ?>
    <?php print render($page['sidebar_first']); ?>
    <div class="l-content" role="main">
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div>
    <?php print render($page['sidebar_second']); ?>
  </div>
  <footer class="l-footer-wrapper" role="contentinfo">
    <?php print render($page['footer']); ?>
  </footer>
</div>
