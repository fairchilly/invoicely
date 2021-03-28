import React from 'react';
import SectionHeader from '../../../common/SectionHeader';
import { Form, Segment } from 'semantic-ui-react';
import TextInput from '../../../common/forms/TextInput';
import DateInput from '../../../common/forms/DateInput';

const InvoiceForm = () => {
  return (
    <Segment clearing>
      <div className='form-segment'>
        <SectionHeader label='Invoice Details' icon='file alternate' />
        <Form.Group widths='equal'>
          <TextInput
            label='Invoice #'
            placeholder='1001'
            name='invoiceNumber'
            isRequired={true}
          />
          <DateInput
            label='Issued Date'
            placeholderText='May 1, 2021'
            name='issuedDate'
            isRequired={true}
            dateFormat='MMMM d, yyyy'
          />
          <DateInput
            label='Due Date'
            placeholderText='June 30, 2021'
            name='dueDate'
            isRequired={true}
            dateFormat='MMMM d, yyyy'
          />
        </Form.Group>
      </div>
    </Segment>
  );
};

export default InvoiceForm;
