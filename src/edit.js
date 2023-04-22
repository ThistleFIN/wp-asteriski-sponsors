import {__} from '@wordpress/i18n';
import {useBlockProps} from '@wordpress/block-editor';

export default function Edit() {
	const blockProps = useBlockProps();

	return (
	<div {...blockProps}>
		<h4>
			{__('Sponsors are rendered in frontend.', 'asteriski-sponsors')}
		</h4>
	</div>
	);
}
