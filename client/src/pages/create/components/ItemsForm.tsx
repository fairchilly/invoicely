import React from 'react';
import SectionHeader from '../../../common/SectionHeader';
import { Button, Form, Icon, Segment } from 'semantic-ui-react';
import TextInput from '../../../common/forms/TextInput';
import NumberInput from '../../../common/forms/NumberInput';
import { FieldArray } from 'formik';
import { v4 as uuid } from 'uuid';
import { Item } from '../../../models/item';

interface Props {
  items: Item[];
}

const ItemsForm = ({ items }: Props) => {
  return (
    <Segment clearing>
      <div className='form-segment'>
        <SectionHeader label='Invoice Items' icon='money bill alternate' />
        <FieldArray
          name='items'
          render={({ push, remove }) => (
            <div>
              {items.map((item, index) => (
                <Form.Group widths='equal' key={item.id}>
                  <TextInput
                    label='Description'
                    placeholder='Web Development'
                    name={`items[${index}].description`}
                    isRequired={true}
                  />

                  <NumberInput
                    label='Quantity'
                    placeholder='3.5'
                    name={`items[${index}].units`}
                    pattern='^\d*(\.\d{0,2})?$'
                    step='0.01'
                    min='0'
                    isRequired={true}
                  />

                  <NumberInput
                    label='Price Per Unit'
                    placeholder='20'
                    name={`items[${index}].pricePerUnit`}
                    pattern='^\d*(\.\d{0,2})?$'
                    step='0.01'
                    min='0'
                    isRequired={true}
                  />
                </Form.Group>
              ))}
              <Button.Group widths='2'>
                <Button
                  type='button'
                  primary
                  onClick={() =>
                    push({
                      id: uuid(),
                      description: '',
                      units: 0,
                      pricePerUnit: 0,
                      rank: items.length + 1,
                    })
                  }
                >
                  <Icon className='plus' />
                  Add Additional Item
                </Button>
                <Button
                  type='button'
                  secondary
                  onClick={() => remove(items.length - 1)}
                  disabled={items.length === 1}
                >
                  <Icon className='minus' />
                  Remove Last Item
                </Button>
              </Button.Group>
            </div>
          )}
        />
      </div>
    </Segment>
  );
};

export default ItemsForm;
