import React from 'react';
import { Form, Segment } from 'semantic-ui-react';
import SectionHeader from '../../../common/SectionHeader';
import TextInput from '../../../common/forms/TextInput';
import { observer } from 'mobx-react-lite';

const CompanyForm = () => {
  return (
    <Segment clearing>
      <div className='form-segment'>
        <SectionHeader label='Company / Service Provider' icon='building' />
        <Form.Group widths='equal'>
          <TextInput
            label='Company Name'
            placeholder='Acme Corporation'
            name='company.name'
            isRequired={true}
          />
          <TextInput
            label='Street'
            placeholder='123 Main Street'
            name='company.street'
          />
          <TextInput
            label='City'
            placeholder='Los Angeles'
            name='company.city'
          />
          <TextInput
            label='State/Province'
            placeholder='CA'
            name='company.stateProvince'
          />
        </Form.Group>
        <Form.Group widths='equal'>
          <TextInput
            label='Country'
            placeholder='United States'
            name='company.country'
          />
          <TextInput
            label='Zipcode/Postal Code'
            placeholder='90210'
            name='company.zipPostal'
          />
          <TextInput
            label='Phone Number'
            placeholder='(555) 555-5555'
            name='company.phone'
          />
          <TextInput
            label='Email'
            placeholder='fake@email.com'
            name='company.email'
          />
        </Form.Group>
      </div>
    </Segment>
  );
};

export default observer(CompanyForm);
