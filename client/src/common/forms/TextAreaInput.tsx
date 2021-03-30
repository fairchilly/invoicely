import { useField } from 'formik';
import React from 'react';
import { Form } from 'semantic-ui-react';

interface Props {
  placeholder: string;
  name: string;
  rows: number;
  label?: string;
  isRequired?: boolean;
}

const TextAreaInput = ({
  placeholder,
  name,
  rows,
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
      <textarea {...field} placeholder={placeholder} name={name} rows={rows} />
      {meta.touched && meta.error ? (
        <small className='error'>{meta.error}</small>
      ) : null}
    </Form.Field>
  );
};

export default TextAreaInput;
