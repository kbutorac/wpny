// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;
const plugin = require('tailwindcss/plugin');
module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
		'./theme/theme.json',
	],
	theme: {
		// Extend the default Tailwind theme.
		container: {
				center: true,
				// default breakpoints but with 40px removed
				padding: {
						DEFAULT: '0',
				},
				screens: {
					sm: '100%',
					md: '100%',
					lg: '100%',
					xl: '1280px',
				},
			},

		extend: {
		  aspectRatio: {
				'3/4': '3 / 4',
      },
			animation: {
				fadeIn: 'fadeIn .75s ease-in-out',
				fadeOut: 'fadeOut .75s ease-out',
			},
			fontFamily: {
				default: ['Eina01', 'sans-serif'],
			},
			keyframes: {
				fadeIn: {
					'0%': { opacity: 0 },
					'100%': { opacity: 1 },
				},
				fadeOut: {
					'0%': { opacity: 1 },
					'100%': { opacity: 0 },
				},
			},
			typography: {
				DEFAULT: {
					css: {
						a:{
							color: '#000000',
						}
					},
				},
			},
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		require('@tailwindcss/aspect-ratio'),
		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson')(require('../theme/theme.json')),
		
		plugin(function({ addVariant }) {
				addVariant('current', '&.active');
		})
		// Add Tailwind Typography.
		//require('@tailwindcss/typography'),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require('@tailwindcss/forms'),
		// require('@tailwindcss/aspect-ratio'),
		// require('@tailwindcss/container-queries'),
		//require('tailwind-container-break-out'),
	],
	safelist: [
		{
			pattern: /^(p|m)(\w?)-/,
			variants: ['sm', 'md', 'lg'],
		},
		 {pattern: /grid-cols-./},
		 'justify-end',
		 'justify-center',
		 'md:justify-center',
		 'hover:text-gray',
	],
};
