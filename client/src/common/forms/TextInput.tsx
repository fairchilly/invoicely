import { useField } from 'formik';
import React from 'react';
import { Form } from 'semantic-ui-react';

interface Props {
  placeholder: string;
  name: string;
  label?: string;
  isRequired?: boolean;
}

const TextInput = ({ placeholder, name, label, isRequired }: Props) => {
  const [field, meta] = useField(name);

  return (
    <Form.Field error={meta.touched && !!meta.error}>
      <label>
        {isRequired && <span className='required'>*</span>}
        {label}
      </label>
      <input type='text' {...field} placeholder={placeholder} name={name} />
      {meta.touched && meta.error ? (
        <small className='error'>{meta.error}</small>
      ) : null}
    </Form.Field>
  );
};

export default TextInput;
