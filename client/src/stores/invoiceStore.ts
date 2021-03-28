import { makeAutoObservable } from 'mobx';

export default class InvoiceStore {
  invoice: null;

  constructor() {
    makeAutoObservable(this);
  }
}
