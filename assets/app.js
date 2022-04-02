/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/saga-blue/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';

const appObj = {};

const app = createApp(appObj);

app.use(PrimeVue);

app.config.compilerOptions.delimiters = ['${', '}$'];

window.appObj = appObj;
window.app = app;
window.registerComponent = (componentName, componentSource) => {
    app.component(componentName, componentSource);
}
window.registerPrimeVueComponent = (componentName, componentSource) => {
    import(/* webpackMode: "eager" */`primevue/${componentSource}/${componentSource}.cjs.js`).then((obj) => {
        app.component(componentName, obj);
    });
}