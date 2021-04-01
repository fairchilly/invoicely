import * as Yup from 'yup';

export const invoiceSchema = Yup.object({
  company: Yup.object({
    name: Yup.string().required('The company name is required'),
  }),
  customer: Yup.object({
    name: Yup.string().required('The customer name is required'),
  }),
  items: Yup.array().of(
    Yup.object({
      description: Yup.string().required('The item description is required'),
      units: Yup.string().required('The unit amount is required'),
      pricePerUnit: Yup.string().required(
        'The price per unit amount is required'
      ),
    })
  ),
  fees: Yup.array().of(
    Yup.object({
      description: Yup.string().required('The fee description is required'),
      value: Yup.string().required('The fee value is required'),
      type: Yup.string().required('The fee type is required'),
    })
  ),
  invoiceNumber: Yup.string().required('The invoice number is required'),
  issuedDate: Yup.date().required('The issued date is required'),
  dueDate: Yup.string().required('The due date is required'),
});
