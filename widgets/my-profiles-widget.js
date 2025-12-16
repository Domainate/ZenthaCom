const { registerBlockType } = wp.blocks;
const { __ } = wp.i18n;
const { ServerSideRender, PanelBody, TextControl } = wp.components;
const { InspectorControls, useBlockProps } = wp.blockEditor;
const { createElement, Fragment } = wp.element;

registerBlockType('hello-blocks-child/my-profiles-dropdown', {
    apiVersion: 2,
    title: __('My Profiles Dropdown', 'hello-blocks-child'),
    icon: 'admin-users',
    category: 'widgets',
    attributes: {
        width: {
            type: 'string',
            default: '100%',
        },
    },
    edit: function (props) {
        const { attributes, setAttributes } = props;
        const blockProps = useBlockProps({ style: { width: attributes.width } });

        return createElement(Fragment, {}, 
            createElement(InspectorControls, { key: 'inspector' },
                createElement(PanelBody, { title: __('Style Settings', 'hello-blocks-child') },
                    createElement(TextControl, {
                        label: __('Width', 'hello-blocks-child'),
                        value: attributes.width,
                        onChange: (value) => setAttributes({ width: value }),
                        help: __('e.g., 200px or 50%', 'hello-blocks-child'),
                    })
                )
            ),
            createElement('div', { ...blockProps, key: 'preview' },
                createElement(ServerSideRender, {
                    block: 'hello-blocks-child/my-profiles-dropdown',
                    attributes: attributes,
                })
            )
        );
    },
});