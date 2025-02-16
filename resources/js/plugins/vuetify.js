import '@mdi/font/css/materialdesignicons.css'; // Ensure you are using css-loader
import 'vuetify/styles';
// Vuetify
import { AppLightTheme } from '@/themes/AppLightTheme';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

const theme = {
    defaultTheme: 'AppLightTheme',
    themes: {
        AppLightTheme,
    },
};

const conf = {
    components,
    directives,
    theme,
};
export const vuetify = createVuetify(conf);

export const ssr = createVuetify({
    ...conf,
    ssr: true,
});
