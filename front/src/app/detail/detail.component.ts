import { Component, OnInit } from '@angular/core';
import {ApiService} from '../services/api.service';
import {ActivatedRoute} from '@angular/router';

@Component({
  selector: 'app-detail',
  templateUrl: './detail.component.html',
  styleUrls: ['./detail.component.css']
})
export class DetailComponent implements OnInit {
  country: any;
  constructor(
    private route: ActivatedRoute,
    public api: ApiService) { }

  ngOnInit(): void {
    this.route.paramMap.subscribe(parans => {
      this.api.getCountry(`${parans.get('countryID')}`).subscribe(
        (data: object) => {
          this.country = data;
        });
    });
  }

}
