(function($) {
  Drupal.behaviors.carttitle = {
     attach: function (context, settings) {
	$('.commerce-add-to-cart .form-submit').attr('title','In den Warenkorb');
      $('.block--views-exp-display-products-page .views-exposed-form .views-exposed-widget .form-submit').attr('title','Suchen');
     }
  };
  Drupal.behaviors.summaryshippingtext = {
    attach: function (context, settings) {
     $( "<p class='versandkosten'><strong>*</strong> zzgl. <a href='/node/1260' class='colorbox-node'>Versandkosten</a>, die Ihnen bei der Überprüfung der Bestellung angezeigt werden, nachdem Sie Ihre Lieferadresse angegeben haben.</p>" ).insertAfter( "#commerce-checkout-form-checkout .commerce-order-handler-area-order-total" );
    }
  };
  Drupal.behaviors.infiniteScrollAddClass = {
    attach: function (context, settings) {
      var $blocks = $('.block--commercebox-base-theme-cb-cart, .block-commerce-product-comparison, .pane-commercebox-wishlist, #block-user-login');
      $('h2', $blocks).click(function() {
        $('.drop-menu .pane-content, .drop-menu .block__content').not($('.pane-content, .block__content', $(this).parent())).hide();
        $('.visible').not($(this)).removeClass('visible');
        $('.block__content, .pane-content, .content', $(this).parent()).toggle();
        $(this).toggleClass('visible');
      });
      $blocks.addClass('drop-menu');
    }
  };

  Drupal.behaviors.catalogmenu = {
    attach: function (context, settings) {
      $('.commercebox-catalog-content .view-content, .view-catalog-node-index .view-content').each(function() {
        simpleWidth($('.views-row', $(this)), $('.views-field-field-description'));
        simpleHeight($('.views-row', $(this)), $('.views-field-field-description', $(this)));
      });
      $('.catalog .pane-content ul li').each(function() {
        if (!$('ul', $(this)).length) {
          $(this).addClass('empty');
        }
        else {
          $(this).addClass('nesting');
          $(this).find('>a').after('<span class="opener"></span>');
        }
        var count = $(this).parents('ul').length;
        if (count-1) {
          $('a', $(this)).css({'padding-left':10*(count-1)});
        }
      });
      $('.opener').click(function(e) {
        $('ul:eq(0)', $(this).parent()).toggle()
        $(this).toggleClass('open');
        return false;
      });
      $('input.wishlist').each(function(){
        $(this).attr('title', $(this).val());
      });
      $('.catalog .pane-content .active-trail>.opener').addClass('open');
    }
  };

  /**
   * Added height for 2 simular blocks.
   */
  function simpleHeight($elements, $also) {
    var tallest = 0;
    $elements.each(function () {
      if ($(this).height() > tallest) {
        tallest = $(this).height();
      }
    }).each(function() {
      if ($(this).height() < tallest) {
        $(this).css('height', tallest);
      }
    });
    $also.css('top', tallest-20);
  }
  function simpleWidth($elements) {
    var remnant = $elements.parent().width() % $elements.outerWidth(1),
    quantity = ($elements.parent().width() - remnant) / $elements.outerWidth(1);
    if (remnant > quantity) {
      var intElement  = parseInt(remnant / quantity, 10)-1;
      $elements.each(function() {
        $(this).width($(this).width() + intElement-1);
        $(this).find('.views-field-field-images img').css({'max-width': $elements.width()});
        $(this).find('.views-field-field-description').css({'width': $elements.width()-20});
      });
    }
  }
  $(window).load(function() {
    $('.commercebox-catalog-content .view-content, .view-catalog-node-index .view-content').each(function() {
      simpleWidth($('.views-row', $(this)), $('.views-field-field-description'));
      simpleHeight($('.views-row', $(this)), $('.views-field-field-description', $(this)));
    });
  });
  Drupal.behaviors.outofstock = {
    attach: function (context, settings) {
              /*remove add-to-cart button if product has status of sold out - for product display page*/
        $(".out-of-stock").after( "<p class='vergriffen'>vergriffen</p>" ).closest("li").find(".field-name-commerce-price,.field-name-field-product-tax,.field-name-link-zzgl-versandkosten").remove();
        /*remove add-to-cart button if product has status of sold out - for product teasers page*/
        $(".section-produkt .out-of-stock").closest("div.group-right").find(".field-name-commerce-price,.field-name-field-product-tax,.field-name-link-zzgl-versandkosten").remove().after( "<p class='vergriffen'>vergriffen</p>" );

    }
  }
})(jQuery);
