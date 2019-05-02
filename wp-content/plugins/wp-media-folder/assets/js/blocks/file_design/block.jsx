(function (wpI18n, wpBlocks, wpElement, wpEditor, wpComponents) {
    const {__} = wpI18n;
    const {Component, Fragment} = wpElement;
    const {registerBlockType} = wpBlocks;
    const {InspectorControls, MediaUpload, BlockControls} = wpEditor;
    const {PanelBody, SelectControl, Toolbar, Button, IconButton} = wpComponents;

    class wpmfFileDesign extends Component {
        constructor() {
            super(...arguments);
        }

        render() {
            const {attributes, setAttributes} = this.props;
            const {id, file, target} = attributes;
            const controls = (
                <BlockControls>
                    {id !== 0 && (
                        <Toolbar>
                            <MediaUpload
                                onSelect={(file) => setAttributes({id: file.id, file: file})}
                                accept="application"
                                allowedTypes={'application'}
                                render={({open}) => (
                                    <IconButton
                                        className="components-toolbar__control"
                                        label={__('Edit File')}
                                        icon="edit"
                                        onClick={open}
                                    />
                                )}
                            />
                        </Toolbar>
                    )}
                </BlockControls>
            );

            let mime = '';
            let size = 0;
            if (id !== 0) {
                let mimetype = file.mime.split('/');
                if (typeof mimetype !== "undefined" && typeof mimetype[1] !== "undefined") {
                    mime = mimetype[1].toUpperCase()
                }
                if (file.filesizeInBytes < 1024 * 1024) {
                    size = file.filesizeInBytes / 1024;
                    size = size.toFixed(1);
                    size += ' kB'
                } else if (file.filesizeInBytes > 1024 * 1024) {
                    size = file.filesizeInBytes / (1024 * 1024);
                    size = size.toFixed(1);
                    size += ' MB'
                }
            }

            return (
                <Fragment>
                    {controls}
                    <div className="wp-block-shortcode">
                        {
                            (id !== 0) && <div className="wpmf-file-design-block">
                                <InspectorControls>
                                    <PanelBody title={__('File Design Settings')}>
                                        <SelectControl
                                            label={__('Target')}
                                            value={target}
                                            options={[
                                                {label: __('Same Window'), value: ''},
                                                {label: __('New Window'), value: '_blank'}
                                            ]}
                                            onChange={(value) => setAttributes({target: value})}
                                        />
                                    </PanelBody>
                                </InspectorControls>
                                <div data-id={id}>
                                    <a
                                        className="wpmf-defile"
                                        href={file.url}
                                        rel="noopener noreferrer"
                                        target={target} data-id={id}>
                                        <div className="wpmf-defile-title"><b>{file.title}</b></div>
                                        <span className="wpmf-single-infos">
                                    <b>{__('Size: ')} </b>{size}
                                            <b>{__(' Format: ')} </b></span>{mime}
                                    </a>
                                </div>
                            </div>
                        }

                        {
                            id === 0 && <MediaUpload
                                onSelect={(file) => setAttributes({id: file.id, file: file})}
                                accept="application"
                                allowedTypes={'application'}
                                render={({open}) => {
                                    return (
                                        <Button
                                            isLarge
                                            className="editor-media-placeholder__button wpmf-pdf-button"
                                            onClick={open}
                                        >
                                            {__('Add File')}
                                        </Button>
                                    )
                                }}
                            />
                        }
                    </div>
                </Fragment>
            );
        }
    }

    const fileDesignAttrs = {
        id: {
            type: 'number',
            default: 0
        },
        file: {
            type: 'object',
            default: {},
        },
        target: {
            type: 'string',
            default: '',
        }
    };

    registerBlockType(
        'wpmf/filedesign', {
            title: __('WP Media Folder File Design'),
            icon: 'media-archive',
            category: 'wp-media-folder',
            attributes: fileDesignAttrs,
            edit: wpmfFileDesign,
            save: ({attributes}) => {
                const {id, file, target} = attributes;

                let mime = '';
                let size = 0;
                if (id !== 0) {
                    let mimetype = file.mime.split('/');
                    if (typeof mimetype !== "undefined" && typeof mimetype[1] !== "undefined") {
                        mime = mimetype[1].toUpperCase()
                    }
                    if (file.filesizeInBytes < 1024 * 1024) {
                        size = file.filesizeInBytes / 1024;
                        size = size.toFixed(1);
                        size += ' kB'
                    } else if (file.filesizeInBytes > 1024 * 1024) {
                        size = file.filesizeInBytes / (1024 * 1024);
                        size = size.toFixed(1);
                        size += ' MB'
                    }
                }

                return <div data-id={id}>
                    <a
                        className="wpmf-defile"
                        href={file.url}
                        rel="noopener noreferrer"
                        target={target} data-id={id}>
                        <div className="wpmf-defile-title"><b>{file.title}</b></div>
                        <span className="wpmf-single-infos">
                                    <b>{__('Size: ')} </b>{size}
                            <b>{__(' Format: ')} </b></span>{mime}
                    </a>
                </div>;
            },
            deprecated: [
                {
                    attributes: fileDesignAttrs,
                    save: ({attributes}) => {
                        const {id, file, target} = attributes;

                        let mime = '';
                        let size = 0;
                        if (id !== 0) {
                            let mimetype = file.mime.split('/');
                            if (typeof mimetype !== "undefined" && typeof mimetype[1] !== "undefined") {
                                mime = mimetype[1].toUpperCase()
                            }
                            if (file.filesizeInBytes < 1024 * 1024) {
                                size = file.filesizeInBytes / 1024;
                                size = size.toFixed(1);
                                size += ' kB'
                            } else if (file.filesizeInBytes > 1024 * 1024) {
                                size = file.filesizeInBytes / (1024 * 1024);
                                size = size.toFixed(1);
                                size += ' MB'
                            }
                        }

                        return <div data-id={id}>
                            <a
                                className="wpmf-defile"
                                href={file.url}
                                target={target} data-id={id}>
                                <div className="wpmf-defile-title"><b>{file.title}</b></div>
                                <span className="wpmf-single-infos">
                                    <b>{__('Size: ')} </b>{size}
                                    <b>{__(' Format: ')} </b></span>{mime}
                            </a>
                        </div>;
                    },
                }
            ]
        }
    );
})(wp.i18n, wp.blocks, wp.element, wp.editor, wp.components);