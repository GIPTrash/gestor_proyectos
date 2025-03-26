import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { RouterModule } from '@angular/router';

interface SidebarItem {
  name: string;
  path: string;
}

@Component({
  imports: [
    CommonModule,
    RouterModule
  ],
  selector: 'app-sidebar',
  template: `
    <aside class="w-64 bg-gray-200 p-4">
      <nav>
        <ul>
          <li *ngFor="let item of sidebarItems" class="mb-2">
            <a [routerLink]="item.path" routerLinkActive="text-red-600" class="text-gray-700 hover:text-red-600">
              {{ item.name }}
            </a>
          </li>
        </ul>
      </nav>
    </aside>
  `,
  styles: []
})
export class SidebarComponent {
  sidebarItems: SidebarItem[] = [
    { name: 'Inicio', path: '' },
    { name: 'Proyectos', path: 'projects' }
  ];
}
