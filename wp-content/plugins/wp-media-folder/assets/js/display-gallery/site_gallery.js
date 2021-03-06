
(function ($) {
    "use strict";

    var body = $('body'),
            _window = $(window);

    /**
     * get column width, gutter width, count columns
     * @param $container
     * @returns {{columnWidth: number, gutterWidth, columns: Number}}
     */
    var calculateGrid = function ($container) {
        var columns = parseInt($container.data('wpmfcolumns'));
        var gutterWidth = $container.data('gutterWidth');
        var containerWidth = $container.width();

        if (isNaN(gutterWidth)) {
            gutterWidth = 5;
        } else if (gutterWidth > 50 || gutterWidth < 0) {
            gutterWidth = 5;
        }

        if (parseInt(columns) < 2 || containerWidth <= 450) {
            columns = 2;
        }

        gutterWidth = parseInt(gutterWidth);

        var allGutters = gutterWidth * (columns - 1);
        var contentWidth = containerWidth - allGutters;

        var columnWidth = Math.floor(contentWidth / columns);

        return {columnWidth: columnWidth, gutterWidth: gutterWidth, columns: columns};
    };

    /**
     * Run masonry gallery
     * @param duration
     * @param $container
     */
    var runMasonry = function (duration, $container) {
        var $postBox = $container.children('.wpmf-gallery-item');
        var o = calculateGrid($container);
        $postBox.css({'width': o.columnWidth + 'px', 'margin-bottom': o.gutterWidth + 'px'});

        $container.masonry({
            itemSelector: '.wpmf-gallery-item',
            columnWidth: o.columnWidth,
            gutter: o.gutterWidth,
            transitionDuration: duration,
            isFitWidth: true
        });

        if ($($container).hasClass('gallery-portfolio')) {
            var w = $($container).find('.attachment-thumbnail').width();
            $($container).find('.wpmf-caption-text.wpmf-gallery-caption , .wpmf-gallery-icon').css('max-width', w + 'px');
        }
    };

    /**
     * Load magnificPopup
     * @param gallery
     * @param items
     * @param index
     */
    var initPopupGallery = function (gallery, items, index) {
        var galleryWrap = gallery;
        if (gallery.hasClass('wpmfflexslider')) {
            galleryWrap = gallery.find('.wpmf-slides');
        }

        /* call magnificPopup */
        galleryWrap.magnificPopup({
            items: items,
            gallery: {
                enabled: true,
                tCounter: '<span class="mfp-counter">%curr% / %total%</span>',
                arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>' // markup of an arrow button
            },
            showCloseBtn: true,
            removalDelay: 300,
            mainClass: 'wpmf-mfp-zoom-in',
            callbacks: {
                beforeOpen: function() {
                    gallery.find('a').each(function(){
                        $(this).attr('title', $(this).find('img').attr('alt'));
                    });
                },
                open: function(e) {
                    $.magnificPopup.instance.goTo(index);
                    //overwrite default prev + next function. Add timeout for css3 crossfade animation
                    $.magnificPopup.instance.next = function() {
                        var self = this;
                        self.wrap.removeClass('mfp-image-loaded');
                        setTimeout(function() { $.magnificPopup.proto.next.call(self); }, 120);
                    };
                    $.magnificPopup.instance.prev = function() {
                        var self = this;
                        self.wrap.removeClass('mfp-image-loaded');
                        setTimeout(function() { $.magnificPopup.proto.prev.call(self); }, 120);
                    };
                },
                imageLoadComplete: function() {
                    var self = this;
                    setTimeout(function() { self.wrap.addClass('mfp-image-loaded'); }, 16);
                }
            }
        });

        gallery.addClass('magnificpopup-is-active');
    };

    /**
     * Get all items in gallery
     * @param gallery
     * @returns {Array}
     */
    var wpmfGalleryGetItems = function (gallery) {
        var items = [];
        gallery.find('.wpmf-gallery-icon > a[data-lightbox="1"]').each(function () {
            var src = $(this).attr('href');
            var type = 'image';
            if ($(this).hasClass('isvideo')) {
                type = 'iframe';
            }

            var pos = items.map(function (e) {
                return e.src;
            }).indexOf(src);
            if (pos === -1) {
                items.push({src: src, type: type, title: $(this).data('title')});
            }
        });

        return items;
    };

    /**
     * Init gallery
     */
    var initGallery = function () {
        $('.gallery-masonry').each(function () {
            var $container = $(this);

            if ($container.is(':hidden')) {
                return;
            }

            if ($container.hasClass('masonry')) {
                return;
            }
            imagesLoaded($container, function () {
                runMasonry(0, $container);
                $container.css('visibility', 'visible');
            });
        });

        /* check Enable the gallery lightbox feature option */
        if (typeof wpmfggr !== "undefined" && typeof wpmfggr.wpmf_lightbox_gallery !== "undefined" && parseInt(wpmfggr.wpmf_lightbox_gallery) === 1) {
            if ($().magnificPopup) {
                var index = 0;
                $('.wpmf-gallery-icon > a').on('click', function (e) {
                    if (parseInt($(this).data('lightbox')) === 1) {
                        var $this = $(this).closest('.gallery');
                        var parent_items = $this.find('.wpmf-gallery-icon > a[data-lightbox="1"]').closest('.wpmf-gallery-item');
                        index = parent_items.index($(this).closest('.wpmf-gallery-item'));
                        var items = wpmfGalleryGetItems($this);
                        initPopupGallery($this, items, index);
                    } else {
                        var target = $(this).attr('target');
                        if (target === '') {
                            target = '_self';
                        }
                        
                        window.open($(this).attr('href'), target);
                    }
                });
            }
        }

        $(window).load(function () {
            /* fix height for slide theme when load */
            $('.flex-viewport').each(function () {
                $(this).css('height', '10px !important');
            })
        });

        /* init flexslider theme */
        if (jQuery().flexslider) {
            $('.flexslider').each(function () {
                var $this = $(this);
                var id = $this.data('id');
                if ($this.hasClass('gallery_addon_flexslider')) {
                    return;
                }

                if ($this.is(':hidden')) {
                    return;
                }

                if ($this.hasClass('flexslider-is-active')) {
                    return;
                }
                var columns = parseInt($this.data('wpmfcolumns'));
                var margin = parseInt($this.data('gutterwidth'));
                var n = 0;
                if (parseInt(margin) >= 10) {
                    n = 20;
                }

                var columns_width = ($this.width() - n - (columns - 1) * margin) / columns;
                var auto_animation = parseInt($this.data('auto_animation'));
                $this.addClass('flexslider-is-active');
                /* call flexslider function */
                if (columns > 1) {
                    $('#' + id + '').flexslider({
                        animation: wpmfggr.slider_animation,
                        animationLoop: true,
                        slideshow: (auto_animation === 1),
                        smoothHeight: (wpmfggr.slider_animation === 'fade'),
                        itemWidth: (wpmfggr.slider_animation === 'fade') ? 0 : columns_width,
                        itemMargin: margin,
                        pauseOnHover: true,
                        slideshowSpeed: 5000,
                        prevText: "",
                        nextText: "",
                        start: function () {
                            $('.entry-content').removeClass('loading');
                        }
                    });

                    setTimeout(function () {
                            $('#' + id + ' .wpmf-gallery-item').css({'width': columns_width + 'px'});
                    }, 120);

                } else {
                    $('#' + id + '').flexslider({
                        animation: wpmfggr.slider_animation,
                        animationLoop: true,
                        slideshow: (auto_animation === 1),
                        smoothHeight: true,
                        pauseOnHover: true,
                        slideshowSpeed: 5000,
                        prevText: "",
                        nextText: "",
                        start: function () {
                            $('.entry-content').removeClass('loading');
                        }
                    });
                }
            });
        }
    };

    $(document).ready(function () {
        if (wpmfggr.wpmf_current_theme === 'Gleam') {
            setTimeout(function () {
                initGallery();
            }, 1000);
        } else {
            initGallery();
        }
    });

    $(document.body).on('post-load', function () {
        initGallery();
    });

    $(document.body).on('wpmfs-toggled', function () {
        initGallery();
    });

})(jQuery);
