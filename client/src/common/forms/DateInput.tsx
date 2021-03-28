import { useField } from 'formik';
import React from 'react';
import { Form } from 'semantic-ui-react';
import DatePicker, { ReactDatePickerProps } from 'react-datepicker';

interface Props extends ReactDatePickerProps {
  label?: string;
  isRequired?: boolean;
}

const DateInput = (props: Partial<Props>) => {
  const [field, meta, helpers] = useField(props.name!);

  return (
    <Form.Field error={meta.touched && !!meta.error}>
      <label>
        {props.isRequired && <span className='required'>*</span>}
        {props.label}
      </label>

      <DatePicker
        {...field}
        {...props}
        selected={(field.value && new Date(field.value)) || null}
        onChange={(value) => helpers.setValue(value)}
      />
      {meta.touched && meta.error ? (
        <small className='error'>{meta.error}</small>
      ) : null}
    </Form.Field>
  );
};

export default DateInput;
