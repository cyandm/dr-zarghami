/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ["./**/*.{php,js}"],
  theme: {
    extend: {
      colors: {
        black: {
          1: "#17242F",
          2: "#10121D",
          3: "#050507",
          4: "linear-gradient(#050507_#10121D)",
        },
        white: {
          1: "rgba(255,255,255,0.13)",
          2: "hsla(194,100%,96%,1)",
        },
        gray: {
          1: "#475667",
          2: "#A6B2B9",
          3: "#221b3b",
        },
        alert: {
          success: "#688b62",
          warning: "#ff6347",
          error: "#f2b463",
        },
        blue: {
          1: "#86c0df",
          2: "#002864",
          3: "#1C82AD",
        },
        cyn: {
          1: "#ffa5a5",
          // '2': '#1dbacf',
        },
      },
      fontSize: {
        title: "4.5rem",
        title1: "2.5rem",
        title2: "1.75rem",
      },
      fontSize: {
        title_1: "64px",
        title_2: "58px",
        h1: "36px",
        h2: "28px",
        h3: "24px",
        h4: "20px",
        h5: "16px",
        h6: "14px",
        body: "16px",
        body_s: "16px",
        caption: "12px",
      },
    },
  },
  plugins: [
    require("@tailwindcss/typography"),
    // ...
  ],
};
