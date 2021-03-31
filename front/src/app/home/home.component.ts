import { Component, OnInit } from '@angular/core';
import {ApiService} from '../services/api.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  countries: any;
  constructor(
    public api: ApiService
  ) { }

  ngOnInit(): void {
     this.api.getCountries().subscribe(
      (data: any) => {
        this.countries = data;
      });
  }

  getNewPage(page){
    this.countries = undefined;
    this.api.getCountries(page).subscribe(
      (data: object) => {
        this.countries = data;
      });
  }
}
