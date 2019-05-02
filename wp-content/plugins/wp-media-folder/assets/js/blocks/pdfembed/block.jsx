(function (wpI18n, wpBlocks, wpElement, wpEditor, wpComponents) {
    const {__} = wpI18n;
    const {Component} = wpElement;
    const {registerBlockType} = wpBlocks;
    const {InspectorControls, MediaUpload} = wpEditor;
    const {PanelBody, SelectControl, TextControl, Button} = wpComponents;

    class wpmfPdfEmbed extends Component {
        constructor() {
            super(...arguments);
        }

        render() {
            const {attributes, setAttributes} = this.props;
            const {id, embed, target} = attributes;
            let pdf_shortcode = '[wpmfpdf';
            pdf_shortcode += ' id="' + id + '"';
            pdf_shortcode += ' embed="' + embed + '"';
            pdf_shortcode += ' target="' + target + '"';
            pdf_shortcode += ']';
            return (
                <div className="wp-block-shortcode">
                    {
                        (id !== 0) && <div className="wpmf-pdf-block">
                            <InspectorControls>
                                <PanelBody title={__('PDF Settings')}>
                                    <SelectControl
                                        label={__('Embed')}
                                        value={embed}
                                        options={[
                                            {label: __('On'), value: 1},
                                            {label: __('Off'), value: 0}
                                        ]}
                                        onChange={(value) => setAttributes({embed: parseInt(value)})}
                                    />

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
                            <TextControl
                                value={pdf_shortcode}
                                className="wpmf_pdf_value"
                                autoComplete="off"
                                readOnly
                            />
                        </div>
                    }

                    <MediaUpload
                        onSelect={(img) => setAttributes({id: parseInt(img.id)})}
                        accept="application/pdf"
                        allowedTypes={'application/pdf'}
                        render={({open}) => {
                            return (
                                <Button
                                    isLarge
                                    className="editor-media-placeholder__button wpmf-pdf-button"
                                    onClick={open}
                                >
                                    {(id === 0) ? __('Add PDF') : __('Edit PDF')}
                                </Button>
                            )
                        }}
                    />
                </div>
            );
        }
    }

    registerBlockType(
        'wpmf/pdfembed', {
            title: wpmf_pdf_blocks.l18n.block_pdf_title,
            icon: 'media-code',
            category: 'wp-media-folder',
            attributes: {
                id: {
                    type: 'number',
                    default: 0
                },
                embed: {
                    type: 'number',
                    default: 1,
                },
                target: {
                    type: 'string',
                    default: '',
                }
            },
            edit: wpmfPdfEmbed,
            save: ({attributes}) => {
                const {id, embed, target} = attributes;
                let pdf_shortcode = '[wpmfpdf';
                pdf_shortcode += ' id="' + id + '"';
                pdf_shortcode += ' embed="' + embed + '"';
                pdf_shortcode += ' target="' + target + '"';
                pdf_shortcode += ']';
                return pdf_shortcode;
            }
        }
    );
})(wp.i18n, wp.blocks, wp.element, wp.editor, wp.components);