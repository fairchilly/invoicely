import React from 'react';
import SectionHeader from '../../../common/SectionHeader';
import { Form, Segment } from 'semantic-ui-react';
import TextAreaInput from '../../../common/forms/TextAreaInput';

const CommentForm = () => {
  return (
    <Segment clearing>
      <div className='form-segment'>
        <SectionHeader label='Comments' icon='comment' />
        <Form.Group widths='equal'>
          <TextAreaInput
            placeholder='Enter your comments here'
            name='comments'
            rows={3}
          />
        </Form.Group>
      </div>
    </Segment>
  );
};

export default CommentForm;
