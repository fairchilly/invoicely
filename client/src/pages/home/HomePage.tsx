import React from 'react';
import { Formik, Form } from 'formik';
import * as Yup from 'yup';
import { v4 as uuid } from 'uuid';

import { Button } from 'semantic-ui-react';
import InvoiceForm from './components/InvoiceForm';
import CompanyForm from './components/CompanyForm';
import CustomerForm from './components/CustomerForm';
import ItemsForm from './components/ItemsForm';
import FeesForm from './components/FeesForm';
import { observer } from 'mobx-react-lite';
import { Invoice } from '../../models/invoice';
import axios from 'axios';
import CommentForm from './components/CommentForm';

const invoice: Invoice = {
  id: uuid(),
  invoiceNumber: '',
  issuedDate: '',
  dueDate: '',
  company: {
    name: '',
    street: '',
    city: '',
    stateProvince: '',
    country: '',
    zipPostal: '',
    phone: '',
    email: '',
  },
  customer: {
    name: '',
    street: '',
    city: '',
    stateProvince: '',
    country: '',
    zipPostal: '',
    phone: '',
    email: '',
  },
  items: [
    {
      id: uuid(),
      description: '',
      units: 0,
      pricePerUnit: 0,
      rank: 1,
    },
  ],
  fees: [{ id: uuid(), description: '', value: 0, type: '', rank: 1 }],
  comments: '',
};

const validationSchema = Yup.object({
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

const handleFormSubmit = (invoice: Invoice) => {
  // Updated items and fees to multiples of 100
  invoice.items = invoice.items.map((item) => {
    item.pricePerUnit = item.pricePerUnit * 100;
    return item;
  });

  invoice.fees = invoice.fees.map((fee) => {
    if (fee.type === 'price') {
      fee.value = fee.value * 100;
    }
    return fee;
  });

  axios
    .post('http://localhost/api/invoices/generate', invoice, {
      responseType: 'blob',
    })
    .then((response) => {
      if (response.data === null) {
        console.log('There was an error');
      } else {
        const file = new Blob([response.data], { type: 'application/pdf' });
        const fileURL = URL.createObjectURL(file);
        window.open(fileURL);
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

const HomePage = () => {
  return (
    <div>
      <Formik
        validationSchema={validationSchema}
        enableReinitialize
        initialValues={invoice}
        onSubmit={(values) => handleFormSubmit(values)}
      >
        {({ handleSubmit, isValid, isSubmitting, dirty, values }) => (
          <Form className='ui form' onSubmit={handleSubmit} autoComplete='off'>
            <CompanyForm />
            <CustomerForm />
            <InvoiceForm />
            <ItemsForm items={values.items} />
            <FeesForm fees={values.fees} />
            <CommentForm />
            <Button
              primary
              fluid
              type='submit'
              disabled={isSubmitting || !dirty || !isValid}
            >
              Generate Invoice
            </Button>
          </Form>
        )}
      </Formik>
    </div>
  );
};

export default observer(HomePage);
