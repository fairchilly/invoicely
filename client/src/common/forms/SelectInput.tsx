import { useField } from 'formik';
import React from 'react';
import { Form, Select } from 'semantic-ui-react';
import { Option } from '../../models/option';

interface Props {
  placeholder: string;
  name: string;
  options: Option[];
  label?: string;
  isRequired?: boolean;
}

const SelectInput = ({
  placeholder,
  name,
  options,
  label,
  isRequired,
}: Props) => {
  const [field, meta, helpers] = useField(name);

  return (
    <Form.Field error={meta.touched && !!meta.error}>
      <label>
        {isRequired && <span className='required'>*</span>}
        {label}
      </label>
      <Select
        clearable
        options={options}
        value={field.value || null}
        onChange={(e, d) => helpers.setValue(d.value)}
        onBlur={() => helpers.setTouched(true)}
        placeholder={placeholder}
      />
      {meta.touched && meta.error ? (
        <small className='error'>{meta.error}</small>
      ) : null}
    </Form.Field>
  );
};

export default SelectInput;
