import { registerBlockType } from '@wordpress/blocks';
import { RichText } from '@wordpress/block-editor';
import './style.scss';
import './editor.scss';

registerBlockType('ayata-blazing/custom-message', {
  title: 'Custom Message',
  icon: 'admin-comments',
  category: 'common',
  attributes: {
    content: {
      type: 'string',
      source: 'html',
      selector: 'p',
    },
  },
  edit({ attributes, setAttributes }) {
    const { content } = attributes;
    return (
      <RichText
        tagName='p'
        value={content}
        onChange={(content) => setAttributes({ content })}
        placeholder='Write your custom message here...'
      />
    );
  },
  save({ attributes }) {
    const { content } = attributes;
    return <RichText.Content tagName='p' value={content} />;
  },
});
