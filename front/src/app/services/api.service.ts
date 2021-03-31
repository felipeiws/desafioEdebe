import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  private token = 'a9deb77b588c41c00e60d83ba8066ec9e69de4a303ae8562268b4104ca22a137';
  url = 'http://localhost:81/api/';

  constructor(public http: HttpClient) { }

  getCountries(page: number = 1){
    return this.http.get(this.url + 'countries?page=' + page ,{
      headers: {
        'Authorization' : 'Bearer ' + this.token
        ,'Content-Type' : 'application/json; charset=utf-8'
      }
    }).pipe();
  }

  getCountry(id){
    return this.http.get(this.url + 'countries/' + id ,{
      headers: {
        'Authorization' : 'Bearer ' + this.token
        ,'Content-Type' : 'application/json; charset=utf-8'
      }
    }).pipe();
  }
}
