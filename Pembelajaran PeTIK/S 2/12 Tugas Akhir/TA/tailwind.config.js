/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    
    extend: {
      screens: {
      'hpK': '360px',
      // => @media (min-width: 360px) { ... }

      'hpG': '480px',
      // => @media (min-width: 480px) { ... }

      'tablet': '640px',
      // => @media (min-width: 640px) { ... }

      'nav': '845px',
      // => @media (min-width: 845px) { ... }
      
      'crs': '541px',
      // => @media (min-width: 541px) { ... }
      
      'crs1': '752px',
      // => @media (min-width: 752px) { ... }
      
      'crs2': '923px',
      // => @media (min-width: 923px) { ... }
      
      'crs3': '1094px',
      // => @media (min-width: 1094px) { ... }
      
      'crs4': '1265px',
      // => @media (min-width: 1265px) { ... }

      // sm	640px	@media (min-width: 640px) { ... }
      // md	768px	@media (min-width: 768px) { ... }
      // lg	1024px	@media (min-width: 1024px) { ... }
      // xl	1280px	@media (min-width: 1280px) { ... }
      // 2xl	1536px	@media (min-width: 1536px) { ... }
    },
      maxWidth: {
        '1/2': '50%',
      }
    },
  },
  plugins: [],
}

