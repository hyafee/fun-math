/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        colors: {
            'primary': '#262A4E',
            'white': '#fff',
            'black': '#000',
            'yellow': '#F5BB3D',
            'blue': '#3E9FFF',
            'green': '#26C8BC'
        }
    },
    plugins: [],
}

