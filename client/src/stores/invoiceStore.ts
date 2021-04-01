import { makeAutoObservable } from 'mobx';
import { Invoice } from '../models/invoice';

export default class InvoiceStore {
  invoices: Invoice[] = [];
  selectedInvoice: Invoice | null = null;
  editMode = false;
  loading = false;
  loadingInitial = false;

  constructor() {
    makeAutoObservable(this);
  }

  loadInvoices = () => {
    this.loadingInitial = true;
  };
}
