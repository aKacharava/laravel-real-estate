import formsPlugin from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
      './storage/framework/views/*.php',
      './resources/views/**/*.blade.php',
      './resources/js/**/*.vue',
  ],
  theme: {
    extend: {},
  },
  plugins: [formsPlugin],
}

