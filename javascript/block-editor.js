/* global wp */

/**
 * Block editor modifications
 *
 * This file is loaded only by the block editor. Use it to modify the block
 * editor via its APIs.
 *
 * The JavaScript code you place here will be processed by esbuild, and the
 * output file will be created at `../theme/js/block-editor.min.js` and
 * enqueued in `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

wp.domReady(() => {
	/**
	 * Add support for Tailwind Typography’s `lead` class via a block style.
	 */


	wp.blocks.registerBlockStyle( 'core/columns', {
		name: 'reverse-mobile',
		label: 'Reverse On Mobile',
	});

	wp.blocks.registerBlockStyle( 'core/heading', {
		name: 'underline',
		label: 'Underline',
	});

	
});
