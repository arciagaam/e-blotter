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

          blue: {
            default: "#0063A3",
            dark: "#004F83",
          },

          yellow: "#FBAD26"
          
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