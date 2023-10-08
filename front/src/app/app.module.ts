import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';

import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { TopNavComponent } from './components/top-nav/top-nav.component';
import { HomeComponent } from './pages/home/home.component';
import { WhoAreWe1Component } from './pages/who-are-we1/who-are-we1.component';
import { WhoAreWe2Component } from './pages/who-are-we2/who-are-we2.component';
import { HeroComponent } from './components/hero/hero.component';
import { NotFoundPageComponent } from './pages/not-found-page/not-found-page.component';
import { FooterComponent } from './components/footer/footer.component';
import { ProgressWrapComponent } from './components/progress-wrap/progress-wrap.component';
import { OurServicesComponent } from './components/our-services/our-services.component';
import { CountersComponent } from './components/counters/counters.component';
import { AboutUsComponent } from './components/about-us/about-us.component';
import { TestimonialsComponent } from './components/testimonials/testimonials.component';
import { CarouselModule } from 'ngx-owl-carousel-o';

@NgModule({
  declarations: [
    AppComponent,
    TopNavComponent,
    HomeComponent,
    WhoAreWe1Component,
    WhoAreWe2Component,
    HeroComponent,
    NotFoundPageComponent,
    FooterComponent,
    ProgressWrapComponent,
    OurServicesComponent,
    CountersComponent,
    AboutUsComponent,
    TestimonialsComponent,

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    CarouselModule,
    BrowserAnimationsModule ,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
