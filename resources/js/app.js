import './bootstrap';
//import '@quasar/quasar-ui-tailwind';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { Quasar } from 'quasar';
import quasarIconSet from 'quasar/icon-set/material-icons';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import '@quasar/extras/material-icons/material-icons.css';
import 'quasar/src/css/index.sass';
import 'quasar/dist/quasar.css'; // Importe o arquivo CSS principal do Quasar

createInertiaApp({
  title: (title) => ( title ),
  resolve: (name) => resolvePageComponent(`./Pages/${name}`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
    // Configurar Quasar
    app.use(plugin);
    app.use(Quasar, {
      config: {}, // Configurações globais do Quasar, se necessário
      plugins: {}, // Plugins adicionais do Quasar que deseja utilizar
      iconSet: quasarIconSet, // Definir o conjunto de ícones a ser usado
      
    });
    return app.mount(el);
  },
});