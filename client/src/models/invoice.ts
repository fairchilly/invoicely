import { Company } from './company';
import { Customer } from './customer';
import { Fee } from './fee';
import { Item } from './item';

export interface Invoice {
  id: string;
  invoiceNumber: string;
  issuedDate: Date | string;
  dueDate: Date | string;
  company: Company;
  customer: Customer;
  items: Item[];
  fees: Fee[];
  comments: string;
}
