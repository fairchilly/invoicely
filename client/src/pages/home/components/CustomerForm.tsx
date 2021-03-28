import React from 'react';
import SectionHeader from '../../../common/SectionHeader';
import { Form, Segment } from 'semantic-ui-react';
import TextInput from '../../../common/forms/TextInput';

const CustomerForm = () => {
  return (
    <Segment clearing>
      <div className='form-segment'>
        <SectionHeader label='Customer' icon='user' />
        <Form.Group widths='equal'>
          <TextInput
            label='Name'
            placeholder='John Smith'
            name='customer.name'
            isRequired={true}
          />
          <TextInput
            label='Street'
            placeholder='321 Main Street'
            name='customer.street'
          />
          <TextInput
            label='City'
            placeholder='San Diego'
            name='customer.city'
          />
          <TextInput
            label='State/Province'
            placeholder='CA'
            name='customer.stateProvince'
          />
        </Form.Group>
        <Form.Group widths='equal'>
          <TextInput
            label='Country'
            placeholder='United States'
            name='customer.country'
          />
          <TextInput
            label='Zipcode/Postal Code'
            placeholder='90210'
            name='customer.zipPostal'
          />
          <TextInput
            label='Phone Number'
            placeholder='(555) 123-4567'
            name='customer.phone'
          />
          <TextInput
            label='Email'
            placeholder='fake@email.com'
            name='customer.email'
          />
        </Form.Group>
      </div>
    </Segment>
  );
};

export default CustomerForm;
