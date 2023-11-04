/** @type {import('tailwindcss').Config} */
export default {
    content: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
    theme: {
        fontFamily: {
            roboto: ["Roboto", "sans-serif"],
            mono: ["Roboto Mono", "monospace"],
        },
        extend: {},
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: "#570df8",

                    secondary: "#f000b8",

                    accent: "#1dcdbc",

                    neutral: "#2b3440",

                    "base-100": "#ffffff",

                    info: "#3abff8",

                    success: "#36d399",

                    warning: "#fbbd23",

                    error: "#f87272",
                },
            },
        ],
    },
};
