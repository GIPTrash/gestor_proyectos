import { Component } from '@angular/core';
import { SidebarComponent } from './sidebar.component';
import { RouterOutlet } from '@angular/router';

@Component({
  imports: [
    SidebarComponent,
    RouterOutlet
  ],
  selector: 'app-layout',
  template: `
    <div className="min-h-screen flex flex-col">
      <header class="bg-red-600 p-4 text-white">
        <h1 class="text-xl font-bold">Mi Aplicación</h1>
      </header>
      <div class="flex flex-1">
        <app-sidebar></app-sidebar>
        <main class="flex-1 p-4">
          <router-outlet></router-outlet>
        </main>
      </div>
      <footer class="bg-red-600 p-4 text-white text-center">
        © 2025 Gestor de proyectos
      </footer>
    </div>
  `,
  styles: []
})
export class LayoutComponent {}
