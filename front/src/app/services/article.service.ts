import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';


const apiRoot = 'http://localhost:4000/api/v1/';

const httpOptions = {
  headers: new HttpHeaders(
    {
      'content-type': 'application/json',
      'Accept': 'text/html, application/xhtml+xml, */*'
    }
  ),
  responseType: 'json' as 'json',
};

@Injectable({
  providedIn: 'root'
})

export class ArticleService

{

  constructor(private http: HttpClient) { } // injection de dépendance


  getArticlesAll(): Observable<object> {
    return this.http.get(`${apiRoot}article`, httpOptions);
  }


  getArticleOne(id: number): Observable<object> {
    return this.http.get(`${apiRoot}article/${id}`, httpOptions);
  }
}
