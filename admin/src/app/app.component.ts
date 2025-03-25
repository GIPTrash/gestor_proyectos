import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-root',
  template: `
    <main class="main">
      <h1 class="text-3xl font-bold underline text-center text-blue-500">
        Hello world!
      </h1>
    </main>
  `,
})
export class AppComponent {
  title = 'admin';
}
