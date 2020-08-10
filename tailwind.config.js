module.exports = {
  corePlugins: {
    container: false
  },
  plugins: [
    function ({ addComponents }) {
      addComponents({
        '.container': {
          maxWidth: '100%',
        }
      })
    }
	],
	theme: {
		extend: {
			colors: {
				'nodal': '#4256A2',
				'nucleus': '#50BCBC',
				'terminal': '#103643'
			}
		},
		fontFamily: {
			'display': ['Merriweather', 'serif'],
			'body': ['Lato', 'sans-serif'],
		}
	},
  variants: {
    textColor: ['responsive', 'hover', 'focus', 'group-hover'],
    backgroundColor: ['responsive', 'hover', 'focus', 'group-hover'],
  },
}
