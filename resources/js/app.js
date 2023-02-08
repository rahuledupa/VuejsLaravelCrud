require('./bootstrap');

import { createApp } from 'vue';

import Home from './components/Home.vue';
import Employe from './components/employe/Employe.vue';

import { library } from '@fortawesome/fontawesome-svg-core'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { faUserSecret, faUserCircle, faEdit, faDeleteLeft, faRemove } from '@fortawesome/free-solid-svg-icons'
import Toaster from "@meforma/vue-toaster";
library.add(faUserSecret, faUserCircle, faEdit, faDeleteLeft, faRemove)
const app = createApp({});

app.component('font-awesome-icon', FontAwesomeIcon)
app.component('Home', Home);
app.component('Employe', Employe);
app.mount('#app');
app.use(Toaster);
