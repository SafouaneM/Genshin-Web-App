module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    extend: {
        backgroundImage: theme => ({
            'main-bg': "url('/img/Genshin_App_Background.png')"
        })
    },
      variants: {
          width: ["responsive", "hover", "focus"]
      }
  },
  plugins: [],
}
