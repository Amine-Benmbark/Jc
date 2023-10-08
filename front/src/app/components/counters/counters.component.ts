import { Component, OnInit } from '@angular/core';
import { ArticleService } from 'src/app/services/article.service';
import { OwlOptions } from 'ngx-owl-carousel-o';


@Component({
  selector: 'app-counters',
  templateUrl: './counters.component.html',
  styleUrls: ['./counters.component.css']
})
export class CountersComponent implements OnInit {
  articles!: any[]
  loaded!: boolean
  requestStarted!: boolean
  customOptions: OwlOptions = {
    loop: false,
    mouseDrag: true,
    touchDrag: true,
    pullDrag: true,
    dots: true,
    navSpeed: 700,
    navText: ['', ''],
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      992: {
        items: 2
      },
      1200: {
        items: 3
      }
    },
    nav: true
  }

  constructor(
    private articleService: ArticleService
  ) {
    this.loaded = false
    this.requestStarted = false;
  }

  ngOnInit(): void {
    this.loaded = false
    this.requestStarted = true
    this.articleService.getArticlesAll().subscribe({
      next: (res: any) => {
        console.log(res)
        this.articles = res.data
        this.loaded = true
        this.requestStarted = false;
      }
    })
  }

}
