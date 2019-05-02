'use strict';

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

(function (wpI18n, wpBlocks, wpElement, wpEditor, wpComponents) {
    var __ = wpI18n.__;
    var Component = wpElement.Component,
        Fragment = wpElement.Fragment;
    var registerBlockType = wpBlocks.registerBlockType;
    var InspectorControls = wpEditor.InspectorControls,
        mediaUpload = wpEditor.mediaUpload,
        MediaUpload = wpEditor.MediaUpload,
        BlockControls = wpEditor.BlockControls;
    var PanelBody = wpComponents.PanelBody,
        ToggleControl = wpComponents.ToggleControl,
        SelectControl = wpComponents.SelectControl,
        TextControl = wpComponents.TextControl,
        IconButton = wpComponents.IconButton,
        Button = wpComponents.Button,
        Tooltip = wpComponents.Tooltip,
        Toolbar = wpComponents.Toolbar,
        FormFileUpload = wpComponents.FormFileUpload,
        Placeholder = wpComponents.Placeholder;

    var $ = jQuery;
    var ALLOWED_MEDIA_TYPES = ['image'];
    var _lodash = lodash,
        pick = _lodash.pick,
        get = _lodash.get;
    var isBlobURL = wp.blob.isBlobURL;

    var pickRelevantMediaFiles = function pickRelevantMediaFiles(image) {
        var imageProps = pick(image, ['alt', 'id', 'link', 'caption', 'title', 'date', 'media_details']);
        imageProps.url = get(image, ['sizes', 'large', 'url']) || get(image, ['media_details', 'sizes', 'large', 'source_url']) || image.url;
        return imageProps;
    };

    var wpmfWordpressGallery = function (_Component) {
        _inherits(wpmfWordpressGallery, _Component);

        function wpmfWordpressGallery() {
            _classCallCheck(this, wpmfWordpressGallery);

            var _this = _possibleConstructorReturn(this, (wpmfWordpressGallery.__proto__ || Object.getPrototypeOf(wpmfWordpressGallery)).apply(this, arguments));

            _this.state = {
                inited: false,
                uploaded: false,
                selectedImageId: 0,
                selectedImageInfos: {
                    title: '',
                    caption: ''
                }
            };
            _this.addFiles = _this.addFiles.bind(_this);
            _this.uploadFromFiles = _this.uploadFromFiles.bind(_this);

            return _this;
        }

        _createClass(wpmfWordpressGallery, [{
            key: 'componentWillMount',
            value: function componentWillMount() {
                var _this2 = this;

                var _props = this.props,
                    attributes = _props.attributes,
                    setAttributes = _props.setAttributes;
                var images = attributes.images,
                    image_sortable = attributes.image_sortable,
                    wpmf_orderby = attributes.wpmf_orderby,
                    wpmf_order = attributes.wpmf_order;

                var imgsId = images.map(function (img) {
                    return img.id;
                });
                fetch(wpmf_blocks.vars.ajaxurl + ('?action=gallery_block_load_image_infos&ids=' + imgsId.join() + '&wpmf_nonce=' + wpmf_blocks.vars.wpmf_nonce)).then(function (res) {
                    return res.json();
                }).then(function (result) {
                    if (result.status) {
                        var imageFetch = images.map(function (img) {
                            img.title = result.titles[img.id];
                            img.caption = result.captions[img.id];
                            return img;
                        });

                        var imageSortFetch = image_sortable.map(function (img) {
                            img.title = result.titles[img.id];
                            img.caption = result.captions[img.id];
                            return img;
                        });

                        setAttributes({
                            images: imageFetch,
                            image_sortable: imageSortFetch
                        });
                        _this2.doSort(wpmf_orderby, wpmf_order);
                    }
                },
                // errors
                function (error) {});
            }
        }, {
            key: 'componentDidMount',
            value: function componentDidMount() {
                var attributes = this.props.attributes;

                if (attributes.images.length) {
                    this.initMasonry();
                }
            }
        }, {
            key: 'componentDidUpdate',
            value: function componentDidUpdate(prevProps) {
                // Deselect images when deselecting the block
                var _props2 = this.props,
                    isSelected = _props2.isSelected,
                    attributes = _props2.attributes;
                var images = attributes.images;

                if (!isSelected && prevProps.isSelected) {
                    this.setState({
                        selectedImageId: 0,
                        selectedImageInfos: {
                            title: '',
                            caption: ''
                        }
                    });
                }

                if (images.length) {
                    this.initMasonry();
                }
            }

            /**
             * run masonry layout
             */

        }, {
            key: 'initMasonry',
            value: function initMasonry() {
                var _props3 = this.props,
                    attributes = _props3.attributes,
                    clientId = _props3.clientId;

                var $container = $('#block-' + clientId + ' .wpmf-gallery-list-items');
                if ($container.is(':hidden')) {
                    return;
                }

                imagesLoaded($container, function () {
                    var containerWidth = $container.width();
                    var columnWidth = containerWidth / parseInt(attributes.columns);
                    $container.masonry({
                        itemSelector: '.wpmf-gallery-block-item',
                        columnWidth: columnWidth,
                        gutter: 0,
                        transitionDuration: 0
                    });

                    $container.css('visibility', 'visible');
                });

                if ($container.hasClass('masonry')) {
                    $container.masonry('reloadItems');
                }
            }

            /**
             * Do sort image
             */

        }, {
            key: 'doSort',
            value: function doSort(wpmf_orderby, wpmf_order) {
                var _props4 = this.props,
                    attributes = _props4.attributes,
                    setAttributes = _props4.setAttributes;
                var images = attributes.images,
                    image_sortable = attributes.image_sortable;

                var images_ordered = void 0;
                // Order images
                switch (wpmf_orderby) {
                    default:
                    case 'title':
                        if (wpmf_order === 'DESC') {
                            images_ordered = [].concat(images).sort(function (a, b) {
                                if (typeof a.title !== "undefined" && typeof b.title !== "undefined") {
                                    return b.title.localeCompare(a.title);
                                } else {
                                    return b.url.localeCompare(a.url);
                                }
                            });
                        } else {
                            images_ordered = [].concat(images).sort(function (a, b) {
                                if (typeof a.title !== "undefined" && typeof b.title !== "undefined") {
                                    return a.title.localeCompare(b.title);
                                } else {
                                    return a.url.localeCompare(b.url);
                                }
                            });
                        }

                        setAttributes({
                            wpmf_orderby: wpmf_orderby,
                            wpmf_order: wpmf_order,
                            images: images_ordered
                        });

                        break;
                    case 'date':
                        if (wpmf_order === 'DESC') {
                            images_ordered = [].concat(images).sort(function (a, b) {
                                return new Date(b.id).getTime() - new Date(a.id).getTime();
                            });
                        } else {
                            images_ordered = [].concat(images).sort(function (a, b) {
                                return new Date(a.id).getTime() - new Date(b.id).getTime();
                            });
                        }

                        setAttributes({
                            wpmf_orderby: wpmf_orderby,
                            wpmf_order: wpmf_order,
                            images: images_ordered
                        });
                        break;
                    case 'post__in':
                        setAttributes({
                            wpmf_orderby: wpmf_orderby,
                            wpmf_order: wpmf_order,
                            images: image_sortable
                        });
                        break;
                }
            }

            /**
             * Set images orderby
             */

        }, {
            key: 'sortImageOrderBy',
            value: function sortImageOrderBy(value) {
                var attributes = this.props.attributes;
                var wpmf_order = attributes.wpmf_order;

                this.doSort(value, wpmf_order);
            }

            /**
             * Set images order
             */

        }, {
            key: 'sortImageOrder',
            value: function sortImageOrder(value) {
                var attributes = this.props.attributes;
                var wpmf_orderby = attributes.wpmf_orderby;

                this.doSort(wpmf_orderby, value);
            }

            /**
             * Load image infos
             */

        }, {
            key: 'loadImageInfos',
            value: function loadImageInfos(image) {
                if (this.state.selectedImageId !== image.id) {
                    this.setState({
                        selectedImageInfos: {
                            title: image.title,
                            caption: image.caption
                        }
                    });
                }

                this.setState({ selectedImageId: this.state.selectedImageId === image.id ? 0 : image.id });
            }

            /**
             * Update image info
             */

        }, {
            key: 'updateImageInfos',
            value: function updateImageInfos() {
                var _this3 = this;

                var _props5 = this.props,
                    attributes = _props5.attributes,
                    setAttributes = _props5.setAttributes;
                var images = attributes.images;

                $('.save_img_action span').addClass('visible');
                fetch(wpmf_blocks.vars.ajaxurl + ('?action=gallery_block_update_image_infos&id=' + this.state.selectedImageId + '&title=' + this.state.selectedImageInfos.title + '&caption=' + this.state.selectedImageInfos.caption + '&wpmf_nonce=' + wpmf_blocks.vars.wpmf_nonce)).then(function (res) {
                    return res.json();
                }).then(function (result) {
                    $('.save_img_action span').removeClass('visible');
                    if (result.status) {
                        var imageFetch = images.map(function (img) {
                            if (img.id === _this3.state.selectedImageId) {
                                img.title = result.infos.title;
                                img.caption = result.infos.caption;
                            }

                            return img;
                        });

                        setAttributes({
                            images: imageFetch
                        });
                    }
                },
                // errors
                function (error) {
                    _this3.setState({
                        selectedImageInfos: {
                            title: '',
                            caption: ''
                        }
                    });
                });
            }

            /**
             * Un Selected image
             */

        }, {
            key: 'unSelectedImage',
            value: function unSelectedImage(e) {
                if (!$(e.target).hasClass('wpmf-gallery-image')) {
                    this.setState({
                        selectedImageId: 0,
                        selectedImageInfos: {
                            title: '',
                            caption: ''
                        }
                    });
                }
            }

            /**
             * Select image
             */

        }, {
            key: 'onSelectImages',
            value: function onSelectImages(imgss) {
                var _props6 = this.props,
                    attributes = _props6.attributes,
                    setAttributes = _props6.setAttributes;
                var images = attributes.images,
                    wpmf_orderby = attributes.wpmf_orderby,
                    wpmf_order = attributes.wpmf_order;


                var imgs = imgss.map(function (img) {
                    return wp.media.attachment(img.id).attributes;
                });
                var check = false;
                setAttributes({
                    images: imgs,
                    image_sortable: imgs
                });

                if (images.length <= imgs.length) {
                    if (images.length) {
                        images.map(function (img, index) {
                            if (img.id !== imgs[index].id) {
                                setAttributes({
                                    wpmf_orderby: 'post__in'
                                });
                                check = true;
                            }
                        });
                    } else {
                        check = false;
                    }

                    if (!check) {
                        this.doSort(wpmf_orderby, wpmf_order);
                    }
                } else {
                    imgs.map(function (img, index) {
                        if (img.id !== images[index].id) {
                            setAttributes({
                                wpmf_orderby: 'post__in'
                            });
                        }
                    });
                }
            }

            /**
             * Upload files
             */

        }, {
            key: 'uploadFromFiles',
            value: function uploadFromFiles(event) {
                this.addFiles(event.target.files);
            }

            /**
             * Add files
             */

        }, {
            key: 'addFiles',
            value: function addFiles(files) {
                var _props7 = this.props,
                    attributes = _props7.attributes,
                    setAttributes = _props7.setAttributes;
                var images = attributes.images;

                mediaUpload({
                    allowedTypes: ALLOWED_MEDIA_TYPES,
                    filesList: files,
                    onFileChange: function onFileChange(imgs) {
                        var imagesNormalized = imgs.map(function (image) {
                            return pickRelevantMediaFiles(image);
                        });

                        setAttributes({
                            images: images.concat(imagesNormalized),
                            image_sortable: images.concat(imagesNormalized)
                        });
                    }
                });
            }
        }, {
            key: 'render',
            value: function render() {
                var _this4 = this;

                var _props8 = this.props,
                    attributes = _props8.attributes,
                    setAttributes = _props8.setAttributes,
                    className = _props8.className,
                    isSelected = _props8.isSelected;
                var images = attributes.images,
                    display = attributes.display,
                    columns = attributes.columns,
                    size = attributes.size,
                    targetsize = attributes.targetsize,
                    link = attributes.link,
                    wpmf_orderby = attributes.wpmf_orderby,
                    wpmf_order = attributes.wpmf_order,
                    autoplay = attributes.autoplay;

                var list_sizes = Object.keys(wpmf_blocks.vars.sizes).map(function (key, label) {
                    return {
                        label: wpmf_blocks.vars.sizes[key],
                        value: key
                    };
                });

                var controls = React.createElement(
                    BlockControls,
                    null,
                    images.length && React.createElement(
                        Toolbar,
                        null,
                        React.createElement(MediaUpload, {
                            onSelect: function onSelect(imgs) {
                                return _this4.onSelectImages(imgs);
                            },
                            allowedTypes: ALLOWED_MEDIA_TYPES,
                            multiple: true,
                            gallery: true,
                            value: images.map(function (img) {
                                return img.id;
                            }),
                            render: function render(_ref) {
                                var open = _ref.open;
                                return React.createElement(IconButton, {
                                    className: 'components-toolbar__control',
                                    label: __('Edit Gallery'),
                                    icon: 'edit',
                                    onClick: open
                                });
                            }
                        })
                    )
                );

                if (images.length === 0) {
                    return React.createElement(
                        Placeholder,
                        {
                            icon: 'format-gallery',
                            label: __('WP Media Folder Gallery'),
                            instructions: __('No images selected. Adding images to start using this block.'),
                            className: className
                        },
                        React.createElement(
                            FormFileUpload,
                            {
                                multiple: true,
                                isLarge: true,
                                className: 'editor-media-placeholder__button',
                                onChange: this.uploadFromFiles,
                                accept: 'image/*',
                                icon: 'upload'
                            },
                            __('Upload')
                        ),
                        React.createElement(MediaUpload, {
                            gallery: true,
                            multiple: true,
                            onSelect: function onSelect(imgs) {
                                return _this4.onSelectImages(imgs);
                            },
                            accept: 'image/*',
                            allowedTypes: ALLOWED_MEDIA_TYPES,
                            render: function render(_ref2) {
                                var open = _ref2.open;
                                return React.createElement(
                                    Button,
                                    {
                                        isLarge: true,
                                        className: 'editor-media-placeholder__button',
                                        onClick: open
                                    },
                                    __('Media Library')
                                );
                            }
                        })
                    );
                }

                if (images.length) {
                    return React.createElement(
                        Fragment,
                        null,
                        controls,
                        React.createElement(
                            'div',
                            { className: 'wpmf-gallery-block', onClick: this.unSelectedImage.bind(this) },
                            React.createElement(
                                InspectorControls,
                                null,
                                this.state.selectedImageId === 0 && React.createElement(
                                    PanelBody,
                                    { title: __('Gallery Settings') },
                                    React.createElement(SelectControl, {
                                        label: __('Theme'),
                                        value: display,
                                        options: [{ label: __('Default'), value: 'default' }, { label: __('Masonry'), value: 'masonry' }, { label: __('Portfolio'), value: 'portfolio' }, { label: __('Slider'), value: 'slider' }],
                                        onChange: function onChange(value) {
                                            return setAttributes({ display: value });
                                        }
                                    }),
                                    React.createElement(SelectControl, {
                                        label: __('Columns'),
                                        value: columns,
                                        options: [{ label: 1, value: '1' }, { label: 2, value: '2' }, { label: 3, value: '3' }, { label: 4, value: '4' }, { label: 5, value: '5' }, { label: 6, value: '6' }, { label: 7, value: '7' }, { label: 8, value: '8' }, { label: 9, value: '9' }],
                                        onChange: function onChange(value) {
                                            return setAttributes({ columns: value });
                                        }
                                    }),
                                    React.createElement(SelectControl, {
                                        label: __('Gallery image size'),
                                        value: size,
                                        options: list_sizes,
                                        onChange: function onChange(value) {
                                            return setAttributes({ size: value });
                                        }
                                    }),
                                    React.createElement(SelectControl, {
                                        label: __('Lightbox size'),
                                        value: targetsize,
                                        options: list_sizes,
                                        onChange: function onChange(value) {
                                            return setAttributes({ targetsize: value });
                                        }
                                    }),
                                    React.createElement(SelectControl, {
                                        label: __('Action on click'),
                                        value: link,
                                        options: [{ label: __('Lightbox'), value: 'file' }, { label: __('Attachment Page'), value: 'post' }, { label: __('None'), value: 'none' }],
                                        onChange: function onChange(value) {
                                            return setAttributes({ link: value });
                                        }
                                    }),
                                    React.createElement(SelectControl, {
                                        label: __('Order by'),
                                        value: wpmf_orderby,
                                        options: [{ label: __('Custom'), value: 'post__in' }, { label: __('Random'), value: 'rand' }, { label: __('Title'), value: 'title' }, { label: __('Date'), value: 'date' }],
                                        onChange: this.sortImageOrderBy.bind(this)
                                    }),
                                    React.createElement(SelectControl, {
                                        label: __('Order'),
                                        value: wpmf_order,
                                        options: [{ label: __('Ascending'), value: 'ASC' }, { label: __('Descending '), value: 'DESC' }],
                                        onChange: this.sortImageOrder.bind(this)
                                    }),
                                    display === 'slider' && React.createElement(ToggleControl, {
                                        label: __('Autoplay'),
                                        checked: autoplay,
                                        onChange: function onChange() {
                                            return setAttributes({ autoplay: autoplay === 1 ? 0 : 1 });
                                        }
                                    })
                                ),
                                this.state.selectedImageId !== 0 && React.createElement(
                                    PanelBody,
                                    { title: __('Image Settings') },
                                    React.createElement(TextControl, {
                                        label: __('Title'),
                                        value: this.state.selectedImageInfos.title,
                                        onChange: function onChange(value) {
                                            _this4.setState({
                                                selectedImageInfos: _extends({}, _this4.state.selectedImageInfos, {
                                                    title: value
                                                })
                                            });
                                        }
                                    }),
                                    React.createElement(TextControl, {
                                        label: __('Caption'),
                                        value: this.state.selectedImageInfos.caption,
                                        onChange: function onChange(value) {
                                            _this4.setState({
                                                selectedImageInfos: _extends({}, _this4.state.selectedImageInfos, {
                                                    caption: value
                                                })
                                            });
                                        }
                                    }),
                                    React.createElement(
                                        'div',
                                        { className: 'save_img_action' },
                                        React.createElement(
                                            Button,
                                            { className: 'is-button is-default is-primary is-large',
                                                onClick: this.updateImageInfos.bind(this) },
                                            __('Save')
                                        ),
                                        React.createElement(
                                            'span',
                                            { className: 'spinner' },
                                            ' '
                                        )
                                    )
                                )
                            ),
                            React.createElement(
                                'div',
                                { className: "wpmf-gallery-list-items gallery-columns-" + columns },
                                images.map(function (image, index) {
                                    var url = '';
                                    if (typeof image.media_details !== "undefined" && typeof image.media_details.sizes !== "undefined" && typeof image.media_details.sizes[size] !== "undefined") {
                                        url = image.media_details.sizes[size].source_url;
                                    } else if (typeof image.sizes !== "undefined" && typeof image.sizes[size] !== "undefined") {
                                        url = image.sizes[size].url;
                                    } else {
                                        url = image.url;
                                    }

                                    if (typeof image.media_details !== "undefined" && typeof image.media_details.sizes !== "undefined" && typeof image.media_details.sizes[size] !== "undefined" || typeof image.sizes !== "undefined" && typeof image.sizes[size] !== "undefined" || typeof image.url !== "undefined") {
                                        return React.createElement(
                                            'div',
                                            {
                                                className: isBlobURL(url) ? "wpmf-gallery-block-item is-transient" : "wpmf-gallery-block-item ",
                                                key: index },
                                            React.createElement(
                                                'div',
                                                { className: 'wpmf-gallery-block-item-infos' },
                                                React.createElement('img', {
                                                    src: url,
                                                    className: _this4.state.selectedImageId === image.id ? 'wpmf-gallery-image active' : 'wpmf-gallery-image',
                                                    onClick: _this4.loadImageInfos.bind(_this4, image)
                                                }),
                                                isBlobURL(url) && React.createElement(
                                                    'span',
                                                    { className: 'spinner' },
                                                    ' '
                                                ),
                                                React.createElement(
                                                    Tooltip,
                                                    { text: __('Remove image') },
                                                    React.createElement(IconButton, {
                                                        className: 'wpmf-gallery-block-item-remove',
                                                        icon: 'no',
                                                        onClick: function onClick() {
                                                            _this4.setState({
                                                                selectedImageId: 0,
                                                                selectedImageInfos: {
                                                                    title: '',
                                                                    caption: ''
                                                                }
                                                            });
                                                            setAttributes({
                                                                images: images.filter(function (img, i) {
                                                                    return i !== index;
                                                                }),
                                                                image_sortable: images.filter(function (img, i) {
                                                                    return i !== index;
                                                                })
                                                            });
                                                        }
                                                    })
                                                )
                                            )
                                        );
                                    }
                                })
                            ),
                            isSelected && React.createElement(
                                'div',
                                { className: 'blocks-gallery-item has-add-item-button' },
                                React.createElement(
                                    FormFileUpload,
                                    {
                                        multiple: true,
                                        isLarge: true,
                                        className: 'block-library-gallery-add-item-button',
                                        onChange: this.uploadFromFiles,
                                        accept: 'image/*',
                                        icon: 'insert'
                                    },
                                    __('Upload an image')
                                )
                            )
                        )
                    );
                }
            }
        }]);

        return wpmfWordpressGallery;
    }(Component);

    var galleryAttrs = {
        images: {
            type: 'array',
            default: []
        },
        is_update_image: {
            type: 'boolean',
            default: false
        },
        image_sortable: {
            type: 'array',
            default: []
        },
        display: {
            type: 'string',
            default: 'default'
        },
        columns: {
            type: 'string',
            default: '3'
        },
        size: {
            type: 'string',
            default: 'medium'
        },
        targetsize: {
            type: 'string',
            default: 'large'
        },
        link: {
            type: 'string',
            default: 'file'
        },
        wpmf_orderby: {
            type: 'string',
            default: 'post__in'
        },
        wpmf_order: {
            type: 'string',
            default: 'ASC'
        },
        autoplay: {
            type: 'number',
            default: 1
        },
        wpmf_folder_id: {
            type: 'array',
            default: []
        },
        wpmf_autoinsert: {
            type: 'string',
            default: '0'
        }
    };

    registerBlockType('wpmf/wordpress-gallery', {
        title: wpmf_blocks.l18n.block_gallery_title,
        icon: 'format-gallery',
        category: 'wp-media-folder',
        attributes: galleryAttrs,
        edit: wpmfWordpressGallery,
        save: function save(_ref3) {
            var attributes = _ref3.attributes;
            var images = attributes.images,
                display = attributes.display,
                columns = attributes.columns,
                size = attributes.size,
                targetsize = attributes.targetsize,
                link = attributes.link,
                wpmf_orderby = attributes.wpmf_orderby,
                wpmf_order = attributes.wpmf_order,
                wpmf_autoinsert = attributes.wpmf_autoinsert,
                autoplay = attributes.autoplay;

            var gallery_shortcode = '[gallery';

            var ids = images.map(function (img) {
                return img.id;
            });
            if (images.length) {
                gallery_shortcode += ' ids="' + ids.join() + '"';
            }
            gallery_shortcode += ' display="' + display + '"';
            gallery_shortcode += ' size="' + size + '"';
            gallery_shortcode += ' columns="' + columns + '"';
            gallery_shortcode += ' targetsize="' + targetsize + '"';
            gallery_shortcode += ' link="' + link + '"';
            gallery_shortcode += ' wpmf_orderby="' + wpmf_orderby + '"';
            gallery_shortcode += ' wpmf_order="' + wpmf_order + '"';
            if (parseInt(autoplay) === 0) {
                gallery_shortcode += ' autoplay="' + autoplay + '"';
            }
            gallery_shortcode += ' wpmf_autoinsert="' + wpmf_autoinsert + '"';
            gallery_shortcode += ']';

            return gallery_shortcode;
        }
    });
})(wp.i18n, wp.blocks, wp.element, wp.editor, wp.components);
