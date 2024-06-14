/** @type {import('tailwindcss').Config} config */
const config = {
  content: [
    "./plugin-name.php",
    "./src/**/*.php",
    "./resources/**/*.{php,vue,js,ts}",
  ],
  theme: {
    extend: {
      colors: {
        gray: {
          100: "#f2f2f2",
        },
      }, // Extend Tailwind's default colors
    },
  },
  plugins: [],
};

export default config;
