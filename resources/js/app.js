

import Alpine from 'alpinejs';
import { animate, inView, scroll, stagger } from 'motion';

window.Alpine = Alpine;

// Ekspor Framer Motion (Vanilla) agar mudah dipakai langsung di tag <script> Blade
window.motion = { animate, inView, scroll, stagger };

Alpine.start();
