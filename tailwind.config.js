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
            default: "#0063A3",
            dark: "#004F83",
            darker: "#024977",
          },

          yellow: {
            default: "#FBAD26",
            dark: '#EBA328',
            darker: '#D6972B'
          },
          
        },

        table: {
          even: '#E1E7ED',
          odd: '#FFFFFF'
        }
      }
    },
  },
  plugins: [],
}