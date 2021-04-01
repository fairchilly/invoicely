import React, { useState } from 'react';
import { Modal, Button, Form, Grid, Divider } from 'semantic-ui-react';

const LoginSignUpModal = () => {
  const [openModal, setOpenModal] = useState(false);

  return (
    <Modal
      onClose={() => setOpenModal(false)}
      onOpen={() => setOpenModal(true)}
      open={openModal}
      trigger={<Button primary>Login or Signup</Button>}
    >
      <Modal.Content>
        <Modal.Description>
          <Grid columns={2} verticalAlign='middle' relaxed='very'>
            <Grid.Column>
              <Form>
                <Form.Field>
                  <label>Username</label>
                  <input placeholder='Username' />
                </Form.Field>
                <Form.Field>
                  <label>Password</label>
                  <input placeholder='Password' />
                </Form.Field>
                <Grid centered columns={6}>
                  <Grid.Column>
                    <Button type='submit' primary>
                      Login
                    </Button>
                  </Grid.Column>
                </Grid>
              </Form>
            </Grid.Column>
            <Grid.Column>
              <Form>
                <Form.Field>
                  <label>Username</label>
                  <input placeholder='Username' />
                </Form.Field>
                <Form.Field>
                  <label>Password</label>
                  <input placeholder='Password' />
                </Form.Field>
                <Form.Field>
                  <label>Confirm Password</label>
                  <input placeholder='Confirm Password' />
                </Form.Field>
                <Grid centered columns={6}>
                  <Grid.Column>
                    <Button type='submit' positive>
                      Signup
                    </Button>
                  </Grid.Column>
                </Grid>
              </Form>
            </Grid.Column>
          </Grid>
          <Divider vertical>OR</Divider>
        </Modal.Description>
      </Modal.Content>
    </Modal>
  );
};

export default LoginSignUpModal;
