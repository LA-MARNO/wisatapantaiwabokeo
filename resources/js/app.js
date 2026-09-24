import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import MainLayout from './Layouts/MainLayout.vue';

createInertiaApp({
  title: (title) => `${title} Pantai Wabokeo | Batuatas`,

  resolve: (name) => {
    const page = resolvePageComponent(
      `./Pages/${name}.vue`,
      import.meta.glob('./Pages/**/*.vue')
    );

    page.then((module) => {
      // Set MainLayout HANYA jika halaman tidak menentukan layout-nya sendiri
      module.default.layout = module.default.layout || MainLayout;
    });

    return page;
  },

  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el);
  },

  progress: {
    color: '#14ac60',
  },
});
