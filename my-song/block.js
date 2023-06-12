/**
 * Gutenberg Block
 *
 * @link https://developer.wordpress.org/block-editor/developers/
 * 
 * @package MY SONG
 * @since 0.13
 */

(function () {

	// Internationalization
	var __ = wp.i18n.__;
	// Creating Elements
	var el = wp.element.createElement;
	// Register Blocks
	var registerBlockType = wp.blocks.registerBlockType;

	/**
	 * Register Basic Block.
	 *
	 * Registers a new block provided a unique name and an object defining its
	 * behavior. Once registered, the block is made available as an option to any
	 * editor interface where blocks are implemented.
	 *
	 * @param  {string}   name     Block name.
	 * @param  {Object}   settings Block settings.
	 * @return {?WPBlock}          The block, if it has been successfully
	 *                             registered; otherwise `undefined`.
	 */

	registerBlockType('my/my', {

		title: __('MY SONG', 'my'),
		icon: 'format-audio',
		category: 'widgets',

		edit:
			function (props) {

				var my_random_text = myParams.my_random;
				return el(
					'p',
					{ className: props.className },
					my_random_text
				);
			},

		save: function (props) {

			var my_random_text = myParams.my_random;
			// Rending will be made via PHP-Fallback function
			return null;
		},

	}); // Register Block Type

})(); // function