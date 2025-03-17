import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: "selector",
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            gridTemplateColumns: {
                fluid: "repeat(auto-fit, minmax(20rem, 1fr))",
            },
            animation: {
                show: "show 200ms ease-in",
                flash: "flash 5s ease-out",
            },
            keyframes: {
                show: {
                    from: { opacity: "0" },
                    to: { opacity: "1" },
                },
                flash: {
                    "0%, 80%": { opacity: 1 },
                    "100%": { opacity: 0 },
                },
            },
        },
    },
    plugins: [],
};
