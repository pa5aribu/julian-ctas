module.exports = {
  corePlugins: {
    container: false
  },
  plugins: [
    function ({ addComponents }) {
      addComponents({
        '.container': {
					marginLeft: 'auto',
					marginRight: 'auto',
          maxWidth: '100%',
          '@screen sm': {
            maxWidth: '640px',
          },
          '@screen md': {
            maxWidth: '768x',
          },
          '@screen lg': {
            maxWidth: '1024px',
          },
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
		}
	}
}
