import React from 'react';
import { v4 as uuid } from 'uuid';
import SectionHeader from '../../../common/SectionHeader';
import { Button, Form, Icon, Segment } from 'semantic-ui-react';
import { Fee } from '../../../models/fee';
import { FieldArray } from 'formik';
import TextInput from '../../../common/forms/TextInput';
import NumberInput from '../../../common/forms/NumberInput';
import SelectInput from '../../../common/forms/SelectInput';
import { feeOptions } from '../../../common/options/feeOptions';

interface Props {
  fees: Fee[];
}

const FeesForm = ({ fees }: Props) => {
  const options = feeOptions;

  return (
    <Segment clearing>
      <div className='form-segment'>
        <SectionHeader
          label='Additional Fees (Taxes, Delivery, etc.)'
          icon='dollar sign'
        />
        <FieldArray
          name='fees'
          render={({ push, remove }) => (
            <div>
              {fees.map((fee, index) => (
                <Form.Group widths='equal' key={fee.id}>
                  <TextInput
                    label='Description'
                    placeholder='Sales Tax'
                    name={`fees[${index}].description`}
                    isRequired={true}
                  />

                  <NumberInput
                    label='Value'
                    placeholder='10'
                    name={`fees[${index}].value`}
                    pattern='^\d*(\.\d{0,2})?$'
                    step='0.01'
                    min='0'
                    isRequired={true}
                  />

                  <SelectInput
                    label='Price or Percentage'
                    placeholder='Please Select'
                    name={`fees[${index}].type`}
                    options={options}
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
                      value: 0,
                      type: '',
                    })
                  }
                >
                  <Icon className='plus' />
                  Add Additional Fee
                </Button>
                <Button
                  type='button'
                  secondary
                  onClick={() => remove(fees.length - 1)}
                  disabled={fees.length === 1}
                >
                  <Icon className='minus' />
                  Remove Last Fee
                </Button>
              </Button.Group>
            </div>
          )}
        />
      </div>
    </Segment>
  );
};

export default FeesForm;
