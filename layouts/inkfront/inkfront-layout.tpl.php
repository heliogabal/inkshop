<div<?php print $attributes; ?>>
<!--  <header class="l-header" role="banner">
    <div class="l-constrained">
      <div class="l-branding site-branding">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site-branding__logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
        <?php endif; ?>
        <?php if ($site_name): ?>
          <a href="<?php print $front_page; ?>" class="site-branding__name" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
        <?php endif; ?>
        <?php if ($site_slogan): ?>
          <h2 class="site-branding__slogan"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
        <?php print render($page['branding']); ?>
      </div>
      <?php print render($page['navigation']); ?>
      <?php print render($page['header']); ?>
    </div>
  </header>-->

  <div id="header">
    <!-- Skiplink-Navigation - ANFANG -->
    <div id="skipnavi">  <a title="zur Hauptnavigation springen" href="#nav_main" class="skip">Zur
      Hauptnavigation springen</a> <a title="zur Nebennavigation springen" href="#nav_sec" class="skip">Zur
      Nebennavigation springen</a> <a title="Direkt zum Inhalt springen" href="#col3" class="skip">Zum
      Inhalt springen</a>
    </div>
    <!-- Skiplink-Navigation - ENDE -->
    <div id="logo">  <a class="logo" title="Zurück zur Startseite" href="https://inkota.de/index.php">
        <img width="269" height="49" alt="Logo Inkota Netzwerk e.V." src="/sites/all/themes/inkshop/images/logo3.gif">
        </a>
    </div>
    <div id="extranavi">
      <ul>
        <li><a accesskey="A" class="aktuelles" title="Aktuelles (ALT+A)" href="https://inkota.de/aktuell/">Aktuelles</a></li>
        <li><a accesskey="M" class="mitmachen" title="Mitmachen (ALT+M)" href="https://inkota.de/mitmachen/">Mitmachen</a></li>
        <li><a accesskey="S" class="spenden" title="Spenden (ALT+S)" href="https://inkota.de/spenden/">Spenden</a></li>
      </ul>
    </div>
    <div id="suche">
      <ul>
        <li><a accesskey="P" class="presse" title="Presse (ALT+P)" href="https://inkota.de/presse/pressemitteilungen/">Presse</a></li>
        <li><a accesskey="K" class="kontakt" title="Kontakt (ALT+K)" href="https://inkota.de/kontakt/">Kontakt</a></li>
        <li><a accesskey="W" class="warenkorb" title="Warenkorb (ALT+W)" href="https://inkota.de/cart">Warenkorb</a></li>
        </ul>
      <!--<div id="suchbox">
      <div class="tx-macinasearchbox-pi1">
        <form class="form" id="searchform" method="post" action="de/nc/suche/">
          <div>
            <input type="text" onclick="leeren();" id="suchfeld" class="suche" name="tx_indexedsearch[sword]">
            <input type="submit" title="Suche auf www.inkota.de starten" alt="Suche auf www.inkota.de starten" value="Los" class="such_button" name="tx_indexedsearch[submit_button]">
            <input type="hidden" value="0" name="tx_indexedsearch[_sections]">
            <input type="hidden" value="0" name="tx_indexedsearch[pointer]">
            <input type="hidden" value="0" name="tx_indexedsearch[ext]">
            <input type="hidden" value="0" name="tx_indexedsearch[lang]">
        </div>
      </form>
      </div>
    </div>-->
  </div>
    <!-- #nav_lang - ANFANG -->
    <div id="nav_lang">
      <ul>
        <li><a accesskey="E" title="English (ALT+E)" href="https://inkota.de/english/">English</a></li>
        <li><a accesskey="O" title="Español (ALT+O)" href="https://inkota.de/espanol/">Español</a></li>
        <li><a accesskey="R" title="Português (ALT+R)" href="https://inkota.de/portugues/">Português</a></li>
      </ul>
    </div>
    <!-- #nav_lang - ENDE -->
    <div class="header_container">
      <div id="headerimage"><img border="0" width="800" height="199" alt="" src="/sites/all/themes/inkshop/images/material.jpg"></div>
      <div id="fahne"><img alt="Inkota e.V." src="/sites/all/themes/inkshop/images/fahne3.gif"></div>
      <!-- #nav_main - ANFANG -->
      <div id="mainnavi"><ul><li><a accesskey="T" title="Start (ALT+T)" href="https://inkota.de/start/">Start</a></li><li><a accesskey="B" title="Über uns (ALT+B)" href="https://inkota.de/ueber-uns/">Über uns</a></li><li><a accesskey="J" title="Projekte (ALT+J)" href="https://inkota.de/projekte/grundsaetze/">Projekte</a></li><li><a accesskey="H" title="Themen &amp; Kampagnen (ALT+H)" href="https://inkota.de/themen-kampagnen/">Themen &amp; Kampagnen</a></li><li class="last"><a accesskey="I" class="current" title=" (ALT+I)" href="/">Material</a></li></ul></div>
      <!-- #nav_main - ENDE -->
    </div>
  </div>

  <?php print render($page['hero']); ?>

  <?php if (!empty($page['highlighted'])): ?>
    <div class="l-highlighted-wrapper">
      <?php print render($page['highlighted']); ?>
    </div>
  <?php endif; ?>

  <div class="l-main l-constrained">
    <a id="main-content"></a>
    <?php print render($tabs); ?>
    <?php print $breadcrumb; ?>
    <?php print $messages; ?>
    <?php print render($page['help']); ?>

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

    <?php print render($page['sidebar_first']); ?>
    <?php print render($page['sidebar_second']); ?>
  </div>

  <footer class="l-footer-wrapper" role="contentinfo">
    <?php print render($page['footer']); ?>
  </footer>
</div>
