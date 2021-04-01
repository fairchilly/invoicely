import React from 'react';
import { Menu, Container } from 'semantic-ui-react';
import LoginSignUpModal from './LoginSignupModal';

const TopNav = () => {
  return (
    <div style={{ marginBottom: '6rem' }}>
      <Menu borderless inverted fixed='top'>
        <Container>
          <Menu.Item id='logo'>INVOICELY</Menu.Item>
          <Menu.Menu position='right'>
            <Menu.Item>
              <LoginSignUpModal />
            </Menu.Item>
          </Menu.Menu>
        </Container>
      </Menu>
    </div>
  );
};

export default TopNav;
