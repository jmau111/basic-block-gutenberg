import "./style.scss"

import { registerBlockType } from '@wordpress/blocks';
import { __ } from "@wordpress/i18n";

registerBlockType('basic-block-gutenberg/baby', {
    title: __('Basic gutenberg block', 'basic-block-gutenberg'),
    category: 'common',
    edit: (props) => {
        const { className } = props;
        return (
            markup(className)
        );
    },
    save: (props) => {
        const { className } = props;
        return (
            markup(className)
        );
    },
})

const markup = (theClass) => {
    return <div className={theClass}>
        <h2>{__('Custom title', 'basic-block-gutenberg')}</h2>
        <p>{__('This is really important!', 'basic-block-gutenberg')}</p>
    </div>;
}
