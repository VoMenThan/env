(function (wpI18n, wpBlocks, wpElement, wpEditor, wpComponents) {
    const {__} = wpI18n;
    const {Component, Fragment} = wpElement;
    const {registerBlockType} = wpBlocks;
    const {InspectorControls, mediaUpload, MediaUpload, BlockControls} = wpEditor;
    const {PanelBody, ToggleControl, SelectControl, TextControl, IconButton, Button, Tooltip, Toolbar, FormFileUpload, Placeholder} = wpComponents;
    const $ = jQuery;
    const ALLOWED_MEDIA_TYPES = ['image'];
    const {pick, get} = lodash;
    const {isBlobURL} = wp.blob;
    const pickRelevantMediaFiles = (image) => {
        const imageProps = pick(image, ['alt', 'id', 'link', 'caption', 'title', 'date', 'media_details']);
        imageProps.url = get(image, ['sizes', 'large', 'url']) || get(image, ['media_details', 'sizes', 'large', 'source_url']) || image.url;
        return imageProps;
    };

    class wpmfWordpressGallery extends Component {
        constructor() {
            super(...arguments);
            this.state = {
                inited: false,
                uploaded: false,
                selectedImageId: 0,
                selectedImageInfos: {
                    title: '',
                    caption: ''
                }
            };
            this.addFiles = this.addFiles.bind(this);
            this.uploadFromFiles = this.uploadFromFiles.bind(this);

        }

        componentWillMount() {
            const {attributes, setAttributes} = this.props;
            const {images, image_sortable, wpmf_orderby, wpmf_order} = attributes;
            const imgsId = images.map((img) => img.id);
            fetch(wpmf_blocks.vars.ajaxurl + `?action=gallery_block_load_image_infos&ids=${imgsId.join()}&wpmf_nonce=${wpmf_blocks.vars.wpmf_nonce}`)
                .then(res => res.json())
                .then(
                    (result) => {
                        if (result.status) {
                            const imageFetch = images.map((img) => {
                                img.title = result.titles[img.id];
                                img.caption = result.captions[img.id];
                                return img;
                            });

                            const imageSortFetch = image_sortable.map((img) => {
                                img.title = result.titles[img.id];
                                img.caption = result.captions[img.id];
                                return img;
                            });

                            setAttributes({
                                images: imageFetch,
                                image_sortable: imageSortFetch
                            });
                            this.doSort(wpmf_orderby, wpmf_order);
                        }
                    },
                    // errors
                    (error) => {
                    }
                );
        }

        componentDidMount() {
            const {attributes} = this.props;
            if (attributes.images.length) {
                this.initMasonry();
            }
        }

        componentDidUpdate(prevProps) {
            // Deselect images when deselecting the block
            const {isSelected, attributes} = this.props;
            const {images} = attributes;
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
        initMasonry() {
            const {attributes, clientId} = this.props;
            let $container = $(`#block-${clientId} .wpmf-gallery-list-items`);
            if ($container.is(':hidden')) {
                return;
            }

            imagesLoaded($container, function () {
                let containerWidth = $container.width();
                let columnWidth = containerWidth / parseInt(attributes.columns);
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
        doSort(wpmf_orderby, wpmf_order) {
            const {attributes, setAttributes} = this.props;
            const {images, image_sortable} = attributes;
            let images_ordered;
            // Order images
            switch (wpmf_orderby) {
                default:
                case 'title':
                    if (wpmf_order === 'DESC') {
                        images_ordered = [].concat(images)
                            .sort((a, b) => {
                                if (typeof a.title !== "undefined" && typeof b.title !== "undefined") {
                                    return b.title.localeCompare(a.title);
                                } else {
                                    return b.url.localeCompare(a.url);
                                }
                            });
                    } else {
                        images_ordered = [].concat(images)
                            .sort((a, b) => {
                                if (typeof a.title !== "undefined" && typeof b.title !== "undefined") {
                                    return a.title.localeCompare(b.title)
                                } else {
                                    return a.url.localeCompare(b.url)
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
                        images_ordered = [].concat(images)
                            .sort((a, b) => new Date(b.id).getTime() - new Date(a.id).getTime());
                    } else {
                        images_ordered = [].concat(images)
                            .sort((a, b) => new Date(a.id).getTime() - new Date(b.id).getTime());
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
        sortImageOrderBy(value) {
            const {attributes} = this.props;
            const {wpmf_order} = attributes;
            this.doSort(value, wpmf_order);
        }

        /**
         * Set images order
         */
        sortImageOrder(value) {
            const {attributes} = this.props;
            const {wpmf_orderby} = attributes;
            this.doSort(wpmf_orderby, value);
        }

        /**
         * Load image infos
         */
        loadImageInfos(image) {
            if (this.state.selectedImageId !== image.id) {
                this.setState({
                    selectedImageInfos: {
                        title: image.title,
                        caption: image.caption
                    }
                });
            }

            this.setState({selectedImageId: (this.state.selectedImageId === image.id) ? 0 : image.id})
        }

        /**
         * Update image info
         */
        updateImageInfos() {
            const {attributes, setAttributes} = this.props;
            const {images} = attributes;
            $('.save_img_action span').addClass('visible');
            fetch(wpmf_blocks.vars.ajaxurl + `?action=gallery_block_update_image_infos&id=${this.state.selectedImageId}&title=${this.state.selectedImageInfos.title}&caption=${this.state.selectedImageInfos.caption}&wpmf_nonce=${wpmf_blocks.vars.wpmf_nonce}`)
                .then(res => res.json())
                .then(
                    (result) => {
                        $('.save_img_action span').removeClass('visible');
                        if (result.status) {
                            const imageFetch = images.map((img) => {
                                if (img.id === this.state.selectedImageId) {
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
                    (error) => {
                        this.setState({
                            selectedImageInfos: {
                                title: '',
                                caption: ''
                            }
                        });
                    }
                )
        }

        /**
         * Un Selected image
         */
        unSelectedImage(e) {
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
        onSelectImages(imgss) {
            const {attributes, setAttributes} = this.props;
            const {images, wpmf_orderby, wpmf_order} = attributes;


            const imgs = imgss.map((img) => wp.media.attachment(img.id).attributes);
            let check = false;
            setAttributes({
                images: imgs,
                image_sortable: imgs
            });

            if (images.length <= imgs.length) {
                if (images.length) {
                    images.map((img, index) => {
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
                imgs.map((img, index) => {
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
        uploadFromFiles(event) {
            this.addFiles(event.target.files);
        }

        /**
         * Add files
         */
        addFiles(files) {
            const {attributes, setAttributes} = this.props;
            const {images} = attributes;
            mediaUpload({
                allowedTypes: ALLOWED_MEDIA_TYPES,
                filesList: files,
                onFileChange: (imgs) => {
                    const imagesNormalized = imgs.map((image) => {
                        return pickRelevantMediaFiles(image);
                    });

                    setAttributes({
                        images: images.concat(imagesNormalized),
                        image_sortable: images.concat(imagesNormalized)
                    });
                }
            });
        }

        render() {
            const {attributes, setAttributes, className, isSelected} = this.props;
            const {images, display, columns, size, targetsize, link, wpmf_orderby, wpmf_order, autoplay} = attributes;
            const list_sizes = Object.keys(wpmf_blocks.vars.sizes).map((key, label) => {
                return {
                    label: wpmf_blocks.vars.sizes[key],
                    value: key
                }
            });

            const controls = (
                <BlockControls>
                    {images.length && (
                        <Toolbar>
                            <MediaUpload
                                onSelect={(imgs) => this.onSelectImages(imgs)}
                                allowedTypes={ALLOWED_MEDIA_TYPES}
                                multiple
                                gallery
                                value={images.map((img) => img.id)}
                                render={({open}) => (
                                    <IconButton
                                        className="components-toolbar__control"
                                        label={__('Edit Gallery')}
                                        icon="edit"
                                        onClick={open}
                                    />
                                )}
                            />
                        </Toolbar>
                    )}
                </BlockControls>
            );

            if (images.length === 0) {
                return (
                    <Placeholder
                        icon="format-gallery"
                        label={__('WP Media Folder Gallery')}
                        instructions={__('No images selected. Adding images to start using this block.')}
                        className={className}
                    >
                        <FormFileUpload
                            multiple
                            isLarge
                            className="editor-media-placeholder__button"
                            onChange={this.uploadFromFiles}
                            accept="image/*"
                            icon="upload"
                        >
                            {__('Upload')}
                        </FormFileUpload>
                        <MediaUpload
                            gallery
                            multiple
                            onSelect={(imgs) => this.onSelectImages(imgs)}
                            accept="image/*"
                            allowedTypes={ALLOWED_MEDIA_TYPES}
                            render={({open}) => (
                                <Button
                                    isLarge
                                    className="editor-media-placeholder__button"
                                    onClick={open}
                                >
                                    {__('Media Library')}
                                </Button>
                            )}
                        />
                    </Placeholder>
                );
            }

            if (images.length) {
                return (
                    <Fragment>
                        {controls}
                        <div className="wpmf-gallery-block" onClick={this.unSelectedImage.bind(this)}>
                            <InspectorControls>
                                {this.state.selectedImageId === 0 &&
                                <PanelBody title={__('Gallery Settings')}>
                                    <SelectControl
                                        label={__('Theme')}
                                        value={display}
                                        options={[
                                            {label: __('Default'), value: 'default'},
                                            {label: __('Masonry'), value: 'masonry'},
                                            {label: __('Portfolio'), value: 'portfolio'},
                                            {label: __('Slider'), value: 'slider'},
                                        ]}
                                        onChange={(value) => setAttributes({display: value})}
                                    />

                                    <SelectControl
                                        label={__('Columns')}
                                        value={columns}
                                        options={[
                                            {label: 1, value: '1'},
                                            {label: 2, value: '2'},
                                            {label: 3, value: '3'},
                                            {label: 4, value: '4'},
                                            {label: 5, value: '5'},
                                            {label: 6, value: '6'},
                                            {label: 7, value: '7'},
                                            {label: 8, value: '8'},
                                            {label: 9, value: '9'},
                                        ]}
                                        onChange={(value) => setAttributes({columns: value})}
                                    />

                                    <SelectControl
                                        label={__('Gallery image size')}
                                        value={size}
                                        options={list_sizes}
                                        onChange={(value) => setAttributes({size: value})}
                                    />

                                    <SelectControl
                                        label={__('Lightbox size')}
                                        value={targetsize}
                                        options={list_sizes}
                                        onChange={(value) => setAttributes({targetsize: value})}
                                    />

                                    <SelectControl
                                        label={__('Action on click')}
                                        value={link}
                                        options={[
                                            {label: __('Lightbox'), value: 'file'},
                                            {label: __('Attachment Page'), value: 'post'},
                                            {label: __('None'), value: 'none'},
                                        ]}
                                        onChange={(value) => setAttributes({link: value})}
                                    />

                                    <SelectControl
                                        label={__('Order by')}
                                        value={wpmf_orderby}
                                        options={[
                                            {label: __('Custom'), value: 'post__in'},
                                            {label: __('Random'), value: 'rand'},
                                            {label: __('Title'), value: 'title'},
                                            {label: __('Date'), value: 'date'}
                                        ]}
                                        onChange={this.sortImageOrderBy.bind(this)}
                                    />

                                    <SelectControl
                                        label={__('Order')}
                                        value={wpmf_order}
                                        options={[
                                            {label: __('Ascending'), value: 'ASC'},
                                            {label: __('Descending '), value: 'DESC'}
                                        ]}
                                        onChange={this.sortImageOrder.bind(this)}
                                    />

                                    {
                                        display === 'slider' && <ToggleControl
                                            label={__('Autoplay')}
                                            checked={autoplay}
                                            onChange={() => setAttributes({autoplay: (autoplay === 1) ? 0 : 1})}
                                        />
                                    }
                                </PanelBody>
                                }

                                {this.state.selectedImageId !== 0 &&
                                <PanelBody title={__('Image Settings')}>
                                    <TextControl
                                        label={__('Title')}
                                        value={this.state.selectedImageInfos.title}
                                        onChange={(value) => {
                                            this.setState({
                                                selectedImageInfos: {
                                                    ...this.state.selectedImageInfos,
                                                    title: value
                                                }
                                            })
                                        }}
                                    />
                                    <TextControl
                                        label={__('Caption')}
                                        value={this.state.selectedImageInfos.caption}
                                        onChange={(value) => {
                                            this.setState({
                                                selectedImageInfos: {
                                                    ...this.state.selectedImageInfos,
                                                    caption: value
                                                }
                                            })
                                        }}
                                    />
                                    <div className="save_img_action">
                                        <Button className="is-button is-default is-primary is-large"
                                                onClick={this.updateImageInfos.bind(this)}>
                                            {__('Save')}
                                        </Button>
                                        <span className="spinner"> </span>
                                    </div>
                                </PanelBody>
                                }
                            </InspectorControls>

                            <div className={"wpmf-gallery-list-items gallery-columns-" + columns}>
                                {images.map((image, index) => {
                                    let url = '';
                                    if (typeof image.media_details !== "undefined" && typeof image.media_details.sizes !== "undefined" && typeof image.media_details.sizes[size] !== "undefined") {
                                        url = image.media_details.sizes[size].source_url;
                                    } else if ((typeof image.sizes !== "undefined" && typeof image.sizes[size] !== "undefined")) {
                                        url = image.sizes[size].url;
                                    } else {
                                        url = image.url;
                                    }

                                    if ((typeof image.media_details !== "undefined" && typeof image.media_details.sizes !== "undefined" && typeof image.media_details.sizes[size] !== "undefined") || (typeof image.sizes !== "undefined" && typeof image.sizes[size] !== "undefined") || typeof image.url !== "undefined") {
                                        return (
                                            <div
                                                className={(isBlobURL(url)) ? "wpmf-gallery-block-item is-transient" : "wpmf-gallery-block-item "}
                                                key={index}>
                                                <div className="wpmf-gallery-block-item-infos">
                                                    <img
                                                        src={url}
                                                        className={(this.state.selectedImageId === image.id) ? 'wpmf-gallery-image active' : 'wpmf-gallery-image'}
                                                        onClick={this.loadImageInfos.bind(this, image)}
                                                    />
                                                    {isBlobURL(url) && <span className="spinner"> </span>}
                                                    <Tooltip text={__('Remove image')}>
                                                        <IconButton
                                                            className="wpmf-gallery-block-item-remove"
                                                            icon="no"
                                                            onClick={() => {
                                                                this.setState(
                                                                    {
                                                                        selectedImageId: 0,
                                                                        selectedImageInfos: {
                                                                            title: '',
                                                                            caption: ''
                                                                        }
                                                                    }
                                                                );
                                                                setAttributes({
                                                                    images: images.filter((img, i) => i !== index),
                                                                    image_sortable: images.filter((img, i) => i !== index)
                                                                })
                                                            }}
                                                        />
                                                    </Tooltip>
                                                </div>
                                            </div>
                                        )
                                    }
                                })}
                            </div>
                            {isSelected &&
                            <div className="blocks-gallery-item has-add-item-button">
                                <FormFileUpload
                                    multiple
                                    isLarge
                                    className="block-library-gallery-add-item-button"
                                    onChange={this.uploadFromFiles}
                                    accept="image/*"
                                    icon="insert"
                                >
                                    {__('Upload an image')}
                                </FormFileUpload>
                            </div>
                            }
                        </div>
                    </Fragment>
                );
            }
        }
    }

    const galleryAttrs = {
        images: {
            type: 'array',
            default: []
        },
        is_update_image: {
            type: 'boolean',
            default: false,
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
        },
    };

    registerBlockType(
        'wpmf/wordpress-gallery', {
            title: wpmf_blocks.l18n.block_gallery_title,
            icon: 'format-gallery',
            category: 'wp-media-folder',
            attributes: galleryAttrs,
            edit: wpmfWordpressGallery,
            save: ({attributes}) => {
                const {images, display, columns, size, targetsize, link, wpmf_orderby, wpmf_order, wpmf_autoinsert, autoplay} = attributes;
                let gallery_shortcode = '[gallery';

                let ids = images.map((img) => img.id);
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
        }
    );
})(wp.i18n, wp.blocks, wp.element, wp.editor, wp.components);