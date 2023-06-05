/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        project: {
          gray: {
            default: '#252A2E',
            light: "#F1F1F6",
          },

          neutral: {
            default: '#E5E5E5',
            dark: '#DDDDDD',
            darker: '#D9D9D9'
          },

          blue: {
            light: '#b3d6ed',
            light2: '#a2cbe5',
            light3: '#92beda',
            default: "#0063A3",
            dark: "#004F83",
            darker: "#024977",
          },

          yellow: {
            default: "#FBAD26",
            dark: '#EBA328',
            darker: '#D6972B'
          },

          red: {
            light: '#fda4af',
            light2: '#f496a2',
            light3: '#f08b97'
          },

          green: {
            light: '#6ee7b7',
            light2: '#5fdcaa',
            light3: '#53d19f',
          }
        },
        table: {
          even: '#E1E7ED',
          odd: '#FFFFFF'
        }
      },
      keyframes: {
        ping: {
          '75%, 100%': {
            transform: 'scale(1.5)',
            opacity: 0,
          }
        }
      }
    },
  },
  plugins: [],
}