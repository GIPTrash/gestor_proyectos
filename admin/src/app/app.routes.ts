import { Routes } from '@angular/router';
import { LayoutComponent } from './layouts/layout.component';
import { HomeComponent } from './pages/home.component';
import { ProjectsComponent } from './pages/projects.component';

export const routes: Routes = [
  {
    path: '',
    component: LayoutComponent,
    children: [
      { path: '', component: HomeComponent },
      { path: 'projects', component: ProjectsComponent }
    ]
  }
];
