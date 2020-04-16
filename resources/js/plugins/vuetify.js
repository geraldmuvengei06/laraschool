// /plugins/vuetify.js
// import '@fortawesome/fontawesome-free/css/all.css'

import 'material-design-icons-iconfont/dist/material-design-icons.css'
import Vue from 'vue'
import Vuetify from 'vuetify'
// import 'vuetify/dist/vuetify.min.css'
import 'vuetify/lib'

Vue.use(Vuetify)

const opts = {
    theme: {
        themes: {
            light:  {
                // primary: '#2196f3',
                // info: '#00bcd4',
                // success: '#4caf50',
                // error: '#ff5722',
                
                
                primary: "#9652ff",
                success: "#3cd1c2",
                info: "#ffaa2c",
                error: "#f83e70",

                secondary: '#673ab7',
                accent: '#263238',
                warning: '#ff9800',
            }
        },

        icons: {
            iconfont: 'md', // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'
        },

        options: {
            minifyTheme: function (css) {
              return process.env.NODE_ENV === 'production'
                ? css.replace(/[\r\n|\r|\n]/g, '')
                : css
            },
        },
    }
}

export default new Vuetify(opts)