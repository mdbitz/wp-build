
(function($) {
    
    /** 
     * Setup event handlers on Main Content Elements
     * @returns {undefined}
     */
    function setupMainEvents() {
        
        // Setup Flip enabled events;
        $('.flip').on( 'click', function() {
            $(this).toggleClass('flipped');
        });

        // setup toggle clicks
        $('.btn_toggle').on('click', function() {
            if( $(this).hasClass('active') ) {
                do_toggle_action( $(this).data('prop'), 'off' );
            } else {
                do_toggle_action($(this).data('prop'), 'on');
            }
            $(this).toggleClass( 'active' );
        })

        // Setup Slick Carousel
        $('.book_carousel' ).slick({
            slidesToShow: 7,
            slidesToScroll: 1,
            dots: false,
            centerMode: true
        })
            
    }
    
    /**
     * Setup event handlers on Header/Footer elements
     * @returns {undefined}
     */
    function setupHeaderFooterEvents() {
        
    }

    function do_toggle_action( property, toggle ){

        switch( property ) {
            // Re-Order Books
            case 'order':
                var container = $('.results_wrapper .shell');
                var items = container.find('.book');
                items.sort( function(a,b){
                    var an, bn = 0;
                    if( 'on' == toggle ) {
                        an = a.getAttribute('data-author');
                        bn = b.getAttribute('data-author');
                    } else {
                        an = -1 * a.getAttribute('data-desire');
                        bn = -1 * b.getAttribute('data-desire');
                    }
                    if( an > bn ) {
                        return 1;
                    }
                    if( an < bn ) {
                        return -1;
                    }
                    return 0;
                })
                items.detach().appendTo(container);
                break;
            // change display
            case 'display':
                $('.results_wrapper').toggleClass('mode_list');
                if ('on' == toggle) {
                    $('.index_card').removeClass('flipped').removeClass('flip');
                } else {
                    $('.index_card').addClass('flip');
                }
                break;

        }
    }

    //
    // Document Ready for Manipulation
    //
    $(document).ready( function() {
        setupMainEvents();
        setupHeaderFooterEvents();
    });

    //
    // Load Page Cnntent as text
    //
    var cache = {};
    function loadPage(url) {
      if (cache[url]) {
        return new Promise(function(resolve) {
          resolve(cache[url]);
        });
      }

      return fetch(url, {
        method: 'GET'
      }).then(function(response) {
        cache[url] = response.text();
        return cache[url];
      });
    }

    var main = document.querySelector('main');

    //
    // Page Level Animation
    //
    function animate(oldContent, newContent) {
        oldContent.style.position = 'absolute';
        $( oldContent ).addClass( 'animating' );

        var animOut = oldContent.animate({
          transform: ['rotateY( 0deg )', 'rotateY( 180deg )']
        }, 1250);

        var animIn = newContent.animate({
          opacity: [0.8, 1]
        }, 1000);

        animOut.onfinish = function() {
          oldContent.parentNode.removeChild(oldContent);
          setupMainEvents();
        };
    }

    //
    // Update Page Content
    //
    function changePage() {

      // Note, the URL has already been changed
      var url = window.location.href;

      loadPage(url).then(function(responseText) {
        var wrapper = document.createElement('div');
            wrapper.innerHTML = responseText;

        var oldContent = document.querySelector('.cc');
        var newContent = wrapper.querySelector('.cc');

        main.appendChild(newContent);
        animate(oldContent, newContent);
      });
    }

    window.addEventListener('popstate', changePage);

    // 
    // Prevent Default click for links
    //
    document.addEventListener('click', function(e) {
      var el = e.target;

      // Go up in the nodelist until we find a node with .href (HTMLAnchorElement)
      while (el && !el.href) {
        el = el.parentNode;
      }

      // Fetch and animate page if
      //   href is this domain
      //   href is not wp-admin
      //   target is not new window
      if (el && el.target !== '_blank' && el.href.contains(window.location.hostname) && !el.href.contains( '/wp-admin/') ) {
        e.preventDefault();
        history.pushState(null, null, el.href);
        changePage();

        return;
      }
    });
    
    

})(jQuery); // Fully reference jQuery after this point.




