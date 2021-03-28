import React from 'react';
import { Menu, Container } from 'semantic-ui-react';

const TopNav = () => {
  return (
    <div style={{ marginBottom: '6rem' }}>
      <Menu borderless inverted fixed='top'>
        <Container>
          <Menu.Item id='logo'>INVOICELY</Menu.Item>
        </Container>
      </Menu>
    </div>
  );
};

export default TopNav;
