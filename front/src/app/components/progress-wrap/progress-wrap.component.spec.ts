import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ProgressWrapComponent } from './progress-wrap.component';

describe('ProgressWrapComponent', () => {
  let component: ProgressWrapComponent;
  let fixture: ComponentFixture<ProgressWrapComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ProgressWrapComponent]
    });
    fixture = TestBed.createComponent(ProgressWrapComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
