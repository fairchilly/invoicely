import React, { useState } from 'react';
import { Menu } from 'semantic-ui-react';

const SideNav = () => {
  const [activeItem, setActiveItem] = useState('manage invoices');

  const handleItemClick = (e: any, { name }: any) => {
    setActiveItem(name);
  };

  return (
    <Menu vertical>
      <Menu.Item>
        <Menu.Header>Tools</Menu.Header>

        <Menu.Menu>
          <Menu.Item
            name='manage invoices'
            active={activeItem === 'manage invoices'}
            onClick={handleItemClick}
          />
          <Menu.Item
            name='new invoice'
            active={activeItem === 'new invoice'}
            onClick={handleItemClick}
          />
        </Menu.Menu>
      </Menu.Item>

      <Menu.Item>
        <Menu.Header>Clients</Menu.Header>

        <Menu.Menu>
          <Menu.Item
            name='manage clients'
            active={activeItem === 'manage clients'}
            onClick={handleItemClick}
          />
          <Menu.Item
            name='walmart'
            active={activeItem === 'walmart'}
            onClick={handleItemClick}
          />
          <Menu.Item
            name='python'
            active={activeItem === 'python'}
            onClick={handleItemClick}
          />
          <Menu.Item
            name='php'
            active={activeItem === 'php'}
            onClick={handleItemClick}
          />
        </Menu.Menu>
      </Menu.Item>
    </Menu>
  );
};

export default SideNav;
