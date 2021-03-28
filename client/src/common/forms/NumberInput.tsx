import { useField } from 'formik';
import React from 'react';
import { Form } from 'semantic-ui-react';

interface Props {
  placeholder: string;
  name: string;
  pattern?: string;
  step?: string;
  min?: string;
  label?: string;
  isRequired?: boolean;
}

const NumberInput = ({
  placeholder,
  name,
  pattern = '^d*(.d{0,2})?$',
  step = '0.01',
  min = '0',
  label,
  isRequired,
}: Props) => {
  const [field, meta] = useField(name);

  return (
    <Form.Field error={meta.touched && !!meta.error}>
      <label>
        {isRequired && <span className='required'>*</span>}
        {label}
      </label>
      <input
        type='number'
        {...field}
        placeholder={placeholder}
        name={name}
        pattern={pattern}
        step={step}
        min={min}
      />
      {meta.touched && meta.error ? (
        <small className='error'>{meta.error}</small>
      ) : null}
    </Form.Field>
  );
};

export default NumberInput;
