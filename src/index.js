import {registerBlockType} from '@wordpress/blocks';
import './style.scss';

/**
 * Internal dependencies
 */
import Edit from './edit';

registerBlockType('takiainen/asteriski-sponsors', {
	title: 'Sponsors',
	icon: 'list-view',
	category: 'widgets',
	supports: {
		html: false,
		inserter: false,
	},
	/**
	 * @see ./edit.js
	 */
	edit: Edit,

	save() {
		return null;
	},
});
