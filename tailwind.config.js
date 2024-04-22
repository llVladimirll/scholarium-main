/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["../dist/users_pages/*.{html,js}"],
  theme: {
    extend: {
      backgroundImage: {
        'hero-pattern': "url('../dist/users_pages/image/graduate.jpg')",
        'login': "url('./dist/assets/image/login-icon.svg')", 
      },
      fontFamily:{
        'Raleway' : ['Raleway', 'sans-serif'],
      },
      colors:{
        'night' : "#121212",
        'light' : "#E9E9E9",
        'hover' : "#222222",

      }
    
    },

  },
  plugins: [

  ],

}

